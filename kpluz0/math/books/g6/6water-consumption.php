<?php

$grd=$grd;
$title="Measuring<br/>Water Consumption";
$img1="images/water-meter.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";

$article="
Households use water on a daily basis.
The water that we receive through our faucets at home is supplied to us by water companies.
We, in turn, need to pay them for the water that we consume.
<br/><br/>
Water consumption in the Philippines is measured in cubic meters (cu m).
This is the volume of a cube that is 1 meter long, 1 meter wide, and 1 meter high.
There are 1000 liters in 1 cubic meter.
<br/><br/>
The amount that we pay for a month depends on how much water we consume for that month. 
Thus, water companies must measure the amount of water that we consume every month.
They do this by using water meters.
<br/><br/><br/>
@blue
Reading a Water Meter
@nblue
<br/>
A water meter is a device that measures the amount of water that passes through it and into our homes.
It has a row of digits that shows the total amount of water that we've consumed so far.
<br/><br/>
The first four or five digits of a water meter are black over a white background.
They stand for the total amount of water consumed in cubic meters so far.
<br/><br/>
The next three digits are either red in color over a white background, or white in color over a black background.
They stand for the additional water consumed so far in liters.
<br/><br/>
For example, if the row of digits read <b>0743$red 568$black</b>, the total water consumed so far is 743 cubic meters and 568 liters.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
The three red digits are actually the decimal part of the total consumption in cubic meters.
Thus, we may read <b>0743$red 568$black</b> as 743.568 cubic meters. 
The decimal part, 0.568 cubic meter, is equal to 568 liters.
<br/><br/>
After 999, the red digits are reset to zero and 1 is added to the black digits.
This converts 1000 liters into 1 cubic meter in the water meter so that the red digits can start counting in liters again from zero.
<br/><br/>
Water meters also have a small dial or wheel that rotates fast when water is flowing through the meter.
This is a leak detector. 
If you shut off all your faucets in your home and this wheel still rotates, then there's a leak in your pipes.
<br/><br/><br/>
@blue
Calculating Your<br/>Monthly Water Consumption
@nblue
<br/>
Since your water meter doesn't reset to zero at the end of each month, its digits are not showing your running consumption for the month.
It is actually showing your total consumption since you started using that meter.
<br/><br/>
To determine your water consumption for the current month, you simply need to subtract last month's water meter reading from the current reading.
<br/><br/>
For example, if you water meter reading last month was 1243.338 and your water meter reading this month is 1256.848, 
then your water consumption (WC) this month is:
<br/><br/>
WC = 1256.848 - 1243.338<br/>
= 13.51 cu m<br/>
= 13 cu m and 510 liters 
<br/><br/><br/>
@blue
Calculating Your Monthly<br/>Water Consumption Costs
@nblue
<br/>
Now that you can calculate the amount of water you're consuming every month, you are ready to calculate your monthly water bill.
Water companies charge their customers based on how much water they consume.
<br/><br/>
The cost of the first 10 cubic meters that you consume is usually a flat rate, which means that it is always the same whether you reach 10 cubic meters or not.
After the first 10 cubic meters, water consumption is charged on a per cubic meter basis.
<br/><br/>
The cost per cubic meter changes as you consume more and more water. 
The rates being charged are often presented by the water company to the consumer in a table. 
<br/><br/>
Here's an example of how the cost changes for every certain number of cubic meters consumed.
<br/><br/>
Cost of first 10 cu m: $red&#8369;160.00$black<br/> 
Cost of next 10 cu m: $red&#8369;20.00/cu m$black<br/>
Cost of next 20 cu m: $red&#8369;38.00/cu m$black<br/>
Cost of next 20 cu m: $red&#8369;50.00/cu m$black 
<br/><br/>
Given our total water consumption, we can calculate our water bill using our table.
Let's go back to our earlier example wherein our total consumption was 13.51 cubic meters.
<br/><br/>
Cost of WC = &#8369;160.00 + (3.51 cu m x $red &#8369;20.00/cu m$black)<br/>
Cost of WC = &#8369;160.00 + &#8369;70.20<br/>
Cost of WC = &#8369;230.20
<br/><br/>
In real water bills, there are other amounts added to this cost, including certain taxes and fees.
<br/><br/><br/>
@blue
More Examples: Calculating<br/>Water Consumption Costs
@nblue
<br/>
@php1water-consumption@
<br/>
If you refresh this page, it will give new examples of how to calculate water consumption costs. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice calculating water consumption costs. 
"
?>




















