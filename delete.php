<?php
 include 'header.html';
if (isset($_POST['submitdetails'])) { 

try { 
$pdo = new PDO('mysql:host=localhost;dbname=kennels; charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM bookings where BookingId = :BookingId';
$result = $pdo->prepare($sql);
$result->bindValue(':BookingId', $_POST['BookingId']);
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM customer where custid in (SELECT custid FROM bookings where BookingId = :BookingId)';
    $result = $pdo->prepare($sql);
    $result->bindValue(':BookingId', $_POST['BookingId']);
    $result->execute();
  
    if($row = $result->fetch()) { 
    
        echo $row['Fore_Name'] . " " . $row['Sur_Name'] .  "<br>Are you sure you want to delete ??<br><br>"; ?>
	        <form action='deleteBooking.php' method='post'>
                <input type="hidden" name="id" value="<?php echo $_POST['BookingId'] ?>"> 
                <input type="submit" value="yes remove" name="delete">
            </form>
            <?php
            }
}
  else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}
}
?>
