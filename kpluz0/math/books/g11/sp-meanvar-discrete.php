<?php
$grd=$grd;
$title="Mean and Variance<br/>of a Discrete<br/>Random Variable";
$img1="images/bm-dec1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$pink=$font."<font color='#CC0066'>";

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

In the context of a discrete random variable, the mean and variance are two important statistical measures that provide information about the central tendency and the spread or variability of the variable's values, respectively. 
<br/><br/><br/>
@blue
Mean of a Discrete<br/>Random Variable
@nblue
<br/><br/>
The mean, also known as the expected value, represents the average value of a discrete random variable. It provides a measure of the central tendency of the variable.
The mean of a discrete random variable X is denoted as E(X) or &#956; (mu).
<br/><br/>
Mathematically, the mean is calculated as the weighted sum of all possible values of the random variable, each multiplied by its respective probability. In other words, it is the expected value of X.
<br/><br/>
The formula for the mean of a discrete random variable X is given by:
<br/><br/>
$vio E(X) = &#931; [x &times; P(X = x)] = &#931; xP(x)$black
<br/><br/>
where E(X) is the mean of X, x represents each possible value that X can take, P(X = x) is the probability associated with the value x, and &#931; denotes the summation over all possible values of X.
<br/><br/><br/>
@blue
Variance of a Discrete<br/>Random Variable
@nblue
<br/><br/>
The variance of a discrete random variable measures the spread or dispersion of its values around the mean. It quantifies how much individual values deviate from the expected value.
The variance of a discrete random variable X is denoted as Var(X) or &#963;<sup>2</sup> (sigma squared).
<br/><br/>
Mathematically, the variance is calculated as the expected value of the squared deviations of X from its mean. In other words, it is the average of the squared differences between each value of X and the mean, weighted by their respective probabilities.
<br/><br/>
The formula for the variance of a discrete random variable X is given by:
<br/><br/>
$vio Var(X) = E[(X - &#956;)<sup>2</sup>]$black
<br/><br/>
where Var(X) is the variance of X, E represents the expected value, X is the random variable, and &#956; is the mean of X.
<br/><br/>
$red Example$black
<br/><br/>
Suppose you are running a small ice cream shop, and you want to analyze the popularity of different ice cream flavors. 
You collect data on the number of customers who order each flavor during a busy Saturday afternoon. Let X represent the number of customers who order vanilla ice cream.
<br/><br/>
Here's the distribution of X and the corresponding probabilities:
<br/><br/>
P(X = 0) = 0.15 (15% of customers order no vanilla)
<br/><br/>
P(X = 1) = 0.35 (35% of customers order one scoop of vanilla)
<br/><br/>
P(X = 2) = 0.30 (30% of customers order two scoops of vanilla)
<br/><br/>
P(X = 3) = 0.15 (15% of customers order three scoops of vanilla)
<br/><br/>
P(X = 4) = 0.05 (5% of customers order four scoops of vanilla)
<br/><br/>
Calculate the mean and variance of the number of customers who order vanilla ice cream (E(X)).
<br/><br/>
$blue Solution:$black
<br/><br/>
We can calculate the mean (expected value) of the random variable X using the formula provided above as follows:
<br/><br/>
E(X) = &#931; [x &times; P(X = x)] = &#931; xP(x)
<br/><br/>
Let's calculate it step by step:
<br/><br/>
E(X) = (0 &times; 0.15) + (1 &times; 0.35) + (2 &times; 0.30) + (3 &times; 0.15) + (4 &times; 0.05)
<br/><br/>
E(X) = 0 + 0.35 + 0.60 + 0.45 + 0.20
<br/><br/>
E(X) = $vio 1.6$black
<br/><br/>
Thus, the mean number of customers who order vanilla ice cream (E(X)) is 1.6. This means that, on average, you can expect about 1.6 customers to order vanilla ice cream during a busy Saturday afternoon.
<br/><br/>
Var(X) = [(0 - 1.6)<sup>2</sup> &times; 0.15] + [(1 - 1.6)<sup>2</sup> &times; 0.35] + [(2 - 1.6)<sup>2</sup> &times; 0.30] + [(3 - 1.6)<sup>2</sup> &times; 0.15] + [(4 - 1.6)<sup>2</sup> &times; 0.05]
<br/><br/>
Var(X) = [(2.56 &times; 0.15) + (0.36 &times; 0.35) + (0.16 &times; 0.30) + (1.96 &times; 0.15) + (5.76 &times; 0.05)]
<br/><br/>
Var(X) = [0.384 + 0.126 + 0.048 + 0.294 + 0.288]
<br/><br/>
Var(X) = $vio 1.14$black
<br/><br/>
Thus, the variance of the number of customers who order vanilla ice cream (X) is approximately 1.14. This value represents the spread or dispersion of the data points around the mean and gives you a measure of 
how customer orders of vanilla ice cream vary on busy Saturday afternoons.

"
?>
