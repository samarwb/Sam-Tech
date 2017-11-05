<head>
    <title>My Blog</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/header.css">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/footer.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/blog.css">
    <!-- JS Global Compulsory -->
    <script type="text/javascript" src="<?php print base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/plugins/jquery/jquery-migrate.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</head>

<?php include_once 'jsconstants.php'; ?>
<?php
$status_message = $this->session->flashdata('status_message');
if (isset($status_message)) {
    ?>
    <!--   Common status modal start        -->

    <script type="text/javascript">
        $(document).ready(function() {
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

<div id="header">
    <!--=== Header ===-->
    <div class="header">
        <div class="container">
            <!-- Logo -->
            <a class="logo" href="index.html">
                <img src="<?php print base_url(); ?>assets/img/logo1-default.png" alt="Logo">
            </a>
            <!-- End Logo -->

            <!-- Topbar -->
            <div class="topbar">
                <ul class="loginbar pull-right">
                    <li><a href="<?php print site_url('auth/signup'); ?>">Sign Up</a></li>
                    <li class="topbar-devider"></li>
                    <li><a href="<?php print site_url('auth/signin'); ?>">Sign In</a></li>
                </ul>
            </div>
            <!-- End Topbar -->

            <!-- Toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <!-- End Toggle -->
        </div><!--/end container-->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
            <div class="container">
                <ul class="nav navbar-nav">
                    <!-- Home -->
                    <li class="">
                        <a href="<?php print site_url('all/blogs'); ?>" class="" >
                            Home
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php print site_url('all/blogs'); ?>" class="" >
                            All Blogs
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php print site_url('my/blogs'); ?>" class="" >
                            My Blogs
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php print site_url('create/blogs'); ?>" class="" >
                            Create Blogs
                        </a>
                    </li>
                    <!-- End Home -->

                    <!-- Search Block -->
                    <li>
                        <i class="search fa fa-search search-btn"></i>
                        <div class="search-open">
                            <div class="input-group animated fadeInDown">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn-u" type="button">Go</button>
                                </span>
                            </div>
                        </div>
                    </li>
                    <!-- End Search Block -->
                </ul>
            </div><!--/end container-->
        </div><!--/navbar-collapse-->
    </div>
    <!--=== End Header ===-->
</div>
