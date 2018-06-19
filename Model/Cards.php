<?php


namespace Model;

require_once 'Model/Model.php';

class Cards implements Model{
    private $state;
    private $pathToKnown = 'data/knownCards';

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
        $fileData = file_get_contents($path);

        $fileData = explode("\n", $fileData);

        $data = array();
        foreach ($fileData as $line) {
            $data[] = explode(';', $line);
        }

        return $data;

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

    public function saveCards(array $cards) {
        $data = '';
        foreach ($cards as $uuid => $card) {
            $line = $uuid . ';' . $card['name'] . ';';
            if(isset($card['validated']) && $card['validated'] == 'on')
                $line = $line .  "1";
            else
                $line = $line . "0";
            $line = $line . PHP_EOL;
            $data = $data . $line;
        }

        file_put_contents($this->pathToKnown, $data);
    }
}