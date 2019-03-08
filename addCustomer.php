<?php

   
   
if (isset($_POST['submitdetails'])) {                   
try { 
    $kID = $_POST['kID'];
    $A_Date = $_POST['A_Date'];
    $D_Date = $_POST['D_Date'];
    $Amount = $_POST['Amount'];
    
    
    $Fname = $_POST['Fname'];
    $Sname = $_POST['Sname'];
    $Street = $_POST['Street'];
    $Town = $_POST['Town'];
    $City = $_POST['City'];
    $County = $_POST['County'];
    $Mobile = $_POST['Mobile'];
    if ($Fname == ''  or $Sname == '' or $Town == '' or $County == '' or $Mobile == '')
          {
        echo("You did not complete the insert form correctly <br> ");
                  }
               else{
    $pdo = new PDO('mysql:host=localhost;dbname=kennels; charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO customer (Fore_Name,Sur_Name, Street, Town, City, County, Mob_Number) 
    VALUES(:Fname,:Sname ,:Street ,:Town ,:City ,:County ,:Mobile)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':Fname', $Fname);
    $stmt->bindValue(':Sname', $Sname);
    $stmt->bindValue(':Street', $Street);
    $stmt->bindValue(':Town', $Town);
    $stmt->bindValue(':City', $City);
    $stmt->bindValue(':County', $County);
    $stmt->bindValue(':Mobile', $Mobile);
    
    
    $stmt->execute();
    
    $id = $pdo->lastInsertId();
    
    $sql2 = "INSERT INTO Bookings (A_Date,D_Date,Amount,Paid_Date,custid,kennelid) 
    VALUES(:A_Date,:D_Date ,:Amount ,:Paid_Date ,:custid ,:kennelid)";
    
    $stmt2 = $pdo->prepare($sql2);
    
    $stmt2->bindValue(':A_Date', $A_Date);
    $stmt2->bindValue(':D_Date', $D_Date);
    $stmt2->bindValue(':Amount', $Amount);
    $stmt2->bindValue(':Paid_Date', $A_Date);
    $stmt2->bindValue(':custid', $id);
    $stmt2->bindValue(':kennelid', $kID);
    
    $stmt2->execute();
    
    echo "<h1>booking Confirmed</h1>";
    
    }
} 
catch (PDOException $e) { 
    $title = 'An error has occurred';
                         echo $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
} 
} 

 include 'addCustomerform.php'
 ?>