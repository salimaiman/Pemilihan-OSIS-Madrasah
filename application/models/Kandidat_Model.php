<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kandidat_Model extends CI_Model
{
    public function getKandidat($id = false)
    {
        if ($id == false) {
            return $this->db->get('data_kandidat')->result_array();
        }

        return $this->db->get_where('data_kandidat', ['id' => $id])->row_array();
    }

    public function tambahKandidat($data)
    {
        $this->db->insert('data_kandidat', $data);
    }

    public function hapusKandidat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_kandidat');
    }
}
