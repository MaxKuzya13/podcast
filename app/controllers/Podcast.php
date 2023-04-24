<?php

namespace Controller;


use Model\Session;
use Model\User;
use mysql_xdevapi\BaseResult;

defined('ROOTPATH') OR exit ('Access Denied');
// Podcast class

class Podcast
{
    use MainController;

    public function index($slug = null)
    {
        $ses = new Session();
        $user = new User();
        $podcast = new \Model\Podcast();

        $query = "select p.*,u.username, u.slug as user_slug from podcasts as p join users as u on u.id =p.user_id where p.slug = :slug limit 10";
        $data['row'] = $podcast->query($query, ['slug'=>$slug]);

        if($data['row'])
        {
            $data['row'] = $data['row'][0];

            if($ses->user('id') != $data['row']->user_id)
            {
                $query = "update podcasts set views = views + 1 where id = :id limit 1";
                $podcast->query($query, ['id'=>$data['row']->id]);

                // update popularity
                $days = ceil((time() - strtotime($data['row']->date)) / (60*60*24));
                $popularity = ($data['row']->views + 1 / $days);

                $query = "update podcasts set popularity = :pop where id = :id limit 1";
                $podcast->query($query, ['id'=>$data['row']->id, 'pop'=>$popularity]);


            }
        }
        $this->view('podcast', $data);
    }
}
