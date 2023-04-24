<?php

namespace Controller;


use Model\Session;
use Model\User;

defined('ROOTPATH') OR exit ('Access Denied');
// Upload class

class Upload
{
    use MainController;

    public function index($action = null, $slug = null)
    {

        $data = [];
        $data['user']= new User();


        if($action == 'edit' || $action == 'delete')
        {
            $podcast = new \Model\Podcast();
            $data['row'] = $podcast->first(['slug'=>$slug]);
        }

        $data['action'] = $action;
        $data['slug'] = $slug;

        $this->view('upload', $data);
    }
}
