<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 session_start();
 if(!$connect=mysqli_connect('localhost','root','root','testik')){
    die($connect);
    echo 'Can\'t connect to database';
 }
 mysqli_query($connect, "SET NAMES 'utf8'");
 $password=$_POST['password'];
 $login=$_POST['login'];
 if(isset($_POST['login'])&&isset($_POST['password'])){
   $password=$_POST['password'];
   $login=$_POST['login'];

   $result=mysqli_query($connect,"SELECT *,
   statuses.name as status
   FROM users
   LEFT JOIN statuses ON users.status_id=statuses.id
   WHERE login='$login'");

   $user=mysqli_fetch_assoc($result);
   $hash=$user['password'];
   $_SESSION['logout']=null;
   if(!empty($user)){

      if(password_verify($password,$hash)){
        $_SESSION['auth']=true;
        $_SESSION['login']=$login;
        $_SESSION['id']=$user['id'];
        $_SESSION['status']=$user['status'];
        header('Location: showUsers.php');
      }else{
         echo "Incorrect password or login";
      }
        
    } else{
      echo "Incorrect password or login";
    }
    
 }
?>

<form action="" method="POST">
	<input name="login">
	<input name="password" type="password">
	<input type="submit">
</form>