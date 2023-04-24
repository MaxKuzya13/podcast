<?php

namespace Controller;


use Model\Pager;
use Model\Session;
use Model\User;

defined('ROOTPATH') OR exit ('Access Denied');
// Podcasters class

class Podcasters
{
    use MainController;

    public function index()
    {
        $limit = 10;
        $pager = new Pager($limit);
        $offset = $pager->offset;
        $data['pager'] = $pager;

        $user = new User();

        $user->order_column = 'popularity';
        $user->limit = $limit;
        $user->offset = $offset;
        $data['rows' ] = $user->where(['role'=>'user']);

        $this->view('podcasters', $data);
    }
}
