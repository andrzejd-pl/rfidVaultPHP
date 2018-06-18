<?php

namespace Controller;

require_once '../Model/User.php';
require_once '../View/LoginView.php';

use Model\User;
use View\LoginView;

class LoginController {
    private $userModel;
    private $loginView;

    public function __construct()
    {
        $this->userModel = new User();
        $this->loginView = new LoginView();
    }

    public function logIn($userName, $userPass)
    {
        $this->userModel->checkLoginData($userName, $userPass);
        if($this->userModel->getState() === 0) {
            $this->loginView->showLoginPage();
        }
        else if($this->userModel->getState() === 1) {
            $_SESSION['login'] = true;
        }
//        else ($this->userModel->getState() === -1) {
//            $this->loginView->showInvalidLoginPage();
//        }
    }

    public function showForm() {
        $this->loginView->showLoginPage();
    }
}