<?php 
session_start();
if (empty($_SESSION)) {
  header('Location: ../../User/login.php');
}
require_once(ROOT_PATH . 'Controllers/BookController.php');
require_once(ROOT_PATH . 'Controllers/UserController.php');
$User = new UserController();
$Book = new BookController();

$member = $User->loginUser($_SESSION);
$searchAuthor = $Book->allAuthor($_POST['search']);
$searchTitle = $Book->allTitle($_POST['search']);
// $searchPublisher = $Book->allPublisher($_POST['search']);
// $searchSize = $Book->allPublisher($_POST['search']);

$results[] = $searchAuthor;
$results[] = $searchTitle;
// $results[] = $searchPublisher;
// $results[] = $searchSize;

$searchInfo = [];
  foreach($results as $key => $result) {
    foreach($result as $val ) {
      $searchInfo[] = $val;
      // var_dump($val);
    }
  }
// var_dump($searchInfo);

?>

<?php include ( dirname(__FILE__) . '/../Include/header.php' ); ?>

    <div class="background">
      <div class="logo2">
        <div class="image">
          <img class="book2" src="../img/book2.png" alt="アイコン">
          <img class="book" src="../img/book.png" alt="アイコン">
        </div> 
        <h1>My Bookshelf</h1>
        <p class="message">- with your memory -</p>
      </div>

      <form id="form" action="index_search.php" method="post">
        <input id="search-text" name="search" type="text" placeholder="タイトル・著作名で検索する" >
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

    <?php 
        $num = count($searchInfo);
    ?>
    <div class="num">
      <p><?=$num ?>件見つかりました</p>
    </div>

    <div class="box">
      <?php for ($i=0; $i<count($searchInfo); $i++): ?>
      <div class="inner">
        <p class="isbn"><?= $searchInfo[$i]['isbn']; ?></p>
        <a href="../Book/view_book.php?isbn=<?=$searchInfo[$i]['isbn']?>"><img src="<?=$searchInfo[$i]['largeImageUrl']; ?>" alt="本の画像"></a>
        <?php if(strlen($searchInfo[$i]['title'])>=50): ?>
        <a href="../Book/view_book.php?isbn=<?=$searchInfo[$i]['isbn']?>" style="font-size: 10px;"><p class="t"><?=$searchInfo[$i]['title'];?></p></a>
        <?php else: ?>
        <a href="../Book/view_book.php?isbn=<?=$searchInfo[$i]['isbn']?>"><p class="t"><?=$searchInfo[$i]['title'];?></p></a>
        <?php endif; ?>
        <?php if(strlen($searchInfo[$i]['author'])>=50): ?>
        <p class="a" style="font-size: 10px;"><?=$searchInfo[$i]['author']; ?></p>
        <?php else: ?>
        <p class="a"><?=$searchInfo[$i]['author']; ?></p>
        <?php endif ?>
      </div>
      <?php endfor; ?>
    </div>


  </body>

<?php include ( dirname(__FILE__) . '/../Include/footer.php' ); ?>


