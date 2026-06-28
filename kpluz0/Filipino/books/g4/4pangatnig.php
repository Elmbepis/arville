<?php

$grd=$grd;
$title="Wastong Paggamit<br/>ng Pangatnig";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#0000BB'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#800080'>"; 
	$tfont5="<span lang='EN-US' style='font-size:18pt;color:#0000BB'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	$tfont5="<span lang='EN-US' style='font-size:30pt;color:#0000BB'>"; 
	}

$article="
Ang pangatnig ay isang bahagi ng pananalitang nag-uugnay sa dalawang magkasunod na salita, parirala, o sugnay sa isang pangungusap.  Ito ang tinatawag na 'conjunction' sa salitang Ingles.
<br/><br/>
May dalawang pangkalahatang uri ng pangatnig: pangatnig na panimbang at pangatnig na pantulong.  Ginagamit ang pangatnig na panimbang kung magkatimbang ang mga pinag-uugnay. 
Ginagamit ang pangatnig na pantulong kung hindi magkatimbang ang mga pinag-uugnay.
<br/><br/>
May dalawang uri ang pangatnig na panimbang: pantuwang at pamukod.  May anim na uri naman ang pangatnig na pantulong: pananhi, panlinaw, paninsay, panubali, panapos, at panulad.
<br/><br/><br/>
@blue
Pangatnig na Pantuwang
@nblue
<br/><br/>
Ang pangatnig na pantuwang ay ginagamit sa pagdurugtong ng mga salita, parirala, o sugnay na dapat pagsama-samahin sa iisang diwa.  Ang mga halimbawa nito ay 'at', 'saka',  at 'pati'.
<br/><br/>$vio<i>
Sipag, tiyaga $red<i>at</i>$vio abilidad, $red<i>pati</i>$vio na rin ang suwerte, ang mga susi sa tagumpay sa negosyo.
</i>$black<br/><br/>
Sa pangungusap sa itaas, ang mga salitang 'at' at 'pati' ay mga pangatnig na pantuwang. 
<br/><br/><br/>
@blue
Pangatnig na Pamukod
@nblue
<br/><br/>
Ang pangatnig na pamukod ay ginagamit sa pagbubukod o pagtatangi.  Ang mga halimbawa nito ay 'o', 'ni', 'maging', at 'man'.
<br/><br/>$vio<i>
Gusto mo bang mamasyal na $red<i>o</i>$vio magpahinga muna?
</i>$black<br/><br/>
Sa pangungusap sa itaas, ang salitang 'o' ay isang pangatnig na pamukod.
<br/><br/><br/>
@blue
Pangatnig na Pananhi
@nblue
<br/><br/>
Ang pangatnig na pananhi ay ginagamit sa pagbibigay ng dahilan o katuwiran para sa isang kaganapan.  Ang mga halimbawa nito ay 'sapagkat', 'dahil sa', 'sanhi ng', at 'mangyari'.
<br/><br/>$vio<i>
Umapaw ang ilog kagabi $red<i>dahil sa</i>$vio malakas na bagyo.
</i>$black<br/><br/>
Sa pangungusap sa itaas, ang pariralang 'dahil sa' ay isang pangatnig na pananhi. 
<br/><br/><br/>
@blue
Pangatnig na Panlinaw
@nblue
<br/><br/>
Ang pangatnig na panlinaw ay ginagamit kung ang diwa ng unang bahagi ng pangungusap ay lalo pang mapapalinaw ng ikalawang bahagi nito.  Ang mga halimbawa nito ay 'kaya', 'kung gayon', at 'samakatwid'.
<br/><br/>$vio<i>
Sobrang init na naman ng panahon $red<i>kaya</i>$vio mabiling mabili ang tinda naming pampalamig.
</i>$black<br/><br/>
Sa pangungusap sa itaas, ang salitang 'kaya' ay isang pangatnig na panlinaw. 
<br/><br/><br/>
@blue
Pangatnig na Paninsay
@nblue
<br/><br/>
Ang pangatnig na paninsay ay ginagamit kung sinasalungat ng unang bahagi ng pangungusap ang ikalawang bahagi nito.  Ang mga halimbawa nito ay 'pero', 'ngunit', 'subalit', 'datapwat', 'kahit', 'bagaman', at 'samantala'.
<br/><br/>$vio<i>
Ibibili ko sana ng pantalon si Jericho $red<i>ngunit</i>$vio kulang pala ang aking pera.
</i>$black<br/><br/>
Sa pangungusap sa itaas, ang salitang 'ngunit' ay isang pangatnig na paninsay. 
<br/><br/><br/>
@blue
Pangatnig na Panubali
@nblue
<br/><br/>
Ang pangatnig na panubali ay ginagamit sa pagsasaad ng alinlangan.  Ang mga halimbawa nito ay 'kung', 'pag', 'kapag', at 'sakali'.
<br/><br/>$vio<i>
Hindi ako makakasama sa inyo $red<i>kung</i>$vio hindi ako papayagan ni Inay.
</i>$black<br/><br/>
Sa pangungusap sa itaas, ang salitang 'kung' ay isang pangatnig na panubali. 
<br/><br/><br/>
@blue
Pangatnig na Panapos
@nblue
<br/><br/>
Ang pangatnig na panapos ay ginagamit sa pagpapahiwatig na malapit nang matapos ang sinasabing mensahe. 
<br/><br/>$vio<i>
Natapos ko na rin $red<i>sa wakas</i>$vio ang aking trabaho.
</i>$black<br/><br/>
Sa pangungusap sa itaas, ang pariralang 'sa wakas' ay isang pangatnig na panapos. 
<br/><br/><br/>
@blue
Pangatnig na Panulad
@nblue
<br/><br/>
Ang pangatnig na panulad ay mga pariralang magkatugon na ginagamit sa pagtutulad.  Ang mga halimbawa nito ay 'kung sino...siya', 'kung ano...siya', at 'kung gaano...siya'.
<br/><br/>$vio<i>
$red<i>Kung ano</i>$vio ang iyong itinanim, $red<i>siya</i>$vio rin ang iyong aanihin.
</i>$black<br/><br/>
Sa pangungusap sa itaas, ang mga salitang 'kung ano' at 'siya' ang bumubuo ng pangatnig na panulad. 
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Pagsasanay </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='E7F5FC' bordercolor='#D8ECFF'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1
Piliin ang pinakaangkop na pangatnig sa mga sumusunod na pangungusap:<br/><br/>$tfont1
1. Umuulan kanina $blue(ngunit, kung, kaya)$black nagdala ako ng payong.<br/><br/> 
2. Hindi ka dapat sumama sa kanila $blue(ngunit, kung, kaya)$black ikaw ay nilalagnat.<br/><br/> 
3. Bibili sana ako ng kutsinta $blue(ngunit, kung, kaya)$black kulang pala ang dala kong pera.<br/><br/> 
4. Hindi na sapat ang aking kinikita $blue(kahit, dahil, saka)$black mataas na ang mga bilihin ngayon.<br/><br/> 
5. Mahusay pa palang maglaro ng basketbol ang lolo mo $blue(kahit, dahil, saka)$black matanda na siya.<br/><br/> 
6. Kailangan mong mag-aral $blue(kahit, dahil, saka)$black matulog nang maaga kung nais mong makakuha ng mataas na marka sa pagsusulit bukas. 
</td>
</tr></table>
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont4 Mga Sagot sa Pagsasanay </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#EEEEEE' bordercolor='#DDDDDD'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2
1. Umuulan kanina $red kaya $black nagdala ako ng payong.<br/><br/> 
2. Hindi ka dapat sumama sa kanila $red kung $black ikaw ay nilalagnat.<br/><br/> 
3. Bibili sana ako ng kutsinta $red ngunit $black kulang pala ang dala kong pera.<br/><br/> 
4. Hindi na sapat ang aking kinikita $red dahil $black mataas na ang mga bilihin ngayon.<br/><br/> 
5. Mahusay pa palang maglaro ng basketbol ang lolo mo $red kahit $black matanda na siya.<br/><br/> 
6. Kailangan mong mag-aral $red saka $black matulog nang maaga kung nais mong makakuha ng mataas na marka sa pagsusulit bukas. 
</td>
</tr></table>
";
?>
