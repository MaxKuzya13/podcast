<?php $this->view('includes/header') ?>

<section class="class_55" >
    <h1 class="class_56"  >
        Podcasters
    </h1>

    <?php if(!empty($rows)):?>
    <div class="class_57" >
        <?php foreach ($rows as $row) :?>

            <a href="<?=ROOT?>/profile/<?=$row->slug?>" class="class_58" style="text-decoration: none">
                <img src="<?=get_image($row->image)?>" class="class_59" >
                <h1 class="class_60"  >
                    <?=esc($row->username)?>
                </h1>
                <div class="class_61"  >
                   <?=esc($row->podcasts)?>
                </div>
                <div class="class_32"  >
                    <?=esc($row->bio)?>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <?php else: ?>
        <div class="class_78" style="margin-top: 2em; margin-bottom: 2em">
            <i  class="bi bi-info-circle-fill class_79"></i>
            <div class="class_32"  >No records were found</div>
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
</section>

<?php $this->view('includes/footer') ?>
