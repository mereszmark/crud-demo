<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <a href="admin.php">Admin</a>
        <?php include "urlap.php"; 
        $data=[];
        while($row=mysql_fetch_assoc($result)){
            $data[]=$row;
        }
    ;?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>
                    Név    
                    </td> 
                </tr>
            </thead>
            <tbody>
               <?php foreach($data as $row ):  ?>
                <tr>
                    <td>
                        <?php echo $row["nev"] ?>   
                    </td>
                    <td>
                        <?php echo $row["tel"] ?>
                    </td>
                    <td>
                        <a class="btn btn-success"  href="edit.php?id=<?php echo $row["id"] ?>"><span class="glyphicon glyphicon-scissors"></span> Szerkesztés</a> 
                    </td>
                    <td>
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row["id"] ?>"><span class="glyphicon glyphicon-trash"></span> Törlés</a> 
                    </td>
                </tr> 
                <?php endforeach;?>
                
            </tbody>
        </table>
        <form action="save.php" method="POST">
            <input type="text" name="nev">
            <input type="submit">
        </form>
            
        <?php

        ?>
    </body>
</html>
