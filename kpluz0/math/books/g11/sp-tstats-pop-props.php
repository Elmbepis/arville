<?php
$grd=$grd;
$title="Test Statistics for<br/>Population Proportions";
$img1="images/pdf-normal.jpg";
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

Test statistics for population proportions are numerical values used in hypothesis testing to assess whether there is significant evidence to support or reject a claim or hypothesis about a population proportion.
<br/><br/>
A population proportion is a proportion of individuals or items in a population that possess a certain characteristic or behavior). These test statistics help determine whether the sample data provides enough evidence 
to draw conclusions about population proportions. 
<br/><br/><br/>
@blue
Steps for Applying<br/>Test Statistics for<br/>Population Proportions
@nblue
<br/><br/>
Below are the steps involved in applying test statistics for population proportions.
<br/><br/>$vio<u> 
1. Formulate hypotheses.
</u>$black
<br/><br/>$pink<i> 
1.1 Null hypothesis (H0)
</i>$black<br/><br/>
The null hypothesis typically states that there is no significant difference between the sample proportion (p&#770;) and the population proportion (&#960;). It often takes the form: H0: p&#770; = &#960;.
<br/><br/>$pink<i> 
1.2 Alternative hypothesis (Ha or H1)
</i>$black<br/><br/>
The alternative hypothesis contradicts the null hypothesis and asserts that there is a significant difference between the sample proportion and the population proportion. It can be one-tailed (indicating a directional difference) 
or two-tailed (indicating any difference), depending on the research question.
<br/><br/>$vio<u> 
2. Collect data.
</u>$black<br/><br/>
Gather relevant data through observations, surveys, or experiments.
Ensure that the data collection process is unbiased and representative of the population.
<br/><br/>$vio<u> 
3. Determine the significance level (&#945;).
</u>$black<br/><br/>
The significance level (&#945;) represents the probability of making a Type I error (rejecting a true null hypothesis). Common choices for &#945; include 0.05 (5%) and 0.01 (1%).
<br/><br/>$vio<u> 
4. Select a statistical test.
</u>$black<br/><br/>
Choose an appropriate statistical test for proportions based on the research question and type of data. Common tests include the z-test for proportions and the chi-squared test for proportions.
<br/><br/>$vio<u> 
5. Calculate the test statistic (z-score).
</u>$black<br/><br/>
Compute a test statistic based on the sample data. The formula for the test statistic depends on the chosen statistical test.
<br/><br/>
For a z-test (typically used when the sample size is large and the population standard deviation is known), the following formula applies:
<br/><br/>
$blue z = (p&#770; - &#960;) / &#8730;(&#960;(1-&#960;) / n) $black
<br/><br/>
where p&#770; is the sample proportion, &#960; is the population proportion, and n is the sample size.
<br/><br/>$vio<u> 
5. Find the critical region.
</u>$black<br/><br/>
Identify the critical region in the probability distribution (e.g., a critical value or critical region boundaries) that corresponds to the chosen significance level (&#945;). The critical region represents extreme values that would lead to the 
rejection of the null hypothesis.
<br/><br/>$vio<u> 
6. Compare the test statistic<br/>to the critical region.
</u>$black<br/><br/>
Compare the calculated test statistic to the critical region. If the test statistic falls in the critical region, you reject the null hypothesis in favor of the alternative hypothesis. 
If it falls outside the critical region, you fail to reject the null hypothesis.
<br/><br/>$vio<u> 
7. Draw a conclusion.
</u>$black<br/><br/>
Based on the comparison in step 7, draw a conclusion regarding the null hypothesis. If you reject it, you provide evidence in support of the alternative hypothesis. If you fail to reject it, you do not have sufficient evidence to support the alternative hypothesis.
<br/><br/>$vio<u> 
8. Interpret the results.
</u>$black<br/><br/>
Interpret the results in the context of the specific research question or problem. Explain the practical implications of your findings.
<br/><br/>
$red Example of Applying<br/>Test Statistics for<br/>Population Proportions$black
<br/><br/>
Imagine you work for a beverage company, and you want to determine if a new advertising campaign has had a significant impact on the proportion of people who prefer your brand of soda. The current population proportion of people who prefer your brand is 0.60 (60%), and you collect a sample of 200 individuals to assess the impact of the campaign.
<br/><br/>
$blue Solution:$black
<br/><br/>$vio<u> 
1. Formulate hypotheses.
</u>$black
<br/><br/>$pink<i> 
1.1 Null hypothesis (H0)
</i>$black<br/><br/>
The advertising campaign has not changed the proportion of people who prefer your brand of soda. H0: p&#770; = 0.60
<br/><br/>$pink<i> 
1.2 Alternative hypothesis (Ha or H1)
</i>$black<br/><br/>
The advertising campaign has changed the proportion of people who prefer your brand of soda. Ha: p&#770; &#8800; 0.60 (two-tailed test, indicating any difference).
<br/><br/>$vio<u> 
2. Collect data.
</u>$black<br/><br/>
Gather a random sample of 200 individuals and ask them whether they prefer your brand of soda.
<br/><br/>
Let's say that the number of people who prefer your brand is 130 out of the 200 people surveyed.
<br/><br/>$vio<u> 
3. Determine the significance level (&#945;).
</u>$black<br/><br/>
Choose a significance level, such as &#945; = 0.05 (5%), to control the Type I error rate.
<br/><br/>$vio<u> 
4. Select a statistical test.
</u>$black<br/><br/>
Since you have a large sample and the population proportion is known, you choose to conduct a z-test for proportions.
<br/><br/>$vio<u> 
5. Calculate the test statistic (z-score).
</u>$black<br/><br/>
Sample proportion (p&#770;) = 130 / 200 = 0.65
<br/><br/>
(z) = (p&#770; - &#960;) / &#8730;(&#960;(1-&#960;) / n) 
<br/><br/>
= (0.65 - 0.60) / &#8730;(0.60(1-0.60) / 200) 
<br/><br/>
&#8776; $blue 1.44$black
<br/><br/>$vio<u> 
5. Find the critical region.
</u>$black<br/><br/>
Using a significance level of &#945; = 0.05 for a two-tailed test, the critical values are approximately &plusmn;1.96 based on the z-distribution.
<br/><br/>$vio<u> 
6. Compare the test statistic<br/>to the critical region.
</u>$black<br/><br/>
The calculated z-score of 1.44 falls within the non-critical or acceptance region (-1.96 to +1.96).
<br/><br/>$vio<u> 
7. Draw a conclusion.
</u>$black<br/><br/>
Since the test statistic falls within the non-critical region, you fail to reject the null hypothesis. This means that there is not enough evidence to conclude that the advertising campaign has changed the proportion of people who prefer your brand of soda.
<br/><br/>$vio<u> 
8. Interpret the results.
</u>$black<br/><br/>
In practical terms, you do not have sufficient evidence to claim that the advertising campaign had a significant impact on people's soda preferences based on this sample. You may consider further research or adjustments to the campaign.

"
?>
