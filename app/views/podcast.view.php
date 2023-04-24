<?php $this->view('includes/header') ?>

<?php if(!empty($row)):?>

        <div class="class_33" >
            <div class="class_42" >
                <img src="<?=get_image($row->image)?>" backup="" class="class_43 item_class_10">
            </div>
            <div class="class_99" >
                <div class="class_45"  >
                    <?=esc(ucfirst($row->title))?>
                </div>
                <div class="class_38"  >
                    <a href="<?=ROOT?>/profile/<?=$row->user_slug?>"> By  <?=esc($row->username)?></a> <?=get_date($row->date)?>
                </div>
                <div class="class_46" >
                    <audio controls="" class="class_47" >
                        <source src="<?=ROOT . '/' . $row->file?>" type="audio/mpeg" >
                    </audio>
                </div>
                <div style="padding: 10px"><?=esc($row->description)?></div>
            </div>
        </div>

<?php else: ?>
    <div style="padding: 10px; text-align: center; color: black">
        That podcast was not found!
    </div>
<?php endif; ?>

<?php $this->view('includes/footer') ?>
