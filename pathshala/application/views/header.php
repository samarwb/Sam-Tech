<html>
    <head>
        
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>My Pathshala</title>

     <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon">
     <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/waypoints.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.counterup.js"></script>  

  <!-- Custom js -->
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script> 

    <!-- Font awesome -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/slick.css">          
    <!-- Theme color -->
    <link id="switcher" href="<?php echo base_url(); ?>assets/css/theme-color/default-theme.css" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!-- Custom js -->
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script> 
   
      
        <?php //include 'jsconstants.php'; ?>
    </head>
    <body>

<!--header-->
<div id="header">
    <?php
    if (isset($message_display)) {
        $message_class = '';
    } else {
        $message_class = 'hidden';
    }
    ?>
    <?php ?>
    <div class="common_message_wrapper">
        <div class="common_message_wrapper_inner <?php print $message_class; ?>">
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong id="common_message_id"><?php print $message_display; ?></strong>
            </div>
        </div>
    </div>
    <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span>info@my-pathshala.in</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>(+91) 7406637209</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
</div>	
	
<!--//header-->

</body>
</html>