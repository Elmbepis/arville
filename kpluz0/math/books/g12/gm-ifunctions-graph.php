<?php
$grd=$grd;
$title="The Graph of an<br/>Inverse Function";
$img1="images/ifunc-graph1.jpg";
$img2="images/ifunc-graph2.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:18pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:30pt;color:#CC0066'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}

$article="
In the last lesson, we learned how to represent inverse functions using their tables of values.
In this lesson, we will learn how to represent inverse functions using their graphs.
<br/><br/>
When it comes to graphing inverse functions, there are a few key things to keep in mind. 
<br/><br/>
First, the graph of a function and its inverse are related to each other in that they are reflections of each other across the line y=x. 
This means that if we were to superimpose the graph of a function and its inverse on top of each other, they would be mirror images of each other with respect to the line y=x.
<br/><br/>
Another important aspect to consider when graphing inverse functions is that the domain and range of the original function become the range and domain of the inverse function, respectively. 
For example, if the original function has a domain of (-&#8734;,2) and a range of (3,&#8734;), the inverse function would have a domain of (3,&#8734;) and a range of (-&#8734;,2).
<br/><br/>
Lastly, it's important to note that not all functions have an inverse. A function must be one-to-one to have an inverse. A function is one-to-one if no two elements in the domain map to the same element in the range. 
Graphically, this means that every horizontal line intersects the function at most once. If a function fails this test, it cannot have an inverse.
<br/><br/><br/>
@blue
Steps for Graphing<br/>an Inverse Function
@nblue
<br/><br/>
Below are the basic steps for graphing an inverse function:
<br/><br/>$vio<u>
Step 1: Find the inverse.
</u>$black<br/><br/>
Find the inverse of the given function using the steps we learned before.
<br/><br/>$vio<u>
Step 2: Generate coordinates.
</u>$black<br/><br/>
The next step is to generate ordered pairs (coordinates) for f(x) and f<sup>-1</sup>x in preparation for the graphing. If the functions are not linear, this might involve creating tables of values with many points.
<br/><br/>$vio<u>
Step 3: Graph the function.
</u>$black<br/><br/>
The third step is to graph the inverse function. The inverse function should be graphed on the same axes as the original function. 
<br/><br/>$vio<u>
Step 4: Verify the inverse function.
</u>$black<br/><br/>
The final step is to verify that the inverse function is graphically a mirror image of the original function with respect to the line y=x. 
<br/><br/><br/>
@blue
Examples of Using Graphs to<br/>Represent Inverse Functions
@nblue
<br/><br/>
$vio Example # 1$black
<br/><br/>
Graph the function f(x) = 2x+5 and its inverse. 
<br/><br/>
Let's now go through the steps given above to graph the function f(x) = 2x+5 and its inverse.
<br/><br/>$vio<u>
Step 1: Find the inverse.
</u>$black<br/><br/>
We can find the inverse of f(x) = 2x+5 as follows:
<br/><br/>
y=2x+5<br/>
2x=y-5<br/>
x = (y-5)/2<br/>
$blue f<sup>-1</sup>x = (x-5)/2$black
<br/><br/>$vio<u>
Step 2: Generate coordinates.
</u>$black<br/><br/>
Since f(x) and f<sup>-1</sup>x  are both linear functions, we just need two points for each of them to construct their graphs.
<br/><br/>
For f(x) = y = 2x+5, we can use the intercepts: (0,5) and (-5/2,0)
<br/><br/>
For f<sup>-1</sup>(x) = y = (x-5)/2, we can use the intercepts: (0,-5/2) and (5,0)
<br/><br/>$vio<u>
Step 3: Graph the function.
</u>$black<br/><br/>
Shown below are the graphs of f<sup>-1</sup>(x)  and f(x) on the same set of axes.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Graphs of<br/>f(x)=2x+5 and f<sup>-1</sup>x=(x-5)/2</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>$vio<u>
Step 4: Verify the inverse function.
</u>$black<br/><br/>
Looking at the graphs of f(x) and f<sup>-1</sup>(x) confirms that they are mirror images of each other with respect to the line y=x.
<br/><br/>
$vio Example # 2$black
<br/><br/>
Graph the function f(x) = (x/2)-6 and its inverse. 
<br/><br/>
Let's now go through the steps given above to graph the function f(x) = (x/2)-6 and its inverse.
<br/><br/>$vio<u>
Step 1: Find the inverse.
</u>$black<br/><br/>
We can find the inverse of f(x) = (x/2)-6 as follows:
<br/><br/>
y=(x/2)-6<br/>
x=2(y+6)<br/>
$blue f<sup>-1</sup>x = 2(x+6)$black
<br/><br/>$vio<u>
Step 2: Generate coordinates.
</u>$black<br/><br/>
Since f(x) and f<sup>-1</sup>x  are both linear functions, we just need two points for each of them to construct their graphs.
<br/><br/>
For f(x) = y = (x/2)-6, we can use the intercepts: (0,-6) and (12,0)
<br/><br/>
For f<sup>-1</sup>(x) = y = 2(x+6), we can use the intercepts: (0,12) and (-6,0)
<br/><br/>$vio<u>
Step 3: Graph the function.
</u>$black<br/><br/>
Shown below are the graphs of f<sup>-1</sup>(x)  and f(x) on the same set of axes.
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Graphs of<br/>f(x)=(x/2)-6 and f<sup>-1</sup>x=2(x+6)</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/><br/>$vio<u>
Step 4: Verify the inverse function.
</u>$black<br/><br/>
Looking at the graphs of f(x) and f<sup>-1</sup>(x) confirms that they are mirror images of each other with respect to the line y=x.
"
?>
