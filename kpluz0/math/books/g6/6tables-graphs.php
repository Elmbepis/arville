<?php

$grd=$grd;
$title="Data in Tables<br/>and Pie Charts";
$img1="images/chart-pie1.jpg";
$tally1="<img border='0' src='../books/images/tally1.jpg'>";
$tally2="<img border='0' src='../books/images/tally2.jpg'>";
$tally3="<img border='0' src='../books/images/tally3.jpg'>";
$tally4="<img border='0' src='../books/images/tally4.jpg'>";
$tally5="<img border='0' src='../books/images/tally5.jpg'>";
$tallyd="<img border='0' src='../books/images/tally-dash.jpg'>";

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
Data refers to facts or information that people collect for future reference or analysis.
It often consists of numbers and text that represent measurements, observations, or descriptions of things.  
<br/><br/>
People collect data about everything nowadays.
Here are examples of data that people collect:
<br/><br/>
- business data collected by corporations<br/>
- customer data collected by retailers<br/>
- experiment data collected by scientists<br/>
- financial data collected by banks<br/>
- medical data collected by hospitals<br/>
- weather data collected by meterologists<br/>
- student data collected by schools
<br/><br/>
The huge amounts of data collected every day are mostly analyzed by computers.
These computers give meaning to the data and help people make better decisions and take better actions.
<br/><br/>
For example, by collecting sales data, companies are able to identify their most profitable products and focus on them.
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
Say that you got a list of the heights in centimeters of students in a classroom:
<br/><br/>$vio
147 130 149 120 145 133<br/>144 150 142 148 126 160<br/>149 152 148 138 157 146$black
<br/><br/>
One way to organize the data above is to arrange the heights from lowest to highest:
<br/><br/>$vio
120 126 130 133 138 142<br/>144 145 146 147 148 148<br/>149 149 150 152 157 160$black
<br/><br/>
You can now easily inspect the students' heights and conclude that most of them are 140 to 150 centimeters tall. 
<br/><br/>
A variable is a value that can change.
When we're collecting data, we are actually collecting values for one or more variables.
<br/><br/>
The list of students' heights above has only one variable: height.
<br/><br/>
Most sets of data that people collect relate two or more variables to each other.  
A common way of organizing data with two or more variables is by putting them in tables.
<br/><br/>
A table is an arrangement of data in rows and columns.
This arrangement allows people to easily read and understand data with two or more variables.
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Say, for example, that a cash prize of &#8369;100 would be given to a soccer team every time they score a goal.
You can make a table with two variables that relates the number of goals scored to its corresponding cash prize:
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Goals Scored and Prize Money</b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '30%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbsp;Goals Scored&nbsp;</b></td>
<td align='center' width = '35%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Prize Money</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 1</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 &#8369; 100</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 2</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 &#8369; 200</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 3</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 &#8369; 300</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 4</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 &#8369; 400</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 5</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 &#8369; 500</td>
</tr></table>
<br/><br/>
In this example, the value of the prize money depends on the number of goals scored.
Thus, the prize money is called a dependent variable while the number of goals scored is called an independent variable.
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
A singing contest with five contestants would have its winner voted by the audience.
The audience were to cast their votes one by one.
<br/><br/>
To count the votes, you need to tally the votes for each contestant. You can do this by writing down a tally mark 
beside the name of the singer every time he or she gets a vote. 
<br/><br/>
You can then put the tallies in a table like this:
<br/><br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont3 Votes Per Singer </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '40%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbsp;Singer&nbsp;</b></td><td align='center' width = '60%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Tally</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Mark</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally1</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Sarah</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally2</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Darren</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally3</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Regine</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally1</td>
</tr></table>
<br/><br/>
The number of tally marks in each tally equals the number of times the singer got a vote.
It therefore represents how frequently that singer got a vote during the judging.
<br/><br/>
We can further improve our table above by adding a third column that shows this frequency.
This third column allows our table to show immediately which singer got the most votes.
<br/><br/>
Our table should now look like this:
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Votes Per Singer </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '25%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbsp;Singer&nbsp;</b></td>
<td align='center' width = '45%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Tally</b></td>
<td align='center' width = '30%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Frequency</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Mark</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally1</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 11</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Sarah</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally2</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 12</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Darren</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally3</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 18</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Regine</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally1</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 16</td>
</tr></table>
<br/><br/>
The table above is called a frequency distribution table.
A frequency distribution table is a table that shows the frequency of a certain outcome in the collected data. 
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
A zoo has 3 tigers, 2 lions, 2 giraffes, 5 zebras, 4 snakes, 2 crocodiles, 1 eagle, 4 herons, 3 owls, 11 lovebirds, 4 carps, 15 guppies, and 9 goldfish.
<br/><br/>
Construct a frequency distribution table that shows the number of mammals, birds, reptiles, and fishes in the zoo. 
<br/><br/>
Your table should look something like this:
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Kinds of Animals in a Zoo </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr><td align='center' width = '28%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>&nbsp;Kind of Animal&nbsp;</b></td>
<td align='center' width = '45%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Tally</b></td>
<td align='center' width = '27%' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont2 <b>Frequency</b></td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Mammal</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally2</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 12</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Bird</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally4</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 19</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Reptile</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally1</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 6</td>
<tr><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 Fish</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally5$tallyd$tally3</td><td align='center' style='padding-right:5px; padding-left:5px; padding-top:5px; padding-bottom:5px'>$tfont1 28</td>
</tr></table>
<br/><br/><br/>
@blue
Interpreting Data
@nblue
<br/>
Collecting data is useless unless it is analyzed and interpreted.
Interpreting data means trying to understand what they mean.
<br/><br/>
For simple cases, using a single table to present and interpret the data is already enough.
However, this is not true when dealing with large amounts of data.
<br/><br/>
For example, it would be difficult to show the meaning of 100 pages of numerical data if you'll simply put them all in a table.
For such a case, it's better to present the data using graphs or charts.
<br/><br/>
$vio<u>The Pie Chart</u>$black
<br/><br/>
A pie chart, also known as a circle graph or pie graph, is a type of chart that looks like a circle that has been divided into sectors.
Each sector represents a portion of the collected data as a percentage. 
<br/><br/>
Pie charts are useful when you're trying to show the different parts of a whole as percentages.
To show what this means, let's construct a pie chart that shows in percentages the kinds of animals in our example zoo above.
<br/><br/>
Here are the steps we need to take to create this pie chart:
<br/><br/>
1. Find the total number of animals in the zoo: 12 + 19 + 6 + 28 = $vio<b>65</b>$black
<br/><br/>
2. Find the percentage of each kind of animal:<br/>
mammals:  12/65 = $vio<b>18.5%</b>$black<br/>
birds: 19/65 = $vio<b>29.2%</b>$black<br/>
reptiles: 6/65 = $vio<b>9.2%</b>$black<br/>
fishes: 28/65 = $vio<b>43.1%</b>$black
<br/><br/>
3. Draw a circle and divide it into four sectors whose relative sizes correspond to the percentages above.
<br/><br/>
4. Label the pie chart.
<br/><br/>
Here's our completed pie chart of the kinds of animals in our example zoo:
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
We can immediately see from the pie chart above that there are more fishes than any other kind of animal in the zoo,
and that reptiles have the smallest population among all the animals.
<br/><br/>
In fact, we can even use this pie chart to compare the relative populations of the different kinds of animals in the zoo.
<br/><br/>
This shows why pie charts are useful in interpreting large amounts of data.
They help us present the meaning of the collected data in a way that's easy to see and understand.
"
?>




















