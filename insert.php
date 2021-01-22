<?php
require_once('funcs.php');
session_start();
login_verify();
$userID = $_SESSION['ID'];
$ISBN = $_POST['ISBN'];


//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, user_id, ISBN, indate)VALUES(NULL, :user_id, :ISBN, sysdate())");

//  2. バインド変数を用意
$stmt->bindValue(':user_id', $userID, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':ISBN', $ISBN, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
}else{
  //５．myPage.phpへリダイレクト
  redirect('myPage.php');
}
?>
