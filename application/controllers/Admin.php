<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model', 'user');
        $this->load->model('Admin_Model', 'admin');
        $this->load->model('Kandidat_Model', 'kandidat');
        $this->load->model('Pemilih_Model', 'pemilih');
        is_logged_in();
    }

    public function index()
    {
        $username = $this->session->userdata('username');

        $data = [
            'judul' => 'Dashboard | Admin | Pilketos MTsN 2 Ende',
            'admin' => $this->admin->getAdmin($username),
            'dataPoints' => [
                ["label" => "Chrome", "y" => 64.02],
                ["label" => "Firefox", "y" => 12.55],
                ["label" => "IE", "y" => 8.47],
                ["label" => "Safari", "y" => 6.08],
                ["label" => "Edge", "y" => 4.29],
                ["label" => "Others", "y" => 4.59]
            ],
            'menu' => 'dashboard'
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar_admin', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/admin_dashboard', $data);
        $this->load->view('layout/footer');
    }

    public function kandidat()
    {
        $username = $this->session->userdata('username');

        $data = [
            'judul' => 'Kandidat | Admin | Pilketos MTsN 2 Ende',
            'admin' => $this->admin->getAdmin($username),
            'menu' => 'kandidat',
            'kandidat' => $this->kandidat->getKandidat()
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar_admin', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/admin_kandidat', $data);
        $this->load->view('layout/footer');
    }

    public function tambahKandidat()
    {
        $username = $this->session->userdata('username');

        $data = [
            'judul' => 'Kandidat | Admin | Pilketos MTsN 2 Ende',
            'admin' => $this->admin->getAdmin($username),
            'menu' => 'addkandidat'
        ];

        // FORM VALIDATION
        $required_if = ($this->input->post('nm_wakil')) ? 'required' : '';
        $this->form_validation->set_rules('nm_ketua', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama Lengkap Ketua Harus Diisi!'
        ]);
        $this->form_validation->set_rules('pgl_ketua', 'Nama Panggilan', 'required|trim', [
            'required' => 'Nama Panggilan Ketua Harus Diisi!'
        ]);
        $this->form_validation->set_rules('pgl_wakil', 'Nama Panggilan Wakil', 'trim|' . $required_if, [
            'required' => 'Nama Panggilan Wakil Harus diisi!'
        ]);
        $this->form_validation->set_rules('visi', 'Visi', 'required|trim', [
            'required' => 'Visi harus diisi!'
        ]);
        $this->form_validation->set_rules('misi', 'Misi', 'required|trim', [
            'required' => 'Misi harus diisi!'
        ]);
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto Kandidat', 'required', [
                'required' => 'Foto harus diupload!'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar_admin', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('admin/admin_add_kandidat', $data);
            $this->load->view('layout/footer');
        } else {

            // UPLOAD FOTO             
            $foto = $_FILES['foto']['name'];

            if ($foto) {
                $config['allowed_types'] = 'png';
                $config['max_size'] = '3072';
                $config['upload_path'] = './assets/img/kandidat';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $uploaded_foto = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nm_ketua' => $this->input->post('nm_ketua'),
                'pgl_ketua' => $this->input->post('pgl_ketua'),
                'nm_wakil' => $this->input->post('nm_wakil'),
                'pgl_wakil' => $this->input->post('pgl_wakil'),
                'visi' => $this->input->post('visi'),
                'misi' => $this->input->post('misi'),
                'foto' => $uploaded_foto
            ];

            // upload ke database
            $this->kandidat->tambahKandidat($data);

            redirect('admin/kandidat');
        }
    }

    public function hapusKandidat($id)
    {
        $kan = $this->kandidat->getKandidat($id);

        $image = $kan['foto'];

        if ($image != 'default.png') {
            unlink(FCPATH . 'assets/img/kandidat/' . $image);
        }

        $this->kandidat->hapusKandidat($id);
        redirect('admin/kandidat');
    }

    public function dataPemilih()
    {
        $username = $this->session->userdata('username');

        $data = [
            'judul' => 'Data Pemilih | Admin | Pilketos MTsN 2 Ende',
            'admin' => $this->admin->getAdmin($username),
            'pemilih' => $this->pemilih->getPemilih(),
            'menu' => 'pemilih'
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar_admin', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/admin_data_pemilih', $data);
        $this->load->view('layout/footer');
    }

    public function download()
    {
        force_download('assets/document/data_pemilih.xlsx', NULL);
    }

    public function import_excel()
    {
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['filePemilih']['name']) && in_array($_FILES['filePemilih']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['filePemilih']['name']);
            $extension = end($arr_file);

            if ('xlsx' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }

            $spreadsheet = $reader->load($_FILES['filePemilih']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            foreach ($sheetData as $row => $value) {
                // SKIP HEADER
                if ($row == 0) {
                    continue;
                }

                $data = [
                    'username' => $value['1'],
                    'password' => $value['2'],
                    'nm_lengkap' => $value['3'],
                    'kelas' => $value['4'],
                    'gender' => $value['5'],
                    'status' => 0
                ];

                if ($data['username'] === NULL) {
                    continue;
                }

                $this->pemilih->insertPemilih($data);
            }

            redirect('admin/datapemilih');
        }
    }

    public function laporan()
    {
        $username = $this->session->userdata('username');

        $data = [
            'judul' => 'Laporan | Admin | Pilketos MTsN 2 Ende',
            'admin' => $this->admin->getAdmin($username),
            'menu' => 'laporan'
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar_admin', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/admin_laporan', $data);
        $this->load->view('layout/footer');
    }
}
