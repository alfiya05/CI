<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use  chriskacerguis\RestServer\RestController;


class ApiEmployeeController extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('EmployeeModel');
    }

    public function indexEmployee_get()
    {
        $emp = new EmployeeModel;
        $emp1 = $emp->get_employee();
        $this->response($emp1, 200);
    }

    public function addEmp_post()
    {
        $emp = new EmployeeModel;
        $data = [
            'firstname' =>  $this->input->post('firstname'),
            'lastname' =>  $this->input->post('lastname'),
            'email' => $this->input->post('email')
        ];
        $result = $emp->insert_emp($data);
        if ($result > 0) {
            $this->response([
                'status' => true,
                'message' => 'NEW EMPLOYEE CREATED'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO CREATE NEW EMPLOYEE'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function findEmp_get($id)
    {
        $emp = new EmployeeModel;
        $emp1 = $emp->find_emp($id);
        $this->response($emp1, 200);
    }

    public function updateEmp_put($id)
    {
        $emp = new EmployeeModel;
        $data = [
            'firstname' =>  $this->put('firstname'),
            'lastname' => $this->put('lastname'),
            'email' => $this->put('email')
        ];
        $result = $emp->update_emp($id, $data);
        if ($result > 0) {
            $this->response([
                'status' => true,
                'message' => 'EMPLOYEE UPDATED'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO UPDATE EMPLOYEE'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function deleteEmp_delete($id)
    {
        $emp = new EmployeeModel;
        $result = $emp->delete_emp($id);
        if ($result > 0) {
            $this->response([
                'status' => true,
                'message' => 'EMPLOYEE DELETED'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO DELETE EMPLOYEE'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
