<?php
session_start();
include("functions.php");
check_session_id();

// DB接続

$pdo = connect_to_db();

// SQL作成&実行

$sql = "SELECT * FROM journal WHERE slip_date >= '2021-09-01' AND slip_date <= '2021-10-31'";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:'.$error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // var_dump($result);
  // exit();
  $output = "";
  foreach ($result as $record) {
    $output .= "
      <tr>
        <td>{$record["slip_date"]}</td>
        <td>{$record["l_sub"]}</td>
        <td>{$record["l_money"]}</td>
        <td>{$record["r_sub"]}</td>
        <td>{$record["r_money"]}</td>
        <td>{$record["descri"]}</td>
        <td>
          <a href='journal_edit.php?id={$record["id"]}'>修正</a>
        </td>
        <td>
          <a href='journal_delete.php?id={$record["id"]}'>削除</a>
        </td>
      </tr>
    ";
  }
}

$sql_u = "SELECT * FROM users_table";
$stmt_u = $pdo->prepare($sql_u);
$status_u = $stmt_u->execute();

if ($status_u == false) {
  $error_u = $stmt_u->errorInfo();
  exit('sqlError:'.$error_u[2]);
} else {
  $result_u = $stmt_u->fetchAll(PDO::FETCH_ASSOC);
  $output_u = "";
  foreach ($result_u as $record) {
    $output_u .= "
        {$record["username"]}
    ";
  }
}

?>

<!DOCTYPE html>
<html lang="ja">

<style>

legend{
  font-size: x-large;
}

#myTable .tablesorter-header {
	cursor: pointer;
	outline: none;
}

#myTable .tablesorter-header-inner::after { 
	content: '▼';
	font-size: 12px;
	margin-left: 5px;
}

table {
  margin-top: 10px;
  border-collapse: collapse;
  border-spacing: 0;
}

thead{
  background-color: skyblue;
}

th {
    text-align: center;
    border:solid;
    width: 5%;
}

td {
    border:solid;
    width: 5%;
    padding-left: 10px;
}

table tr td:nth-of-type(3){
  text-align: right;
  padding-right: 10px;
}

table tr td:nth-of-type(5){
  text-align: right;
  padding-right: 10px;
}

table tr td:nth-of-type(7){
  text-align: center;
  width: 2%;
  border: none;
}

table tr td:nth-of-type(8){
  text-align: center;
  width: 2%;
  border: none;
}

.tekiyou{
    width: 20%;
}

.user{
  text-align: right;
  padding: 10px 10px 0 0;
}

</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.min.js"></script>

  <title>仕訳帳</title>
</head>

<body>
<div class="user">LOGIN USER：<?= $output_u ?></div>
  <fieldset>
    <legend>仕訳帳</legend>
    <a href="journal_input.php">入力画面</a>
    <a href="journal_logout.php">ログアウト</a>

    <table class="tablesorter" id="myTable">
      <thead>
        <tr>
        <th>日　付</th>
          <th>借方科目</th>
          <th>借方金額</th>
          <th>貸方科目</th>
          <th>貸方金額</th>
          <th class="tekiyou">摘　　要</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>

  <script>

  $(document).ready(function() { 
    $("#myTable").tablesorter();
  });

  $("#myTable").tablesorter({
    sortList: [[0, 0]]
  });

  </script>

</body>

</html>