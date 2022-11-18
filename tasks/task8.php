<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	function great($str){
        $arr=json_decode($str);
        array_walk_recursive($arr,function($value,$key){
            echo "$value : $key"."\r\n";
        });
    } 
    great("{

        \"Title\": \"The Cuckoos Calling\",
        
        \"Author\": \"Robert Galbraith\",
        
        \"Detail\": {
        
        \"Publisher\": \"Little Brown\"
        
        }
        
        }");
    
    
?>