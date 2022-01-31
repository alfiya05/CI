<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Acontroller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }

    public function index()
    {
        if (!$this->session->userdata('username')) {
            redirect(base_url() . 'index.php/Authentication/Acontroller/alogin');
        } else {
            redirect(base_url() . 'index.php/Authentication/Acontroller/home');
        }
    }

    public function aregister()
    {
        $this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('user_name', 'user_name', 'required|trim');
        $this->form_validation->set_rules('pass_word', 'pass_word', 'required|trim');
        if ($this->form_validation->run() == false) {
            // print_r(validation_errors());
            // die;
            $this->session->mark_as_flash('failure', 'All fields are Required!!');
            $this->load->view('loginview/aregister');
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
                $this->session->set_flashdata('failure', 'Username Already taken!!!!');
                // $this->load->view('loginview/aregister');
                redirect(base_url() . 'index.php/Authentication/Acontroller/aregister');
            } else {

                // echo "reached";
                // die;
                $user = $this->AuthModel->AddUser($data);
                if ($user == true) {

                    $this->session->set_flashdata('success', 'Successfully registered!!!!');
                    $this->load->view('loginview/alogin');
                    redirect(base_url() . 'index.php/Authentication/Acontroller/alogin');
                }
            }
        }
        // }
    }


    public function alogin()
    {
        // print_r($this->session->userdata('username'));
        // exit;
        if (!$this->session->userdata('username')) {
            // $this->load->view('loginview/alogin');
            // $this->load->model('AuthModel');
            $this->form_validation->set_rules('username', 'username', 'required|trim');
            $this->form_validation->set_rules('password', 'password', 'required|trim');
            if ($this->form_validation->run() == false) {
                // print_r(validation_errors());
                // die;
                $this->session->mark_as_flash('failure', 'All fields are Required!!');
                $this->load->view('loginview/alogin');
            } else {

                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $user = $this->AuthModel->AuthUser($username);
                $data['u'] = $user;
                if ($user) {
                    if ($user['password'] == $password) {
                        $this->session->set_userdata(array('username' => $user['username'], 'id' => $user['id']));
                        // $this->load->view('authdashboard', $data);
                        redirect(base_url() . 'index.php/Authentication/Acontroller/home');
                    } else {
                        // echo "error";
                        // die;
                        $this->session->set_flashdata('failure', 'Authentication failed');
                        $this->load->view('loginview/alogin');
                    }
                } else {
                    // echo "error12";
                    // die;
                    $this->session->set_flashdata('failure', 'User not register');
                    $this->load->view('loginview/alogin');
                }
            }
        } else {
            redirect(base_url() . 'index.php/Authentication/Acontroller/home');
        }
    }

    public function adashboard()
    {
        // $this->load->model('AuthModel');
        $username = $this->session->userdata('username');
        if ($username) {
            $datas['user'] = $this->AuthModel->AuthUser($username);
            // print_r($datas);
            // die;
            $this->load->view('loginview/adashboard', $datas);
        } else {
            $this->session->set_flashdata('failure', 'You must login first!!');
            redirect(base_url() . 'index.php/Authentication/Acontroller/alogin');
        }
    }
    public function home()
    {
        // $this->load->model('AuthModel');
        $id = $this->session->userdata('id');
        if ($id) {
            // $datas['user'] = $this->AuthModel->AuthUser($id);
            // print_r($datas);
            // die;
            $data['posts'] = $this->AuthModel->LoadPost($id);
            // echo "<pre>";
            // print_r($data);
            // die;
            $this->load->view('loginview/home', $data);
        } else {
            $this->session->set_flashdata('failure', 'You must login first!!');
            redirect(base_url() . 'index.php/Authentication/Acontroller/alogin');
        }
    }

    public function post()
    {
        // print_r($_FILES);
        // print_r($_FILES['img']);
        // $config['upload_path'] = base_url() . 'index.php/uploads/';
        // $this->load->model('AuthModel');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->upload->initialize($config);
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('nfeed', 'nfeed', 'required');
        // $this->load->library('upload', $config);
        // $this->upload->do_upload('img');
        if (!$this->upload->do_upload('img') && $this->form_validation->run() == false) {
            // echo "error";
            // echo $this->upload->display_errors();
            // die;
            $this->session->set_flashdata('failure', 'File Not Uploaded!!');
            redirect(base_url() . 'index.php/Authentication/Acontroller/home');
        } else {
            // echo "reached here";
            $post = $this->input->post();
            // print_r($post);
            // die;

            $data = $this->upload->data();
            // echo "<pre>";
            // var_dump($data);
            $img_path = base_url('uploads/' . $data['raw_name'] . $data['file_ext']);
            $post['img_path'] = $img_path;
            // echo $post['img_path'];
            // print_r($post);
            $q = $this->AuthModel->AddPost($post);
            // print_r($q);
            $this->session->set_flashdata('success', 'File Uploaded!!');
            redirect(base_url() . 'index.php/Authentication/Acontroller/home');
            // $this->load->view('loginview/home', $data);
        }
    }


    public function alogout()
    {
        $this->session->unset_userdata('username', 'id');
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/Authentication/Acontroller/alogin');
    }
}
