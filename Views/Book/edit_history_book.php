<?php 
session_start();
if (empty($_SESSION)) {
  header('Location: ../../User/login.php');
}
require_once(ROOT_PATH . 'Controllers/BookController.php');
require_once(ROOT_PATH . 'Controllers/UserController.php');

$Book = new BookController();
$User = new UserController();

$Isbn = $_GET['isbn'];
$member = $User->loginUser($_SESSION);
$Info['isbn'] = $_GET['isbn'];
$Info['id'] = $member['id'];
$historyView = $Book->viewHistory($Info);

// var_dump($historyView);

?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">
  <link rel="stylesheet" type="text/css" href="/css/edit_history_book.css">
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
	  <section id="content">
      <form id="form" action="update_edit.php" method="post">
        <h3>読んだ本編集</h3>

        <div class="box">
          <div class="img">
            <img src="<?=$historyView['largeImageUrl'] ?>" alt="本の画像">
            <input type="hidden" name="image" value="<?=$historyView['largeImageUrl'] ?>">
            <input type="hidden" name="isbn" value="<?=$historyView['isbn'] ?>">
            <input type="hidden" name="id" value="<?=$member['id'] ?>">
          </div>

          <div class="outer"> 
            <div class="title">
              <p><?=$historyView['title'] ?></p>
              <input type="hidden" name="title" value="<?=$historyView['title'] ?>">
            </div>

            <div class="author">
              <p><?=$historyView['author'] ?></p>
              <input type="hidden" name="author" value="<?=$historyView['author'] ?>">
            </div>

            <div class="label">
              <label class="date">読み終わった日</label>
            </div>
            <div class="input">
              <input type="date" name="date" id="finish" required="" value="<?=$historyView['finished_reading_at'] ?>"/>
            </div>
          </div>
        </div>

        <div class="text">
          <div class="outer1">
            <textarea name="impression" id="impression" placeholder="感想・評価(350字以内)" maxlength="350"><?=$historyView['impression'] ?></textarea>
            <div class="label_evaluation">
              <label>評価</label>
            </div>
            <select name="evaluation" class="evaluation">
              <option value="★">★</option>
              <option value="★★">★★</option>
              <option value="★★★" selected>★★★</option>
              <option value="★★★★<">★★★★</option>
              <option value="★★★★★">★★★★★</option>
            </select>
          </div>
          <div class="outer2">
            <textarea name="memory" id="memory" placeholder="この本を読んでる期間に起きた出来事・思い出&#13;(250字以内)" maxlength="250"><?=$historyView['memory'] ?></textarea>
            <div class="label_recommend">
              <label>おすすめしたい人</label>
            </div>
            <select name="recommend" class="recommend">
              <option value="悲しい気持ちの人">悲しい気持ちの人</option>
              <option value="前向きになりたい人">前向きになりたい人</option>
              <option value="自分に自信がない人">自分に自信がない人</option>
              <option value="忙しい人">忙しい人</option>
              <option value="大切な人がいる人">大切な人がいる人</option>
              <option value="恋をしてる人">恋をしてる人</option>
              <option value="若い人">若い人</option>
              <option value="子供がいる人">子供がいる人</option>
              <option value="何かに悩んでる人">何かに悩んでる人</option>
              <option value="スキルを身につけたい人">スキルを身につけたい人</option>
              <option value="知識を増やしたい人">知識を増やしたい人</option>
            </select>
          </div> 
        </div>

        <div class="share">
          <input type="radio" name="share" value="1"><label>投稿する</label>
          <input type="radio" name="share" value="0" checked><label>投稿しない</label>
        </div>
        
      

        <div id="submit">
          <button type="submit">更&nbsp&nbsp新</button>
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

  
	  // $('.nav').click(function(){
    //   confirm('入力した内容は保存されません。\nページ移動しますか？')
    // })
  
</script>

