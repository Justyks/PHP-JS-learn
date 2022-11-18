<?php
    header("Content-Type: text/html; charset=utf-8");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    date_default_timezone_set('Europe/Minsk');
    $id=$_GET['id'];
    $name = $_POST['name'];
	$age = $_POST['age'];
	$salary = $_POST['salary'];
    if(!$connect=mysqli_connect('localhost','root','root','testik')){
        die($connect);
        echo 'Can\'t connect to database';
    }
    mysqli_query($connect, "SET NAMES 'utf8'");
    if(!empty($_POST)){
        $query="UPDATE users SET name='$name', age='$age', salary='$salary' WHERE id=$id";
        $result=mysqli_query($connect,$query);
    }
?>


<form action="" method="POST">
	<input name="name" value="<?=$_POST['name']??''  ?>">
	<input name="age" value="<?=$_POST['age']??''  ?>">
	<input name="salary" value="<?=$_POST['salary']??''  ?>">
	<input type="submit">
</form>