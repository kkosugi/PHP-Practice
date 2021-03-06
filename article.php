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
      <h1      >Pop</h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="subject.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">music</a></li>
        <li class="breadcrumb-item active">pop</li>
      </ol>
    </div>
<?php
require_once "db_setting.php";
date_default_timezone_set('Asia/Tokyo');

try {
  // データベース読み込
  $dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);
  foreach($dbh->query('SELECT * from '.$table) as $row) {
      // print_r($row);

      echo "<table class='table table-hover'>";
        echo "<thead>";
          echo "<tr>";
          echo "<img src='http://lorempixel.com/output/people-q-c-100-100-1.jpg'>";
          echo "<th scope='col'>nickname</th>";
          echo "<th scope='col'>".$row["name"]."</th>";
          echo "<th scope='col'>user_id</th>";
          echo "<th scope='col'>".$row["UserID"]."</th>";
          echo "<th scope='col'>time</th>";
          echo "<th scope='col'>".$row["times"]."</th>";
          echo "</tr>";
        echo "</thead>";

      // echo "<tbody>";
      //   echo "<tr class='table-primary'>";
      //     echo "<th scope='row'>mailadress</th>";
      //       echo "<td>".$row["mailadress"]."</td>";
      //   echo "</tr>";

        echo "<tr class='table-successs'>";
          echo "<th scope='row'>comment</th>";
            echo "<td>".$row["comment"]."</td>";
        echo "</tr>";
      echo "</table>";

      echo "<form method='post' action='delete.php'>";
      echo "<input type='hidden' name='UserID' value='".$row["UserID"]."'>";
      echo "<button class ='btn btn-primary btn-lg color: #00b0f0;' type='submit'>delete</button>";
      echo "<button class ='btn btn-primary btn-lg' id ='ebtn' type='submit'>edit</button>";
      echo "</div>";

      echo "</form>";
      echo "</li>";

  }

  // <table class="table table-hover">
  //   <thead>
  //     <tr>
  //       <th scope="col">Type</th>
  //       <th scope="col">Column heading</th>
  //       <th scope="col">Column heading</th>
  //       <th scope="col">Column heading</th>
  //     </tr>
  //   </thead>
  //   <tbody>
  //     <tr class="table-active">
  //       <th scope="row">Active</th>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //     </tr>
  //     <tr>
  //       <th scope="row">Default</th>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //     </tr>
  //     <tr class="table-primary">
  //       <th scope="row">Primary</th>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //     </tr>
  //     <tr class="table-secondary">
  //       <th scope="row">Secondary</th>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //     </tr>
  //     <tr class="table-success">
  //       <th scope="row">Success</th>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //     </tr>
  //     <tr class="table-danger">
  //       <th scope="row">Danger</th>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //     </tr>
  //     <tr class="table-warning">
  //       <th scope="row">Warning</th>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //     </tr>
  //     <tr class="table-info">
  //       <th scope="row">Info</th>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //     </tr>
  //     <tr class="table-light">
  //       <th scope="row">Light</th>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //     </tr>
  //     <tr class="table-dark">
  //       <th scope="row">Dark</th>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //       <td>Column content</td>
  //     </tr>
  //   </tbody>
  // </table>

  // $totalPage = 10;
  // if (
  //   isset($_GET["page"]) &&
  //   $_GET["page"] > 0 &&
  //   $_GET["page"] <= $totalPage
  // ) {
  //   $page = (int)$_GET["page"];
  // } else {
  //   $page = 1;
  // }

  $dbh = null;
} catch (PDOException $e) {
  print "エラー!: " . $e->getMessage() . "<br/>";
  die();
}

?>

<nav>
  <ul class="pager">
    <li class="disabled"><a href="">&laquo;</a></li>
    <li class="active"><a href="">1</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    <li><a href="">4</a></li>
    <li><a href="">&raquo;</a></li>
  </ul>
</nav>

<!-- ページの最下部に常に表示されるようにするabsolute -->
<form class="form-horizontal" method="post" action="upload.php">
  <div class="form-group">
    <!-- <label class="col-sm-1 control-label" for="InputPassword">comment</label> -->
    <div class="col-sm-11">
      <input type="comment" class="form-control" id="InputPassword" name="c" placeholder="comment">
      <button class ="btn" type="submit">送信</button>
    </div>
    <br></br>

  </div>

</form>


  </body>
</html>
