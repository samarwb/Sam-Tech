<?php
include 'portal_header.php';
include 'submenu.php';
?>

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
        
<!--        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/input.js"></script>
<?php include 'portal_footer.php' ?>
