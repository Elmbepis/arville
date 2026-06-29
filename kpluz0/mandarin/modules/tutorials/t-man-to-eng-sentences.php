<?php 
require '../../pass-chk.php';
?>

<?php
$topic="";
$topic=$_GET['topic']; 
if ($topic==""){$topic="dec";}
$stopic=$topic;
if ($stopic=="dec"){$stopic="Declarative";}		
if ($stopic=="int"){$stopic="Interrogative";}		
if ($stopic=="imp"){$stopic="Imperative";}		
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/css; charset=utf-8" />

<?php
echo "<title>Translating ".ucfirst($stopic)." Mandarin Sentences into English - Mandarin in KPluz.com</title>";
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

$action="t-man-to-eng-sentences.php?topic=".$topic;
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
echo ucfirst($stopic)." Sentences<br/>in Mandarin";
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
 
 
if ($topic=="dec"){
	$trans1=array(
		//first person
		"My name is Pedro.=W&#466; jiào Pedro.", 
		"My family name is Santos.=W&#466; xìng Santos.", 
		"My full name is Santos, Pedro.=W&#466; xìng Santos, jiào Pedro.", 
		"I am a student.=W&#466; shì xuésh&#275;ng.",
		"I am a doctor.=W&#466; shì y&#299;sh&#275;ng.",
		"I am fine.=W&#466; h&#283;n h&#462;o.",
		"I am happy.=W&#466; h&#283;n g&#257;oxìng.",
		"I am sad.=W&#466; h&#283;n sh&#257;ngx&#299;n.",
		"I am hungry.=W&#466; è le.",
		"I love you.=W&#466; ài n&#464;.",
		"I like you.=W&#466; x&#464;hu&#257;n n&#464;.",
		"I like it very much.=W&#466; h&#283;n x&#464;hu&#257;n.",
		"I like swimming.=W&#466; x&#464;hu&#257;n yóuy&#466;ng.",
		"I like to dance.=W&#466; x&#464;hu&#257;n tiàow&#468;.",
		"I like to read books.=W&#466; x&#464;hu&#257;n yuèdú de sh&#363;jí.",
		"I want to buy tea.=W&#466; yào m&#462;i chá.",
		"I want to buy a car.=W&#466; yào m&#462;i ch&#275;.",
		"I hate you.=W&#466; hèn n&#464;.",
		"I have a headache.=W&#466; tóuténg.",
		"I need coffee.=W&#466; x&#363;yào k&#257;f&#275;i.",
		"I play the guitar.=W&#466; dàn jít&#257;.",
		"I play the piano.=W&#466; dàn g&#257;ngqín.",
		"I play the violin.=W&#466; wán de shì xi&#462;otíqín.",
		"I ride a bicycle.=W&#466; qí zìxíngch&#275;.",
		"I agree with you.=W&#466; tóngyì nín.",
		"I do not agree.=W&#466; bù tóngyì",
		"I do not understand.=W&#466; bù míngbái.",
		"I do not know.=W&#466; bù zh&#299;dào.",
		//second person
		"You are a man.=N&#464; shì nánrén.",
		"You are a woman.=N&#464; shì n&#474;rén.", 
		"You are a student.=N&#464; shì xuésheng.",
		"You (formal) are a teacher.=Nín shì l&#462;osh&#299;.",
		"You (formal) are a doctor.=Nín shì y&#299;sh&#275;ng.",
		"You are beautiful.=N&#464; h&#283;n m&#283;ilì.",
		"You are handsome.=N&#464; h&#283;n y&#299;ngjùn.",
		"You eat noodles.=N&#464; ch&#299; miàntiáo.", 
		"Your book is thick.=N&#464; de sh&#363; h&#283;n hòu.",
		//third person
		"He (or she) is<br/>a doctor.=T&#257; shì y&#299;sh&#275;ng.",
		"He (or she) is<br/>a dentist.=T&#257; shì yáy&#299;.",
		"He (or she) is<br/>tall.=T&#257; h&#283;n g&#257;o.",
		"He (or she) is<br/>short.=T&#257; h&#283;n &#462;i.",
		"He (or she) has<br/>blue eyes.=T&#257; y&#466;u lánsè de y&#462;nj&#299;ng.",
		"He (or she) has<br/>black hair.=T&#257; y&#466;u h&#275;isè de tóuf&#462;.",
		"He (or she) likes<br/>horses.=T&#257; x&#464;hu&#257;n m&#462;.",
		"He (or she) wants<br/>to buy bread.=T&#257; yào m&#462;i miànb&#257;o.",
		"He (or she) is<br/>not fat.=T&#257; bù pàng.",
		"He (or she) is<br/>not tired.=T&#257; bù lèi.",
		"He (or she) is<br/>not smart.=T&#257; bù c&#333;ngmíng.",
		"He (or she) is<br/>not sad.=T&#257; bù sh&#257;ngx&#299;n.",
		"He (or she) does<br/>not like cats.=T&#257; bù x&#464;hu&#257;n m&#257;o.",
		"He (or she) does<br/>not eat rice.=T&#257; bù ch&#299; m&#464;fàn.",
		"This is a book.=Zhè shì sh&#363;.",
		"This is fast.=Zhè shì kuài.",
		"This is small.=Zhè shì xi&#462;o",
		"This is my right hand.=Zhè shì w&#466; de yòu sh&#466;u.",
		"This is my left hand.=Zhè shì w&#466; de zu&#466; sh&#466;u.",
		"The boy ate an apple.=Nánhái ch&#299; y&#299;gè pínggu&#466;.",
		"The book is there.=Sh&#363; zài nàl&#464;.",
		"The cup is over there.=B&#275;izi zài nàbian.",
		"The tea is here.=Chá zài zhèl&#464;.",
		"The notebook is over<br/>here.=B&#464;jìb&#283;n zài zhèbi&#257;n.",
		);
	$trans2=array(
		//first person
		"I am glad to meet you.=W&#466; h&#283;n g&#257;oxìng jiàn dào n&#464;.",
		"I am listening to music.=W&#466; zài t&#299;ng y&#299;nyuè.",	
		"I am very sorry.=W&#466; h&#283;n bàoqiàn.",
		"I am watching television.=W&#466; zài kàn diànshì.",	
		"I know a little Chinese.=W&#466; zh&#299;dào y&#299;di&#462;n zh&#333;ngguó rén.",
		"I like to play football.=W&#466; x&#464;hu&#257;n t&#299; zúqiú.",
		"I like to go to the<br/>swimming pool.=W&#466; x&#464;hu&#257;n qù yóuy&#466;ngchí.",
		"I like to go to the cinema.=W&#466; x&#464;hu&#257;n qù diàny&#464;ngyuàn.",
		"I like to go to the park.=W&#466; x&#464;hu&#257;n qù g&#333;ngyuán.",
		"I like to go shopping.=W&#466; x&#464;hu&#257;n qù guàngji&#275;.",
		"I want to buy a new cellphone.=W&#466; yào m&#462;i y&#299;gè x&#299;n sh&#466;uj&#299;.",
		"I know how to sing.=W&#466; zh&#299;dào z&#283;nme chàng.",
		"I know how to read.=W&#466; zh&#299;dào rúhé yuèdú.",
		"I don’t like big dogs.=W&#466; bù x&#464;huan dà de gòu.",
		"I don't know his(or her)<br/>name.=W&#466; bù zh&#299;dào t&#257; de míngzì.",
		//second person
		"You are a handsome man.=N&#464; shì y&#299;gè y&#299;ngjùn de nánrén.",
		"You are a very beautiful<br/>lawyer.=N&#464; shì y&#299;gè f&#275;icháng m&#283;ilì de l&#476;sh&#299;.",
		"You like bread and coffee.=N&#464; x&#464;hu&#257;n miànb&#257;o hé k&#257;f&#275;i.",
		"You like to eat rice.=N&#464; x&#464;hu&#257;n ch&#299; m&#464;fàn.",
		"You like to go to the garden=.N&#464; x&#464;hu&#257;n qù hu&#257;yuán.",
		//third person
		"He (or she) is<br/>my teacher.=T&#257; shì w&#466; de l&#462;osh&#299;.",
		"He (or she) is sitting<br/>in front of me.=T&#257; zuò zài w&#466; qiánmian.",
		"He (or she) is a very smart woman.=T&#257; shì y&#299;gè h&#283;n c&#333;ngmíng de n&#474;rén.",
		"He (or she) does not drink coffee.=T&#257; bù h&#275; k&#257;f&#275;i.",
		"My name is Peter.=W&#466; de míngzì shì Peter.", 
		"The bank is beside the<br/>post office.=Yínháng zài yóujú pángbi&#257;n.",
		"The book is on the left side.=Sh&#363; zài zu&#466;bi&#257;n.",
		"The book is on top of the<br/>table.=Zhè b&#283;n sh&#363; zài zhu&#333;zi shàng.",
		"The cat is under the chair.=Mào zài y&#464;zi xiàmian.",
		"The children are inside<br/>the school.=Háizimen zài xuéxiào l&#464;miàn.",
		"The dog is outside the<br/>house.=G&#466;u shì zài fángzi wàimiàn.",
		"The mayor works here.=Shì zh&#462;ng zài zhèl&#464; g&#333;ngzuò.",
		"They can not speak<br/>Chinese.=T&#257;men bù huì shu&#333; zh&#333;ngwén.",	
		"Today is my birthday.=J&#299;nti&#257;n shì w&#466; de sh&#275;ngrì.",
		);
	$trans3=array(
		"I have brought you a small present.=W&#466; y&#464;j&#299;ng g&#283;i n&#464; dài láile y&#299;gè xi&#462;o l&#464;wù.",
		"The tall man left in a hurry.=Nàge h&#283;n g&#257;o de nánrén c&#333;ngc&#333;ng de z&#466;ule.",
		"My friend works with her father.=W&#466; de péngy&#466;u de g&#333;ngzuò y&#468; t&#257; de fùq&#299;n.",
		"The young girl wore a long, white dress.=Zhège niánq&#299;ng de n&#474;hái chu&#257;nzhuó y&#299; jiàn zh&#462;ng zh&#462;ng de báisè l&#464;fú.",
		"The woman who lives there is my aunt.=Shuí zhù zài zhèl&#464; de n&#474;rén shì w&#466; de g&#363;g&#363;.", 
		);	
	}	
	
if ($topic=="int"){
	$trans1=array(
		"What is this?=Zhè shì shénme?",
		"What is your name?=N&#464; jiào shénme míngzì?",
		"What day is it?=J&#299;nti&#257;n shì shénme rìzi?",
		"What did you say?=N&#464; shu&#333; shénme?",
		"What do you want?=N&#464; yào shénme?",
		"Who is this?=Zhè shì shuí?",
		"Who is your friend?=Shuí shì n&#464; de péngy&#466;u?",
		"Who is your teacher?=Shuí shì n&#464; de l&#462;osh&#299;?",
		"Where are you?=N&#464; zài n&#462;l&#464;?",
		"Where do you live?=N&#464; zhù zài n&#462;l&#464;?",
		"Where do you work?=N&#464; zài n&#462;l&#464; g&#333;ngzuò?",
		"Where do you study?=N&#464; zài n&#462;l&#464; xuéxí?",
		"How much is this?=Zhège du&#333;sh&#462;o qián?",
		"How many do you want?=N&#464; yào du&#333;sh&#462;o?",
		"Is that true?=Shì zh&#275;n de ma?",
		"Is that necessary?=Shì bìyào de ma?",
		"Is he sleeping?=T&#257; shì shuìzhele ma?",
		"Are you a student?=N&#464; shì xuésh&#275;ng ma?",
		"Are you a doctor?=N&#464; shì y&#299;sh&#275;ng ma?",
		"Are you hungry?=N&#464; è le ma?",
		"Are you happy?=N&#464; kuàilè ma?",
		"Are you Chinese?=N&#464; shì zh&#333;ngguórén ma?",
		"Do you have a car?=N&#464; y&#466;u ch&#275; ma??",
		"Do you have questions?=N&#464; y&#466;u wèntí ma?",
		"Do you have coffee?=N&#464; y&#466;u k&#257;f&#275;i ma?",
		"Do you want to drink tea?=N&#464; yào h&#275; chá?",
		"Do you speak English?=N&#464; huì shu&#333; y&#299;ngy&#468; ma?",
		);
	$trans2=array(
		"What soup do you want?=N&#464; yào shénme t&#257;ng?",
		"When will you leave?=N&#464; shénme shíhòu lík&#257;i?",
		"When is your birthday?=N&#464; de sh&#275;ngrì shì shénme shíhou?",
		"Why are you sad?=N&#464; wèishéme sh&#257;ngx&#299;n?",
		"Would you help me?=N&#464; néng b&#257;ng w&#466; ma?",
		"Which color do you like?=N&#462; zh&#466;ng yánsè n&#464; x&#464;hu&#257;n?",
		"How much coffee do you drink?=N&#464; h&#275; du&#333;sh&#462;o k&#257;f&#275;i?",
		"How much money do you have?=N&#464; y&#466;u du&#333;sh&#462;o qián?",
		"May I ask you a question?=W&#466; k&#283;y&#464; wèn n&#464; y&#299;gè wèntí ma?",
		"Do you want some more<br/>pie?=N&#464; xi&#462;ng y&#466;u gèng du&#333; de xiàn b&#464;ng?",
		"Do you eat mangoes?=N&#464; ch&#299; mánggu&#466;?",
		"Does he (or she) play<br/>football?=T&#257; t&#299; zúqiú ma?",
		"Can I help you?=W&#466; k&#283;y&#464; b&#257;ng n&#464; ma?",
		"Can you say that again?=N&#464; néng zàishu&#333; y&#299;biàn ma?",
		"Can you speak more<br/>carefully?=Nín k&#283;y&#464; gèng z&#464;xì de shu&#333;huà?",
		);
	$trans3=array(
		"Do you prefer tea or coffee?=N&#464; x&#464;hu&#257;n h&#275; chá háishì k&#257;f&#275;i?",
		"What do you like doing in your free time?=N&#464; x&#464;hu&#257;n shénme zuò zài n&#464; de kòngxián shíji&#257;n?",
		);	
	}	

if ($topic=="imp"){
	$trans1=array(
		"Please shut the door!=Q&#464;ng gu&#257;nshàngle mén",
		"Give me the gate key.=G&#283;i w&#466; de mén yàoshi.", 
		"Clean your room.=D&#462;s&#462;o fángji&#257;n.",
		"Eat your dinner.=Ch&#299; n&#464; de w&#462;nc&#257;n.", 
		"Turn off the television.=Gu&#257;n diào diànshì.", 
		"Throw me the ball.=B&#462; w&#466; de qiú.", 
		"Don't talk.=Bù shu&#333;huà.", 
		"Pour me a glass of water.=W&#466; dàole y&#299;b&#275;i shu&#464;.",
		"Take me to the library.=Dài w&#466; qù túsh&#363;gu&#462;n.",
		"Give me some apples.=G&#283;i w&#466; y&#299;xi&#275; pínggu&#466;.", 
		"Go home early.=Z&#462;odi&#462;n huí ji&#257;.",
		"Please bring my umbrella.=Q&#464;ng b&#462; w&#466; de s&#462;n.", 
		);
	$trans2=array(
		"Leave your things here.=Liú xià n&#464; de d&#333;ngx&#299; zài zhèl&#464;.", 
		"Give me one of each.=M&#283;i rén g&#283;i w&#466; y&#299;gè.",
		"Don't talk while eating.=Y&#299;bi&#257;n ch&#299;fàn bù shu&#333;huà.",
		"Please tidy your room.=Q&#464;ng zh&#283;ngl&#464; n&#464; de fángji&#257;n.", 
		"Return the book to the<br/>library.=Sh&#363; hái g&#283;i túsh&#363;gu&#462;n.", 
		"Write a letter for her.=Xi&#283; xìn g&#283;i t&#257;.", 
		"Leave the package at the<br/>door.=Lík&#257;i b&#257;o zài ménk&#466;u.", 
		"Make yourself at home.=Zài zìj&#464; ji&#257; yì yàng.",
		);
	$trans3=array(
		"Keep your bag with you all the time.=Ràng n&#464; de b&#257;o b&#257;o hé n&#464; zài y&#299;q&#464; de shíji&#257;n.",
		);	
	}	


if ($_SESSION['level']=="Easy"){$trans=$trans1;}
else{$trans=$trans2;}

$noteshown="";
$noteshown2="";

echo "<table border='0' cellspacing='0' cellpadding='0' align='center'><tr><td align='center'>";
echo "<font face='Times New Roman' style='font-size: 22pt; font-weight: 500' color='#222222'><br/>";
$count=count($trans)-1;
for ($i=0; $i<=$count; $i+=1){
	if ($topic=="dec" and $noteshown=="" and strpos($trans[$i],"N&#464; ")>0){
		echo "<br/><img border='0' src='../images/ts-dec-man2.jpg' width='426' height='193'><br/><br/>";
		$noteshown="yes";
		}	
	if ($topic=="dec" and $noteshown=="yes" and $noteshown2=="" and strpos($trans[$i],"N&#464; ")<1 and strpos($trans[$i],"Nín ")<1){
		echo "<br/><img border='0' src='../images/ts-dec-man3.jpg' width='426' height='193'><br/><br/>";
		$noteshown2="yes";
		}	
	$word=$trans[$i];
	$word=str_replace("<br/>"," ",$word);
	$pos=strpos($word,"=");
	$eng=substr($word,0,$pos);
	$man=substr($word,($pos+1));
	echo $man."<br/>".$eng."<br/><br/>";
	}
echo "</td></tr></table>";	


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