<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'data_admin';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['id_user', 'picture'];

    /**
     * Ambil data admin. Jika username diberikan, join dengan tabel user.
     */
    public function getAdmin(string $username = '')
    {
        if (empty($username)) {
            return $this->findAll();
        }

        return $this->db->table('data_admin')
            ->select('data_admin.*, user.nm_lengkap, user.gelar, user.username, user.role_id')
            ->join('user', 'user.id = data_admin.id_user')
            ->where('user.username', $username)
            ->get()
            ->getRowArray();
    }
}
