<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	function great($year, $lastYear, $month, $lastMonth){
        $counter=0;
        $startTime=strtotime("{$year}-{$month}");
        $endTime=strtotime("{$lastYear}-{$lastMonth}");
        while(date('Y-m',$startTime)<=date('Y-m',$endTime)){
            if(date('d',$startTime)==1 && date('l',$startTime)=="Monday"){
                $counter++;
            }
            $startTime=strtotime("next Monday",$startTime);
        }
        echo $counter;
        
    } 
    great(1981,1981,1,12);
    
    
?>