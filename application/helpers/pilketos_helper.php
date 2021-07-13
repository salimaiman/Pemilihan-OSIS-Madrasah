<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        if ($role_id == 1 && $menu != 'admin') {
            redirect('auth/blocked');
        } else if ($role_id == 2 && $menu == 'admin') {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $result = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

    if ($result->num_rows() > 0) {
        return "checked = 'checked'";
    }
}

function field_value($field)
{
    $ci = get_instance();
    $email = $ci->session->userdata('email');
    $value = "value=" . '"' . "<?= " . '$user' . "[$field]; ?>" . '"';

    $ci->load->model('Siswa_Model', 'siswa');

    $value_user = 'value="<?= $user[' . $field . ']; ?>"';
    $set_value = 'value="<?= set_value(' . "'$field'" . '); ?>"';


    if ($ci->siswa->cekData($email)) {
        return $value;
    }
    return $set_value;
}
