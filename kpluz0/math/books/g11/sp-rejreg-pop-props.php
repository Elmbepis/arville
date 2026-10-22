<?php
$grd=$grd;
$title="Rejection Regions for<br/>Population Proportions";
$img1="images/rejection-regions2.jpg";
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

Rejection regions for population proportions are specific regions in the probability distribution of a test statistic where, if the calculated test statistic falls within these regions, you would reject the null hypothesis in hypothesis testing 
for population proportions. These regions play a critical role in determining whether there is significant evidence to support the alternative hypothesis.
<br/><br/><br/>
@blue
Steps to Determine<br/>Rejection Regions for<br/>Population Proportions
@nblue
<br/><br/>
Determining the rejection region is essential in hypothesis testing for proportions as it defines the boundaries beyond which you conclude that there is sufficient evidence to reject the null hypothesis in favor of the alternative hypothesis.
Below are the steps involved in determining rejection regions for population means.
<br/><br/>$vio<u> 
1. Choose a significance level.
</u>$black<br/><br/>
Choose a Significance Level (&#945;): The significance level, often denoted as &#945; (alpha), is the probability of making a Type I error (rejecting a true null hypothesis). Common choices for &#945; include 0.05 (5%) and 0.01 (1%). 
The choice of &#945; depends on the desired level of confidence and the research context.
<br/><br/>$vio<u> 
2. Select the type of test.
</u>$black<br/><br/>
Determine whether the hypothesis test is one-tailed (also known as directional) or two-tailed (non-directional). The type of test depends on the research question and the nature of the hypothesis.
<br/><br/>$pink<i> 
2.1 One-Tailed Test
</i>$black<br/><br/>
In a one-tailed test, you are interested in detecting an effect in a specific direction (e.g., testing if a new drug is more effective than an existing drug). The rejection region is concentrated in one tail of the distribution.
<br/><br/>$pink<i> 
2.2 Two-Tailed Test
</i>$black<br/><br/>
In a two-tailed test, you are interested in detecting any significant difference, whether it's in one direction or the other (e.g., testing if the proportion of defective products is different from a specified value). 
The rejection region is split between both tails of the distribution.
<br/><br/>$vio<u> 
3. Determine the critical values.
</u>$black<br/><br/>
Critical values are specific values in the probability distribution that separate the rejection region from the non-rejection region. The critical values depend on the chosen &#945; level and the distribution used for the hypothesis test.
The critical values are related to the expected proportion in the population and are used to identify extreme values of the sample proportion.
<br/><br/>$pink<i> 
3.1 Z-distribution
</i>$black<br/><br/>
If you are using the z-distribution (standard normal distribution), critical values can be found in standard normal distribution tables or calculated using statistical software. For a two-tailed test with &#945; = 0.05, the critical values 
are approximately &plusmn;1.96.
<br/><br/>$pink<i> 
3.2 Binomial distribution
</i>$black<br/><br/>
If you are conducting a hypothesis test for proportions using a binomial distribution, critical values are determined based on the binomial distribution function. These values depend on &#945; and the sample size.
<br/><br/>$vio<u> 
4. Mark or take note of<br/>the rejection region.
</u>$black<br/><br/>
Based on the chosen significance level (&#945;) and the type of test, mark or take note of the critical values on the probability distribution. For a one-tailed test, mark or note the critical value in the appropriate tail. 
For a two-tailed test, mark or note both critical values in both tails.
<br/><br/>
$vio<u> 
5. Compare the test statistic.
</u>$black<br/><br/>
After calculating the test statistic from your sample data (often based on the binomial distribution or normal approximation), compare it to the critical values marked in the rejection region. If your test statistic falls within the rejection region, 
you reject the null hypothesis. If it falls outside the rejection region, you fail to reject the null hypothesis.
<br/><br/><br/>
@blue
Example of Determining<br/>the Rejection Regions for<br/>a Population Proportion
@nblue
<br/><br/>
Suppose you are a quality control manager in a factory, and you want to test whether the proportion of defective products produced by a machine is different from a specified value of 0.10 (10%). 
You decide to conduct a hypothesis test at a significance level (&#945;) of 0.05.
<br/><br/>
$red Solution:$black
<br/><br/>
Let the hypotheses be as follows:
<br/><br/>
Null Hypothesis (H0):<br/>The proportion of defective products produced by the machine is equal to the specified value of 0.10 (10%).
<br/><br/>
Alternative Hypothesis (Ha):<br/>The proportion of defective products produced by the machine is different from the specified value of 0.10 (10%).
<br/><br/>$vio<u> 
1. Choose a significance level.
</u>$black<br/><br/>
In this case, you select &#945; = 0.05, which represents a 5% significance level.
<br/><br/>$vio<u> 
2. Select the type of test.
</u>$black<br/><br/>
Since you want to detect any significant difference from the specified value (two-tailed), you are conducting a two-tailed test.
<br/><br/>$vio<u> 
3. Determine the critical values.
</u>$black<br/><br/>
Using the z-distribution (standard normal distribution) for a two-tailed test with &#945; = 0.05, you need to find the critical values. These critical values can be found in standard normal distribution tables or calculated using statistical software.
For a two-tailed test with &#945; = 0.05, the critical values are approximately &plusmn;1.96.
<br/><br/>$vio<u> 
4. Mark or take note of<br/>the rejection region.
</u>$black<br/><br/>
On the standard normal distribution curve, mark or take note of both critical values, +1.96 and -1.96, on both tails of the distribution. These values define the boundaries of the rejection region.
<br/><br/>$vio<u> 
5. Compare the test statistic.
</u>$black<br/><br/>
Let's assume that the following data are obtained after collecting a sample of products and calculating the sample proportion of defective products: 
<br/><br/>
Sample proportion of defective products (p&#770;): 0.08 (8%)
<br/><br/>
Specified value (p0): 0.10 (10%)
<br/><br/>
Sample Size (n): 400 products
<br/><br/>
z = (p&#770; - p0) / &#8730;[p0(1-p0) / n]
<br/><br/>
= (0.08 - 0.10) / &#8730;[0.10(1-0.10) / 400]
<br/><br/>
= (-0.02) / &#8730;[0.09 / 400]
<br/><br/>
= $blue -1.33$black
<br/><br/>
<table align='left'><tr><td align='left'>
<img border='0' src='$img1'>
</td></tr></table>
<br clear='left'><br/>
Since the calculated z-score falls within the range of -1.96 to +1.96, it is not in the rejection region.
As such, the null hypothesis is not rejected, indicating that there is insufficient evidence to conclude that the proportion of defective products is different from the specified value of 10%.

"
?>
