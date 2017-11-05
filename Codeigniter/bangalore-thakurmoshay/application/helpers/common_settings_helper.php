<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

function arg($index, $path = NULL) {
  if (!isset($path)) {
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $path = trim($path, '/');
  }
  $arguments = explode('/', $path);
  if($index > count($arguments)-1)
      $index = count($arguments)-1;
  return $arguments[$index];
  
}

