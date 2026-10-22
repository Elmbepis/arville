<?php

$grd=$grd;
$title="Conversion of<br/>Measurement Units";
$red="<font color='#CC0000'>";
$blue="<font color='#0000CC'>";
$vio=$font."<font color='#800080'>";
$black=$font."<font color='#000000'>";
$gray=$font."<font color='#555555'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#BB0000'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#800080'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#BB0000'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#800080'>"; 
	}

$article="

There are two commonly used measurement systems in the world today - the English system and the metric system.
<br/><br/>
The English system is a measurement system used in many countries (including the United States) whose measurement units include feet, pounds, and quarts.
Its measurement units were generally developed out of archaic approximations, such as a human foot equating to the unit 'foot.'
<br/><br/>
The English system was once the de facto standard measurement system throughout much of the world. 
However, it has now been largely replaced by the metric system, which is easier to use, especially in the field of science.
<br/><br/>
The metric system, which was first adopted in France in 1795 and is now used officially in almost all countries, is a system of measurement based on the decimal number system.
This means that all its units of measurements are based on powers of 10, making it easy to convert between them.
Today's modern form of the metric system is called the International System of Units, or SI.
<br/><br/>
The basic units in the metric system include the meter for length, gram for mass, and liter for volume.
Smaller or larger units are derived from these basic units by simply multiplying the latter by a certain power of ten.
<br/><br/>
To name a derived unit in the metric system, a prefix is attached to the base unit.
Below are examples of prefixes used in the metric system and their equivalent multipliers.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Metric System Prefixes </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 Prefix</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 Symbol</td>
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 Factor</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 Power of 10</td> 
</tr>

<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 tera</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 T</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1000000000000</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>12</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 giga</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 G</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1000000000</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>9</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 mega</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 M</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1000000</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>6</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 kilo</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 k</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1000</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>3</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 hecto</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 h</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 100</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>2</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 deca</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 da</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>1</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 deci</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 d</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 0.1</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>-1</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 centi</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 c</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 0.01</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>-2</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 milli</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 m</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 0.001</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>-3</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 micro</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 &micro;</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 0.000001</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>-6</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 nano</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 n</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 0.000000001</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>-9</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 pico</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 p</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 0.000000000001</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>-12</sup></td> 
</tr>
<tr>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 femto</td>
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 f</td> 
<td align='center' width='40%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 0.000000000000001</td> 
<td align='center' width='20%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 10<sup>-15</sup></td> 
</tr>
</table>
<br/><br/>
The prefixes in the table above are of no use if they are not associated with a basic unit.
Thus, one must know the basic units used in the metric system to be able to utilize these prefixes.
<br/><br/>
Below are the most common measurement units in the English and metric system, as well as their equivalents.
The English and metric units are labelled as 'E' and 'M', respectively. 
<br/><br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont3 Measurement Unit<br/>Conversion Factors </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td colspan='2' align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>Length</b></td>
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 foot  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 12 inches  $gray(E)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 yard  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 3 feet  $gray(E)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 mile  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 5280 feet  $gray(E)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 mil  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 0.001 inch  $gray(E)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 inch  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 2.54 centimeters  $gray(M)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 meter  $gray(M)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 100 centimeters  $gray(M)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 meter  $gray(M)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 3.28 feet  $gray(E)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 kilometer  $gray(M)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1000 meters  $gray(M)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 mile  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1.6 kilometers  $gray(M)$black</td> 
</tr>
<tr>
<td colspan='2' align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>Mass/Weight</b></td>
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 kilogram  $gray(M)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 2.2 pounds  $gray(E)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 kilogram  $gray(M)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1000 grams  $gray(M)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 metric ton  $gray(M)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1000 kilograms  $gray(M)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 pound  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 453.6 grams  $gray(M)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 pound  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 16 ounces  $gray(E)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 ounce  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 28.3495 grams  $gray(M)$black</td> 
</tr>
<tr>
<td colspan='2' align='center' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont4 <b>Volume</b></td>
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 liter  $gray(M)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1000 milliliters  $gray(M)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 cup  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 8 fluid ounces  $gray(E)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 pint  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 2 cups  $gray(E)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 quart  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 2 pints  $gray(E)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 gallon  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 4 quarts  $gray(E)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 gallon  $gray(E)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 3.79 liters  $gray(M)$black</td> 
</tr>
<tr>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1 liter  $gray(M)$black</td>
<td align='center' width='50%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1 1.057 quarts  $gray(E)$black</td> 
</tr>
</table>
<br/><br/>
It is often necessary, or at least convenient, to convert the measurement of a physical quantity from one unit of measurement into another.
The process of converting from one unit to another generally involves multiplication or division by a numerical factor. 
<br/><br/>
Sometimes, the process may even involve several steps of multiplication, especially if the direct conversion factor between the given units for conversion is not known. 
<br/><br/>
Let us look at a simple example to see how this is done.
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
Convert 7 meters into feet.
<br/><br/>
$blue Solution: $black
<br/><br/>
# of feet =  7 meters x 3.28 feet/meter = $vio 22.96  feet $black
<br/><br/>
Note that in the conversion above, we multiplied the number of meters by a factor whose denominator is 1 meter, to cancel out the said unit.
The numerator of the factor is in the unit that we are converting to - feet.
Of course, the numerical multiplier was just obtained from conversion tables such as the one presented above.
<br/><br/>
The selection of the factor to be used in the conversion should therefore have the new unit (or unit we are converting to) in the numerator and the old unit (or unit we are converting from) in the denominator.
Let's look at more examples of unit conversions.
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Convert 4.5 meters into inches without using the factor for directly converting meters into inches.
<br/><br/>
$blue Solution: $black
<br/><br/>
# of inches =  4.5 meters x 3.28 feet/meter x 12 inches/foot = $vio 177.12  inches $black
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
Convert 5 quarts into milliliters without using the factor for directly converting quarts into milliliters.
<br/><br/>
$blue Solution: $black
<br/><br/>
# of milliliters =  5 quarts x<br/>1 liter/1.057 quarts x 1000 milliliters/liter = $vio 4730.37  milliliters $black
<br/><br/>
$red<u>Example # 4</u>$black
<br/><br/>
Convert 11.7 kilograms into ounces without using the factor for directly converting kilograms into ounces.
<br/><br/>
$blue Solution: $black
<br/><br/>
# of ounces =  11.7 kilograms x 2.2 pounds/kilogram x 16 ounces/pound = $vio 411.84  ounces $black
<br/><br/>
$red<u>Example # 4</u>$black
<br/><br/>
Convert 97 inches into kilometer(s) without using the factor for directly converting inches into kilometer(s).
<br/><br/>
$blue Solution: $black
<br/><br/>
# of kilometer(s) =  97 inches x<br/>1 foot/12 inches x 1 meter/3.28 feet x 0.001 kilometer/meter = $vio 0.002464  kilometer $black
<br/><br/>
$red<u>Example # 5</u>$black
<br/><br/>
Convert 415 milliliters into gallon(s) without using the factor for directly converting milliliters into gallon(s).
<br/><br/>
$blue Solution: $black
<br/><br/>
# of gallon(s) = 415 milliliters x 0.001 liter/milliliter x 1 gallon/3.79 liters = $vio 0.1095  gallon $black
<br/><br/>
Note that the final results obtained above are not exact because, as in most conversions, the conversion factors used were rounded.
Using conversion factors with higher precision would produce more accurate conversion results.

";

?>




















