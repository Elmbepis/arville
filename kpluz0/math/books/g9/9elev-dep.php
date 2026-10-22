<?php
$grd=$grd;
$title="Angles of Elevation<br/>and Depression";
$img1="images/trigfunc2.jpg";
$img2="images/elevdep1.jpg";
$img3="images/elevdep2.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";

$article="
Many real-world problems involving right triangles are presented in terms of either the angle of elevation or the angle of depression. In this lesson, we will learn what these terms mean.
<br/><br/><br/>
@blue
Solving Right Triangles
@nblue
<br/><br/>
Solving a right triangle means being able to calculate the unknown measures of its angles and sides based on the known information about its other angles and sides.   
<br/><br/>
You can always solve a right triangle if you know the length of one side and one these: 
1) the length of another side or 2) the measure of one of its smaller angles. 
<br/><br/>
In short, if you know two measurements about a right triangle, and at least one of them is the length of one side, you will be able to solve for all the other angle and side measurements. 
<br/><br/>
If you are given the lengths of any two sides of a right triangle, you can easily compute for the length of the third side using the Pythagorean Theorem, 
which states that a<sup>2</sup> + b<sup>2</sup> = c<sup>2</sup>, where c is the length of the hypotenuse and a and b are the lengths of the other two sides.
<br/><br/>
But what if all you know is the length of one side and the measure of one angle?  That's when you use trigonometric functions to solve the right triangle.
Consider the right triangle below:
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
Referring to the diagram above and recalling the definitions of sine, cosine, and tangent, we can establish the following:
<br/><br/>
$vio sin A $black = opposite side/hypotenuse = $vio a/c
<br/>
cos A $black = adjacent side/hypotenuse = $vio b/c
<br/>
tan A $black = opposite side/adjacent side = $vio a/b
<br/><br/>
sin B $black = opposite side/hypotenuse = $vio b/c
<br/>
cos B $black = adjacent side/hypotenuse = $vio a/c
<br/>
tan B $black = opposite side/adjacent side = $vio b/a$black
<br/><br/>
Given the measurements of one side and an angle, you can use any of these functions to determine the value of the other side.
<br/><br/>
$red<u>Illustration # 1</u>$black
<br/><br/>
If you know the measure of A and the length of side b (this is the side adjacent to A), then you can apply the formula 
<br/>
cos A = b/c or c = b/(cos A). 
<br/><br/>
You can use a calculator to get the value of cos A to solve for the value of c. You can then easily solve for the other measurements using the other trigonometric functions and/or the Pythagorean Theorem.
<br/><br/>
$red<u>Illustration # 2</u>$black
<br/><br/>
If you know the measure of B and the length of side b (this is the side opposite to B), then you can apply the formula 
<br/>
sin B = b/c or c = b/(sin B). 
<br/><br/>
You can use a calculator to get the value of sin B to solve for the value of c. You can then easily solve for the other measurements using the other trigonometric functions and/or the Pythagorean Theorem.
<br/><br/>
Note that solving oblique triangles (triangles that are not right) is a totally different matter, and will be discussed in a future lesson. 
<br/><br/>
The ability to solve right triangles is a very important skill in solving many real-world problems.  One type of such problems involve what are known as angles of elevation and depression.  
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
A log is leaning against a wall, forming an angle of 64 degrees with the ground. If the upper end of the log is 8.792 feet high from the ground, how long is the log?
<br/><br/>
$blue Solution:$black
<br/><br/>
Let 'y' be the height of the upper end of the log from the ground and 'z' be the length of the log.
<br/><br/>
y = z (sin 64&deg;) 
<br/><br/>
z = y / (sin 64&deg;)<br/>= 8.792 / 0.89879 = $vio 9.782 feet$black
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
A ladder that's 5.743 feet long is leaning against a tree, forming an angle of 74 degrees with the ground. How far is the foot of the ladder from the tree?
<br/><br/>
$blue Solution:$black
<br/><br/>
Let 'x' be the distance of the foot of the ladder from the tree and 'z' be the length of the ladder.
<br/><br/>
x = (z)(cos 74&deg;)<br/>= (5.743)(0.27564) = $vio 1.583 feet$black
<br/><br/><br/>
@blue
Angle of Elevation
@nblue
<br/><br/>
Consider an observer looking upward at an object. The angle of elevation is the angle formed between a horizontal line of sight and the observer's line of sight.  
In this case, the observer's line of sight is above the horizontal line of sight.
<br/><br/>
The figure below illustrates what an angle of elevation is.
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
Hilda is on a ship at sea looking at a chapel on top of a cliff at an angle of 25 degrees. 
How high is the chapel above sea level if Hilda's line of sight is 2727.68 meters long?
<br/><br/>
$blue Solution:$black
<br/><br/>
Let 'y' be the height of the chapel above sea level and 'z' be the length of Hilda's line of sight.
<br/><br/>
y = z (sin 25&deg;)<br/>= (2727.68)(0.42262) = $vio 1152.772 meters$black
<br/><br/><br/>
@blue
Angle of Depression
@nblue
<br/><br/>
The angle of depression is the angle formed between a horizontal line of sight and the observer's line of sight if the latter is below the horizontal line of sight.  This means that the observer is looking downward at the object being observed.
<br/><br/>
The figure below illustrates what an angle of depression is.
<br/><br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
$red<u>Example # 4</u>$black
<br/><br/>
A man standing at the top of a 10-meter tower spots a dog at an angle of depression of 55&deg;.
How far is the dog from the foot of the tower?
<br/><br/>
$blue Solution:$black
<br/><br/>
Let 'x' be the distance of the dog from the foot of the tower.
<br/><br/>
tan 55&deg; = 10/x 
<br/><br/>
x = 10/tan 55&deg; = 10/1.428 = $vio 7.003 meters$black
    
"
?>
