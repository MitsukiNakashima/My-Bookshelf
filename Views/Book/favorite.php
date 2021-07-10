<?php 
require_once(ROOT_PATH . 'Controllers/FavoriteBookController.php');
$FavoriteBook = new FavoriteBookController();

$FavoriteBook->favorite($_POST);
// var_dump($_POST['isbn']);

$referer = $_SERVER['HTTP_REFERER'];

header('Location:' . $referer);
// var_dump($_POST);

?>