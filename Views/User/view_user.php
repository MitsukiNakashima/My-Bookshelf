<?php 
session_start();
if (empty($_SESSION)) {
  header('Location: ../../User/login.php');
}
require_once(ROOT_PATH . 'Controllers/UserController.php');
$User = new UserController();

$member = $User->loginUser($_SESSION);
// var_dump($member);

?>


<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">
  <link rel="stylesheet" type="text/css" href="/css/menu.css">
  <link rel="stylesheet" type="text/css" href="/css/view_user.css">
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

  <?php if ($member['role']==0): ?>
    <div class="navbar">
      <div class="nav"><a href="../Book/index.php">トップ</a></div>
      <div class="nav"><a href="../Post/index_post.php">投稿</a></div>
      <div class="nav"><a href="../Book/reading_book.php">読みたい本</a></div>
      <div class="nav"><a href="../Book/index_history_book.php">My 本棚</a></div>
      <div class="nav"><a href="../User/view_user.php">マイページ</a></div>
    </div>
  <?php else: ?>
    <div class="navbar">
      <div class="nav"><a href="../Book/index.php">トップ</a></div>
      <div class="nav"><a href="../Post/index_post.php">投稿</a></div>
      <div class="nav"><a href="../User/index_user.php">ユーザー一覧</a></div>
      <div class="nav"><a href="../User/view_user.php">マイページ</a></div>
    </div>
  <?php endif; ?>

  <div class="container">
    <section id="content">
      <div id="outer">
        <p id="subtitle">PROFILE</p>
        
        <div class="label">
          <label>名前</label>
        </div>
        <div class="info">
          <p><?=$member['name'] ?></p>
        </div>

        <div class="label">
          <label>ニックネーム</label>
        </div>
        <div class="info">
          <p><?=$member['nickname'] ?></p>
        </div>

        <div class="label">
          <label>メールアドレス</label>
        </div>
        <div class="info">
          <p><?=$member['email'] ?></p>
        </div>

        <div class="label">
          <label>お気に入りの本</label>
        </div>
        <div class="info">
          <p><?=$member['favorite_book'] ?></p>
        </div>

        <div id="edit">
          <a href="../User/edit_user.php">編集</a>
        </div>
      </div>
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