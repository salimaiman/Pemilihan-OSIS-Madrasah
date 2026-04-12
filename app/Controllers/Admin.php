<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\KandidatModel;
use App\Models\PemilihModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Admin extends BaseController
{
    protected AdminModel    $adminModel;
    protected KandidatModel $kandiadatModel;
    protected PemilihModel  $pemilihModel;

    public function __construct()
    {
        $this->adminModel     = new AdminModel();
        $this->kandiadatModel = new KandidatModel();
        $this->pemilihModel   = new PemilihModel();
    }

    // ----------------------------------------------------------------
    // DASHBOARD
    // ----------------------------------------------------------------

    public function index()
    {
        $username = session()->get('username');

        // Hitung statistik dasbor
        $totalSuara = $this->pemilihModel->where('status', 1)->countAllResults();
        $totalPemilih = $this->pemilihModel->countAllResults();
        $sudahMemilih = $totalSuara;
        $belumMemilih = $this->pemilihModel->where('status', 0)->countAllResults();

        $data = [
            'judul'         => 'Dashboard | Admin | Pilketos MTsN 2 Ende',
            'admin'         => $this->adminModel->getAdmin($username),
            'menu'          => 'dashboard',
            'total_suara'   => $totalSuara,
            'total_pemilih' => $totalPemilih,
            'sudah_memilih' => $sudahMemilih,
            'belum_memilih' => $belumMemilih,
        ];

        return view('layout/header', $data)
            . view('layout/navbar_admin', $data)
            . view('layout/sidebar', $data)
            . view('admin/admin_dashboard', $data)
            . view('layout/footer');
    }

    // ----------------------------------------------------------------
    // KANDIDAT
    // ----------------------------------------------------------------

    public function kandidat()
    {
        $username = session()->get('username');

        $data = [
            'judul'    => 'Kandidat | Admin | Pilketos MTsN 2 Ende',
            'admin'    => $this->adminModel->getAdmin($username),
            'menu'     => 'kandidat',
            'kandidat' => $this->kandiadatModel->getKandidat(),
        ];

        return view('layout/header', $data)
            . view('layout/navbar_admin', $data)
            . view('layout/sidebar', $data)
            . view('admin/admin_kandidat', $data)
            . view('layout/footer');
    }

    public function tambahKandidat()
    {
        $username = session()->get('username');

        $data = [
            'judul' => 'Tambah Kandidat | Admin | Pilketos MTsN 2 Ende',
            'admin' => $this->adminModel->getAdmin($username),
            'menu'  => 'addkandidat',
        ];

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'nm_ketua'  => 'required|trim',
                'pgl_ketua' => 'required|trim',
                'visi'      => 'required|trim',
                'misi'      => 'required|trim',
            ];

            if (! $this->validate($rules)) {
                $data['errors'] = $this->validator->getErrors();
                return view('layout/header', $data)
                    . view('layout/navbar_admin', $data)
                    . view('layout/sidebar', $data)
                    . view('admin/admin_add_kandidat', $data)
                    . view('layout/footer');
            }

            $foto = $this->request->getFile('foto');
            $uploadedFoto = 'default.png';

            if ($foto && $foto->isValid() && ! $foto->hasMoved()) {
                $uploadedFoto = $foto->getRandomName();
                $foto->move(ROOTPATH . 'public/assets/img/kandidat', $uploadedFoto);
            }

            $this->kandiadatModel->tambahKandidat([
                'nm_ketua'  => $this->request->getPost('nm_ketua'),
                'pgl_ketua' => $this->request->getPost('pgl_ketua'),
                'nm_wakil'  => $this->request->getPost('nm_wakil'),
                'pgl_wakil' => $this->request->getPost('pgl_wakil'),
                'visi'      => $this->request->getPost('visi'),
                'misi'      => $this->request->getPost('misi'),
                'foto'      => $uploadedFoto,
            ]);

            return redirect()->to(base_url('admin/kandidat'));
        }

        return view('layout/header', $data)
            . view('layout/navbar_admin', $data)
            . view('layout/sidebar', $data)
            . view('admin/admin_add_kandidat', $data)
            . view('layout/footer');
    }

    public function editKandidat(int $id)
    {
        $username = session()->get('username');
        $kandidat = $this->kandiadatModel->getKandidat($id);

        if (!$kandidat) {
            return redirect()->to(base_url('admin/kandidat'));
        }

        $data = [
            'judul'    => 'Edit Kandidat | Admin | Pilketos MTsN 2 Ende',
            'admin'    => $this->adminModel->getAdmin($username),
            'menu'     => 'kandidat',
            'kandidat' => $kandidat,
        ];

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'nm_ketua'  => 'required|trim',
                'pgl_ketua' => 'required|trim',
                'visi'      => 'required|trim',
                'misi'      => 'required|trim',
            ];

            if (! $this->validate($rules)) {
                $data['errors'] = $this->validator->getErrors();
                return view('layout/header', $data)
                    . view('layout/navbar_admin', $data)
                    . view('layout/sidebar', $data)
                    . view('admin/admin_edit_kandidat', $data)
                    . view('layout/footer');
            }

            $foto = $this->request->getFile('foto');
            $fotoLama = $this->request->getPost('foto_lama');
            $uploadedFoto = $fotoLama;

            if ($foto && $foto->isValid() && ! $foto->hasMoved()) {
                $uploadedFoto = $foto->getRandomName();
                $foto->move(ROOTPATH . 'public/assets/img/kandidat', $uploadedFoto);
                if ($fotoLama !== 'default.png') {
                    $path = ROOTPATH . 'public/assets/img/kandidat/' . $fotoLama;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }

            $this->kandiadatModel->update($id, [
                'nm_ketua'  => $this->request->getPost('nm_ketua'),
                'pgl_ketua' => $this->request->getPost('pgl_ketua'),
                'nm_wakil'  => $this->request->getPost('nm_wakil'),
                'pgl_wakil' => $this->request->getPost('pgl_wakil'),
                'visi'      => $this->request->getPost('visi'),
                'misi'      => $this->request->getPost('misi'),
                'foto'      => $uploadedFoto,
            ]);

            return redirect()->to(base_url('admin/kandidat'));
        }

        return view('layout/header', $data)
            . view('layout/navbar_admin', $data)
            . view('layout/sidebar', $data)
            . view('admin/admin_edit_kandidat', $data)
            . view('layout/footer');
    }

    public function hapusKandidat(int $id)
    {
        $kandidat = $this->kandiadatModel->getKandidat($id);

        if ($kandidat && $kandidat['foto'] !== 'default.png') {
            $path = ROOTPATH . 'public/assets/img/kandidat/' . $kandidat['foto'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->kandiadatModel->hapusKandidat($id);
        return redirect()->to(base_url('admin/kandidat'));
    }

    // ----------------------------------------------------------------
    // DATA PEMILIH
    // ----------------------------------------------------------------

    public function dataPemilih()
    {
        $username = session()->get('username');

        $data = [
            'judul'   => 'Data Pemilih | Admin | Pilketos MTsN 2 Ende',
            'admin'   => $this->adminModel->getAdmin($username),
            'pemilih' => $this->pemilihModel->getPemilih(),
            'menu'    => 'pemilih',
        ];

        return view('layout/header', $data)
            . view('layout/navbar_admin', $data)
            . view('layout/sidebar', $data)
            . view('admin/admin_data_pemilih', $data)
            . view('layout/footer');
    }

    public function download()
    {
        $file = ROOTPATH . 'public/assets/document/data_pemilih.xlsx';
        return $this->response->download($file, null);
    }

    public function importExcel()
    {
        $file = $this->request->getFile('filePemilih');

        $allowed = ['xlsx', 'xls'];
        if (! $file || ! in_array($file->getClientExtension(), $allowed)) {
            return redirect()->to(base_url('admin/datapemilih'));
        }

        $spreadsheet = IOFactory::load($file->getTempName());
        $sheetData   = $spreadsheet->getActiveSheet()->toArray();

        foreach ($sheetData as $row => $value) {
            if ($row == 0 || $value[1] === null) {
                continue;
            }

            $this->pemilihModel->insertPemilih([
                'username'   => $value[1],
                'password'   => $value[2],
                'nm_lengkap' => $value[3],
                'kelas'      => $value[4],
                'gender'     => $value[5],
                'status'     => 0,
            ]);
        }

        return redirect()->to(base_url('admin/datapemilih'));
    }

    // ----------------------------------------------------------------
    // LAPORAN
    // ----------------------------------------------------------------

    public function laporan()
    {
        $username = session()->get('username');

        $data = [
            'judul' => 'Laporan | Admin | Pilketos MTsN 2 Ende',
            'admin' => $this->adminModel->getAdmin($username),
            'menu'  => 'laporan',
        ];

        return view('layout/header', $data)
            . view('layout/navbar_admin', $data)
            . view('layout/sidebar', $data)
            . view('admin/admin_laporan', $data)
            . view('layout/footer');
    }
}
