<?php 
session_start();
if (empty($_SESSION)) {
  header('Location: ../../User/login.php');
}

require_once(ROOT_PATH . 'Controllers/BookController.php');
require_once(ROOT_PATH . 'Controllers/UserController.php');
$Book = new BookController();
$User = new UserController();

$member = $User->loginUser($_SESSION);
$historyInfo = $Book->indexHistory($member['id']);
$allUsers = $User->indexUser();
// var_dump($allUsers);

?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">
  <link rel="stylesheet" type="text/css" href="/css/menu.css">
  <link rel="stylesheet" type="text/css" href="/css/index_user.css">
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
    <h2>ユーザー情報</h2>
      <table id ="all">
        <tr>
          <th>名前</th>
          <th>ニックネーム</th>
          <th>メールアドレス</th>
          <th>お気に入りの本</th>
          <th></th> 
        </tr>

        <?php foreach ($allUsers as $key => $user): ?>
          <?php if ($user['del_flg']==0): ?>
        <tr>
          <td><?=$user['name']; ?></td>
          <td><?=$user['nickname']; ?></td>
          <td><?=$user['email']; ?></td>
          <td><?=$user['favorite_book']; ?></td>
          <td><a href="index_delete_user.php?email=<?=$user['email']; ?>">削除</a></td>
        </tr>
            <?php endif; ?>
        <?php endforeach; ?>
  </div>
</body>
</html>

<!-- <?php include ( dirname(__FILE__) . '/../Include/footer.php' ); ?> -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
	$(function() {
	$('.container').fadeIn(500); 
});
</script>