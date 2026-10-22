<?php

$grd=$grd;
$title="Data in Tables<br/>and Bar Graphs";
$img1="images/graph-bar1.jpg";
$img2="images/graph-bar2.jpg";

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
- sales data collected by companies<br/>
- medical data collected by hospitals<br/>
- student data collected by schools
<br/><br/>
People are able to give meaning to the data they collect by analyzing them.
People analyze data in order to make better decisions and take better actions.
<br/><br/>
For example, by analyzing weather data, weather stations are able to make a better prediction of the weather.
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
- by interviewing people<br/>
- by reading reports<br/>
- by making surveys<br/>
- by using recording devices
<br/><br/>
It is important to organize the collected data so that it can be analyzed easily.
Let's now look at examples of how to organize data.
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
You asked your classmates to write down their favorite flavor of ice cream on a piece of paper.
Here are the flavors that they wrote down:
<br/><br/>$vio
chocolate mango strawberry<br/>mango ube cheese<br/>strawberry mango vanilla<br/>chocolate strawberry mango$black
<br/><br/>
One way to organize the data above is to arrange the flavors alphabetically and to group them per line:
<br/><br/>$vio
cheese<br/> 
chocolate chocolate<br/> 
mango mango mango mango <br/> 
strawberry strawberry strawberry<br/>
ube<br/>
vanilla$black
<br/><br/>
Now you can easily see that, in general, mango and strawberry are the favorite ice cream flavors of your classmates. 
<br/><br/>
A variable is a value that can change.
When we're collecting data, we are actually collecting values for one or more variables.
<br/><br/>
The data that you collected above has only one variable: ice cream flavor.
<br/><br/>
Most sets of data that people collect relate two or more variables to each other.  
A common way of organizing data with two or more variables is by putting them in tables.
<br/><br/>
A table is an arrangement of data in rows and columns.
This arrangement allows people to easily read and understand data with two or more variables.
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Say, for example, that you are saving money for a new bicycle, and you want to track how much you save per month.
One way to do this is to count and record your savings every month.
<br/><br/>
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
It relates these two variables by showing your savings for each month from January to June.
<br/><br/><br/>
@blue
Graphing Data
@nblue
<br/>
We need to analyze and interpret the data we collect to make them useful.
Interpreting data means trying to understand what they mean.
<br/><br/>
One way to give meaning to a collection of data is to put them in a graph.
Graphs show patterns or trends in data that may help you understand the meaning of the data. 
<br/><br/>
A bar graph is a graph that uses bars to compare data. 
It may run horizontally or vertically. 
The longer a bar is in a bar graph, the greater is its value.
<br/><br/>
Bar graphs have two axes.
One axis is horizontal and is called the x-axis while the other is vertical and is called the y-axis.
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
We can compare several similar variables by putting them on the same bar graph.
<br/><br/>
A bar graph with two sets of data points, and therefore shows two sets of bars, is called a double bar graph. 
Each set of bars is colored differently and identified using either a label or a legend.
<br/><br/>
$red<u>Example # 4</u>$black
<br/><br/>
Say, for example, that you own three companies and that the number of male and female employees in your companies are shown by the table below.
<br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont3 My Male and Female Employees </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '40%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbspMonth&nbsp;</b></td><td align='center' width = '30%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Male</b></td><td align='center' width = '30%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Female</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 ABCD Ltd.</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 400</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 500</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 JKLM Inc.</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 600</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 500</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 WXYZ Corp.</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 500</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 400</td>
</tr></table>
<br/><br/>
Now, let's make a double bar graph that compares the number of male and female employees in your three companies.
This time, let's make the bars run horizontally.
<br/><br/>
Here's what this double bar graph would look like:
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
Looking at this double bar graph, we observe that only ABCD Ltd. has more female employees than male employees.
Also, JKLM Inc. is the biggest company.
<br/><br/>
What other observations can you make using the graph above? List down as many as you can.
<br/><br/>
Simple to make and easy to use, bar graphs are great visual tools for comparing variables or showing their trends.

"
?>




















