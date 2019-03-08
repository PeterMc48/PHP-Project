<html>
  <head>
  <title>Update Kennels</title>
  <style>
        body{
            padding:0;
            margin:0;
        
        }
        #banner{
            width: 100%;
            height: 200px;
        }
        nav {
            width: 100%;
            margin: 0;
            background-color: darkgrey;
            padding:10px;
        }
        ul{
            text-align: center;
        }
        li{
            display: inline;
            font-size: 1.5em;
            margin:50px;
        }
        a{
            text-decoration: none;
            color:black;
        }
        form{
            margin:30px;
        }
        
    </style>
  </head>
  <body>
       <nav>
            <ul>
                <li><a href ="">Home</a></li>
                <li><a href ="selectKennels.php">Kennels</a></li>
                <li><a href ="updateKenelRateForm.html">Up Date Kennls</a></li>
                
                <li><a href="RemoveBookingform.html">Remove Booking</a></li>
              
            </ul>
       </nav>
    <form method="post" style ="margin:20px;">
        From: <input type="date" name="A_Date" 
                    value = "<?PHP if (isset($A_Date)) {echo $A_Date;} ?>">
        To: <input type ="date" name="D_Date"
            value = "<?PHP if(isset($D_Date)) {echo $D_Date;} ?>">
        <input type="submit" name="Check" value="Check Availability" >
    </form>
 </body>
</html>
<?php
    

if (isset($_POST['Check'])) {                   
try {
  
    $kID = ($_GET['kID']);
   
    $A_Date = date('y-m-d',strtotime($_POST['A_Date']));
    $D_Date = date('y-m-d',strtotime($_POST['D_Date']));

    $pdo = new PDO('mysql:host=localhost;dbname=kennels; charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql = "SELECT count(*) FROM bookings WHERE kennelid = '{$kID}' and '{$A_Date}' between A_Date and D_Date OR '{$D_Date}' between A_Date and D_Date OR 
    A_Date between '{$A_Date}' and '{$D_Date}' OR D_Date between '{$A_Date}' and '{$D_Date}'";

            
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':kennelid',$kID);
            $stmt->bindValue(':A_Date', $A_Date);
            $stmt->bindValue(':D_Date', $D_Date);
            
            $stmt->execute();
            
            
            if($stmt->fetchColumn() > 0) 
            {
                echo "Not Avalible try another date";
            }
            else{   
               
               $sql2 = "SELECT kennel_rate FROM kennels WHERE kennelid = $kID";
               $stmt2 = $pdo->prepare($sql2);
               $stmt2->bindValue(':kennelid',$kID);
              
               $stmt2->execute();
                                            
               $row = $stmt2->fetch();  
               
    $startDate = strtotime($_POST['A_Date']);
               $new_date = date('Y-m-d', $startDate);
    $endDate = strtotime($_POST['D_Date']);             
               $new_date2 = date('Y-m-d', $endDate);
   
                $startDate = date_create($new_date);
                $endDate = date_create($new_date2);


              $nbDays = $startDate->diff($endDate);

    $Amount = $row['kennel_rate'] * $nbDays->days;

    echo "The total amount is: " .  $Amount ."euros<br><br>"; 
    echo "Click<a href='addCustomerForm.php?kID=$kID&A_Date=$A_Date&D_Date=$D_Date&Amount=$Amount'>here</a> to continue with the booking";        
            }
            
     
 }    
 catch (PDOException $e) { 
    $title = 'An error has occurred';
                         echo $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
} 
} 
      
   
?>