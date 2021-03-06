<?php


namespace View;

require_once 'Model/Model.php';
require_once 'Model/Cards.php';
require_once 'Model/Vault.php';

class AdminView {
    private $model;

    public function setModel(\Model\Model &$model) {
        $this->model = &$model;
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
            <li><a href="/?action=show_cards">Show all cards</a></li>
        </ul>
        <?php
    }

    public function show()
    {
        $this->showHeader();
        $this->showMenu();
        echo '<div>'.$this->model->getState().'</div>';
        $this->showFooter();
    }
}