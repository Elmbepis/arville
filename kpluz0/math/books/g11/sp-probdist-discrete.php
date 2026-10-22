<?php
$grd=$grd;
$title="Probability Distri-<br/>bution of a Discrete<br/>Random Variable";
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

In probability theory and statistics, a random variable is a variable that can take on different values with certain probabilities. A random variable is considered \"discrete\" when it can only take on a countable or finite number of distinct values. 
For example, the number of heads obtained when flipping a fair coin is a discrete random variable because it can only take on the values 0 (no heads) or 1 (one head).
<br/><br/>
The probability distribution of a discrete random variable describes how the values of that variable are distributed or spread out, along with the probabilities associated with each possible value. It specifies the likelihood of each possible outcome occurring.
<br/><br/><br/>
@blue
Types of Discrete<br/>Probability Distributions
@nblue
<br/><br/>
Common examples of discrete probability distributions include the binomial distribution, Poisson distribution, and geometric distribution. These distributions are used to model various real-world scenarios where outcomes are discrete and random.
<br/><br/>$vio<u> 
1. Binomial Distribution
</u>$black<br/><br/>
The binomial distribution is a fundamental discrete probability distribution used to model the number of successes (often denoted as \"k\") in a fixed number of independent Bernoulli trials. 
<br/><br/>
A Bernoulli trial is a random experiment or process with two possible outcomes: success or failure. The outcomes are typically denoted as 1 for success and 0 for failure. 
<br/><br/>
In each trial, there are only two possible outcomes, typically labeled as \"success\" and \"failure,\" with associated probabilities of success (denoted as \"p\") and failure (denoted as \"q,\" where q = 1 - p). 
<br/><br/>
The binomial distribution is employed in scenarios where there is a known, fixed number of trials, and the goal is to calculate the probability of obtaining a specific number of successes. 
<br/><br/>
This distribution finds practical applications in various fields, such as modeling the number of heads in a series of coin tosses, predicting the number of defective items in a batch of products, or estimating the probability 
of a certain number of individuals in a population exhibiting a particular trait.
<br/><br/>$vio<u> 
2. Poisson Distribution
</u>$black<br/><br/>
The Poisson distribution is another important discrete probability distribution that is commonly used to model the number of events that occur in a fixed interval of time or space. It is characterized by a single parameter, usually denoted as \"&lambda;\" (lambda), 
which represents the average rate of event occurrences within the specified interval. 
<br/><br/>
The Poisson distribution is particularly useful when dealing with rare events and provides probabilities for various counts of events happening within the given interval. 
<br/><br/>
Practical applications of the Poisson distribution include modeling the number of customer arrivals at a store within a specific hour, predicting the number of phone calls at a call center during a particular minute, 
or estimating the number of accidents at an intersection in a day.
<br/><br/>$vio<u> 
3. Geometric Distribution
</u>$black<br/><br/>
The geometric distribution is a discrete probability distribution that deals with the number of trials required for the first success to occur in a sequence of independent Bernoulli trials (where each trial has only two possible outcomes, 
typically success and failure). The distribution is characterized by a single parameter, \"p,\" representing the probability of success on each trial. 
<br/><br/>
The geometric distribution is employed when you want to determine the probability of the first success happening on a specific trial. It is commonly used in various scenarios, such as modeling the number of attempts needed to score the first goal 
in a soccer match, estimating the number of questions answered before the first correct response in a quiz, or predicting the number of failed login attempts before a successful login in a security system.
<br/><br/><br/>
@blue
Probability Distribution<br/>Functions for Discrete<br/>Random Variables
@nblue
<br/><br/>
A probability distribution function for a discrete random variable describes the probabilities assigned to various values of that discrete variable.
<br/><br/>
There are two main types of probability distribution functions for discrete random variables: the probability mass function (PMF) and the cumulative distribution function (CDF).
<br/><br/><br/>
@blue
Probability Mass<br/>Function (PMF)
@nblue
<br/><br/>
The PMF gives the probability associated with each possible value of the discrete random variable. It is typically denoted as 
<br/><br/>
$blue P(X = x)$black
<br/><br/>
where X is the random variable, and x represents a specific value it can take. 
<br/><br/>
The PMF must satisfy the following two properties.
<br/><br/>
1) For any value x that a random variable X can take, the probability of X being equal to that specific value x falls within the range from 0 to 1, which is mathematically expressed for all x as follows:
<br/><br/>
$blue 0 &#8804; P(X = x) &#8804; 1$black 
<br/><br/>
2) The sum of the probabilities for all possible values of X must equal 1, which is mathematically expressed as follows: 
<br/><br/>
$blue &#931; P(X = x) = 1 $black
<br/><br/>
where the summation is taken over all possible values of X.
<br/><br/>$vio<u> 
Binomial Probability Formula
</u>$black<br/><br/>
The binomial probability formula is a mathematical expression used to calculate the probability of a specific number of successes (usually denoted as \"k\") occurring in a fixed number of independent and identical trials (usually denoted as \"n\") 
with only two possible outcomes in each trial (often referred to as \"success\" and \"failure\"). This formula is applicable to situations where you have a discrete random variable that follows a binomial distribution. 
<br/><br/>
Below is the binomial probability formula:
<br/><br/>
$blue P(X = k) = C(n, k) &times; p<sup>k</sup> &times; (1 - p)<sup>(n - k)</sup>$black
<br/><br/>
where:
<br/><br/>
P(X = k) represents the probability of getting exactly k successes in n trials, 
<br/><br/>
C(n, k) represents the binomial coefficient, which is the number of ways to choose k successes out of n trials, 
<br/><br/>
p is the probability of success in a single trial, and
<br/><br/>
(1 - p) is the probability of failure in a single trial.
<br/><br/>
Note that C(n, k) is often calculated as \"n choose k\" and is equal to n! / (k! &times; (n - k)!), where \"!\" denotes factorial,
<br/><br/>
$red Example # 1$black
<br/><br/>
Suppose you are teaching a math class, and you give your students a multiple-choice quiz with three questions. Each question has four possible answers (A, B, C, D), and each student randomly guesses without knowing the correct answers. 
You have a class of 20 students.
<br/><br/>
Question 1: Calculate the PMF for the random variable X, which represents the number of correct answers each student gets on the quiz.
<br/><br/>
Question 2: Verify that the PMF satisfies the two properties mentioned earlier.
<br/><br/>
$blue Solution:$black
<br/><br/>
$vio Question 1: $black
<br/><br/>
To calculate the PMF for X, we need to find the probability of each possible value of X (the number of correct answers each student gets).
<br/><br/>
P(X = 0): The probability that a student gets none of the answers correct.
<br/><br/>
P(X = 1): The probability that a student gets exactly one answer correct.
<br/><br/>
P(X = 2): The probability that a student gets exactly two answers correct.
<br/><br/>
P(X = 3): The probability that a student gets all three answers correct.
<br/><br/>
Let's calculate these probabilities:
<br/><br/>
P(X = 0): Each question has a 3/4 chance of being incorrect, so P(X = 0) = (3/4)<sup>3</sup> = $vio 27/64$black.
<br/><br/>
P(X = 1): There are three ways a student can get one question right and two wrong.
Using the binomial probability formula, which calculates the probability of exactly k successes in n trials, we have:
<br/><br/>
P(X = 1) = C(n, k) &times; p<sup>k</sup> &times; (1 - p)<sup>(n-k)</sup>
<br/><br/>
P(X = 1) = C(3, 1) &times; (1/4)<sup>1</sup> &times; (3/4)<sup>(3-1)</sup>
<br/><br/>
P(X = 1) = 3 &times; (1/4) &times; (9/16)
<br/><br/>
P(X = 1) = $vio 27/64$black
<br/><br/>
P(X = 2): Similarly, P(X = 2) = 3 &times; (1/4)<sup>2</sup> &times; (3/4) = $vio 9/64$black.
<br/><br/>
P(X = 3): P(X = 3) = (1/4)<sup>3</sup> = $vio 1/64$black.
<br/><br/>
$vio Question 2: $black
<br/><br/>
Now, let's verify that the PMF satisfies the two properties:
<br/><br/>
$pink Property 1:$black For any value x that X can take (0, 1, 2, 3), the probability of X being equal to that specific value x falls within the range from 0 to 1.
<br/><br/>
All of the probabilities computed above are between 0 and 1, so this property is satisfied. For example, P(X = 2) = 9/64, which is certainly a value between 0 and 1.
<br/><br/>
$pink Property 2:$black The sum of the probabilities for all possible values of X must equal 1.
<br/><br/>
We calculate P(X = 0) + P(X = 1) + P(X = 2) + P(X = 3) = (27/64) + (27/64) + (9/64) + (1/64) = 64/64 = $vio 1$black.
<br/><br/><br/>
@blue
Cumulative Distribution<br/>Function (CDF)
@nblue
<br/><br/>
The CDF of a discrete random variable gives the cumulative probability up to a certain value. It is often denoted as F(X = x) or simply F(x), and it is defined as the sum of the probabilities of 
all values less than or equal to x:
<br/><br/>
$blue F(x) = P(X &#8804; x)$black
<br/><br/>
Common examples of discrete probability distributions include the binomial distribution, Poisson distribution, and geometric distribution. These distributions are used to model various real-world scenarios where outcomes are discrete and random.

"
?>
