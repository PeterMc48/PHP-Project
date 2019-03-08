<?php

   // Connect to the database server
$pdo = new PDO('mysql:host=localhost;dbname=kennels; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$sql = 'SELECT * FROM kennels where kennelid=1';
$result = $pdo->prepare($sql);
$result->bindValue(':iid', 1); 
$result->execute();

$row = $result->fetch(); 
    
      
        echo '<img src= "'.$row['path'].'" /> ';
 
     

/*	$query   = "SELECT * FROM kennels where kennelid=1"; 
    	$result  = mysql_query($query) or die('Error, query failed'); 

    	list($id, $name, $size, $type, $filePath) = mysql_fetch_array($result); 
          
           header("Pragma: public");
           header("Expires: 0");
           header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
           header("Cache-Control: private",false);
           header("Content-Type: $type");
           header("Content-Disposition: attachment; filename=$name");
           header("Content-Transfer-Encoding: binary");
           header("Content-Length: $size");
           set_time_limit(0);
           @readfile("$filePath") or die("File not found.");
             
    THIS COMMENTED OUT CODE WILL CAUSE THE USER TO BE PROMPTED FOR A SAVE OR OPEN AS OPPOSED TO HAVING IT DISPLAYED ON SCREEN */
             
             
             
             


?>