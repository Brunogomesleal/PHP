<?php
/**
 * Created by PhpStorm.
 * User: BrGomes
 * Date: 15/05/2018
 * Time: 20:53
 */

spl_autoload_register(function ($className){
    $ext = ".php";
    $dir = "class";
    $fullpath = $dir.DIRECTORY_SEPARATOR.$className.$ext;
    if (file_exists($fullpath)){
        require_once $fullpath;
    }
});
