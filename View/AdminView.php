<?php


namespace View;

require_once 'Model/Model.php';
require_once 'Model/Cards.php';
require_once 'Model/Vault.php';

class AdminView {
    private $model;

    /**
     * @param \Model\Model $model
     */
    public function setModel(\Model\Model $model): void {
        $this->model = $model;
    }

    private function showHeader()
    {
        ?>
        <html>
        <head>
            <meta charset="UTF-8" />
        </head>
        <body>
        <?php
    }

    private function showFooter()
    {
        ?>
        </body>
        </html>
        <?php
    }

    private function showMenu()
    {
        ?>
        <ul>
            <li><a href="/">Main page</a></li>
            <li>
                <ol>
                    <li><a href="/?action=show_cards">Show all cards</a></li>
                    <li><a href="/?action=set_card_name">Set card's nick</a></li>
                    <li><a href="/?action=set_card_name">Set validated card</a></li>
                </ol>
            </li>
        </ul>
        <?php
    }

    public function show()
    {
        $this->showHeader();
        $this->showMenu();
        echo $this->model->getState();
        $this->showFooter();
    }
}