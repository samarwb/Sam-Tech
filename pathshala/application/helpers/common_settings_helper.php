<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

function arg($index, $path = NULL) {
  if (!isset($path)) {
    $path = $_SERVER['REQUEST_URI'];
    $path = trim($path, '/');
  }
  $arguments = explode('/', $path);
  if($index > count($arguments)-1)
      $index = count($arguments)-1;
  return $arguments[$index];
  
}

