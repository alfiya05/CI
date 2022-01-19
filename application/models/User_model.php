<?php

class User_model extends CI_Model
{

    function create($formData)
    {

        $this->db->insert('register', $formData);
    }

    function all()
    {

        return $users = $this->db->get('register')->result_array();
    }

    function getUser($uid)
    {
        $this->db->where('id', $uid);
        return $user = $this->db->get('register')->row_array();
    }

    function updateUser($uid, $formData)
    {
        $this->db->where('id', $uid);
        $this->db->update('register', $formData);
    }

    function deleteUser($uid)
    {
        $this->db->where('id', $uid);
        $this->db->delete('register');
    }
}
