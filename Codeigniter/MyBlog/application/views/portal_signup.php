<!--Add page specific style -->
<link rel="stylesheet" href="<?php print base_url();?>assets/css/page_log_reg.css">

<?php include_once 'portal_header.php';
include_once 'portal_subheader.php';
?>

<div id="wrapper">
    <!--=== Registration Part ===-->
    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <form class="reg-page">
                    <div class="reg-header">
                        <h2>Register a new account</h2>
                        <p>Already Signed Up? Click <a href="page_login.html" class="color-green">Sign In</a> to login your account.</p>
                    </div>

                    <label>First Name</label>
                    <input type="text" class="form-control margin-bottom-20">

                    <label>Last Name</label>
                    <input type="text" class="form-control margin-bottom-20">

                    <label>Email Address <span class="color-red">*</span></label>
                    <input type="text" class="form-control margin-bottom-20">

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Password <span class="color-red">*</span></label>
                            <input type="password" class="form-control margin-bottom-20">
                        </div>
                        <div class="col-sm-6">
                            <label>Confirm Password <span class="color-red">*</span></label>
                            <input type="password" class="form-control margin-bottom-20">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-6 checkbox">
                            <label>
                                <input type="checkbox">
                                I read <a href="page_terms.html" class="color-green">Terms and Conditions</a>
                            </label>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button class="btn-u" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->
    <!--=== End Registration Part ===-->
</div>
<?php include_once 'portal_footer.php'; ?>