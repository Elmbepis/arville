<?php
$grd=$grd;
$title="The Riemann Sum";
$img1="images/riemann1.jpg";
$img2="images/riemann2.jpg";
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

The Riemann Sum is a fundamental concept in calculus and real analysis that serves as a bridge between the geometric idea of area and the analytical concept of integration. It plays a pivotal role in understanding and approximating definite integrals, 
which are essential for calculating quantities like total accumulated change, net area, and a wide range of other continuous quantities in mathematics, science, and engineering. 
<br/><br/>
The primary purpose of the Riemann Sum is to approximate the integral of a function over a specific interval.
The concept is named after the German mathematician Bernhard Riemann, who made significant contributions to the development of calculus in the 19th century.
<br/><br/>
At its core, the Riemann Sum is a method for dividing a specific interval on the x-axis into smaller subintervals. Within each subinterval, a sample point is chosen, and the function's value at that point is used to approximate the area under the curve. 
<br/><br/>
This approximation is made by creating rectangles for each subinterval, with the height of each rectangle representing the function's value at the chosen sample point and the width representing the width of the subinterval. 
These rectangles are then summed to estimate the overall area under the curve within the interval.
<br/><br/>
The key to the Riemann Sum's utility is that it provides a systematic approach for approximating definite integrals. As the number of subintervals increases and the width of each subinterval tends toward zero, 
the Riemann Sum becomes a more accurate approximation. 
<br/><br/>
In the limit, as the subintervals become infinitesimally small, the Riemann Sum converges to the exact value of the integral, effectively capturing the precise area under the curve.
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>
<br clear='left'><br/>
<br/>
@blue
Steps Used in Applying<br/>the Riemann Sum
@nblue
<br/><br/>
Below are the steps used in applying the Riemann Sum.
<br/><br/>$vio<u> 
1. Partition the interval.
</u>$black<br/><br/>
Consider a closed interval [a,b] on the x-axis. The first step is to divide this interval into smaller subintervals. You do this by selecting a set of points x<sub>0</sub>, x<sub>1</sub>, x<sub>2</sub>, ...,  x<sub>n</sub>
such that a=x<sub>0</sub> < x<sub>1</sub> < x<sub>2</sub>, ...,  < x<sub>n</sub> = b. 
<br/><br/>
These points are called partition points, and they divide the interval into subintervals [x<sub>0</sub>,x<sub>1</sub>], [x<sub>1</sub>,x<sub>2</sub>], ..., [x<sub>n-1</sub>,x<sub>n</sub>].
<br/><br/>$vio<u> 
2. Select sample points.
</u>$black<br/><br/>
For each subinterval [x<sub>i</sub>,x<sub>i+1</sub>], you choose a sample point c<sub>i</sub> within that subinterval. The choice of c<sub>i</sub> can vary but is often based on the specific problem or context.
<br/><br/>$vio<u> 
3. Calculate function values.
</u>$black<br/><br/>
At each sample point c<sub>i</sub>, you calculate the value of the function f(c<sub>i</sub>). 
<br/><br/>$vio<u> 
4. Get the subinterval areas.
</u>$black<br/><br/>
For each subinterval [x<sub>i</sub>,x<sub>i+1</sub>], you create a rectangle with width $pink &Delta;x = x<sub>i+1</sub> - x<sub>i</sub>$black and height $pink f(c<sub>i</sub>)$black. 
The area of this rectangle is $pink &Delta;x&middot;f(c<sub>i</sub>)$black. You will sum the areas of these rectangles to approximate the area under the curve. 
<br/><br/>$vio<u> 
5. Sum the areas.
</u>$black<br/><br/>
To obtain the Riemann Sum, you sum the areas of all the subinterval rectangles. This is done using the following formula:
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>$vio<u> 
6. Consider the accuracy.
</u>$black<br/><br/>
The Riemann Sum becomes more accurate as the width of the subintervals (&Delta;x) approaches zero, or as the number of subintervals (n) increases without bound. In the limit, as n approaches infinity 
and the subintervals become infinitesimally small, the Riemann Sum converges to the exact value of the integral of the function over the interval [a,b].
<br/><br/><br/>
@blue
Example of<br/>Solving Separable<br/>Differential Equations
@nblue
<br/><br/>
Find the Riemann Sum for the function f(x)=x<sup>2</sup> for the interval [0,1] using four subintervals. 
<br/><br/>
$red Solution:
<br/><br/>$vio<u> 
1. Partition the interval.
</u>$black<br/><br/>
We need to divide the interval into four subintervals, so we'll have four partitions: 
<br/><br/>
[0, 0.25]<br/>
[0.25, 0.5]<br/>
[0.5, 0.75]<br/>
[0.75, 1]
<br/><br/>$vio<u> 
2. Select sample points.
</u>$black<br/><br/>
For the Riemann Sum, let's use the right endpoints of each subinterval as our sample points. So, our sample points are 
<br/><br/>
c<sub>1</sub> = 0.25<br/>
c<sub>2</sub> = 0.5<br/>
c<sub>3</sub> = 0.75<br/>
c<sub>4</sub> = 1
<br/><br/>$vio<u> 
3. Calculate function values.
</u>$black<br/><br/>
Now, we calculate the values of the function at each of the sample points:
<br/><br/>
f(c<sub>1</sub>) = 0.25<sup>2</sup> = 0.0625
<br/><br/>
f(c<sub>2</sub>) = 0.5<sup>2</sup> = 0.25
<br/><br/>
f(c<sub>3</sub>) = 0.75<sup>2</sup> = 0.5625
<br/><br/>
f(c<sub>4</sub>) = 1<sup>2</sup> = 1
<br/><br/>$vio<u> 
4. Get the subinterval areas.
</u>$black<br/><br/>
We create rectangles for each subinterval using the height f(c<sub>i</sub>) and the width x<sub>i</sub>:
<br/><br/>
f(c<sub>1</sub>)&middot;x<sub>1</sub> = (0.0625)(0.25) = 0.015625
<br/><br/>
f(c<sub>2</sub>)&middot;x<sub>2</sub> = (0.25)(0.25) = 0.0625
<br/><br/>
f(c<sub>3</sub>)&middot;x<sub>3</sub> = (0.5625)(0.25) = 0.140625
<br/><br/>
f(c<sub>4</sub>)&middot;x<sub>4</sub> = (1)(0.25) = 0.25
<br/><br/>$vio<u> 
5. Sum the areas.
</u>$black<br/><br/>
To find the Riemann Sum, we sum the areas of all the rectangles as follows:
<br/><br/>
S = 0.015625 + 0.0625 + 0.140625 + 0.25 = $pink 0.46875 $black
<br/><br/>$vio<u> 
6. Consider the accuracy.
</u>$black<br/><br/>
The actual value of the area under the curve of f(x)=x<sup>2</sup> for the interval [0,1] is given by:
<br/><br/>
&#8747; x<sup>2</sup> dx = (1/3) x<sup>3</sup> + C
<br/><br/>
&#8747; <sub>[0,1]</sub> x<sup>2</sup> dx = (1/3) (1)<sup>3</sup> - (1/3) (0)<sup>3</sup> = $pink 0.333$black
<br/><br/>
Now, let's get the Reimann Sum for the same function and interval, but this time with 10 sub-intervals.
Without showing the initial steps, we should get:
<br/><br/>
S = 1/10 (0.1<sup>2</sup> + 0.2<sup>2</sup> + 0.3<sup>2</sup> + 0.4<sup>2</sup> + 0.5<sup>2</sup> + 0.6<sup>2</sup> + 0.7<sup>2</sup> + 0.8<sup>2</sup> + 0.9<sup>2</sup> + 1<sup>2</sup>)
<br/><br/>
= 1/10 (3.85) = $pink 0.385$black
<br/><br/>
Here, we see that the Reimann Sum from 10 sub-intervals, 0.385, is closer to the real value of 0.333 than the Reimann Sum from 4 sub-intervals, 0.46875.
This confirms that dividing the interval into a higher number of sub-intervals makes the Reimann Sum closer to the true value of the area under the curve for the given interval.

"
?>
