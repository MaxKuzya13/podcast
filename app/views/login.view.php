<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Podcast login</title>
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets_login/css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets_login/css/styles.css?8849">
</head>
<body>


<section class="class_1" >
    <div class="class_2" >
        <div class="class_3" >
            <div class="class_4" >
                <h1 class="class_5"  >
                    Login
                </h1>

                <a href="<?=ROOT?>" class="class_6"  >
                    Home
                </a>

                <a href="<?=ROOT?>/signup" class="class_6"  >
                    Signup
                </a>
            </div>
        </div>
    </div>

    <form method="post" class="class_7" >
        <h1 class="class_8"  >
            Login
        </h1>

        <?php if(message()): ?>
            <div style="border: solid thin red; color: red; padding: 10px; text-align: center"><?=message('', true)?></div>
        <?php endif; ?>

        <div class="class_9" >
            <label class="class_10"  >
                Email *
            </label>
            <input value="<?=old_value('email')?>" placeholder="" type="email" name="email" class="class_11">
            <div><small style="color: red"><?=$user->getError('email')?></small></div>
        </div>
        <div class="class_9" >
            <label class="class_10"  >
                Password *
            </label>
            <input value="<?=old_value('password')?>" placeholder="" type="password" name="password" class="class_11">
            <div><small style="color: red"><?=$user->getError('password')?></small></div>
        </div>
        <button class="class_12"  >
            Login
        </button>
    </form>
</section>

</body>
</html>