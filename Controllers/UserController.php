<?php
require_once(ROOT_PATH . '/Models/User.php');

class UserController {

  private $request; //リクエストパラメータ(GET,POST)
  private $users; //playerモデル

  public function __construct() {
      //リクエストパラメータの取得
      $this->request['get'] = $_GET;
      $this->request['post'] = $_POST;

      //モデルオブジェクトの生成
      $this->User = new User();
  }

  //新規登録
  public function register($sign) {
    $this->User->createUser($sign);
  }

  //ログイン
  public function loginUser($user) {
    $member = $this->User->userInfo($user);
    return $member;
  }

  //メールアドレスの一致
  public function matchEmail() {
    $allEmail = $this->User->searchEmail();
    return $allEmail;
  }

  //ユーザー編集画面
  public function updUser($editInfo) {
    $this->User->updateUser($editInfo);
  }

  //アカウント削除（論理削除）
  public function delete($email) {
    $this->User->deleteUser($email);
  }

  //ユーザー一覧
  public function indexUser() {
    $allUsers = $this->User->findAllUser();
    return $allUsers;
  }

   //メールアドレス変更
   public function resetPass($info) {
     $this->User->updatePass($info);
   }

}