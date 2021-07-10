<?php 
session_start();
if (empty($_SESSION)) {
  header('Location: ../../User/login.php');
}
require_once(ROOT_PATH . 'Controllers/BookController.php');
require_once(ROOT_PATH . 'Controllers/UserController.php');

$Isbn = $_GET['isbn'];
$Book = new BookController();
$detail = $Book->view($Isbn);

$User = new UserController();
$member = $User->loginUser($_SESSION);

$userInfo = $Book->findUserId($member['id']);

foreach ($userInfo as $key) {
  $info[] = $key['isbn'];
}
if (isset($info)) {
  $match = in_array($Isbn, $info);
}else{
  $match = '';
}

// var_dump($detail['itemCaption']); 
// var_dump($_SESSION);

?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">
  <link rel="stylesheet" type="text/css" href="/css/menu.css">
  <link rel="stylesheet" type="text/css" href="/css/view_book.css">
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
    

    <form action="favorite.php" class="container" method="post">
      <input type="hidden" name="userId" value="<?=$member['id']?>">
      <section id="content"> 
        <div class="box">
          <div class="img">
            <img src="<?=$detail['largeImageUrl'] ?>" alt="本の画像">
            <input type="hidden" name="largeImageUrl" value="<?=$detail['largeImageUrl'] ?>">
          </div>
          <?php if(strlen($detail['itemCaption']) == null):?>
          <p class="summary" style="display: none;"><?=$detail['itemCaption'] ?></p>
          <?php else: ?>
          <p class="summary"><?=$detail['itemCaption'] ?></p>
          <?php endif; ?>
          <div class="inner_box">
            <div class="favorite">
            
              <?php if ($match): ?>
              <button type="submit" class="star" style="color: #FFCC33;">★</button>
              <?php else: ?>
              <button type="submit" class="star">★</button>
              <?php endif; ?>
              <input type="hidden" name="isbn" value="<?=$detail['isbn']?>"> 
            </div>
            <div class="register_book">
              <a href="../Book/register_history_book.php?isbn=<?=$Isbn?>">読んだ本に登録する</a>
            </div>
          </div>
          <?php if ($match): ?>
          <div class="check">
              <a href="delete_reading_book.php?isbn=<?=$detail['isbn']?>">読みたいリストから外す</a>
          </div>
          <?php endif; ?>
        </div> 

        <div id="outer">
          
          <div class="label">
            <label>タイトル</label>
          </div>
          <div class="info">
            <p><?=$detail['title'] ?></p>
            <input type="hidden" name="title" value="<?=$detail['title'] ?>">
          </div>
          <?php if(($detail['author']) != null): ?>
          <div class="label">
            <label>著作者</label>
          </div>
          <div class="info">
            <p><?=$detail['author'] ?></p>
            <input type="hidden" name="author" value="<?=$detail['author'] ?>">
          </div>
          <?php else: ?>
            <input type="hidden" name="author" value="<?=$detail['author'] ?>">
          <?php endif; ?>

          <div class="label">
            <label>発売日</label>
          </div>
          <div class="info">
            <p><?=$detail['salesDate'] ?></p>
            <input type="hidden" name="salesDate" value="<?=$detail['salesDate'] ?>">
          </div>

          <div class="label">
            <label>出版社名</label>
          </div>
          <div class="info">
            <p><?=$detail['publisherName'] ?></p>
            <input type="hidden" name="publisherName" value="<?=$detail['publisherName'] ?>">
          </div>

          <div class="label">
            <label>書籍の種類</label>
          </div>
          <div class="info">
            <p><?=$detail['size'] ?></p>
            <input type="hidden" name="size" value="<?=$detail['size'] ?>">
          </div> 

          <div class="label">
            <label>購入はコチラから↓</label>
          </div>
          <div class="info" id="url">
            <a href="<?=$detail['itemUrl'] ?>"><?=$detail['itemUrl'] ?></a>
            <input type="hidden" name="itemUrl" value="<?=$detail['itemUrl'] ?>">
          </div>
        </div>
      </section>
    </form>






</body>
</html>

<?php include ( dirname(__FILE__) . '/../Include/footer.php' ); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
	$(".star").click(function(){
    $(this).toggleClass("clicked");
  });
</script>