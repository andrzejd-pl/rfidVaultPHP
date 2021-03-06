<?php


namespace View;


class LoginView {

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

    private function showForm()
    {
        ?>
        <form action="/" method="post">
            Login: <input type="text" name="login" /><br />
            Password: <input type="password" name="password"><br />
            <input type="submit" value="Log in" />
        </form>
        <?php
    }

    private function showInvalidLogin()
    {
        ?>
        <p>Invalid password or login!!!</p>
        <?php
    }

    public function showLoginPage(bool $invalid)
    {
        $this->showHeader();
        ($invalid)?$this->showInvalidLogin():(null);
        $this->showForm();
        $this->showFooter();
    }

}