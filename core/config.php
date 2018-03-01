<?php
//$model = new Model2();

defined('DRIVER') or define('DRIVER','mysql');
defined('HOST') or define('HOST','localhost');
defined('DATABASE_NAME') or define('DATABASE_NAME','law');
defined('USER_NAME') or define('USER_NAME','root');
defined('PASSWORD') or define('PASSWORD','');
defined('URL_SITE') or define('URL_SITE','http://localhost/legal/');

function version($path)
{
    if (file_exists($file = $_SERVER['DOCUMENT_ROOT'] .'/legal/'. $path)) {
        $mtime = filemtime($file);
//        $mtime = filectime($file);
        $ext = substr($file,strrpos($file,'.')) ;
        return str_replace($ext,'-'.hash('md5',$mtime),$path) . $ext;
    }
    return $path;
}

function print_r_debug_die($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}

function print_r_debug($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function safe_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}