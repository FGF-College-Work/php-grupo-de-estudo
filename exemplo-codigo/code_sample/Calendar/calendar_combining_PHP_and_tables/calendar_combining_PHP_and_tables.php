<? 
/*  This calendar is not very pretty as-is, but it is functional and fast. 
    Formatting to suit your needs should be fairly simple.   

    The latest version of this calendar is formatted much more niceley.  It 
    also includes a full-featured "Community Calendar" which is linked to a 
    MySQL database for reporting upcoming events. 

    The latest copy of the calendar can be viewed and/or downloaded from: 
    http://modems.rosenet.net/mysql/   */ 

/*  Set some variables  */ 
$date=01; 
$day=01; 
$off=0; 

/*  The month and year variables can (should) be passed from a preceding 
    web page rather than hard coded  */ 
$month = '05'; 
$year = '1999'; 

/*  Figure out how many days are in this month  */ 
while (checkdate($month,$date,$year)): 
$date++; 
endwhile; 

/*  Create a table with days of the week headers  */ 
echo "<table border='1' cellpaddig='5' cellspacing='5' width='100%'><tr>"; 
echo "<th><b><font face='Arial'>Sunday</font></b></th>"; 
echo "<th><b><font face='Arial'>Monday</font></b></th>"; 
echo "<th><b><font face='Arial'>Tuesday</font></b></th>"; 
echo "<th><b><font face='Arial'>Wednesday</font></b></th>"; 
echo "<th><b><font face='Arial'>Thursday</font></b></th>"; 
echo "<th><b><font face='Arial'>Friday</font></b></th>"; 
echo "<th><b><font face='Arial'>Saturday</font></b></th>"; 

/*  Start the table data and make sure the number of days does not exceed 
    the total for the month  - $date will always be one more than the total 
    number of days in the momth  */ 
echo "<tr>"; 
while ($day<$date): 

/*  Figure what day of the week the first falls on and set the number of 
    preceding and trailing cells accordingly  */ 
if ($day == '01' and date('l', mktime(0,0,0,$month,$day,$year)) == 'Sunday') { 
  echo "<td>$day</td>"; 
  $off = '01'; 
} 
elseif ($day == '01' and date('l', mktime(0,0,0,$month,$day,$year)) == 
'Monday') { 
  echo "<td></td><td>$day</td>"; 
  $off= '02'; 
} 
elseif ($day == '01' and date('l', mktime(0,0,0,$month,$day,$year)) == 
'Tuesday') { 
  echo "<td></td><td></td><td>$day</td>"; 
  $off= '03'; 
} 
elseif ($day == '01' and date('l', mktime(0,0,0,$month,$day,$year)) == 
'Wednesday') { 
  echo "<td></td><td></td><td></td><td>$day</td>"; 
  $off= '04'; 
} 
elseif ($day == '01' and date('l', mktime(0,0,0,$month,$day,$year)) == 
'Thursday') { 
echo "<td></td><td></td><td></td><td></td><td>$day</td>"; 
$off= '05'; 
} 
elseif ($day == '01' and date('l', mktime(0,0,0,$month,$day,$year)) == 
'Friday') { 
  echo "<td></td><td></td><td></td><td></td><td></td><td>$day</td>"; 
  $off= '06'; 
} 
elseif ($day == '01' and date('l', mktime(0,0,0,$month,$day,$year)) == 
'Saturday') { 
  echo "<td></td><td></td><td></td><td></td><td></td><td></td><td>$day</td>"; 
  $off= '07'; 
} 
else { 
  echo "<td>$day</td>"; 
} 

/*  Increment the day and increment the cells that go before the end of the row 
    and end the row when appropriate */ 
$day++; 
$off++; 

if ($off>7) { 
  echo "</tr><tr>"; 
  $off='01'; 
} else { 
  echo ""; 
} 

endwhile; 

echo "</table>"; 

?>
