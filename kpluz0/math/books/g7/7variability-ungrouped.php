<?php

$grd=$grd;
$title="Variability of<br/>Ungrouped Data";
$img1="images/variability1.jpg";
$img2="images/variability2.jpg";
$img3="images/variability3.jpg";
$img4="images/variability4.jpg";
$red=$font."<font color='#bb0000'>";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$black=$font."<font color='#000000'>";

$article="

In statistics, the term 'variability' refers to the extent to which the values in a data set diverge from their mean.
It is therefore a measure of how spread out a set of data is from their average.
<br/><br/>
In manufacturing processes, it is important to maintain the consistency of the characteristics of a product.
Being able to measure the variability of each of these characteristics is essential to achieve this consistency.
<br/><br/>
There are two common ways by which the variability of a data set is measured: variance and standard deviation, which are both related to each other.  
<br/><br/>
In this lesson, we will learn how to calculate these measures of variability for any given set of ungrouped data.
<br/><br/><br/>
@blue
Variance of<br/>Ungrouped Data
@nblue
<br/><br/>
The variance of a set of values is defined as the average of the squares of the differences between the values of the data set and the mean.
<br/><br/>
If the variance is computed for the entire set of values for a given population, then it is called the population variance.
<br/><br/>
The population variance is denoted by &#963;<sup>2</sup> and is given by the following formula:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
The summation symbol above, &Sigma;, simply means getting the sum of the expression next to it, (x-&#956;)<sup>2</sup>, for all values of x. 
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
$red<u>Example Exercise # 1</u>$black
<br/><br/>
Find the sample variance of the following values:
<br/><br/>
3 5 6 8 9
<br/><br/>
$blue Solution:$black
<br/><br/>
Step 1. Get the sample mean of the data.
<br/><br/>
x&#772; = (3+5+6+8+9)/5 = 31/5 = 6.2 
<br/><br/>
Step 2. Get the square of the difference between each data value and the sample mean.
<br/><br/>
(3-6.2)<sup>2</sup> = -3.2<sup>2</sup> = 10.24<br/>
(5-6.2)<sup>2</sup> = -1.2<sup>2</sup> = 1.44<br/>
(6-6.2)<sup>2</sup> = -0.2<sup>2</sup> = 0.04<br/>
(8-6.2)<sup>2</sup> = 1.8<sup>2</sup> = 3.24<br/>
(9-6.2)<sup>2</sup> = 2.8<sup>2</sup> = 7.84
<br/><br/>
Step 3. Apply the formula using the squares of the differences above.
<br/><br/>
s<sup>2</sup> = (10.24+1.44+0.04+3.24+7.84)/(5-1) = 22.8/4 = 5.7
<br/><br/>
The sample variance of the data is therefore $vio 5.7$black.
<br/><br/><br/>
@blue
Standard Deviation of<br/>Ungrouped Data
@nblue
<br/><br/>
One disadvantage of using variance to indicate the variability of the data set is that its unit of measurement is different from that of the data values, since it involves squaring the numbers.
<br/><br/>
To address this issue, one can instead use the standard deviation to indicate the variability of the data set.
The standard deviation of a data set is simply the square root of the latter's variance.
<br/><br/>
Thus, the population standard deviation is just the square root of the population variance.
It is denoted by &#963; and is given by the formula below:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
Also, the sample standard deviation is simply the square root of the sample variance.
It is denoted by <i>s</i> and is given by the formula below:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/><br/>
$red<u>Example Exercise # 2</u>$black
<br/><br/>
Find the sample standard deviation of the following values:
<br/><br/>
31 35 37 38 41
<br/><br/>
$blue Solution:$black
<br/><br/>
Step 1. Get the sample mean of the data.
<br/><br/>
x&#772; = (31+35+37+38+41)/5 = 182/5 = 36.4 
<br/><br/>
Step 2. Get the square of the difference between each data value and the sample mean.
<br/><br/>
(31-36.4)<sup>2</sup> = -5.4<sup>2</sup> = 29.16<br/>
(35-36.4)<sup>2</sup> = -1.4<sup>2</sup> = 1.96<br/>
(37-36.4)<sup>2</sup> = 0.6<sup>2</sup> = 0.36<br/>
(38-36.4)<sup>2</sup> = 1.6<sup>2</sup> = 2.56<br/>
(41-36.4)<sup>2</sup> = 4.6<sup>2</sup> = 21.16
<br/><br/>
Step 3. Get the sum of the squares of the differences above.
<br/><br/>
ssd = 29.16 + 1.96 + 0.36 + 2.56 + 21.16 = 55.2
<br/><br/>
Step 4. Apply the formula.
<br/><br/>
s = [55.2/(5-1)]<sup>1/2</sup> = (55.2/4)<sup>1/2</sup> = (13.8)<sup>1/2</sup> = 3.715
<br/><br/>
The sample standard deviation of the data is therefore $vio 3.715$black.

"
?>




















