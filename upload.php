<?php

$UserID      = time();
$name    = $_REQUEST["n"];
$comment = $_REQUEST["c"];
$mailadress = $_REQUEST["m"];
$times = $_REQUEST["times"];
$datetime = $_REQUEST["datetime"];

require_once "db_setting.php";

// データベース書き込み
$dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);
$stmt = $dbh -> prepare("INSERT INTO ".$table." (UserID,name,comment,mailadress,timestamp,time,times,datetime) VALUES (:UserID, :name, :comment, :mailadress, :timestamp, :time, :times, :datetime)");
$stmt->bindValue(':UserID', $UserID, PDO::PARAM_INT);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
$stmt->bindParam(':mailadress', $mailadress, PDO::PARAM_STR);
$stmt->bindParam(':timestamp', $timestamp, PDO::PARAM_STR);
$stmt->bindParam(':time', $time, PDO::PARAM_STR);
$stmt->bindParam(':times', $times, PDO::PARAM_STR);
$stmt->bindValue(':datetime', $datetime, PDO::PARAM_STR);
$stmt->execute();


// index.phpにリダイレクト
header("Location: index.php");
