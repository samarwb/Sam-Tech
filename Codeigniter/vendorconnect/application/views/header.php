<html>
    <head>


        <title>Vendor Connect</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Vendor Connect" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        
        <!-- js -->
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <script defer src="<?php echo base_url(); ?>js/jquery.flexslider.js"></script>

        <!-- //js -->
        <!-- cart -->
        <script src="<?php echo base_url(); ?>js/simpleCart.min.js"></script>
        <!-- cart -->
        <!-- for bootstrap working -->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-3.1.1.min.js"></script>
        <!-- //for bootstrap working -->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- timer -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.countdown.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/flexslider.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/search_style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/old_style.css" type="text/css" media="screen" />
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- //timer -->
        <!-- animation-effect -->
        <link href="<?php echo base_url(); ?>css/animate.min.css" rel="stylesheet"> 
        <script src="<?php echo base_url(); ?>js/wow.min.js"></script>
        <script type="text/javascript" src="<?php print base_url();?>js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>scripts/script.js"></script>
        <script>
            new WOW().init();
        </script>
        <!-- //animation-effect -->
        <?php include 'jsconstants.php'; ?>
    </head>
    <body>

        <?php
        include 'global.php';
        global $is_login;
        $status_message = $this->session->flashdata('message_display');
        if (isset($status_message)) {
            ?>
            <!--   Common status modal start        -->

            <script type="text/javascript">
                $(document).ready(function(){
                $("#statusModal").modal('show');
                });
            </script>
    <?php $title = ($status_message['type'] == 'warning') ? 'Warning' : 'Message'; ?>
            <div id="statusModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><?php print $title; ?></h4>
                        </div>
                        <div class="modal-body">
                            <p><?php print $status_message['message']; ?></p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                </div>
            </div>
            <!--Common status modal end        -->
<?php } ?>
            <?php include 'all_dialog.php'; ?>
        <!-- header -->
        <div class="header">
            <div class="container">
                <div class="header-grid">
                    <div class="header-grid-left header-login-wrapper animated wow slideInLeft" data-wow-delay=".5s">
                        <ul>
                            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:ivendorconnect@gmail.com">ivendorconnect@gmail.com</a></li>
                            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>9602685116</li>
                            <li>
<?php if (isset($this->session->userdata['logged_in'])) { ?>
                                    <i class="glyphicon glyphicon-log-out" aria-hidden="true"></i>
                                    <a href="<?php print site_url('user/logout'); ?>">Logout</a>
<?php } else { ?>
                                    <i class="glyphicon glyphicon-log-in" aria-hidden="true"></i>
                                    <a href="<?php print site_url('user/login'); ?>">Login</a>
<?php } ?>

                            </li>
                            <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="<?php print site_url('user/register') ?>">Register</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 header-search-wrapper">
                        <form method="post" action="<?php print site_url('search/productsearch'); ?>" class="header_search_form navbar-form navbar-left" role="search">
                            <div class="header_product_category_wrapper">
                                <select class="form-control" id="headerProductCategory" name="headercategory">
                                    <option value="">Categories</option>
                                    <?php foreach ($categories as $key => $cat) { ?>
                                        <option value="<?php print $cat->catid; ?>"><?php print $cat->cat_name; ?></option>
<?php } ?>  
                                </select>
                            
                                <input id="product_search_textbox" type="text" class="form-control search_text_fied" name="search_product" placeholder="Search">
                            <button type="submit" class="btn btn-default header_search_button"><span class="glyphicon glyphicon-search"></span></button>
                            </div>
                        </form>
                    </div>
                    <div class="header-grid-right header-facebook-wrapper animated wow slideInRight" data-wow-delay=".5s">
                        <ul class="social-icons">
                            <li><a href="#" class="facebook"></a></li>
                            <li><a href="#" class="g"></a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="logo-nav">
                    <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
                        <h1><a href="<?php print base_url(); ?>">VendorConnect <span>Find Easily, Manage Effectively</span></a></h1>
                    </div>
                    <div class="logo-nav-left1">
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header nav_2">
                                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div> 
                            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="<?php print base_url(); ?>" class="act">Home</a></li>	
                                    <!-- Mega Menu -->
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                                        <ul class="dropdown-menu multi-column columns-3">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <ul class="multi-column-dropdown">
                                                        <h6>
                                                            <?php if($is_login){?>
                                                            <a class="add_product_button" href="#addProductModal" data-type="main" data-toggle="modal">Main Product</a>
                                                            <?php } else{ ?>
                                                            <a class="please_login_button" href="#pleasLoginButton" data-text="You have to login to continue with add product." data-toggle="modal">Main Product</a>
                                                            <?php } ?>
                                                        </h6>
                                                        <li>Add what you Manufacture to our website. List all for free, have a personalized page, and manage what you want to show or hide.</a></li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="col-sm-5">
                                                    <ul class="multi-column-dropdown">
                                                        <h6>
                                                            <?php if($is_login){?>
                                                            <a class="add_product_button" href="#addProductModal" data-type="spare" data-toggle="modal">Unused/Used Spares</a>
                                                            <?php } else{ ?>
                                                            <a class="please_login_button" href="#pleasLoginButton" data-text="You have to login to continue with add product." data-toggle="modal">Unused/Used Spares</a>
                                                            <?php } ?></h6>
                                                        <li>Add what you have in abundance/want to get rid off, taking up your space. List for free, have a personalized page, and manage what you want to show or hide.</a></li>
                                                        </ul>
                                                </div>

                                                <div class="clearfix"></div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php print site_url('product/showmainproduct');?>" >AutoConnect</a>
<!--                                        <a href="<?php print site_url('product/showmainproduct');?>" class="dropdown-toggle" data-toggle="dropdown">AutoConnect <b class="caret"></b></a>-->
<!--                                        <ul class="dropdown-menu multi-column columns-3">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <ul class="multi-column-dropdown">
                                                        <h6>Search among a huge database of what sellers are selling, and contact them directly. Self-explanatory search model of ours.</h6>
                                                        </ul>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </ul>-->
                                    </li>
<!--                                    <li><a href="short-codes.html">Short Codes</a></li>-->
                                    <li><a href="#mail_to_us">Mail Us</a></li>
                                     <?php if($is_login){?> <li><a href="<?php print site_url('user/userprofileview'); ?>">My Profile</a></li> <?php } ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="logo-nav-right">
                        <div class="search-box">
                            
                        </div>
                       
                    </div>
                    <div class="header-right">
                        <div class="cart box_1">
                            <a href="<?php print site_url('user/checkout');?>">
                                <h3> <div class="total">
                                        <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
                                    <img src="<?php echo base_url(); ?>images/bag.png" alt="" />
                                </h3>
                            </a>
                            <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                            <div class="clearfix"> </div>
                        </div>	
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //header -->
    </body>
</html>