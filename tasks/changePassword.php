<?php

 if(!$connect=mysqli_connect('localhost','root','root','testik')){
    die($connect);
    echo "Can\'t connect to database";
 }
 session_start();
 date_default_timezone_set('Europe/Minsk');
 $id=$_SESSION['id'];
 $query="SELECT * FROM users WHERE id='$id'";
 $result=mysqli_query($connect,$query);
 $user=mysqli_fetch_assoc($result);
 $oldPassword=$_POST['old_password'];
 $newPassword=$_POST['new_password'];
 $hash=$user['password'];
 if(password_verify($oldPassword,$hash)){
    if($newPassword==$_POST['new_password_confirm']){
        $password=password_hash($newPassword,PASSWORD_DEFAULT);
        $query="UPDATE users SET password='$password' WHERE id='$id'";
        $result=mysqli_query($connect,$query);
    }else{
        echo "your passwrods didnt match";
    }
   
 }else{
    echo 'old paswword is incorrect';
 }


 ?>

<form action="" method="POST">
    <input type="password" name="old_password">
	<input type="password" name="new_password">
	<input type="password" name="new_password_confirm">
	<input type="submit" name="submit">
</form>