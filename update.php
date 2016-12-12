<?php

$connect= mysql_connect("localhost", "root", "");
mysql_select_db("test", $connect);
$result=mysql_query("update user set name= ' ". $_POST["nev"] . "' where id=" . $_POST["id"], $connect);
if (mysql_num_rows(mysql_query("select user_id from phone where user_id= " . $_POST["id"],$connect))){
    $result=mysql_query("update phone set phone_num= ' ". $_POST["tel"] . "' where user_id=" . $_POST["id"],$connect);
}
else $result=mysql_query("insert into phone (user_id,phone_num) values ( ' ". $_POST["id"]."','".$_POST["tel"]."')",$connect);
if($result===false){
    var_dump(mysql_error($connect));
}
