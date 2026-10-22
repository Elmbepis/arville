<?php
$grd=$grd;
$title="Review of<br/>Decimal Operations";
$img1="images/bm-dec1.jpg";
$img2="images/bm-dec2.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";

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

We've already learned in previous years how to add, subtract, multiply, and divide decimal numbers.
In this lesson, we will review how these operations are performed.
<br/><br/><br/>
@blue
Decimal Addition<br/>and Subtraction
@nblue
<br/><br/>
We already know that in order to add or subtract decimal numbers, the decimal points should first be aligned vertically before proceeding with the operation as one would with whole numbers. 
This includes padding the decimal numbers with zeros if necessary to ensure proper alignment.
<br/><br/>
$red<u>
Example # 1
</u>$black
<br/><br/>
Solve: 12.56 +  0.129 = ?
<br/><br/>
$blue Solution: $black
<br/><br/>
Align the decimal points then add as follows:
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>
<br clear='left'><br/>
$red<u>
Example # 2
</u>$black
<br/><br/>
Solve: 312.21 - 5.073 = ?
<br/><br/>
$blue Solution: $black
<br/><br/>
Align the decimal points then subtract as follows:
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img2'>
</td></tr></table>
<br clear='left'><br/><br/>
@blue
Decimal Multiplication
@nblue
<br/><br/>
Recall that decimal multiplication is done by multiplying the decimals first as if they were whole numbers. The total number of decimal places in the factors is then counted. Finally, the decimal point in the product is adjusted by the same number of places.
<br/><br/>
$red<u>
Example # 3
</u>$black
<br/><br/>
Solve: 4.62 &times; 11.5 = ?
<br/><br/>
$blue Solution: $black
<br/><br/>
Step 1. Multiple the decimal numbers as if they were whole numbers:
<br/><br/>
462 &times; 115 = 53130
<br/><br/>
Step 2. Together, the factors have 3 decimal places, so the decimal number of the product needs to be adjusted by 3 places as follows:
<br/><br/>
4.62 &times; 11.5 = $vio 53$red<b>.$vio</b>130$black = $vio 53$red<b>.$vio</b>13$black
<br/><br/>
$red<u>
Example # 4
</u>$black
<br/><br/>
Solve: 25.8 &times; 0.004 = ?
<br/><br/>
$blue Solution: $black
<br/><br/>
Step 1. Multiple the decimal numbers as if they were whole numbers:
<br/><br/>
258 &times; 4 = 1032
<br/><br/>
Step 2. Together, the factors have 4 decimal places, so the decimal number of the product needs to be adjusted by 4 places as follows:
<br/><br/>
25.8 &times; 0.004 = $vio 0$red<b>.$vio</b>1032$black
<br/><br/><br/>
@blue
Decimal Division
@nblue
<br/><br/>
Again, that decimal division is done by dividing the decimals first as if they were whole numbers. 
Finally, the decimal point in the quotient is adjusted by the difference between the number of decimal places in the dividend and the number of decimal places in the divisor.
<br/><br/>
$red<u>
Example # 5
</u>$black
<br/><br/>
Solve: 4.55 &div; 0.5 = ?
<br/><br/>
$blue Solution: $black
<br/><br/>
Step 1. Divide the decimal numbers as if they were whole numbers:
<br/><br/>
455 &div; 5 = 91
<br/><br/>
Step 2. The difference between the number of decimal places in the dividend and the number of decimal places in the divisor is 2-1 = 1, so the decimal number of the quotient needs to be adjusted by 1 place to the left as follows:
<br/><br/>
4.55 &div; 0.5 = $vio 9$red<b>.$vio</b>1$black
<br/><br/>
$red<u>
Example # 6
</u>$black
<br/><br/>
Solve: 41.31 &div; 0.017 = ?
<br/><br/>
$blue Solution: $black
<br/><br/>
Step 1. Divide the decimal numbers as if they were whole numbers:
<br/><br/>
4131 &div; 17 = 243
<br/><br/>
Step 2. The difference between the number of decimal places in the dividend and the number of decimal places in the divisor is 2-3 = -1, so the decimal number of the quotient needs to be adjusted by 1 place to the right as follows:
<br/><br/>
41.31 &div; 0.017 = $vio 2430$black
<br/><br/><br/>
@blue
Decimal-Fraction<br/>Conversion
@nblue
<br/><br/>
Recall that a decimal number may converted into a fraction using the following steps.
<br/><br/>
1. Form the numerator using the digits of the decimal number without the decimal point.
<br/><br/>
2. Form the denominator by raising 10 to the number of decimal places in the decimal number.
<br/><br/>
3. Form the fraction and simplify.
<br/><br/>
$red<u>
Example # 7
</u>$black
<br/><br/>
Convert 31.756 into a fraction.
<br/><br/>
$blue Solution: $black
<br/><br/>
Step 1. Form the numerator using the digits of the decimal number without the decimal point as follows:
<br/><br/>
31756
<br/><br/>
Step 2. Form the denominator by raising 10 to 3, which is the number of decimal places in the decimal number, as follows:
<br/><br/>
1000
<br/><br/>
Step 3. Form the fraction and simplify as follows:
<br/><br/>
31756/1000 = $vio 7939/250$black
<br/><br/><br/>
@blue
Fraction-Decimal<br/>Conversion
@nblue
<br/><br/>
Recall that a fraction may be converted into a decimal number by simply dividing the numerator by the denominator.
<br/><br/>
$red<u>
Example # 7
</u>$black
<br/><br/>
Convert 12/25 into a decimal number.
<br/><br/>
$blue Solution: $black
<br/><br/>
12 &div; 25 = $vio 0.48$black

"
?>
