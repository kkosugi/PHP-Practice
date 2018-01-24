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

    <div class="contents">
      <h1 >サンプル掲示板</h1>

      <hr>

      <!-- <script type="text/javascript">
      alert("javascript-test");
      </script> -->
      <form class="form-horizontal" method="post" action="upload.php">
      	<div class="form-group">
          <label class="col-sm-2 control-label" for="name">name</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" id="InputEmail" placeholder="name">
      		<label class="col-sm-2 control-label" for="InputEmail">mailadress</label>
      		<div class="col-sm-10">
      			<input type="email" class="form-control" id="InputEmail" placeholder="maildress">
      		</div>
      	</div>
      	<div class="form-group">
      		<label class="col-sm-2 control-label" for="InputPassword">パスワード</label>
      		<div class="col-sm-10">
      			<input type="password" class="form-control" id="InputPassword" placeholder="パスワード">
      		</div>
        </div>
        <p><button class ="btn" type="submit">送信</button></p>
      </form>

      <form class ="form-horizontal" method="post" action="upload.php">
        <h2  "name">name</h2>
        <input class="btn"type="text" name="n" placeholder="name" required/>
        <h2 class = "mail">mail address</h2>
        <input class="btn-default" name="m" placeholder="mailadress" />
        <h2 class = "comment">comment</h2>
        <textarea name="c" placeholder="comment"></textarea>

      <hr>

      <h2>登録データ</h2>

      <ul>

<?php
require_once "db_setting.php";
date_default_timezone_set('Asia/Tokyo');

try {
  // データベース読み込
  $dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);
  foreach($dbh->query('SELECT * from '.$table) as $row) {
      // print_r($row);
      echo "<li class='sentence'>";
      echo "<span class='id'>".$row["UserID"]."</span> : ";
      echo "<span class='name'>".$row["name"]."</span>";
      echo "<span class='mailadress'>".$row["mailadress"]."</span>";
      echo "<span class='times'>".$row["times"]."</span>";
      echo "<form method='post' action='delete.php'>";
      echo "<input type='hidden' name='UserID' value='".$row["UserID"]."'>";
      echo "<button type='submit'>delete</button>";
      echo "<button type='submit'>edit</button>";
      echo "</div>";

      echo "</form>";
      echo "</li>";

  }
  $totalPage = 10;
  if (
    isset($_GET["page"]) &&
    $_GET["page"] > 0 &&
    $_GET["page"] <= $totalPage
  ) {
    $page = (int)$_GET["page"];
  } else {
    $page = 1;
  }

  $dbh = null;
} catch (PDOException $e) {
  print "エラー!: " . $e->getMessage() . "<br/>";
  die();
}

?>

<p class = page>
    <?php if ($page > 1) : ?>
       <a href="?page=<?php echo ($page - 1); ?>"><</a>
    <?php endif; ?>

    <?php echo $page; ?>

    <?php if ($page < $totalPage) : ?>
    <a href="?page=<?php echo ($page + 1); ?>">></a>
    <?php endif; ?>
</p>
  </body>
</html>
