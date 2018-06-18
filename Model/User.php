<?php


namespace Model;


class User {
    private $state = 0;

    public function checkLoginData($userName, $userPass)
    {
        if($userName === "admin" && $userPass === "admin") {
            $this->state = 1;
        }
        else $this->state = 0;
    }

    /**
     * @return int
     */
    public function getState(): int
    {
        return $this->state;
    }
}