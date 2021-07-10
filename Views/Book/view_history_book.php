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
$Info['isbn'] = $_GET['isbn'];
$Info['id'] = $member['id'];
$historyView = $Book->viewHistory($Info);
// $historyInfo = $Book->indexHistory($member['id']);

// var_dump($historyView);
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">
  <link rel="stylesheet" type="text/css" href="/css/menu.css">
  <link rel="stylesheet" type="text/css" href="/css/view_history_book.css">
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

  <div class="navbar">
      <div class="nav"><a href="../Book/index.php">トップ</a></div>
      <div class="nav"><a href="../Post/index_post.php">投稿</a></div>
      <div class="nav"><a href="../Book/reading_book.php">読みたい本</a></div>
      <div class="nav"><a href="../Book/index_history_book.php">My 本棚</a></div>
      <div class="nav"><a href="../User/view_user.php">マイページ</a></div>
  </div>

    <div class="container">
      <section id="content">
        <div id="box1">
          <div class="img">
            <img src="<?=$historyView['largeImageUrl'] ?>" alt="画像">
          </div>

          <div class="impression_outer">
            <div class="label2" id="label_impression">
              <label id="imp">感想</label>
            </div>
            <div id="info_impression">
              <p><?=$historyView['impression'] ?></p>
            </div>
          </div>
        </div>

        
        <div id="box2">
          <?php if(strlen($historyView['title'])>=60): ?>
          <div class="label" id="label_title">
            <label>タイトル</label>
            <div class="info" style="font-size: 11px;">
              <p><?=$historyView['title'] ?></p>
            </div>
          </div>
          <?php else: ?>
          <div class="label" id="label_title">
            <label>タイトル</label>
            <div class="info">
              <p><?=$historyView['title'] ?></p>
            </div>
          </div>
          <?php endif; ?>

          <div class="label">
            <label>著作者</label>
            <div class="info">
              <p><?=$historyView['author'] ?></p>
            </div>
          </div>

          <div class="label">
            <label>読み終わった日</label>
            <div class="info">
              <p><?=$historyView['finished_reading_at'] ?></p>
            </div>
          </div>

          <div class="label">
            <label>評価</label>
          <div class="info">
            <p><?=$historyView['evaluation'] ?></p>
          </div>
          </div>

          <div class="label_event">
            <p>この本を読んでる期間の思い出</p>
          </div>
          <div id="info_event">
            <p><?=$historyView['memory'] ?></p>
          </div>

          <div class="label">
            <label>おすすめする人</label>
            <div class="info">
              <p><?=$historyView['recommend'] ?></p>
            </div>
          </div>

          <div class="link">
            <div class="edit">
              <a href="edit_history_book.php?isbn=<?=$historyView['isbn'] ?>">編集</a>
            </div>

            <div class="delete">
              <a href="delete_history_book.php">削除</a>
            </div>
          </div>
        </div>


      </section>


      
    </div>
  </div>


</body>
</html>

<?php include ( dirname(__FILE__) . '/../Include/footer.php' ); ?>