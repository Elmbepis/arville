<?php 
require '../../pass-chk.php';
?>

<?php
$topic="";
$topic=$_GET['topic']; 
if ($topic==""){$topic="numbersdaysmonths";}
$stopic=$topic;
if ($stopic=="numbersdaysmonths"){$stopic="Words for Numbers, Days, and Months";}		
if ($stopic=="people"){$stopic="Words for People and Body Parts";}		
if ($stopic=="nature"){$stopic="Words for Living Things and Nature";}		
if ($stopic=="objects"){$stopic="Words of Objects";}		
if ($stopic=="verbsadjectives"){$stopic="Words for Verbs and Adjectives";}		
if ($stopic=="gr-exp"){$stopic="Phrases and Sentences";}		
if ($stopic=="others"){$stopic="Other Words";}		
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/css; charset=utf-8" />

<?php
echo "<title>Pronunciation of ".ucfirst($stopic)." in Mandarin - Mandarin in KPluz.com</title>";
?>
<script language="JavaScript">
<!--
function FP_swapImg() {//v1.0
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
}

function FP_preloadImgs() {//v1.0
 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
}

function FP_getObjectByID(id,o) {//v1.0
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}
// -->
</script>
</head>

<body background="../../images/bluetop-bg.jpg" onload="FP_preloadImgs(/*url*/'../images/header1c.jpg', /*url*/'../images/header1b.jpg', /*url*/'../images/header2c.jpg', /*url*/'../images/header2b.jpg', /*url*/'../images/header3c.jpg', /*url*/'../images/header3b.jpg', /*url*/'../images/header4c.jpg', /*url*/'../images/header4b.jpg', /*url*/'../images/header5c.jpg', /*url*/'../images/header5b.jpg', /*url*/'../images/header6c.jpg', /*url*/'../images/header6b.jpg')">

<div align="center">

<table width="1000"><tr><td height="100">
	<div align="center">
		<table border="0" width="900" cellspacing="0" cellpadding="0">
			<tr>
				<td width="193" height="100" valign="top">
				<a href="../man-t-menu.php">
				<img border="0" src="../../images/header-logo.jpg"></a></td>
				<td width="133" valign="top">
										<a href="/how-to-use-kpluz.php">
										<img border="0" id="img1" src="../../images/header1a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/header1b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/header1a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/header1c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/header1b.jpg')"></a></td>
				<td width="133" valign="top">
										<a href="/bluebars_student.php">
										<img border="0" id="img2" src="../../images/header2a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/header2b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/header2a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/header2c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/header2b.jpg')"></a></td>
				<td width="133" valign="top">
										<a href="/programs.php">
										<img border="0" id="img3" src="../../images/header3a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/header3b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/header3a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/header3c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/header3b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/community.php">
										<img border="0" id="img4" src="../../images/header4a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/header4b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/header4a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/header4c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/header4b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/contact.php">
										<img border="0" id="img5" src="../../images/header5a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../images/header5b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../images/header5a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'../../images/header5c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'../../images/header5b.jpg')"></a></td>
				<td width="134" valign="top">
										<a href="/logout.php">
										<img border="0" id="img6" src="../../images/header6a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../images/header6b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../images/header6a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img6',/*url*/'../../images/header6c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img6',/*url*/'../../images/header6b.jpg')"></a></td>
			</tr>
		</table>
	</div>
	</td></tr></table>
	
<?php
if (isset($_POST['level'])){$selected_radio = $_POST['level'];}
if(!isset($selected_radio)){$selected_radio = $_SESSION['level'];}
$_SESSION['level'] = $selected_radio;
	if ($selected_radio == 'Easy') 
		{
		$Easy_status = 'checked';
		}
	if ($selected_radio == 'Hard') 
		{
		$Hard_status = 'checked';
		}

//set parameters for different difficulty levels
if (empty($_POST['Submit1'])){
	If ($_SESSION['level']=="Easy"){
		$points=1;}
	If ($_SESSION['level']=="Hard"){
		$points=2;}
	$_SESSION['points'] = $points;
	}
?>

</div>

	<div align="center">
		<table border="0" width="800" cellspacing="0" cellpadding="0" id="table7">
			<tr>
				<td>
				<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table32">
					<tr>
						<td>
						<img border="0" src="../images/man-top.jpg" width="800" height="54"></td>
					</tr>
					<tr>
						<td>
						
<?php
if (isset($_POST['level'])){$selected_radio = $_POST['level'];}
if(!isset($selected_radio)){$selected_radio = $_SESSION['level'];}
$_SESSION['level'] = $selected_radio;
	if ($selected_radio == 'Easy') 
		{
		$Easy_status = 'checked';
		}
	if ($selected_radio == 'Hard') 
		{
		$Hard_status = 'checked';
		}

//set parameters for different difficulty levels
if (empty($_POST['Submit1'])){
	If ($_SESSION['level']=="Easy"){
		$points=1;}
	If ($_SESSION['level']=="Hard"){
		$points=2;}
	$_SESSION['points'] = $points;
	}
?>
						
						
						<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table33">
							<tr>
								<td width="63" valign="top" height="34" background="../images/testman01-left.jpg">
								&nbsp;</td>
								<td valign="top" width="676">
<?php

$action="t-man-to-eng-audio.php?topic=".$topic;
echo "<FORM name ='form1' method ='post' action ='$action'>";

$vio="<font face='Verdana' style='font-size: 14pt; font-weight: 700' color='#800080'>";
$red="<font face='Verdana' style='font-size: 14pt; font-weight: 700' color='#CC0066'>";
$blue="<font face='Verdana' style='font-size: 14pt; font-weight: 700' color='#0000CC'>";
$gray="<font face='Verdana' style='font-size: 14pt; font-weight: 500' color='#454545'>";
$vio2="<font face='Verdana' style='font-size: 16pt; font-weight: 700' color='#800080'>";
$red2="<font face='Verdana' style='font-size: 16pt; font-weight: 700' color='#CC0066'>";
$blue2="<font face='Verdana' style='font-size: 16pt; font-weight: 700' color='#0000CC'>";
$red3="<font face='Verdana' style='font-size: 16pt; font-weight: 700' color='#CC0066'>";
$blue3="<font face='Times New Roman' style='font-size: 22pt; font-weight: 500' color='#0000CC'>";
$black3="<font face='Verdana' style='font-size: 22pt; font-weight: 700' color='#222222'>";
$black4="<font face='Times New Roman' style='font-size: 22pt; font-weight: 500' color='#222222'>";

echo "<table align ='center'><tr><td align='center'>";
echo "<font face='Arial' style='font-size: 14pt; font-weight: 700' color='#CC0000'>";
echo "<br/><br/><br/>";
echo "<font face='Arial' style='font-size: 26pt; font-weight: 700' color='#CC0000'>";
$stopic=$topic;
if ($stopic=="numbersdaysmonths"){$stopic="Words<br/>for Numbers, Days,<br/>and Months";}		
if ($stopic=="people"){$stopic="Words<br/>for People and Body<br/>Parts";}		
if ($stopic=="nature"){$stopic="Words<br/>for Living Things and<br/>Nature";}		
if ($stopic=="objects"){$stopic="Words<br/>for Objects";}		
if ($stopic=="verbs"){$stopic="Words<br/>for Verbs";}		
if ($stopic=="adjectives"){$stopic="Words<br/>for Adjectives";}		
if ($stopic=="gr-exp"){$stopic="Phrases<br/>and Sentences";}		
if ($stopic=="others"){$stopic="<br/>Other Words";}		
echo "Pronunciation of ".ucfirst($stopic)." in Mandarin";
echo "<font face='Arial' style='font-size: 18pt; font-weight: 700' color='#CC0000'>";
echo "<br/><br/>";
echo "</td></tr></table>";

if (!isset($ansclicked) or isset($_POST['Submit2']))
{

$page=substr($_SERVER["PHP_SELF"],1);
if ($page != $_SESSION['curpage']){
$_SESSION['curpage']=$page;
$_SESSION['score']=	0;}
$_SESSION['pageload']="new";
 
if ($topic=="gr-exp"){
	$strans1=array(
		"Hello!=N&#464;h&#462;o!", 
		"How are you?=N&#464;h&#462;o ma?", 
		"Welcome!=Hu&#257;nyíng!", 
		"Thank you.=Xièxiè n&#464;.", 
		"Good evening.=W&#462;nshàng h&#462;o.", 
		"Good night.=W&#462;n'&#257;n.", 
		"Good afternoon.=Xiàw&#468; h&#462;o.", 
		"Good-bye.=Zài jiàn.", 
		"Congratulations!=G&#333;ngxi n&#464;!", 
		"Sorry.=Duìbùq&#464;.", 
		"Good morning.=Z&#462;oshàng h&#462;o.", 
		"Good luck!=Zhù n&#301; h&#259;oyùn!", 
		"Happy New Year!=X&#299;nnián kuàilè!",
		"Happy birthday!=Sh&#275;ngrì kuàilè!",
		"Okay (I agree).=H&#462;o de.",
		);
	$strans2=array(
		"Excuse me (to get attention).=Q&#464;ng wèn.",
		"See you later.=Huítóu jiàn.", 
		"See you tomorrow.=Míngti&#257;n jiàn.", 
		"Long time no see!=H&#462;oji&#468; bù jiàn!", 
		"How are you doing?=N&#464; z&#283;nmeyàng?", 
		"No problem.=Méi gu&#257;nxi.",
		"Have a good trip.=Y&#299;lù píng'&#257;n.",
		"I am fine, thanks.=W&#466; h&#283;n h&#462;o, xièxiè.", 
		"Glad to meet you.=Jiàn dào n&#464; h&#283;n g&#257;oxìng.", 
		"Take care.=Nín mànz&#335;u.", 
		);
	$strans3=$strans2;	
	}	
 
if ($topic=="declarative"){
	$strans1=array(
		"My name is ____.=W&#466; jiào ____.",
		"I am fine.=W&#466; h&#283;n h&#462;o.", 
		"I drink tea.=W&#466; h&#275; chá.", 
		"I drink coffee.=W&#466; h&#275; k&#257;f&#275;i.", 
		"I have a strawberry.=W&#466; y&#466;u y&#299;gè c&#462;oméi.",
		"I have a headache.=W&#466; tóuténg.",
		"He is good-looking.=T&#257; h&#283;n h&#462;okàn.",
		"He/She has a car.=T&#257; y&#466;u y&#299; liàng qìch&#275;.",
		"He/She has a dog.=T&#257; y&#466;u y&#299; tiáo g&#466;u.",
		"He/She has a house.=T&#257; y&#466;u y&#299; dòng fángzi.",
		"He/She has a little sister.=T&#257; y&#466;u y&#299;gè mèimei.",
		"She has a boyfriend.=T&#257; y&#466;u y&#299;gè nánpéngy&#466;u.",
		"Snow is white.=Xu&#283; shì báisè de.",
		"The cherry is red.=Y&#299;ngtáo shì hóngsè de.",
		"The dog is big.=Zhè tiáo g&#466;u h&#283;n dà.",
		"The house is small.=Zhè dòng fángzi h&#283;n xi&#462;o.",
		"The sky is blue.=Ti&#257;nk&#333;ng shì lán sè de.",
		"The grass is green.=C&#462;o shì l&#476;sè de.",
		"The sun is yellow.=Tàiyáng shì huángsè de.",
		);
	$strans2=array(
		"I do not understand.=W&#466; t&#299;ng bù d&#466;ng.", 
		"I have an apple and a mango.=W&#466; y&#466;u y&#299;gè pínggu&#466; hé y&#299;gè mánggu&#466;.",
		"I wish you success.=Zhù n&#464; chéng g&#333;ng.",
		"It is too hot today.=J&#299;nti&#257;n tài rè le.",
		"I want to buy bread.=W&#466; yào m&#462;i miànb&#257;o.",
		"He/She has an expensive car.=T&#257; y&#466;u y&#299; liàng h&#283;n guì de qìch&#275;.",
		"My computer is there.=W&#466; de diànn&#462;o zài nàl&#464;.",
		"He/She has a small house.=T&#257; y&#466;u y&#299; dòng xi&#462;o fángzi.",
		"He/She doesn't have an older brother.=T&#257; méiy&#466;u g&#275;g&#275;.",
		"We need bread and rice.=W&#466;men x&#363;yào miànb&#257;o hé dàm&#464;.",
		);
	$strans3=$strans2;	
	}	
	
if ($topic=="interrogative"){
	$strans1=array(
		"What is your name?=N&#464; jiào shénme míngzì?",
		"Are you coming?=Nínmen lái ma?",
		"Is there a doctor?=Y&#299;sh&#275;ng zài n&#462;l&#464;?",
		"Where are the glasses?=B&#333;lí b&#275;i zài n&#462;?",
		"Where are the tools?=G&#333;ngjù zài n&#462;?",
		"Where are the toys?=Wánjù zài n&#462;?",
 		"How much is it?=Du&#333;sh&#462;o qián?",
		);
	$strans2=array(
		"Do you have a hobby?=N&#464; y&#466;u shé me àihào ma?",
		"Do you have a menu?=Y&#466;u càid&#257;n ma?",
		"Do you drink coffee with sugar?=N&#464; h&#275; ji&#257;táng de k&#257;f&#275;i ma?",
		"Is he working right now?=T&#257; zhèngzài g&#333;ngzuò ma?",
		"What's keeping you busy?=N&#464; zài máng shénme?",
		"What color is the sun?=Tàiyáng shì shénme yánsè de?",
		"What color is the grass?=C&#462;o shì shénme yánsè de?",
		"Where is the tennis court?=W&#462;ng qiúch&#462;ng zài n&#462;l&#464;?",
		"Where is the supermarket?=N&#462; li y&#466;u ch&#257;oshì?",
		);
	$strans3=$strans2;	
	}	
	
if ($topic=="imperative"){
	$strans1=array(
		"Buy it.=Nín m&#462;i.",
		"Leave it.=Nín fàngxià.",
		"Say it.=Nín shu&#333;.",
		"Please forgive me.=Q&#464;ng yuánliàng.",
		"Please give me water.=Q&#464;ng g&#283;i w&#466; shu&#464;.",
		"Please sit down.=Q&#464;ng zuò.",
		"Please wait a moment.=Q&#464;ng sh&#257;o d&#283;ng.",
		);
	$strans2=array(
		"Don't be so lazy.=Bùnéng zhème l&#462;n.",
		"Don't come home so late.=Bùyào lái nàme w&#462;n.",
		"Don't drink so much.=Bùyào h&#275; zhème du&#333;.",
		"Don't drive so fast.=Bùyào k&#257;i zhème kuài.",
		"Don't laugh so loudly.=Bùyào zhème dàsh&#275;ng xiào.",
		"Don't sleep so late.=Bùyào shuì nàme ji&#468;.",
		"Don't speak so softly.=Bùyào zhème xi&#462;osh&#275;ng shu&#333;huà.",
		);
	$strans3=$strans2;	
	}	
		
if ($topic=="numbersdaysmonths"){
	$strans1=array(
		"**<u>NUMBERS</u>",
		"zero=líng", "one=y&#299;", "two=èr", "three=s&#257;n", "four=sì", "five=w&#468;", "six=liù", "seven=q&#299;", "eight=b&#257;", "nine=ji&#468;", "ten=shí­",
		"**<u>DAYS</u>",
		"Monday=X&#299;ngq&#299;y&#299;", "Tuesday=X&#299;ngq&#299;èr", "Wednesday=X&#299;ngq&#299;s&#257;n", "Thursday=X&#299;ngq&#299;sì", "Friday=X&#299;ngq&#299;w&#468;", 
		"Saturday=X&#299;ngq&#299;liù", "Sunday=X&#299;ngq&#299;ti&#257;n",);
	$strans2=array(
		"**<u>NUMBERS</u>",
		"twenty=èr shí", "one hundred=yì b&#462;i", 
		"**<u>MONTHS</u>",
		"January=Y&#299;yuè", "February=Èryuè", "March=S&#257;nyuè", "April=Sìyuè", "May=W&#468;yuè ", "June=Liùyuè", "July=Q&#299;yuè", 
		"August=B&#257;yuè", "September=Ji&#468;yuè", "October=Shíyuè", "November=Shíy&#299;yuè", "December=Shí'èryuè",
		);
	$strans3=$strans2;	
	}	

if ($topic=="people"){
	$strans1=array(
		"child=háizi", "classmate=tóngxué", "daughter=n&#474;'ér", "doctor=y&#299;sh&#275;ng",  "father=bàba", "friend=péngy&#466;u", "husband=zhàngf&#363;",  
		"man=nánrén", "mother=m&#257;ma", "nurse=hùshi", "older brother=g&#275;g&#275;", "older sister=ji&#283; jie", "son=érzi", 
		"student=xuésh&#275;ng", "teacher=l&#259;osh&#299;", "woman=n&#474;rén", "younger brother=dìdì", "younger sister=mèi mei",
		);
	$strans2=array(
		"architect=jiànzhúsh&#299;", "astronaut=tàik&#333;ngrén", "carpenter=mùjiàng", "cashier=sh&#333;uyín yuán", "chef=chúsh&#299;", "clown=xi&#462;och&#466;u", 
		"engineer=g&#333;ngchéngsh&#299;", "firefighter=xi&#257;ofángduìyuán", "lawyer=l&#476;sh&#299;", "neighbor=línj&#363;", "policeman=j&#464;ngchá", 
		);
	$strans3=$strans2;	
	}	

if ($topic=="bodyparts"){
	$strans1=array(
		"arm=sh&#466;ubì", "chest=xi&#333;ng", "ears=&#283;rdu&#466;", "eyes=y&#462;nj&#299;ng","face=li&#462;n", "feet=ji&#462;o", "hair=tóufa", "hand=sh&#466;u", 
		"head=tóu", "leg=tu&#464;","mouth=k&#466;u", "neck=bózi", "nose=bízi",  
		);
	$strans2=array(
		"finger=sh&#466;uzh&#464;", "fist=quántóu", "forehead=étóu",  "skin=píf&#363;", "toe=ji&#462;ozh&#464;", "tongue=shétou", "tooth=yách&#464;",
		);
	$strans3=$strans2;	
	}	

if ($topic=="animals"){
	$strans1=array(
		"ant=m&#462;y&#464;","bee=mìf&#275;ng", "butterfly=húdié", "cat=m&#257;o", "cow=m&#468;niú", "dog=g&#466;u", "duck=y&#257;", "fish=yú", 
		"frog=q&#299;ngw&#257;", "goat=sh&#257;nyáng", "horse=m&#462;", "lion=sh&#299;zi", "monkey=hóuzi", "pig=zh&#363;", "rat=l&#462;osh&#468;", 
		"sheep=miányáng", "snake=shé", "spider=zh&#299;zh&#363;", "tiger=h&#468;", "worm=rúchóng",
		);
	$strans2=array(
		"cockroach=zh&#257;ngláng", "crab=pángxiè", "dolphin=h&#462;itún", "dragonfly=q&#299;ngtíng", "eagle=l&#462;oy&#299;ng", "housefly=c&#257;ngyíng",
		"octopus=zh&#257;ngyú", "ostrich=tuóni&#462;o", "owl=m&#257;otóuy&#299;ng", "peacock=k&#466;ngquè", "seahorse=h&#462;im&#462;", "sea lion=h&#462;ish&#299;", 
		"shrimp=xi&#257;", "snail=w&#333;niú", "squid=w&#363;zéi", "starfish=h&#462;ix&#299;ng", "turkey=hu&#466; j&#299;", 
		);
	$strans3=$strans2;	
	}	

if ($topic=="plants"){
	$strans1=array(
		"apple=pínggu&#466;", "banana=xi&#257;ngji&#257;o", "cabbage=ju&#462;nx&#299;ncài", "eggplant=qiézi", "garlic=dàsuàn", "ginger=ji&#257;ng", 
		"grapes=pútáo", "mango=mánggu&#466;", "onion=yángc&#333;ng", "potato=t&#468;dòu", "tomato=x&#299;hóngshì", 
		);
	$strans2=array(
		"bitter melon=k&#468;gu&#257;", "broccoli=x&#299; lánhu&#257;", "carrot=húluóbo", "cauliflower=càihu&#257;", "celery=qíncài", "cherry=y&#299;ngtáo", 
		"cucumber=huánggu&#257;", "lemon=níngméng", "mushroom=móg&#363;", "pineapple=b&#333;luó", "pumpkin=nángu&#257;", "strawberry=c&#462;oméi", 
		"watermelon=x&#299;gu&#257;", 
		);
	$strans3=$strans2;	
	}	

if ($topic=="nature"){
	$strans1=array(
		"air=k&#333;ngqì", "cloud=yún", "flower=hu&#257;", "forest=s&#275;nlín", "fruit=shu&#464;gu&#466;", "grass=c&#462;o", "ice=b&#299;ng", "leaf=yè",  "moon=yuèliàng", 
		"root=g&#275;n", "sky=ti&#257;nk&#333;ng", "tail=w&#277;iba",  "sun=tàiyáng", "tree=shù", "vegetables=sh&#363;cài", "water=shu&#301;", "wind=f&#275;ng", 
		);
	$strans2=array(
		"autumn=qi&#363;ti&#257;n", "lightning=sh&#462;ndiàn", "rainbow=c&#462;ihóng", "snow=xu&#283;", "spring=ch&#363;nti&#257;n",  "summer=xiàti&#257;n", "thunder=léi", 
		"weather=ti&#257;nqì", "winter=d&#333;ngti&#257;n",
		);
	$strans3=$strans2;	
	}	

if ($topic=="objects"){
	$strans1=array(
		"bag=dài", "ball=qiú", "bed=chuáng", "boat=chuán", "book=sh&#363;", "bowl=w&#462;n", "car=qìch&#275;", "chair=y&#464;zi", "clothes=y&#299;fú", "cup=b&#275;i", 
		"door=mén", "fork=ch&#257;zi", "hat=màozi", "knife=d&#257;o", "pants=kùzi", "pencil=qi&#257;nb&#464;", "pen=gangb&#464;", "saw=jù z&#464;", 
		"shirt=chènsh&#257;n", "shoes=xié", "socks=wàzi", "spoon=sháozi", "table=zhu&#333;zi", "toy=wánjù", "umbrella=s&#462;n",
		);
	$strans2=array(
		"airplane=f&#275;ij&#299;", "bicycle=zìxíngch&#275;", "chopsticks=kuàizi", "computer=diànn&#462;o", "envelope=xìnf&#275;ng", "eraser=xiàngpíc&#257;", 
		"flashlight=sh&#466;udiànt&#466;ng", "gift=l&#464;wù",  "hammer=láng tóu", "magazine=zázhì", "motorcycle=mótu&#333;ch&#275;", "notebook=b&#464;jìb&#283;n", 
		"necktie=l&#464;ngdài", "newspaper=bàozh&#464;", "raincoat=y&#468;y&#299;", "screw driver=luós&#299;d&#257;o", "short pants=du&#462;nkù", "television=diànshì", 
		"tools=g&#333;ngjù", "towel=máoj&#299;n", "zipper=l&#257;liàn",
		);
	$strans3=$strans2;	
	}	
	
if ($topic=="adjectives"){
	$strans1=array(
		"beautiful=m&#283;i", "big=da", "black=h&#275;i", "blue=lán", "cold=l&#283;ng", "deep=sh&#275;n", "dirty=zàng", "far=yu&#462;n", "fast=kuai", "fat=pàng", 
		"good=h&#462;o", "green=l&#476;", "happy=g&#257;oxìng", "narrow=zh&#462;i", "near=jìn", "old=l&#462;o", "orange=chéng", "red=hóng", "sad=sh&#257;ngx&#299;n", 
		"short=&#462;i", "slow=màn", "small=xi&#462;o", "tall=g&#257;o", "ugly=ch&#466;u", "white=bái", "yellow=huáng",
		);
	$strans2=array(
		"abundant=f&#275;ngfù", "cheap=piányí", "delicious=h&#259;och&#299;", "expensive=guì", "grey=hu&#299;", "honest=chéngshí", "nervous=j&#301;nzh&#257;ng", 
		"pretty=k&#283;'ài", "purple=z&#301;", "quiet=&#257;njìng", "tired=lèi", "windy=gu&#257;f&#275;ng", "young=niánq&#299;ng", 
		);
	$strans3=$strans2;	
	}	
	
if ($topic=="verbs"){
	$strans1=array(
		"to ask=wèn", "to come=lái", "to draw=huà", "to eat=ch&#299;", "to give=g&#283;i", "to go=qù",	"to have=y&#335;u", "to learn=xuéxí", "to love=ài", 
		"to read=kànsh&#363;", "to say=shu&#333;", "to sleep=shuìjiào", "to tell=gàosù", "to walk=z&#335;u",
		);
	$strans2=array(
		"to buy=m&#462;i", "to dance=tiàow&#468;", "to drink=h&#275;", "to earn=zhuàn", "to fear=hàipà", "to feel=juéde", "to hear=t&#299;ngjiàn", "to jump=tiào", 
		"to laugh=xiào", "to receive=ji&#275;shòu", "to study=xué", "to swim=yóuy&#466;ng", "to teach=jiào", "to work=g&#333;ngzuò", 
		);
	$strans3=$strans2;	
	}	

if ($topic=="others"){
	$strans1=array(
		"I=w&#335;", "you=n&#301;", "birthday=sh&#275;ngrì", "bread=miànb&#257;o", "butter=huángyóu", "chocolate=qi&#462;okèlì", "city=chéngshì", "country=guóji&#257;",
		"coffee=k&#257;f&#275;i", "egg=j&#299;dàn", "family=ji&#257;tíng", "garden=hu&#257;yuán", "milk=niún&#462;i", "money=qián", "music=y&#299;nyuè", "night=yè", 
		"please=q&#464;ng", "room=fángji&#257;n", "school=xuéxiào", "story=gùshi", "sugar=táng", "tea=chá",  "wine=pútáoji&#468;",
		//question words
		"what=shénme", "how much=du&#333;sh&#259;o",
		//adverbs and prepositions  
		"always=z&#335;ngshì", "here=zhèl&#464;", "now=xiànzài", "sometimes=y&#466;ushí", "there=nàli", "today=j&#299;nti&#257;n", "tomorrow=míngti&#257;n", 
		"yesterday=zuóti&#257;n",
		);
	$strans2=array(
		"bank=yínháng", "cloudy day=y&#299;n ti&#257;n", "English=y&#299;ngy&#365;", "factory=g&#333;ngch&#462;ng", "life=sh&#275;nghuó", "menu=càid&#257;n", "minute=f&#275;n", 
		"opportunity=j&#299;huì", "problem=wèntí", "rainy day=y&#468;ti&#257;n", "rectangle=chángf&#257;ngxíng", "restaurant=fàngu&#259;n", "square=zhèngf&#257;ngxíng", 
		"stairs=lóut&#299;", "suddenly=túrán", "sunny day=qíngti&#257;n", "temperature=w&#275;ndù", "together=y&#299;q&#464;", "toilet=cèsu&#335;", "triangle=s&#257;nji&#462;oxíng", 
		//adverbs and prepositions  
		"behind=hòumiàn", "below=xiàmiàn", "beside=pángbi&#257;n", "inside=l&#464;miàn", "outside=wàimiàn", 
		);
	$strans3=$strans2;	
	}	

	
if ($_SESSION['level']=="Easy"){$strans=$strans1;}
else{$strans=$strans2;}


echo "<table border='0' width='80%' cellspacing='0' cellpadding='0' align='center'><tr><td align='center'>";
$count=count($strans)-1;
for ($i=0; $i<=$count; $i+=1){
	$word=$strans[$i];
	if (substr($word,0,2)=="**"){
		$hword=substr($word,2);
		$wfont="<font face='Verdana' style='font-size: 17pt; font-weight: 600' color='#0000CC'>";
		if (strlen($hword)<12){$blankimg="../images/theader1.jpg";$cw=219;}
		else{$blankimg="../images/theader2.jpg";$cw=286;}
		echo "<table align='center' width='$cw' height='80'><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td background='$blankimg' width='$cw' height='80' align='center'>";
		echo $wfont.$hword;
		echo "</td></tr></table>";
		}
	else{
		$pos=strpos($word,"=");
		$eng=substr($word,0,$pos);
		$man=substr($word,($pos+1));
		echo "<table align='center'><tr><td align='center'  style='padding-bottom: 10px;'>";
		if ($topic=="gr-exp"){echo "<font face='Times New Roman' style='font-size: 20pt; font-weight: 500' color='#222222'><br/>";}
		else {echo "<font face='Times New Roman' style='font-size: 24pt; font-weight: 500' color='#222222'><br/>";}
		echo $man." - ".$eng."</td></tr><tr><td align='center'>";
		$audio=str_replace(" ","-",$eng);
		$audio=str_replace("<br/>","-",$audio);
		$audio=str_replace("He/She","he-she",$audio);
		$audio=str_replace(".","",$audio);
		$audio=str_replace("?","",$audio);
		$audio=str_replace("!","",$audio);
		$audio=str_replace("(","",$audio);
		$audio=str_replace(")","",$audio);
		$audio=str_replace("_","",$audio);
		$audio=str_replace("'","",$audio);
		$audio=str_replace(",","",$audio);
		$audio1="../sounds/".strtolower($audio).".mp3";
		$audio2="../sounds/".strtolower($audio).".wav";
		echo "<audio controls='controls' controls preload='auto'>";
		echo "<source src='$audio1' type='audio/mpeg'>";
		echo "<source src='$audio2' type='audio/wav'>";
		echo "</audio>";
		echo "</td></tr><tr><td>&nbsp;</td></tr></table>";	
		}
	}
echo "</td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr></table>";	


}

echo "</font>";

echo "</font>";

?>	
												
												
												<div align="center">
													<p style="margin-top: 5px; margin-bottom: 0">
													&nbsp;</p>
													<p style="margin-top: 5px; margin-bottom: 0">
													<font face="Verdana" style="font-size: 10pt; " color="#000080">
													Select difficulty level for 
													next tutorial:</font></p>
												<table border="0" width="68%" cellspacing="0" cellpadding="0" id="table38">
													<tr>
														<td align="center">														
														<p style="margin-bottom: 4px">														
														<font face="Verdana">
														<span style="font-size: 9pt">
														<font color="#800080">														
														<Input type = 'Radio' Name ='level' value= 'Easy' style="font-weight: 700"
														<?PHP if (isset($Easy_status)){print $Easy_status;} ?>>
														<b>&nbsp;Easy														
														</b></font></span>
														</font>														
														</td>
														
														<td align="center">														
														<p style="margin-bottom: 4px">														
														<font face="Verdana">
														<span style="font-size: 9pt">
														<font color="#800080">														
														<Input type = 'Radio' Name ='level' value= 'Hard' style="font-weight: 700"
														<?PHP if (isset($Hard_status)){print $Hard_status;} ?> 
														><b>&nbsp;Hard
														</b></font></span>
														</font>
														</td>
													</tr>
												</table>
													<p style="margin-bottom: 4px">
													&nbsp;</div>
												
	<?php echo "<br/><P align='center'><Input type = 'Submit' Name = 'Submit2' VALUE = 'Regenerate Tutorial'><br/><br/><br/><br/><br/><br/>";?>

	</td>
	
	
	

	
	
	
	
								<td width="63" valign="top" height="34" background="../images/testman01-right.jpg">
								&nbsp;</td>
							</tr>
														
							
							
							</table>
						</td>
					</tr>
				</table>
				</td>
			</tr>
			
			
			<tr>
				<td bgcolor="#0086CE">
			<p align="center" style="margin-top: 5px; margin-bottom: 5px">
            <font style="font-size: 10pt"><span style="mso-spacerun: yes">
			<font face="Arial" color="#FFFFFF">
            Copyright&nbsp; 2010
        </font><b><font face="Arial" color="#365669">
        	<a href="/home-filipino.php"><font color="#FFFFFF">KPluz.com</font></a></font></b><font face="Arial" color="#FFFFFF">. 
			All Rights Reserved.</font></span></font></p>
				</td>
			</tr>
			</table>
	</div>
</div>

</body>

</html>