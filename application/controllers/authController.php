<?php

defined('BASEPATH') or exit('No direct script access allowed');

class authController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        if (!$this->session->userdata('username')) {
            $this->load->view('authlogin');
        } else {
            redirect(base_url() . 'index.php/authController/authdashboard');
        }
    }


    public function authregister()
    {
        // $this->load->view('authregister');
        $this->load->model('AuthModel');
        $this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('user_name', 'user_name', 'required|trim');
        $this->form_validation->set_rules('pass_word', 'pass_word', 'required|trim');
        if ($this->form_validation->run() == false) {
            // print_r(validation_errors());
            // die;
            $this->session->set_tempdata('failure', 'All fields are Required!!', 5);
            $this->load->view('authregister');
        } else {
            $data = array(
                'firstname' => $this->input->post('first_name'),
                'lastname' => $this->input->post('last_name'),
                'username' => $this->input->post('user_name'),
                'password' => $this->input->post('pass_word')
            );

            // print_r($data);
            // die;

            $q = $this->AuthModel->CheckUser($data['username']);

            // print_r($q);
            // die;
            if ($q == true) {
                // echo "over";
                // die;
                $this->session->set_tempdata('failure', 'Username Already taken!!!!', 5);
                // $this->load->view('authregister');
                redirect(base_url() . 'index.php/authController/authregister');
            } else {

                // echo "reached";
                // die;
                $user = $this->AuthModel->AddUser($data);
                if ($user == true) {

                    $this->session->set_tempdata('success', 'Successfully registered!!!!', 5);
                    $this->load->view('authlogin');
                    redirect(base_url() . 'index.php/authController/authlogin');
                }
            }
        }
    }

    public function authlogin()
    {
        if (!$this->session->userdata('username')) {
            // $this->load->view('authlogin');
            $this->load->model('AuthModel');
            $this->form_validation->set_rules('username', 'username', 'required|trim');
            $this->form_validation->set_rules('password', 'password', 'required|trim');
            if ($this->form_validation->run() == false) {
                // print_r(validation_errors());
                // die;
                $this->session->set_tempdata('failure', 'All fields are Required!!', 5);
                $this->load->view('authlogin');
            } else {

                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $user = $this->AuthModel->AuthUser($username);
                $data['u'] = $user;
                if ($user) {
                    if ($user['password'] == $password) {
                        $this->session->set_userdata(array('username' => $user['username'], 'id' => $user['id']));
                        // $this->load->view('authdashboard', $data);
                        redirect(base_url() . 'index.php/authController/authdashboard');
                    } else {
                        $this->session->set_tempdata('failure', 'Authentication failed', 5);
                        $this->load->view('authlogin');
                    }
                } else {
                    $this->session->set_tempdata('failure', 'User not register', 5);
                    $this->load->view('authlogin');
                }
            }
        } else {
            redirect(base_url() . 'index.php/authController/authdashboard');
        }
    }


    public function authdashboard()
    {
        $this->load->model('AuthModel');
        $username = $this->session->userdata('username');
        if ($username) {
            $datas['user'] = $this->AuthModel->AuthUser($username);
            // print_r($datas);
            // die;
            $this->load->view('authdashboard', $datas);
        } else {
            $this->session->set_tempdata('failure', 'You must login first!!', 5);
            redirect(base_url() . 'index.php/authController/authlogin');
        }
    }



    public function authlogout()
    {
        $this->session->unset_userdata('username', 'id');
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/authController/authlogin');
    }
}
