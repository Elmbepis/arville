<?php

$grd=$grd;
$title="Finding Terms in<br/>Number Sequences";
$red=$font."<font color='#BB0000'><b>";
$vio=$font."<font color='#800080'><b>";
$blue=$font."<font color='#0000CC'><b>";
$black=$font."<font color='#000000'></b>";

$article="
A number sequence is a set of numbers that are listed in a certain order.
For example, the list of even numbers (0, 2, 4, 6, 8, 10 ...) is a number sequence. 
<br/><br/>
Each number in a number sequence is called a term. 
A number sequence that goes on and on is called an infinite sequence.
<br/><br/>
An infinite sequence is written with three dots after its first few terms.
These dots mean that the sequence has an infinite number of terms, and therefore doesn't end. 
<br/><br/>
The terms in a number sequence follow a certain pattern. 
For example, in the sequence of even numbers, each term is greater than the previous term by 2. 
This is true for any term in that sequence.
<br/><br/>
Because the terms in a number sequence follow a pattern, we can predict their values. 
We can even find a missing term in a number sequence by looking at the terms before and after it. 
<br/><br/>
The pattern followed by terms in a number sequence may be expressed in the form of a formula.
For example, we can use the following formula to express the sequence of even numbers:
<br/><br/>
$vio nth term = 2n$black
<br/><br/>
Here, n is the ordinal position of the term in the sequence and the nth term is the value of the term itself. 
Let's apply this formula to get the first five terms of the sequence of even numbers:
<br/><br/>
n =$vio 1$black: 1st term = 2 x $vio 1 $black= 2<br/>
n =$vio 2$black: 2nd term = 2 x $vio 2 $black= 4<br/>
n =$vio 3$black: 3rd term = 2 x $vio 3 $black= 6<br/>
n =$vio 4$black: 4th term = 2 x $vio 4 $black= 8<br/>
n =$vio 5$black: 5th term = 2 x $vio 5 $black= 10
<br/><br/>
Since we know the formula for this number sequence, we can easily find by value of its 99th term this way:<br/>
99th term = 2 x $vio 99 $black= 198.
<br/><br/>
Finding the terms of a number sequence using a formula is easy.
However, finding the formula for a sequence could be quite challenging, even if you know its first few terms.
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
Find the next term in this number series:<br/>
4, 7, 10, 13, 16, ?
<br/><br/>
If your answer is 19, then you are correct. 
Each number in the sequence is greater than the previous one by 3. 
<br/><br/>
If the difference between any two consecutive terms in a sequence is always the same, then it is called a common difference.
The common difference in this example is 3.
<br/><br/>
A number sequence wherein consecutive terms have a common difference is called an arithmetic series. 
<br/><br/>
The formula for the nth term of an arithmetic series is:
<br/><br/>
$vio a<sub>n</sub> = a<sub>1</sub> + d x (n - 1)$black
<br/><br/>
where a<sub>n</sub> is the nth term, a<sub>1</sub> is the first term, d is the common difference, and n is the total number of terms.
<br/><br/>
This formula shows that the nth term is just the first term with the common difference added to it (n-1) times. 
Note that (n-1) is the total number of terms from the second term up to the nth term.  
<br/><br/>
To find the specific formula for a given sequence, we simply need to put the values of the first term and the common difference into the original formula. 
<br/><br/>
In our example, the first term is 4 and the common difference is 3, so the formula becomes:
<br/><br/>
a<sub>n</sub> = 4 + 3 x (n - 1)
<br/><br/>
We can further simplify this formula through these steps:<br/>
a<sub>n</sub> = 4 + 3n - 3<br/>
a<sub>n</sub> = 3n + (4 - 3)<br/>
a<sub>n</sub> = 3n + 1
<br/><br/>
Thus, for the number sequence in this example, the simplest formula for the nth term is:<br/>
$vio a<sub>n</sub> = 3n + 1$black
<br/><br/>
Now, if someone asks us to get the 50th term in this number sequence, we can find it by simply applying our formula:<br/>
50th term = 3 x 50 + 1 = $vio 151$black
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
Find the next term in this number series:<br/>
3, 6, 12, 24, 48, 96, ?
<br/><br/>
If your answer is 192, then you are correct. 
<br/><br/>
Inspecting the terms, we realize that each term is twice the term before it. 
The missing term is therefore 2 x 96 = $vio 192$black.
<br/><br/>
A number sequence wherein consecutive terms have a common ratio is called a geometric series. 
In this example, the common ratio is 2 because each term is twice the one before it.
<br/><br/>
The formula for the nth term of a geometric series is:
<br/><br/>
$vio a<sub>n</sub> = a<sub>1</sub> x r<sup>(n - 1)</sup>$black
<br/><br/>
where a<sub>n</sub> is the nth term, a<sub>1</sub> is the first term, r is the common ratio, and n is the total number of terms.
<br/><br/>
This formula shows that the nth term is just the first term multiplied by the common ratio (n-1) times. 
Note that (n-1) is the total number of terms from the second term up to the nth term.  
<br/><br/>
To find the specific formula for a given sequence, we simply need to put the values of the first term and the common ratio into the original formula. 
<br/><br/>
In our example, the first term is 3 and the common ratio is 2, so the formula becomes:
<br/><br/>
$vio a<sub>n</sub> = 3 x 2<sup>(n - 1)</sup>$black
<br/><br/>
Now, if someone asks us to get the 10th term in this number sequence, we can find it by simply applying our formula:<br/>
10th term = 3 x 2<sup>(10 - 1)</sup> = 3 x 2<sup>(9)</sup> = $vio 1536$black
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
Find the next term in this number series:<br/>
2, 5, 10, 17, 26, 37, ?
<br/><br/>
If your answer is 50, then you are correct. 
Finding the rule for this example is more difficult than the first two examples because both the difference and ratio between two consecutive terms are changing:
<br/><br/>
5 - 2 = $blue 3$black;&nbsp;&nbsp;5/2 = $blue 2.5$black<br/>
10 - 5 = $blue 5$black;&nbsp;&nbsp;10/5 = $blue 2$black<br/>
17 - 10 = $blue 7$black;&nbsp;&nbsp;17/10 = $blue 1.7$black<br/>
26 - 17 = $blue 9$black;&nbsp;&nbsp;26/17 = $blue 1.53$black<br/>
37 - 26 = $blue 11$black;&nbsp;&nbsp;37/26 = $blue 1.42$black
<br/><br/>
Inspecting the differences, we realize that they form a number sequence of consecutive odd numbers: 3, 5, 7, 9, 11. 
<br/><br/>
Since the odd number following 11 is 13, then we know that the missing term is greater than 37 by $blue 13$black. 
The missing term is therefore $vio 50$black.
<br/><br/>
But how do we translate this rule into a formula? 
Since the sequence has no common difference nor common ratio, we need to consider that $vio n$black is probably being raised to a power in the formula.
<br/><br/>
Let's inspect the first few terms more closely:
<br/><br/>
n =$vio 1$black: 1st term = 2 = $vio 1 $black<sup>2</sup> + 1<br/>
n =$vio 1$black: 1st term = 2 = $vio 1 $black<sup>2</sup> + 1<br/>
n =$vio 2$black: 2nd term = 5 = $vio 2 $black<sup>2</sup> + 1<br/>
n =$vio 3$black: 3rd term = 10 = $vio 3 $black<sup>2</sup> + 1<br/>
n =$vio 4$black: 4th term = 17 = $vio 4 $black<sup>2</sup> + 1<br/>
n =$vio 5$black: 5th term = 26 = $vio 5 $black<sup>2</sup> + 1<br/>
n =$vio 6$black: 6th term = 37 = $vio 6 $black<sup>2</sup> + 1
<br/><br/>
We now see that the formula for this example's number sequence is:<br/>
$vio nth term = n<sup>2</sup> + 1$black
<br/><br/>
If someone asks us to get the 50th term in this number sequence, we can find it by simply applying our formula:<br/>
50th term = 50 <sup>2</sup> + 1 = $vio 2501$black
<br/><br/>
Many number sequences do not have patterns that follow the rules and formulas shown in the examples above. 
You'd need to do some guesswork or trial and error in order to determine the rules or formulas governing such sequences.
<br/><br/>
Below are more examples of how to find terms in number sequences. 
<br/><br/><br/>
@blue
More Examples of Finding<br/>Terms in Number Sequences
@nblue
<br/>
@php1number-sequences.php@
<br/>
If you refresh this page, it will give new examples of how to find missing terms in number sequences. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice finding missing terms in number sequences. 
";

?>




















