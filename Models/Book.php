<?php 

require_once(ROOT_PATH . '/Models/Db.php');

class Book extends Db {
  
  public function __construct($dbh = null) {
      parent::__construct($dbh);
  }

  //読みたい本に登録
  public function detailInfo($favoriteInfo) {
    $sql = 'INSERT INTO reading_books (isbn, title, author, salesDate, publisherName, size, itemUrl, largeImageUrl, userId)
            SELECT :isbn, :title, :author, :salesDate, :publisherName, :size, :itemUrl, :largeImageUrl, :userId FROM dual
            WHERE NOT EXISTS (SELECT * FROM reading_books WHERE userId = :userId AND isbn = :isbn)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':isbn', $favoriteInfo['isbn'], PDO::PARAM_STR);
    $sth->bindValue(':title', $favoriteInfo['title'], PDO::PARAM_STR);
    $sth->bindValue(':author', $favoriteInfo['author'], PDO::PARAM_STR);
    $sth->bindValue(':salesDate', $favoriteInfo['salesDate'], PDO::PARAM_STR);
    $sth->bindValue(':publisherName', $favoriteInfo['publisherName'], PDO::PARAM_STR);
    $sth->bindValue(':size', $favoriteInfo['size'], PDO::PARAM_STR);
    $sth->bindValue(':itemUrl', $favoriteInfo['itemUrl'], PDO::PARAM_STR);
    $sth->bindValue(':largeImageUrl', $favoriteInfo['largeImageUrl'], PDO::PARAM_STR);
    $sth->bindValue(':userId', $favoriteInfo['userId'], PDO::PARAM_STR);
    
    $sth->execute();
  }

  //読みたい本
  public function allReadingBooks($id) {
    $sql = 'SELECT * FROM reading_books WHERE userId = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':id', $id, PDO::PARAM_STR);
    $sth->execute();
    $userInfo = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $userInfo;
  }

  //読んだ本登録
  public function registerHistoryBook($history) {
    $sql = 'INSERT INTO history_books (userId, isbn, title, author, finished_reading_at, evaluation, memory, impression, largeImageUrl, share, recommend)
            VALUES (:id, :isbn, :title, :author, :date, :evaluation, :memory, :impression, :image, :share, :recommend)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':id', $history['id'], PDO::PARAM_INT);
    $sth->bindValue(':isbn', $history['isbn'], PDO::PARAM_STR);
    $sth->bindValue(':title', $history['title'], PDO::PARAM_STR);
    $sth->bindValue(':author', $history['author'], PDO::PARAM_STR);
    $sth->bindValue(':date', $history['date'], PDO::PARAM_STR);
    $sth->bindValue(':evaluation', $history['evaluation'], PDO::PARAM_STR);
    $sth->bindValue(':memory', $history['memory'], PDO::PARAM_STR);
    $sth->bindValue(':impression', $history['impression'], PDO::PARAM_STR);
    $sth->bindValue(':image', $history['image'], PDO::PARAM_STR);
    $sth->bindValue(':share', $history['share'], PDO::PARAM_INT);
    $sth->bindValue(':recommend', $history['recommend'], PDO::PARAM_STR);
    
    $sth->execute();
  }

  //読んだ本一覧
  public function findAllHistory($id) {
    $sql = 'SELECT * FROM history_books WHERE userId = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':id', $id, PDO::PARAM_STR);
    $sth->execute();
    $historyInfo = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $historyInfo;
  }

  //読んだ本詳細
  public function findHistory($Info) {
    $sql = 'SELECT * FROM history_books WHERE isbn = :isbn AND userId = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':isbn', $Info['isbn'], PDO::PARAM_STR);
    $sth->bindValue(':id', $Info['id'], PDO::PARAM_INT);
    $sth->execute();
    $historyView = $sth->fetch(PDO::FETCH_ASSOC);
    return $historyView;
  }

  //読んだ本編集
  public function updateEdit($editInfo) {
    $sql = 'UPDATE history_books 
            SET finished_reading_at = :date, evaluation = :evaluation, memory = :memory, impression = :impression, share = :share, recommend = :recommend
            WHERE userId = :userId AND isbn = :isbn';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':isbn', $editInfo['isbn'], PDO::PARAM_STR);
    $sth->bindValue(':userId', $editInfo['id'], PDO::PARAM_INT);   
    $sth->bindValue(':date', $editInfo['date'], PDO::PARAM_STR);
    $sth->bindValue(':evaluation', $editInfo['evaluation'], PDO::PARAM_STR);
    $sth->bindValue(':memory', $editInfo['memory'], PDO::PARAM_STR);
    $sth->bindValue(':impression', $editInfo['impression'], PDO::PARAM_STR);
    $sth->bindValue(':share', $editInfo['share'], PDO::PARAM_INT);
    $sth->bindValue(':recommend', $editInfo['recommend'], PDO::PARAM_STR);
    
    $sth->execute();
  }

  //読んだ本削除
  public function deleteReadingBook($deleteInfo) {
    $sql = 'DELETE FROM reading_books WHERE userId = :id AND isbn = :isbn';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':isbn', $deleteInfo['isbn'], PDO::PARAM_STR);
    $sth->bindValue(':id', $deleteInfo['id'], PDO::PARAM_INT);  
    $sth->execute();
  }

  //投稿一覧
  public function post() {
    $sql = 'SELECT * FROM history_books ORDER BY id DESC';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $historyInfo = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $historyInfo;
  }

  //投稿検索
  public function search($word) {
    $sql = 'SELECT * FROM history_books 
            WHERE CONCAT(title, author,recommend) LIKE :word AND share = 1';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':word', "%{$word}%", PDO::PARAM_STR);
    $sth->execute();      
    $searchResult = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $searchResult;
  }
  

}

