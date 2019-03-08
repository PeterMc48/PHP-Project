<!--small kennel image https://www.humideas.com/pets/dog-kennel-for-your-large-or-small-dog-traveling-select.html-->
<!--Medium kennel image https://www.gumtree.com/p/pet-equipment-accessories/brand-new-deluxe-extra-large-dog-kennel-and-run-with-galvanised-mesh-rrp-%C2%A3900/1284903352-->
<!--Large kennel image http://cherryacresanimalhousing.co.uk/shop/the-montgomery-large-dog-kennel-multi/-->
<!--XLarge kennel image https://www.gumtree.com/p/pet-equipment-accessories/extra-large-dog-kennel-and-run/1283482034-->
 <!DOCTYPE html>
<html lang='cs'>
  <head>
    <title></title>
    <meta charset='utf-8'>
    <style>
        img{
            width: 300px;
            height: 300px;
            float: left;
            margin:80px;   
        }
        h2{
            width:92%;
            margin: 15px auto;
        }
        
    </style>
  </head>

<?php 
 include 'header.html';
try { 
$pdo = new PDO('mysql:host=localhost;dbname=kennels; charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT * FROM kennels'; 

$result = $pdo->query($sql); 
echo "<h2>Click on kennel you wish to check availability</h2>";
while ($row = $result->fetch()) { 

$kID=$row['kennelid'];



echo "<a href='BookingForm.php?kID=$kID'>" .  '<img src="'.$row['path'] .'"/>'. '</a>';
} 
} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}


