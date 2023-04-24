<?php

namespace Controller;


use Model\Pager;
use Model\Session;
use Model\User;

defined('ROOTPATH') OR exit ('Access Denied');
// Most_viewed class

class Most_viewed
{
    use MainController;

    public function index()
    {
        $limit = 10;
        $pager = new Pager($limit);
        $offset = $pager->offset;
        $data['pager'] = $pager;

        $user = new User();
        $podcast = new \Model\Podcast();

        $data['podcasters'] = $user->where(['role' => 'user']);

        $query = "select p.*,u.username, u.slug as user_slug from podcasts as p join users as u on u.id =p.user_id order by views desc limit $limit offset $offset";
        $data['rows'] = $podcast->query($query);


        $this->view('most-viewed', $data);
    }
}
