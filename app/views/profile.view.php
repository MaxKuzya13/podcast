<?php $this->view('includes/header') ?>
    <?php $ses = new \Model\Session(); ?>
    <section class="class_65" >
        <h1 class="class_56"  >
            Profile
        </h1>

        <?php if(!empty($row)): ?>
        <div class="class_66" >
            <div class="class_67" >
                <div class="class_68" >
                    <img src="<?=get_image($row->image, 'user')?>" class="class_69" >
                    <h1 class="class_70"  >
                        <?=esc($row->username)?>
                    </h1>
                </div>
                <a href="<?=ROOT?>/profile/<?=$row->slug?>" class="<?=$section == 'overview' ? 'class_71' : 'class_74'?>" >
                    <div class="class_75"  >
                        Overview
                    </div>
                    <i  class="bi bi-dropbox class_73">
                    </i>
                </a>

                <?php if($row->id == $ses->user('id')): ?>
                    <a href="<?=ROOT?>/profile/settings" class="<?=$section == 'settings' ? 'class_71' : 'class_74'?>" >
                        <div class="class_75"  >
                            Account Settings
                        </div>
                        <i  class="bi bi-gear-fill class_73">
                        </i>
                    </a>
                <?php endif;?>

                <a href="<?=ROOT?>/profile/podcasts/<?=$row->slug?>" class="<?=$section == 'podcasts' ? 'class_71' : 'class_74'?>" >
                    <div class="class_75"  >
                        Podcasts
                    </div>
                    <i  class="bi bi-list-task class_73">
                    </i>
                </a>
            </div>
            <div class="class_77" >

                <?php if(message()) :?>
                    <div class="class_78" >
                        <i  class="bi bi-info-circle-fill class_79">
                        </i>
                        <div class="class_32"  >
                            An error occurred!
                        </div>
                    </div>
                    <div class="class_81" >
                        <i class="bi bi-info-circle-fill class_79">
                        </i>
                        <div class="class_32"  >
                            Action successful!
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($section == 'overview') :?>
                <div class="class_30" >
                    <div class="class_31"  >
                        User Details
                    </div>
                </div>
                    <style>
                        td{
                            height: 4em;
                        }
                    </style>
                <table  class="item_class_1 class_84">
                    <tbody >
                    <tr >
                        <th  class="class_85">Username</th>
                        <td><?=esc($row->username)?></td>
                    </tr>
                    <tr >
                        <th  class="class_85">First name</th>
                        <td><?=esc($row->firstname)?></td>
                    </tr>
                    <tr >
                        <th  class="class_85">Last Name</th>
                        <td><?=esc($row->lastname)?></td>
                    </tr>
                    <tr >
                        <th  class="class_85">Email</th>
                        <td><?=esc($row->email)?></td>
                    </tr>
                    <tr >
                        <th  class="class_85">Podcasts</th>
                        <td><?=esc($row->podcasts)?></td>
                    </tr>
                    <td >
                        <td colspan="2", class="class_86" style="padding: 2em;">
                            <?=esc($row->bio)?>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <?php elseif($section == 'settings'): ?>

                <div class="class_30" >
                    <div class="class_87"  >
                        Edit User Details
                    </div>
                </div>
                    <form method="post" enctype="multipart/form-data">
                <table  class="item_class_1 class_84">
                    <tbody >
                    <tr>
                        <td colspan="2" style="padding: 10px; text-align: center; ">
                            <label>
                                <img src="<?=get_image($row->image)?>" style="width: 200px; height: 200px; object-fit: cover; cursor: pointer">
                                <input onchange="display_image(event)" type="file" name="image" style="display: none">

                                <script>
                                    function display_image(e)
                                    {
                                        let file = e.currentTarget.files[0];
                                        let allowed = ['image/jpeg', 'image/png', 'image/webp'];
                                        if(!allowed.includes(file.type))
                                        {
                                            alert('File type not valid! Files type allowed: '+allowed.toString().replaceAll('image/', ''));
                                            return;
                                        }

                                        e.currentTarget.parentNode.querySelector('img').src = URL.createObjectURL(file);

                                    }
                                </script>

                            </label>
                        </td>
                    </tr>
                    <tr >
                        <th  class="class_85">
                            Username
                        </th>
                        <td  class="class_88" style="flex-direction: column; text-align: left">
                            <input value="<?=old_value('username', $row->username)?>" placeholder="" type="text" name="username" class="class_89" >
                            <div><small style="color: red"><?=$user->getError('username')?></small></div>
                        </td>
                    </tr>
                    <tr >
                        <th  class="class_85">
                            First name
                        </th>
                        <td  class="class_88" style="flex-direction: column; text-align: left">
                            <input value="<?=old_value('firstname', $row->firstname)?>" placeholder="" type="text" name="firstname" class="class_89" >
                            <div><small style="color: red"><?=$user->getError('firstname')?></small></div>
                        </td>
                    </tr>
                    <tr >
                        <th  class="class_85">
                            Last Name
                        </th>
                        <td  class="class_88" style="flex-direction: column; text-align: left">
                            <input value="<?=old_value('lastname', $row->lastname)?>" placeholder="" type="text" name="lastname" class="class_89" >
                            <div><small style="color: red"><?=$user->getError('lastname')?></small></div>
                        </td>
                    </tr>
                    <tr >
                        <th  class="class_85">
                            Email
                        </th>
                        <td  class="class_88" style="flex-direction: column; text-align: left">
                            <input value="<?=old_value('email', $row->email)?>" placeholder="" type="text" name="email" class="class_89" >
                            <div><small style="color: red"><?=$user->getError('email')?></small></div>
                        </td>
                    </tr>
                    <tr >
                        <th  class="class_85">
                            Password
                        </th>
                        <td  class="class_88" style="flex-direction: column; text-align: left">
                            <input value="<?=old_value('password')?>" placeholder="leave empty to keep old password" type="text" name="password" class="class_89" >
                            <div><small style="color: red"><?=$user->getError('password')?></small></div>
                        </td>
                    </tr>
                    <tr >
                        <th  class="class_85">
                            Retype Password
                        </th>
                        <td  class="class_88" style="flex-direction: column; text-align: left">
                            <input placeholder="" type="text" name="retype_password" class="class_89" >
                        </td>
                    </tr>
                    <tr >
                        <th  class="class_85">
                            Bio
                        </th>
                        <td  class="class_88" style="flex-direction: column; text-align: left">
                            <textarea placeholder="" name="bio" class="class_96"><?=old_value('bio', $row->bio)?></textarea>
                            <div><small style="color: red"><?=$user->getError('bio')?></small></div>
                        </td>
                    </tr>
                    <tr >
                        <th  class="class_85">
                        </th>
                        <td  class="class_88" style="flex-direction: column; text-align: left">
                            <button class="class_98"  >
                                Save
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                    </form>

                <?php elseif ($section == 'podcasts'): ?>

                <div class="class_30" >
                    <div class="class_87"  >
                        Recent Podcasts
                    </div>
                    <?php if($ses->is_logged_in() && $ses->user('id') == $row->id): ?>
                        <div class="">
                            <a href="<?=ROOT?>/upload">
                            <button class="class_52">New Podcast</button>
                            </a>
                        </div>
                    <?php endif;?>
                </div>

                <?php if(!empty($recent)):?>
                    <?php foreach($recent as $podcast_row):?>
                        <div class="class_33" >
                            <a href="<?=ROOT?>/podcast/<?=$podcast_row->slug?>" class="class_42" >
                                <img src="<?=get_image($podcast_row->image)?>" backup="" class="class_43 item_class_10">
                            </a>
                            <div class="class_99" >
                                <a href="<?=ROOT?>/podcast/<?=$podcast_row->slug?>" class="class_45"  >
                                   <?=esc(ucfirst($podcast_row->title))?>
                                </a>
                                <div class="class_38"  >
                                    <a href="<?=ROOT?>/profile/<?=$podcast_row->user_slug?>"> By  <?=esc($podcast_row->username)?></a> <?=get_date($podcast_row->date)?>
                                </div>
                                <div class="class_46" >
                                    <audio controls="" class="class_47" >
                                        <source src="<?=ROOT . '/' . $podcast_row->file?>" type="audio/mpeg" >
                                    </audio>
                                </div>
                                <?php if($ses->is_logged_in() && $ses->user('id') == $row->id): ?>
                                    <div>
                                        <a href="<?=ROOT?>/upload/edit/<?=$podcast_row->slug?>">Edit</a>. Delete
                                        <a href="<?=ROOT?>/upload/delete/<?=$podcast_row->slug?>">Delete</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="padding: 10px; text-align: center; color: black">
                        No recent podcasts found!
                    </div>
                <?php endif; ?>
                    <div class="class_51">
                        <?php
                        $pager->first_li_class = "class_52";
                        $pager->next_li_class = "class_52";
                        $pager->active_styles = "background-color:rgb(0, 161, 231); color:white";
                        $pager->li_class = "class_54";
                        $pager->a_styles = "color: white; text-decoration: none";
                        $pager->display();
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php else: ?>
            <div class="class_78" >
                <i  class="bi bi-info-circle-fill class_79"></i>
                <div class="class_32"  >That user was not found</div>
            </div>
        <?php endif; ?>
    </section>

<?php $this->view('includes/footer') ?>