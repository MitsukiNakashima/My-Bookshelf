<?php 

require_once(ROOT_PATH . '/Models/BookApi.php');
require_once(ROOT_PATH . '/Models/Book.php');

class BookController {
  private $request; //リクエストパラメータ(GET,POST)

  public function __construct() {
    //リクエストパラメータの取得
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;

    //モデルオブジェクトの生成
    $this->BookApi = new  BookApi();
    $this->Book = new  Book();
    // 別モデルと連携
    // $dbh = $this->Player->get_db_handler();
    // $this->Delete = new Delete($dbh);
    // $this->User = new User($dbh); 
  } 

  public function index () {
    $books = $this->BookApi->BookInfo();
    return $books;
  }

  public function view ($Isbn) {
    $detail =$this->BookApi->BookDetail($Isbn);
    return $detail;
  }

  //読みたい本
  public function findUserId ($id) {
    $userInfo = $this->Book->allReadingBooks($id);
    return $userInfo;
  }

  //読んだ本の登録
  public function registerBook($history) {
    $this->Book->registerHistoryBook($history);
  }

  //読んだ本一覧
  public function indexHistory($id) {
    $historyInfo = $this->Book->findAllHistory($id);
    return $historyInfo;
  }

  //読んだ本の詳細
  public function viewHistory($Info) {
    $historyView = $this->Book->findHistory($Info);
    return $historyView;
  }

  //読んだ本の編集
  public function editUpdate($editInfo) {
    $this->Book->updateEdit($editInfo);
  }

  //著作者検索（著作者）
  public function allAuthor($word) {
    $searchAuthor = $this->BookApi->findAuthor($word);
    return $searchAuthor;
  }

  //著作者検索（タイトル）
  public function allTitle($word) {
    $searchTitle = $this->BookApi->findTitle($word);
    return $searchTitle;
  }

  // //著作者検索（出版社）
  // public function allPublisher($word) {
  //   $searchPublisher = $this->BookApi->findPublisher($word);
  //   return $searchPublisher;
  // }

  // //著作者検索（サイズ）
  // public function allSize($word) {
  //   $searchSize = $this->BookApi->findSize($word);
  //   return $searchSize;
  // }

  //読みたい本削除
  public function deleteReadingB($deleteInfo) {
    $this->Book->deleteReadingBook($deleteInfo);
  }

  //投稿一覧
  public function indexPost() {
    $historyInfo = $this->Book->post();
    return $historyInfo;
  }

  //投稿検索
  public function searchPost($word) {
    $searchResult = $this->Book->search($word);
    return $searchResult;
  }
}




?>