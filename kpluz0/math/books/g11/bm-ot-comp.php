<?php
$grd=$grd;
$title="Overtime<br/>Computation";
$img1="images/bm-dec1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$pink=$font."<font color='#CC0066'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:18pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:30pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}

$article="

Overtime pay computation in the Philippines is governed by the Labor Code of the Philippines and is designed to provide fair compensation to employees who work beyond their regular work hours. 
Overtime pay is typically higher than the regular hourly rate to incentivize employees to work additional hours. Below is an explanation of how overtime pay is calculated in the Philippines.
<br/><br/><br/>
@blue
Regular Overtime
@nblue
<br/><br/>
When an employee works beyond the regular 8-hour workday, any hours worked beyond that are considered overtime. The overtime pay rate is $vio 125%$black of the employee's regular hourly rate. This means that for each hour of overtime worked, 
the employee is entitled to their regular hourly rate plus an additional 25% of that rate.
<br/><br/>
$red<u>Example</u>$black
<br/><br/>
Let's say an employee's regular hourly rate is &#8369; 100. If the employee works 3 hours of overtime, the computation would be as follows:
<br/><br/>
Overtime Pay = Overtime Hours &times; Regular Hourly Rate &times; 1.25
<br/><br/>
= 3 hours &times; &#8369; 100 &times; 1.25
<br/><br/>
= $vio &#8369; 375$black
<br/><br/><br/>
@blue
Overtime on Rest Day<br/>or Special Non-Working Day
@nblue
<br/><br/>
Overtime worked on an employee's rest day or a special non-working day is compensated at a higher rate. The overtime pay rate is $vio 130%$black of the employee's regular hourly rate.
<br/><br/>
$red<u>Example</u>$black
<br/><br/>
If the employee works 4 hours of overtime on a rest day using the same regular hourly rate of &#8369; 100, the computation would be as follows:
<br/><br/>
Overtime Pay = Overtime Hours &times; Regular Hourly Rate &times; 1.30
<br/><br/>
= 4 hours &times; &#8369; 100 &times; 1.30 
<br/><br/>
= $vio &#8369; 520$black
<br/><br/><br/>
@blue
Overtime on Regular Holiday<br/>or Special Holiday
@nblue
<br/><br/>
Overtime worked on a regular holiday or special holiday is compensated even more generously. The overtime pay rate is $vio 150%$black of the employee's regular hourly rate.
<br/><br/>
$red<u>Example</u>$black
<br/><br/>
If the employee works 2 hours of overtime on a regular holiday or special holiday using the same regular hourly rate of &#8369; 100, the computation would be as follows:
<br/><br/>
Overtime Pay = Overtime Hours &times; Regular Hourly Rate &times; 1.50
<br/><br/>
= 2 hours &times; &#8369; 100 &times; 1.50 
<br/><br/>
= $vio &#8369; 300$black

"
?>
