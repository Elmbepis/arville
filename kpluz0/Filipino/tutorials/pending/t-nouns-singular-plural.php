<?php 
//Checks if there is a login cookie
if(isset($_COOKIE['KPluzID_my_site']) and isset($_COOKIE['KPluzKey_my_site']) )
//if there is a cookie, require a log-in if the password is invalid
{ 
	$username = $_COOKIE['KPluzID_my_site']; 
	$pass = $_COOKIE['KPluzKey_my_site'];
 	$kpluzbase = 9876+ord(substr($username,0,1))*ord(substr($username,2,1))*318+ord(substr($username,1,1))*ord(substr($username,3,1))*1113+substr($username,4,1)*substr($username,5,1)*825+substr($username,6,1)*substr($username,7,1)*115+ord(substr($username,0,1))*substr($username,6,1)*712+substr($username,7,1)*substr($username,7,1)*16*1989;
	$validpass0=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1234+234;
	$validpass1=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1345+345;
	$validpass2=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1456+456;
	$validpass3=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1567+567;
	$validpass4=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1678+678;
	$validpass5=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*1789+789;
	$validpass6=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2123+987;
	$validpass7=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2234+876;
	$validpass8=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2345+765;
	$validpass9=$kpluzbase+ord(substr($username,0,1))*(substr($username,4,1)+1)*(substr($username,5,1)+1)*2456+654;
	$validpass10=$kpluzbase+ord(substr($username,0,1))*ord(substr($username,4,1))*(substr($username,5,1)+1)*2567+543;
	
	if ($pass==$validpass0){$grd=0;}			
	if ($pass==$validpass1){$grd=1;}			
	if ($pass==$validpass2){$grd=2;}			
	if ($pass==$validpass3){$grd=3;}			
	if ($pass==$validpass4){$grd=4;}			
	if ($pass==$validpass5){$grd=5;}			
	if ($pass==$validpass6){$grd=6;}			
	if ($pass==$validpass7){$grd=7;}			
	if ($pass==$validpass8){$grd=8;}			
	if ($pass==$validpass9){$grd=9;}			
	if ($pass==$validpass10){$grd=10;}			
	
	if (
		$pass != $validpass0 and $pass != $validpass1 and $pass != $validpass2 and $pass != $validpass3 and $pass != $validpass4 and $pass != $validpass5 
		and $pass != $validpass6 and $pass != $validpass7 and $pass != $validpass8 and $pass != $validpass9 and $pass != $validpass10
		) 
		
	{
	header("Location: /logout.php"); 
	}
	
	
}
//if there is no cookie, require a log-in
else
	{
	header("Location: /login.php"); 
	}
session_start();
if ($_SESSION['level']=="")
{$_SESSION['level']="Easy";}
?>




<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Singular and Plural Nouns - Filipino sa KPluz.com</title>
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

<body bgcolor="#333333" background="../../bg-home.jpg" onload="FP_preloadImgs(/*url*/'button5.jpg',/*url*/'button6.jpg',/*url*/'../images/tutorial-bottomd.jpg',/*url*/'images/backb.jpg',/*url*/'../images/3c.jpg',/*url*/'../images/3b.jpg',/*url*/'../images/4c.jpg',/*url*/'../images/4b.jpg',/*url*/'../images/5c.jpg',/*url*/'../images/5b.jpg',/*url*/'../images/6c.jpg',/*url*/'../images/6b.jpg',/*url*/'../images/inner-logout-2c.jpg',/*url*/'../images/inner-logout-2b.jpg')">

<div align="center">
	<div align="center">
		<table border="0" width="800" cellspacing="0" cellpadding="0" id="table7">
			<tr>
				<td>
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table112">
					<tr>
						<td width="263" valign="top">
						<img border="0" src="../../images/1.jpg"></td>
						<td>
						<img border="0" src="../../images/2.jpg"><table border="0" width="100%" cellspacing="0" cellpadding="0" id="table113">
									<tr>
										<td width="145">
										<a href="/home-filipino.php">
										<img border="0" id="img1" src="../../images/3a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/3b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/3a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'../../images/3c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'../../images/3b.jpg')"></a></td>
										<td width="140">
										<a href="/what-is-kpluz.php">
										<img border="0" id="img2" src="../../images/4a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/4b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/4a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'../../images/4c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'../../images/4b.jpg')"></a></td>
										<td width="139">
										<a href="/join-kpluz.php">
										<img border="0" id="img3" src="../../images/5a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/5b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/5a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'../../images/5c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'../../images/5b.jpg')"></a></td>
										<td>
										<a href="/contact.php">
										<img border="0" id="img4" src="../../images/6a.jpg" alt="Button Text" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/6b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/6a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img4',/*url*/'../../images/6c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img4',/*url*/'../../images/6b.jpg')"></a></td>
									</tr>
								</table>
						</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td valign="top">
			<img border="0" src="../images/7.jpg" width="800" height="16"></td>
			</tr>
			<tr>
				<td>
				<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table61">
					<tr>
						<td width="264" valign="top" background="../images/inner-left-spacer.jpg">
			<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table90">
				<tr>
					<td>
					<img border="0" src="../images/inner-left-top-2.jpg" width="264" height="47"></td>
				</tr>
				<tr>
					<td>
					<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table91">
						<tr>
							<td width="67">
							<img border="0" src="../images/inner-logout-left-2.jpg" width="67" height="40"></td>
							<td width="143">
							<a href="/logout.php">
							<img border="0" id="img5" src="../images/inner-logout-2a.jpg" height="40" width="143" alt="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'../images/inner-logout-2b.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'../images/inner-logout-2a.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'../images/inner-logout-2c.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'../images/inner-logout-2b.jpg')" fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text"></a></td>
							<td>
							<img border="0" src="../images/inner-logout-right-2.jpg" width="54" height="40"></td>
						</tr>
					</table>
					</td>
				</tr>
				<tr>
					<td background="../images/inner-logout-bottom-2.jpg" height="83">
					&nbsp;</td>
				</tr>
				</table>
						</td>
						<td valign="top" background="../images/inner-right-spacer.jpg">
						<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table64">
				<tr>
<?php	
			if ($grd<7){
				echo "<td background='../images/inner-main.jpg' height='170'>&nbsp;</td>";
				}
			else{
				echo "<td background='../images/high-header.jpg' height='170'>&nbsp;</td>";
				}
?>				
				</tr>
				</table>
						</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>
				<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table32">
					<tr>
						<td>
						<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table51">
							<tr>
								<td height="82" valign="bottom">
								<img border="0" src="images/tutorial-top.jpg"></td>
							</tr>
							<tr>
								<td valign="bottom" background="tutorial-content.jpg">
								<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table110">
									<tr>
										<td height="64" valign="bottom" background="images/tutorial-title.jpg">
										<p align="center" style="margin-top: 50px; margin-bottom: 0; margin-left:120px; margin-right:100px">
										<span style="font-weight: 700">
										<font face="Arial" style="font-size: 22pt" color="#990000">
										Singular and Plural Nouns&nbsp; </font>
										</span></p>
										</td>
									</tr>
									<tr>
										<td valign="top" background="images/tutorial-content.jpg">
										<div align="center">
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp;
											</font></p>
<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp;&nbsp;
											</font></p>
																	<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	Countable nouns 
																	are nouns 
																	that can be 
																	counted.&nbsp; 
																	Countable 
																	nouns can be 
																	classified 
																	into either 
																	singular 
																	nouns or 
																	plural 
																	nouns.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	&nbsp;</p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	Singular 
																	nouns are 
																	nouns that 
																	refer to a 
																	single 
																	person, 
																	place, or 
																	object. On 
																	the other 
																	hand, plural 
																	nouns are 
																	nouns that 
																	refer to 
																	more than 
																	one person, 
																	place, or 
																	object.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<table border="0" width="370" cellspacing="0" cellpadding="0">
												<tr>
													<td>
													<font face="Comic Sans MS" style="font-size: 13pt">
													<img border="0" src="images/note-top.jpg" width="370" height="44"></font></td>
												</tr>
												<tr>
													<td background="images/note-middle.jpg" width="370">
											<p style="margin-left: 40px; margin-right: 35px; margin-top: 0; margin-bottom: 0" align="center">
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	That
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	farm</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	has many
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	chickens</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080">
																	and 
																	</font>
																	<font face="Comic Sans MS" style="font-size: 14pt" color="#990000">
																	goats</font><font face="Comic Sans MS" style="font-size: 14pt" color="#000080">.</font></p>
													</td>
												</tr>
												<tr>
													<td >
<font face="Comic Sans MS" style="font-size: 13pt">
<img border="0" src="images/note-bottom.jpg"></font></td>
												</tr>
												</table>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	In the 
																	sentence 
																	above, the 
																	word
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'farm'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	is a 
																	singular 
																	noun while 
																	the words
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'chickens'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	and </font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	'goats'</font><font face="Comic Sans MS" style="font-size: 13pt" color="#333333"> 
																	are 
																	plural 
																	nouns.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	For most 
																	nouns, the 
																	plural form 
																	is made by 
																	simply 
																	adding an 
																	's' at the 
																	end of the 
																	singular 
																	noun.&nbsp; 
																	For example, 
																	the plural 
																	form of the 
																	noun 'dog' 
																	is 'dogs'.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	plural nouns 
																	formed by 
																	adding 's'</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	to the 
																	singular 
																	noun:</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt">&nbsp; </font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	&quot;ants&quot;, 
																	&quot;arms&quot;, 
																	&quot;apples&quot;, 
																	&quot;balls&quot;, 
																	&quot;barns&quot;, 
																	&quot;beads&quot;, 
																	&quot;beaks&quot;,&nbsp; 
																	&quot;beans&quot;, 
																	&quot;bears&quot;, 
																	&quot;beds&quot;, 
																	&quot;bells&quot;, 
																	&quot;birds&quot;, 
																	&quot;bones&quot;, 
																	&quot;boats&quot;, 
																	&quot;boys&quot;, 
																	&quot;books&quot;, 
																	&quot;boots&quot;, 
																	&quot;breads&quot;, 
																	&quot;buns&quot;, 
																	&quot;cars&quot;, 
																	&quot;cards&quot;, 
																	&quot;carts&quot;, 
																	&quot;camps&quot;, 
																	&quot;cats&quot;, 
																	&quot;cents&quot;, 
																	&quot;chicks&quot;, 
																	&quot;coins&quot;, 
																	&quot;corns&quot;, 
																	&quot;cribs&quot;, 
																	&quot;cups&quot;, 
																	&quot;chairs&quot;, 
																	&quot;dogs&quot;, 
																	&quot;desks&quot;, 
																	&quot;drums&quot;, 
																	&quot;doors&quot;, 
																	&quot;ears&quot;, 
																	&quot;eyes&quot;, 
																	&quot;fans&quot;, 
																	&quot;farms&quot;, 
																	&quot;fathers&quot;, 
																	&quot;frogs&quot;, 
																	&quot;girls&quot;, 
																	&quot;gums&quot;, 
																	&quot;hats&quot;, 
																	&quot;heads&quot;, 
																	&quot;hens&quot;, 
																	&quot;jars&quot;, 
																	&quot;jugs&quot;, 
																	&quot;keys&quot;, 
																	&quot;kings&quot;, 
																	&quot;kites&quot;, 
																	&quot;lamps&quot;, 
																	&quot;lions&quot;, 
																	&quot;meals&quot;, 
																	&quot;mats&quot;, 
																	&quot;mothers&quot;, 
																	&quot;nails&quot;, 
																	&quot;noses&quot;, 
																	&quot;owls&quot;, 
																	&quot;pails&quot;, 
																	&quot;parks&quot;, 
																	&quot;pears&quot;, 
																	&quot;pencils&quot;, 
																	&quot;pens&quot;, 
																	&quot;pigs&quot;, 
																	&quot;pillows&quot;, 
																	&quot;rabbits&quot;, 
																	&quot;seas&quot;, 
																	&quot;singers&quot;, 
																	&quot;sisters&quot;, 
																	&quot;songs&quot;, 
																	&quot;shoes&quot;, 
																	&quot;suns&quot;, 
																	&quot;toys&quot;, 
																	&quot;trees&quot;, 
																	&quot;tigers&quot;, 
																	&quot;trays&quot;, 
																	&quot;trips&quot;, 
																	&quot;trucks&quot;, 
																	&quot;twigs&quot;, 
																	&quot;uncles&quot;, 
																	&quot;vases&quot;, 
																	&quot;walls&quot;, 
																	&quot;wigs&quot;, 
																	&quot;yards&quot;, 
																	&quot;zoos&quot;<br>
&nbsp; <br>
																	The plural 
																	form of most 
																	nouns that 
																	end in 'ch', 
																	'x', 's', or 
																	an 's' sound 
																	is made by 
																	simply 
																	adding 'es' 
																	at the end 
																	of the 
																	singular 
																	noun. For 
																	example, the 
																	plural form 
																	of the noun 
																	'branch' is 
																	'branches'.<br>
&nbsp; <br>
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	plural nouns 
																	formed by 
																	adding 'es'<br>
																	to the 
																	singular 
																	noun:<br>
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	<br>
																	&quot;ashes&quot;, 
																	&quot;atlases&quot;, 
																	&quot;axes&quot;, 
																	&quot;beaches&quot;, 
																	&quot;benches&quot;, 
																	&quot;bonuses&quot;, 
																	&quot;bosses&quot;, 
																	&quot;boxes&quot;, 
																	&quot;brushes&quot;, 
																	&quot;bunches&quot;, 
																	&quot;buses&quot;, 
																	&quot;catches&quot;, 
																	&quot;churches&quot;, 
																	&quot;circuses&quot;, 
																	&quot;classes&quot;, 
																	&quot;coaches&quot;, 
																	&quot;crosses&quot;, 
																	&quot;eyeglasses&quot;, 
																	&quot;eyelashes&quot;, 
																	&quot;foxes&quot;, 
																	&quot;glasses&quot;, 
																	&quot;grasses&quot;, 
																	&quot;hisses&quot;, 
																	&quot;kisses&quot;, 
																	&quot;losses&quot;, 
																	&quot;lunches&quot;, 
																	&quot;mailboxes&quot;, 
																	&quot;marches&quot;, 
																	&quot;matches&quot;, 
																	&quot;peaches&quot;, 
																	&quot;splashes&quot;, 
																	&quot;stitches&quot;, 
																	&quot;sunglasses&quot;, 
																	&quot;taxes&quot;,&nbsp; 
																	&quot;toothbrushes&quot;, 
																	&quot;touches&quot;, 
																	&quot;waxes&quot;, 
																	&quot;wishes&quot;<br>
&nbsp;</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	The plural 
																	form of many 
																	nouns that 
																	end in a 'y' 
																	is made by 
																	simply 
																	replacing 
																	the 'y' with 
																	'ies'. For 
																	example, the 
																	plural form 
																	of the noun 
																	'city' is 
																	'cities'.<br>
																	<br>
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	plural nouns 
																	formed by 
																	replacing 
																	the 'y'<br>
																	ending of 
																	the singular 
																	noun with 'ies':<br>
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	<br>
																	&quot;armies&quot;, 
																	&quot;babies&quot;, 
																	&quot;bakeries&quot;, 
																	&quot;bellies&quot;, 
																	&quot;berries&quot;, 
																	&quot;bodies&quot;, 
																	&quot;buddies&quot;, 
																	&quot;bunnies&quot;, 
																	&quot;butterflies&quot;, 
																	&quot;canaries&quot;, 
																	&quot;candies&quot;, 
																	&quot;cherries&quot;, 
																	&quot;cities&quot;, 
																	&quot;copies&quot;, 
																	&quot;countries&quot;, 
																	&quot;daisies&quot;, 
																	&quot;diaries&quot;, 
																	&quot;duties&quot;, 
																	&quot;eateries&quot;, 
																	&quot;enemies&quot;, 
																	&quot;energies&quot;, 
																	&quot;entries&quot;, 
																	&quot;fairies&quot;, 
																	&quot;families&quot;, 
																	&quot;fantasies&quot;, 
																	&quot;ferries&quot;, 
																	&quot;flies&quot;, 
																	&quot;fillies&quot;, 
																	&quot;fireflies&quot;, 
																	&quot;galaxies&quot;, 
																	&quot;groceries&quot;, 
																	&quot;hobbies&quot;, 
																	&quot;houseflies&quot;, 
																	&quot;ivories&quot;, 
																	&quot;jellies&quot;, 
																	&quot;ladies&quot;, 
																	&quot;lilies&quot;, 
																	&quot;lobbies&quot;, 
																	&quot;melodies&quot;, 
																	&quot;memories&quot;, 
																	&quot;mummies&quot;, 
																	&quot;nannies&quot;, 
																	&quot;parties&quot;, 
																	&quot;pastries&quot;, 
																	&quot;patties&quot;, 
																	&quot;pennies&quot;, 
																	&quot;ponies&quot;, 
																	&quot;puppies&quot;, 
																	&quot;rallies&quot;, 
																	&quot;replies&quot;, 
																	&quot;rosaries&quot;, 
																	&quot;rubies&quot;, 
																	&quot;skies&quot;, 
																	&quot;stories&quot;</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp;
																	</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	Some nouns 
																	have special 
																	plural forms 
																	that simply 
																	have to be 
																	memorized.&nbsp; 
																	For example, 
																	the plural 
																	form of the 
																	noun 'man' 
																	is 'men'.</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0" align="justify">
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	<br>
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#990000">
																	Examples of 
																	special 
																	plural forms 
																	of nouns:<br>
																	</font>
																	<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">
																	<br>
																	&quot;analyses&quot;, 
																	&quot;antennae&quot;, 
																	&quot;appendices&quot;, 
																	&quot;axes&quot;, 
																	&quot;bacteria&quot;,&nbsp; 
																	&quot;cacti&quot;, 
																	&quot;cavemen&quot;, 
																	&quot;chairmen&quot;, 
																	&quot;children&quot;, 
																	&quot;crises&quot;,&nbsp; 
																	&quot;criteria&quot;, 
																	&quot;curricula&quot;, 
																	&quot;data&quot;, 
																	&quot;deer&quot;, 
																	&quot;diagnoses&quot;, 
																	&quot;firemen&quot;, 
																	&quot;fish&quot;, 
																	&quot;fishermen&quot;, 
																	&quot;foci&quot;, 
																	&quot;feet&quot;, 
																	&quot;formulae&quot;, 
																	&quot;fungi&quot;, 
																	&quot;genera&quot;, 
																	&quot;godchildren&quot;, 
																	&quot;geese&quot;, 
																	&quot;grandchildren&quot;, 
																	&quot;hooves&quot;, 
																	&quot;hypotheses&quot;, 
																	&quot;indices&quot;, 
																	&quot;leaves&quot;, 
																	&quot;lives&quot;, 
																	&quot;loaves&quot;, 
																	&quot;lice&quot;, 
																	&quot;luck&quot;, 
																	&quot;lumber&quot;, 
																	&quot;mailmen&quot;, 
																	&quot;man-men&quot;, 
																	&quot;matrices&quot;, 
																	&quot;media&quot;, 
																	&quot;mice&quot;, 
																	&quot;nuclei&quot;, 
																	&quot;oases&quot;, 
																	&quot;oxen&quot;, 
																	&quot;phenomena&quot;, 
																	&quot;policemen&quot;, 
																	&quot;radii&quot;, 
																	&quot;scarves&quot;, 
																	&quot;seamen&quot;, 
																	&quot;sheep&quot;,&nbsp; 
																	&quot;species&quot;, 
																	&quot;stimuli&quot;, 
																	&quot;strata&quot;, 
																	&quot;theses&quot;, 
																	&quot;teeth&quot;, 
																	&quot;wives&quot;, 
																	&quot;women&quot;</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp;&nbsp;
											</font></p>
											<p style="margin-left: 120px; margin-right: 100px; margin-top: 0; margin-bottom: 0">
											<font face="Comic Sans MS" style="font-size: 13pt">&nbsp;&nbsp;
											</font></p>
											<p style="margin-top: 10px; margin-bottom: 0" align="center">
											<font face="Comic Sans MS" style="font-size: 13pt" color="#333333">&nbsp; &nbsp;&nbsp;&nbsp;</font><font face="Comic Sans MS" style="font-size: 13pt"><a href="tutorials.php"><img border="0" id="img8" src="images/backa.jpg" alt="Button Text" onmouseover="FP_swapImg(1,0,/*id*/'img8',/*url*/'images/backb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img8',/*url*/'images/backa.jpg')"  fp-style="fp-btn: Border Bottom 1; fp-orig: 0" fp-title="Button Text"></a></font></p>
										</div>
										</td>
									</tr>
								</table>
								<img border="0" src="images/tutorial-bottom.jpg" width="800" ></td>
							</tr>
							</table>
						</td>
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
				<img border="0" src="../images/footer.jpg"></td>
			</tr>
			<tr>
				<td height="33">
			<p align="center" style="margin-top: 5px; margin-bottom: 5px">
            <font style="font-size: 10pt"><span style="mso-spacerun: yes">
			<font face="Arial" color="#C2EBC2">
            Copyright © 2010
        </font><b><font face="Arial" color="#365669">
        	<a href="../home.php"><font color="#FFFF99">MathPluz.com</font></a></font></b><font face="Arial" color="#C2EBC2">. 
			All Rights Reserved.</font></span></font></p>
				</td>
			</tr>
			</table>
	</div>
</div>

</body>

</html>