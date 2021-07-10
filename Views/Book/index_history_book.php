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

// var_dump($member);

?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">
  <link rel="stylesheet" type="text/css" href="/css/menu.css">
  <link rel="stylesheet" type="text/css" href="/css/index_history_book.css">
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
  </div>

    <div class="navbar">
      <div class="nav"><a href="../Book/index.php">トップ</a></div>
      <div class="nav"><a href="../Post/index_post.php">投稿</a></div>
      <div class="nav"><a href="reading_book.php">読みたい本</a></div>
      <div class="nav"><a href="../Book/index_history_book.php">My 本棚</a></div>
      <div class="nav"><a href="../User/view_user.php">マイページ</a></div>
    </div>

    <div class="subtitle">
      <p>My 本棚</p>
    </div>

  <div div class="box">
    <?php for ($i=0; $i<count($historyInfo); $i++): ?>
    <div class="inner">
      <p class="isbn"><?= $historyInfo[$i]['isbn']; ?></p>
      <a href="../Book/view_history_book.php?isbn=<?=$historyInfo[$i]['isbn']?>"><img src="<?=$historyInfo[$i]['largeImageUrl']; ?>" alt="本の画像"></a>
      <?php if(strlen($historyInfo[$i]['title'])>=50): ?>
      <a href="../Book/view_history_book.php?isbn=<?=$historyInfo[$i]['isbn']?>" style="font-size: 10px;"><p class="t"><?=$historyInfo[$i]['title'];?></p></a>
      <?php else: ?>
      <a href="../Book/view_history_book.php?isbn=<?=$historyInfo[$i]['isbn']?>"><p class="t"><?=$historyInfo[$i]['title'];?></p></a>
      <?php endif; ?>
      <?php if(strlen($historyInfo[$i]['author'])>=50): ?>
      <p class="a" style="font-size: 10px;"><?=$historyInfo[$i]['author']; ?></p>
      <?php else: ?>
      <p class="a"><?=$historyInfo[$i]['author']; ?></p>
      <?php endif; ?>
    </div>
    <?php endfor; ?>
  </div>
</body>

  

<?php include ( dirname(__FILE__) . '/../Include/footer.php' ); ?>
