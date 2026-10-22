<?php

$grd=$grd;
$title="Integers and<br/>Integer Operations";
$img1="images/integers4.jpg";
$img2="images/integers1.jpg";
$img3="images/integers2.jpg";
$img4="images/integers3.jpg";

$red="<font color='#CC0000'>";
$vio="<font color='#800080'>";
$blue="<font color='#0000BB'>";
$black="<font color='#000000'>";
if (!isset($format)){$format=0;}
if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}
$article="
We all learn math at an early age by learning to count.  The numbers 1, 2, 3, 4,... are called natural numbers.  Any number greater than 0 is said to be positive so natural numbers are also called positive integers.
<br/><br/>
If we add '0' or zero to this set of natural numbers, what we get is the set of whole numbers.
<br/><br/>
A negative number is a number that's less than zero. 
Negative integers, or the negative equivalents of positive integers, consist of -1, -2, -3, -4,....
<br/><br/>
If we add this set of negative integers to the set of whole numbers, we will get the set of integers.  The set of integers therefore includes the set of positive integers, the number '0',  and the set of negative integers.
<br/><br/><br/>
@blue
Integer Operations
@nblue
<br/><br/>
$vio<u>Integer Addition<br/>and Subtraction</u>$black
<br/><br/>
We can use the integer number line to visualize the relationship between positive and negative numbers.
<br/><br/>
If we add a positive integer to any given integer on the number line, we are moving to an integer to the right of the given integer. 
<br/><br/>
On the other hand, adding a negative integer to any given integer on the number line moves us to an integer to the left of the given integer. 
<br/><br/>
The sum of any two positive integers is a positive integer that's greater than each of the added integers. 
For example, if we add +3 to +8, we'd get +11, which is a positive integer that's greater than either 3 or 8. 
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
The sum of any two negative integers is a negative integer that's more negative than each of the added integers. 
For example, if we add -5 to -6, we'd get -11, which is more negative than either -5 or -6. 
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/>
If you haven't noticed, adding a negative number is the same as subtracting a positive number.
For example, if we add -9 to +11, we'd get 11 + -9 = 11 - 9 = 2. 
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/>
Below are more examples of how to add and subtract integers. 
<br/><br/>
1. $vio -118 $black - $vio 73 $black - $vio 44 $black = $vio<b>-235</b>$black
<br/><br/>
2. $vio -104 $black - $vio -42 $black + $vio 28 $black = -104 + 42 + 28 = $vio<b>-34</b>$black
<br/><br/>
3. $vio 119 $black - $vio -36 $black - $vio -67 $black = 119 + 36 +67 = $vio<b>222</b>$black
<br/><br/>
4. $vio -111 $black + $vio 92 $black - $vio 68 $black = $vio<b>-87</b>$black
<br/><br/>
5. $vio 186 $black - $vio -212 $black - $vio -130 $black + $vio 57 $black =<br/>
= 186 + 212 + 130 + 57= $vio<b>585</b>$black
<br/><br/>
6. $vio -233 $black + $vio -241 $black - $vio -183 $black + $vio 239 $black<br/>= -233 -241 +183 +239 = $vio<b>-52</b>$black
<br/><br/>
$vio<u>Integer Multiplication<br/>and Division</u>$black
<br/><br/>
Multiplication and division of integers are just the same as those of whole numbers, except that the signs of the products and quotients depend on the signs of the integers being multiplied or divided. 
Below are the basic rules for integer multiplication and division.
<br/><br/>
$red<i>Rule # 1</i>$black<br/>
When two integers with the same sign are multiplied, the product is always positive. 
Here are examples:
<br/><br/>
1. $vio -12 $black x $vio -32 $black = $vio<b>384</b>$black
<br/><br/>
2. $vio 25 $black x $vio 45 $black = $vio<b>1125</b>$black
<br/><br/>
$red<i>Rule # 2</i>$black<br/>
When two integers with different signs are multiplied, the product is always negative. 
Here are examples:
<br/><br/>
1. $vio -17 $black x $vio 24 $black = $vio<b>-408</b>$black
<br/><br/>
2. $vio 32 $black x $vio -19 $black = $vio<b>-608</b>$black
<br/><br/>
$red<i>Rule # 3</i>$black<br/>
When division is performed on two integers with the same sign, the quotient is always positive. 
Here are examples:
<br/><br/>
1. $vio -360 $black &div; $vio -24 $black = $vio<b>15</b>$black
<br/><br/>
2. $vio 851 $black &div; $vio 37 $black = $vio<b>23</b>$black
<br/><br/>
$red<i>Rule # 4</i>$black<br/>
When division is performed on two integers with different signs, the quotient is always negative. 
Here are examples:
<br/><br/>
1. $vio -602 $black &div; $vio 43 $black = $vio<b>-14</b>$black
<br/><br/>
2. $vio 936 $black &div; $vio -18 $black = $vio<b>-52</b>$black
<br/><br/>
One must be careful when applying the rules above to multiply or divide more than two integers.
Here's what happens when you multiply three integers that all have a negative sign:
<br/><br/>
1. $vio -5 $black x $vio -12 $black x $vio -3 $black = $vio 60 $black x $vio -3 $black = $vio<b>-180</b>$black
<br/><br/>
Here's what happens when you divide three integers that all have a negative sign:
<br/><br/>
1. $vio -320 $black &div; $vio -5 $black &div; $vio -4 $black = $vio 64 $black &div; $vio -4 $black = $vio<b>-16</b>$black
<br/><br/>
The examples above show that multiplying or dividing an odd number of integers that are ALL negative would produce a negative result.
"
?>




















