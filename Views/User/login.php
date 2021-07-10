<?php
session_start();
$email = '';
$pass = '';
$errors = array();

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (empty($email)) {
      $errors['email'] = 'メールアドレスを入力してください。';
    }

    if (empty($pass)){
      $errors['password'] = 'パスワードを入力してください。';
    }

    if (count($errors) == 0) {
      $_SESSION = $_POST;
      header('Location:./check_user.php');
      exit;
    }
}

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/login.css">
  <title>Document</title>
</head>

<body>
<header>
  <div class="top-bar">
      <div class="logo">
        <a href="#">
          <p>My Bookshelf</p>
        </a>
      </div>
	</div>
</header>

<div class="container">
	<?php if (empty($errors)): ?>
	<section id="content" style="height: 390px;">
  <?php else: ?>
  <section id="content" style="height: 450px;">
  <?php endif; ?>
		<form id="form" action="" method="post">
			<p class="title">LOGIN</p>

			<?php if (isset($errors['email'])): ?>
			<div class="input">
				<input name="email" type="text" placeholder="Email" id="email" value="<?=h($email)?>"/>
			</div>
			<p class="error" style="color: red; font-size: 12px;"><?=$errors['email']?></p>
			<?php else: ?>
			<div class="input">
				<input name="email" type="text" placeholder="Email" id="email" value="<?=h($email)?>"/>
			</div>
			<?php endif; ?>

			<?php if (isset($errors['password'])): ?>
			<div class="input">
				<input name="password" type="password" placeholder="Password" id="password" value="<?=h($pass)?>" autocomplete="off"/>
			</div>
			<p class="error"><?=$errors['password']?></p>
			<?php else: ?>
			<div class="input">
				<input name="password" type="password" placeholder="Password" id="password" value="<?=h($pass)?>" autocomplete="off"/>
			</div>
			<?php endif; ?>



			<div id="submit">
				<button type="submit">LOGIN</button>
			</div>

      <div class="link" id="p-reset">
        <a href="pass_reset_form.php">パスワードを忘れた方はコチラ</a>
      </div>
      <div class="link" id="sign-up">
        <a href="../User/registration.php">会員登録</a></a>
      </div>
		</form>
		
	</section>
</div>


</body>
</html> 

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script> 
	$(function() {
	  $('.container').fadeIn(1000); 
  });
</script>

