<?php
session_start();
include("functions.php");
check_session_id();

// DB接続

$pdo = connect_to_db();

// SQL作成&実行

$sql_u = "SELECT * FROM users_table";
$stmt_u = $pdo->prepare($sql_u);
$status_u = $stmt_u->execute();

if ($status_u == false) {
  $error_u = $stmt_u->errorInfo();
  exit('sqlError:'.$error_u[2]);
} else {
  $result_u = $stmt_u->fetchAll(PDO::FETCH_ASSOC);
  // var_dump($result);
  // exit();
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

fieldset div{
  margin: 10px 0;
}

.tekiyo{
  width: 456px;
}

legend{
  font-size: x-large;
}

.user{
  text-align: right;
  padding: 10px 10px 0 0;
}

</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>仕訳入力画面</title>
</head>

<body>
<div class="user">LOGIN USER：<?= $output_u ?></div>
  <form action="journal_create.php" method="POST">
    <fieldset>
      <legend>仕訳入力画面</legend>
      <a href="journal_read.php">一覧画面</a>
      <a href="journal_logout.php">ログアウト</a>
      <div>
        伝票日付: <input type="date" name="slip_date">
      </div>
      <!-- <div>
        伝票番号: <input type="number" name="slip_number">
      </div>

      <div>
        借方部門CD: <input type="number" name="l_dep_cd">
      </div>
      <div>
        借方部門: <input type="text" name="l_dep">
      </div>
      <div>
        借方科目CD: <input type="text" name="l_sub_cd">
      </div> -->
      <div>
        借方科目: <input type="text" name="l_sub">　／　貸方科目: <input type="text" name="r_sub">
      </div>
      <!-- <div>
        借方補助科目CD: <input type="text" name="l_aux_sub_cd">
      </div>
      <div>
        借方補助科目: <input type="text" name="l_aux_sub">
      </div>
      <div>
        借方税区分: <input type="text" name="l_tax_class">
      </div>
      <div>
        借方税率: <input type="text" name="l_tax_rate">
      </div>
      <div>
        借方金額: <input type="text" name="l_money">
      </div> -->

      <!-- <div>
        貸方部門CD: <input type="number" name="r_dep_cd">
      </div>
      <div>
        貸方部門: <input type="text" name="r_dep">
      </div>
      <div>
        貸方科目CD: <input type="text" name="r_sub_cd">
      </div> -->
      <div>
      借方金額: <input type="text" name="l_money">　／　貸方金額: <input type="text" name="r_money">
      </div>
      <!-- <div>
        貸方補助科目CD: <input type="text" name="r_aux_sub_cd">
      </div>
      <div>
        貸方補助科目: <input type="text" name="r_aux_sub">
      </div>
      <div>
        貸方税区分: <input type="text" name="r_tax_class">
      </div>
      <div>
        貸方税率: <input type="text" name="r_tax_rate">
      </div>
      <div>
        貸方金額: <input type="text" name="r_money">
      </div> -->

      <div>
        摘　　要: <input type="text" name="descri" class="tekiyo">
      </div>
      <div>
        <button>仕訳計上</button>
      </div>
    </fieldset>
  </form>

</body>

</html>