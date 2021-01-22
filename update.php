<?php
session_start();
require_once('funcs.php');
login_verify();
$memo   = $_POST["memo"];
$id = $_POST["id"];
$ISBN = $_POST["ISBN"];

$pdo = db_conn();

$stmt = $pdo->prepare("UPDATE 
                            gs_bm_table 
                        SET 
                            memo = :memo
                        WHERE id =:id;");

$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    sql_error($stmt);
}else{
    //*** function化する！*****************
    redirect('mypage.php');
}
