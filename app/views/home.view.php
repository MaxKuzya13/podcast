<?php $this->view('includes/header') ?>
<section class="class_13" >
    <div class="class_14" >
        <div class="class_15" >
            <h1 class="class_16"  >
                Tell your story to the world
                <br>
            </h1>
            <div class="class_17"  >
                Join the discussion. Login or Register with us!
                <br>
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
            </div>
        </div>
        <div class="class_18" >
            <img src="<?=ROOT?>/assets_home/images/young-people-using-smartphones-set_23-2148865366.jpg" class="class_19" >
        </div>
    </div>
</section>
<section class="class_20" >
    <div class="class_21" >
        <div backup="" class="class_22 item_class_2">
            <i class="bi bi-music-note-list class_23">
            </i>
            <h1 class="class_24"  >
                Unlimited Podcasts
                <br>
            </h1>
            <div class="class_25"  >
                make a type specimen book. It has survived not only five centuries
            </div>
        </div>
        <div  backup="" class="class_22 item_class_3">
            <i  class="bi bi-people-fill class_26">
            </i>
            <h1 class="class_24"  >
                Thousands of listeners
                <br>
            </h1>
            <div class="class_25"  >
                make a type specimen book. It has survived not only five centuries
            </div>
        </div>
        <div  backup="" class="class_22 item_class_4">
            <i  class="bi bi-music-player-fill class_27">
            </i>
            <h1 class="class_24"  >
                Listen Anywhere
                <br>
            </h1>
            <div class="class_25"  >
                make a type specimen book. It has survived not only five centuries
            </div>
        </div>
    </div>
</section>
<section class="class_13" >
    <div class="class_14" >
        <div class="class_29" >
            <div class="class_30" >
                <div class="class_31"  >
                    Popular podcastERs
                </div>
                <div class="class_32"  >
                    View All
                </div>
            </div>
            <?php if(!empty($podcasters)):?>
                <?php foreach ($podcasters as $row) :?>
                    <div class="class_33" >
                        <a href="<?=ROOT?>/profile/podcasts/<?=$row->slug?>" class="class_34" >
                            <img src="<?=get_image($row->image)?>" class="class_35" >
                        </a>
                        <div class="class_36" >
                            <a href="<?=ROOT?>/profile/podcasts/<?=$row->slug?>" class="class_37"  >
                                <?=esc($row->username)?>
                            </a>
                            <div class="class_38"  >
                                <?=$row->podcasts?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="class_39" >
            <div class="class_30" >
                <div class="class_31"  >
                    Popular podcasts
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


        </div>
    </div>
</section>

<?php $this->view('includes/footer') ?>






