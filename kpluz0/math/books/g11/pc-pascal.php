<?php
$grd=$grd;
$title="Pascal's Triangle";
$img1="images/pascal-triangle.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="


Pascal's Triangle is a mathematical concept discovered by Blaise Pascal, a French mathematician, in the 17th century. It is a triangular arrangement of numbers in which the first and last numbers in each row are 1, 
and each of the other numbers is the sum of the two numbers above it in the previous row.
<br/><br/>
The triangle is formed by starting with the number 1 at the top and then placing the next row of numbers below it. Each number in the triangle is the sum of the two numbers immediately above it. The first few rows of Pascal's triangle look like this:
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/><br/>
As shown in the picture above, the first and last number in each row of Pascal's triangle is always 1, and the rest of the numbers are the sum of the two numbers above it. 
<br/><br/>$vio<u>
Binomial Coefficients
<br/><br/></u>$black
Binomial coefficients are numbers that represent the coefficients of the terms in the expansion of a binomial expression raised to a power. 
<br/><br/>
For example, the binomial expression (a + b)<sup>3</sup> in its expanded form would be:
<br/><br/>
$vio (a + b)<sup>3</sup> = a<sup>3</sup> + 3a<sup>2</sup>b + 3ab<sup>2</sup> + b<sup>3</sup>.$black
<br/><br/>
As can be seen above, the binomial coefficients of the expression (a + b)<sup>3</sup> are 1, 3, 3, 1, which are the numbers in the third row of Pascal's triangle.
This shows that Pascal's triangle contains all the binomial coefficients for any binomial expression raised to a certain power.
<br/><br/>
In the context of combinations, binomial coefficients represent the number of ways to choose k objects from a set of n distinct objects, without regard to the order in which they are chosen. The binomial coefficient is also known as a combination number.
<br/><br/>
The binomial coefficient is denoted by C(n, k), and is read as 'n choose k'. The formula for calculating the binomial coefficient is:
<br/><br/>
$vio C(n, k) = n!/(k! &times; (n - k)!)$black
<br/><br/>
where n! represents the factorial of n, k! represents the factorial of k, and (n - k)! represents the factorial of (n - k).
<br/><br/>
For example, C(5, 2) represents the number of ways to choose 2 objects from a set of 5 objects. Using the formula above, we can calculate C(5, 2) as:
<br/><br/>
$vio C(5, 2) = 5!/(2! &times; (5-2)!) = 120/12 = 10$black
<br/><br/>
Therefore, there are 10 ways to choose 2 objects from a set of 5 objects, without regard to the order in which they are chosen. These 10 combinations are: {1, 2}, {1, 3}, {1, 4}, {1, 5}, {2, 3}, {2, 4}, {2, 5}, {3, 4}, {3, 5}, and {4, 5}.
<br/><br/>
Note that Pascal's triangle can make working with combinations easier because the nth row of Pascal's triangle contains the binomial coefficients C(n, k) for k = 0, 1, 2, ..., n. 
<br/><br/>
Let's take the 7th row of Pascal's Triangle as an example to illustrate what this means.
According to the definition, the binomial coefficient C(n,k) for this row should be equal to:
<br/><br/>
C(7,0) = 1<br/>
C(7,1) = 7<br/>
C(7,2) = 21<br/>
C(7,3) = 35<br/>
C(7,4) = 35<br/>
C(7,5) = 21<br/>
C(7,6) = 7<br/>
C(7,7) = 1
<br/><br/>
We can verify that these values are correct by using the formula for binomial coefficients:
<br/><br/>
C(7,0) = 7!/((0!)(7-0)!) = 1<br/>
C(7,1) = 7!/((1!)(7-1)!) = 7<br/>
C(7,2) = 7!/((2!)(7-2)!) = 21<br/>
C(7,3) = 7!/((3!)(7-3)!) = 35<br/>
C(7,4) = 7!/((4!)(7-4)!) = 35<br/>
C(7,5) = 7!/((5!)(7-5)!) = 21<br/>
C(7,6) = 7!/((6!)(7-6)!) = 7<br/>
C(7,7) = 7!/((7!)(7-7)!) = 1
<br/><br/>
Recall that the concept of combination is also applicable to calculating the probability of events.
As such, Pascal's triangle can also be used to calculate the probability of an event occurring. 
<br/><br/>
The probability of an event happening is the number of ways the event can happen divided by the total number of possible outcomes. 
The binomial coefficient C(n, k) can be used to calculate the number of ways an event can happen, and the total number of possible outcomes is 2<sup>n</sup>.

";
?>
