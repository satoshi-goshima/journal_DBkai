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
  <title>ユーザーログイン画面</title>
</head>

<body>
  <form action="journal_login_act.php" method="POST">
    <fieldset>
      <legend>ユーザーログイン画面</legend>
      <div>
        ユーザー名： <input type="text" name="username">
      </div>
      <div>
        パスワード： <input type="text" name="password">
      </div>
      <div>
        <button>ログイン</button>
      </div>
      <a href="journal_register.php">未登録の方はこちら</a>
    </fieldset>
  </form>

</body>

</html>