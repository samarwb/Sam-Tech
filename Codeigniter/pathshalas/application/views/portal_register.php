<?php include 'portal_header.php';
include 'submenu.php';
?>

<div id="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 left-side">
                    <header>
                        <span>Need an account?</span>
                        <h3>Create<br>Right Here..!!!</h3>
                    </header>
                </div>
                <div class="col-md-6 right-side">
                    <?php if($error = $this->session->flashdata('reg_failed')): ?>
                    <div class="alert alert-warning ">
                       <?php print $error; ?>
                    </div>
                    <?php endif;?>
                    <form action="portal/insertclient" method="POST">
                        <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="text" value="<?php echo set_value('fname'); ?>" name="fname" id="fname" />
                            <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="fname">
                                <span class="input__label-content input__label-content--hoshi">First Name</span>
                            </label>
                        </span>
                        <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="text" name="lname" id="lname" />
                            <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="lname">
                                <span class="input__label-content input__label-content--hoshi">Last Name</span>
                            </label>
                        </span>
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
                        <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="password" name="urpassword" id="password1" />
                            <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="password1">
                                <span class="input__label-content input__label-content--hoshi">Repeat Password</span>
                            </label>
                        </span>
                        
                        <div class="cta">
                            <button type="submit" class="btn btn-primary pull-left">Sign-Up Now</button>
                            <span><a href="<?php print base_url('index.php/portal/portallogin'); ?>">I am already a member</a></span>
                        </div>
                    </form>  
                    <?php
//                    echo validation_errors(); 
                    ?>
                </div>
            </div>
        </div>

        <!--</div>  end #main-wrapper -->


        <script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
        <script src ="<?php echo base_url(); ?>assets/js/input.js"></script>
    
</div>   
<?php include 'portal_footer.php' ?>
   
