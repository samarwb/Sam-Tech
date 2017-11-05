<?php include 'portal_header.php'; ?>
<section id="carouselSection" style="text-align:center">
	<div id="myCarousel" class="carousel slide">
			<div class="carousel-inner">
                            <?php $images = array('puja1.jpg','puja2.jpg','puja3.jpg','puja4.jpg');
                            foreach($images  as $key=>$img){?>
				<div  style="text-align:center"  class="item <?php print $key == 0 ? 'active' : ''; ?>">
                                    <div class="wrapper"><img src="<?php print base_url().'images/carousel/'.$img ?>" alt="business webebsite template">
					
					</div>
				</div>
                            <?php } ?>
			</div>
                        <div class="carousel-caption my_details">
                            <h2>Joydev Chatterjee <span class="bengali_purohit"> - Bengali Purohit</span></h2>
                            <p> (+91) 9916335287, (+91) 7406637209
                           <p>All kinds of pujas like Satyanarayana Puja, Laxmi Puja, Griha Pravesh, Bhumi Puja, Durga Puja, Marriage, upanayanam,
                           Shraddham etc service available.</p>
                                                <button type="button" class="btn btn-large btn-success" data-toggle="modal" data-target="#contactMeModal">Contact Me</button>
                          </div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div>
</section>
<!-- Sectionone ends ======================================== -->
<section id="middleSection">
<div class="container">
		<div class="row" style="text-align:center">
			<div class="span12">
			<div class="well well-small">
				<h4> Why do Puja ? </h4>
				<p>Pooja is the process of worshipping God with pure mind and heart. 
                                    It makes a strong relationship with God and make our soul Holly. <br/><br/></p>
			</div>
			</div>
			<div class="span2">
				<div class="well well-small">
					<h4>
					<div class="puja_type_wrapper">
                                            <div class="greha_prabesh"></div>
                                        </div>
					</h4>
					<a href="#"><small>Griha Prabesh</small></a>
				</div>
			</div>
			<div class="span2">
				<div class="well well-small">
                                    <h4>
					<div class="puja_type_wrapper">
                                            <div class="satyunarayana_puja"></div>
                                        </div>
					</h4>
					<a href="#"><small>Satyanarayana Puja</small></a>
				</div>
			</div>
			<div class="span2">
				<div class="well well-small">
					<h4>
					<div class="puja_type_wrapper">
                                            <div class="lakxmi_puja"></div>
                                        </div>
					</h4>
					<a href="#"><small>Lakshmi Puja</small></a>
				</div>
			</div>
                    <div class="span2">
				<div class="well well-small">
					<h4>
					<div class="puja_type_wrapper">
                                            <div class="ganesh_puja"></div>
                                        </div>
					</h4>
					<a href="#"><small>Ganesh Puja</small></a>
				</div>
			</div>
                    <div class="span2">
				<div class="well well-small">
					<h4>
					<div class="puja_type_wrapper">
                                            <div class="durga_puja"></div>
                                        </div>
					</h4>
					<a href="#"><small>Durga Puja</small></a>
				</div>
			</div>
                    <div class="span2">
				<div class="well well-small">
					<h4>
					<div class="puja_type_wrapper">
                                            <div class="marrige"></div>
                                        </div>
					</h4>
					<a href="#"><small>Marrige</small></a>
				</div>
			</div>
		</div>
		</div>
</section>
<section id="bodySection">
<div class="container">
<div class="row recent_work_wrapper">
	<h3 class="span12" style="text-align:center">My recent work <small>view all works </small></h3>
        <?php foreach($albums as $album) {
            $image_path = !empty($album->file_path)? ALBUM_IMAGE_DIRECTORY.$album->file_path : ALBUM_DEFAULT_IMAGE; ?>
	<div class="span4">
		<div class="thumbnail">
			<h4><?php print $album->album_name; ?></h4>
			<a href="#"><img class="gallary_pics" src="<?php print base_url().$image_path; ?>" class="img-responsive" alt="<?php print $album->album_name; ?>"></a>
			<p>
			<br/>
			<?php print strlen($album->album_desc) > 100 ? substr($album->album_desc, 0, 100).'...' : $album->album_desc  ; ?> <br/>
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
        <?php } ?>
	
</div>
<br/>
</div>
</section>
<?php include 'portal_footer.php'; ?>

