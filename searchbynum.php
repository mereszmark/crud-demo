<?php  $row=false; 
if(isset($_POST['Submit'])){ //check if form was submitted
    $connect= mysql_connect("localhost", "root", "");
mysql_select_db("test", $connect);
$result=mysql_query("select phone.id , user.name , phone.phone_num from phone left join user on phone.user_id=user.id where phone.phone_num like '". $_POST['num']."'", $connect);
$row= mysql_fetch_assoc($result);
if($result===false){
    var_dump(mysql_error($connect));
}
    
}    
?>
    <!DOCTYPE html>
    <html lang="hu">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title>Search By Phone Number</title>
    </head>

    <body>
       <div class="row">
  <div class="col-lg-6">
        <h1>Keresés szám szerint</h1>
        <form action="" method="post" "navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" name="num" class="form-control" placeholder="Keresendő telefonszám">
            </div>
            <button name="Submit" type="submit" class="btn btn-default">Keresés</button>

        </form>

        </br>
        </br>
        </br>
        <?php if(isset($_POST['num'])){
    if($row!=false){ echo "
        <table class='table table-striped'>
            <thead>
                <tr>
                    <td>
                    Név    
                    </td> 
                    <td>
                    Telefonszám    
                    </td>
                </tr>
            </thead>
            <tbody>
               
                <tr>
                    <td>"
                         .$row['name']."  
                    </td>
                    <td>
                       ". $row['phone_num']."
                    </td>
                </tr>              
            </tbody>
        </table>";}  
        else {echo "Sajnos nincs találat, erre a keresési feltételre:".$_POST['num'];} }                    
        ?>
        </div>
</div>
    </body>

    </html>