<?php

namespace src\Controller;
use src\Templater\Template;

class Controller
{
    private $temp;
    public function __Construct()
    {
        $this->temp = new Template();
    }
    public function main()
    {
        $this->temp->set('header', $this->temp->getFile('view/Header.php'));
        $this->temp->render('view/Main.php');
    }
}
