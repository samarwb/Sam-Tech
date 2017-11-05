<div id="header">
    <?php include 'header.php'; ?>
</div>

<div id="body_wrapper">
    <div id="content">
        <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php print base_url();?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- register -->
	<div class="register">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Register Here</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
				deserunt mollit anim id est laborum.</p>
			<div class="login-form-grids">
                           
                                 <form role="form" method="post" action="<?php echo site_url('user/userregistration'); ?>">
				<h5 class="animated wow slideInUp" data-wow-delay=".5s">profile information</h5>
				<div class="animated wow slideInUp" data-wow-delay=".5s">
					<input type="text" name="fullname"  id="first_name" placeholder="Company Name" required="" >
                                        <input type="text" name="mobile" id="last_name" placeholder="Mobile No" required="" >
                                        <input type="text" name="location" id="inputUserLocation"  placeholder="Your Location" required="">
                                        <input type="text" name="industrytype" id="industryType"  placeholder="Industry Type" required="">
				</div>
				
				<h6 class="animated wow slideInUp" data-wow-delay=".5s">Login information</h6>
				<div class="animated wow slideInUp" data-wow-delay=".5s">
					<input type="email" name="email" id="user_email" placeholder="Email Address" required=" " >
					<input type="password" name="password" id="password" placeholder="Password" required=" " >
					<input type="password" name="confirm_password" id="password_confirmation" placeholder="Password Confirmation" required=" " >
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" class="register_i_accept" name="checkbox">I accept the terms and conditions</label>
						</div>
					</div>
					<input type="submit" value="Register">
                                </div>       
				</form>
			</div>
			<div class="register-home animated wow slideInUp" data-wow-delay=".5s">
				<a href="<?php print base_url();?>">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->
    </div>
</div>

<div id="footer">
<?php include 'footer.php'; ?>
</div>

