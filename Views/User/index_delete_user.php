<?php 
session_start();
if (empty($_SESSION)) {
  header('Location: ../../User/login.php');
}

require_once(ROOT_PATH . 'Controllers/UserController.php');
$User = new UserController();

$user = $_GET;
$User->delete($user);

// var_dump($user);

header('Location: ../../User/index_user.php');

?>
