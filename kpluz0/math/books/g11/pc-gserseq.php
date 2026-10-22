<?php
$grd=$grd;
$title="Geometric Sequences<br/>and Series";
$img1="images/gseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="
In this lesson, we will learn what geometric sequences and geometric series are.
<br/><br/><br/>
@blue
Geometric Sequences
@nblue
<br/>
A geometric sequence or geometric progression is a sequence of numbers wherein the ratio of any two consecutive terms is constant.
<br/><br/>
$vio 2, 4, 8, 16, 32, 64, ...$black
<br/><br/>
The list of numbers or terms above is a geometric sequence because the ratio of any two consecutive terms is always $vio 2$black:
<br/><br/>
4/2 = $vio 2$black,<br/>
8/4 = $vio 2$black,<br/>
16/8 = $vio 2$black,<br/>
and so on.
<br/><br/>
The constant ratio of any two consecutive terms in a geometric sequence is called the $vio<i>common ratio</i>$black, which is often denoted by $vio<i>r</i>$black.
<br/><br/>
In our example above, the common ratio is $vio 2$black, so $vio<i>r</i>$black = $vio 2$black.
Below are other examples of geometric sequences for difference values of common ratio.
<br/><br/>
1.$blue  r = 3$vio<br/>
2, 6, 18, 54, 162, 486, ...$black
<br/><br/>
2.$blue  r = 5$vio<br/>
3, 15, 75, 375, 1875, 9375, ...$black
<br/><br/>
3.$blue  r = 1.2$vio<br/>
1, 1.2, 1.44, 1.728, 2.0736, ...$black
<br/><br/>
Each term in a geometric sequence is often denoted by $vio<i>a</i>$black.
The relative position of a term in a geometric sequence is denoted by the subscript after it.
<br/><br/>
For example, the third term in a geometric sequence is denoted by $vio<i>a<sub>3</sub></i>$black while the seventh one is denoted by $vio<i>a<sub>7</sub></i>$black.
Thus, any nth term in a geometric sequence is denoted by $vio<i>a<sub>n</sub></i>$black.
<br/><br/>
Since the ratio of any two consecutive terms in a geometric sequence is $vio<i>r</i>$black, the formula for $vio<i>r</i>$black may be written as follows:
<br/><br/>
$vio<i>r</i>$black = $vio<i>a<sub>n+1</sub></i>$black / $vio<i>a<sub>n</sub></i>$black
<br/><br/>
The formula for any nth term in a geometric sequence whose first term is $vio<i>a<sub>1</sub></i>$black is:
<br/><br/>
$vio<i>a<sub>n</sub></i>$black = $vio<i>a<sub>1</sub>$black r$vio<sup> (n-1)</sup></i>$black
<br/><br/>
$blue<u>Example # 1</u>$black<br/><br/>
The first term of a geometric sequence is 7 and the common ratio is 2. Find the 6th term.
<br/><br/>
$vio<i>a<sub>n</sub></i>$black = $vio<i>a<sub>1</sub>$black r$vio<sup> (n-1)</sup></i>$black
<br/><br/>
$vio<i>a<sub>6</sub></i>$black = $vio (7)$black(2$vio<sup> (6-1)</sup></i>$black)
<br/><br/>
$vio<i>a<sub>6</sub></i>$black = $vio (7)$black(2$vio<sup> 5</sup></i>$black) = (7)(32) = 224
<br/><br/>
The 6th term of this geometric sequence is therefore$vio 224$black.
<br/><br/>
$red<u>Geometric Means</u>$black
<br/><br/>
All the terms between any two given terms of a geometric sequence are called geometric means.
For example, the terms 8, 32, and 128 are the geometric means between 2 and 512 in this geometric sequence:
<br/><br/>
$vio 2, 8, 32, 128, 512, ...$black
<br/><br/>
$blue<u>Example # 2</u>$black<br/><br/>
Insert the three geometric means between 3 and 768.
<br/><br/>
$vio<i>a<sub>n</sub></i>$black = $vio<i>a<sub>1</sub>$black r$vio<sup> (n-1)</sup></i>$black
<br/><br/>
$vio 768$black = $vio 3$black r$vio<sup> (5-1)</sup></i>$black
<br/><br/>
$vio 768$black = $vio 3$black r$vio<sup> 4</sup></i>$black
<br/><br/>
$vio 256$black = $black r$vio<sup> 4</sup></i>$black, which simplifies to r = $vio +/- 4$black.
<br/><br/>
Thus, for r = +4:<br/>
$vio<i>a<sub>2</sub></i>$black = $vio<i>3</i>$black x $vio 4$black = $vio 12$black<br/>
$vio<i>a<sub>3</sub></i>$black = $vio<i>12</i>$black x $vio 4$black = $vio 48$black<br/>
$vio<i>a<sub>4</sub></i>$black = $vio<i>48</i>$black x $vio 4$black = $vio 192$black
<br/><br/>
and for r = -4:<br/>
$vio<i>a<sub>2</sub></i>$black = $vio<i>3</i>$black x $vio -4$black = $vio -12$black<br/>
$vio<i>a<sub>3</sub></i>$black = $vio<i>-12</i>$black x $vio -4$black = $vio 48$black<br/>
$vio<i>a<sub>4</sub></i>$black = $vio<i>48</i>$black x $vio -4$black = $vio -192$black
<br/><br/>
The three geometric means between 3 and 768 are therefore $vio 12$black, $vio 48$black, and $vio 192$black or $vio -12$black, $vio 48$black, and $vio -192$black.
<br/><br/><br/>
@blue
Geometric Series
@nblue
<br/>
A geometric series is the indicated sum of a geometric sequence.
<br/><br/>
Consider the geometric sequence below:<br/>
$vio 1, 5, 25, 125, 625, ...$black
<br/><br/>
Its corresponding geometric series, which is its indicated sum, is as follows:<br/>
$vio 1 + 5 + 25 + 125 + 625 + ...$black
<br/><br/>
The sum of the first n terms of a geometric series is referred to as the nth partial sum of the series, and is often denoted by $vio<i>S<sub>n</sub></i>$black.
<br/><br/>
You can find $vio<i>S<sub>n</sub></i>$black for any value of n by calculating the common ratio $vio<i>r</i>$black first and then using this to determine all the terms of the series up to the nth term.
Once the terms have been determined, you simply need to get their sum.
<br/><br/>
A useful formula that one can use when the nth term is not given is as follows:
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
$blue<u>Example # 3</u>$black<br/><br/>
Find the sum of the first 6 terms of this geometric series:
$vio 2 + 6 + 18 + 54 + ...$black. 
<br/><br/>
$vio<i>r</i>$black = $vio<i>a<sub>n+1</sub></i>$black / $vio<i>a<sub>n</sub></i>$black = 6/2 =3
<br/><br/>
$vio<i>S<sub>n</sub></i>$black = ($vio<i></i>a<sub>1</sub>$black [$vio<i></i>1$black - $vio<i>r</i> <sup>n</sup>$black]) / (1-r)
<br/><br/>
$vio<i>S<sub>6</sub></i>$black = ($vio<i></i>2$black [$vio<i></i>1$black - $vio<i>3</i><sup>6</sup>$black]) / (1-3)
<br/><br/>
$vio<i>S<sub>6</sub></i>$black = ($vio<i></i>2$black [$vio<i></i>-728$black]) / -2 = $vio 728$black
<br/><br/>
The sum of the first 6 terms of the series is therefore $vio 728$black. 
"
?>
