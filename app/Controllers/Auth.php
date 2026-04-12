<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PemilihModel;

class Auth extends BaseController
{
    protected UserModel $userModel;
    protected PemilihModel $pemilihModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pemilihModel = new PemilihModel();
    }

    public function index()
    {
        $data = ['judul' => 'Login | Pilketos MTsN 2 Ende'];

        if ($this->request->getMethod() === 'POST') {
            return $this->_login();
        }

        return view('layout/header_bfr_login', $data)
            . view('awal/login_page', $data)
            . view('layout/footer');
    }

    private function _login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            session()->setFlashdata('error', 'Username dan password harus diisi.');
            return redirect()->to(base_url('auth'));
        }

        $user = $this->userModel->getUser($username);

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id'       => $user['id'],
                'username' => $username,
                'role_id'  => $user['role_id'],
            ]);

            return $user['role_id'] == 1
                ? redirect()->to(base_url('admin'))
                : redirect()->to(base_url('user'));
        }

        $pemilih = $this->pemilihModel->getPemilih($username);

        // Fallback checks for plain text because excel import lacks hashing
        if ($pemilih && (password_verify($password, $pemilih['password']) || $password === $pemilih['password'])) {
            session()->set([
                'id'       => $pemilih['id'],
                'username' => $username,
                'role_id'  => 2, // arbitrary role_id for pemilih to distinguish from admin(1)
            ]);

            return redirect()->to(base_url('user'));
        }

        // Wrong credentials
        session()->setFlashdata('login_error', true);
        return redirect()->to(base_url('auth'));
    }

    public function logout()
    {
        session()->remove(['id', 'role_id', 'username']);
        return redirect()->to(base_url('auth'));
    }

    public function blocked()
    {
        return view('errors/403');
    }
}
