<?php

session_start();
include("functions.php");
check_session_id();

// var_dump($_POST);
// exit();
// 入力項目のチェック
if (
    !isset($_POST['slip_date']) || $_POST['slip_date']=='' ||
    !isset($_POST['l_sub']) || $_POST['l_sub']=='' ||
    !isset($_POST['l_money']) || $_POST['l_money']=='' ||
    !isset($_POST['r_sub']) || $_POST['r_sub']=='' ||
    !isset($_POST['r_money']) || $_POST['r_money']=='' ||
    !isset($_POST['descri']) || $_POST['descri']=='' ||
    !isset($_POST['id']) || $_POST['id'] == ''
    ) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
    }

    $slip_date = $_POST['slip_date'];
    $l_sub = $_POST['l_sub'];
    $l_money = $_POST['l_money'];
    $r_sub = $_POST['r_sub'];
    $r_money = $_POST['r_money'];
    $descri = $_POST['descri'];
    $id = $_POST['id'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'UPDATE journal SET slip_date=:slip_date, l_sub=:l_sub, l_money=:l_money, r_sub=:r_sub, r_money=:r_money, descri=:descri, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':slip_date', $slip_date, PDO::PARAM_STR);
$stmt->bindValue(':l_sub', $l_sub, PDO::PARAM_STR);
$stmt->bindValue(':l_money', $l_money, PDO::PARAM_STR);
$stmt->bindValue(':r_sub', $r_sub, PDO::PARAM_STR);
$stmt->bindValue(':r_money', $r_money, PDO::PARAM_STR);
$stmt->bindValue(':descri', $descri, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header('Location:journal_read.php');
    exit();
}