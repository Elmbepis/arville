<?php

$grd=$grd;
$title="Central Tendency<br/>of Grouped Data";
$img1="images/variability11.jpg";
$img2="images/variability12.jpg";
$img3="images/variability13.jpg";
$img4="images/variability14.jpg";
$img5="images/variability15.jpg";
$red=$font."<font color='#bb0000'>";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$black=$font."<font color='#000000'>";

$article="
In the previous lessons, we learned how to calculate the measures of central tendency and variability of grouped and ungrouped data.
<br/><br/>
In this lesson, we will learn how to graph these data and relate the measures of central tendency and variability to the locations and shapes of their corresponding graphs.
<br/><br/>
Consider the following ungrouped data:
4.1, 5.6, 6.3, 7.1, 7.9, 8.2, 8.7, 9.4, 9.8, 10.4, 11.2, 12.6
<br/><br/>
We can group these data into class intervals and tabulate the frequencies of the intervals as follows:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
We can graph this set of grouped data by using a bar graph whose x-axis corresponds to the class intervals and whose y-axis corresponds to the frequencies of these class intervals. 
The bar graph, which shows the frequency for each class interval, would look like this:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
The bar graph above, which shows the distribution of frequencies for a given set of grouped data, is called a histogram.
<br/><br/>
Let us now try to see how the measures of central tendency and variability affect the shape of a histogram.
<br/><br/>
First, let's estimate the mean of these grouped data using the method we've learned before:
<br/><br/>
1. Multiply each midpoint by the frequency of its corresponding class interval.
<br/><br/>
5 x 2 = 10
<br/>
7 x 3 = 21
<br/>
9 x 4 = 36
<br/>
11 x 2 = 22
<br/>
13 x 1 = 13
<br/><br/>
2. Find the sum S of these products of midpoints and class interval frequencies.  
<br/><br/>
S = 10 + 21 + 36 + 22 + 13 = 102
<br/><br/>
3. Divide S by the sum of the class interval frequencies.
<br/><br/>
Estimated Mean = 102 / 12 = 8.5
<br/><br/>
The estimated mean of the grouped data is therefore $vio 8.5$black. 
<br/><br/>
Now, let us calculate the standard deviation of these grouped data using the method we've learned before:
<br/><br/>
1.$black Get the square of the difference between class midpoint and the sample mean for each class interval.
<br/><br/>
(5-8.5)<sup>2</sup> = -3.5<sup>2</sup> = 12.25<br/>
(7-8.5)<sup>2</sup> = -1.5<sup>2</sup> = 2.25<br/>
(9-8.5)<sup>2</sup> = 0.5<sup>2</sup> = 0.25<br/>
(11-8.5)<sup>2</sup> = 2.5<sup>2</sup> = 6.25<br/>
(13-8.5)<sup>2</sup> = 4.5<sup>2</sup> = 20.25
<br/><br/>
3.$black For each class interval, multiply the results in Step 3 by f and get the sum of the products. 
<br/><br/>
2 x 12.25 = 24.5<br/>
3 x 2.25 = 6.75<br/>
4 x 0.25 = 1<br/>
2 x 6.25 = 12.5<br/>
1 x 20.25 = 20.25
<br/><br/>
24.5 + 6.75 + 1 + 12.5 + 20.25 = 65
<br/><br/>
4.$black Apply the formula for sample variance.
<br/><br/>
s<sup>2</sup> = 65 / (12-1) = 65/11 = 5.9091
<br/><br/>
The sample variance of the data is therefore $vio 5.91$black.
<br/><br/>
5.$black Apply the formula for sample standard deviation.
<br/><br/>
s = square root of 5.91 = 2.43
<br/><br/>
The sample standard deviation of the data is therefore $vio 2.43$black.
<br/><br/>
Consider the following ungrouped data:
0.7, 1.2, 1.7, 2.1, 2.3, 2.8, 3.4, 3.6, 3.8, 4.2, 4.8, 5.3
<br/><br/>
We can group these data into class intervals and tabulate the frequencies of the intervals as follows:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
We can graph this set of grouped data by using a bar graph whose x-axis corresponds to the class intervals and whose y-axis corresponds to the frequencies of these class intervals. 
The bar graph, which shows the frequency for each class interval, would look like this:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/><br/>
As we've done earlier, let's estimate the mean of these grouped data.
<br/><br/>
1. Multiply each midpoint by the frequency of its corresponding class interval.
<br/><br/>
1 x 3 = 3
<br/>
3 x 6 = 18
<br/>
5 x 3 = 15
<br/><br/>
2. Find the sum S of these products of midpoints and class interval frequencies.  
<br/><br/>
S = 3 + 18 + 15 = 36
<br/><br/>
3. Divide S by the sum of the class interval frequencies.
<br/><br/>
Estimated Mean = 36 / 12 = 3
<br/><br/>
The estimated mean of the data is therefore $vio 3$black. 
<br/><br/>
Now, let us calculate the standard deviation of these grouped data.
<br/><br/>
1.$black Get the square of the difference between class midpoint and the sample mean for each class interval.
<br/><br/>
(1-3)<sup>2</sup> = 2<sup>2</sup> = 4<br/>
(3-3)<sup>2</sup> = 0<sup>2</sup> = 0<br/>
(5-3)<sup>2</sup> = 2<sup>2</sup> = 4<br/>
<br/><br/>
3.$black For each class interval, multiply the results in Step 3 by f and get the sum of the products. 
<br/><br/>
3 x 4 = 12<br/>
6 x 0 = 0<br/>
3 x 4 = 12<br/>
<br/><br/>
12 + 0 + 12 = 24
<br/><br/>
4.$black Apply the formula for sample variance.
<br/><br/>
s<sup>2</sup> = 24 / (12-1) = 24/11 = 2.182
<br/><br/>
The sample variance of the data is therefore $vio 2.182$black.
<br/><br/>
5.$black Apply the formula for sample standard deviation.
<br/><br/>
s = square root of 2.182 = 1.476
<br/><br/>
The sample standard deviation of the data is therefore $vio 1.476$black.
<br/><br/>
Compare the locations and shapes of the two histograms above in relation to their estimated sample means and standard deviations.
<br/><br/>
Here are the conclusions that you should draw:
<br/><br/>
1. The higher the mean of a set of data, the farther to the right the center of its histogram will be.
<br/><br/>
2. The higher the standard deviation of a set of data, the wider or more spread out its histogram will be.
<br/><br/>
$red<u>Example Exercise</u>$black
<br/><br/>
Consider the three data distributions below:
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img5'>
</td></tr></table>
<br/>
1. Based on the their locations, arrange their means from lowest to highest.
<br/><br/>
2. Based on the their widths, arrange their standard deviations from lowest to highest.
<br/><br/>
$blue Solution:$black
<br/><br/>
1. Since histogram C has the rightmost center, then it has the highest mean. 
This is the order of the histograms' means if arranged from lowest to highest: A, B, C.
<br/><br/>
2. Since histogram B is widest or most spread out in shape, then it has the highest standard deviation. 
This is the order of the histograms' standard deviations if arranged from lowest to highest: C, A, B.
"
?>




















