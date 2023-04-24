<?php

namespace Controller;


use Model\Request;
use Model\User;

defined('ROOTPATH') OR exit ('Access Denied');
// Login class

class Login
{
    use MainController;

    public function index()
    {

        $data['user'] = new User();
        $req = new Request();
        if($req->posted())
        {
            $data['user']->login($_POST);
        }

        $this->view('login', $data);
    }
}
