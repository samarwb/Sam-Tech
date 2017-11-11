<?php

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


global $is_admin ;
if(arg(0) == 'admin'){
    $is_admin = TRUE;
}else{
    $is_admin = FALSE;
}

?>