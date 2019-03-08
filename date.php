                $date1 =  $A_Date;
$date2 = $D_Date;

$interval = $date1->diff($date2);
echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

// shows the total amount of days (not divided into years, months and days like above)
echo "difference " . $interval->days . " days ";