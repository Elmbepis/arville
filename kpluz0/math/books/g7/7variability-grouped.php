<?php

$grd=$grd;
$title="Variability of<br/>Grouped Data";
$img1="images/variability5.jpg";
$img2="images/variability6.jpg";
$img3="images/variability7.jpg";
$img4="images/variability8.jpg";
$img5="images/variability9.jpg";
$img6="images/variability10.jpg";
$red=$font."<font color='#bb0000'>";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$black=$font."<font color='#000000'>";

$article="

In the last lesson, we learned how to calculate the measures of variability of ungrouped data.
In this lesson, we will learn how to calculate the measures of variability of grouped data.
<br/><br/>
Recall that a set of data is said to be grouped if the values are not given or listed individually, but instead aggregated and listed as frequencies of specified ranges of values.
The ranges of values under which the data are grouped are called class intervals.
<br/><br/>
Recall further that there are two common ways by which the variability of a data set is measured: variance and standard deviation, which are both related to each other.  
In this lesson, we will learn how to calculate these measures of variability for any given set of grouped data.
<br/><br/><br/>
@blue
Variance of<br/>Grouped Data
@nblue
<br/><br/>
The population variance for grouped data is denoted by &#963;<sup>2</sup> and is given by the following formula:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
If the variance is computed for just a sample of a given population, then it is called the sample variance.
A sample is simply a subset of values taken from the entire population's data set.
<br/><br/>
Sampling is a practical alternative to analyzing all the data if the population size is very large.
Since sampling does not consider all the data values in the entire population, it is less exact.
Nonetheless, it is sufficiently accurate and useful in many cases.
<br/><br/>
The sample variance is denoted by s<sup>2</sup> and is given by the following formula:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
Note that 1 is being subtracted from the sample size in the denominator of the sample variance's formula.
This makes the computed variance larger, so it is basically a 'penalty' that corrects any bias that is introduced by 'just sampling' instead of analyzing the population's entire data set. 
<br/><br/><br/>
@blue
Standard Deviation of<br/>Ungrouped Data
@nblue
<br/><br/>
Recall that one disadvantage of using variance to indicate the variability of the data set is that its unit of measurement is different from that of the data values, since it involves squaring the numbers.
<br/><br/>
To address this issue, one can instead use the standard deviation to indicate the variability of the data set.
The standard deviation of a data set is simply the square root of the latter's variance.
<br/><br/>
Thus, the population standard deviation is just the square root of the population variance.
It is denoted by &#963; and is given by the formula below:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img5'>
</td></tr></table>
<br/><br/>
Also, the sample standard deviation is simply the square root of the sample variance.
It is denoted by <i>s</i> and is given by the formula below:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img6'>
</td></tr></table>
<br/><br/>
$red<u>Example Exercise # 1</u>$black
<br/><br/>
Find the sample variance and sample standard deviation of the following set of grouped data:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/><br/>
$blue Solution:$black
<br/><br/>
$blue Step1.$black Replace each class interval in the table of the grouped data with the midpoint of the class interval.  
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/>
$blue Step2.$black Get the sample mean of the data.
<br/><br/>
x&#772; = (3x3 +  5x4 + 7x2 + 9x1)/10 = 52/10 = 5.2 
<br/><br/>
$blue Step3.$black Get the square of the difference between class midpoint and the sample mean for each class interval.
<br/><br/>
(3-5.2)<sup>2</sup> = -2.2<sup>2</sup> = 4.84<br/>
(5-5.2)<sup>2</sup> = -0.2<sup>2</sup> = 0.04<br/>
(7-5.2)<sup>2</sup> = 1.8<sup>2</sup> = 3.24<br/>
(9-5.2)<sup>2</sup> = 3.8<sup>2</sup> = 14.44
<br/><br/>
$blue Step4.$black For each class interval, multiply the results in Step 3 by f and get the sum of the products. 
<br/><br/>
3 x 4.84 = 14.52<br/>
4 x 0.04 = 0.16<br/>
2 x 3.24 = 6.48<br/>
1 x 14.44 = 14.44
<br/><br/>
14.52 + 0.16 + 6.48 + 14.44 = 35.6
<br/><br/>
$blue Step5.$black Apply the formula for sample variance above.
<br/><br/>
s<sup>2</sup> = 35.6 / (10-1) = 35.6/9 = 3.956
<br/><br/>
The sample variance of the data is therefore $vio 3.956$black.
<br/><br/>
$blue Step6.$black Apply the formula for sample standard deviation above.
<br/><br/>
s = square root of 3.956 = 1.989
<br/><br/>
The sample standard deviation of the data is therefore $vio 1.989$black.

"
?>




















