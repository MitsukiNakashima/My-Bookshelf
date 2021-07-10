<?php 
session_start();


$name = '';
$email = '';
$email2 = '';
$pass = '';
$pass2= '';
$errors = array();

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $email2 = $_POST['email2'];
    $pass = $_POST['password'];
    $pass2 = $_POST['password2'];
    $pattern = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/";
    $pattern2 = '/\A[a-z\d]{8,100}+\z/i';

    if (empty($name)) {
      $errors['name'] = '名前を入力してください。';
    }

    if (empty($email)||preg_match($pattern, $email)===0) {
      $errors['email'] = 'メールアドレスを正しく入力してください。';
    }

    if (empty($email2) || $email != $email2 ){
      $errors['email2'] = 'メールアドレスが一致しません。';
    }

    if (empty($pass)||preg_match($pattern2, $pass)===0){
      $errors['password'] = '半角英数8文字以上で入力してください。';
    }

    if (empty($pass2) || $pass != $pass2 ){
      $errors['password2'] = 'パスワードが一致しません。';
    }

    if (count($errors) == 0) {
      $_SESSION = $_POST;
      header('Location:./confirm.php');
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
  <link rel="stylesheet" type="text/css" href="/css/registration.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">
  <title>Document</title>
</head>
<body>
<header>
  <div class="top-bar">
      <div class="logo">
        <a href="../Book/index.php">
          <p>My Bookshelf</p>
        </a>
      </div>
	</div>
</header>

<div class="container">
  <?php if (empty($errors)): ?>
	<section id="content" style="height: 530px;">
  <?php else: ?>
  <section id="content" style="height: 600px;">
  <?php endif; ?>
		<form id="form" action="" method="post">
			<p class="title">会員登録</p>

      <?php if (isset($errors['name'])): ?>
      <div class="label">
        <label>お名前</label>
      </div>
			<div class="input">
				<input name="name" type="text" id="name" value="<?=h($name)?>"/>
			</div>
      <p class="error"><?=$errors['name']?></p>
      <?php else: ?>
      <div class="label">
        <label>お名前</label>
      </div>
			<div class="input">
				<input name="name" type="text" id="name" value="<?=h($name)?>"/>
			</div>
      <?php endif; ?>

      <?php if (isset($errors['email'])): ?>
      <div class="label">
        <label>メールアドレス</label>
      </div>
      <div class="input">
				<input name="email" type="text" id="email" value="<?=h($email)?>"/>
			</div>
      <p class="error"><?=$errors['email']?></p>
      <?php else: ?>
      <div class="label">
        <label>メールアドレス</label>
      </div>
      <div class="input">
				<input name="email" type="text" id="email" value="<?=h($email)?>"/>
			</div>
      <?php endif; ?>

      <?php if (isset($errors['email2'])): ?>
      <div class="label">
        <label>メールアドレス(確認)</label>
      </div>
      <div class="input">
				<input name="email2" type="text" id="email2" value="<?=h($email2)?>"/>
			</div>
      <p class="error"><?=$errors['email2']?></p>
      <?php else: ?>
      <div class="label">
        <label>メールアドレス(確認)</label>
      </div>
      <div class="input">
				<input name="email2" type="text" id="email2" value="<?=h($email2)?>"/>
			</div>
      <?php endif; ?>

      <?php if (isset($errors['password'])): ?>
      <div class="label">
        <label>パスワード</label>
      </div>
			<div class="input">
				<input name="password" type="password" id="password" value="<?=h($pass)?>"/>
			</div>
      <p class="error"><?=$errors['password']?></p>
      <?php else: ?>
      <div class="label">
        <label>パスワード</label>
      </div>
			<div class="input">
				<input name="password" type="password" id="password" value="<?=h($pass)?>"/>
			</div>
      <?php endif; ?>

      <?php if (isset($errors['password2'])): ?>
      <div class="label">
        <label>パスワード(確認)</label>
      </div>
			<div class="input">
				<input name="password2" type="password" id="password2" value="<?=h($pass2)?>"/>
			</div>
      <p class="error"><?=$errors['password2']?></p>
      <?php else: ?>
      <div class="label">
        <label>パスワード(確認)</label>
      </div>
			<div class="input">
				<input name="password2" type="password" id="password2" value="<?=h($pass2)?>"/>
			</div>
      <?php endif; ?>

			<div id="submit">
				<button type="submit">登&nbsp録</button>
			</div>
		</form>
	</section>
</div>
</body>
</html>

<?php include ( dirname(__FILE__) . '/../Include/footer.php' ); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
	$(function() {
	$('.container').fadeIn(500); 
});
</script>

