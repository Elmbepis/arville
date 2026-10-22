<?php

$grd=$grd;
$title="World Time Zones";
$img1="images/times-12-24.jpg";
$img2="images/time-zones-map.jpg";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";

$article="
Earth spins on its axis, so different parts of the world are always at different times of the day. 
The time of the day depends on where you are on Earth.
<br/><br/>
In this lesson, we will learn how different countries around the world track time in a standard manner.
<br/><br/>
There are 24 hours in a day but we mainly use 12-hour clocks, so we sometimes need to say 'a.m.' or 'p.m.' when telling time.
<br/><br/>
Using 24-hour clocks lets us avoid these suffixes.
Before 1:00 p.m., 24-hour clocks indicate time like 12-hour clocks. 
<br/><br/>
Starting at 1:00 p.m., however, the hours indicated by a 24-hour clock's time is 12 hours more than that of a 12-hour clock's time.
<br/><br/>
Thus, 1:00 p.m. on a 12-hour clock is 13:00 on a 24-hour clock.
Below is a table that shows corresponding 12-hour and 24-hour times.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img1'>
</td></tr></table>
<br/>
To make it easier for people to keep track of time anywhere in the world, Earth was divided into 24 regions, called standard time zones.
Each of these time zones has its own time that's different from those of the others.
<br/><br/>
The standard time zones divide the Earth longitudinally, or along lines of longitude. 
Since a complete rotation of Earth is 360 degrees, the width of each time zone is approximately 15 degrees of longitude (that's 360 degrees &div; 24).
<br/><br/>
The time zone containing the prime meridian (zero degree longitude) is called the Greenwich Mean Time (GMT). 
Greenwich is a place in London, England.
<br/><br/>
The GMT is a time zone, not the time there.
The time in the GMT is called the Coordinated Universal Time (UTC).
<br/><br/>
The UTC is the standard time used around the world.
The local times in all other time zones are expressed in terms of the number of hours relative to the UTC.
<br/><br/>
The prime meridian divides the Earth into the Eastern and Western Hemispheres.
Since the Earth spins towards the east, the time in any place east of the GMT is ahead of the UTC.
On the other hand, the time in any place west of the GMT is behind the UTC.
<br/><br/>
In general, each time zone is one hour earlier than the zone immediately to its east, and one hour later than the zone immediately to its west.
<br/><br/>
<table align='center'><tr><td align='center'>
<img border='0' src='$img2'>
</td></tr></table>
<br/>
Some countries are so large that they cover several time zones. 
Russia, for example, stretches across 11 time zones. 
<br/><br/>
Opposite the prime meridian on the other side of the world (180 degrees longitude) is the International Date Line (IDL).
This imaginary zigzagging line separates each calendar day from the next.
<br/><br/>
The date becomes one day earlier if you cross the IDL from west to east.
The date becomes one day later if you cross the IDL from east to west.
<br/><br/><br/>
@blue
Calculating Time Differences<br/>Across Time Zones 
@nblue
<br/>
Let's now explore how to calculate time differences across time zones, using the UTC as reference.  
<br/><br/>
$vio<u>Time Zones East of Greenwich</u>$black
<br/><br/>
The time in any time zone east of the GMT is ahead of the UTC.
As such, it is expressed as the UTC plus the number of hours they are apart. 
<br/><br/>
The number of hours you need to add to the UTC depends on how far to the east the place is. 
You need to add one hour to the UTC for every time zone that the place is east of the GMT.
<br/><br/>
$red<u>Example # 1</u>$black
<br/><br/>
If it is 8:00 a.m. in London, what time is it in Cairo, Egypt?
<br/><br/>
We know that London is in the GMT.
Based on the table above, Cairo is 2 time zones east of London, so we need to add 2 hours to the UTC in order to get the time in Cairo.
<br/><br/>
Thus, it is UTC+02:00 or 10:00 a.m. in Cairo if it is 8:00 a.m. in London.
<br/><br/>
$vio<u>Time Zones West of Greenwich</u>$black
<br/><br/>
The time in any time zone west of the GMT is behind the UTC.
As such, it is expressed as the UTC minus the number of hours they are apart. 
<br/><br/>
You need to add one hour to the UTC for every time zone that the place is west of the GMT.
<br/><br/>
$red<u>Example # 2</u>$black
<br/><br/>
If it is 11:00 p.m. in London, what time is it in Lima, Peru?
<br/><br/>
Based on the map above, Lima is 5 time zones west of London, so we need to subtract 5 hours from the UTC in order to get the time in Lima.
<br/><br/>
Thus, it is UTC-05:00 or 6:00 p.m. in Lima if it is 11:00 p.m. in London.
<br/><br/>
Of course, you can use any time zone as reference to determine the time in another place. 
For example, we can use our local time in the Philippines as reference to determine the time in another country.
<br/><br/>
To get the time in a place east of the Philippines, we need to add an hour to our local time for each time zone the place is away from us. 
<br/><br/>
To get the time in a place west of the Philippines, we need to subtract an hour from our local time for each time zone the place is away from us.
<br/><br/>
Note that if the place is west of the GMT, this means subtracting from our local time the sum of 8 (because Philippine time is UTC+08:00) 
and the number of time zones the place is west of the GMT.
<br/><br/>
$red<u>Example # 3</u>$black
<br/><br/>
If it is 9:30 p.m. in the Philippines, what time is it in Honolulu, Hawaii?
<br/><br/>
Based on the table above, Honolulu is 10 time zones west of the GMT, so its time is UTC-10.
The sum of 8 and 10 is 18, so we need to subtract 18 hours from our time to get the time there.
<br/><br/>
Thus, if it is 9:30 p.m. here, the time in Honolulu is 21:30 - 18 hours.
That's 3:30 a.m.
<br/><br/>
By the way, it is important to remember that many countries observe daylight saving time (DST) during different periods. 
Observing DST means moving your clock forward by 1 hour in the spring and then back again in the fall.  
<br/><br/>
You must therefore know whether a place is observing DST or not to determine the actual time there.
<br/><br/>
Below are more examples of how to calculate time differences across time zones. 
<br/><br/><br/>
@blue
More Examples of How to<br/>Calculate Time Differences
@nblue
<br/>
@php1time-zones@
<br/>
If you refresh this page, it will give new examples of how to calculate time differences across time zones. 
You can therefore have as many examples as you want for this lesson! 
<br/><br/>
You can use this feature to practice calculating time differences across time zones. 
"
?>







