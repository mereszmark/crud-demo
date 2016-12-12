<?php
$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '';
$i=0;
$names=array("Karesz","Jani","Jozsi");
$phone_nums=array("0120314","3753754","14353263");
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$dbh = new PDO($dsn, $username, $password, $options);
$stmt=$dbh->prepare("drop table phone");
$stmt->execute();
$stmt=$dbh->prepare("drop table user");
$stmt->execute();
$stmt=$dbh->prepare("create table user (id int key auto_increment, name varchar(50) not null) ");
$stmt->execute();
$stmt=$dbh->prepare("create table phone (id int key auto_increment,user_id int,phone_num varchar(50) not null) ");
$stmt->execute();

foreach($names as $name){
    $stmt=$dbh->prepare("insert into user (name) values (:name)");
    $stmt->bindParam(':name', $name);    
    $stmt->execute();
}
foreach($phone_nums as $num){
    $i++;
    $stmt=$dbh->prepare("insert into phone (user_id,phone_num) values (:id,:num)");
    $stmt->bindParam(':num', $num); 
    $stmt->bindParam(':id', $i); 
    $stmt->execute();
}
