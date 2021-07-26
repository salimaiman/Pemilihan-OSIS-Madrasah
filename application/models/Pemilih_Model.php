<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih_Model extends CI_Model
{
    public function getPemilih($nisn = false)
    {
        if ($nisn == false) {
            return $this->db->get('data_pemilih')->result_array();
        }

        return $this->db->get_where('data_pemilih', ['nisn' => $nisn])->row_array();
    }

    public function getPemilihById($id = false)
    {
        if ($id == false) {
            return $this->db->get('data_pemilih')->result_array();
        }

        return $this->db->get_where('data_pemilih', ['id' => $id])->row_array();
    }

    public function insertPemilih($data)
    {
        $this->db->insert('data_pemilih', $data);
    }
}
