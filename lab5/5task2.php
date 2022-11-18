<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title></title>
<meta charset="utf-8" />
</head>
<body>
    <form class="container" action="5task2.php" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary" name="ok">Submit</button>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php

if(isset($_POST['ok'])){
    $passwordInp=$_POST['password'];
    $usernameInp=$_POST['username'];
    $auth=file('auth/logInf.txt');
foreach ($auth as $user){
    $password=substr(strrchr($user,"|"),1);
    $password=substr($password,0,-2);
    $login=substr($user,0,-strlen($password)-3);
    if ($passwordInp===$password &&
        $login===$usernameInp){
        header('Location: http://localhost/php/5task1.php');   
    }
     
    
}
echo "<br>
<div class=\" container alert alert-danger\" role=\"alert\">
Неверно введены данные
</div>"; 

}

?>
