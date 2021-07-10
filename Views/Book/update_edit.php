<?php 
session_start();
if (empty($_SESSION)) {
  header('Location: ../../User/login.php');
}
require_once(ROOT_PATH . 'Controllers/BookController.php');
// require_once(ROOT_PATH . 'Controllers/UserController.php');

$Book = new BookController();
// $User = new UserController();

$Book->editUpdate($_POST);

header('Location: index_history_book.php'); 

var_dump($_POST);