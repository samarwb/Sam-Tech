<?php
/**
 * Created by PhpStorm.
 * User: samar
 * Date: 11/11/17
 * Time: 1:13 PM
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


// End Point : http://bangalore-thakurmoshay.com.s3-website-ap-southeast-1.amazonaws.com
require_once 'aws.phar';

use Aws\S3\S3Client;
function getbucket() {
    return "bangalore-thakurmoshay.com";
}
function get_awsbucket_url(){
    $url  = "https://".getbucket()."s3.amazonaws.com/";
    return $url;
}
function getbucket_zone_url(){
    $s3_ap_south_1 = "https://s3.ap-southeast-1.amazonaws.com/";
    return $s3_ap_south_1.getbucket()."/";
}
function upload_to_cloud($file, $key, $tag = null) {
    $bucket = getbucket ();
    $prefix = getbucket_zone_url();
    if ($file == null || $key == null)
        return null;
    $object = array ();
    $client = getclient ();
    if ($client == null)
        return null;
    $object ['Bucket'] = $bucket;
    $object ['Key'] = $key;
    $object ['SourceFile'] = $file;
    $object ['ACL'] = 'public-read';
    if (isset ( $tag ) && is_array ( $tag ))
        $object ['Metadata'] = $tag;
    $result = $client->putObject ( $object );
    $objecturl = $result ['ObjectURL'];

    if (substr($objecturl, 0, strlen($prefix)) == $prefix) {
        $str = substr($objecturl, strlen($prefix));
        $str = 's3://'.$str;
        return $str;
    }else

        return $objecturl;
}
function getclient() {
    $s3Client = new S3Client ( [
        'version' => 'latest',
        'region' => 'ap-southeast-1',
        'credentials' => [
            'key' => 'AKIAITZIBH3YOFYLFPRA',
            'secret' => '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'
        ]
    ] );
    if ($s3Client == null)
        return null;
    return $s3Client;
}

function remove_from_cloud($file){

    $bucket = getbucket ();
    if ($file == null )
        return null;
    $client = getclient ();

    $result = $client->deleteObject([
        'Bucket' => $bucket,
        'Key' => urldecode($file),
    ]);

    return $result;
}


