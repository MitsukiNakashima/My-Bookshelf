<?php 
class BookApi {
  public function BookInfo(){
    define("APPLICATION_ID"     , '1002737656028226104');
    define("APPLICATION_SEACRET", 'c096aad4d301ad82d5bfc91f6a91a88ddef82560');
    define("AFFILIATE_ID"       , '20864f9f.d9a273f5.20864fa0.1d165e2a'); //アフィリエイトの際に必要
    define("ACCESS_URL"         , 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404?');
  
    
    $params = array();
    $params['format']              = 'json';
    $params['applicationId']       = APPLICATION_ID;
    $params['application_seacret'] = APPLICATION_SEACRET;
    $params['affiliateId']         = AFFILIATE_ID; //アフィリエイトの際に必要
    $params['size']                = '0';
    // $params['author']                = '';
  
    $requestURL = ACCESS_URL;
    foreach($params as $key => $param){
        $requestURL .= "&{$key}={$param}";
    }
  
    //結果がjson形式で帰ってくるのでdecodeし配列へ
    $request = file_get_contents($requestURL);
    $info    = json_decode($request, true);
  
    
    //ここでvar_dump($info);とかで確認すると良いよ
  
    $books = [];
    // 出力パラメータを変数に
    if (count($info) != 0) {
        foreach ($info as $key => $Items) {
            if ($key == "Items") {
                $Item = $Items;
    
                foreach($Items as $Item){
                    foreach($Item as $bookInfo){
                      $books[] = $bookInfo;
                    }
                }
  
                // DBで管理しやすいように文字コードの宣言やスペースの削除等を行う
                // $title        = mb_convert_kana($title, "as", "UTF-8");
            }
        }
    } else {
        //エラー
    }

    if(!empty($books)){
        return $books;
    }else{
        //エラー
    }
  }

  public function BookDetail($Isbn){
    define("APPLICATION_ID"     , '1002737656028226104');
    define("APPLICATION_SEACRET", 'c096aad4d301ad82d5bfc91f6a91a88ddef82560');
    define("AFFILIATE_ID"       , '20864f9f.d9a273f5.20864fa0.1d165e2a'); //アフィリエイトの際に必要
    define("ACCESS_URL"         , 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404?');
  
    
    $params = array();
    $params['format']              = 'json';
    $params['applicationId']       = APPLICATION_ID;
    $params['application_seacret'] = APPLICATION_SEACRET;
    $params['affiliateId']         = AFFILIATE_ID; //アフィリエイトの際に必要
    $params['isbn']                = $Isbn;

    $requestURL = ACCESS_URL;
    foreach($params as $key => $param){
        $requestURL .= "&{$key}={$param}";
    }

    // var_dump($requestURL);
  
    //結果がjson形式で帰ってくるのでdecodeし配列へ
    $request = file_get_contents($requestURL);
    $info    = json_decode($request, true);
  
    //ここでvar_dump($info);とかで確認すると良いよ
    
    $detail =[];
    // 出力パラメータを変数に
    if (count($info) != 0) {
        foreach ($info as $key => $Items) {
            if ($key == "Items") {
                
                $Item = $Items;
                
                foreach ($Items as $Item) {
                    foreach ($Item as $bookInfo) {
                        $detail = $bookInfo;
                    }
                }
            }
        }
        return $detail;
    } else {
        //エラー
    }
  }

  public function findAuthor($word){
    define("APPLICATION_ID"     , '1002737656028226104');
    define("APPLICATION_SEACRET", 'c096aad4d301ad82d5bfc91f6a91a88ddef82560');
    define("AFFILIATE_ID"       , '20864f9f.d9a273f5.20864fa0.1d165e2a'); //アフィリエイトの際に必要
    define("ACCESS_URL"         , 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404?');
  
    
    $params = array();
    $params['format']              = 'json';
    $params['applicationId']       = APPLICATION_ID;
    $params['application_seacret'] = APPLICATION_SEACRET;
    $params['affiliateId']         = AFFILIATE_ID; //アフィリエイトの際に必要
    $params['author']              = $word;
    // $params['title']               = $word;  もう一個メソッド作る？
    

    $requestURL = ACCESS_URL;
    foreach($params as $key => $param){
        $requestURL .= "&{$key}={$param}";
    }

    // var_dump($requestURL);
  
    //結果がjson形式で帰ってくるのでdecodeし配列へ
    $request = file_get_contents($requestURL);
    $info    = json_decode($request, true);
  
    // var_dump($info);
    
    $searchAuthor =[];
    // 出力パラメータを変数に
    if (count($info) != 0) {
        foreach ($info as $key => $Items) {
            if ($key == "Items") {
                
                $Item = $Items;
                
                foreach ($Items as $Item) {
                    foreach ($Item as $bookInfo) {
                        $searchAuthor[] = $bookInfo;
                    }
                }
            }
        }
        return $searchAuthor;
    } else {
        //エラー
    }
  }

  public function findTitle($word){
    // define("APPLICATION_ID"     , '1002737656028226104');
    // define("APPLICATION_SEACRET", 'c096aad4d301ad82d5bfc91f6a91a88ddef82560');
    // define("AFFILIATE_ID"       , '20864f9f.d9a273f5.20864fa0.1d165e2a'); //アフィリエイトの際に必要
    // define("ACCESS_URL"         , 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404?');
  
    
    $params = array();
    $params['format']              = 'json';
    $params['applicationId']       = APPLICATION_ID;
    $params['application_seacret'] = APPLICATION_SEACRET;
    $params['affiliateId']         = AFFILIATE_ID; //アフィリエイトの際に必要
    $params['title']               = $word;
    // $params['title']               = $word;  もう一個メソッド作る？
    

    $requestURL = ACCESS_URL;
    foreach($params as $key => $param){
        $requestURL .= "&{$key}={$param}";
    }

    // var_dump($requestURL);
  
    //結果がjson形式で帰ってくるのでdecodeし配列へ
    $request = file_get_contents($requestURL);
    $info    = json_decode($request, true);
  
    //ここでvar_dump($info);とかで確認すると良いよ
    
    $searchTitle =[];
    // 出力パラメータを変数に
    if (count($info) != 0) {
        foreach ($info as $key => $Items) {
            if ($key == "Items") {
                
                $Item = $Items;
                
                foreach ($Items as $Item) {
                    foreach ($Item as $bookInfo) {
                        $searchTitle[] = $bookInfo;
                    }
                }
            }
        }
        return $searchTitle;
    } else {
        //エラー
    }
  }

  public function findPublisher($word){
    // define("APPLICATION_ID"     , '1002737656028226104');
    // define("APPLICATION_SEACRET", 'c096aad4d301ad82d5bfc91f6a91a88ddef82560');
    // define("AFFILIATE_ID"       , '20864f9f.d9a273f5.20864fa0.1d165e2a'); //アフィリエイトの際に必要
    // define("ACCESS_URL"         , 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404?');
  
    
    $params = array();
    $params['format']              = 'json';
    $params['applicationId']       = APPLICATION_ID;
    $params['application_seacret'] = APPLICATION_SEACRET;
    $params['affiliateId']         = AFFILIATE_ID; //アフィリエイトの際に必要
    $params['publisherName']       = $word;
    // $params['title']               = $word;  もう一個メソッド作る？
    

    $requestURL = ACCESS_URL;
    foreach($params as $key => $param){
        $requestURL .= "&{$key}={$param}";
    }

    // var_dump($requestURL);
  
    //結果がjson形式で帰ってくるのでdecodeし配列へ
    $request = file_get_contents($requestURL);
    $info    = json_decode($request, true);
  
    //ここでvar_dump($info);とかで確認すると良いよ
    
    $searchPublisher =[];
    // 出力パラメータを変数に
    if (count($info) != 0) {
        foreach ($info as $key => $Items) {
            if ($key == "Items") {
                
                $Item = $Items;
                
                foreach ($Items as $Item) {
                    foreach ($Item as $bookInfo) {
                        $searchPublisher[] = $bookInfo;
                    }
                }
            }
        }
        return $searchPublisher;
    } else {
        //エラー
    }
  }

  public function findSize($word){
    // define("APPLICATION_ID"     , '1002737656028226104');
    // define("APPLICATION_SEACRET", 'c096aad4d301ad82d5bfc91f6a91a88ddef82560');
    // define("AFFILIATE_ID"       , '20864f9f.d9a273f5.20864fa0.1d165e2a'); //アフィリエイトの際に必要
    // define("ACCESS_URL"         , 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404?');
  
    
    $params = array();
    $params['format']              = 'json';
    $params['applicationId']       = APPLICATION_ID;
    $params['application_seacret'] = APPLICATION_SEACRET;
    $params['affiliateId']         = AFFILIATE_ID; //アフィリエイトの際に必要
    $params['size']                = $word;
    // $params['title']               = $word;  もう一個メソッド作る？
    

    $requestURL = ACCESS_URL;
    foreach($params as $key => $param){
        $requestURL .= "&{$key}={$param}";
    }

    // var_dump($requestURL);
  
    //結果がjson形式で帰ってくるのでdecodeし配列へ
    $request = file_get_contents($requestURL);
    $info    = json_decode($request, true);
  
    //ここでvar_dump($info);とかで確認すると良いよ
    
    $searchSize =[];
    // 出力パラメータを変数に
    if (count($info) != 0) {
        foreach ($info as $key => $Items) {
            if ($key == "Items") {
                
                $Item = $Items;
                
                foreach ($Items as $Item) {
                    foreach ($Item as $bookInfo) {
                        $searchSize[] = $bookInfo;
                    }
                }
            }
        }
        return $searchSize;
    } else {
        //エラー
    }
  }
  

}




?>