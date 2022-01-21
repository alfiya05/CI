<?php
defined('BASEPATH') or exit('No direct script access allowed');


class loginController extends CI_Controller
{

    public function index()
    {
        if (!$this->session->userdata('username')) {
            $this->load->view('login');
        } else {
            redirect(base_url() . 'index.php/loginController/dashboard');
        }
    }

    public function login()
    {
        // echo $this->session->userdata('username');

        if (!$this->session->userdata('username')) {

            $this->load->model('LoginModel');
            //$this->load->view('login');
            $this->form_validation->set_rules('username', 'username', 'required|trim');
            $this->form_validation->set_rules('password', 'password', 'required|trim');
            if ($this->form_validation->run() == false) {
                // print_r(validation_errors());
                // die;
                $this->session->set_tempdata('failure', 'All fields are Required!!', 5);
                $this->load->view('login');
            } else {

                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $user = $this->LoginModel->CheckUser($username);

                if ($user) {
                    if ($user['password'] == $password) {
                        $this->session->set_userdata(array('username' => $user['username'], 'id' => $user['id']));
                        //$this->load->view('dashboard', $user);
                        redirect(base_url() . 'index.php/loginController/dashboard');
                    } else {
                        $this->session->set_tempdata('failure', 'Authentication failed', 5);
                        $this->load->view('login');
                    }
                } else {
                    $this->session->set_tempdata('failure', 'User not register', 5);
                    $this->load->view('login');
                }
            }
        } else {
            redirect(base_url() . 'index.php/loginController/dashboard');
        }
    }

    public function dashboard()
    {
        $this->load->model('LoginModel');
        $username = $this->session->userdata('username');
        if ($username) {
            $data['user'] = $this->LoginModel->CheckUser($username);
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_tempdata('failure', 'You must login first!!', 5);
            redirect(base_url() . 'index.php/loginController/login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username', 'id');
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/loginController/login');
    }
}
