<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AuthenticationModel extends CI_Model
{
    function FindUser($username)
    {
        $this->db->select('*');
        $this->db->from('userdata');
        $this->db->where('username', $username);

        return $this->db->get()->row_array();
    }

    function CheckUser($username)
    {
        $q = $this->db->get_where('userdata', array('username' => $username))->result();

        if (empty($q)) {
            return false;
        } else {
            return true;
        }
    }


    function CheckUserEmail($email)
    {
        $q = $this->db->get_where('userdata', array('email' => $email))->result();

        if (empty($q)) {
            return false;
        } else {
            return true;
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

    function SaveToken($data)
    {
        if (empty($this->db->get_where('usertoken', array('id' => $data['id']))->result())) {

            $this->db->insert('usertoken', $data);
        } else {
            $this->db->where(array('id' => $data['id']));
            $this->db->update('usertoken', $data);
        }
    }
}
