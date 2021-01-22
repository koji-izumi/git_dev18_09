<?php
require_once('funcs.php');
$searchWord = '';
$searchWord = $_POST['word'];
$json = json_encode($searchWord);
session_start();
$name = $_SESSION['NAME'];

if(!isset($_SESSION['EMAIL'])){
  $header_left = '<p><a href="login.php">ログイン</a></p>';
  $header_right = '<a href="signUp.php">会員登録</a>';
}else{
  $header_left = '<p><a href="mypage.php">マイページ</a></p>';
  $header_right = '<a href="logout.php">ログアウト</a>';
}

$view = "";
$data = "https://www.googleapis.com/books/v1/volumes?q=" . $searchWord;
$json = file_get_contents($data);
$json_decode = json_decode($json);

foreach ($json_decode->items as $item) {
  $book = $item->volumeInfo;
  $title = $book->title;
  $authors = $book->authors[0];
  $thumbnail = $book->imageLinks->thumbnail;
  $description = $book->description;
  $ISBN = $book->industryIdentifiers[1]->identifier;
  $amazon = "https://www.amazon.co.jp/s?k=" . $ISBN;
  $url = "location.href='".$amazon."'";
  $view .= '<form action="insert.php" method ="post" class="book">';
  $view .= '<div class="book-img"><img src="' . $thumbnail . '"></div>';
  $view .= '<div class="book-info-search">';
  $view .= '<p class="title">' . $title . '</p>';
  $view .= '<p class="authors">' . $authors . '</p>';
  $view .= '<p class="description">' . $description . '</p>';
  $view .= '<div>';
  $view.='<button type="button" class="amazon" onclick='.$url.' formtarget="_blank">Amazon</button>';
  $view.='<label><input type="hidden" name="ISBN" value="' . $ISBN . '"></label>';
  if(isset($_SESSION['EMAIL'])){
    $view.='<input type="submit" value="ブックマークに登録" class="bookmark">';}
  $view.='</div></div></form>';

}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookmark</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" href="css/style_mypage.css?123">
</head>

<body>
  <div class="header">
    <?= $header_left ?>
    <form action="search.php" method="post" class="search">
      <input type="text" class="input" placeholder="<?php if ($searchWord == '') {
                                                      echo "書籍を検索";
                                                    } ?>" name="word" value="<?php if ($searchWord != '') {
                                                                                                                      echo $searchWord;
                                                                                                                    } ?>">
      <button class="button" type="submit">検索</button>
    </form>
    <?= $header_right ?>
  </div>
  <div class="main"><?= $view ?></div>


</body>

</html>