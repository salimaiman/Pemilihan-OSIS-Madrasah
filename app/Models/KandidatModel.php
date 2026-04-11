<?php

namespace App\Models;

use CodeIgniter\Model;

class KandidatModel extends Model
{
    protected $table      = 'data_kandidat';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nm_ketua', 'pgl_ketua',
        'nm_wakil', 'pgl_wakil',
        'visi', 'misi', 'foto'
    ];

    public function getKandidat(int $id = 0)
    {
        if ($id === 0) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function tambahKandidat(array $data)
    {
        return $this->insert($data);
    }

    public function hapusKandidat(int $id)
    {
        return $this->delete($id);
    }
}
