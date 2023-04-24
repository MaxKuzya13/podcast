<?php

namespace Controller;


use Model\Session;
use Model\User;

defined('ROOTPATH') OR exit ('Access Denied');
// Home class

class Home
{
    use MainController;

    public function index()
    {

        $user = new User();
        $podcast = new \Model\Podcast();

        $data['podcasters'] = $user->where(['role' => 'user']);

        $query = "select p.*,u.username, u.slug as user_slug from podcasts as p join users as u on u.id =p.user_id order by popularity desc limit 10";
        $data['rows'] = $podcast->query($query);

        $this->view('home', $data);
    }
}
