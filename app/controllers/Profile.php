<?php

namespace Controller;


use Model\Image;
use Model\Pager;
use Model\Podcast;
use Model\Request;
use Model\Session;
use Model\User;
use Model\User_edit;

defined('ROOTPATH') OR exit ('Access Denied');
// Profile class

class Profile
{
    use MainController;

    public function index($slug = null)
    {
        $data['section'] = 'overview';

        $ses = new Session();
        $user = new User();

        if(empty($slug) && !$ses->is_logged_in())
            redirect('login');

        if(empty($slug) && $ses->is_logged_in())
            $slug = $ses->user('slug');

        $data['row'] = $user->first(['slug'=>$slug]);

        // update views and popularity
        if($data['row'] && $ses->user('id') != $data['row']->id)
        {
            $query = "update users set views = views + 1 where id = :id limit 1";
            $user->query($query, ['id'=>$data['row']->id]);

            // update popularity
            $days = ceil((time() - strtotime($data['row']->date)) / (60*60*24));
            $popularity = ($data['row']->views + 1 / $days);

            $query = "update podcasts set popularity = :pop where id = :id limit 1";
            $user->query($query, ['id'=>$data['row']->id, 'pop'=>$popularity]);


        }

        $this->view('profile', $data);
    }

    public function settings()
    {
        $data['section'] = 'settings';

        $ses = new Session();
        $req = new Request();
        if(!$ses->is_logged_in())
        {
            redirect('login');
        }
        $user = new User_edit();
        $data['user'] = $user;

        if(empty($slug) && $ses->is_logged_in())
            $slug = $ses->user('slug');

        $data['row'] = $user->first(['slug'=>$slug]);

        if($req->posted() && $data['row'])
        {

            $post_data = $req->post();
            //add row id for validation
            $post_data['id'] = $data['row']->id;

            // validate image
            $files = $req->files();
            $folder = 'uploads/';
            if(!file_exists($folder))
            {
                mkdir($folder, 0777, true);
                file_put_contents($folder.'index.php', 'Access Denied');
            }

            $image_added = false;

            foreach ($files as $file)
            {
                $allowed = ['image/jpeg', 'image/png', 'image/webp'];

                if(in_array($file['type'], $allowed))
                {
                    $image_added = true;
                    $destination = $folder . time() . $file['name'];

                }else{
                    $user->errors['image'] = "Image type not supported";
                }
            }

            if($user->validate($post_data))
            {

                // move image file if exists
                if($image_added)
                {
                    move_uploaded_file($file['tmp_name'], $destination);
                    $post_data['image'] = $destination;

                    $image = new Image();
                    $image->resize($destination, 800);

                    // delete old image
                    if(file_exists($data['row']->image))
                    {
                        unlink($data['row']->image);
                    }
                }
                // check if password is empty and ignore it
                if(empty($post_data['password']))
                    unset($post_data['password']);


                $user->update($data['row']->id, $post_data);
                redirect('profile/settings');
            }

        }

        $this->view('profile', $data);
    }

    public function podcasts($slug = null)
    {
        $data['section'] = 'podcasts';

        $limit = 10;
        $pager = new Pager($limit);
        $offset = $pager->offset;
        $data['pager'] = $pager;

        $ses = new Session();
        $user = new User();
        $podcast = new Podcast();

        if(empty($slug) && $ses->is_logged_in())
            $slug = $ses->user('slug');

        $data['row'] = $user->first(['slug'=>$slug]);

        if($data['row'])
        {
            $query = "select p.*,u.username, u.slug as user_slug from podcasts as p join users as u on u.id =p.user_id where p.user_id = :user_id order by id desc limit $limit offset $offset";
            $data['recent'] = $podcast->query($query, ['user_id'=>$data['row']->id]);

            // update views and popularity
            if($ses->user('id') != $data['row']->id)
            {
                $query = "update users set views = views + 1 where id = :id limit 1";
                $user->query($query, ['id'=>$data['row']->id]);

                // update popularity
                $days = ceil((time() - strtotime($data['row']->date)) / (60*60*24));
                $popularity = ($data['row']->views + 1 / $days);

                $query = "update podcasts set popularity = :pop where id = :id limit 1";
                $user->query($query, ['id'=>$data['row']->id, 'pop'=>$popularity]);


            }
        }



        $this->view('profile', $data);
    }
}
