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
        $this->adminView->setModel($this->vaultModel);
        $this->vaultModel->readLogs();
        $this->adminView->show();
    }

    public function getCardPage() {
        $this->adminView->setModel($this->cardsModel);
        $this->cardsModel->readKnownCards();
        $this->adminView->show();
    }

    public function setCardNameAndValidation() {
        $this->cardsModel->saveCards($_POST['cards']);
    }

    public function logOut() {
        unset($_SESSION['login']);
    }
}