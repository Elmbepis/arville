<?php
$grd=$grd;
$title="The Normal Curve";
$img1="images/pdf-normal.jpg";
$img2="images/normal-curve1.jpg";
$img3="images/normal-curve2.jpg";
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

The normal curve, also known as the Gaussian curve or bell curve, is a graphical representation of the probability distribution of a continuous random variable that follows a normal distribution. 
It is called a \"curve\" because it has a distinctive shape characterized by its symmetry and bell-like appearance. 
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img2'>
</td></tr></table>
<br clear='left'><br/>
<br/>
@blue
Characteristics of<br/>the Normal Curve
@nblue
<br/><br/>
Below are the key characteristics of the normal curve.
<br/><br/>$vio<u> 
1. Symmetry
</u>$black<br/><br/>
The normal curve is perfectly symmetric. This means that if you were to fold it in half along its center, the left and right sides would match exactly. This symmetry is a fundamental property of the normal distribution and indicates 
that the probabilities of events occurring to the left and right of the mean are equal.
<br/><br/>$vio<u> 
2. Bell-shaped
</u>$black<br/><br/>
The curve takes on the shape of a bell, with a single peak at the center. The highest point of the curve corresponds to the mean (average) of the data. As you move away from the mean in either direction, the curve gradually descends, 
indicating a decreasing probability of observing values at greater distances from the mean.
<br/><br/>$vio<u> 
3. Mean and median
</u>$black<br/><br/>
The mean and median of the distribution are located at the center of the curve, precisely at the peak. This means that for a normal distribution, the mean and median are the same, and they represent the central tendency of the data.
<br/><br/>$vio<u> 
4. Standard deviation
</u>$black<br/><br/>
The spread or dispersion of the data is determined by the standard deviation (&#963;). A smaller standard deviation results in a narrower and taller curve, while a larger standard deviation produces a wider and shorter curve. 
The standard deviation governs the shape of the curve and controls how data points are distributed around the mean.
<br/><br/>$vio<u> 
5. 68-95-99.7 Rule
</u>$black<br/><br/>
The normal curve follows a well-known empirical rule, often referred to as the 68-95-99.7 rule or the empirical rule. 
<br/><br/>
According to this rule: 
<br/><br/>
5.1. Approximately 68% of the data falls within one standard deviation of the mean (between &#956; - &#963; and &#956; + &#963;).
<br/><br/>
5.2. About 95% falls within two standard deviations (between &#956; - 2&#963; and &#956; + 2&#963;).
<br/><br/>
5.3. Nearly 99.7% falls within three standard deviations (between &#956; - 3&#963; and &#956; + 3&#963;).
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img3'>
</td></tr></table>
<br clear='left'><br/>
$vio<u> 
6. Probability Density Function (PDF)
</u>$black<br/><br/>
The normal curve is defined by a mathematical formula known as the probability density function (PDF). The PDF describes how the probability of observing a specific value changes across the range of possible values. 
The formula for the normal curve's PDF is given by:
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>
<br clear='left'><br/>
where f(x) is the probability density at the value x, &#956; is the mean, &#963; is the standard deviation,
&#960; is the mathematical constant pi (approximately 3.14159), and e is the mathematical constant Euler's number (approximately 2.71828).

"
?>
