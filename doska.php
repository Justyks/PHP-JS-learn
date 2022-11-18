<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $url=$_SERVER['REQUEST_URI'];
    $connect=require 'doska/connect.php';
    

    if(preg_match('#/page/(?<catSlug>[a-z0-9_-]+)/(?<adSlug>[a-z0-9_-]+)#',$url,$params)){
        $page=require 'doska/showAds.php';
    }
    elseif(preg_match('#/page/(?<catSlug>[a-z0-9_-]+)#',$url,$params)){
        $page=require 'doska/showCategories.php';
    }
    elseif(preg_match('#/page#',$url,$params)){
        $page=require 'doska/all.php';
    }

    $title=$page['title'];
    $content=$page['content'];

    $layout=file_get_contents('doska/layout.php');
    $layout=str_replace('{{title}}',$title,$layout);
    $layout=str_replace('{{ content }}',$content,$layout);
    echo $layout;

    if(isset($_POST['ok'])){
        require 'doska/addAdvertisement.php';
        header("Location: ".$_SERVER['REQUEST_URI']);
    }
?>