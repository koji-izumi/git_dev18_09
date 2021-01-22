<?php
require_once('funcs.php');
session_start();
$pdo = db_conn();
login_verify();
admin_verify();

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM gs_users_table
                        WHERE id =:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


//３．データ表示
if ($status == false) {
    sql_error($status);
} else {
    redirect('users_table.php');
}
