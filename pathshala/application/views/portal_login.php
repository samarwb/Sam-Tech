<?php
include 'portal_header.php';
include 'submenu.php';
?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title></title>

        <!-- Stylesheets for register  -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>aportal/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>aportal/assets/css/portal_style.css">

        <!--Google Fonts-->
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    </head>

    <body>
        <!--<div class="container">-->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 left-side">
                    <header>
                        <span></span>
                        <h3>Already A Member<br>Login Here..!!!</h3>
                    </header>
                </div>
                <div class="col-md-6 right-side">
                    <?php if($error = $this->session->flashdata('login_failed')): ?>
                    <div class="alert alert-warning">
                        <?php print $error; ?>
                    </div>
                    <?php endif;?>
                    
                    <form action="loginvalid" method="POST">
                        <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="email" name="uemail" id="email" />
                            <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="email">
                                <span class="input__label-content input__label-content--hoshi">E-mail</span>
                            </label>
                        </span>
                        <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="password" name="upassword" id="password" />
                            <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="password">
                                <span class="input__label-content input__label-content--hoshi">Password</span>
                            </label>
                        </span>


                        <div class="cta">
                            <button type="submit" class="btn btn-primary pull-left">Sign-Up Now</button>
                            <span><a href="<?php print base_url('index.php/portal') ?>">Not a member?.. Register here.</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--</div>  end #main-wrapper -->

        <!-- Scripts -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>aportal/assets/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>aportal/assets/js/classie.js"></script>
        <script src="<?php echo base_url(); ?>aportal/assets/js/input.js"></script>
<?php include 'portal_footer.php' ?>
    </body>
</html>
