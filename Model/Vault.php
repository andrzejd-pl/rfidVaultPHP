<?php


namespace Model;

require_once 'Model/Model.php';

class Vault implements Model{
    private $pathToLogFile = '/var/rfidVault/access.log';
    private $pathToAllCards = '/var/rfidVault/knownCards';
    private $state;

    public function readLogs() {
        $data = file_get_contents($this->pathToLogFile);
        $cards = $this->readFile($this->pathToAllCards);
        foreach ($cards as $card) {
            $data = str_replace($card[0], $card[1], $data);
        }
        $this->state = str_replace("\n", "<br />\n", $data);
    }

    private function readFile($path) {
        $file = fopen($path, 'r');

        $data = array();

        while(!feof($file)) {
            $tmp = fgets($file);
            $tmp = str_replace("\n", "", $tmp);
            $data[] = explode(';', $tmp);
        }

        fclose($file);

        return $data;
    }

    public function getState() {
        return $this->state;
    }

}