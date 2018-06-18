<?php


namespace Model;


class Vault implements Model{
    private $path = '/var/rfidVault/access.log';
    private $state;

    public function readLogs() {
        $data = file_get_contents($this->path);
        $this->state = str_replace('\n', '<br />\n', $data);
    }

    public function getState() {
        return $this->state;
    }

}