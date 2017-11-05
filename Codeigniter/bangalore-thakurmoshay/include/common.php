<?php
$domain_path = $_SERVER['SERVER_NAME'];
$parts = explode('.', $domain_path);
global $is_admin ;
if($parts[0] == 'admin'){
    $is_admin = TRUE;
}else{
    $is_admin = FALSE;
}

?>