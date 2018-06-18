<?php


namespace Model;

require_once 'Model/Model.php';

class Cards implements Model{
    private $state;
    private $pathToKnown = '/var/rfidVault/knownCards';
    private $pathToValid = '/var/rfidVault/validCards';

    public function getState() {
        return $this->state;
    }

    public function readKnownCards() {
        $date = file_get_contents($this->pathToKnown);
        $this->state = str_replace('\n', '<br />\n', $date);
    }
}