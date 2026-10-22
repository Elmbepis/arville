<?php
$grd=$grd;
$title="Different Types<br/>of Discontinuity";
$img1="images/discont1.jpg";
$img2="images/discont2.jpg";
$img3="images/discont3.jpg";
$img4="images/discont4.jpg";
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

In calculus, discontinuities represent points in the domain of a function where the function's behavior is not continuous or smooth. There are several types of discontinuities, each characterized by distinct patterns of 
behavior at the discontinuity point. 
<br/><br/>
Understanding these types of discontinuities is essential for analyzing the behavior of functions, finding limits, and determining the continuity of functions in calculus. 
<br/><br/>
Below are the different types of discontinuity.
<br/><br/>$vio<u> 
1. Removable discontinuity<br/>(Point discontinuity)
</u>$black<br/><br/>
A removable discontinuity occurs at a specific point in the domain of the function. At this point, the function may have a hole or gap in its graph.
However, the limit of the function as it approaches this point exists and is finite. 
<br/><br/>
This type of discontinuity can often be \"removed\" or \"filled in\" by redefining the function at that point to make it continuous.
<br/><br/>
$blue Example$black
<br/><br/>
The function $pink f(x)= (x<sup>2</sup>-1)/(x-1)$black has a removable discontinuity at x=1.
<br/><br/>
To remove the discontinuity, factor the numerator as follows:
<br/><br/>
$pink f(x)= (x+1)(x-1)/(x-1)$black
<br/><br/>
Cancel out the common factor (x-1) to get:
<br/><br/>
$pink f(x)=x+1$black
<br/><br/>
This new function is continuous at x=1 and no longer has a discontinuity.
<br/><br/>$vio<u> 
2. Jump discontinuity<br/>(Step discontinuity)
</u>$black<br/><br/>
A jump discontinuity occurs when there is a sudden jump in the function's values at a specific point.
The limit of the function as it approaches this point from the left and right exists, but the left-hand and right-hand limits are not equal.
<br/><br/>
This type of discontinuity often appears as a \"step\" in the graph.
<br/><br/>
$blue Example$black
<br/><br/>
Consider the following function:$pink
<br/><br/>
f(x) = 0 if x < 2<br/>
f(x) = 1 if x &ge; 2$black
<br/><br/>
The graph of this function is shown below, clearly showing the 'step' at x=2.
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>
<br clear='left'><br/>
$vio<u> 
3. Infinite discontinuity<br/>(Vertical asymptote)
</u>$black<br/><br/>
An infinite discontinuity occurs when the function approaches positive or negative infinity at a specific point.
The limit of the function as it approaches this point does not exist as a finite real number.
<br/><br/>
This type of discontinuity often appears as a vertical asymptote in the graph.
<br/><br/>
$blue Example$black
<br/><br/>
The function $pink f(x) = 1/x$black has an infinite discontinuity or vertical asymptote at x=0, as shown in its graph below.
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img2'>
</td></tr></table>
<br clear='left'><br/>
$vio<u> 
4. Essential discontinuity<br/>(Non-removable discontinuity)
</u>$black<br/><br/>
An essential discontinuity occurs when there is a discontinuity point where neither the left-hand limit nor the right-hand limit exists as finite real numbers.
<br/><br/>
This type of discontinuity can be quite complex and irregular.
<br/><br/>
$blue Example$black
<br/><br/>
The function f(x) = $pink sin(1/x)$black has an essential discontinuity at x=0, as shown in its graph below.
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img3'>
</td></tr></table>
<br clear='left'><br/>
$vio<u> 
5. Mixed discontinuity
</u>$black<br/><br/>
A mixed discontinuity combines the characteristics of both jump and infinite discontinuities.
At this point, there is a sudden jump in the function's values, and the function approaches positive or negative infinity.
<br/><br/>
Both left-hand and right-hand limits are undefined as finite real numbers.
<br/><br/>
$blue Example$black
<br/><br/>
Consider the following function:$pink
<br/><br/>
f(x) = 0 if x < 0<br/>
f(x) = 1/x if x > 0$black
<br/><br/>
The graph of this function is shown below, clearly showing a mixed discontinuity at x=0.
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img4'>
</td></tr></table>
 
"
?>
