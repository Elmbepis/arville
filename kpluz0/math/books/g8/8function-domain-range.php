<?php
$grd=$grd;
$title="The Domain and Range<br/>of a Function";
$img1="images/functions1.jpg";
$img2="images/functions2.jpg";
$img3="images/functions3.jpg";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:20pt;color:#0000BB'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:32pt;color:#0000BB'>"; 
	}

$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

The relationship between two sets of numerical information may sometimes be expressed as a set of ordered pairs. 
This is an example of a relation expressed in that manner:
<br/><br/>$vio 
L = {(-2,6), (4,-7), (-5,0), (3,11)}
<br/><br/>$black
For the relation above the set of values of x is $vio {-2, 4, -5, 3}$black and the set of values of y is $vio {6, -7, 0, 11}$black.
<br/><br/>
The domain of a relation is the set of all the first coordinates of the ordered pairs, such as the x values above.
<br/><br/>
The range of a relation is the set of all the second coordinates of the ordered pairs, such as the y values above.
<br/><br/><br/>
$red Example # 1$black
<br/><br/>
Write the ordered pairs for the relation R graphed below and state its domain and range:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>
$red Answer:$black
<br/><br/>
R = {(-6,1), (-5,-6), (-3,4), (1,-1), (5,-4), (6,6)}$black<br/>
Domain: {-6, -5, -3, 1, 5, 6}<br/>
Range: {1, -6, 4, -1, -4, 6}
<br/><br/>
Sometimes, it is possible to describe a set of ordered pairs using a rule.
Consider the relation below:
<br/><br/>$vio 
T = {(2,6),(5,15),(11,33),(15,45)}
<br/><br/>$black
In the relation above, the second coordinate is always 3 times the first one. Thus, it may be described by the following rule:
<br/><br/>$vio 
T = {(x,y): y = 3x, x = 2, 5, 11, 15}
<br/><br/>$black
The rules above is read as follows: \"the set of ordered pairs (x,y) such that y = 3x for x equal to 2, 5, 11, 15.\"
Here, the domain is $vio {2, 5, 11, 15}$black while the range is $vio {6, 15, 33, 45}$black.
<br/><br/><br/>
$red Example # 2$black
<br/><br/>
Write a rule for the relation below and state its domain and range:
<br/><br/>$vio
R = {(-3,-6),(0,-3),(5,2),(8,5)}$black
<br/><br/>
$red Answer:$black
<br/><br/>
R = {(x,y): y = x - 3, x = -3, 0, 5, 8}<br/>
Domain: {-3, 0, 5, 8}<br/>
Range: {-6, -3, 2, 5}
<br/><br/>
$blue<u>Definition of a Function</u>$black
<br/><br/>
A function is a relation in which each element in the domain is paired with one and only one element in the range.
It can be used to describe a process wherein each input produces exactly one output.
<br/><br/>
Given a relation, you can list every element of its domain on the left side of a piece of paper and every element of its range on the right side.
You can then draw a line from each domain element to all its corresponding range elements.
<br/><br/>
If only one arrow is drawn from each domain element, then it means that each domain element is only paired with one range element and the relation is a function.
<br/><br/>
The process above of determining whether a relation is a function or not is called mapping and the drawing produced is called a mapping diagram.
Below are examples of mapping diagrams for relations that are functions and not functions.
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
Given a graph of a relation, you can easily determine if it is a function or not using the $vio vertical line test$black.
If NO vertical line can be drawn through the graph such that it touches more than one point on the graph, then the graph represents a function, as shown below:
<br/><br/><br/>
<table width='900' align='center'><tr><td align='center'>
<img border='0' src='$img3'>
</td></tr></table>
<br/><br/>
A function in variable $vio x $black is generally represented by the notation $vio f(x)$black, which is read \"'f' of 'x'.\"
<br/><br/>
The domain of a function f(x) is the set of all possible independent values of x that makes it defined.
A function is undefined for a given value of x if f(x) is not a valid mathematical expression, such as when its denominator becomes equal to zero.
<br/><br/>
The range of a function f(x), on the other hand, is the set of all possible values that it can produce across its entire domain.
<br/><br/><br/>
$red Example # 3$black
<br/><br/>
State the domain and range of the function: 
<br/><br/>$vio
f(x) = x<sup>2</sup><br/><br/>
$red Answer:$black
<br/><br/>
Domain:<br/>
Since x can take any real number as its value in this function, then the domain of the function $vio y = x<sup>2</sup>$black is all real numbers.
<br/><br/>
Range:<br/>
Since f(x) is the square of x, then it can never be negative in value for any value of x. Thus, the range of $vio f(x) = x<sup>2</sup>$black is all non-negative real numbers.
"
?>
