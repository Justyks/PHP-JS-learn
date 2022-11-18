<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	function great($arr,$n){
        var_dump($arr);
       unset($arr[$n]);
       $counter=0;
       $temp=[];
       foreach($arr as $key=>$elem){
        $temp[$counter]=$elem;
        $counter++;
       }
       $arr=$temp;
       var_dump($arr);
        
    } 
    great([1,2,3,4,5],2);
    
    
?>