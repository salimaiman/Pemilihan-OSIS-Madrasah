<?php

namespace App\Models;

use CodeIgniter\Model;

class PemilihModel extends Model
{
    protected $table      = 'data_pemilih';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'username', 'password',
        'nm_lengkap', 'kelas',
        'gender', 'status'
    ];

    public function getPemilih(string $username = '')
    {
        if (empty($username)) {
            return $this->findAll();
        }
        return $this->where('username', $username)->first();
    }

    public function getPemilihById(int $id)
    {
        return $this->find($id);
    }

    public function insertPemilih(array $data)
    {
        return $this->insert($data);
    }
}
