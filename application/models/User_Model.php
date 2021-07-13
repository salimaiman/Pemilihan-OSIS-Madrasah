<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function getUser($username = false)
    {
        if ($username == false) {
            return $this->db->get('user')->result_array();
        }

        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
}
