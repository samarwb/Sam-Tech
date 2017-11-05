<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
$uid = ($this->session->userdata['logged_in']['uid']);
$email = ($this->session->userdata['logged_in']['email']);
}
?>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>script/script.js"></script>
</head>
<body>
    <div id="header">
        <div id="hedaer_wrapper">
            <div id="hedaer_wrapper_inner"><div class="logo_wrapper">SamDiary.com</div></div>
        </div>
    </div> 
</body>
</html>