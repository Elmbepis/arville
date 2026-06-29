<?php 
require '../../pass-chk.php';
?>

<?php
$topic="";
$topic=$_GET['topic']; 
if ($topic==""){$topic="number-noun";}
$stopic=$topic;
if ($stopic=="number-noun"){$stopic="Counted Nouns";}		
if ($stopic=="adjective-noun"){$stopic="Nouns with Adjectives";}		
if ($stopic=="verb-object"){$stopic="Verbs with Objects";}		
if ($stopic=="others"){$stopic="Other Phrases";}		
if ($stopic=="gr-exp"){$stopic="Greetings and Expressions";}		
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/css; charset=utf-8" />

<?php
echo "<title>Translating Mandarin Phrases for ".ucfirst($stopic)." into English - Mandarin in KPluz.com</title>";
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
if(isset($_POST['level'])){$selected_radio = $_POST['level'];}
if (!isset($selected_radio)){$selected_radio = $_SESSION['level'];}
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
if(isset($_POST['level'])){$selected_radio = $_POST['level'];}
if (!isset($selected_radio)){$selected_radio = $_SESSION['level'];}
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

$action="t-man-to-eng-ph-gr-exp.php?topic=".$topic;
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
echo "Mandarin Phrases for<br/>".ucfirst($stopic);
echo "<font face='Arial' style='font-size: 18pt; font-weight: 700' color='#CC0000'>";
echo "<br/><br/>";
echo "</td></tr></table>";

if (!isset($ansclicked) or isset($_POST['Submit2']))
{

$page=substr($_SERVER["PHP_SELF"],1);
if (isset($_SESSION['curpage'])){
	if ($page != $_SESSION['curpage']){
	$_SESSION['curpage']=$page;
	$_SESSION['score']=	0;}
	}
$_SESSION['pageload']="new";
 
 
if ($topic=="gr-exp"){
	$trans1=array(
		"Congratulations!=Zhùhè n&#464;!", 
		"Good morning.=Z&#462;o &#257;n.", 
		"Good afternoon.=Xiàw&#468; h&#462;o.", 
		"Good evening.=W&#462;nshàng h&#462;o.", 
		"Good night.=W&#462;n'&#257;n.", 
		"Good-bye.=Zàijiàn.", 
		"Good luck.=Zhù n&#301; h&#259;o yùn.", 
		"Hello!=N&#464;h&#462;o!", 
		"How are you?=N&#464;h&#462;o ma?", 
		"Happy birthday!=Sh&#275;ngrì kuàilè!",
		"Happy new year!=X&#299;nnián kuàilè!",
		"See you later.=Huítóu jiàn.", 
		"Sorry.=Duìbùq&#464;.", 
		"Take care.=Mànz&#335;u.", 
		"Thank you.=Xièxiè.", 
		"Welcome!=Hu&#257;nyíng!", 
		);
	$trans2=array(
		"Don't be sad.=Bùyào nánguò.",
		"Don't mention it.=Bùyào kèqì.",
		"How are you doing?=N&#464; z&#283;nmeyàng?", 
		"I am fine.=W&#466; h&#283;n h&#462;o.", 
		"I don't understand.=W&#466; bù míngbái.", 
		"I'll miss you.=W&#466; huì xi&#462;ngniàn n&#464;.", 
		"Long time no see!=H&#462;oji&#468; bùjiàn.", 
		"Nice meeting you.=H&#283;n g&#257;oxìng jiàn dào n&#464;.", 
		"See you soon.=Yíhuìr jiàn.", 
		"See you tomorrow.=Míngti&#257;n jiàn.", 
		"See you next week.=Xiàge x&#299;ngq&#299; jiàn.",
		"Thank you very much.=F&#275;icháng g&#462;nxiè.", 
		"No problem.=Méi gu&#257;nxi.",
		);
	$trans3=$trans2;	
	}	

if ($topic=="number-noun"){
	$nums1=array("one=y&#299;", "two=li&#462;ng", "three=s&#257;n", "four=sì", "five=w&#468;", "six=liù", "seven=q&#299;", "eight=b&#257;", "nine=ji&#468;", "ten=shí");
	$nums2=array("one=y&#299;", "two=li&#462;ng", "three=s&#257;n", "four=sì", "five=w&#468;", "six=liù", "seven=q&#299;", "eight=b&#257;", "nine=ji&#468;", "ten=shí");
	$nouns1=array("apples=gè pínggu&#466;", "bicycles=liàng zìxíngch&#275;", "birds=zh&#299; ni&#462;o", "books=b&#283;n sh&#363;", "boys=gè nánhái", "cars=liàng ch&#275;", 
		"cats=zh&#299; m&#257;o", "days=ti&#257;n", "dogs=zh&#299; g&#466;u", "doors=shàn mén", "hands=zh&#299; sh&#466;u", "houses=gè fángzi", "magazines=b&#283;n zázhì", 
		"people=gè rén", "trees=k&#275; shù", "wheels=gè lúnzi",  
		);	
	$nouns2=array("airplanes=jià f&#275;ij&#299;", "apples=gè pínggu&#466;", "beds=zh&#257;ng chuáng", "bicycles=liàng zìxíngch&#275;", "birds=zh&#299; ni&#462;o", "books=b&#283;n sh&#363;", 
		"bowls of rice=w&#462;n m&#464;fàn","boys=gè nánhái", "cars=liàng ch&#275;", "cats=zh&#299; m&#257;o", "chairs=b&#462; y&#464;zi", "days=ti&#257;n", "dogs=zh&#299; g&#466;u", 
		"doors=shàn mén", "fishes=tiáo yú", "flowers=du&#466; hu&#257;", "hands=zh&#299; sh&#466;u", "houses=gè fángzi", "magazines=b&#283;n zázhì", "newspapers=b&#283;n bàozh&#464;", 
		"pairs of chopsticks=shu&#257;ng kuàizi", "pairs of pants=tiáo kùzi", "pairs of shoes=shu&#257;ng xié", "pencils=zh&#299; qi&#257;nb&#464;", "people=gè rén", "rivers=tiáo hé", 
		"shirts=jiàn chènsh&#257;n", "tables=zh&#257;ng bi&#462;o", "teachers=wèi jiàosh&#299;", "trees=k&#275; shù", "wheels=gè lúnzi", "windows=shàn chu&#257;ngk&#466;u",
		);	
	$mws="";	
	
	if ($_SESSION['level']=="Easy"){$lim=9;}else{$lim=9;}
	for ($i=0; $i<=$lim; $i+=1){
		if ($_SESSION['level']=="Easy"){
			$num1=$nums1[$i];
			$pos=strpos($num1,"=");
			$enum1=substr($num1,0,$pos);
			$mnum1=substr($num1,$pos+1);
			$noun1a=$nouns1[rand(0,(count($nouns1)-1))];
			if ($enum1=="one"){
				while(strpos($noun1a,"of")>0 or strpos($noun1a,"eople")>0){$noun1a=$nouns1[rand(0,(count($nouns1)-1))];}
				}
			$noun1b=$nouns1[rand(0,(count($nouns1)-1))];
			if ($enum1=="one"){
				while ($noun1b==$noun1a or strpos($noun1b,"of")>0 or strpos($noun1b,"eople")>0){
					$noun1b=$nouns1[rand(0,(count($nouns1)-1))];
					}
				}
			else {while ($noun1b==$noun1a){$noun1b=$nouns1[rand(0,(count($nouns1)-1))];}}		
			$pos=strpos($noun1a,"=");
			$enoun1a=substr($noun1a,0,$pos);
			if ($enum1=="one"){$enoun1a=substr($enoun1a,0,(strlen($enoun1a)-1));}
			$mnoun1a=substr($noun1a,$pos+1);
			$pos=strpos($noun1b,"=");
			$enoun1b=substr($noun1b,0,$pos);
			if ($enum1=="one"){$enoun1b=substr($enoun1b,0,(strlen($enoun1b)-1));}
			$mnoun1b=substr($noun1b,$pos+1);
			$trans1[$i]=$enum1." ".$enoun1a." - ".$mnum1." ".$mnoun1a."<br/>".$enum1." ".$enoun1b." - ".$mnum1." ".$mnoun1b;
			$mws=$mws." ".$mnoun1a." ".$mnoun1b;
			}
		if ($_SESSION['level']=="Hard"){
			$num2=$nums2[$i];
			$pos=strpos($num2,"=");
			$enum2=substr($num2,0,$pos);
			$mnum2=substr($num2,$pos+1);
			$noun2a=$nouns2[rand(0,(count($nouns2)-1))];
			if ($enum2=="one"){
				while(strpos($noun2a,"of")>0 or strpos($noun2a,"eople")>0 or strpos($noun2a,"ishes")>0){$noun2a=$nouns2[rand(0,(count($nouns2)-1))];}
				}
			$noun2b=$nouns2[rand(0,(count($nouns2)-1))];
			if ($enum2=="one"){
				while ($noun2b==$noun2a or strpos($noun2b,"of")>0 or strpos($noun2b,"eople")>0 or strpos($noun2b,"ishes")>0){
					$noun2b=$nouns2[rand(0,(count($nouns2)-1))];
					}
				}
			else {while ($noun2b==$noun2a){$noun2b=$nouns2[rand(0,(count($nouns2)-1))];}}		
			$pos=strpos($noun2a,"=");
			$enoun2a=substr($noun2a,0,$pos);
			if ($enum2=="one"){$enoun2a=substr($enoun2a,0,(strlen($enoun2a)-1));}
			$mnoun2a=substr($noun2a,$pos+1);
			$pos=strpos($noun2b,"=");
			$enoun2b=substr($noun2b,0,$pos);
			if ($enum2=="one"){$enoun2b=substr($enoun2b,0,(strlen($enoun2b)-1));}
			$mnoun2b=substr($noun2b,$pos+1);
			$trans2[$i]=$enum2." ".$enoun2a." - ".$mnum2." ".$mnoun2a."<br/>".$enum2." ".$enoun2b." - ".$mnum2." ".$mnoun2b;
			$mws=$mws." ".$mnoun2a." ".$mnoun2b;
			}
		}		
							
	if (strpos($mws,"liàng")>0){$i=$i+1; $desc=$blue3."liàng".$black4." - used for wheeled vehicles<br/>like cars and bicycles"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"zh&#299;")>0){$i=$i+1; $desc=$blue3."zh&#299;".$black4." - used for animals like cats and birds<br/>and paired parts like hands and feet"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"b&#283;n")>0){$i=$i+1; $desc=$blue3."b&#283;n".$black4." - used for bound print matter<br/>like books and magazines"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"shàn")>0){$i=$i+1; $desc=$blue3."shàn".$black4." - used for doors and windows"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"k&#275;")>0){$i=$i+1; $desc=$blue3."k&#275;".$black4." - used for trees and similar plants<br/>and small objects like pearls and teeth"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"b&#462;")>0){$i=$i+1; $desc=$blue3."b&#462;".$black4." - used for objects that can be held like<br/>knives and scissors; also used for chairs"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"jià")>0){$i=$i+1; $desc=$blue3."jià".$black4." - used for aircraft, pianos, and machines"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"w&#462;n")>0){$i=$i+1; $desc=$blue3."w&#462;n".$black4." - used for bowls of soup, rice, etc."; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"jiàn")>0){$i=$i+1; $desc=$blue3."jiàn".$black4." - used for pieces of clothing like shirts"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"tiáo")>0){$i=$i+1; $desc=$blue3."tiáo".$black4." - used for long, narrow, flexible<br/>objects like pants and rivers"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"wèi")>0){$i=$i+1; $desc=$blue3."wèi".$black4." - used for people of position<br/>as a polite measure word"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"shu&#257;ng")>0){$i=$i+1; $desc=$blue3."shu&#257;ng".$black4." - used for paired objects like<br/>shoes and chopsticks"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
	if (strpos($mws,"gè")>0){$i=$i+1; $desc=$blue3."gè".$black4." - used for people and individual things;<br>it may also be used if the correct<br/>measure word is not known"; if ($_SESSION['level']=="Easy"){$trans1[$i]=$desc;} else{$trans2[$i]=$desc;} }
		
	}	
	
if ($topic=="adjective-noun"){
	$trans1=array(
		//usually, 'de' is inserted if the adjective has two or more syllables
		"beautiful flower=m&#283;ilì de hu&#257;",
		"beautiful city=m&#283;ilì de chéngshì",
		"blue car=lánsè de qìch&#275;",
		"blue house=lánsè de fángzi",
		"delicious food=m&#283;iwèi de shíwù",
		"friendly person=y&#466;uh&#462;o de rén",
		"good friend=h&#462;o de péngy&#466;u",
		"green tree=l&#476;sè de shù",
		"happy child=g&#257;oxìng de háizi",	
		"new problem=x&#299;n de wèntí",
		"red apple=hóngsè de pínggu&#466;",
		"red clothes=hóngsè de y&#299;fu",
		"red fruit=hóngsè de shu&#464;gu&#466;",
		"smart student=c&#333;ngmíng de xuésh&#275;ng", 
		"*",
		"bad person=huài rén",
		"big family=dà ji&#257;tíng",
		"deep water=sh&#275;n shu&#464;",
		"dirty clothes=zàng y&#299;fú",
		"good teacher=h&#462;o l&#462;osh&#299;",
		"little boy=xi&#462;o nánhái", 
		"new cellphone=x&#299;n sh&#466;uj&#299;",
		"old clothes=jiù y&#299;fú",
		"old friends=l&#462;o péngy&#466;u",
		"poor people=qióng rén",
		"thin woman=shòu n&#474;rén",
		"white horse=bái m&#462;",
		"black goat=h&#275;i sh&#257;nyáng",
		"yellow bird=huáng ni&#462;o",
		);
	$trans2=array(
		//yige means 'a'
		"a dangerous animal=y&#299;gè wéixi&#462;n de dòngwù",		
		"a green house=y&#299;gè l&#476;sè de fángzi",
		"a very lazy girl=y&#299;gè h&#283;n l&#462;nduò de n&#474;hái",
		"a very old man=y&#299;gè h&#283;n l&#462;o de nánrén",
		"a very wealthy woman=y&#299;gè h&#283;n y&#466;uqián de n&#474;rén",		
		"a very tall tree=y&#299;gè h&#283;n g&#257;o de shù",
		"an ugly rat=y&#299;gè ch&#466;ulòu de l&#462;osh&#468;", 
		"extremely dirty room=f&#275;icháng zàng de fángji&#257;n",
		"extremely nice friend=f&#275;icháng h&#462;o de péngy&#466;u",
		"one thick book=yì b&#283;n hòu de sh&#363;",
		"*",
		"a fat woman=y&#299;gè pàng n&#474;rén",
		"happy life=xìngfú sh&#275;nghuó",
		"old red house=l&#462;o hóng fángzi",
		);
	$trans3=$trans2;	
	}	
		
if ($topic=="verb-object"){
	$trans1=array(
		"to buy bread=m&#462;i miànb&#257;o",
		"to eat apples=ch&#299; pínggu&#466;",
		"to eat rice=ch&#299; m&#464;fàn",
		"to drink water=h&#275; shu&#464;",
		"to feed animals=wèi dòngwù",
		"to give money=g&#283;i qián",
		"to listen to music=t&#299;ng y&#299;nyuè",
		"to play the guitar=dàn jít&#257;",
		"to push boxes=tu&#299; xi&#257;ng",
		"to sell bread=mài miànb&#257;o",
		"to spend money=hu&#257; qián",
		"to ride a bike=qí zìxíngch&#275;",
		"to wash clothes=x&#464; y&#299;fú",
		);
	$trans2=array(
		"to buy two shirts=m&#462;i li&#462;ng jiàn chènsh&#257;n",
		"to donate old clothes=ju&#257;nzèng jiù y&#299;fú",
		"to drink milk=h&#275; niún&#462;i",
		"to peel an orange=b&#333; y&#299;gè júzi",
		"to push a classmate=tu&#299; y&#299;gè tóngxué",
		"to share food=f&#275;nxi&#462;ng shíwù",
		"to solve a problem=ji&#283;jué wèntí",
		"to tell a story=ji&#462;ng gùshì",
		);
	$trans3=$trans2;	
	}	
	
if ($topic=="others"){
	//all phrases with conjunctions and prepositions must be listed first
	//all phrases with possessives must be listed last
	$trans1=array(
		"boys and girls=nánhái hé n&#474;hái",
		"cats and dogs=m&#257;o hé g&#466;u",
		"coffee and sugar=k&#257;f&#275;i hé táng",
		"fruits and vegetables=shu&#464;gu&#466; hé sh&#363;cài",
		"house and lot=fángzi hé h&#283;ndu&#333;",
		"spoon and fork=sháozi hé ch&#257;zi",
		"black or white=h&#275;isè huò báisè",
		"coffee or milk=k&#257;f&#275;i huò niún&#462;i",
		"tea or coffee=chá huò k&#257;f&#275;i",
		"*",
		"in front of me=zài w&#466; qiánmian",
		"in front of the house=zài fángzi qiánmiàn",
		"behind you=zài n&#464; hòumiàn",
		"behind the school=zài xuéxiào hòumiàn",
		"inside the car=zài ch&#275; l&#464;miàn",
		"inside the bank=zài yínháng l&#464;miàn",
		"outside the house=zài fángzi wàimian",
		"outside the room=zài fángji&#257;n wàimian",
		"under the chair=zài y&#464;zi xiàmiàn",
		"under the magazine=zài zázhì xiàbian",
		"beside the teacher=zài l&#462;osh&#299; pángbiàn",
		"beside the park=zài g&#333;ngyuán pàngbian",
		"?",
		"my house=w&#466; de fángzi",
		"my shirt=w&#466; de chènsh&#257;n",
		"your clothes=n&#464; de y&#299;fú",
		"your birthday=n&#464; de sh&#275;ngrì",
		"your shoes=n&#464; de xié",
		"our cat=w&#466;men de m&#257;o",
		"his shirt=t&#257; de chènsh&#257;n",
		"her umbrella=t&#257; de s&#462;n",
		"their television=t&#257;men de diànshì",
		"the teacher's book=l&#462;osh&#299; de sh&#363;",
		"$",
		"one week ago=y&#299;gè x&#299;ngqí qián",
		"one week later=y&#299;gè x&#299;ngqí hòu",
		"two times a day=m&#283;iti&#257;n li&#462;ng cì",
		);
	$trans2=array(
		"sugar and spice=táng hé xi&#257;ngliào",
		"cookies and cream=b&#464;ngg&#257;n hé n&#462;iyóu",
		"fresh milk and honey=xi&#257;n niún&#462;i hé f&#275;ngmì",
		"love and marriage=àiqíng y&#468; h&#363;ny&#299;n",
		"ham and egg=hu&#466;tu&#464; hé j&#299;dàn",
		"cold juice or hot water=l&#283;ng zh&#299; huò rè shu&#464;",
		"*",
		"boat on the river=chuán zài hé shàng",
		"bird on the tree=ni&#462;o zài shù shàng",
		"book on the table=sh&#363; zài zhu&#333;zi shàngmiàn",
		"?",
		"my black dog=w&#466; de h&#275;i g&#466;u",
		"my white cat=w&#466; de bái m&#257;o",
		"my right hand=w&#466; de yòu sh&#466;u",
		"my older brother's name=w&#466; g&#275;g&#275; de míngzì",
		"your left hand=n&#464; de zu&#466; sh&#466;u",
		"your good teacher=n&#464; de h&#462;o l&#462;osh&#299;",
		"our new school=w&#466;men de x&#299;n xuéxiào",
		"his train ticket=t&#257; de hu&#466;ch&#275; piào",
		"her black hair=t&#257; de h&#275;i tóuf&#462;",
		"their big house=t&#257;men de dà fángzi",
		"the man's black car=nánrén de h&#275;i ch&#275;",
		);
	$trans3=$trans2;	
	}	


if ($_SESSION['level']=="Easy"){$trans=$trans1;}
else{$trans=$trans2;}

$noteshown="";

echo "<table border='0' cellspacing='0' cellpadding='0' align='center'><tr><td align='center'>";
echo "<font face='Times New Roman' style='font-size: 24pt; font-weight: 500' color='#222222'><br/>";
$count=count($trans)-1;
if ($topic=="number-noun"){
	for ($i=0; $i<=$count; $i+=1){
		if ($noteshown=="" and strpos($trans[$i],"used for")>0){
			echo "<img border='0' src='../images/tph-count-man2.jpg' width='426' height='193'><br/><br/>";
			$noteshown="yes";
			}	
		echo $trans[$i]."<br/>";
		if ($i!=($lim+1) and $i!=($count+1)){echo "<br/>";}
		}
	}
else{	
	for ($i=0; $i<=$count; $i+=1){
		if (strlen($trans[$i])==1){
			if ($topic=="adjective-noun"){echo "<br/><br/><img border='0' src='../images/tph-adj-man2.jpg' width='426' height='193'><br/><br/>";}
			if ($topic=="others" and $trans[$i]=="*"){echo "<br/><br/><img border='0' src='../images/tph-others-man2.jpg' width='426' height='193'><br/><br/>";}
			if ($topic=="others" and $trans[$i]=="?"){echo "<br/><br/><img border='0' src='../images/tph-others-man3.jpg' width='426' height='193'><br/><br/>";}
			if ($topic=="others" and $trans[$i]=="$"){echo "<br/><br/><img border='0' src='../images/tph-others-man4.jpg' width='426' height='193'><br/><br/>";}
			}
		else{		
			$word=$trans[$i];
			$pos=strpos($word,"=");
			$eng=substr($word,0,$pos);
			$man=substr($word,($pos+1));
			echo $man." - ".$eng."<br/>";
		}
	}
	}
echo "<br/></td></tr></table>";	

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
												
	<?php echo "<br/><br/><P align='center'><Input type = 'Submit' Name = 'Submit2' VALUE = 'Regenerate Tutorial'><br/><br/><br/><br/><br/><br/>";?>

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