<div id="pagemiddle">
    <div id ="pagemiddleinner">
        <div id="imageslider">
            <ul class="image_slider_list">
                <div class="left_slide"><img src="<?php echo base_url(); ?>images/icons/slider_left.png" /></div>
                <div class="slider_image">
                    <?php $images = array("image-slider-1.jpg", "image-slider-2.jpg", 'image-slider-3.jpg', "image-slider-4.jpg");
                    foreach ($images as $key => $image) {
                        ?>
                        <li imageid="<?php print $key; ?>" class="image_list <?php ($key == 0 ? print 'current_slider'  : print 'hidden') ?>">
                            <img src="<?php echo base_url(); ?>images/slider/<?php print $image; ?>" />
                        </li>

                    <?php } ?>
                </div>
                <div class="right_slide"><img src="<?php echo base_url(); ?>images/icons/slider_right.png" /></div>
            </ul>
        </div>
    </div>
</div>