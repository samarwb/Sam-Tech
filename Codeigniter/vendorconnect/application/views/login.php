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
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Login Form</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Vendor Connect welcomes you ...</p>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form role="form" method="post" action="<?php echo site_url('user/userlogin'); ?>">
					<input type="email" name="email" id="email" placeholder="Email Address" required=" " >
					<input type="password" name="password" placeholder="Password" required=" " >
					<div class="forgot">
						<a href="#">Forgot Password?</a>
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
			<h4 class="animated wow slideInUp" data-wow-delay=".5s">For New People</h4>
                        <p class="animated wow slideInUp" data-wow-delay=".5s"><a href="<?php print site_url('user/register');?>">Register Here</a> (Or) go back to <a href="<?php print base_url();?>">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->
    </div>
</div>

<div id="footer">
<?php include 'footer.php'; ?>
</div>

