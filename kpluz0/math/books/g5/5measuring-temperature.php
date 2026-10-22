<?php

$grd=$grd;
$title="Measuring Temperature";
$img1="images/measurement-temperature1.jpg";
$img2="images/measurement-temperature2.jpg";
$img3="images/measurement-temperature3.jpg";
$red=$font."<font color='#BB0000'>";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$black=$font."<font color='#000000'>";

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:20pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:20pt;color:#BB0000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:18pt;color:#800080'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:34pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:34pt;color:#BB0000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:36pt;color:#800080'>"; 
	}

$article="
Temperature is a numerical measure of how hot or cold something is.
It is commonly measured using a device called a thermometer, but there are many other ways to measure it.
The science or practice of measuring temperature is called thermometry.
<br/><br/>
We know from experience that heating an object increases its temperature or makes it hotter.
However, heat is different from temperature.
<br/><br/>
Heat is the flow of energy from a hotter object to a colder one.
It is not an amount of energy contained within an object.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
As heat flows between two objects, the hotter one becomes colder while the colder one becomes hotter.
The flow of heat between them only stops when they are already at the same temperature.
<br/><br/><br/>
@blue
The Celsius and Fahrenheit<br/>Temperature Scales
@nblue
<br/>
Just like any other physical quantity, we need to use measurement units to be able to measure temperature effectively.
The two common measurement units of temperature that we use in everyday life are degrees Celsius (&deg;C) and degrees Fahrenheit (&deg;F). 
<br/><br/>
These temperature measurement units use different temperature scales: the Celsius and Fahrenheit scales.
<br/><br/>
Under standard conditions, water freezes at 0&deg;C and boils at 100&deg;C in the Celsius scale,
and freezes at 32&deg;F and boils at 212&deg;F in the Fahrenheit scale. 
<br/><br/>
Although these two temperature scales seem very different, we can convert a temperature from one scale into the other using these simple formulas:
<br/><br/>
$blue TC = 5&deg;C/9&deg;F x (TF - 32&deg;F)$black 
<br/>
$red TF = (TC x 9&deg;F/5&deg;C) + 32 &deg;F$black
<br/><br/>
where TC is the temperature in &deg;C and TF is the temperature in &deg;F.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
As an example, let's convert 122 &deg;F into &deg;C by applying the first formula:
<br/><br/>
$blue TC = 5&deg;C/9&deg;F x (TF - 32&deg;F)$black<br/>
TC = 5&deg;C/9&deg;F x (122&deg;F - 32&deg;F)<br/>
= 5&deg;C/9&deg;F x (90&deg;F) = 50&deg;C
<br/><br/>
Thus, 122 &deg;F = 50&deg;C.
<br/><br/>
As another example, let's convert 10 &deg;C into &deg;F by applying the second formula:
<br/><br/>
$red TF = (TC x 9&deg;F/5&deg;C) + 32 &deg;F$black<br/>
TF = (10&deg;C x 9&deg;F/5&deg;C) + 32&deg;F<br/> 
= 18&deg;F + 32&deg;F = 50&deg;F
<br/><br/>
Thus, 10 &deg;C = 50&deg;F.
<br/><br/><br/>
@blue
Reading a Thermometer
@nblue
<br/>
Modern thermometers are now digital, so you can just read the numerical digits of the temperature directly from the display.
Before digital thermometers were invented, however, temperature was commonly measured using liquid thermometers.
<br/><br/>
A liquid thermometer is a thermometer that consists of a glass tube filled with a liquid such as liquid or alcohol.
The Celsius and Fahrenheit scales are marked on this glass tube.
The liquid in a liquid thermometer is probably mercury if it is silver in color and dyed alcohol if it is red in color.
<br/><br/>
As temperature changes, the liquid expands and contracts, so its level inside the tube changes.
To read a liquid thermometer, you simply need to read the number on either scale that matches the liquid level.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
@blue
Math Problems<br/>Involving Temperature
@nblue
<br/>
Simple math problems that involve temperature often deal with differences between two temperature levels.
Fortunately, finding the difference between two temperatures is just like subtracting real numbers.
<br/><br/>
Temperatures can fall below zero in either the Celsius or Fahrenheit scale, so solving temperature problems may involve negative numbers.
Let's look at some examples of math problems that involve temperature.
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
Last week, the highest temperature recorded was of 25&deg;C while the lowest temperature recorded was -10&deg;C. 
What is the difference between the highest and lowest recorded temperatures last week?
<br/><br/>
$vio Solution:$black
<br/>
Difference = 25&deg;C - (-10&deg;C) = 35&deg;C
<br/><br/>
Thus, the difference between last week's highest and lowest recorded temperatures was $red 35&deg;C$black.
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
The temperature at 11 a.m. this morning was higher than the temperature at 6 a.m. by 4&deg;C.
The temperature rose from 11 a.m. to 4 p.m. by 5&deg;C. It then fell by 6&deg;C to 24&deg;C at 11 p.m.
What was the temperature at 6 a.m. today?
<br/><br/>
$vio Solution:$black
<br/>
t + 4&deg;C + 5&deg;C - 6&deg;C = 24&deg;C<br/>
t = 21&deg;C
<br/><br/>
Thus, the temperature at 6 a.m. was $red 21&deg;C$black.
<br/><br/>
As in any math problem involving measurements, you can only add temperatures that have the same measurement unit.
Thus, you need to convert all temperature readings into the same measurement unit (either degrees Celsius or degrees Fahrenheit) 
before you can do any math operation on them. 
"
?>




















