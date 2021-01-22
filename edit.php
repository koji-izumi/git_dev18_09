<?php
require_once('funcs.php');
session_start();
login_verify();
if (isset($_SESSION['EMAIL'])) {
  $name = h($_SESSION['NAME']);
}

$ISBN = $_GET['isbn'];
$id = $_GET['id'];
list($title, $authors, $thumbnail, $description) = get_book($ISBN);
$view = "";
$view .= '<form method="post" action="update.php" class="form">
              <div class="book">
                 <div class="book-img">';
$view .= '<img src="' . $thumbnail . '">';
$view .= '</div>
                 <div class="book-info">';
$view .= '<p class="title">' . $title . '</p>';
$view .= '<p class="authors">' . $authors . '</p>';
$view .= '<p class="description">' . $description . '</p>';
$view .= '</div></div>';
$view .= '<textarea name="memo" class="textarea" placeholder="メモを入力"></textarea>';
$view .= '<input type="hidden" name="id" value="' . $id . '">';
$view .= '<input type="hidden" name="ISBN" value="' . $ISBN . '">';
$view .= '<input type="submit" value="登録">';
$view .= '</div></form>';
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
</head>

<body>
  <div class="header">
    <div class="header-left">
      <p><a href="mypage.php">マイページ</a></p>
    </div>
    <form action="search.php" method="post" class="search" target="_blank">
      <input type="text" class="input" placeholder="書籍を検索" name="word">
      <button class="button" type="submit">検索</button>
    </form>
    <a href="logout.php">ログアウト</a>
  </div>
  <div class="main">
    <div class="main-bm  edit-main-bm"><?= $view ?></div>
  </div>
</body>

</html>