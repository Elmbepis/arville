<?php
$grd=$grd;
$title="Computing<br/>Loan Amortizations";
$img1="images/aseries1.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000BB'>";
$red=$font."<font color='#BB0000'>";
$black=$font."<font color='#000000'>";

$article="

Loan amortization is the process of paying off a loan over time through a series of regular payments. Each payment consists of a portion of the principal amount borrowed, as well as interest accrued on the outstanding balance. 
The goal of loan amortization is to fully pay off the loan by the end of the repayment period.
<br/><br/>
Computing loan amortization involves several steps. The first step is to determine the principal amount borrowed, the interest rate, and the term of the loan, which is the length of time over which the loan will be repaid. 
Once these variables are known, the loan amortization schedule can be calculated.
<br/><br/>
The loan amortization schedule is a table that shows the breakdown of each payment, including the amount of interest and principal paid, as well as the remaining balance of the loan. 
The schedule is typically broken down by period, which can be monthly, quarterly, or annually.
<br/><br/>
To compute the loan amortization schedule, you need to use the loan amortization formula, which is as follows:
<br/><br/>
$vio A = P &times; (r &times; (1 + r)<sup>n</sup>) / ((1 + r)<sup>n</sup> - 1)$black
<br/><br/>
where 'A' is the regular payment amount, 'P' is the principal amount borrowed, 'r' = the interest rate per period, and 'n' is the total number of payments.
<br/><br/>
Once you have calculated the regular payment amount, you can use it to determine the interest and principal portions of each payment.
<br/><br/>$red<u> 
Example
</u>$black<br/><br/>
Let's say you borrow $100,000 at an interest rate of 5% per year for a 20-year term. To calculate the regular monthly payment amount, we can modify the formula to reflect a monthly interest rate and a payment period in terms of months as follows:
<br/><br/>
A = P &times; ($blue r/12$black &times; (1 + $blue r/12$black)$blue <sup>12n</sup>$black) /<br/>((1 + $blue r/12$black)$blue <sup>12n</sup>$black - 1)
<br/><br/>
= $100,000 &times; (.004167 &times; (1.004167)<sup>240</sup>) /<br/>((1.004167)<sup>240</sup> - 1)
<br/><br/>
= $100,000 &times; (.004167 &times; 2.713) /<br/>(2.713 - 1)
<br/><br/>
= $100,000 &times; (.0113) / 1.713
<br/><br/>
= $vio 659.66$black
<br/><br/>
Thus, you need to make a monthly payment of $659.66 for 240 months to pay off a $100,000 loan with an interest rate of 5% per year.



"
?>
