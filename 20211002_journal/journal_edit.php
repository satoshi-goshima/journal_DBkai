<?php

session_start();
include("functions.php");
check_session_id();

// var_dump($_GET);
// exit();
// id受け取り
$id = $_GET["id"];

// DB接続
$pdo = connect_to_db();

// SQL実行

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

$sql = 'SELECT * FROM journal WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<style>

body{
  background-color: lightskyblue;
}

fieldset div{
  margin: 10px 0;
}

.tekiyo{
  width: 456px;
}

legend{
  font-size: x-large;
  color: yellow;
}

.user{
  text-align: right;
  padding: 10px 10px 0 0;
}

</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>仕訳修正画面</title>
</head>

<body>
  <div class="user">LOGIN USER：<?= $output_u ?></div>
  <form action="journal_update.php" method="POST">
    <fieldset>
      <legend>仕訳修正画面</legend>
      <a href="journal_read.php">一覧画面</a>
      <a href="journal_logout.php">ログアウト</a>
      <div>
        伝票日付: <input type="date" name="slip_date" value="<?= $record["slip_date"] ?>">
      </div>
      <div>
        借方科目: <input type="text" name="l_sub" value="<?= $record["l_sub"] ?>">　／　貸方科目: <input type="text" name="r_sub" value="<?= $record["r_sub"] ?>">
      </div>
      <div>
        借方金額: <input type="text" name="l_money" value="<?= $record["l_money"] ?>">　／　貸方金額: <input type="text" name="r_money" value="<?= $record["r_money"] ?>">
      </div>
      <div>
        摘　　要: <input type="text" name="descri" class="tekiyo" value="<?= $record["descri"] ?>">
      </div>
      <input type="hidden" name="id" value="<?= $record["id"] ?>">
      <div>
        <button>仕訳修正</button>
      </div>
    </fieldset>
  </form>

</body>

</html>