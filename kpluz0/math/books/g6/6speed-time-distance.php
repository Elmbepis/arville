<?php

$grd=$grd;
$title="Calculating Speed,<br/>Time, and Distance";

if(!isset($format)){$format=0;}
if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:16pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:36pt;color:#800080'>"; 
	$tfont5="<span lang='EN-US' style='font-size:36pt;color:#CC0000'>"; 
	echo $tfont1;}
else{
	$tfont1="<span lang='EN-US' style='font-size:36pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:36pt;color:#0000CC'>"; 
	$tfont3="<span lang='EN-US' style='font-size:36pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:36pt;color:#800080'>"; 
	$tfont5="<span lang='EN-US' style='font-size:36pt;color:#CC0000'>"; 
	echo $tfont1;}

$article="
We all know from experience that walking faster allows us to reach a place sooner, or that it takes longer to walk to a place that's farther than to one that's nearer.
<br/><br/>
This means that we are aware that speed, time, and distance are all related to each other. 
In this lesson, we will study the mathematical relationships among speed, time, and distance.
<br/><br/><br/>
@blue
Calculating Speed
@nblue
<br/>
Speed is a measure of how fast an object is moving. 
The speed of a car, for example, is a measure of fast it gets from one place to another.
<br/><br/>
To measure the speed of a car, we simply need to measure the distance it travels per given period of time.
For example, if a car travels 50 kilometers within a period of one hour, then its speed is 50 kilometers per hour, or 50 kph.
<br/><br/>
A car that travels 200 kilometers every 2 hours, on the other hand, has a speed of 200 kilometers per 2 hours, or 100 kph.
<br/><br/>
By now, you've probably noticed that speed of an object is just the distance it travelled divided by its time of travel.  
The formula for the speed of an object is therefore: 
<br/><br/>
$tfont2 Speed $tfont1 = $tfont2 Distance $tfont4 / $tfont2 Time $tfont1
<br/><br/>
Let's look at the following problems to understand how this formula is used. 
<br/><br/>
$tfont5<b>Speed Problem # 1:</b>$tfont1
<br/><br/>
A man ran for 5 hours and travelled a total distance of 35 kilometers. What was his average speed? 
<br/><br/>
$tfont2 Speed $tfont1 = $tfont2 Distance $tfont4 / $tfont2 Time $tfont1<br/>
= 35 kilometers $tfont4 / $tfont1 5 hours = $tfont3 7 kph $tfont1
<br/><br/>
$tfont5<b>Speed Problem # 2:</b>$tfont1
<br/><br/>
A plane flew for 3 hours from point A to point B. If points A and B are 720 kilometers apart, what was the speed of the plane? 
<br/><br/>
$tfont2 Speed $tfont1 = $tfont2 Distance $tfont4 / $tfont2 Time $tfont1<br/>
= 720 kilometers $tfont4 / $tfont1 3 hours = $tfont3 240 kph $tfont1
<br/><br/><br/>
@blue
Calculating Time
@nblue
<br/>
Sometimes, you already know the speed of an object and the distance it would travel, but would like to calculate the time of its travel.
<br/><br/>
We can derive the formula for time of travel from the formula for speed.
The formula for time of travel is:
<br/><br/>
$tfont2 Time $tfont1 = $tfont2 Distance $tfont4 / $tfont2 Speed $tfont1
<br/><br/>
Let's look at the following problems to understand how this formula is used. 
<br/><br/>
$tfont5<b>Time Problem # 1:</b>$tfont1
<br/><br/>
An elephant walked at an average speed of 3 kph to travel a total distance of 15 kilometers. How many hours did the elephant travel? 
<br/><br/>
$tfont2 Time $tfont1 = $tfont2 Distance $tfont4 / $tfont2 Speed $tfont1<br/>
= 15 kilometers $tfont4 / $tfont1 3 kph = $tfont3 5 hours $tfont1
<br/><br/>
$tfont5<b>Time Problem # 2:</b>$tfont1
<br/><br/>
A bird flew a total distance of 30 kilometers. If its average speed was 60 kph, how much time did it spend flying? 
<br/><br/>
$tfont2 Time $tfont1 = $tfont2 Distance $tfont4 / $tfont2 Speed $tfont1<br/>
= 30 kilometers $tfont4 / $tfont1 60 kph<br/>= $tfont3 1/2 hour $tfont1 or $tfont4 30 minutes $tfont1
<br/><br/><br/>
@blue
Calculating Distance
@nblue
<br/>
We can also calculate the distance travelled by an object if we know its speed and its time of travel. 
The formula for the distance travelled is: 
<br/><br/>
$tfont2 Distance $tfont1 = $tfont2 Speed $tfont4 x $tfont2 Time $tfont1
<br/><br/>
Let's look at the following problem to understand how this formula is used. 
<br/><br/>
$tfont5<b>Distance Problem # 1:</b>$tfont1
<br/><br/>
A hiker walked for 3 hours at an average speed of 6 kph. How far did he walk? 
<br/><br/>
$tfont2 Distance $tfont1 = $tfont2 Speed $tfont4 x $tfont2 Time $tfont1<br/>
= 6 kph $tfont4 x $tfont1 3 hours = $tfont3 18 kilometers $tfont1
<br/><br/>
$tfont5<b>Distance Problem # 2:</b>$tfont1
<br/><br/>
The average speed of a black ant is around 0.08 meters per second. 
If a black ant travelled for 1 minute at this speed, what distance did it travel? 
<br/><br/>
$tfont2 Distance $tfont1 = $tfont2 Speed $tfont4 x $tfont2 Time $tfont1<br/>
= 0.08 meters per second $tfont4 x $tfont1 60 seconds<br/>= $tfont3 4.8 meters $tfont1
<br/><br/>
Let us look at more examples of speed, time, and distance problems.
<br/><br/><br/>
@blue
Examples of Speed, Time,<br/>and Distance Problems
@nblue
<br/>
@php1speed-time-distance@
<br/><br/>
If you refresh this page, it will give new examples of speed, time, and distance problems. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice solving speed, time, and distance problems. 

";

?>




















