<?php
$grd=$grd;
$title="Understanding the<br/>Distance Formula";
$img1="images/pythagorean1.jpg";
$img2="images/dist-formula1.jpg";
$img3="images/dist-formula2.jpg";
$img4="images/dist-formula3.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

The distance between two points on the x-axis is the difference between their x-coordinates while the distance between two points on the y-axis is the difference between their y-coordinates.
But how do we compute the distance between two points that are not on a single axis?
In this lesson, we will learn to do this using the distance formula.
<br/><br/><br/>
@blue
The Pythagorean Theorem
@nblue
<br/><br/>
The basis of the distance formula is the Pythagorean Theorem so we need to understand this theorem first before discussing the distance formula.
<br/><br/>
The Pythagorean Theorem states that if $vio a$black and $vio b$black are the lengths of the legs of a right triangle, and $vio c$black is the length of its hypotenuse, then:
<br/><br/>
$vio<b>a<sup>2</sup> + b<sup>2</sup> = c<sup>2</sup></b>$black
<br/><br/>
To illustrate this, consider the two triangles below.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
The legs of the pink triangle are 3 and 4 units long.
The length of its hypotenus is therefore:
<br/><br/>
h<sub>pink</sub> = &#8730;(a<sup>2</sup> + b<sup>2</sup>) = &#8730;(9 + 16) = &#8730;25 =$vio 5$black
<br/><br/>
The legs of the blue triangle are 5 and 12 units long.
The length of its hypotenus is therefore:
<br/><br/>
h<sub>blue</sub> = &#8730;(25 + 144) = &#8730;169 =$vio 13$black
<br/><br/>
$red<u> Example # 1</u>$black
<br/><br/>
Using the Pythagorean Theorem, find the length of the hypotenuse of a right triangle whose legs are 5 and 8 feet long.
<br/><br/>
$blue Solution:$black
<br/><br/>
a<sup>2</sup> + b<sup>2</sup> = c<sup>2</sup>
<br/><br/>
5<sup>2</sup> + 8<sup>2</sup> = c<sup>2</sup>
<br/><br/>
25 + 64 = 89 =  c<sup>2</sup>
<br/><br/>
c = &#8730;89 = $vio 9.434$black
<br/><br/><br/>
@blue
The Distance Formula
@nblue
<br/><br/>
We can use the Pythagorean Theorem to derive the distance formula.
Consider the two points A(-4,-2) and B(3,5) in the coordinate plane below.
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
Notice how these two points may form a right triangle whose legs are shown as green and purple line segments in the diagram.
The hypotenuse, on the other hand, is the distance between the two points.
<br/><br/>
We can therefore find the distance between the two points by determining the lengths of the legs of the triangle and applying the Pythagorean Theorem.
<br/><br/>
The length of the green and purple legs are just the difference between the x-coordinates and the difference between the y-coordinates of the two points, respectively:
<br/><br/>
length of green leg =  3 - (-4) = 7
<br/><br/>
length of purple leg =  5 - (-2) = 7
<br/><br/>
Applying, the Pythagorean theorem, the distance d between the two points is therefore:
<br/><br/>
d =&#8730;[7<sup>2</sup>) + 7<sup>2</sup>)] = &#8730;98 = $vio 9.8995 $black 
<br/><br/>
$vio<u>The Distance Formula</u>$black
<br/><br/>
Based on the discussion above, the general form of the distance formula may be written as follows:
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
where d is the distance between the two points A (x<sub>1</sub>,y<sub>1</sub>) and B (x<sub>2</sub>,y<sub>2</sub>). 
<br/><br/>
$red<u> Example # 2</u>$black
<br/><br/>
Find the distance between the points P(-3,2) and Q(4,6).
<br/><br/>
$blue Solution:$black
<br/><br/>
d=&#8730;[(x<sub>2</sub>-x<sub>1</sub>)<sup>2</sup> + (y<sub>2</sub>-y<sub>1</sub>)<sup>2</sup>]
<br/><br/>
=&#8730;[(4-(-3))<sup>2</sup> + (6-2)<sup>2</sup>] 
<br/><br/>
= &#8730;[7<sup>2</sup> + 4<sup>2</sup>] = &#8730;[49 + 16] 
<br/><br/>
= &#8730;65 = $vio 8.062$black
<br/><br/>
$red<u> Example # 3</u>$black
<br/><br/>
Find the distance between the points A(7,-3) and B(15,12).
<br/><br/>
$blue Solution:$black
<br/><br/>
d=&#8730;[(x<sub>2</sub>-x<sub>1</sub>)<sup>2</sup> + (y<sub>2</sub>-y<sub>1</sub>)<sup>2</sup>]
<br/><br/>
=&#8730;[(15-7)<sup>2</sup> + (12-(-3))<sup>2</sup>] 
<br/><br/>
= &#8730;[8<sup>2</sup> + 15<sup>2</sup>] = &#8730;[64 + 225] 
<br/><br/>
= &#8730;289 = $vio 17$black
<br/><br/>
$vio<u>The Midpoint Formula</u>$black
<br/><br/>
A midpoint is a point located in the middle of a line segment.
It therefore divides a line segment into two segments of equal length.
<br/><br/>
The coordinates of the midpoint of a line segment whose endpoints are given may be determined using the midpoint formula, which is as follows: 
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/><br/>
where Mx and My are the coordinates of the midpoint M of the line segment whose endpoints are A (x<sub>1</sub>,y<sub>1</sub>) and B (x<sub>2</sub>,y<sub>2</sub>). 
<br/><br/>
$red<u> Example # 4</u>$black
<br/><br/>
Find the coordinates of the midpoint of a line segment whose endpoints are A(5,-3) and B(-2,-7).
<br/><br/>
$blue Solution:$black
<br/><br/>
Mx = (x<sub>1</sub>+x<sub>2</sub>)/2 = (5 + (-2))/2 = 3/2
<br/><br/>
My = (y<sub>1</sub>+y<sub>2</sub>)/2 = (-3 + (-7))/2 = -10/2 = -5
<br/><br/>
The midpoint is therefore at $vio (3/2, -5)$black.
"
?>
