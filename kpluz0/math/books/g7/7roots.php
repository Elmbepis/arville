<?php

$grd=$grd;
$title="Rational and Irrational<br/>Roots of Numbers";
$img1="images/roots1.jpg";
$img2="images/roots2.jpg";
$img3="images/roots3.jpg";

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
In the last lesson, we learned that rational numbers are numbers that can be expressed as a fraction $vio<i>p/q</i>$black, where $vio<i>p</i>$black and $vio<i>q</i>$black are both integers and $vio<i>q</i>$black is not equal to zero. 
<br/><br/>
Here are examples of rational numbers in fraction form: $vio 1/2$black, $vio 2/3$black, $vio -3/4$black, $vio 11/17$black, $vio -251/789$black.
In each of these examples, both the numerator and denominator are integers and the denominator is not zero.
<br/><br/>
We also learned that rational numbers in decimal form are either either terminating or repeating.
<br/><br/>
Here are examples of decimal numbers that are rational because they are terminating: $vio 0.5$black, $vio 2.27$black, $vio 11.587$black, $vio 512.9487$black.
<br/><br/>
Here are examples of decimal numbers that are rational because they are repeating (their fraction forms are shown in blue next to them): 
<br/><br/>
$vio 0.3333...$blue(1/3)$black,<br/>
$vio 0.6666...$blue(2/3)$black,<br/> 
$vio 0.090909...$blue(1/11)$black,<br/> 
$vio 0.076923076923076923...$blue(1/13)$black.
<br/><br/>
Any number that is both non-terminating and non-repeating is irrational.
The number $vio<i>pi</i>$black (3.141592...) and the square root of 2 (1.414213...) are irrational numbers.
Both both them have an infinite number of non-repeating digits.
<br/><br/><br/>
@blue
Roots of Numbers
@nblue
<br/><br/>
The $vio<i>nth</i>$black root of a number $vio<i>x</i>$black is another number $vio<i>y</i>$black, which when multiplied by itself $vio<i>n-1</i>$black times, equals $vio<i>x</i>$black.
<br/><br/>
The nth root is called the square root if n=2. If n=2 and x=9, then y = 3. In other words, the square root of 9 is 3, because if you multiply 3 by itself once, the result would be 9.
<br/><br/>
Note that each number has two square roots: one positive and one negative. The other square root of 9 is -3.
The symbol for the square root is $vio<b>&Sqrt;</b>$black.  Hence, $vio<b>&Sqrt;</b>9$black = $vio &plusmn;3$black. 
<br/><br/>
The reverse of getting the square root of a number is called squaring a number.
Squaring the square root of any number $vio<i>x</i>$black would therefore give the number $vio<i>x</i>$black.
Thus, 3 x 3 = 9, which may be written as 3<sup>2</sup>=9.
<br/><br/>
If n=3, then the nth root is called the cube root. The cube root of 8 is 2, because if you multiply 2 by itself twice (2 x 2 x 2), the result would be 8.
<br/><br/>
The reverse of getting the cube root of a number is called cubing a number.
Cubing the cube root of any number $vio<i>x</i>$black would therefore give the number $vio<i>x</i>$black.
Thus, 2 x 2 x 2 = 8.
<br/><br/>
Squaring a number $vio<i>x</i>$black is also be referred to as raising $vio<i>x</i>$black to the power of 2, which may be written as $vio<i>x</i><sup>2</sup>$black.
<br/><br/>
Cubing a number $vio<i>x</i>$black is also be referred to as raising $vio<i>x</i>$black to the power of 3, which may be written as $vio<i>x</i><sup>3</sup>$black.
<br/><br/>
Any number $vio<i>x</i>$black may be raised to the power of any number $vio<i>n</i>$black.
Similarly, you can get the $vio<i>nth</i>$black root of any number $vio<i>x</i>$black.
<br/><br/>
For example, the fifth root of -243 is -3, because<br/>
-3 x -3 x -3 x -3 x -3 = -3$blue<sup>5$black</sup> = $vio -243$black.
<br/><br/>
On the other hand, the seventh root of 128 is 2, because<br/> 
2 x 2 x 2 x 2 x 2 x 2 x 2 = 2$blue<sup>7$black</sup> = $vio 128$black.
<br/><br/>
The powers $blue<i>5</i>$black and $blue<i>7</i>$black in the examples above are called exponents.
An exponent is therefore the power to which a given number or expression is to be raised.
<br/><br/>
Note that the signs of the roots of a number depend on the sign of the number itself and whether $vio<i>n</i>$black is odd or even.
The table below summarize the expected roots of positive and negative numbers for odd and even values of $vio<i>n</i>$black.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
$vio<u>Rational Roots</u>$black
<br/><br/>
The roots of a number may either be rational or irrational.
Using our definition for rational numbers, the roots of a number are rational if they are either terminating or repeating.
<br/><br/>
A perfect square is a number that is equal to the square of an integer or to the square of a rational number.
The square roots of perfect squares are therefore always rational.
<br/><br/>
Below are some integral and rational numbers and their rational roots.
<br/><br/>
1. $red<b>&Sqrt;81</b>$black = $blue&plusmn;9$black
<br/><br/>
2. $red<b>&Sqrt;144</b>$black = $blue&plusmn;12$black
<br/><br/>
3. $red<b>&Sqrt;4/25</b>$black = $blue&plusmn;2/5$black
<br/><br/>
4. $red<b>&Sqrt;0.01</b>$black = $blue&plusmn;0.1$black
<br/><br/>
5. $red<b>&Sqrt;0.0025</b>$black = $blue&plusmn;0.05$black
<br/><br/>
6. $red<b>&#8731;64</b>$black = $blue 4$black
<br/><br/>
7. $red<b>&#8731;-125</b>$black = $blue -5$black
<br/><br/>
8. $red<b>&#8731;-8/27</b>$black = $blue -2/3$black
<br/><br/>
9. $red<b>&#8731;0.008</b>$black = $blue 0.2$black
<br/><br/>
10. $red<b>&#8731;-0.000001</b>$black = $blue -0.01$black
<br/><br/>
$vio<u>Irrational Roots</u>$black
<br/><br/>
Using our definition for irrational numbers, the roots of a number are irrational if they are both non-terminating and non-repeating.
Numbers that are equal to the square of irrational numbers have irrational square roots.
<br/><br/>
Many integers as well as rational numbers have roots that are irrational.
Below are some integral and rational numbers and their irrational roots.
<br/><br/>
1. $red<b>&Sqrt;2</b>$black = $blue&plusmn;1.41421356...$black
<br/><br/>
2. $red<b>&Sqrt;3</b>$black = $blue&plusmn;1.7320508...$black
<br/><br/>
3. $red<b>&Sqrt;7</b>$black = $blue&plusmn;2.6457513...$black
<br/><br/>
4. $red<b>&Sqrt;11</b>$black = $blue&plusmn;3.31662479...$black
<br/><br/>
5. $red<b>&Sqrt;5/8</b>$black = $blue&plusmn;0.7905694...$black
<br/><br/>
6. $red<b>&Sqrt;0.93</b>$black = $blue&plusmn;0.96436507...$black
<br/><br/>
7. $red<b>&#8731;9</b>$black = $blue 2.08008382305...$black
<br/><br/>
8. $red<b>&#8731;-41</b>$black = $blue -3.44821724038...$black
<br/><br/>
9. $red<b>&#8731;1/4</b>$black = $blue 0.62996052494...$black
<br/><br/>
10. $red<b>&#8731;-1.75</b>$black = $blue -1.20507113209...$black
"
?>




















