<?php
    header("Content-Type: text/html; charset=utf-8");
    date_default_timezone_set('Europe/Minsk');
    session_start();
    if(!$connect=mysqli_connect('localhost','root','root','testik')){
        die($connect);
        echo "Can\'t connect to database";
     }
     $id=$_SESSION['id'];
     $query="SELECT * FROM users WHERE id='$id'";
     $result=mysqli_query($connect,$query);
     $user=mysqli_fetch_assoc($result);
    
     if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $dateOfRegistration=$_POST['dateOfRegistration'];
        $query="UPDATE users SET email='$email',dateOfRegistration='$dateOfRegistration' WHERE id='$id'";
        $result=mysqli_query($connect,$query) or die(mysqli_error($connect));
        header('Location:account.php');
     }
?>

<form action="" method="POST">
	<input name="dateOfRegistration" value="<?= $user['dateOfRegistration'] ?>">
	<input name="email" value="<?= $user['email'] ?>">
	<input type="submit" name="submit">
</form>