 <?php
   include 'header.html';
       
        
    ?>
 <h2 style ="margin-left:15px;">New Customer</h2>

<form action="addCustomer.php" method="post" style = "margin: 20px;">
                <input type ="hidden" name ="kID" value = "<?php if(isset($kID)){ echo $kID; } else{ echo $_GET['kID']; }?>">
                <input type ="hidden" name ="A_Date" value = "<?php if(isset($A_Date)){ echo $A_Date; } else{ echo $_GET['A_Date']; }?>">
                <input type ="hidden" name ="D_Date" value = "<?php if(isset($D_Date)){ echo $D_Date; } else{ echo $_GET['D_Date']; }?>">
                <input type ="hidden" name ="Amount" value = "<?php if(isset($Amount)){ echo $Amount; } else{ echo $_GET['Amount']; }?>">
                
        First Name: <input type="text" name="Fname" 
                       value = "<?PHP if (isset($Fname)) {echo $Fname;} ?>" ><br><br>
        Surname: <input type="text" name="Sname" 
                       value = "<?PHP if (isset($Sname)) {echo $Sname;} ?>" style ="margin-left:15px;"><br><br>
        Street: <input type="text" name="Street" 
                       value = "<?PHP if (isset($Street)) {echo $Street;} ?>"style ="margin-left:34px;"><br><br>
        Town: <input type="text" name="Town" 
                       value = "<?PHP if (isset($Town)) {echo $Town;} ?>" style ="margin-left:35px;"><br><br>
        City: <input type="text" name="City" 
                       value = "<?PHP if (isset($City)) {echo $City;} ?>" style ="margin-left:44px;"><br><br>
        County: <input type="text" name="County" 
                       value = "<?PHP if (isset($County)) {echo $County;} ?>" style ="margin-left:24px;"><br><br>
        Mobile: <input type="text" name="Mobile" 
                       value = "<?PHP if (isset($Mobile)) {echo $Mobile;} ?>" style ="margin-left:25px;"><br><br>
        <input type="submit" name="submitdetails" value="submit" >
     </form>
 </body>
</html>
