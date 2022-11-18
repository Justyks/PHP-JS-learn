<?php
function main(int $n): string 
    { 
        $i=1;
        $arr = [0, 1]; 
        while(strlen($lastItemInCorrectFormat) < $n){
            $lastItemOfArr = $arr[array_key_last($arr)]; 
            $lastItemInCorrectFormat = str_replace(',', '', number_format($lastItemOfArr)); 
            $arr[] = $arr[$i] + $arr[$i-1]; 
            $i++;
        } 
        return $lastItemInCorrectFormat; 
    } 
    echo main(50);
?>