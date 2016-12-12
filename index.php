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
<a type="button" class="btn btn-default navbar-btn" href='searchbyuser.php'>Keresés név alapján</a>
   <a type="button" class="btn btn-default navbar-btn" href='searchbynum.php'>Keresés szám alapján</a>
    
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
                            <?php echo $row["name"] ?>
                        </td>
                        <td>
                            <?php echo $row["phone_num"] ?>
                        </td>
                        <td>
                            <a class="btn btn-success" href="edit.php?id=<?php echo $row[" id "] ?>"><span class="glyphicon glyphicon-scissors"></span> Szerkesztés</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash"></span> Törlés</a>
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
<script>
    $('#myTabs a').click(function (e) {
	e.preventDefault();
  
	var url = $(this).attr("data-url");
  	var href = this.hash;
  	var pane = $(this);
	
	// ajax load from data-url
	$(href).load(url,function(result){      
	    pane.tab('show');
	});
});

// load first tab content
$('#home').load($('.active a').attr("data-url"),function(result){
  $('.active a').tab('show');
});
    </script>

</html>