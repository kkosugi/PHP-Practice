<?php
require 'password.php';   // password_hash()はphp 5.5.0以降の関数のため、バージョンが古くて使えない場合に使用
// セッション開始
session_start();

$db['host'] = "localhost";  // DBサーバのURL
$db['user'] = "hogeUser";  // ユーザー名
$db['pass'] = "hogehoge";  // ユーザー名のパスワード
$db['dbname'] = "loginManagement";  // データベース名

// エラーメッセージ、登録完了メッセージの初期化
$errorMessage = "";
$signUpMessage = "";

// ログインボタンが押された場合
if (isset($_POST["signUp"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["username"])) {  // 値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    } else if (empty($_POST["password2"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && $_POST["password"] === $_POST["password2"]) {
        // 入力したユーザIDとパスワードを格納
        $username = $_POST["username"];
        $password = $_POST["password"];

        // 2. ユーザIDとパスワードが入力されていたら認証する
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        // 3. エラー処理
        try {
            $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            $stmt = $pdo->prepare("INSERT INTO userData(name, password) VALUES (?, ?)");

            $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));  // パスワードのハッシュ化を行う（今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）
            $userid = $pdo->lastinsertid();  // 登録した(DB側でauto_incrementした)IDを$useridに入れる

            $signUpMessage = '登録が完了しました。あなたの登録IDは '. $userid. ' です。パスワードは '. $password. ' です。';  // ログイン時に使用するIDとパスワード
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
            // echo $e->getMessage();
        }
    } else if($_POST["password"] != $_POST["password2"]) {
        $errorMessage = 'パスワードに誤りがあります。';
    }
}
?>

<!doctype html>
<html>
    <head>
            <meta charset="UTF-8">
            <title>新規登録</title>
    </head>
    <body>
        <h1>新規登録画面</h1>
        <form id="loginForm" name="loginForm" action="" method="POST">
            <fieldset>
                <legend>新規登録フォーム</legend>
                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <div><font color="#0000ff"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></font></div>
                <label for="username">ユーザー名</label><input type="text" id="username" name="username" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["username"])) {echo htmlspecialchars($_POST["username"], ENT_QUOTES);} ?>">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <label for="password2">パスワード(確認用)</label><input type="password" id="password2" name="password2" value="" placeholder="再度パスワードを入力">
                <br>
                <input type="submit" id="signUp" name="signUp" value="新規登録">
            </fieldset>
        </form>
        <br>
        <form action="Login.php">
            <input type="submit" value="戻る">
        </form>
    </body>
</html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>サンプル掲示板</title>
    <link rel="stylesheet" href="common.css">
    <script src="jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="index.css"> -->
    <script type="text/javascript" src="jquery/js"></script>
  </head>
  <body>

<form>
  <fieldset>
    <Legend>input your data</Legend>

      <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">nickname</label>
      <div class="col-sm-10">
        <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" placeholder=" input your nickname">
      </div>
      </div>

      <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>

      <div class="form-group">
      <label for="exampleTextarea">Example textarea</label>
      <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
      </div>

      <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
      </div>

      <fieldset class="form-group">
      <legend>Radio buttons</legend>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
          Option one is this and that—be sure to include why it's great
        </label>
      </div>

      <div class="form-check">
      <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
          Option two can be something else and selecting it will deselect option one
        </label>
      </div>

      <div class="form-check disabled">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled="">
          Option three is disabled
        </label>
      </div>
</fieldset>

<fieldset class="form-group">
  <legend>Checkboxes</legend>
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" value="" checked="">
        Option one is this and that—be sure to include why it's great
      </label>
    </div>

    <div class="form-check disabled">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" value="" disabled="">
        Option two is disabled
      </label>
    </div>
</fieldset>

<button type="submit" class="btn btn-primary">Submit</button>
</fieldset>
</form>
