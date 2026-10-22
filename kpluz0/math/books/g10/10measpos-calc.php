<?php
$grd=$grd;
$title="Calculating Measures<br/>of Position";
$img1="images/measpos-calc1.jpg";
$img2="images/measpos-calc2.jpg";
$img3="images/measpos-calc3.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

In the last lesson, we learned the concepts of three common measures of position: percentiles, quartiles, and deciles.
In this lesson, we will learn how to calculate these measures of position.
<br/><br/><br/>
@blue
Percentiles
@nblue
<br/>
Recall that the kth percentile of a set of data is the value at or below which k% of the data values lie.
To find the kth percentile of a data set, the following procedures may be applied:
<br/><br/>
1. Rank the data from lowest to highest.
<br/><br/>
2. Count the number of values, N, in the data set.
<br/><br/>
3. Apply the following formula:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
Find the 53rd percentile of the
following set of values:<br/>
49 33 27 32 28 47 42 29 23 22 22 44 34 49 28 18 41 25
<br/><br/>
$blue Solution:$black
<br/><br/>
Sorted data: 18 22 22 23 25 27 28 28 29 32 33 34 41 42 44 47 49 49
<br/><br/>
Number of data: 18
<br/><br/>
53rd percentile = round((53/100)(18+1))
<br/>
= round((53/100)(19)) = 10
<br/><br/>
The 53rd percentile is therefore the 10th value, which is $vio 32$black.
<br/><br/><br/>
@blue
Quartiles
@nblue
<br/>
Recall that a set of ordered data may be divided into 4 equal groups called quartiles.
The first quartile, Q1, contains the lowest 25% of the values while the fourth quartile, Q4, contains the highest 25% of the values.
<br/><br/>
Since quartiles are just percentiles wherein k = 25, 50, 75, and 100, the percentile formula given above may be rewritten for quartiles as follows:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Find the third quartile of the
following set of values:<br/>
12 12 8 15 6 7 5 8 6 11 4 7 4 11 9
<br/><br/>
$blue Solution:$black
<br/><br/>
Sorted data: 4 4 5 6 6 7 7 8 8 9 11 11 12 12 15
<br/><br/>
Number of data: 15
<br/><br/>
Q3 = (3/4)(N+1)
<br/>
= round((3/4)(15+1))
<br/>
= round((3/4)(16)) = 12
<br/><br/>
The 3rd quartile is therefore the 12th value, which is $vio 11$black.
<br/><br/><br/>
@blue
Deciles
@nblue
<br/>
If a set of ordered data are divided into 10 equal groups, then each of these groups is called a decile.
<br/><br/>
Since deciles are just percentiles wherein k = 10, 20, 30, ..., 90, and 100, the percentile formula given above may be rewritten for deciles as follows:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
Find the 4th decile of the
following set of values:<br/>
8 10 15 12 10 15 6 13 12 3 9 8
<br/><br/>
$blue Solution:$black
<br/><br/>
Sorted data: 3 6 8 8 9 10 10 12 12 13 15 15
<br/><br/>
Number of data: 12
<br/><br/>
D<sub>i</sub> = i x (N+1)/10
<br/><br/>
D<sub>4</sub> = 4th decile position<br/>= round((4/10)(12+1))
<br/>
= round((4/10)(13)) = 5
<br/><br/>
The 4th decile is therefore the 5th value, which is $vio 9$black.



"
?>
