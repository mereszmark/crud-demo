<?php

$connect=mysql_connect("localhost", "root", "");
mysql_select_db("test");
$result=mysql_query("select user.id , user.name , phone.phone_num from user left join phone on user.id=phone.user_id", $connect);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}


