<?php
include 'header.html';
try { 
$pdo = new PDO('mysql:host=localhost;dbname=kennels; charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'DELETE FROM bookings WHERE BookingId = :BookingId';
$result = $pdo->prepare($sql);
$result->bindValue(':BookingId', $_POST['id']);
$result->execute();
echo "You just deleted Booking number " . $_POST['id'] ." <br> click<a href='RemoveBookingform.html'> here</a> to go back ";



} 
catch (PDOException $e) { 

if ($e->getCode() == 23000) {
          echo "ooops couldnt delete as that record is linked to other tables click<a href='RemoveBookingform.html'> here</a> to go back ";
     }

}
?>
