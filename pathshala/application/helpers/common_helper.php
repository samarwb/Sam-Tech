<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

function get_user_current_details($details_type){
    $app_key = '9a7c177a-744a-4d7c-b29b-dc94f01e9d55';
    $my_ip = '122.166.231.241';
    //$my_ip = '122.166.145.60';
    if (isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP'] != '127.0.0.1')
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '127.0.0.1')
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']) && $_SERVER['HTTP_X_FORWARDED'] != '127.0.0.1')
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']) && $_SERVER['HTTP_FORWARDED_FOR'] != '127.0.0.1')
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']) && $_SERVER['HTTP_FORWARDED'] != '127.0.0.1')
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '127.0.0.1')
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    //echo "<script>console.log( 'Debug Objects: " . $ipaddress . "' );</script>";
   // $details = json_decode(file_get_contents("https://ipfind.co?ip=".$my_ip));
    $details =  unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$my_ip"));
    if($details_type == 'location'){
        $return = $details;
    }
    return $return;
}
