<?php 
require '../../pass-chk.php';
?>

<?php
$topic="";
$topic=$_GET['topic']; 
if ($topic==""){$topic="numbers";}
$stopic=$topic;
if ($stopic=="nature"){$stopic="Nature Words";}		
if ($stopic=="body-parts"){$stopic="Body Parts";}		
if ($stopic=="fruitsandveggies"){$stopic="Fruits and Vegetables<br/>";}		
if ($stopic=="daysandmonths"){$stopic="Days and Months";}		
if ($stopic=="others"){$stopic="Other Words";}		
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/css; charset=utf-8" />

<?php
echo "<title>Translating Mandarin Words for ".ucfirst($stopic)." into English - Mandarin in KPluz.com</title>";
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

$action="t-man-to-eng-words.php?topic=".$topic;
echo "<FORM name ='form1' method ='post' action ='$action'>";

$vio="<font face='Verdana' style='font-size: 14pt; font-weight: 700' color='#800080'>";
$red="<font face='Verdana' style='font-size: 14pt; font-weight: 700' color='#CC0066'>";
$blue="<font face='Verdana' style='font-size: 14pt; font-weight: 700' color='#0000CC'>";
$gray="<font face='Verdana' style='font-size: 14pt; font-weight: 500' color='#454545'>";
$vio2="<font face='Verdana' style='font-size: 16pt; font-weight: 700' color='#800080'>";
$red2="<font face='Verdana' style='font-size: 16pt; font-weight: 700' color='#CC0066'>";
$blue2="<font face='Verdana' style='font-size: 16pt; font-weight: 700' color='#0000CC'>";
$red3="<font face='Verdana' style='font-size: 16pt; font-weight: 700' color='#CC0066'>";
$blue3="<font face='Verdana' style='font-size: 18pt; font-weight: 700' color='#0000CC'>";
$black3="<font face='Verdana' style='font-size: 22pt; font-weight: 700' color='#222222'>";

if (!isset($ansclicked) or isset($_POST['Submit2']))
{

$page=substr($_SERVER["PHP_SELF"],1);

if (isset($_SESSION['curpage'])){
	if ($page != $_SESSION['curpage']){
	$_SESSION['curpage']=$page;
	$_SESSION['score']=	0;}
	}
$_SESSION['pageload']="new";
 
 
if ($topic=="numbers"){
	$trans1=array("zero=líng", "one=y&#299;", "two=èr", "three=s&#257;n", "four=sì", "five=w&#468;","six=liù", "seven=q&#299;", "eight=b&#257;", "nine=ji&#468;", "ten=shí­");
	$trans2=array("eleven=shí y&#299;", "twelve=shí èr", "thirteen=shí s&#257;n", "fourteen=shí sì ", "fifteen=shí ­w&#468;", "sixteen=shí liù", 
		"seventeen=shí q&#299;", "eighteen=shí b&#257;", "nineteen=shí ji&#468;", "twenty=èr shí", "thirty=s&#257;n shí­", "forty=sì shí­", "fifty=w&#468; shí­", 
		"sixty=liù shí­", "seventy=q&#299; shí­", "eighty=b&#257; shí­", "ninety=ji&#468; shí­", "one hundred=yì b&#462;i"
		);
	$trans3=$trans2;	
	}	

if ($topic=="objects"){
	$trans1=array("bag=dài", "ball=qiú", "bed=chuáng", "belt=y&#257;odài", "bicycle=zìxíngch&#275;", "board=b&#462;n", "boat=chuán", "book=sh&#363;", "bowl=w&#462;n", 
		"car=qìch&#275;", "chair=y&#301;zi", "clothes=y&#299;fú", "clock=bù", "cup=b&#275;i", "door=mén", "fork=ch&#257;zi", "hat=màozi", "knife=d&#257;o", 
		"motorcycle=mótu&#333;ch&#275;", "pants=kùzi", "pencil=qi&#257;nb&#464;", "shirt=chènsh&#257;n", "shoes=xié", "socks=wàzi", "spoon=sháozi", "table=zhu&#333;zi", 
		"train=hu&#466;ch&#275;", "umbrella=s&#462;n",
		);
	$trans2=array("airplane=f&#275;ij&#299;", "blackboard=h&#275;ib&#462;n", "cart=gòuwùch&#275;", "cellphone=sh&#466;uj&#299;", "chalk=f&#283;nb&#464;", "chopsticks=kuàizi", 
		"envelope=xìnf&#275;ng", "eraser=xiàngpíc&#257;", "gate=dàmén", "gift=l&#464;wù", "magazine=zázhì", "necktie=l&#464;ngdài", "newspaper=bàozh&#464;", 
		"raincoat=y&#468;y&#299;", "screw driver=luós&#299;d&#257;o", "short pants=du&#462;nkù", "television=diànshì", "towel=máoj&#299;n", "violin=xi&#462;otíqín", 
		"zipper=l&#257;liàn",
		);
	$trans3=$trans2;	
	}	

if ($topic=="animals"){
	$trans1=array("ant=m&#462;y&#464;", "bear=chéngd&#257;n", "bee=mìf&#275;ng", "bird=ni&#462;o", "butterfly=húdié", "cat=m&#257;o", "chicken=j&#299;", "cow=m&#468;niú", 
		"dog=g&#466;u", "fish=yú", "goat=sh&#257;nyáng", "horse=m&#462;", "lion=sh&#299;zi", "lizard=x&#299;yì", "monkey=hóuzi", "pig=zh&#363;", "rabbit=tùz&#464;", 
		"rat=l&#462;osh&#468;", "snake=shé", "spider=zh&#299;zh&#363;", "tiger=h&#468;", "worm=rúchóng",
		);
	$trans2=array("cockroach=zh&#257;ngláng", "crab=pángxiè", "dragonfly=q&#299;ngtíng", "eagle=l&#462;oy&#299;ng", "elephant=dàxiàng", "giraffe=chángj&#464;nglù", 
		"housefly=c&#257;ngyíng", "octopus=zh&#257;ngyú", "ostrich=tuóni&#462;o", "owl=m&#257;otóuy&#299;ng", "peacock=k&#466;ngquè", "rooster=g&#333;ngj&#299;", 
		"seahorse=h&#462;im&#462;", "sea lion=h&#462;ish&#299;", "shrimp=xi&#257;", "snail=w&#333;niú", "squid=w&#363;zéi", "starfish=h&#462;ix&#299;ng", 
		"turkey=hu&#466; j&#299;",
		);
	$trans3=$trans2;	
	}	

if ($topic=="people"){
	$trans1=array("boy=nánhái", "child=háizi", "daughter=n&#474;'ér", "dentist=yáy&#299;", "doctor=y&#299;sh&#275;ng", "family=ji&#257;tíng", "father=bàba", 
		"friend=péngy&#466;u", "girl=n&#474;hái", "husband=zhàngf&#363;", "man=nánrén", "mother=m&#257;ma", "nurse=hùshi", "older brother=g&#275;g&#275;", "older sister=ji&#283; jie", 
		"son=érzi", "student=xuésh&#275;ng", "teacher=l&#259;osh&#299;", "wife=q&#299;zi", "woman=n&#474;rén", "younger brother=dìdì", "younger sister=mèi mei",);
	$trans2=array("architect=jiànzhúsh&#299;", "astronaut=tàik&#333;ngrén", "boss=l&#462;ob&#462;n", "businessman=sh&#257;ngrén", "carpenter=mùjiàng", "cashier=sh&#333;uyín yuán", 
		"chef=chúsh&#299;", "classmate=tóngxué", "clown=xi&#462;och&#466;u", "engineer=g&#333;ngchéngsh&#299;", "firefighter=xi&#257;ofángduìyuán", 
		"girlfriend=n&#474;y&#466;u", "lawyer=l&#476;sh&#299;", "neighbor=línj&#363;", "policeman=j&#464;ngchá", "student=xuésh&#275;ng");
	$trans3=$trans2;	
	}	

if ($topic=="body-parts"){
	$trans1=array("arm=sh&#466;ubì", "chest=xi&#333;ng", "ears=&#283;rdu&#466;", "eyes=y&#462;nj&#299;ng", "face=li&#462;n", "feet=ji&#462;o", "hair=tóufa", "hand=sh&#466;u", 
		"head=tóu", "leg=tu&#464;", "mouth=k&#466;u", "neck=bózi", "nose=bízi",  );
	$trans2=array("elbow=zh&#466;u", "eyebrow=y&#462;nméi", "finger=sh&#466;uzh&#464;", "fist=quántóu", "forehead=étóu", "knee=x&#299;", "shoulder=ji&#257;nb&#462;ng", 
		"skin=píf&#363;", "toe=ji&#462;ozh&#464;", "tongue=shétou", "tooth=yách&#464;", "wrist=sh&#466;uwàn",  );
	$trans3=$trans2;	
	}	

if ($topic=="nature"){
	$trans1=array("air=k&#333;ngqì", "animal=dòngwù", "cloud=yún", "flower=hu&#257;", "fruit=shu&#464;gu&#466;", "forest=s&#275;nlín", "grass=c&#462;o", "leaf=yè", 
		"moon=yuèliàng", "mountain=sh&#257;n", "river=hé", "root=g&#275;n", "sun=tàiyáng", "tree=shù", "vegetables=sh&#363;cài", "water=shu&#301;", "weather=ti&#257;nqì", 
		"wind=f&#275;ng",
		);
	$trans2=array("autumn=qi&#363;ti&#257;n", "feather=y&#468;", "lightning=sh&#462;ndiàn", "mushroom=móg&#363;", "plateau=g&#257;oyuán", "rainbow=c&#462;ihóng", 
		"spring=ch&#363;nti&#257;n", "summer=xiàti&#257;n", "tail=w&#277;iba", "thunder=léi", "volcano=hu&#466;sh&#257;n", "winter=d&#333;ngti&#257;n",
		);
	$trans3=$trans2;	
	}	

if ($topic=="fruitsandveggies"){
	$trans1=array("apple=pínggu&#466;","banana=xi&#257;ngji&#257;o", "cabbage=ju&#462;nx&#299;ncài", "carrot=húluóbo", "corn=yùm&#464;", "eggplant=qiézi", "garlic=dàsuàn", 
		"ginger=ji&#257;ng", "grapes=pútáo", "onion=yángc&#333;ng", "orange=júzi", "potato=t&#468;dòu", "tomato=f&#257;nqié", 
		);
	$trans2=array("avocado=èlí", "blueberry=lánméi", "broccoli=x&#299; lánhu&#257;", "cauliflower=càihu&#257;", "celery=qíncài", "cherry=y&#299;ngtáo", "coconut=y&#275;zi",  
		"cucumber=huánggu&#257;", "lemon=níngméng",  "pear=lí", "pineapple=b&#333;luó", "pumpkin=nángu&#257;", "strawberry=c&#462;oméi", "watermelon=x&#299;gu&#257;", 
		);
	$trans3=$trans2;	
	}	

if ($topic=="daysandmonths"){
	$trans1=array("Monday=X&#299;ngq&#299;y&#299;", "Tuesday=X&#299;ngq&#299;èr", "Wednesday=X&#299;ngq&#299;s&#257;n", "Thursday=X&#299;ngq&#299;sì", "Friday=X&#299;ngq&#299;w&#468;", 
		"Saturday=X&#299;ngq&#299;liù", "Sunday=X&#299;ngq&#299;ti&#257;n", );
	$trans2=array("January=Y&#299;yuè", "February=Èryuè", "March=S&#257;nyuè", "April=Sìyuè", "May=W&#468;yuè ", "June=Liùyuè", "July=Q&#299;yuè", "August=B&#257;yuè", 
		"September=Ji&#468;yuè", "October=Shíyuè", "November=Shíy&#299;yuè", "December=Shí'èryuè",);
	$trans3=$trans2;	
	}	

if ($topic=="adjectives"){
	$trans1=array("bad=huài", "beautiful=m&#283;ilì", "big=dà", "black=h&#275;i", "blue=lán", "brave=y&#466;ngg&#462;n", "bright=gu&#257;ngmíng", "cold=l&#283;ng", 
		"deep=sh&#275;n", "dirty=zàng", "early=z&#462;o", "far=yu&#462;n", "fast=kuài", "fat=pàng", "good=h&#462;o", "good-looking=h&#462;okàn", "green=l&#476;", "happy=g&#257;oxìng", 
		"hot=rè", "narrow=zh&#462;i", "near=jìn", "new=x&#299;n", "old=l&#462;o", "orange=chéng", "red=hóng", "sad=sh&#257;ngx&#299;n", "short=&#462;i", "slow=màn", "small=xi&#462;o", 
		"tasty=m&#283;iwèi", "tall=g&#257;o", "thick=hòu", "thin=báo", "ugly=ch&#466;u", "white=bái", "wide=ku&#257;n", "young=niánq&#299;ng",
		);
	$trans2=array("abundant=f&#275;ngfù", "busy=máng", "comfortable=sh&#363;fu", "cheap=piányí", "dangerous=wéixi&#462;n", "delicious=h&#259;och&#299;", "expensive=guì", 
		"few=sh&#462;o", "friendly=y&#466;uh&#462;o", "healthy=jiànk&#257;ng", "heavy=zhòng", "honest=chéngshí", "intelligent=c&#333;ngmíng", "lazy=l&#462;n", 
		"necessary=bìyào", "nervous=j&#301;nzh&#257;ng", "poor=qióng", "pretty=k&#283;'ài", "quiet=&#257;njìng", "skinny=shòu", "straight=zhí", "tired=lèi", "wealthy=y&#466;uqián", 
		"windy=gu&#257;f&#275;ng", "wonderful=haojile", 
		);
	$trans3=$trans2;	
	}	
	
if ($topic=="verbs"){
	$trans1=array("to ask=wèn", "to come=lái", "to drink=h&#275;", "to draw=huà", "to drive (a car)=k&#257;ich&#275;", "to eat=ch&#299;", "to give=g&#277;i", "to go=qù",
		"to have=y&#335;u", "to learn=xuéxí", "to like=x&#464;hu&#257;n", "to listen=t&#299;ng", "to live=zhù", "to love=ài", "to make=zuò", "to read=kànsh&#363;", "to run=p&#259;o", 
		"to say=shu&#333;", "to see=kàn", "to sleep=shuìjiào", "to smile=xiào", "to talk=tánhuà", "to tell=gàosù", "to walk=z&#335;u", "to want=yào", "to wash=x&#301;",
		);
	$trans2=array("to buy=m&#462;i", "to dance=tiàow&#468;", "to dream=zuòmèng", "to earn=zhuàn", "to fear=hàipà", "to feed=wèi", "to feel=juéde", "to forgive=yuánliàng", 
		"to hear=t&#299;ngjiàn", "to invite=y&#257;oq&#464;ng",  "to jump=tiào", "to push=tu&#299;", "to receive=ji&#275;shòu", "to rest=xi&#363;xi", "to sing=chàng", 
		"to solve=ji&#283;jué", "to stop=tíngzh&#464;", "to study=xué", "to swim=yóuy&#466;ng", "to teach=jiào", "to use=yòng", "to wait=d&#283;ng", "to work=g&#333;ngzuò", 
		"to write=xi&#283;"
		);
	$trans3=$trans2;	
	}	

if ($topic=="adverbs"){
	$trans1=array(
		"in=zài", "now=xiànzài", "today=j&#299;nti&#257;n", "tomorrow=míngti&#257;n", "yesterday=zuóti&#257;n", "always=z&#335;ngshì", "sometimes=y&#466;ushí", "often=cháng", 
		"again=zàicì", "everyday=m&#283;iti&#257;n", "everywhere=dàochù", "later=hòu", "here=zhèl&#464;", "there=nàli", "left=zu&#466;", "right=yòu",
		);
	$trans2=array(
		"inside=l&#464;miàn", "outside=wàimiàn", "in front of=qiánmiàn", "behind=hòumiàn", "on top of=shàngmiàn", "below=xiàmiàn", "beside=pángbi&#257;n", 
		"almost=j&#299;h&#363;", "soon=bùji&#468;", "together=y&#299;q&#464;", "usually=píngshí",
		);
	$trans3=$trans2;	
	}	

if ($topic=="others"){
	$trans1=array("I=w&#335;", "you=n&#301;", "birthday=sh&#275;ngrì", "bread=miànb&#257;o", "butter=huángyóu", "cake=dàng&#257;o", "city=chéngshì", "country=guojia", 
		"coffee=k&#257;f&#275;i", "cola=kele", "day=rì", "egg=jidan", "food=shíwù", "garden=hu&#257;yuán", "house=fángzi", "juice=zh&#299;", "laughter=xiào sh&#275;ng", 
		"milk=niún&#462;i", "money=qián", "music=y&#299;nyuè", "night=yè", "place=dìf&#257;ng", "please=q&#464;ng", "question=wèntí", "room=fángji&#257;n", "school=xuéxiào", 
		"smoke=y&#257;n", "story=gùshi", "sugar=táng", "time=shíji&#257;n", "window=chu&#257;ngk&#466;u", "who=shuí", "what=shénme", "why=wèishéme", "where=n&#462;l&#464;", 
		"how much=du&#333;sh&#259;o", 
		);
	$trans2=array("ability=nénglì", "bank=yínháng", "chocolate=qiao ke li", "cookie=b&#301;ngg&#257;n", "dollar=m&#283;iyuán", "dragon=lóng", "electricity=diànlì", 
		"English=y&#299;ngy&#365;", "factory=g&#333;ngch&#462;ng", "gravity=zhònglì", "headache=tóuténg", "holiday=jiérì", "imagination=xi&#462;ngxiàng", "information=xìnx&#299;", 
		"intelligence=qíngbào", "joke=xiàohuà", "life=sh&#275;nghuó", "menu=càid&#257;n", "minute=f&#275;n", "mistake=cuòwù", "noodles=miàntiáo", "opportunity=j&#299;huì", 
		"park=g&#333;ngyuán", "problem=wèntí", "rectangle=chángf&#257;ngxíng", "restaurant=fàngu&#259;n", "rice=m&#301;fàn", "shadow=y&#301;ngzi", "square=zhèngf&#257;ngxíng", 
		"stairs=lóut&#299;", "temperature=w&#275;ndù", "toilet=cèsu&#335;", "triangle=s&#257;nji&#462;oxíng",
		);
	$trans3=$trans2;	
	}	

//
//
//
//
//
//
//
//
//
//pronunciations for the words
//
//
//
//
//
//
//
//
//
//
 
if ($topic=="numbers" or $topic=="daysandmonths"){
	$strans1=array(
		"zero=líng", "one=y&#299;", "two=èr", "three=s&#257;n", "four=sì", "five=w&#468;", "six=liù", "seven=q&#299;", "eight=b&#257;", "nine=ji&#468;", "ten=shí­",
		"Monday=X&#299;ngq&#299;y&#299;", "Tuesday=X&#299;ngq&#299;èr", "Wednesday=X&#299;ngq&#299;s&#257;n", "Thursday=X&#299;ngq&#299;sì", "Friday=X&#299;ngq&#299;w&#468;", 
		"Saturday=X&#299;ngq&#299;liù", "Sunday=X&#299;ngq&#299;ti&#257;n",);
	$strans2=array(
		"twenty=èr shí", "one hundred=yì b&#462;i", "January=Y&#299;yuè", "February=Èryuè", "March=S&#257;nyuè", "April=Sìyuè", "May=W&#468;yuè ", "June=Liùyuè", "July=Q&#299;yuè", 
		"August=B&#257;yuè", "September=Ji&#468;yuè", "October=Shíyuè", "November=Shíy&#299;yuè", "December=Shí'èryuè",
		);
	$strans3=$strans2;	
	}	
	
if ($topic=="people" or $topic=="body-parts"){
	$strans1=array(
		"arm=sh&#466;ubì", "chest=xi&#333;ng", "child=háizi", "classmate=tóngxué", "daughter=n&#474;'ér", "doctor=y&#299;sh&#275;ng", "ears=&#283;rdu&#466;", "eyes=y&#462;nj&#299;ng", 
		"face=li&#462;n", "family=ji&#257;tíng", "father=bàba", "feet=ji&#462;o", "friend=péngy&#466;u", "hair=tóufa", "hand=sh&#466;u", "head=tóu", "husband=zhàngf&#363;", "leg=tu&#464;", 
		"man=nánrén", "mother=m&#257;ma", "mouth=k&#466;u", "neck=bózi", "nose=bízi",  "nurse=hùshi", "older brother=g&#275;g&#275;", "older sister=ji&#283; jie", "son=érzi", 
		"student=xuésh&#275;ng", "teacher=l&#259;osh&#299;", "woman=n&#474;rén", "younger brother=dìdì", "younger sister=mèi mei",
		);
	$strans2=array(
		"architect=jiànzhúsh&#299;", "astronaut=tàik&#333;ngrén", "carpenter=mùjiàng", "cashier=sh&#333;uyín yuán", "chef=chúsh&#299;", "clown=xi&#462;och&#466;u", 
		"engineer=g&#333;ngchéngsh&#299;", "finger=sh&#466;uzh&#464;", "firefighter=xi&#257;ofángduìyuán", "fist=quántóu", "forehead=étóu", "lawyer=l&#476;sh&#299;", 
		"neighbor=línj&#363;", "policeman=j&#464;ngchá", "skin=píf&#363;", "toe=ji&#462;ozh&#464;", "tongue=shétou", "tooth=yách&#464;",
		);
	$strans3=$strans2;	
	}	

if ($topic=="animals" or $topic=="fruitsandveggies" or $topic=="nature"){
	$strans1=array(
		"air=k&#333;ngqì", "ant=m&#462;y&#464;", "apple=pínggu&#466;", "banana=xi&#257;ngji&#257;o",  "bee=mìf&#275;ng", "butterfly=húdié", "cabbage=ju&#462;nx&#299;ncài", 
		"cat=m&#257;o", "cloud=yún", "cow=m&#468;niú", "dog=g&#466;u", "duck=y&#257;", "eggplant=qiézi", "flower=hu&#257;", "forest=s&#275;nlín", "frog=q&#299;ngw&#257;", 
		"garlic=dàsuàn", "ginger=ji&#257;ng", "goat=sh&#257;nyáng", "grapes=pútáo", "grass=c&#462;o", "horse=m&#462;", "leaf=yè", "lion=sh&#299;zi", "monkey=hóuzi", 
		"moon=yuèliàng", "onion=yángc&#333;ng", "pig=zh&#363;", "potato=t&#468;dòu", "rat=l&#462;osh&#468;", "root=g&#275;n", "tail=w&#277;iba", "sheep=miányáng", "snake=shé", 
		"spider=zh&#299;zh&#363;", "sun=tàiyáng", "tiger=h&#468;", "tree=shù", "vegetables=sh&#363;cài", "water=shu&#301;", "wind=f&#275;ng", "worm=rúchóng",
		);
	$strans2=array(
		"autumn=qi&#363;ti&#257;n", "bitter melon=k&#468;gu&#257;", "broccoli=x&#299; lánhu&#257;", "carrot=húluóbo", "cauliflower=càihu&#257;", "celery=qíncài", 
		"cockroach=zh&#257;ngláng", "crab=pángxiè", "cucumber=huánggu&#257;", "dolphin=h&#462;itún", "dragonfly=q&#299;ngtíng", "eagle=l&#462;oy&#299;ng", "housefly=c&#257;ngyíng", 
		"lightning=sh&#462;ndiàn", "mushroom=móg&#363;", "octopus=zh&#257;ngyú", "ostrich=tuóni&#462;o", "owl=m&#257;otóuy&#299;ng", "peacock=k&#466;ngquè", "pumpkin=nángu&#257;", 
		"rainbow=c&#462;ihóng", "seahorse=h&#462;im&#462;", "sea lion=h&#462;ish&#299;", "shrimp=xi&#257;", "snail=w&#333;niú", "spring=ch&#363;nti&#257;n", "squid=w&#363;zéi", 
		"starfish=h&#462;ix&#299;ng", "strawberry=c&#462;oméi", "summer=xiàti&#257;n", "tail=w&#277;iba", "thunder=léi", "turkey=hu&#466; j&#299;", "watermelon=x&#299;gu&#257;", 
		"weather=ti&#257;nqì", "winter=d&#333;ngti&#257;n",
		);
	$strans3=$strans2;	
	}	
	
if ($topic=="objects"){
	$strans1=array(
		"bag=dài", "ball=qiú", "bed=chuáng", "bicycle=zìxíngch&#275;", "boat=chuán", "book=sh&#363;", "bowl=w&#462;n", "car=qìch&#275;", "chair=y&#464;zi", "clothes=y&#299;fú", 
		"cup=b&#275;i", "door=mén", "fork=ch&#257;zi", "hammer=láng tóu", "hat=màozi", "knife=d&#257;o", "motorcycle=mótu&#333;ch&#275;", "notebook=b&#464;jìb&#283;n", 
		"pants=kùzi", "pencil=qi&#257;nb&#464;", "pen=gangb&#464;", "saw=jù z&#464;", "shirt=chènsh&#257;n", "shoes=xié", "socks=wàzi", "spoon=sháozi", "table=zhu&#333;zi", 
		"umbrella=s&#462;n",
		);
	$strans2=array(
		"airplane=f&#275;ij&#299;", "bicycle=zìxíngch&#275;", "chopsticks=kuàizi", "envelope=xìnf&#275;ng", "eraser=xiàngpíc&#257;", "flashlight=sh&#466;udiànt&#466;ng", 
		"gift=l&#464;wù",  "guitar=jít&#257;", "magazine=zázhì", "necktie=l&#464;ngdài", "newspaper=bàozh&#464;", "piano=g&#257;ngqín", "raincoat=y&#468;y&#299;", 
		"screw driver=luós&#299;d&#257;o", "short pants=du&#462;nkù", "television=diànshì", "towel=máoj&#299;n", "zipper=l&#257;liàn",
		);
	$strans3=$strans2;	
	}	

if ($topic=="verbs" or $topic=="adjectives"){
	$strans1=array(
		"beautiful=m&#283;i", "big=da", "black=h&#275;i", "blue=lán", "cold=l&#283;ng", "deep=sh&#275;n", "dirty=zàng", "far=yu&#462;n", "fast=kuai", "fat=pàng", 
		"good=h&#462;o", "good-looking=h&#462;okàn", "green=l&#476;", "happy=g&#257;oxìng", "narrow=zh&#462;i", "near=jìn", "old=l&#462;o", "orange=chéng", "red=hóng", 
		"sad=sh&#257;ngx&#299;n", "short=&#462;i", "slow=màn", "small=xi&#462;o", "tall=g&#257;o", "ugly=ch&#466;u", "yellow=huáng",
		"to ask=wèn", "to come=lái", "to draw=huà", "to eat=ch&#299;", "to give=g&#283;i", "to go=qù",	"to have=y&#335;u", "to learn=xuéxí", "to like=x&#464;hu&#257;n", 
		"to live=zhù", "to love=ài", "to read=kànsh&#363;", "to say=shu&#333;", "to sleep=shuìjiào", "to tell=gàosù", "to walk=z&#335;u"
		);
	$strans2=array(
		"abundant=f&#275;ngfù", "cheap=piányí", "delicious=h&#259;och&#299;", "expensive=guì", "grey=hu&#299;", "honest=chéngshí", "nervous=j&#301;nzh&#257;ng", 
		"pretty=k&#283;'ài", "purple=z&#301;", "quiet=&#257;njìng", "tired=lèi", "white=bái", "windy=gu&#257;f&#275;ng", "young=niánq&#299;ng", 
		"to buy=m&#462;i", "to dance=tiàow&#468;", "to drink=h&#275;", "to earn=zhuàn", "to fear=hàipà", "to feel=juéde", "to hear=t&#299;ngjiàn", "to jump=tiào", 
		"to laugh=xiào", "to receive=ji&#275;shòu", "to study=xué", "to swim=yóuy&#466;ng", "to teach=jiào", "to work=g&#333;ngzuò", 
		);
	$strans3=$strans2;	
	}	

if ($topic=="adverbs" or $topic=="others"){
	$strans1=array(
		"I=w&#335;", "you=n&#301;", "birthday=sh&#275;ngrì", "bread=miànb&#257;o", "butter=huángyóu", "chocolate=qiao ke li", "city=chéngshì", "coffee=k&#257;f&#275;i", 
		"country=guojia", "egg=jidan", "garden=hu&#257;yuán", "milk=niún&#462;i", "money=qián", "music=y&#299;nyuè", "night=yè", "please=q&#464;ng", "room=fángji&#257;n", 
		"school=xuéxiào", "story=gùshi", "sugar=táng", "now=xiànzài", "today=j&#299;nti&#257;n", "tomorrow=míngti&#257;n", "yesterday=zuóti&#257;n", "always=z&#335;ngshì", 
		"sometimes=y&#466;ushí", "inside=l&#464;miàn", "outside=wàimiàn", "beside=pángbi&#257;n", "behind=hòumiàn", "below=xiàmiàn","here=zhèl&#464;", "what=shénme", 
		"now=xiànzài", "how much=du&#333;sh&#259;o",
		);
	$strans2=array(
		"bank=yínháng", "cloudy day=y&#299;n ti&#257;n", "English=y&#299;ngy&#365;", "factory=g&#333;ngch&#462;ng", "life=sh&#275;nghuó", "menu=càid&#257;n", "minute=f&#275;n", 
		"opportunity=j&#299;huì", "problem=wèntí", "rainy day=y&#468;ti&#257;n", "rectangle=chángf&#257;ngxíng", "restaurant=fàngu&#259;n", "soon=bùji&#468;", 
		"square=zhèngf&#257;ngxíng", "stairs=lóut&#299;", "suddenly=túrán", "sunny day=qíngti&#257;n", "temperature=w&#275;ndù", "together=y&#299;q&#464;", "toilet=cèsu&#335;", 
		"triangle=s&#257;nji&#462;oxíng", 
		);
	$strans3=$strans2;	
	}	


if ($_SESSION['level']=="Easy"){$trans=$trans1;}
else{$trans=$trans2;}

$count=count($trans)-1;

echo "<table align='center' width='100%'><tr><td align='center'>";
		echo "<font face='Arial' style='font-size: 26pt; font-weight: 700' color='#CC0000'><br/>";
		
echo "<font face='Arial' style='font-size: 14pt; font-weight: 700' color='#CC0000'>";
echo "<br/><br/>";
echo "<font face='Arial' style='font-size: 26pt; font-weight: 700' color='#CC0000'>";
if (strpos($topic,"and")>0){echo "Mandarin Words for<br/>".ucfirst($stopic);}
else{echo "Mandarin Words<br/>for ".ucfirst($stopic);}
echo "<font face='Arial' style='font-size: 18pt; font-weight: 700' color='#CC0000'>";
echo "<br/><br/>";
for ($i=0; $i<=$count; $i+=1){
	$word=$trans[$i];
	$pos=strpos($word,"=");
	$eng=substr($word,0,$pos);
	$man=substr($word,($pos+1));
	if (in_array($word,$strans1) or in_array($word,$strans2)){	
		echo "<font face='Times New Roman' style='font-size: 28pt; font-weight: 500' color='#222222'><br/>";
		echo $man." - ".$eng."<br/>";
		$audio=str_replace(" ","-",$eng);
		$audio1="../sounds/".strtolower($audio).".mp3";
		$audio2="../sounds/".strtolower($audio).".wav";
		echo "<audio controls='controls' controls preload='auto'>";
		echo "<source src='$audio1' type='audio/mpeg'>";
		echo "<source src='$audio2' type='audio/wav'>";
		echo "</audio>";
		echo "<br/>";	
		}
	}
echo "</td></tr></table>";	

$man="";
$noteshown="";
echo "<table border='0' cellspacing='0' cellpadding='0' align='center'>";
$count=count($trans)-1;
for ($i=0; $i<=$count; $i+=1){
	$word=$trans[$i];
	$pos=strpos($word,"=");
	$eng=substr($word,0,$pos);
	$man=substr($word,($pos+1));
	if (!in_array($word,$strans1) and !in_array($word,$strans2)){
		if ($man!="" and $noteshown==""){
			echo "<br/><br/><br/><tr><td align='center'><img border='0' src='../images/twordsman2.jpg' width='426' height='193'><br/><br/></td></tr>";
			$noteshown="yes";
			}	
		echo "<tr><td align='center'>";
		echo "<font face='Times New Roman' style='font-size: 28pt; font-weight: 500' color='#222222'><br/>";
		echo $man." - ".$eng."&nbsp;&nbsp;";
		echo "</td></tr>";
		}
	}
echo "<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr></table>";	


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