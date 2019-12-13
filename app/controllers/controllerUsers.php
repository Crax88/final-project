<?php

class controllerUsers extends Controller {
  
    protected $access = [
        ['allow', 'actions' => ['register', 'login', 'logout'], 'privileges' => ['*']]
    ];

    public function __construct() {
        parent::__construct();
        $this->userModel = $this->model('User');
    }

    public function actionRegister() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->userModel->register();
                if ($data['success']) {
                    flashMsg('register_success', 'You are registerd and can log in');
                    redirect('users/login');
                } else {
                    $this->view('users/register', $data);
                }
        } else {
            $this->view('users/register');
        }
    }

    public function actionLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->userModel->login();
            if ($data['success']) {
                redirect('main/index');
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $this->view('users/login');
        }
    }

    public function actionLogout() {
        $this->userModel->logOut();
        redirect('users/login');
    }

}