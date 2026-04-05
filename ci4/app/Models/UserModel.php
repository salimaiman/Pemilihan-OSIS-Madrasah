<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['nm_lengkap', 'username', 'password', 'role_id'];

    public function getUser(string $username = '')
    {
        if (empty($username)) {
            return $this->findAll();
        }
        return $this->where('username', $username)->first();
    }

    public function getUserById(int $id)
    {
        return $this->find($id);
    }
}
