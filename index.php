<?php
require_once './Controller/LoginController.php';

session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
    echo 'ok';
}
else {
    $controller = new \Controller\LoginController();
    $controller->showForm();
}