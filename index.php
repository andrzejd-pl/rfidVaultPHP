<?php
require_once './Controller/LoginController.php';

session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
    echo 'ok';
}
else {
    $controller = new \Controller\LoginController();
    if(isset($_POST['login']) && isset($_POST['password'])) {
        $controller->logIn($_POST['login'], $_POST['password']);
        header('Location: /');
    }
    $controller->showForm();
}