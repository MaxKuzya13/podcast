<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=APP_NAME?> | Podcast</title>
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets_home/css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets_home/css/styles.css?7093">
</head>
<body>
<?php $ses = new \Model\Session(); ?>
<header class="class_1" >
    <div class="class_2" >
        <div class="class_3" style="text-decoration: none">
            <a href="<?=ROOT?>">
                <img src="<?=ROOT?>/assets_home/images/branding-identity-corporate-vector-logo-design_460848-8717.jpg" class="class_4" >
            </a>
        </div>
        <div class="class_5" >
            <a href="<?=ROOT?>" style="text-decoration: none">
                <h1  >
                    Podcast
                </h1>
            </a>
        </div>
        <div onclick="this.parentNode.parentNode.querySelector('section').style.display = 'block'" class="class_6" >
            <i  class="bi bi-list class_7">
            </i>
        </div>
    </div>
    <section onclick="this.style.display = 'none'" class="class_8" >
        <div onclick="event.stopPropagation()" class="class_9" >
            <div class="class_10" >
                <i onclick="this.parentNode.parentNode.parentNode.style.display = 'none'"  class="bi bi-x-lg class_11">
                </i>
            </div>
            <a href="<?=ROOT?>"  class="class_12 item_class_0">
                Home
            </a>
            <a href="<?=ROOT?>/podcasters"  class="class_12 item_class_0">
                Pod Casters
            </a>
            <a href="<?=ROOT?>/recent"  class="class_12 item_class_0">
                Recent
            </a>
            <a href="<?=ROOT?>/popular"  class="class_12 item_class_0">
                Popular
            </a>
            <a href="<?=ROOT?>/most-viewed"  class="class_12 item_class_0">
                Most Listened
            </a>
            <a href="<?=ROOT?>/about"  class="class_12 item_class_0">
                About us
            </a>
            <a href="<?=ROOT?>/contact"  class="class_12 item_class_0">
                Contact us
            </a>
            <?php if(!$ses->is_logged_in()): ?>
                <a href="<?=ROOT?>/login"  class="class_12 item_class_0">
                    Login
                </a>
            <?php endif; ?>
        </div>
    </section>
</header>
