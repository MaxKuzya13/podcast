<?php

namespace Controller;


use Model\Session;

defined('ROOTPATH') OR exit ('Access Denied');
// Logout class

class Logout
{
    use MainController;

    public function index()
    {
        $ses = new Session();
        $ses->logout();

        message('You`re now logged out');
        redirect('login');
    }
}
