<?php

$grd=$grd;
$title="Data in Tables<br/>and Line Graphs";
$img1="images/graph-line1.jpg";
$img2="images/graph-line2.jpg";

$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";

if ($format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#BB0000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:18pt;color:#800080'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	}

$article="
Data refers to pieces of facts or information that people collect to better understand something.
It often consists of numbers and text such as measurements, observations, or descriptions of things.  
<br/><br/>
People collect data about everything nowadays.
Here are examples of data that people collect:
<br/><br/>
- customer data collected by stores<br/>
- experiment data collected by scientists<br/>
- financial data collected by banks<br/>
- medical data collected by hospitals<br/>
- student data collected by schools
<br/><br/>
People are able to give meaning to the data they collect by analyzing them.
By analyzing data, people make better decisions and take better actions.
<br/><br/>
For example, by analyzing sales data, companies are able to identify their best-selling products and focus on them.
<br/><br/><br/>
@blue
Collecting and<br/>Organizing Data
@nblue
<br/>
Collecting data means gathering information or measurements to get a good picture of something you're interested in.
<br/><br/>
There are many ways to collect data.
These include measuring physical quantities, conducting polls and surveys, or even using electronic devices that record data. 
<br/><br/>
It is important to organize the collected data so that it can be analyzed easily.
Let's now look at examples of how to organize data.
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
Say that you got a list of the winning numbers from a recent raffle:
<br/><br/>$vio
132 457 761 213 433 982<br/>541 726 811 177 649 314$black
<br/><br/>
One way to organize the data above is to arrange the numbers from lowest to highest.
You can then easily check if a raffle ticket won or not using your organized list:
<br/><br/>$vio
132 177 213 314 433 457<br/>541 649 726 761 811 982$black
<br/><br/>
A variable is a value that can change.
When we're collecting data, we are actually collecting values for one or more variables.
<br/><br/>
The list of winning raffle numbers above has only one variable: raffle number.
<br/><br/>
Most sets of data that people collect relate two or more variables to each other.  
A common way of organizing data with two or more variables is by putting them in tables.
<br/><br/>
A table is an arrangement of data in rows and columns.
This arrangement allows people to easily read and understand data with two or more variables.
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Say, for example, that you have a new puppy and want to know how fast it is growing.
One way to do this is to measure your puppy's height every month and record each measurement.
<br/><br/>
You can then put the measurements in a table like this:
<br/><br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont3 Puppy's Age Vs. Height </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '50%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbspAge (months)&nbsp;</b></td><td align='center' width = '50%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Height (cm)</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 2</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 34</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 3</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 45</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 4</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 51</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 5</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 56</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 6</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 60</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 7</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 63</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 8</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 66</td>
</tr></table>
<br/><br/>
The table in our example above relates two variables: your puppy's age and its height.
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
If you also measured the weight of your puppy per month, you could make another table with two variables, this time relating the height of your puppy to its weight:
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Puppy's Height Vs. Weight </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '34%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbsp;Height (cm)&nbsp;</b></td>
<td align='center' width = '33%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Weight (kg)</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 34</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 7</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 45</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 17</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 51</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 23</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 56</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 30</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 60</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 35</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 63</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 39</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 66</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 43</td>
</tr></table>
<br/><br/><br/>
@blue
Graphing Data
@nblue
<br/>
Collecting data is useless unless it is analyzed and interpreted.
Interpreting data means trying to understand what they mean.
<br/><br/>
One way to give meaning to a collection of data is to put them in a graph.
Graphs show patterns or trends in data that may help you understand the meaning of the data. 
<br/><br/>
A line graph is a type of graph that shows how variables change over time. 
It may also be used to show how one variable changes with another (such as how a puppy's weight changes with its height).
<br/><br/>
A line graph consists of a horizontal x-axis and a vertical y-axis.
These axes are used to identify the positions of points on the graph.
<br/><br/>
A point on a line graph is denoted by two numbers inside a parenthesis and separated by a comma.
The first number is its horizontal position based on the x-axis and the second number is its vertical position based on the y-axis.
<br/><br/>
These paired numbers are called coordinates.
The point at which the axes intersect is called the point of origin, and its coordinates are always (0,0).
<br/><br/>
Line graphs that only deal with positive values have axes that intersect at the bottom left corner, so that is where their point of origin is. 
<br/><br/>
To show what a line graph looks like, let's make one that shows the growth rate of the puppy in our second example.
In this line graph, let's put the age of the puppy on the x-axis and its height on the y-axis.
<br/><br/>
Here's what our line graph would look like:
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
Note how we labelled the axes to show what they represent.
The coordinates of each point on the graph came from the paired values of the puppy's age and height. 
We also connected the data points with line segments to clearly show the trend of the graph.
<br/><br/>
Note as well that each of the axes has its own scale.
A scale is a set of evenly spaced numbers that indicate the values on its axis. 
<br/><br/>
In the line graph above, we can easily see that the puppy grows taller as it gets older.
We also see that its growth slows down as it ages.
<br/><br/>
The variable that we often put on the x-axis does not depend on the other variables so it is called the independent variable.
The x-axis is therefore the independent axis.
<br/><br/>
On the other hand, the y-axis is called the dependent axis because its variable is dependent on the x-axis' variable.
<br/><br/>
For example, in our line graph above, the puppy's height depends on its age and not the other way around.
<br/><br/>
We can compare several similar variables by plotting (that's another word for graphing) them on the same pair of axes.
<br/><br/>
A line graph with two sets of data points, and therefore shows two lines, is called a two-line or double line graph. 
Each line is colored differently and identified using either a label or a legend.
<br/><br/>
Below is a double line graph that compares the tickets sold by boy scouts and girl scouts during a one-week fund-raising event.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
The double line graph above tells us that the girl scouts sold more tickets than the boy scouts during the early part of the week.
However, the boy scouts sold more tickets during the later part of the week.
What other observations can you make from the graph above?
<br/><br/>
Line graphs are powerful visual tools for showing trends.
As such, they allow people to predict what future values of a variable might be.
It is therefore used heavily in marketing, finance, and scientific research.

"
?>




















