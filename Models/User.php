<?php
require_once(ROOT_PATH . '/Models/Db.php');

class User extends Db {
    public function __construct($dbh = null) {
        parent::__construct($dbh);
    }


    //ログイン処理
    public function userInfo($user) {
      $sql = 'SELECT * FROM users WHERE email = :email AND del_flg != 1';
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(':email', $user['email'], PDO::PARAM_STR);
      $sth->execute();
      $member = $sth->fetch(PDO::FETCH_ASSOC);
      return $member;
    }

    //新規登録
    public function createUser($sign) {
      $sql = 'INSERT INTO users (name, email, password)
              VALUES (:name, :email, :pass)';
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(':name', $sign['name'], PDO::PARAM_STR);
      $sth->bindValue(':email', $sign['email'], PDO::PARAM_STR);
      $sth->bindValue(':pass', password_hash($sign['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
      $sth->execute();
    }

    //メールアドレスの一致
    public function searchEmail() {
      $sql = 'SELECT email FROM users';
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $allEmail = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $allEmail;
    }

    //プロフィール編集内容の登録
    public function updateUser($editInfo) {
      $sql = 'UPDATE users
              SET name = :name, nickname = :nickname, email = :email, favorite_book = :favorite_book
              WHERE id = :id';
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(':id', $editInfo['id'], PDO::PARAM_INT);
      $sth->bindValue(':name', $editInfo['name'], PDO::PARAM_STR);
      $sth->bindValue(':nickname', $editInfo['nickname'], PDO::PARAM_STR);
      $sth->bindValue(':email', $editInfo['email'], PDO::PARAM_STR);
      $sth->bindValue(':favorite_book', $editInfo['favorite'], PDO::PARAM_STR);

      $sth->execute();
    }

    //アカウント削除（論理削除）
    public function deleteUser($email) {
      $sql = 'UPDATE users
              SET del_flg = 1 WHERE email = :email';
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(':email', $email['email'], PDO::PARAM_STR);

      $sth->execute();
    }

    //ユーザー一覧
    public function findAllUser() {
      $sql = 'SELECT * FROM users';
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $allUsers = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $allUsers;
    }

    //メールアドレス変更
    public function updatePass($info) {
      $sql = 'UPDATE users
              SET password = :password
              WHERE email = :email';
      $sth = $this->dbh->prepare($sql);
      $sth->bindValue(':email', $info['email'], PDO::PARAM_STR);
      $sth->bindValue(':password', password_hash($info['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
      $sth->execute();
    }

}