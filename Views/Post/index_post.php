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
$historyInfo = $Book->indexPost();

// var_dump($historyInfo);
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">
  <link rel="stylesheet" type="text/css" href="/css/menu.css">
  <link rel="stylesheet" type="text/css" href="/css/index_post.css">
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

  <div class="background">
      <div class="logo2">
        <div class="image">
          <img class="book2" src="../img/book2.png" alt="アイコン">
          <img class="book" src="../img/book.png" alt="アイコン">
        </div> 
        <h1>My Bookshelf</h1>
        <p class="message">- with your memory -</p>
      </div>

      <form id="form" action="index_post_search.php" method="post">
        <input id="search-text" name="search" type="text" placeholder="検索する" >
        <button><img id="submit" type="image" src="../img/サーチアイコン.png" width='15' height='20' alt=""></button>
      </form>
    </div>

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

    
    <div class="box">
    <?php for ($i=0; $i<count($historyInfo); $i++): ?>
      <?php if ($historyInfo[$i]['share']==1): ?>
      <div class="inner">
        <div class="info image">
          <img src="<?=$historyInfo[$i]['largeImageUrl']; ?>" alt="画像">
        </div>
        <div class="info other">
          <label>タイトル</label>
          <?php if(strlen($historyInfo[$i]['title'])>=60): ?>
          <p style="font-size: 10px;"><?=$historyInfo[$i]['title']; ?></p>
          <?php else: ?>
          <p><?=$historyInfo[$i]['title']; ?></p>
          <?php endif; ?>
        </div>
        <div class="info other">
          <label>著作者</label>
          <p><?=$historyInfo[$i]['author']; ?></p>
        </div>
        <div class="info other">
          <label>評価</label>
          <p><?=$historyInfo[$i]['evaluation']; ?></p>
        </div>
        <div class="info other">
          <label>おすすめな人</label>
          <p><?=$historyInfo[$i]['recommend']; ?></p>
        </div>
        <div class="info impre">
          <label>感想</label>
          <p><?=$historyInfo[$i]['impression']; ?></p>
        </div>
      </div>
      <?php endif; ?>
    <?php endfor; ?>
    </div>
    

  </body>

<?php include ( dirname(__FILE__) . '/../Include/footer.php' ); ?>
