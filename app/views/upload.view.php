<?php $this->view('includes/header') ?>
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets_upload/css/styles.css">

    <style>

    .prog {
        width: 100%;
        background-color: #ddd;
    }

    .prog-bar{
        width: 50%;
        background-color: blue;
        padding: 1px;
        color: white;
        font-size: 11px;
        text-align: center;
    }

    .hide {
        display: none;
    }

    *, ::after, ::before {
        box-sizing: border-box;
    }

    @font-face{
        src: url(OpenSans-Regular.ttf);
        font-family: opensans;
    }

    @font-face{
        src: url(DancingScript-VariableFont_wght.ttf);
        font-family: dancingscript;
    }

    @font-face{
        src: url(AmaticSC-Regular.ttf);
        font-family: amatic;
    }

    @font-face{
        src: url(SpecialElite-Regular.ttf);
        font-family: specialelite;
    }

    @font-face{
        src: url(Yellowtail-Regular.ttf);
        font-family: yellowtail;
    }

    @font-face{
        src: url(Segoe-UI.ttf);
        font-family: segoe;
    }

    @font-face{
        src: url(Segoe-UI-Bold.ttf);
        font-family: segoebold;
    }



    body{

        font-family: opensans;
        font-size: 16px;
        margin:0;
        padding:0;
        word-break: break-word;
        word-wrap: break-word;
    }


    .upload_class_1{

        background-color: rgb(255, 255, 255);
        padding: 10px;

    }

    .upload_class_2{

        width: 100%;
        max-width: 550px;
        padding: 20px;
        background-color: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
        border-radius: 10px;
        margin: auto;
        border: 1px solid rgb(166, 166, 166);

    }

    .upload_class_3{

        padding-left: 10px;
        padding-right: 10px;
        text-align: center;
        color: rgb(42, 21, 255);
        margin: 5px;
        left: -7px;

    }

    .upload_class_4{

        font-size: 40px;

    }

    .upload_class_5{

        padding: 10px;
        color: rgb(0, 0, 0);
        text-align: center;

    }

    .upload_class_6{

        width: 100%;
        height: 219px;
        object-fit: cover;
        border-radius: 10px;
        top: 174px;

    }

    .upload_class_7{

        display: block;
        margin: auto;

    }

    .upload_class_8{

        display: flex;
        margin-top:4px;
        margin-bottom: 4px;
        padding: 4px;
        align-items: center;

    }

    .upload_class_9{

        min-width: 50px;
        margin: 0.5rem 0.5rem 0.5rem 0px;
        display: inline-block;
        width: 147px;

    }

    .upload_class_10{

        display: block;
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: rgb(33, 37, 41);
        background-color: rgb(255, 255, 255);
        background-clip: padding-box;
        border: 1px solid rgb(206, 212, 218);
        appearance: none;
        border-radius: 0.375rem;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;

    }

    .upload_class_11{

        padding: 5px;

    }

    .upload_class_12{

        padding-top: 5px;
        padding-bottom: 5px;
        width: 100%;
    }

    .upload_class_13{

        width:100%;

    }

    .upload_class_14{

        font-size: 16px;
        padding: 10px;
        border: medium none;
        color: rgb(255, 255, 255);
        background-color: rgb(168, 168, 168);
        border-radius: 6px;
        margin: 0.25rem 0.125rem;
        cursor: pointer;

    }

    .upload_class_15{

        font-size: 16px;
        padding: 10px;
        border: medium none;
        color: rgb(255, 255, 255);
        background-color: rgb(253, 111, 59);
        border-radius: 6px;
        margin: 0.25rem 0.125rem;
        cursor: pointer;
        float: right;

    }

    @media screen and (max-width: 1200px){

    }

    @media screen and (max-width: 992px){

    }

    @media screen and (max-width: 768px){

    }

    @media screen and (max-width: 576px){

    }

</style>

    <section class="upload_class_1" >
        <form onsubmit="new_podcast(event)" method="post" enctype="multipart/form-data" class="upload_class_2" >
            <h1 class="upload_class_3"  >
                <?php if($action == 'edit'): ?>
                    Edit Podcast
                    <br>
                    <i  class="bi bi-volume-up-fill upload_class_4"></i>
                <?php elseif($action == 'delete'): ?>
                    Delete Podcast
                    <div style="font-size: 15px; border: solid thin red; color: red; padding: 10px; text-align: center">
                        Are you sure you want to delete this podcast?!
                    </div>
                <?php else: ?>
                    Add New Podcast
                    <br>
                    <i  class="bi bi-volume-up-fill upload_class_4"></i>
                <?php endif; ?>

            </h1>
            <label class="upload_class_5" style="display: block; cursor: pointer">
                <img src="<?=get_image($row->image ?? '')?>" class="upload_class_6" >
                <div><small style="color: red"><?=$user->getError('image')?></small></div>
                <input onchange="display_image(event)" type="file" name="image"  style="display: none" class="js-image upload_class_7">
                <script>
                    function display_image(e)
                    {
                        let file = e.currentTarget.files[0];
                        let allowed = ['image/jpeg', 'image/png', 'image/webp'];
                        if(!allowed.includes(file.type))
                        {
                            image_added = false;
                            alert('File type not valid! Files type allowed: '+allowed.toString().replaceAll('image/', ''));
                            return;
                        }

                        image_added = true;
                        e.currentTarget.parentNode.querySelector('img').src = URL.createObjectURL(file);
                    }

                </script>
            </label>
            <div class="upload_class_8" >
                <label class="upload_class_9"  >
                    Title
                </label>
                <input value="<?=old_value('title', $row->title ?? '')?>" placeholder="" type="text" name="title" class="js-title upload_class_10" >
                <div><small style="color: red"><?=$user->getError('title')?></small></div>
            </div>
            <div class="upload_class_8" >
                <label class="upload_class_9"  >
                    Description:
                </label>
                <input value="<?=old_value('description', $row->description ?? '')?>" placeholder="" type="text" name="description" class="js-description upload_class_10" >
                <div><small style="color: red"><?=$user->getError('description')?></small></div>
            </div>
            <div  class="upload_class_11" >
                Audio file:
            </div>
            <label for="">
                <input class="js-file" onchange="load_file(event)" type="file" name="file">
                <script>
                    function load_file(e)
                    {
                        let file = e.currentTarget.files[0];
                        let allowed = ['audio/mpeg'];
                        if(!allowed.includes(file.type))
                        {
                            file_added = false;
                            alert('File type not valid! Files type allowed: Mp3');
                            return;
                        }

                        file_added = true;
                        document.querySelector('.js-audio').src = URL.createObjectURL(file);
                    }

                </script>

            </label>
            <div><small style="color: red"><?=$user->getError('file')?></small></div>
            <div class="upload_class_12" >
                <audio controls="" class="js-audio upload_class_13" >
                    <source src="<?=ROOT?>/<?=old_value('file', $row->file ?? '')?>" type="audio/mpeg" >
                </audio>
            </div>
            <div class="prog js-prog hide">
                <div class="prog-bar js-prog-bar">0%</div>
            </div>
            <a href="<?=ROOT?>/profile/podcasts">
                <button type="button" class="upload_class_14"  >
                    Cancel
                </button>
            </a>
            <?php if($action == 'delete'):?>
                <button class="upload_class_15"  >
                    Delete
                </button>
            <?php else:?>
                <button class="upload_class_15"  >
                    Save
                </button>
            <?php endif;?>


        </form>
    </section>

<?php $this->view('includes/footer') ?>

<script>

    let image_added = false;
    let file_added = false;
    let mode = '<?=$action?>';

    function new_podcast(e)
    {
        e.preventDefault();
        let obj = {};
        obj.data_type = "new_podcast";

        if(mode == 'edit')
        {
            obj.data_type = "edit_podcast";
            obj.slug = '<?=$row->slug ?? ''?>';
        }



        if(mode == 'delete')
        {
            obj.data_type = "delete_podcast";
            obj.slug = '<?=$row->slug ?? ''?>';
        }


        obj.title = e.currentTarget.querySelector(".js-title").value.trim();
        obj.description = e.currentTarget.querySelector(".js-description").value.trim();

        if(mode != 'delete')
        {
            if(image_added)
                obj.image = e.currentTarget.querySelector(".js-image").files[0];

            if(file_added)
                obj.file = e.currentTarget.querySelector(".js-file").files[0];
        }


        if(obj.title == '')
        {
            alert("Please enter a valid title");
            e.currentTarget.querySelector(".js-title").focus();
            return;
        }

        if(mode == '')
        {
           if (typeof obj.image == 'undefined')
            {
                alert("Please enter a valid image");
                return;
            }

            if(typeof obj.file == 'undefined')
            {
                alert("Please enter a valid file");
                return;
            }
        }

        send_data(obj);

    }

    function send_data(obj)
    {
        let myform = new FormData();
        for(key in obj)
        {
            myform.append(key, obj[key]);
        }

        let progbar = document.querySelector(".js-prog-bar");
        progbar.style.width = '0%';
        progbar.innerHTML = '0%';
        document.querySelector(".js-prog").classList.remove("hide");

        var xhr = new XMLHttpRequest();

        xhr.upload.addEventListener('progress', function(e)
        {
            let percent = Math.round((e.loaded / e.total) * 100);
            progbar.style.width = percent + '%';
            progbar.innerHTML = percent + '%';
        });

        xhr.addEventListener('readystatechange', function()
        {
            if (xhr.readyState == 4)
            {
                if(xhr.status == 200)
                {
                    document.querySelector(".js-prog").classList.add("hide");
                    handle_result(xhr.responseText);
                } else {
                    alert('Could not send data. Please check your connection')
                }
            }
        });

        xhr.open('post', '<?=ROOT?>/ajax', true);
        xhr.send(myform);
    }

    function handle_result(result)
    {
        console.log(result);
        let obj = JSON.parse(result);
        if(obj.success)
        {
            window.location.href = '<?=ROOT?>/profile/podcasts';
        } else {
            alert("Please fix the errors");
            for (key in obj.errors){
                alert(obj.errors[key]);
            }
        }

    }
</script>


