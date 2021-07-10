<?php
session_start();
if (empty($_SESSION)) {
  header('Location: ../../User/login.php');
}
// var_dump($_SESSION);
require_once(ROOT_PATH . 'Controllers/UserController.php');
$User = new UserController();
$member = $User -> loginUser($_SESSION);
$pass = $_SESSION['password'];
var_dump($member['password']);

if (password_verify($pass, $member['password'])) {
  header('Location:../Book/index.php');
  // echo 'OK';
}else{
  header('Location:login.php');
  // echo 'NG';
}