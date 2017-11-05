<?php
global $is_login;
if (isset($this->session->userdata['logged_in'])) {
    $is_login = TRUE;
}else{
    $is_login = FALSE;
}
?>
