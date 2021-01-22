<?php
session_start();
require_once('funcs.php');
login_verify();
admin_verify();

$pdo = db_conn();
$stmt = $pdo->prepare("SELECT id,name,email,admin_flag,register_datetime FROM gs_users_table");
$status = $stmt->execute();

$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($result['admin_flag'] == 1) {
            $check_admin = '✔';
        } else {
            $check_admin = "";
        }
        $view .= '<tr>';
        $view .= '<td width="16%">' . h($result['id']) . '</td><td width="16%">' . h($result['name']) . '</td><td width="16%">' . h($result['email']) . '</td><td width="16%">' . $check_admin . '</td><td width="16%">' . h($result['register_datetime']) . '</td>';
        $view .= '<td width="10%"><a href="user_edit.php?id=' . h($result['id']) . '">編集</a></td>';
        $view .= '<td width="10%"><a href="user_delete.php?id=' . h($result['id']) . '">削除</a></td>';
        $view .= '</tr>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_myPage.css">
    <title>admin</title>
</head>

<body>
    <div class="header">
        <a href="myPage.php">マイページ</a>
        <a href="signUp.php">ユーザー登録</a>
        <a href="logout.php">ログアウト</a>
    </div>
    <div class="table">
        <table>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>E-mail</th>
                <th>管理者</th>
                <th>登録日時</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
            <?= $view ?>
        </table>
    </div>
</body>

</html>