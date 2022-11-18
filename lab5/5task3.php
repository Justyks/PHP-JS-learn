<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title></title>
<meta charset="utf-8" />
</head>
<body>
    <form class="container" action="5task3.php" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox"  name="rememberMe" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary" name="ok">Submit</button>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php

 
 $connection=mysqli_connect('localhost','root','','authTrain');

 if(!$connection){
    die('Connection failed');
 }
 if(isset($_POST['ok'])){
    $password=mysqli_real_escape_string($connection,$_POST['password']);
    $username=mysqli_real_escape_string($connection,$_POST['username']);
    $queryCheck="SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
    $queryCheckResult=mysqli_query($connection,$queryCheck);
    if(mysqli_num_rows($queryCheckResult)==0){
        echo "<br>
        <div class=\" container alert alert-danger\" role=\"alert\">
        Неверно введены данные
        </div>"; 
    }else{
        if(isset($_POST["rememberMe"])){
            setcookie("passwordCookie", $password, time() + (60 * 60 * 24));
        }else{
          setcookie("passwordCookie", $password, time() - (60 * 60 * 24));
        }
  
        
    header('Location: http://localhost/php/5task1.php');   
    }
   
 }
 if (isset($_COOKIE["passwordCookie"])){
    header('Location: http://localhost/php/5task1.php');
 }
?>