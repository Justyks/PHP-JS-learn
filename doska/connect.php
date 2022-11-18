<?php
 if(!$connect=mysqli_connect('localhost','root','root','doska')){
    die($connect);
    echo "Can\'t connect to database";
 }
 return $connect;
?>