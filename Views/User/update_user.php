<?php 
require_once(ROOT_PATH . 'Controllers/UserController.php');
$User = new UserController();
session_start();
$User -> updUser($_SESSION);

header('Location: view_user.php');

// var_dump($_SESSION);

