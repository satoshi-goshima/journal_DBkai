<?php

session_start();
include("functions.php");
check_session_id();

// var_dump($_POST);
// exit();
// POSTデータ確認
if (
    !isset($_POST['slip_date']) || $_POST['slip_date']=='' ||
    !isset($_POST['l_sub']) || $_POST['l_sub']=='' ||
    !isset($_POST['l_money']) || $_POST['l_money']=='' ||
    !isset($_POST['r_sub']) || $_POST['r_sub']=='' ||
    !isset($_POST['r_money']) || $_POST['r_money']=='' ||
    !isset($_POST['descri']) || $_POST['descri']==''
) {
    exit('ParamError');
}

$slip_date = $_POST['slip_date'];
$l_sub = $_POST['l_sub'];
$l_money = $_POST['l_money'];
$r_sub = $_POST['r_sub'];
$r_money = $_POST['r_money'];
$descri = $_POST['descri'];

// DB接続

$pdo = connect_to_db();

// SQL作成&実行

$sql = 'INSERT INTO journal (id, slip_date, l_sub, l_money, r_sub, r_money, descri, created_at, updated_at) VALUES (NULL, :slip_date, :l_sub, :l_money, :r_sub, :r_money, :descri, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':slip_date', $slip_date, PDO::PARAM_STR);
$stmt->bindValue(':l_sub', $l_sub, PDO::PARAM_STR);
$stmt->bindValue(':l_money', $l_money, PDO::PARAM_STR);
$stmt->bindValue(':r_sub', $r_sub, PDO::PARAM_STR);
$stmt->bindValue(':r_money', $r_money, PDO::PARAM_STR);
$stmt->bindValue(':descri', $descri, PDO::PARAM_STR);

// SQL実行（実行に失敗すると$statusにfalseが返ってくる）
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
} else {
    header('Location:journal_input.php');
}