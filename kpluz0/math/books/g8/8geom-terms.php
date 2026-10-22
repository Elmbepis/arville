<?php
$grd=$grd;
$title="Geometry Terms,<br/>Postulates, and Theorems";

$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$img1="images/geom-intro2.jpg";
$img2="images/geom-intro3.jpg";
$img3="images/geom-intro7.jpg";
$img4="images/geom-intro4.jpg";
$img5="images/geom-intro5.jpg";
$img6="images/geom-intro6.jpg";
$img7="images/angles1.jpg";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#BB0000'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#800080'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#BB0000'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#800080'>"; 
	}

$article="

Before learning the basic concepts of geometry, one must first become familiar with the basic terms used in the subject.
<br/><br/>
Terms are not difficult to learn if they come with standard definitions.
In geometry, however, there are three so-called undefined terms that every student must learn and understand the concept of: 'point', 'line', and 'plane.'
<br/><br/><br/>
@blue
The Three Undefined<br/>Terms of Geometry
@nblue
<br/><br/>
Although no formal definition was set for each of these terms, we can still describe them in certain ways.
In fact, you may already have encountered during your earlier years the following definitions or descriptions of these three terms.
<br/><br/>
$vio<u>Point</u>$black
<br/><br/>
In geometry, a point is an exact position or location on a plane surface. It is important to understand that a point is not an object, but a place.
<br/><br/>
Since a point only represents a position, it has no size. It does not have a width, length, nor height. 
A point is often shown or illustrated as a dot, and is typically named using a capital letter.
<br/><br/>
Below is an illustration that shows the points A, P, and X in space.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
$vio<u>Line</u>$black
<br/><br/>
In geometry, a line is a set of points that exhibits a straight form and extends infinitely in both directions.
Since it is one-dimensional, it has infinite length but no width nor height. 
<br/><br/>
Only one line will contain any two points A and B, and it is denoted by <img src='images/line-ab.jpg'>.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
$vio<u>Plane</u>$black
<br/><br/>
In geometry, a plane is a flat surface that extends infinitely in two dimensions. 
It has infinite length and infinite width, but it has no height. 
<br/><br/>
Every plane contains at least three non-collinear points.
A plane is commonly named using a single capital letter, but this must be preceded by the term 'plane' to distinguish it from a point with the same name.
Points that lie on the same plane are said to be coplanar.
<br/><br/>
In illustrations, a plane is usually represented by a four-sided figure, as shown below. 
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
@blue
Defined Terms<br/>in Geometry
@nblue
<br/><br/>
Terms in geometry that have a standard and formal definition are called defined terms.
Below are examples of defined terms in geometry along with their definition.
<br/><br/>
$vio<u>Line Segment</u>$black
<br/><br/>
The segment <img src='images/segment-ab.jpg'> of the line <img src='images/line-ab.jpg'> is the set of all points that includes points A and B, as well as all points between point A and point B. 
Here, points A and B are called end points of <img src='images/segment-ab.jpg'>.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img4'>
</td></tr></table>
<br/><br/>
The number AB is called the length of the segment <img src='images/segment-ab.jpg'>.  It is a measure of the distance between the endpoints A and B of the segment <img src='images/segment-ab.jpg'>.
<br/><br/>
$vio<u>Ray</u>$black
<br/><br/>
A ray is a geometric figure that contains one end point, from which continues a straight line.  Ray <img src='images/ray-ab.jpg'> therefore starts at endpoint A, and extends without limit in a straight line that passes through point B.   
It looks like this: 
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img5'>
</td></tr></table>
<br/><br/>
If point Y is between point X and point Z on a certain line, then rays <img src='images/ray-yx.jpg'> and <img src='images/ray-yz.jpg'> are opposite rays, i.e., 
they are rays that have a common endpoint (point Y in this case) but go in opposite directions, and therefore form a straight line together.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img6'>
</td></tr></table>
<br/><br/>
$vio<u>Angle</u>$black
<br/><br/>
An angle is the amount of turn between two rays with a common endpoint.
The rays are the sides of the angle and the common endpoint is the vertex of the angle.
<br/><br/>
Angles may be formed by intersecting lines or line segments. For example, the angles formed by adjacent sides of a square or rectangle are right angles. 
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img7'>
</td></tr></table>
<br/><br/>
@blue
Postulates
@nblue
<br/><br/>
A postulate is a statement that is assumed to be true without proof. Thus, postulates in geometry do not need to be proven. Listed below are some examples of postulates in geometry.
<br/><br/>
1. A line contains at least two points.
<br/><br/>
2. There is a corresponding unique positive number for every pair of different points.
<br/><br/>
3. Through any two points, there is exactly one line.
<br/><br/>
4. Any three points lie in at least one plane.
<br/><br/>
5. Through any three noncollinear points, there is exactly one plane.
<br/><br/>
6. If two points lie in a plane, then the line joining them lies in that plane.
<br/><br/>
7. If two planes intersect, then their intersection is a line.
<br/><br/>
8. To every angle, there corresponds a real number between 0 and 180.
<br/><br/><br/>
@blue
Theorems
@nblue
<br/><br/>
A theorem is a statement that must be proven to be true, but can be proven to be true. 
It is therefore also a statement of truth.
Theorems are proven with postulates and other theorems.
<br/><br/>
Listed below are some examples of theorems in geometry.
<br/><br/>
1. If two lines intersect, then they intersect in exactly one point.
<br/><br/>
2. If a point lies outside a line, then exactly one plane contains both the line and the point.
<br/><br/>
3. If two lines intersect, then exactly one plane contains both lines.
<br/><br/>
4. The complements of congruent angles are congruent.
<br/><br/>
5. The supplements of congruent angles are congruent.
<br/><br/>
6. Vertical angles are congruent.
<br/><br/>
7. Every angle has one and only one bisector.
<br/><br/>
8. If two sides of a triangle are congruent, then the angles opposite these sides are congruent.
<br/><br/>
It is beyond the scope of this lesson to list every existing postulate and theorem in geometry.
Anyway, you'll encounter the important ones as you learn the basic concepts of geometry.
"
?>
