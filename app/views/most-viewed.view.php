<?php $this->view('includes/header') ?>

    <div class="class_39" style="margin-left: auto; margin-right: auto; max-width: 60%;" >
        <div class="class_30" >
            <div class="class_31"  >
                Most viewed podcasts
            </div>
            <a href="<?=ROOT?>/popular" class="class_32"  >
                View All
            </a>
        </div>
        <?php if(!empty($rows)): ?>
            <?php foreach($rows as $row): ?>
                <div class="class_33" >
                    <a href="<?=ROOT?>/podcast/<?=$row->slug?>" class="class_42" >
                        <img src="<?=get_image($row->image)?>" backup="" class="class_43 item_class_5">
                    </a>
                    <div class="class_44" >
                        <a href="<?=ROOT?>/podcast/<?=$row->slug?>" class="class_45"  >
                            <?=esc(ucfirst($row->title))?>
                        </a>
                        <div class="class_38"  >
                            <a href="<?=ROOT?>/profile/<?=$row->user_slug?>"> By  <?=esc($row->username)?></a> <?=get_date($row->date)?>
                        </div>
                        <div class="class_46" >
                            <audio controls="" class="class_47" >
                                <source src="<?=ROOT?>/<?=$row->file?>" type="audio/mpeg" >
                            </audio>
                        </div>
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
    </div>


<?php $this->view('includes/footer') ?>