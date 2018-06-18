<?php
require_once 'Controller/LoginController.php';
require_once 'Controller/AdminPanelController.php';

session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
    $controller = new \Controller\AdminPanelController();

    if(isset($_GET['action'])) {
        if($_GET['action'] == 'show_cards') {
            $controller->getCardPage();
        }
        elseif ($_GET['action'] == 'set_cards_name') {
            $controller->setCardName();
            $controller->getCardPage();
        }
        elseif ($_GET['action'] == 'set_card_validation') {
            $controller->setCardValidation();
            $controller->getCardPage();
        }
        elseif ($_GET['action'] == 'logout') {
            $controller->logOut();
        }
        else {
            $controller->getIndexPage();
        }
    }
    else {
        $controller->getIndexPage();
    }
}
else {
    $controller = new \Controller\LoginController();
    if(isset($_POST['login']) && isset($_POST['password']))
        $controller->logIn($_POST['login'], $_POST['password']);
    else
        $controller->showForm();
}