<?php

namespace App\Controllers;

use App\Models\KandidatModel;
use App\Models\PemilihModel;

class User extends BaseController
{
    protected KandidatModel $kandidatModel;
    protected PemilihModel $pemilihModel;

    public function __construct()
    {
        $this->kandidatModel = new KandidatModel();
        $this->pemilihModel = new PemilihModel();
    }

    public function index()
    {
        $username = session()->get('username');
        
        if (!$username) {
            return redirect()->to(base_url('auth'));
        }

        $pemilih = $this->pemilihModel->getPemilih($username);

        $data = [
            'judul' => 'Pemilihan | Pilketos MTsN 2 Ende',
            'kandidat' => $this->kandidatModel->getKandidat(),
            'pemilih' => $pemilih
        ];

        return view('peserta/landing', $data);
    }
}
