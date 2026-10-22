<?php
$grd=$grd;
$title="The Law of Sines";
$img1="images/sine-law1.jpg";
$img2="images/sine-law2.jpg";
$img3="images/sine-law3.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="
The Law of Sines states that in any triangle, the ratio of the length of a side to the sine of its opposite angle is equal for all sides and their corresponding opposite angles.  
<br/><br/>
Given a triangle whose interior angles are &angle;A, &angle;B, and &angle;C and whose corresponding opposite sides are a, b, and c, respectively, the Law of Sines may be mathematically expressed as follows:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
You can use the Law of Sines to solve any oblique triangle as long as you know the length of a side and the measure of its opposite angle, and either the length of another side or the measure of another angle (SSA or SAA).
<br/><br/>
Consider the triangle below.
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
Let's say that its sides and angles have the following measurements:
<br/><br/>
&angle;A =  43 degrees;  a = 64
<br/><br/>
&angle;B =  85 degrees;  b = 93.5
<br/><br/>
&angle;C =  52 degrees;  c = 73.9
<br/><br/>
Below are examples of how to solve this oblique triangle if you don't know all of these values.
<br/><br/>
$blue<b>Case 1:</b>
<br/>
$black  You only know the measures of A, a, b.
<br/><br/>
a/sin(A) =  b/sin(B) 
<br/><br/>
Thus:
<br/><br/>
64/sin(43) = 93.5/sin B
<br/><br/>
sin B = (93.5/64) x sin(43) = 1.46 x 0.682 = 0.99572
<br/><br/>
&angle;B = sin-1 (0.99572) = 85 degrees
<br/><br/>
&angle;C = 180 - 43 - 85 = 52 degrees
<br/><br/>
c = 64/sin(43) x sin(52) =  64/0.682 x 0.788 = 73.9
<br/><br/>
$blue<b>Case 2:
<br/>
</b>$black  You only know the measures of c, A, and B.
<br/><br/>
&angle;C = 180 - 43 - 85 = 52 degrees
<br/><br/>
c/sin(C) = a/sin(A)
<br/><br/>
Thus:
<br/><br/>
c = 64/sin(43) x sin(52) = 64/0.682 x 0.788 = 73.9
<br/><br/>
b = 64/sin(43) x sin(85) = 64/0.682 x 0.9962 = 93.5
<br/><br/><br/>
$red<u>Example Exercise</u>$black
<br/><br/>
Consider the triangle below.
If c = 87.1 units, &angle;C = 43&deg;, and &angle;A = 69&deg;, what are the lengths of the other two sides? 
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
$blue Solution:$black
<br/><br/>
c/sin(C) = a/sin(A)
<br/><br/>
a = c/sin(C) x sin(A)
<br/>
= 87.1/sin(43&deg;) x sin (69&deg;)
<br/>
= [87.1/0.681998][0.93358] 
<br/>
= $vio 119.23$black units.
<br/><br/>
&angle;B = 180&deg; - 43&deg; - 69&deg; = 68&deg;
<br/><br/>
b = c/sin(C) x sin(B)
<br/>
= 87.1/sin(43&deg;) x sin (68&deg;)
<br/>
= [87.1/0.681998][0.9272] 
<br/>
= $vio 118.41$black units.


"
?>
