<?php 
session_start();
require_once(ROOT_PATH . 'Controllers/BookController.php');
require_once(ROOT_PATH . 'Controllers/UserController.php');
$Book = new BookController();
$User = new UserController();

$member = $User->loginUser($_SESSION);

$deleteInfo['isbn'] = $_GET['isbn'];
$deleteInfo['id'] = $member['id'];
$deleteReading = $Book->deleteReadingB($deleteInfo);
var_dump($deleteInfo);

$referer = $_SERVER['HTTP_REFERER'];

header('Location:' . $referer);


