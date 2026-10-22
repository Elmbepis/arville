<?php

$grd=$grd;
$title="Data in Tables<br/>and Bar Graphs";
$img1="images/graph-bar1.jpg";
$img2="images/graph-bar3.jpg";

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
Data are pieces of facts or information that people gather to understand something better.
They consist of numbers or words like measurements, observations, or descriptions of things.  
<br/><br/>
People collect data about everything nowadays.
Here are examples of data:
<br/><br/>
- students' grades<br/>
- experiment results<br/>
- populations of cities<br/>
- health records<br/>
- contest scores<br/>
- shapes and sizes of things
<br/><br/>
People are able to give meaning to the data they collect by analyzing them.
To analyze something means to study or examine it closely.
<br/><br/>
People analyze data in order to make better decisions and take better actions.
For example, weather stations analyze weather data to predict the weather correctly.
<br/><br/><br/>
@blue
Collecting and<br/>Organizing Data
@nblue
<br/>
Collecting data means gathering information or measurements that you can analyze.
<br/><br/>
There are many ways to collect data.
Here are some of them:
<br/><br/>
- by measuring things<br/>
- by asking people<br/>
- by reading reports<br/>
- by observing events
<br/><br/>
It is important to organize the collected data so that it can be analyzed easily.
Organizing data means arranging them in an orderly manner.
<br/><br/>
Let's now look at examples of how to organize data.
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
You asked your classmates to write down their favorite colors on a piece of paper.
Here are the colors that they wrote down:
<br/><br/>$vio
orange blue red white<br/>green purple red blue<br/>green yellow blue black<br/>orange red blue green$black
<br/><br/>
One way to organize the data above is to arrange the flavors alphabetically and to group them per line:
<br/><br/>$vio
black<br/> 
blue blue blue blue <br/> 
green green green<br/>
orange orange<br/> 
purple<br/> 
red red red<br/>
white<br/> 
yellow 
$black<br/><br/>
Now you can easily see that blue, green, and red are the favorite colors of your classmates. 
<br/><br/>
A variable is a value that can change.
When we're collecting data, we are actually collecting values for one or more variables.
<br/><br/>
The data that you collected above has only one variable: color.
<br/><br/>
People often collect data with two or more variables.  
A common way of organizing data with two or more variables is by putting them in tables.
<br/><br/>
A table is an arrangement of data in rows and columns.
This arrangement allows people to easily read and understand data with two or more variables.
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Say, for example, that you are saving money to buy a new bicycle.
You therefore want to track how much you save per month.
<br/><br/>
One way to do this is to count and record your savings every month.
You can then put your savings per month in a table like this:
<br/><br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont3 My Monthly Savings </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '50%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbspMonth&nbsp;</b></td><td align='center' width = '50%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Savings</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 January</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 &#8369; 150</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 February</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 &#8369; 100</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 March</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 &#8369; 250</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 April</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 &#8369; 300</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 May</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 &#8369; 200</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 June</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 &#8369; 250</td>
</tr></table>
<br/><br/>
The table above has two variables: month and savings.
It relates these two variables by showing your savings every month.
<br/><br/><br/>
@blue
Graphing Data
@nblue
<br/>
We need to analyze and interpret the data we collect to make them useful.
Interpreting data means trying to understand what they mean.
<br/><br/>
One way to give meaning to a set of data is to put it in a graph.
Graphs let you see data in such a way that you understand its meaning more easily. 
<br/><br/>
A bar graph is a graph that uses bars to compare data. 
It may run horizontally or vertically. 
The longer a bar is in a bar graph, the greater is its value.
<br/><br/>
Bar graphs have two axes.
One axis is horizontal and is called the x-axis.
The other is vertical and is called the y-axis.
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
Let's make a bar graph for the data in the second example above, which shows your savings per month.
In this bar graph, we'll put the month on the x-axis and your savings on the y-axis.
<br/><br/>
Here's what our bar graph would look like:
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
Note how we labelled the axes to show what they represent.
Each of the axes also has its own scale.
<br/><br/>
The scale for the x-axis consists of evenly spaced labels that show the months. 
The scale for the y-axis is a set of evenly spaced numbers that show the values of your savings per month. 
<br/><br/>
In the bar graph above, we can easily see how your savings go up and down as each month passes.
<br/><br/>
$red<u>Example # 4</u>$black
<br/><br/>
Roy, Jim, Mike, Carl, and Dave are your teammates in basketball.
The points they scored in your last game are shown in the table below.
<br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont3 Points Scored by my Teammates </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '50%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbspName&nbsp;</b></td><td align='center' width = '50%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Points Scored</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Roy</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 8</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Jim</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 17</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Mike</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 20</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Carl</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 12</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Dave</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 13</td>
</tr></table>
<br/><br/>
Let's make a horizontal bar graph for the data in the table above.
In this bar graph, we'll put the points scored on the x-axis and the names of your teammates on the y-axis.
<br/><br/>
Here's what our bar graph would look like:
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
You can easily see from this bar graph that Mike scored the most points while Roy scored the least points. 
You can even compare all the players' scores at the same time by just looking at the lengths of the bars. 
<br/><br/>
Bar graphs are great tools for analyzing data. They are simple to make and easy to use.

"
?>




















