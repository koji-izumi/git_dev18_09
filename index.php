<?php
require_once('funcs.php');
session_start();


if (!isset($_SESSION['EMAIL'])) {
  $header_left = '<p><a href="login.php">ログイン</a></p>';
  $header_right = '<a href="signUp.php">会員登録</a>';
} else {
  $header_left = '<p><a href="mypage.php">マイページ</a></p>';
  $header_right = '<a href="logout.php">ログアウト</a>';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookmark</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/search.js?1234"></script>
  <link rel="stylesheet" href="css/style_mypage.css?123">
</head>

<body>
  <div class="header">
    <?= $header_left ?>
    <?= $header_right ?>
  </div>
  <div class="main index-main">
    <h1 class="index-title">Bookmark</h1>
    <form action="search.php" method="post" class="search index-search" target="_blank">
      <input type="text" class="input index-input" placeholder="書籍を検索" name="word">
      <button class="button index-button" type="submit">検索</button>
    </form>
  </div>
</body>

</html>