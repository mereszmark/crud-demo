<!DOCTYPE html>
<html>
   
   <head>
      <title>Paging Using PHP</title>
   </head>
   
   <body>
     <h1>
         List of all telephones with pagination, 1 telephone per 1 page
     </h1>
      <?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $page;
    $_PHP_SELF = $_SERVER['PHP_SELF'];
         
         $rec_limit = 1;
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
         mysql_select_db('test');
         
         /* Get total number of records */
         $sql = "SELECT count(id) FROM phone ";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysql_fetch_array($retval, MYSQL_NUM );
         $rec_count = $row[0];
         if( isset($_GET['page'] ) ) {
            $page = $_GET['page'] + 1;
            $offset = $rec_limit * $page ;
         }else {
            $page = 0;
            $offset = 0;
         }
         
         $left_rec = $rec_count - ($page * $rec_limit);
         $sql = "SELECT phone.user_id as id, user.name as name,phone.phone_num as phonenum ". 
            "FROM phone join user on phone.user_id=user.id ".
            "LIMIT $offset, $rec_limit";
            
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
            echo "USER ID :{$row['id']}  <br> ".
               "USER NAME : {$row['name']} <br> ".
                "USER PHONE : {$row['phonenum']} <br> ".
               "--------------------------------<br>";
         }
         if( $page > 0 && $left_rec > $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page=$last\">Előző</a> |";
            echo "<a href = \"$_PHP_SELF?page=$page\">Következő</a>";
         }else if( $page == 0 ) {
            echo "<a href = \"$_PHP_SELF?page=$page\">Következő</a>";
         }else if( $left_rec <= $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page=$last\">Előző</a>";
         }
         
         mysql_close($conn);
      ?>
      
   </body>
</html>