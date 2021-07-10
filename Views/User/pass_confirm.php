<?php 
session_start();
require_once(ROOT_PATH . 'Controllers/UserController.php');
$User = new UserController();

$User->resetPass($_SESSION);
// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>delete account</title>

  <style type="text/css">
    h3 {
      color:grey;
      font-size: 20px;
      text-align: center;
      margin-top: 100px;
    }
    p {
      color:grey;
      font-size: 15px;
      text-align: center;
      margin-top: 50px;
    }
  </style>
  
</head>
<body>
  <h3>パスワードを変更しました</h3>
  <p>自動でログインページに移動します</p>
</body>
</html>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
	setTimeout(function(){
    window.location.href = 'http://localhost/User/login.php';
  }, 3*1000); 
</script>