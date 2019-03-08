<?php
 include 'header.html';
try { 
$pdo = new PDO('mysql:host=localhost;dbname=kennels; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'update kennels set kennel_rate=:kennel_rate where kennel_type =:kennel_type';
$result = $pdo->prepare($sql);
$result->bindValue(':kennel_type', $_POST['kennel_type']);
$result->bindValue(':kennel_rate', $_POST['kennel_rate']);  
$result->execute();
     
//For most databases, PDOStatement::rowCount() does not return the number of rows affected by a SELECT statement.
     
$count = $result->rowCount();
if ($count > 0)
{
echo "You just updated the ".$_POST['kennel_type'] ." <br>click<a href='updateKennelRateForm.html'>here</a> to update another";
}
else
{
echo "nothing updated";
}
}
 
catch (PDOException $e) { 

$output = 'Unable to process query sorry : ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 

}
?>