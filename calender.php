<?php

$months=array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$current_month=date('n');
$current_year=date('Y');
$current_day=date('d');

$month = $current_month;

$first_day_in_month=date('w',mktime(0,0,0,$month,1,$current_year));
		$month_days=date('t',mktime(0,0,0,$month,1,$current_year));
		
// in PHP, Sunday is the first day in the week with number zero (0)
// to make our calendar works we will change this to (7)
if ($first_day_in_month==0){
	$first_day_in_month=7;
}
?>

<!DOCTYPE html>
<HTML>
   <HEAD>
   	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
   	  <script src="calender.js"></script> 
      <TITLE>Home</TITLE>
	  <link rel="stylesheet" type="text/css" href="calender_css.css"></link>
   </HEAD>
<BODY>
<div class="year-div">
	<p class="year"><?php echo $current_year?></p>
</div>

<div class="calender-div">
	<table class="calender">
		<th colspan="7" class="month"><?php echo $months[$month-1]?></th>
		<tr class="days"><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td><td>Su</td></tr>
		<tr class="week">
			<?php
			for($i=1; $i<$first_day_in_month; $i++) {
				echo '<td> </td>'; // print blank space
			}

			for($day=1; $day<=$month_days; $day++) {
				$pos=($day+$first_day_in_month-1)%7;

				echo '<td href="#" id="day"><p class="day-num">'.$day.'</p>';
				echo '<p class="day-info">Info here<p></td>';
				if ($pos==0) echo '</tr><tr>'; // End of week
			}
			?>
		</tr>
	</table>
</div>
</BODY>
</HTML>
