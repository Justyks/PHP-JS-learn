<?php
    header("Content-Type: text/html; charset=utf-8");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    date_default_timezone_set('Europe/Minsk');
    session_start();
    if(!empty($_SESSION['auth'])):
?>
<!DOCTYPE html>
	<html>
		<head>
			
		</head>
		<body>
			<p>текст только для авторизованного пользователя <?=$_SESSION['login']?></p>
            <p><a href="logout.php">выйти из системы</a></p>
		</body>
	</html>
<?php elseif(!empty($_SESSION['logout'])):?>
    <p>Вы вышли из системы</p>
    <p>пожалуйста, авторизуйтесь<a href='login.php'> здесь</a></p>
<?php else:?>
    <p>пожалуйста, авторизуйтесь<a href='login.php'> здесь</a></p>
<?php endif; ?>