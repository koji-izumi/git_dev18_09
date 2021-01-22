<?php

function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

function db_conn()
{
    try {
        $db_name = "gs_chat_db";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "localhost"; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt)
{
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name)
{
    header("Location: " . $file_name);
    exit();
}


function get_book($ISBN)
{
    $data = "https://www.googleapis.com/books/v1/volumes?q=isbn=" . $ISBN;
    $json = file_get_contents($data);
    $json_decode = json_decode($json);
    $book = $json_decode->items[0]->volumeInfo;
    $title = $book->title;
    $authors = $book->authors[0];
    $thumbnail = $book->imageLinks->thumbnail;
    $description = $book->description;
    return [$title, $authors, $thumbnail, $description];
}

function login_verify()
{
    if (!isset($_SESSION["EMAIL"])) {
        redirect('index.php');
        exit;
    }
}

function admin_verify()
{
    if ($_SESSION['admin_flag'] != 1) {
        redirect('myPage.php');
        exit;
    }
}
