<?php

$grd=$grd;
$title="Central Tendency<br/>of Grouped Data";
$img1="images/centendg1.jpg";
$img2="images/centendg2.jpg";
$img3="images/centendg3.jpg";
$img4="images/centendg4.jpg";
$red=$font."<font color='#bb0000'>";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$black=$font."<font color='#000000'>";

$article="

In the last lesson, we learned how to calculate the mean, mode, and median of ungrouped sets of data, or data that are listed individually.
<br/><br/>
In this lesson, we will learn how to calculate these measures of central tendency for grouped sets of data.
<br/><br/>
A set of data is said to be grouped if the values are not given or listed individually, but instead aggregated and listed as frequencies of specified ranges of values.
The ranges of values under which the data are grouped are called class intervals.
<br/><br/>
The table below shows an example of grouped data, wherein the ages of 577 people living in a certain community are presented in age groups.
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
@blue
Mean of<br/>Grouped Data
@nblue
<br/><br/>
The exact mean of a set of grouped data can not be determined since the values of the data are not listed individually.
However, it may be estimated using the following steps:
<br/><br/>
1. Replace each class interval in the table of the grouped data with the midpoint of the class interval.  
To get the midpoint, add the lower limit and the upper limit of the class interval and divide their sum by 2.
<br/><br/>
2. Multiply each midpoint by the frequency of its corresponding class interval.
<br/><br/>
3. Find the sum S of these products of midpoints and class interval frequencies.  
<br/><br/>
4. Finally, to estimate the mean of the grouped data, divide S by the sum of the class interval frequencies.
<br/><br/><br/>
$red<u>Example Exercise # 1</u>$black
<br/><br/>
Estimate the mean of the grouped age data shown in the table above:
<br/><br/>
$blue Solution:$black
<br/><br/>
1. Replace each class interval in the table of the grouped data with the midpoint of the class interval.  
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/><br/>
2. Multiply each midpoint by the frequency of its corresponding class interval.
<br/><br/>
5 x 8 = 40
<br/>
15.5 x 44 = 682
<br/>
25.5 x 181 = 4615.5
<br/>
35.5 x 174 = 6177
<br/>
45.5 x 94 = 4277
<br/>
55.5 x 62 = 3441
<br/>
65.5 x 9 = 589.5
<br/>
75.5 x 5 = 377.5
<br/><br/>
3. Find the sum S of these products of midpoints and class interval frequencies.  
<br/><br/>
S = 40 + 682 + 4615.5 + 6177 + 4277 + 3441 + 589.5 + 377.5 = 20199.5
<br/><br/>
4. Divide S by the sum of the class interval frequencies.
<br/><br/>
Estimated Mean = 19915 / 577 = 35
<br/><br/>
The estimated mean of the grouped age data is therefore $vio 35$black years. 
<br/><br/><br/>
@blue
Median of<br/>Grouped Data
@nblue
<br/><br/>
The median of a set of grouped data may be estimated using the following formula. 
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
$red<u>Example Exercise # 2</u>$black
<br/><br/>
Estimate the median of the grouped age data shown in Exercise # 1 above:
<br/><br/>
$blue Solution:$black
<br/><br/>
Since there 577 values of age, the median is the age value in the 289th position, the middlemost position.
The median is therefore in the fourth class interval, 31-40.
Thus, L = 30.5
<br/><br/>
Since there are 577 values of age, n = 577.
<br/><br/>
B is the cumulative frequency of the first three class intervals.
Thus, B = 8 + 44 +181 = 233
<br/><br/>
G is the frequency of the median group, so G = 174.
<br/><br/>
Lastly, w is the group width, so w = 10.
<br/><br/>
We may now apply the formula for the estimated median as follows:
<br/><br/>
Estimated Median = 30.5 + (577/2 - 233)/174 x 10
<br/><br/>
= 30.5 + 3.19 = 33.69
<br/><br/>
Thus, the estimated median of the grouped data is $vio 33.69 $black years.
<br/><br/><br/>
@blue
Mode of<br/>Grouped Data
@nblue
<br/><br/>
The mode of a set of grouped data may be estimated using the following formula. 
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/><br/>
$red<u>Example Exercise # 3</u>$black
<br/><br/>
Estimate the mode of the grouped age data shown in Exercise # 2 above:
<br/><br/>
$blue Solution:$black
<br/><br/>
The modal group is the group with the highest frequency.
This is the third class interval, 21-30, which has a frequency of 181.
Thus, f<sub>m</sub> = 181.
<br/><br/>
Furthermore, f<sub>m-1</sub> = 44 and f<sub>m+1</sub> = 174.
We may now apply the formula for the estimated mode as follows:
<br/><br/>
Estimated Mode = 30.5 + (181 - 44)/[(181-44)+(181-174)] x 10
<br/><br/>
= 30.5 + 137/281 x 10 = 30.5 + 4.9 = 35.4
<br/><br/>
Thus, the estimated mode of the grouped data is $vio 35.4 $black years.
"
?>




















