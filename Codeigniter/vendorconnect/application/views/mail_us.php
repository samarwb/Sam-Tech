<!-- Contact us container -->
	<div class="collections-bottom">
		<div class="container comment_wrapper" id='mail_to_us'>
			<h3>Mail Us</h3>
			<div class="col-md-10 comment_wrapper_text">
                            <p><span class="glyphicon glyphicon-phone"></span><span> Phone: +91-9602685116,+91-9654608941,+91-9871556074 </span></p>
                            <p><span class="glyphicon glyphicon-envelope"></span><span> Email: ivendorconnect@gmail.com </span></p>
                        </div>
			<div class="mail-grids">
				<div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<form role="form" id="contact_us_form" method="post" action="<?php echo site_url('admin_add_controllar/insertcontactus');?>" enctype="multipart/form-data">
                                            <input class="contact_us_input" type="text" value="Name" name="comment_name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
						<input class="contact_us_input" type="email" name="comment_email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                                                <input class="contact_us_input" type="text" value="Mobile" name="comment_mobile" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mobile';}" required="">
						<input class="contact_us_input" type="text" value="Subject" name="comment_subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" required="">
						<textarea class="contact_us_input" type="text" name="comments"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
						<button class="btn pull-right contact_us_send_button">Send</button>
					</form>
                                    <button type="button" class="hidden contact_us_modal_button" data-toggle="modal" data-target="#contactUsModel">Open Modal</button>
				</div>
				<div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<div class="mail-grid-right1">
                                            <?php $managers = array(array('name'=>'Anup Dangaich','image'=>'anup.jpg'),
                                                array('name'=>'Kumar Rishi','image'=>'rishi.png')) ?>
                                            <div id="vendorconnectManager" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#vendorconnectManager" data-slide-to="0" class="active"></li>
                                                    <li data-target="#vendorconnectManager" data-slide-to="1"></li>
                                                  </ol>
                                            <div class="mail_us_user_wrapper">
                                                <div class="carousel-inner" role="listbox">
                                                <?php foreach($managers as $key=>$manger){?>
                                                    <div class="item <?php ($key == 0) ? print 'active' : '';?>">
                                                        <div class="mail_us_manager_image">
                                                            <img src="<?php print base_url().USER_IMAGE_DIRECTORY.$manger['image'];?>" alt=" " class="img-responsive" />
                                                        </div>
                                                      <div class="mail_us_manager_details">
                                                        <h4><?php print $manger['name']; ?></h4>
                                                      </div>
                                                    </div>
                                                <?php } ?>
                                                   </div>
                                            </div>
                                            <div class="mail_us_details_wrapper">
						<ul class="phone-mail">
							<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
                                                            Phone: +91-9602685116,+91-9654608941,+91-9871556074</li>
							<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email: <a href="mailto:ivendorconnect@gmail.com">ivendorconnect@gmail.com</a></li>
						</ul>
						<ul class="social-icons">
							<li><a href="#" class="facebook"></a></li>
							<li><a href="#" class="twitter"></a></li>
							<li><a href="#" class="g"></a></li>
							<li><a href="#" class="instagram"></a></li>
						</ul>
                                            </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
	</div>
<!--Contact us container-->