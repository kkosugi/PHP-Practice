
<?php
session_start();

if (isset($_SESSION["NAME"])) {
    $errorMessage = "ログアウトしました。";
} else {
    $errorMessage = "セッションがタイムアウトしました。";
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>logout</title>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
      <div class="container">
      	<div class="row login_box">
      	    <div class="col-md-12 col-xs-12" align="center">
                  <div class="line"><h3>LOGOUT</h3></div>
                  <div class="outter"><img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="image-circle"/></div>
                  <h1>See You Next Time</h1>
                  <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
                  <span>username</span>
      	    </div>

              <div class="col-md-12 col-xs-12 login_control">

                      <!-- <div class="control">
                          <div class="label">Email Address</div>
                          <input type="text" class="form-control" value="admin@gmail.com"/>
                      </div>

                      <div class="control">
                           <div class="label">Password</div>
                          <input type="password" class="form-control" value="123456"/>
                      </div> -->
                      <div align="center">
                           <button class="btn btn-orange"><a href="Login.php">Logout</a></button>
                      </div>
                      <!-- <div align="center">
                           <button class="btn btn-orange"><a href="Login.php">Return To Login Page</a></button>
                      </div> -->

              </div>
        <!-- <h1>ログアウト画面</h1>
        <!-- <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
        <ul> -->
            <!-- <li><a href="Login.php">ログイン画面に戻る</a></li>
        </ul> -->
             <div align="center"><a href="index.html">Return Top</a></div>
    </body>
</html>
<!--
<!DOCTYPE>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="login.css">

<div class="container">
	<div class="row login_box">
	    <div class="col-md-12 col-xs-12" align="center">
            <div class="line"><h3>LOGOUT</h3></div>
            <div class="outter"><img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="image-circle"/></div>
            <h1>See You Next Time</h1>
            <span>username</span>
	    </div>

        <div class="col-md-12 col-xs-12 login_control">

                <!-- <div class="control">
                    <div class="label">Email Address</div>
                    <input type="text" class="form-control" value="admin@gmail.com"/>
                </div>

                <div class="control">
                     <div class="label">Password</div>
                    <input type="password" class="form-control" value="123456"/>
                </div> -->
                <!-- <div align="center">
                     <button class="btn btn-orange">Logout</button>
                </div>

        </div> -->
