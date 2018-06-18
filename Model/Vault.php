<?php


namespace Model;


class Vault implements Model{
    private $path = '/var/rfidVault/access.log';
    private $state;

    public function readLogs() {
        $data = file_get_contents($this->path);
        str_replace('\n', '<br />\n', $data);
        $this->state = $data;
    }

    /**
     * @return mixed
     */
    public function getState() {
        return $this->state;
    }

}