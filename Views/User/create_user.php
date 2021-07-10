<?php
session_start();
var_dump($_SESSION);
require_once(ROOT_PATH . 'Controllers/UserController.php');
$User = new UserController();
$User->register($_SESSION);
$_SESSION = array();
header('Location: login.php');



