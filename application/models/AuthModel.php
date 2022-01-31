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

    function AddPost($post)
    {
        $this->db->insert('post', $post);
        if ($this->db->affected_rows() == '1') {
            return true;
        } else {
            return false;
        }
    }

    function Loadpost()
    {
        $this->db->select('t1.firstname, t2.title,t2.nfeed,t2.img_path,t2.timestamp');
        $this->db->from('userdata as t1');
        // $this->db->where('t1.id', $id);
        $this->db->join('post as t2', 't1.id = t2.id');

        $this->db->order_by('t2.timestamp', 'desc');

        // $q = $this->db->get()->result_array();
        return $this->db->get()->result_array();
        // echo "<pre>";
        // print_r($q);
        // return $q;
    }
}
