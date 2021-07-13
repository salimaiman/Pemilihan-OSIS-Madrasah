<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model', 'user');
        is_logged_in();
    }

    public function index()
    {
        $id = $this->session->userdata('id');

        $data = [
            'judul' => 'Dashboard | Admin | Pilketos MTsN 2 Ende',
            'user' => $this->user->getUserById($id),
            'admin' => $this->db->get_where('data_admin', ['id_user' => $id])->row_array(),
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
        $id = $this->session->userdata('id');

        $data = [
            'judul' => 'Kandidat | Admin | Pilketos MTsN 2 Ende',
            'user' => $this->user->getUserById($id),
            'admin' => $this->db->get_where('data_admin', ['id_user' => $id])->row_array(),
            'menu' => 'kandidat'
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar_admin', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/admin_kandidat', $data);
        $this->load->view('layout/footer');
    }

    public function dataPemilih()
    {
        $id = $this->session->userdata('id');

        $data = [
            'judul' => 'Data Pemilih | Admin | Pilketos MTsN 2 Ende',
            'user' => $this->user->getUserById($id),
            'admin' => $this->db->get_where('data_admin', ['id_user' => $id])->row_array(),
            'menu' => 'pemilih'
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar_admin', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/admin_data_pemilih', $data);
        $this->load->view('layout/footer');
    }

    public function laporan()
    {
        $id = $this->session->userdata('id');

        $data = [
            'judul' => 'Laporan | Admin | Pilketos MTsN 2 Ende',
            'user' => $this->user->getUserById($id),
            'admin' => $this->db->get_where('data_admin', ['id_user' => $id])->row_array(),
            'menu' => 'laporan'
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar_admin', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/admin_laporan', $data);
        $this->load->view('layout/footer');
    }
}
