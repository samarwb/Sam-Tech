<div id="what-we-do" class="what-we-do-carousel carousel slide" data-ride="carousel">
   <?php  $slides = array('slide1.png','slide2.png','slide3.png','slide4.png','slide5.png','slide6.png'); ?>
    <ol class="carousel-indicators">
        <?php foreach ($slides as $key => $value) { ?>
            <li data-target="#what-we-do" data-slide-to="<?php print $key;?>" class="<?php $key==0?print 'active':print '';?>"></li>
      <?php  } ?>
    </ol>
    <div class="carousel-inner what_we_do_carousel_inner" role="listbox">
        <?php foreach ($slides as $key => $value) { ?>
        <div class="item <?php $key==0?print 'active':print '';?>">
            <img src="<?php print base_url(); ?>/images/WhatWeDo/<?php print $value;?>" class="img-responsive">
        </div>
        <?php } ?>
    </div>
    <a class="left carousel-control" href="#what-we-do" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#what-we-do" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
