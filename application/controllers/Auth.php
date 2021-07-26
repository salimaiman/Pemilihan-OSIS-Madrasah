<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model', 'user');
    }

    public function index()
    {
        $data = [
            'judul' => 'Login | Pilketos MTsN 2 Ende'
        ];

        // FORM VALIDATION
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header_bfr_login', $data);
            $this->load->view('awal/login_page', $data);
            $this->load->view('layout/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->user->getUser($username);

        // jika user ada
        if ($user) {
            // jika password benar
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id' => $user['id'],
                    'username' => $username,
                    'role_id' => $user['role_id']
                ];

                $this->session->set_userdata($data);

                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else {
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata(
                    'style',
                    '<style>
                            .username {
                                border-color: #198754 !important;
                            }

                            .pass {
                                border-color: #ed1000 !important;
                            }
                    </style>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'style',
                '<style>
                        .field {
                            border-color: #ed1000 !important;
                        }
                </style>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('role_id');
        redirect('auth');
    }

    public function ubah()
    {
        $password = password_hash('wanto', PASSWORD_DEFAULT);
        $this->db->set('password', $password);
        $this->db->where('username', 'uncle_oneto');
        $this->db->update('user');
    }
}
