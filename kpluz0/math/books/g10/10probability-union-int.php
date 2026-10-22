<?php
$grd=$grd;
$title="Probability of a Union<br/>or Intersection of Events";
$img1="images/venn3.jpg";
$img2="images/venn4.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";
$article="

In the last lesson, we learned how to determine the probability of a simple event.
In this lesson, we will learn how to determine the probability of a union or intersection of two events.
<br/><br/>
By now, we all know that a Venn diagram is an illustration that uses circles to visually represent relationships between sets.
Since sample spaces and events are basically sets, we can also use Venn diagrams to represent their relationships with each other.
<br/><br/>
Before we proceed, let us first review how to use Venn diagrams to represent the union and intersection of sets.
<br/><br/>
$vio<u>Set Unions in a<br/>Venn Diagram</u>$black
<br/><br/>
Recall that the union of sets A and B consists of the elements of set A combined with the elements of set B.
<br/><br/>
In the Venn diagram, a union of sets is usually represented by shaded circles, with the combined elements placed inside the shaded areas, as shown below.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
In the example Venn diagram above,
<br/><br/>
A={1,2,4,5,7,8},<br/>
B={3,4,6,8,9,10}, and <br/>
A &cup; B= {1,2,4,5,7,8,3,6,9,10}.
<br/><br/>
$vio<u>Set Intersections<br/>in a Venn Diagram</u>$black
<br/><br/>
Recall that the intersection of two sets A and B consists of elements that belong to BOTH sets A and B.
<br/><br/>
In the Venn diagram, sets that intersect are represented by circles that overlap, with the common elements placed inside the overlapping area, as shown below.
The overlapping area is also often shaded.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
In the example Venn diagram above,
<br/><br/>
A={1,2,4,5,7,8},<br/>
B={3,4,6,8,9,10}, and <br/>
A &cap; B= {4,8}.
<br/><br/>
We can apply the same principles to events.
<br/><br/>
$vio<u>Union of Events</u>$black
<br/><br/>
The union of events A and B consists of the outcomes of event A combined with the outcomes of event B.
<br/><br/>
$vio<u>Intersection of Events</u>$black
<br/><br/>
The intersection of two events A and B consists of outcomes that belong to BOTH events A and B.
<br/><br/>
If two sets do not have any elements in common, then they are said to be disjoint.
If two events do not have any outcomes in common, then they are said to be mutually exclusive.
<br/><br/><br/>
@blue
Probability of a Union<br/>of Two Events
@nblue
<br/><br/>
The probability of the union of two events A and B, P(A &cup; B), is given by the following formula:
<br/><br/>
$vio P(A &cup; B) = P(A) + P(B) - P(A &cap; B)$black
<br/><br/>
Thus, the probability of the union of two events A and B equals the sum of the probabilities of events A and B minus the probability of the outcomes in the intersection of events A and B.
<br/><br/>
In the formula, P(A &cap; B) needs to be subtracted from P(A) + P(B) because the outcomes in this intersection were counted twice in the union of events A and B.
<br/><br/>
If two events are mutually exclusive, then:
<br/>
P(A &cup; B) = P(A) + P(B)
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
A die is rolled.  
Let A be the event of getting 1, 2, 3, or 4.
Let B be the event of getting 2, 4, or 6.
Find P(A &cup; B).
<br/><br/>
$blue Solution: $black
<br/><br/>
A = {1,2,3,4}: 4 outcomes
<br/><br/>
B = {2,4,6}: 3 outcomes
<br/><br/>
A &cap; B = {2,4}: 2 outcomes
<br/><br/>
S = {1,2,3,4,5,6}: 6 outcomes
<br/><br/>
P(A) = 4/6 = $vio 2/3$black
<br/><br/>
P(B) = 3/6 = $vio 1/2$black
<br/><br/>
P(A &cap; B) = 2/6 = $vio 1/3$black
<br/><br/>
P(A &cup; B) = P(A) + P(B) - P(A &cap; B) = 2/3 + 1/2 - 1/3 = $vio 5/6$black
<br/><br/><br/>
@blue
Probability of an<br/>Intersection of Two Events
@nblue
<br/><br/>
$vio<u>Independent Events</u>$black
<br/><br/>
Two events are independent if the outcome of one has no effect on the outcome of the other.
For example, tossing a coin and rolling a die are independent events.
<br/><br/>
If you draw a card from a deck and then put it back into the deck before drawing another card,
then both events are also independent.
<br/><br/>
If events A and B are independent, then:
$vio P(A &cap; B) = P(A) &#8901; P(B)$black
<br/><br/>
Thus, the probability of the intersection of two independent events A and B equals the product of the probability of A and the probability of B.
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
A jar contains 2 red marbles and 3 green ones.
One marble is picked at random and then put back into the jar.
Another marble is then picked from the jar, again at random.
Find the:
<br/><br/>
1. probability that the first marble is green
<br/><br/>
2. probability that both marbles are green
<br/><br/>
$blue Solution: $black
<br/><br/>
Let A be the event that the first marble is green.
Let B be the event that the second marble is green.
Let G be the event that a picked marble is green.
<br/><br/>
S = {red, red, green, green, green}: 5 outcomes
<br/><br/>
G = {green, green, green}: 3 outcomes
<br/><br/>
P(G) = 3/5
<br/><br/>
Since both A and B involves picking a green marble, then P(A) = P(B) = P(G) = 3/5
<br/><br/>
Since the first marble picked was returned to the jar before the second marble was picked, then A and B are independent.
<br/><br/>
Thus, P(A &cap; B) = P(A) &#8901; P(B) = 3/5 &#8901; 3/5 = $vio 9/25$black
<br/><br/>
$vio<u>Dependent Events</u>$black
<br/><br/>
Let's go back to our earlier example of drawing two cards from a deck.
Say, this time, that you didn't return the first card drawn to the deck before drawing a second one.
The second drawing now involves a different sample space (one that has a missing card).
<br/><br/>
In this case, the drawing of the second card is no longer independent of the drawing of the first card.
As such, they are said to be dependent events.
<br/><br/>
If A and B are dependent events, then:
$vio P(A &cap; B) = P(A) &#8901; P(B after A)$black
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
A jar contains 3 red marbles and 5 green ones.
One marble is picked at random but NOT put back into the jar.
Another marble is then picked from the jar, again at random.
Find the:
<br/><br/>
1. probability that the first marble is green
<br/><br/>
2. probability that both marbles are green
<br/><br/>
$blue Solution: $black
<br/><br/>
Let A be the event that the first marble is green.
Let B be the event that the second marble is green.
<br/><br/>
P(A) = 5/8
<br/><br/>
P(B after A) = 4/7 if the first marble is green or 5/7 if the first marble is red
<br/><br/>
Since A and B are clearly dependent events, and A involves picking a green marble, then:
<br/><br/>
P(A &cap; B) = P(A) &#8901; P(B after A) = 5/8 &#8901; 4/7 = $vio 5/14$black

"
?>
