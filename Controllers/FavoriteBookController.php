<?php
require_once(ROOT_PATH . '/Models/BookApi.php'); 
require_once(ROOT_PATH . '/Models/Book.php');

class FavoriteBookController {
  private $request;

  public function __construct() {
    //リクエストパラメータの取得
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;

    //モデルオブジェクトの生成
    $this->BookApi = new BookApi();
    $this->Book = new Book();
    // 別モデルと連携
    // $dbh = $this->Player->get_db_handler();
    // $this->Delete = new Delete($dbh);
    // $this->User = new User($dbh); 
  } 

  public function favorite ($favoriteInfo) {
    $this->Book->detailInfo($favoriteInfo);
  }



}

?>