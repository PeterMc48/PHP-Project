<?php
        include 'BookingForm.php';

if (isset($_POST['Check'])) {                   
try {
  
    $kID = ($_POST['kID']);
   
    $A_Date = date('y-m-d',strtotime($_POST['A_Date']));
    $D_Date = date('y-m-d',strtotime($_POST['D_Date']));

    $pdo = new PDO('mysql:host=localhost;dbname=kennels; charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql = "SELECT * FROM bookings WHERE kennelid AND '{$A_Date}' between A_Date and D_Date OR '{$D_Date}' between A_Date and D_Date";

            
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':kennelid',$kID);
            $stmt->bindValue(':A_Date', $A_Date);
            $stmt->bindValue(':D_Date', $D_Date);
            
            $stmt->execute();
            $result = $pdo->query($sql);
    
            if($result->fetch() > 0)
            {
                echo "Not Avalible try another date";
            }
            else{   
                 echo $kID;
                 echo "Avalible, would you like to book<br>Click<a href='Amount.php?kennelid=$kID&A_Date=$A_Date&D_Date=$D_Date'>here</a>";
            }
            
     
 }    
 catch (PDOException $e) { 
    $title = 'An error has occurred';
                         echo $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
} 
} 
      
   
?>