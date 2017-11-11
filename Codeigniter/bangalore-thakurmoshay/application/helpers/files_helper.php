<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function get_user_current_details($details_type) {
    $app_key = '9a7c177a-744a-4d7c-b29b-dc94f01e9d55';
    $my_ip = '122.166.231.241';
    //$my_ip = '122.166.145.60';
    if (isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP'] != '127.0.0.1')
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '127.0.0.1')
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']) && $_SERVER['HTTP_X_FORWARDED'] != '127.0.0.1')
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']) && $_SERVER['HTTP_FORWARDED_FOR'] != '127.0.0.1')
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']) && $_SERVER['HTTP_FORWARDED'] != '127.0.0.1')
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '127.0.0.1')
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    //echo "<script>console.log( 'Debug Objects: " . $ipaddress . "' );</script>";
    // $details = json_decode(file_get_contents("https://ipfind.co?ip=".$my_ip));
    $details = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$my_ip"));
    if ($details_type == 'location') {
        $return = $details;
    }
    return $return;
}

function upload_files($table_name,$reference_id){
    $all_files = $_FILES['images']['name'];
    $CI = get_instance();
    $CI->load->model('admin_model');
    $count = 0;
    if(count($all_files)> 1){
       $CI->admin_model->delete_files($table_name,$reference_id); 
    }
    foreach ($all_files as $file_key => $file) {
        if (!empty($file)) {
            $count++;
            $file_details = pathinfo($file);
            $file_temp_path = $_FILES['images']['tmp_name'][$file_key];
            $file_name = $file_details['filename'].time().'.'.$file_details['extension'];
            $file_size = $_FILES['images']['size'][$file_key];
            $image_path = file_image_path($table_name, $file_name, $file_details['extension'], $file_size, $file_temp_path,$table_name);
            if (!empty($image_path['success'][0])) {
                    $file_data = array(
                    'file_path'=>$image_path['success'][0],
                    'reference_id'=>$reference_id,
                    'reference_type'=>$table_name,
                    'file_count'=>$count
                    );
                    $CI->admin_model->admin_insert('files',$file_data);
            }
        }
    }
}


function file_image_path($table_name, $file_name, $file_type, $file_size, $file_temp_path) {
    
    //$directory_path = FILE_IMAGE_DIRECTORY . '/'.$table_name.'/';
    $directory_path = $table_name.'/images/';
    $uploadOk = 1;
    $file_upload_info = array();
    $target_file = $directory_path . basename($file_name);

    // Check file size
    if ($file_size > IMAGE_FILE_SIZE) {
        $file_upload_info['error'][] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
        $file_upload_info['error'][] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $file_upload_info['error'][] = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {

        $file_result = upload_file_to_s3($file_temp_path, $target_file);
        if (!empty($file_result->uri)) {
            $file_upload_info['success'][] = $file_result->uri;
        } else {
            $file_upload_info['error'][] = "Sorry, there was an error uploading your file.";
        }
    }
    return $file_upload_info;
}

function upload_file_to_s3($file,$destination){
    $final_file = new stdClass ();
    $final_file->uri = upload_to_cloud ($file, $destination );
    return $final_file;
}

function get_file_full_path($path){
    $full_path =  getbucket_zone_url().$path;
    return $full_path;
}

function delete_files_from_s3($file){
    $return = remove_from_cloud($file);
    return $return;
}
