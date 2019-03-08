$diff=date_diff($date1,$date2);
echo $diff->format("%a");
echo gettype($diff);
               
              $Amount = $row['kennel_rate'] * $diff;

?>