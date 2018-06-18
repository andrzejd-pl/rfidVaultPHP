<?php


namespace Model;

require_once 'Model/Model.php';

class Cards implements Model{
    private $state;
    private $pathToKnown = '/var/rfidVault/knownCards';

    public function getState() {
        return $this->state;
    }

    public function readKnownCards() {
        $date = $this->readFile($this->pathToKnown);
        $this->state = '<form method="post" action="/?action=set_cards">';
        foreach ($date as $item) {
            $this->state .= $item[0] .
                ': <input type="text" value="'
                . $item[1]
                . '" name="cards['
                . $item[0]
                . '][name]" /> Validated: <input type="checkbox" name="cards['
                . $item[0]
                . '][validated]"/><br />'
                . PHP_EOL;
        }
        $this->state .= '<input type="submit" value="Send" /></form>';
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
}