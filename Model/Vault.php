<?php


namespace Model;

require_once 'Model/Model.php';

class Vault implements Model{
    private $pathToLogFile = 'data/access.log';
    private $pathToAllCards = 'data/knownCards';
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
        $fileData = file_get_contents($path);

        $data = explode("\n", $fileData);
        foreach ($data as &$line) {
            $line = explode(';', $line);
        }

        var_dump($data);
        exit (0);

        return $data;
    }

    public function getState() {
        return $this->state;
    }

}