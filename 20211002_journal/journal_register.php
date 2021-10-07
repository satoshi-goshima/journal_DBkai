<style>

div{
  margin: 10px 0;
}

</style>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー登録画面</title>
</head>

<body>
  <form action="journal_register_act.php" method="POST">
    <fieldset>
      <legend>ユーザー登録画面</legend>
      <div>
        ユーザー名： <input type="text" name="username">
      </div>
      <div>
        パスワード： <input type="text" name="password">
      </div>
      <div>
        <button>登録</button>
      </div>
      <a href="journal_login.php">ログインページはこちら</a>
    </fieldset>
  </form>

</body>

</html>