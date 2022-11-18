<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $url=$_SERVER['REQUEST_URI'];
    $connect=require 'tasks/connect.php';
    
    if(preg_match('#/page/(?<catSlug>[a-z0-9_-]+)/(?<pageSlug>[a-z0-9_-]+)#',$url,$params)){
        $page=require 'tasks/view/page/show.php';
    }
    elseif(preg_match('#/page/(?<catSlug>[a-z0-9_-]+)#',$url,$params)){
        $page=require 'tasks/view/page/category.php';
    }
    elseif(preg_match('#/page/#',$url,$params)){
        $page=require 'tasks/view/page/all.php';
    }
    

    $title=$page['title'];
    $content=$page['content'];

    $layout=file_get_contents('tasks/layout.php');
    $layout=str_replace('{{title}}',$title,$layout);
    $layout=str_replace('{{ content }}',$content,$layout);
    echo $layout;
?>









<?php
//$titles=require 'tasks/view/titles.php';
// 
    // $folder=explode('/',$url);
    // $folder[3]=$folder[2];
    // //$title=$titles['/'.$folder[3]];
    // $folder[2]='view';
    // $str=implode('/',$folder);
    // $url=substr($str,1);
    // $url.='.php';
    // if(file_exists($url)){
    //     $content=file_get_contents($url);
    // }else{
    //     header('HTTP/1.0 404 Not Found');
    //     $content=file_get_contents('tasks/view/404.php');
    // }
    
    // preg_match('#{{ title: "(.+?)" }}#',$content,$match);
    // $title=$match[1];
    // $content=preg_replace('#{{ title: "(.+?)" }}#','',$content);
    // //$layout=str_replace('{{title}}',$title,$layout);
    ?>