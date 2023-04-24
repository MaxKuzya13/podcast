<?php

namespace Controller;


use Model\Request;
use Model\User;

defined('ROOTPATH') OR exit ('Access Denied');
// Signup class

class Signup
{
    use MainController;

    public function index()
    {

//        message('Signup are not allowed at the moment');
//        redirect('login');

        $data['user'] = new User();
        $req = new Request();
        if($req->posted())
        {
            $data['user']->signup($_POST);
        }

        $this->view('signup', $data);
    }
}
