<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
header("location: http://localhost/login/index.php/user_authentication/user_login_process");
}
?>
    <head>
        <title>Registration Form</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div id="main">
            <div id="login">
                <h2>Registration Form</h2>
                <hr/>
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";
                echo form_open('user_authentication/new_user_registration');

                echo form_label('First Name : ');
                echo"<br/>";
                echo form_input('fname');
                echo "<div class='error_msg'>";
                if (isset($message_display)) {
                    echo $message_display;
                }
                echo "</div>";
                echo"<br/>";

                echo form_label('Last Name : ');
                echo"<br/>";
                echo form_input('lname');
                echo "<div class='error_msg'>";
                if (isset($message_display)) {
                    echo $message_display;
                }
                echo "</div>";
                echo"<br/>";

                echo form_label('Email : ');
                echo"<br/>";
                $data = array(
                    'type' => 'email',
                    'name' => 'email'
                );
                echo form_input($data);
                echo"<br/>";
                echo"<br/>";
                echo form_label('Password : ');
                echo"<br/>";
                echo form_password('password');
                echo"<br/>";
                echo"<br/>";
                echo form_submit('submit', 'Sign Up');
                echo form_close();
                ?>
                <a href="<?php echo base_url() ?> ">For Login Click Here</a>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>