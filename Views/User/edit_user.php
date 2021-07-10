<?php 
session_start();
if (empty($_SESSION)) {
  header('Location: ../../User/login.php');
}
require_once(ROOT_PATH . 'Controllers/UserController.php');
$User = new UserController();

$member = $User->loginUser($_SESSION);
// var_dump($member);

$name = '';
$email = '';
$email2 = '';
$errors = array();
$pattern = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $email2 = $_POST['email2'];
    

    if (empty($name)) {
      $errors['name'] = '名前を入力してください。';
    }

    if (empty($email)||preg_match($pattern, $email)===0) {
      $errors['email'] = 'メールアドレスを正しく入力してください。';
    }

    if (empty($email2) || $email != $email2 ){
      $errors['email2'] = 'メールアドレスが一致しません。';
    }

    if (count($errors) == 0) {
      $_SESSION = $_POST;
      header('Location:./update_user.php');
      exit;
    }
}

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">
  <link rel="stylesheet" type="text/css" href="/css/edit_user.css">
  <title>my bookshelf</title>
</head>

<body>
  <header>
    <div class="top-bar">
      <div class="logo">
        <a href="../Book/index.php">
          <p>My Bookshelf</p>
        </a>
      </div>
      
      <div class="bar-side">
        <a href="../User/logout.php" id="login">LOGOUT</a>
      </div>
    </div>
  </header>

  <div class="container"> 

    <?php if (isset($errors['name'])): ?>
    <section id="content" style="height: 570px;">
    <?php else: ?>
    <section id="content" style="height: 520px;">
    <?php endif; ?>
      <form id="form" action="" method="post">
        <p class="subtitle">プロフィール編集</p>
        
        
        <div class="label">
          <label>名前</label>
        </div>
        <input type="hidden" name="id" value="<?=$member['id']?>"/>
        <?php if (isset($errors['name'])): ?>
        <div class="input">
          <input name="name" type="text" id="name" value="<?=$member['name'] ?>"/>
        </div>
        <p class="error"><?=$errors['name']?></p>
        <?php else: ?>
          <div class="input">
          <input name="name" type="text" id="name" value="<?=$member['name'] ?>"/>
        </div>
        <?php endif; ?>

        <div class="label">
          <label>ニックネーム</label>
        </div>
        <div class="input">
          <input name="nickname" type="text" id="nickname" value="<?=$member['nickname'] ?>"/>
        </div>

        <div class="label">
          <label>メールアドレス</label>
        </div>
        <?php if (isset($errors['email'])): ?>
        <div class="input">
          <input name="email" type="text" id="email" value="<?=$member['email'] ?>"/>
        </div>
        <p class="error"><?=$errors['email']?></p>
        <?php else: ?>
          <div class="input">
          <input name="email" type="text" id="email" value="<?=$member['email'] ?>"/>
        </div>
        <?php endif; ?>

        <div class="label">
          <label>メールアドレス(確認)</label>
        </div>
        <?php if (isset($errors['email2'])): ?>
        <div class="input">
          <input name="email2" type="text" id="email2" value=""/>
        </div>
        <p class="error"><?=$errors['email2']?></p>
        <?php else: ?>
          <div class="input">
          <input name="email2" type="text" id="email2" value=""/>
        </div>
        <?php endif; ?>

        <div class="label">
          <label>お気に入りの本</label>
        </div>
        <div class="input">
          <input name="favorite" type="text" id="favorite" value="<?=$member['favorite_book'] ?>"/>
        </div>
        
        <div id="submit">
          <button id="back">戻る</button>
          <button type="submit" id="save">保存</button>
        </div>

        <div id="delete">
        <a href="delete_user.php">アカウント削除</a>
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

<script>
  $('#save').click(function() {
        confirm('この内容でよろしいですか？');
    })
</script>

<script>
  $('#delete').click(function() {
        confirm('本当に削除しますか？');
    })
</script>