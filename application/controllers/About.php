<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    public function index()  // this function will automatically invoke as this is the index function
    {

        $this->load->model("Authenticate");    //it can also be loaded at autoload. 
        $d = $this->Authenticate->getData(); //calling the function of authenticate class model and storing its value in d variable
        echo "<pre>";
        print_r($d); //printing the array that is being stored in the variable
        $this->load->view('about_msg');
    }
    public function demo() //this function need to be declared as  http://localhost/codeigniter/index.php/About/demo
    {
        echo "This is my first page!!!";
    }
}
