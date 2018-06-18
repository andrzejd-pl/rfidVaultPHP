<?php


namespace Controller;

require_once 'Model/Cards.php';
require_once 'Model/Vault.php';
require_once 'View/AdminView.php';

class AdminPanelController {
    private $cardsModel;
    private $vaultModel;
    private $adminView;

    public function __construct() {
        $this->cardsModel = new \Model\Cards();
        $this->vaultModel = new \Model\Vault();
        $this->adminView = new \View\AdminView();
    }

    public function getIndexPage() {

    }

    public function getCardPage() {

    }

    public function setCardName() {

    }

    public function setCardValidation() {

    }

    public function logOut() {

    }
}