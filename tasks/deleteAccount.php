<?php

 if(!$connect=mysqli_connect('localhost','root','root','testik')){
    die($connect);
    echo "Can\'t connect to database";
 }
 session_start();
 date_default_timezone_set('Europe/Minsk');

 if(!empty($_POST['password'])){
    $id=$_SESSION['id'];
    $query="SELECT * FROM users WHERE id='$id'";

    $result=mysqli_query($connect,$query);
    $user=mysqli_fetch_assoc($result);

    $hash=$user['password'];

    if(password_verify($_POST['password'],$hash)){
        $query="DELETE FROM users WHERE id='$id'" ;
        $result=mysqli_query($connect,$query)or die(mysqli_error($connect));
    }else{
        echo "incorrect passwrod";
    }
}


 ?>
<form action='' method="POST">
<input type="password" name="password">
<input type="submit" name="submit">
</form>