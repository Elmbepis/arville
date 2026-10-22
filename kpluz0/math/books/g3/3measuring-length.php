<?php

$grd=$grd;
$title="Measurement<br/>Units of Length";
$img1="images/measurement-length1.jpg";
$red=$font."<font color='#BB0000'>";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$black=$font."<font color='#000000'>";

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:20pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:20pt;color:#BB0000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:18pt;color:#800080'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:34pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:34pt;color:#BB0000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:36pt;color:#800080'>"; 
	}

$article="
In the last lesson, we learned the units of measurement for time.
We also learned how to convert each unit of time into another.
<br/><br/>
In this lesson, we will learn the measurement units for length.
We will also learn how to convert between them.
<br/><br/>
We use devices such as rulers, meter sticks, and measuring tapes to measure length.
We express the lengths we measure using units of length like meters and centimeters.
<br/><br/>
Units of length allow us to measure length precisely. 
This means that we get more or less the same value whenever we measure the same length.
<br/><br/>
Some things, such as planets and moons, are very large.
Units of length that we often use to measure such things include kilometers and miles.
<br/><br/>
Some things, such as plants, animals, and machines, are not too large nor too small.
Units of length that we often use to measure such things include meters and feet.
<br/><br/>
Some things, such as coins and keys, are small.
Units of length that we often use to measure such things include inches and centimeters.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
Although there are many different units of time, it doesn't really matter which ones we use to measure length.
<br/><br/>
Any unit of length may be converted into another unit of length. 
As such, we can express any length in any unit of length that we choose.
<br/><br/><br/>
@blue
Converting Units of Length
@nblue
<br/>
The Philippines still uses both the metric and English systems for measuring lengths.
To convert between different units of length, we must know how they are related to each other. 
<br/><br/>
The metric system is easier to use because its units are in multiples of ten. 
Metric units are also easier to remember because they only differ in their prefixes.
<br/><br/>
The metric units for length include meters, kilometers, centimeters, and millimeters.
The English units for length include feet, yards, and miles.
<br/><br/>
In metric units, the prefix 'kilo' means 1000, 'centi' means one hundredth or 1/100, and 'milli' means one thousandth or 1/1000.
<br/><br/>
For example, 1 kilometer equals 1000 meters because 'kilo' means 1000.
On the other hand, 1 centimeter equals 1/100 meter. 
There are therefore 100 centimeters in one meter.
<br/><br/>
Study the length unit conversion table below, which lists equivalent units of length in pairs.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Length Unit Conversion Chart </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#E6FDF4' bordercolor='#99DCF2'>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:10px; padding-bottom:10px'; width='42%'>$tfont2 <b>&nbsp;Larger Unit&nbsp;</b></td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:10px; padding-bottom:10px'; width='58%'>$tfont2 <b>Smaller Unit</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'; width='42%'>$tfont1 1 meter (m)</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 100 centimeters (cm)</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'; width='42%'>$tfont1 1 meter (m)</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 1000 millimeters (mm)</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'; width='42%'>$tfont1 1 kilometer (km)</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 1000 meters (m)</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'; width='42%'>$tfont1 1 foot (ft)</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 12 inches (in)</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'; width='42%'>$tfont1 1 yard (yd)</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 3 feet (ft)</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'; width='42%'>$tfont1 1 mile (mi)</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 5280 feet (ft)</td>
</tr></table>
<br/><br/>
Although the metric and English systems are different from each other, we can convert between their units. 
In this lesson, however, we will stick to converting units within the same system only.
<br/><br/>
Now let's apply our knowledge of equivalent units of length to convert length measurements from one unit into another.
Below are examples of how to do it.
<br/><br/><br/>
@blue
Examples of How to Convert<br/>Between Units of Length
@nblue
<br/>
@php1conversion-length@
<br/>
If you refresh this page, it will give new examples of how to convert length measurements from one unit into another. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice converting measurements of length from one unit to another. 
"
?>




















