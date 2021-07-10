<?php 
session_start();
$new = $_SESSION;
require_once(ROOT_PATH . 'Controllers/UserController.php');
$User = new UserController();
$allEmail = $User->matchEmail();
$match = in_array($new['email'], $allEmail);
foreach($allEmail as $key => $email){
  // var_dump($email['email']);
  if($email['email'] == $new['email']){
    $match = 1;
    break;
  }
}
// var_dump($match);


$referer = $_SERVER['HTTP_REFERER'];
$url = 'http://localhost/User/registration.php';

if(!strstr($referer,$url)){
  header('Location: registration.php');
  exit;
}

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}


// var_dump($new['name']);




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/confirm.css">
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
	<section id="content">
		<form id="form" action="create_user.php" method="post">
			<p id="subtitle">会員登録</p>
    <div id="confirm">
      <p>この内容でよろしいですか？</p>
    </div>

      <div class="label">
        <label>お名前</label>
      </div>
      <div class="info">
        <p><?=h($new['name']) ?></p>
      </div>

			<div class="label">
        <label>メールアドレス</label>
      </div>
      <?php if ($match == 1): ?>
      <p class="error">このメールアドレスは既に登録されています</p>
      <?php endif; ?>
      <div class="info">
        <p><?=h($new['email']) ?></p>
      </div>

      <div class="label">
        <label>パスワード</label>
      </div>
      <div class="info">
        <p><?=h($new['password']) ?></p>
      </div>


			<div id="submit">
        <button id="back" type="button" onclick="history.back()">戻る</button>
				<button id="register" type="submit">登録</button>
      </div>
		</form>
		
	</section>
</div>



</body>

<?php include ( dirname(__FILE__) . '/../Include/footer.php' ); ?>

</html>

