<?php include 'portal_header.php'; ?>
<?php include 'portal_subheader.php'; ?>

<!-- Page banner end -->
<section id="bodySection">
    <div id="sectionTwo"> 	
        <div class="container">	
            <div class="row">
                <div class="span12">

                    <div class="row">

                        <div class="span12">
                            <div class="tabbable tabs">
                                <div class="tab-content label-primary">
                                    <div class="tab-pane active" id="all">
                                        <ul class="thumbnails">

                                            <?php foreach ($albums as $album) {
                                                $image_path = !empty($album->file_path) ? ALBUM_IMAGE_DIRECTORY . $album->file_path : ALBUM_DEFAULT_IMAGE;
                                                ?>


                                                <li class="span3">
                                                    <div class="thumbnail">
                                                        <div class="blockDtl">
                                                            <h4 class="gallary_title"><?php print $album->album_name; ?></h4>
                                                            <img class="gallary_pics zoom" src="<?php print base_url() . $image_path; ?>" alt="<?php print $album->album_name; ?>"/>
                                                            <p class="gallary_description">
                                                                <?php print strlen($album->album_desc) > 100 ? substr($album->album_desc, 0, 100).'...' : $album->album_desc ; ?> 
                                                            </p>
                                                            <div class="btn-toolbar">
                                                                <div class="btn-group toolTipgroup">
                                                                    <a class="btn" href="#" data-placement="right" data-original-title="send email"><i class="icon-envelope"></i></a>
                                                                    <a class="btn" href="#" data-placement="top" data-original-title="do you like?"><i class="icon-thumbs-up"></i></a>
                                                                    <a class="btn" href="#" data-placement="top" data-original-title="dont like?"><i class="icon-thumbs-down"></i></a>
                                                                    <a class="btn" href="#" data-placement="top" data-original-title="share"><i class="icon-link"></i></a>
                                                                    <a class="btn" href="#" data-placement="left" data-original-title="browse"><i class="icon-globe"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
<?php } ?>


                                        </ul>
                                        <div class="pagination pull-right hidden">
                                            <ul>
                                                <li><a href="#">Prev</a></li>
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">Next</a></li>
                                            </ul>
                                        </div>	
                                    </div>
                                </div>
                            </div> <!-- /tabbable -->


                        </div>
                    </div>
                    <!-- ========================= -->
                </div>

            </div>

        </div>

    </div>
</section>
<?php
include 'portal_footer.php';
