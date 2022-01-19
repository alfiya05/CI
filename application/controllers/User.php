<?php

class User extends CI_Controller
{

    function index()
    {
        $this->load->model('User_model');
        $users = $this->User_model->all();
        $data = array();
        $data['users'] = $users;
        $this->load->view('list', $data);
    }

    function create()
    {
        $this->load->model('User_model');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_tempdata('failure', 'All fields are required!!', 5);
            $this->load->view('create');
        } else {
            $formData = array();
            $formData["Name"] = $this->input->post('name');
            $formData["Email"] = $this->input->post('email');
            $formData["Age"] = $this->input->post('age');
            $this->User_model->create($formData);
            $this->session->set_tempdata('success', 'Record Added Successfully!!', 5);
            redirect(base_url() . 'index.php/User');
        }
    }

    function edit($uId)
    {
        $this->load->model('User_model');
        $user = $this->User_model->getUser($uId);
        $data = array();
        $data['user'] = $user;

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');

        if ($this->form_validation->run() == false) {

            $this->session->set_tempdata('failure', 'All fields are Required!!', 5);
            $this->load->view('edit', $data);
        } else {
            $upData = array();
            $upData["Name"] = $this->input->post('name');
            $upData["Email"] = $this->input->post('email');
            $upData["Age"] = $this->input->post('age');
            $this->User_model->updateUser($uId, $upData);
            $this->session->set_tempdata('success', 'Record Updated Successfully!!', 5);
            redirect(base_url() . 'index.php/User');
        }
    }

    function delete($uId)
    {
        $this->load->model('User_model');
        $user = $this->User_model->getUser($uId);
        if (empty($user)) {
            $this->session->set_tempdata('failure', 'Record Not Deleted!!', 5);
            redirect(base_url() . 'index.php/User');
        } else {
            $this->User_model->deleteUser($uId);
            $this->session->set_tempdata('success', 'Record Deleted Successfully!!', 5);
            redirect(base_url() . 'index.php/User');
        }
    }
}
