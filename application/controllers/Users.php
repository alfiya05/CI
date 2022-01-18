<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Users extends CI_Controller
{

    public function index()
    {
        $this->load->model('User');
        $datas['users'] = $this->User->userData();   //calling function that has static data

        $datad['user'] = $this->User->getUserdata();  //calling function that will return array of data that has been invoked from database
        // print_r($datad);
        $this->load->view('userlist', $datas);
        $this->load->view('userlist', $datad);
    }
}
