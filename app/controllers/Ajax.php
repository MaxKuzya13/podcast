<?php

namespace Controller;


use Model\Image;
use Model\Podcast;
use Model\Request;
use Model\Session;
use Model\User;

defined('ROOTPATH') OR exit ('Access Denied');
// Ajax class

class Ajax
{
    use MainController;

    public function index()
    {

        $ses = new Session();

        if(!$ses->is_logged_in())
            die;
        $info['success'] = false;
        $user = new User();
        $podcast = new Podcast();

        $req = new Request();
        $post_data = $req->post();


        if($req->posted() && !empty($post_data['data_type']))
        {
            $info['data_type'] = $post_data['data_type'];

            if ($post_data['data_type'] == 'delete_podcast' || $post_data['data_type'] == 'edit_podcast')
            {
                $slug = $post_data['slug'];
                $user_id = $ses->user('id');

                $row = $podcast->first(['slug'=>$slug, 'user_id'=>$user_id]);
            }

            if($post_data['data_type'] == 'new_podcast' || $post_data['data_type'] == 'edit_podcast')
            {

                $files = $req->files();
                $folder = 'uploads/';
                if(!file_exists($folder))
                {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder.'index.php', 'Access Denied');
                }

                // validate image
                $image_added = false;
                $file_added = false;

                foreach ($files as $key => $file)
                {
                    if($key == 'image' )
                    {
                        $allowed = ['image/jpeg', 'image/png', 'image/webp'];
                        $file_image = $file;

                        if (in_array($file['type'], $allowed)) {
                            $image_added = true;
                            $destination_image = $folder . time() . $file['name'];


                        } else {
                            $podcast->errors['image'] = "Image type not supported";
                        }
                    }else
                   if($key == 'file' )
                   {
                       $allowed = ['audio/mpeg'];
                       $file_file = $file;

                       if (in_array($file['type'], $allowed)) {
                           $file_added = true;
                           $destination_file = $folder . time() . $file['name'];

                       } else {
                           $podcast->errors['file'] = "Audio file type not supported";
                       }
                   }
                }

                if($podcast->validate($post_data))
                {

                    // move image file if exists
                    if($image_added)
                    {
                        move_uploaded_file($file_image['tmp_name'], $destination_image);
                        $post_data['image'] = $destination_image;

                        $image = new Image();
                        $image->resize($destination_image, 800);

                        // delete old image
                        if(!empty($row) && $post_data['data_type'] == 'edit_podcast')
                        {
                            if(file_exists($row->image))
                                unlink($row->image);
                        }

                    }

                    // move audio file if exists
                    if($file_added)
                    {
                        move_uploaded_file($file_file['tmp_name'], $destination_file);
                        $post_data['file'] = $destination_file;

                        // delete old audio files
                        if(!empty($row) && $post_data['data_type'] == 'edit_podcast')
                        {
                        if(file_exists($row->file))
                            unlink($row->file);
                        }
                    }
                    $info['success'] = true;

                    if($post_data['data_type'] == 'new_podcast')
                    {

                        $post_data['date'] = date('Y-m-d H:i:s');
                        $post_data['user_id'] = $ses->user('id');
                        $post_data['slug'] =  generate_slug($post_data['title']);


                        // check for unique slug
                        $num = 0;
                        while($num < 100 && $podcast->first(['slug'=>$post_data['slug']]))
                        {
                            $post_data['slug'] .=  rand(0, 9999);
                            $num++;
                        }
                        $podcast->insert($post_data);

                        // update podcast number
                       $query = "select count(*) as total from podcasts where user_id = :user_id";
                       $res = $podcast->query($query, ['user_id'=>$post_data['user_id']]);
                       $podcasts = $res[0]->total ?? 0;

                       $podcast->query("update users set podcasts = :podcasts where id = :id limit 1", ['id'=>$post_data['user_id'], 'podcasts'=>$podcasts]);
                    } else
                    if($post_data['data_type'] == 'edit_podcast')
                    {
                        $podcast->update($row->id, $post_data);
                    }
                }
                $info['errors'] = $podcast->errors;
            } else
            if($post_data['data_type'] == 'delete_podcast')
            {
                $user_id = $ses->user('id');
                $query = "delete from podcasts where user_id = :user_id && slug = :slug limit 1";

                $podcast->query($query, ['slug'=>$slug, 'user_id'=>$user_id]);

                $info['success'] = true;

                if(file_exists($row->image ?? ""))
                    unlink($row->image);

                if(file_exists($row->file ?? ""))
                    unlink($row->file);

                // update podcast number
                $query = "select count(*) as total from podcasts where user_id = :user_id";
                $res = $podcast->query($query, ['user_id'=>$user_id]);
                $podcasts = $res[0]->total ?? 0;
;
                $podcast->query("update users set podcasts = :podcasts where id = :id limit 1", ['id'=>$user_id, 'podcasts'=>$podcasts]);
            }
        }
//        $data['podcasters'] = $user->where(['role' => 'user']);

        echo json_encode($info);
    }
}
