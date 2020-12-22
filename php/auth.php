<?php
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

// require "blocks/connect.php";
$mysql = new mysqli('s18.thehost.com.ua','admin','Auto2124','auto');

$result=$mysql->query("SELECT * FROM `users` WHERE `login`='$login' AND `pass`=MD5('$pass')") ;
$user=$result->fetch_assoc();
if (count ($user)==0) {
  echo "Такой пользователь не найден";
  exit;
}
setcookie("user", $user['name'], time()+3600*24*30,"/");   
$mysql->close();
header('location: /' );
?>
