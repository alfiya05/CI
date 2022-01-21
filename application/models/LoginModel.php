<?php
defined('BASEPATH') or exit('No direct script access allowed');


class LoginModel extends CI_Model
{
    function CheckUser($username)
    {
        $this->db->select('*');
        $this->db->from('userdata');
        $this->db->where('username', $username);

        return $this->db->get()->row_array();
    }
}
