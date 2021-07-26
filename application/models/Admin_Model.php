<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    public function getAdmin($username = false)
    {
        if ($username == false) {
            return $this->db->get('data_admin')->result_array();
        }

        return $this->db->get_where('data_admin', ['username' => $username])->row_array();
    }
}
