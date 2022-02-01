<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use  chriskacerguis\RestServer\RestController;


class ApiAuthenticationController extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthenticationModel');
    }

    public function index_get()
    {
        echo "I am RESTful Login API";
    }

    public function login_post()
    {

        $user = new AuthenticationModel;
        $username = $this->post('username');
        $password = $this->post('password');
        if (!empty($username) && !empty($password)) {

            $res = $user->FindUser($username);

            if ($res > 0) {
                if ($res['password'] == $password) {

                    $jwt = new JWT;
                    $JwtSecretKey = "MyLoginKey";

                    $token_det = array(
                        'id' => $res['id'],
                        'username' => $res['username'],
                        'email' => $res['email'],

                    );
                    $token = $jwt->encode($token_det, $JwtSecretKey, 'HS256');

                    $arr = array(
                        'id' => $res['id'],
                        'token' => $token
                    );
                    $user->SaveToken($arr);
                    $this->response($res['firstname'] . " has Logged In Successfully! with token: " . $token, RestController::HTTP_OK);
                } else {

                    $this->response("Wrong Password", RestController::HTTP_BAD_REQUEST);
                }
            } else {

                $this->response("Invalid Username", RestController::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response("Enter both Username and Password", RestController::HTTP_BAD_REQUEST);
        }
    }

    public function register_post()
    {

        $user = new AuthenticationModel;
        $data = array(
            'firstname' => $this->post('firstname'),
            'lastname' => $this->post('lastname'),
            'username' => $this->post('username'),
            'email' => $this->post('email'),
            'password' => $this->post('password')
        );
        if (!empty($data['firstname']) && !empty($data['lastname']) && !empty($data['username']) && !empty($data['email']) && !empty($data['password'])) {
            if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $res = $user->CheckUser($data['username']);

                if ($res == false) {

                    $res1 = $user->CheckUserEmail($data['email']);

                    if ($res1 == false) {

                        $q = $user->AddUser($data);
                        if ($q == true) {
                            $jwt = new JWT;
                            $JwtSecretKey = "MyLoginKey";

                            $getid = $user->FindUser($data['username']);

                            $token_det = array(
                                'id' => $getid['id'],
                                'username' => $data['username'],
                                'email' => $data['email'],

                            );
                            $token = $jwt->encode($token_det, $JwtSecretKey, 'HS256');

                            $arr = array(
                                'id' => $getid['id'],
                                'token' => $token
                            );
                            $user->SaveToken($arr);
                            $this->response($data['firstname'] . " registered Successfully!! with token : " . $token, RestController::HTTP_OK);
                        } else {

                            $this->response("User not registered", RestController::HTTP_BAD_REQUEST);
                        }
                    } else {

                        $this->response("Email already taken", RestController::HTTP_BAD_REQUEST);
                    }
                } else {

                    $this->response("Username Already Taken", RestController::HTTP_BAD_REQUEST);
                }
            } else {

                $this->response("Enter a valid email address", RestController::HTTP_BAD_REQUEST);
            }
        } else {

            $this->response("Enter all the required fields", RestController::HTTP_BAD_REQUEST);
        }
    }
}
