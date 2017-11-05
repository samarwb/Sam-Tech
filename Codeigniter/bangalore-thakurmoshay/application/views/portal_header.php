<div id="header">
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="google-site-verification" content="jGJw8EbmDCfGZwHbYDWP008bw9847Ye8X-is5wXfuIA" />
            <title>Bangalore Thakurmoshay</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Bengali purohit in Bangalore">
            <meta name="author" content="Joydev Chatterjee">
            <meta name="keywords" content="Bangalore Purohit,Purohit,Thakurmoshay,Bangalore Thakurmoshay,Bengali Purohit,Bengali Thakurmoshay,Bengali Purohit in Bangalore">
            <link rel="icon" href="<?php print base_url() . '/images/profile_image_small.png' ?>" type="image/gif" sizes="16x16">
            <link rel="shortcut icon" href="<?php print base_url() . '/images/profile_image_small.png' ?>">
            <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
            <link id="callCss" rel="stylesheet" href="<?php print base_url(); ?>themes/current/bootstrap.min.css" type="text/css" media="screen"/>
            <link href="<?php print base_url(); ?>themes/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
            <link href="<?php print base_url(); ?>themes/css/font-awesome.css" rel="stylesheet" type="text/css">
            <link href="<?php print base_url(); ?>themes/css/base.css" rel="stylesheet" type="text/css">
            <link href="<?php print base_url(); ?>css/style.css" rel="stylesheet" type="text/css">
            <style type="text/css" id="enject"></style>

            <script src="<?php print base_url(); ?>themes/js/jquery-1.8.3.min.js"></script>
            <script src="<?php print base_url(); ?>themes/js/bootstrap.min.js"></script>
            <script src="<?php print base_url(); ?>themes/js/bootstrap-tooltip.js"></script>
            <script src="<?php print base_url(); ?>themes/js/bootstrap-popover.js"></script>
            <script src="<?php print base_url(); ?>themes/js/business_ltd_1.0.js"></script>
            <link rel="stylesheet" href="<?php print base_url(); ?>themes/switch/themeswitch.css" type="text/css" media="screen" />
            <script src="<?php print base_url(); ?>themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
        </head>
        <?php
        $status_message = $this->session->flashdata('message_display');
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
            
            <div id="contactMeModal" style="display:none;" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Contact Me</h4>
                    </div>
                    <div class="modal-body">
                       <?php include 'contact_me_form.php'; ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
            
        <section id="headerSection">
            <div class="container">
                <div class="navbar">
                    <div class="container">
                        <button type="button" class="btn btn-navbar active" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a class="brand" href="<?php print base_url(); ?>">
                                <div class="profile_image"></div>
                                <div class="profile_title">Bangalore <small>  Thakurmoshay</small>
                                    <div class="profile_title_owner">Joydev Chatterjee (+91) 9916335287</div></div>
                            </a></h1>
                        <div class="nav-collapse collapse">
                            <?php ?>
                            <ul class="nav pull-right">
                                <li class="<?php arg(0) == '' ? print 'active'  : print ''; ?>"><a href="<?php print base_url(); ?>">Home</a></li>
                                <li class="<?php arg(2) == 'puja_service' ? print 'active'  : print ''; ?>"><a href="<?php print site_url('portal/puja_service'); ?>">Puja Services</a></li>
                                <li class="<?php arg(2) == 'about_me' ? print 'active'  : print ''; ?>"><a href="<?php print site_url('portal/about_me'); ?>">About Me</a></li>
                                <li class="<?php arg(2) == 'gallary' ? print 'active'  : print ''; ?>"><a href="<?php print site_url('portal/gallary'); ?>">Gallary</a></li>
                                <li class="<?php arg(2) == 'blog' ? print 'active'  : print ''; ?>"><a href="<?php print site_url('portal/blog'); ?>">Blog</a></li>
                                <li class="<?php arg(2) == 'contact_me' ? print 'active'  : print ''; ?>"><a href="<?php print site_url('portal/contact_me'); ?>">Contact Me</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </html>
</div>