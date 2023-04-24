<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Podcast signup</title>
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets_login/css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets_login/css/styles.css?8849">
</head>
<body>



<section class="class_1" >
    <div class="class_2" >
        <div class="class_3" >
            <div class="class_4" >
                <h1 class="class_5"  >
                   Signup
                </h1>
                <a href="<?=ROOT?>" class="class_6"  >
                    Home
                </a>
                <a href="<?=ROOT?>/login" class="class_6"  >
                    login
                </a>
            </div>
        </div>
    </div>
    <form method="post" class="class_7" >
        <h1 class="class_8"  >
            Signup
        </h1>
        <div class="class_9" >
            <label class="class_10"  >
                Username *
            </label>
            <input value="<?=old_value('username')?>" placeholder="" type="text" name="username" class="class_11"  required="">
            <div><small style="color: red"><?=$user->getError('username')?></small></div>
        </div>
        <div class="class_9" >
            <label class="class_10"  >
                First name *
            </label>
            <input value="<?=old_value('firstname')?>" placeholder="" type="text" name="firstname" class="class_11"  >
            <div><small style="color: red"><?=$user->getError('firstname')?></small></div>
        </div>
        <div class="class_9" >
            <label class="class_10"  >
                Last Name *
            </label>
            <input value="<?=old_value('lastname')?>" placeholder="" type="text" name="lastname" class="class_11"  >
            <div><small style="color: red"><?=$user->getError('lastname')?></small></div>
        </div>
        <div class="class_9" >
            <label class="class_10"  >
                Email *
            </label>
            <input value="<?=old_value('email')?>" placeholder="" type="email" name="email" class="class_11"  >
            <div><small style="color: red"><?=$user->getError('email')?></small></div>
        </div>
        <div class="class_9" >
            <label class="class_10"  >
                Password *
            </label>
            <input value="<?=old_value('password')?>" placeholder="" type="password" name="password" class="class_11" >
            <div><small style="color: red"><?=$user->getError('password')?></small></div>
        </div>
        <div class="class_9" >
            <label class="class_10"  >
                Retype Password *
            </label>
            <input value="<?=old_value('retype_password')?> "placeholder="" type="password" name="retype_password" class="class_11"  >
        </div>
        <button class="class_12"  >
            Register
        </button>
    </form>

</section>

</body>
</html>