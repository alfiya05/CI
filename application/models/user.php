<?php

class User extends CI_model
{
    // function to invoke static data
    public function userData()
    {
        return [["Name" => "Jack", "Account" => "4445674"], ["Name" => "Jones", "Account" => "4335679"]];
    }

    // function to get data from database 
    public function getUserdata()
    {

        $this->load->database();
        $q = $this->db->query("select * from records");
        $a = $q->result_array();
        if (isset($a))
            return $a;
        // print_r($q);
    }
}
