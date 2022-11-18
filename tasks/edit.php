<?php
    header("Content-Type: text/html; charset=utf-8");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    date_default_timezone_set('Europe/Minsk');
    $id=$_GET['id'];
    if(!$connect=mysqli_connect('localhost','root','root','testik')){
        die($connect);
        echo 'Can\'t connect to database';
    }
    mysqli_query($connect, "SET NAMES 'utf8'");
    if(!empty($_GET)){
        $query="SELECT * FROM users WHERE id=$id";
        $result=mysqli_query($connect,$query) or die(mysqli_error($connect));
        $user=mysqli_fetch_assoc($result);
    }
?>


<form action="edit.php?id=<?= $_GET['id'] ?>" method="POST">
	<input name="name" value="<?=$user['name']??''  ?>">
	<input name="age" value="<?=$user['age']??''  ?>">
	<input name="salary" value="<?=$user['salary']??''  ?>">
	<input type="submit">
</form>