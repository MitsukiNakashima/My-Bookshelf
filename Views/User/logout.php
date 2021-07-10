<?php
session_start();
var_dump($_SESSION);
// require_once(ROOT_PATH . 'Controller/PlayerController.php');
// $player = new PlayerController();
// $member = $player -> loginUser($_SESSION);
$_SESSION = array();

header('Location: ../User/top.php');