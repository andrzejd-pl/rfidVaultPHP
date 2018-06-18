<?php

namespace Controller;

require_once 'Model/User.php';
require_once 'View/LoginView.php';

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
            $this->loginView->showLoginPage(false);
        }
        elseif($this->userModel->getState() === 1) {
            $_SESSION['login'] = true;
        }
        elseif ($this->userModel->getState() === -1) {
            $this->loginView->showLoginPage(true);
        }
    }

    public function showForm() {
        $this->loginView->showLoginPage(false);
    }
}