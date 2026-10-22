<?php

$grd=$grd;
$title="Finding Missing Terms<br/>in Number Sequences";
$red=$font."<font color='#BB0000'><b>";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
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
The terms in a number sequence follow a pattern. 
For example, in the sequence of even numbers, each term is greater than the one before it by 2. 
This is true for any term in that sequence.
<br/><br/>
Because the terms in a number sequence follow a pattern, we can predict their values. 
We can even find a missing term in a number sequence by looking at the terms before and after it. 
<br/><br/><br/>
@blue
Common Patterns<br/>in Number Sequences
@nblue
<br/>
To find a missing term in a number sequence, we need to discover the pattern that the terms follow.
Let's look at some common patterns used in number sequences.
<br/><br/>
$blue<u>Adding the Same Number</u>$black
<br/><br/>
Adding the same number to each term to get the next term is a very common pattern used in number sequences.
A number sequence that uses this pattern is called an arithmetic sequence.
<br/><br/>
For example, in the number sequence below, the number 3 is added to each term to get the next term:<br/>
$vio 4, 7, 10, 13, 16, 19, 22, 25, ...$black
<br/><br/>
Thus, we simply need to add 3 to 25 to find the next term.
The term after 25 is therefore 28. 
<br/><br/>
The number added to each term to get the next one is called the common difference.
In our example above, the common difference is 3.
<br/><br/>
$vio Example # 1$black
<br/><br/>
Find the missing term in this number sequence:<br/>
$vio 11, 16, 21, ___, 31, 36, 41, ...$black
<br/><br/>
By inspecting the differences between consecutive terms, we realize that the common difference is 5.
Thus, we simply need to add 5 to 21 to get the missing term.
The missing term is therefore 26.
<br/><br/>
This is the completed number sequence:<br/>
$vio 11, 16, 21, 26, 31, 36, 41, ...$black
<br/><br/>
$blue<u>Subtracting the Same Number</u>$black
<br/><br/>
Subtracting the same number from each term to get the next term is another common pattern used in number sequences.
A number sequence that uses this pattern is also an arithmetic sequence.
<br/><br/>
For example, in the number sequence below, the number 4 is subtracted from each term to get the next term:<br/>
$vio 85, 81, 77, 73, 69, 65, 61, 57, ...$black
<br/><br/>
Thus, we simply need to subtract 4 from 57 to find the next term.
The term after 57 is therefore 53. 
<br/><br/>
$vio Example # 2$black
<br/><br/>
Find the missing term in this number sequence:<br/>
$vio 78, 71, 64, ___, 50, 43, 36, ...$black
<br/><br/>
By inspecting the terms, we realize that each term is 7 less than the previous term.
Thus, we simply need to subtract 7 from 64 to get the missing term.
The missing term is therefore 57.
<br/><br/>
This is the completed number sequence:<br/>
$vio 78, 71, 64, 57, 50, 43, 36, ...$black
<br/><br/>
$blue<u>Multiplying by the Same Number</u>$black
<br/><br/>
Multiplying each term by the same number to get the next term is another common pattern used in number sequences.
A number sequence that uses this pattern is called a geometric sequence.
<br/><br/>
For example, in the number sequence below, each term is multiplied by 3 to get the next term:<br/>
$vio 2, 6, 18, 54, 162, 486, ...$black
<br/><br/>
Thus, we simply need to multiply 486 by 3 to find the next term.
The term after 486 is therefore 1458. 
<br/><br/>
The number by which each term is multiplied to get the next one is called the common ratio.
In our example above, the common difference is 3.
<br/><br/>
$vio Example # 3$black
<br/><br/>
Find the missing term in this number sequence:<br/>
$vio 7, 28, 112, ___, 1792, 7168, ...$black
<br/><br/>
By inspecting the consecutive terms, we realize that their common ratio is 4.
Thus, we simply need to multiply 112 by 4 to get the missing term.
The missing term is therefore 448.
<br/><br/>
This is the completed number sequence:<br/>
$vio 7, 28, 112, 448, 1792, 7168, ...$black
<br/><br/>
$blue<u>Dividing by the Same Number</u>$black
<br/><br/>
Dividing each term by the same number to get the next term is also used in number sequences.
A number sequence that uses this pattern is also a geometric sequence.
<br/><br/>
$vio Example # 4$black
<br/><br/>
Find the missing term in this number sequence:<br/>
$vio 8192, 2048, 512, ___, 32, 8, ...$black
<br/><br/>
By inspecting the consecutive terms, we realize that each term is divided by 4 to get the next term.
The common ratio is therefore 1/4.
<br/><br/>
Thus, we simply need to divide 512 by 4 to get the missing term.
The missing term is therefore 128.
<br/><br/>
This is the completed number sequence:<br/>
$vio 8192, 2048, 512, 128, 32, 8, ...$black
<br/><br/>
$blue<u>Adding an Increasing Number</u>$black
<br/><br/>
In an arithmetic series, we are adding the same number to each term.
However, we can also have a number sequence in which the numbers added to the terms are either increasing or decreasing.
<br/><br/>
For example, in the number sequence below, the difference between each pair of consecutive terms is increasing by 1:<br/>
$vio 1, 2, 4, 7, 11, 16, 22, ...$black
<br/><br/>
To see this, here are the differences between its consecutive terms:<br/>
2 - 1 = $vio 1$black<br/>
4 - 2 = $vio 2$black<br/>
7 - 4 = $vio 3$black<br/>
11 - 7 = $vio 4$black<br/>
16 - 11 = $vio 5$black<br/>
22 - 16 = $vio 6$black
<br/><br/>
Each difference is greater than the difference before it by 1. 
The difference between 22 and the next term must therefore be 7, because 6 + 1 = 7.
<br/><br/>
Thus, the term after 22 is 22 + 7 = 29. 
Here's our number sequence:<br/>
$vio 1, 2, 4, 7, 11, 16, 22, 29 ...$black
<br/><br/>
Below are more examples of how to find missing terms in number sequences. 
<br/><br/><br/>
@blue
More Examples of Finding Missing<br/>Terms in Number Sequences
@nblue
<br/>
@php1number-sequence-terms.php@
<br/>
If you refresh this page, it will give new examples of how to find missing terms in number sequences. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice finding missing terms in number sequences. 
";

?>




















