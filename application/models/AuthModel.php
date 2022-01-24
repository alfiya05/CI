<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{

    function AuthUser($username)
    {
        $this->db->select('*');
        $this->db->from('userdata');
        $this->db->where('username', $username);

        return $this->db->get()->row_array();
    }

    function CheckUser($d)
    {
        // print_r($d);
        $q = $this->db->get_where('userdata', array('username' => $d))->result();
        // print_r($q);
        // die;
        if (empty($q)) {
            return false;
            // echo 'empty';
        } else {
            return true;
            // echo "something";
        }
    }

    function AddUser($data)
    {

        $this->db->insert('userdata', $data);
        if ($this->db->affected_rows() == '1') {
            return true;
        } else {
            return false;
        }
    }
}
