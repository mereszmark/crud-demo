<?php
$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
); 

$dbh = new PDO($dsn, $username, $password, $options);
$stmt=$dbh->prepare("delete from phone where user_id=:id")->execute($_GET);
$stmt=$dbh->prepare("delete from user where id=:id")->execute($_GET);
var_dump($dbh->errorInfo());
header("Location: http://localhost");