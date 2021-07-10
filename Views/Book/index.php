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
$books = $Book->index();
// var_dump($member);
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

    <div class="box">
      <?php for ($i=0; $i<28; $i++): ?>
      <div class="inner">
        <p class="isbn"><?= $books[$i]['isbn']; ?></p>
        <a href="../Book/view_book.php?isbn=<?=$books[$i]['isbn']?>"><img src="<?=$books[$i]['largeImageUrl']; ?>" alt="本の画像"></a>
        <?php if(strlen($books[$i]['title'])>=30): ?>
        <a href="../Book/view_book.php?isbn=<?=$books[$i]['isbn']?>" style="font-size: 10px;"><p class="t"><?=$books[$i]['title'];?></p></a>
        <?php else: ?>
        <a href="../Book/view_book.php?isbn=<?=$books[$i]['isbn']?>"><p class="t"><?=$books[$i]['title'];?></p></a>
        <?php endif; ?>
        <?php if(strlen($books[$i]['author'])>=30): ?>
        <p class="a" style="font-size: 10px;"><?=$books[$i]['author']; ?></p>
        <?php else: ?>
        <p class="a"><?=$books[$i]['author']; ?></p>
        <?php endif ?>
      </div>
      <?php endfor; ?>
    </div>

    <!-- <?php for ($i=0; $i<count($numPage); $i++) {
      echo "<a href='?page=".$i."'>".($i+1)."</a>";
    } ?> -->

   

  </body>

<?php include ( dirname(__FILE__) . '/../Include/footer.php' ); ?>
