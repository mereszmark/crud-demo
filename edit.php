<?php
$connect= mysql_connect("localhost", "root", "");
mysql_select_db("test", $connect);
$result=mysql_query("select user.id , user.name , phone.phone_num from user left join phone on user.id=phone.user_id where user.id= ". $_GET["id"], $connect);
var_dump($result);

$row= mysql_fetch_assoc($result);
if($result==false){
    var_dump(mysql_error($result));
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <form action="update.php" method="POST">
            <input type="text" name="nev" value="<?php echo $row["name"]?>">
            <input type="hidden" name="id" value="<?php echo $row["id"]?>">
            <input type="text" name="tel" value="<?php echo $row["phone_num"]?>">
            <input type="submit">
            
        </form>
            
    </body>
</html>


