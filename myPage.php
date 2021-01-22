<?php

require_once('funcs.php');
$pdo = db_conn();

session_start();
//ログイン済みの場合
if(!isset($_SESSION["EMAIL"])) {
  redirect('index.php');
  exit;
}else{
  $name = h($_SESSION['NAME']);
}
if($_SESSION['admin_flag']==1){
  $admin = '<a href="users_table.php" class="user-list">ユーザー一覧</a>';
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE user_id = :userID order by id DESC");
$stmt->bindValue(':userID', $_SESSION['ID'], PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$bm_ISBN = array();
$view = "";
if ($status == false) {
  sql_error($stmt);
} else {
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // array_push($bm_ISBN,array('ISBN'=>h($result['ISBN']),'memo'=>h($result['memo'])));
    $ISBN = $result['ISBN'];
    $memo = $result['memo'];
    $id = $result['id'];
    list($title,$authors,$thumbnail) = get_book($ISBN);
    

    $view .= '<div class="book">
                 <div class="book-img">';
    $view .= '<img src="' . $thumbnail . '">';
    $view .= '</div>
                 <div class="book-info">';
    $view .= '<p class="title">' . $title . '</p>';
    $view .= '<p class="authors">' . $authors . '</p>';
    $view .= '<p class="memo">' . $memo . '</p>';
    $view .= '<div class="button">';
    $view .= '<a href="edit.php?id='.$id.'&isbn='.$ISBN.'" class="edit">編集</a>';
    $view .= '<a href="delete.php?id='.$id.'&isbn='.$ISBN.'" class="delete" onclick="confirm()">削除</a>';
    $view .= '</div></div></div>';
  }
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookmark</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/style_mypage.css">
</head>

<body>
  <div class="header">
    <?= '<p>ようこそ ' . $name . 'さん</p>' ?>
    <form action="search.php" method="post" class="search" target="_blank">
      <input type="text" class="input" placeholder="書籍を検索" name="word">
      <button class="button" type="submit">検索</button>
    </form>
    <div class="header-right">
    <?= $admin ?>
    <a href="logout.php">ログアウト</a>
    </div>
  </div>
  <div class="main">
    <div class="main-top">
      <h1>ブックマークした書籍</h1>
    </div>
    <div class="main-bm"><?= $view ?></div>
  </div>
</body>
<script>
  function confirm(){
    let select = confirm('本当に削除しますか？');
    return select;
  }
  </script>
</html>