<?php

$grd=$grd;
$title="Paggamit ng Wastong<br/>Aspekto ng Pandiwa";
$vio=$font."<font color='#800080'>";
$blue=$font."<font color='#0000CC'>";
$red=$font."<font color='#CC0000'>";
$black=$font."<font color='#000000'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:16pt;color:#0000BB'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#800080'>"; 
	$tfont5="<span lang='EN-US' style='font-size:16pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:26pt;color:#0000BB'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#800080'>"; 
	$tfont5="<span lang='EN-US' style='font-size:26pt;color:#BB0000'>"; 
	}

$article="
Alam na natin na ang pandiwa, o 'verb' sa wikang Ingles, ay isang bahagi ng pananalitang nagsasaad ng kilos o galaw. 
<br/><br/>
Ang kilos na isinasaad ng isang pandiwa ay maaaring tapos nang gawin, o ginagawa pa lamang sa kasalukuyan, o gagawin pa lamang sa hinaharap.
<br/><br/>
Ang aspekto ng isang pandiwa ay tumutukoy sa kung kailan nangyari, nangyayari, o mangyayari ang kilos na isinasaad nito. 
May tatlong aspekto ang pandiwa: pangnagdaan, pangkasalukuyan, at panghinaharap.
<br/><br/><br/>
@blue
Aspektong<br/>Pangnagdaan
@nblue
<br/><br/>
Ang aspektong pangnagdaan ng pandiwa ay tumutukoy sa kilos o galaw na nangyari o naganap na.
<br/><br/>
$vio<i>Si Melanie ay $red nagluto$vio ng adobong manok kahapon.</i>$black
<br/><br/>
Sa pangungusap sa itaas, ang pandiwang 'nagluto' ay may aspektong pangnagdaan dahil naganap na ang aksyong ito.
<br/><br/>
$red <i>Binalot$vio ni Helen ang kanyang regalo para kay Tomas.</i>$black
<br/><br/>
Sa pangungusap sa itaas, ang salitang 'binalot' ang pandiwang may aspektong pangnagdaan.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont4 Mga Halimbawa ng Pandiwang<br/>may Aspektong Pangnagdaan</b></td></tr><tr><td>&nbsp;</td></tr></table>
<br/>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1
gumawa, huminto, kumain, kumanta, lumiko, nag-aral, nagbantay, nagkalat, nagising, naglinis, nagsayaw, nagtanim, natulog, tumakbo, umalis, uminom, umulan
</tr>
</table>
<br/><br/>
@blue
Aspektong<br/>Pangkasalukuyan
@nblue
<br/><br/>
Ang aspektong pangkasalukuyan ng pandiwa ay tumutukoy sa kilos o galaw na nangyayari o nagaganap sa kasalukuyang panahon.
<br/><br/>
$vio<i>Si Roberto ay $red nagwawalis$vio ng bakuran sa mga sandaling ito.</i>$black
<br/><br/>
Sa pangungusap sa itaas, ang pandiwang 'nagwawalis' ay may aspektong pangkasalukuyan dahil patuloy na nagaganap ang aksyong ito sa kasalukuyang panahon.
<br/><br/>
$vio<i>Si Aling Metring ay $red nagtitinda$vio ng mga gulay at prutas sa palengke.</i>$black
<br/><br/>
Sa pangungusap sa itaas, ang salitang 'nagtitinda' ang pandiwang may aspektong pangkasalukuyan.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont4 Mga Halimbawa ng Pandiwang<br/>may Aspektong Pangnagdaan</b></td></tr><tr><td>&nbsp;</td></tr></table>
<br/>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1
gumagawa, humihinto, kumakain, kumakanta, lumiliko, nag-aaral, nagbabantay, nagkakalat, nagigising, naglilinis, nagsasayaw, nagtatanim, natutulog, tumatakbo, umaalis, umiinom, umuulan
</tr>
</table>
<br/><br/>
@blue
Aspektong<br/>Panghinaharap
@nblue
<br/><br/>
Ang aspektong panghinaharap ng pandiwa ay tumutukoy sa kilos o galaw na hindi pa nangyayari o nagaganap.
<br/><br/>
$red <i>Magdadala$vio ng mga bulaklak si Crispin sa darating na pista.</i>$black
<br/><br/>
Sa pangungusap sa itaas, ang pandiwang 'magdadala' ay may aspektong panghinaharap dahil hindi pa nagaganap ang aksyong ito.
<br/><br/>
$vio<i>Si Mang Kardo ay $red magtatayo$vio ng kubo sa kanilang bakuran.</i>$black
<br/><br/>
Sa pangungusap sa itaas, ang salitang 'magtatayo' ang pandiwang may aspektong panghinaharap.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont4 Mga Halimbawa ng Pandiwang<br/>may Aspektong Panghinaharap</b></td></tr><tr><td>&nbsp;</td></tr></table>
<br/>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1
gagawa, hihinto, kakain, kakanta, liliko, mag-aaral, magbabantay, magkakalat, magigising, maglilinis, magsasayaw, magtatanim, matutulog, tatakbo, aalis, iinom, uulan
</tr>
</table>
<br/><br/>
Makikita sa talaan sa ibaba ang mga iba't ibang aspekto ng ilang mga halimbawa ng pandiwa.
Pag-aralang mabuti kung paano ginamit ang mga panlapi upang mabuo ang mga aspekto ng pandiwa.
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont4 Ilang Mga Pandiwa<br/>at mga Aspekto ng mga Ito</b></td></tr><tr><td>&nbsp;</td></tr></table>
<br/>

<table width='900' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#FFFFF0' bordercolor='#FEDB9A'>
<tr>
<td align='center' width='25%' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont5 Ugat ng Pandiwa</td>
<td align='center' width='25%' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont5 Pangnag-daan</td>
<td align='center' width='25%' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont5 Pangkasa-lukuyan</td>
<td align='center' width='25%' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont5 Panghi-naharap</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 basa</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 binasa</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 binabasa</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 babasahin</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 bili</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 bumili</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 bumibili</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 bibili</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 buhat</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 nagbuhat</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 nagbubuhat</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 magbubuhat</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 dala</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 dinala</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 dinadala</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 dadalhin</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 hati</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 naghati</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 naghahati</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 maghahati</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 kayod</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 kinayod</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 kinakayod</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 kakayurin</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 lakad</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 naglakad</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 naglalakad</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 maglalakad</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 lumbay</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 nalumbay</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 nalulumbay</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 malulumbay</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 mithi</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 minithi</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 minimithi</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 mimithiin</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 pilit</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 pinilit</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 pinipilit</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 pipilitin</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 pitas</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 pumitas</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 pumipitas</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 pipitas</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 silaw</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 nasilaw</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 nasisilaw</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 masisilaw</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 sulat</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 nagsulat</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 nagsusulat</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 magsusulat</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 talon</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 tumalon</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 tumatalon</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 tatalon</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 tugtog</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 tumugtog</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 tumutugtog</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 tutugtog</td>
</tr>
<tr>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont3 tumba</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 tumumba</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 tumutumba</td>
<td align='center' style='padding-right:10px; padding-left:10px; padding-top:10px; padding-bottom:10px'>$tfont1 tutumba</td>
</tr>
</table>
<br/><br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont3 Pagsasanay </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='E7F5FC' bordercolor='#D8ECFF'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1
Hanapin ang bawa't pandiwa sa mga sumusunod na pangungusap at sabihin ang aspekto nito:<br/><br/>$tfont1
1. Kakainin na namin ang adobong niluto ni Nanay.<br/><br/> 
2. Nag-iipon ako ng pera ngayon dahil bibili ako ng bagong bisikleta.<br/><br/> 
3. Ipahihiram mo ba sa amin ang mga aklat na ibinigay sa iyo ni Mang Efren kahapon?<br/><br/> 
4. Mahuhulog ang tasang iyon dahil ipinatong mo roon sa mesang umuuga.<br/><br/> 
5. Nasasabik ako sa pagtitipong gaganapin bukas kaya bumili ako ng bagong damit na isusuot ko roon. 
</td>
</tr></table>
<br/><br/>
<table width='100%' align='center'><tr><td align='center'><b>$tfont4 Mga Sagot sa Pagsasanay </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='100%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#EEEEEE' bordercolor='#DDDDDD'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2
1. $red Kakainin (panghinaharap)$black na namin ang adobong $red niluto (pangnagdaan)$black ni Nanay.<br/><br/> 
2. $red Nag-iipon (pangkasalukuyan)$black ako ng pera ngayon dahil $red bibili (panghinaharap)$black ako ng bagong bisikleta.<br/><br/> 
3. $red Ipahihiram (panghinaharap)$black mo ba sa amin ang mga aklat na $red ibinigay (pangnagdaan)$black sa iyo ni Mang Efren kahapon?<br/><br/> 
4. $red Mahuhulog (panghinaharap)$black ang tasang iyon dahil $red ipinatong (pangnagdaan)$black mo roon sa mesang $red umuuga (pangkasalukuyan)$black.<br/><br/> 
5. $red Nasasabik (pangkasalukuyan)$black ako sa pagtitipong $red gaganapin (panghinaharap)$black bukas kaya $red bumili (pangnagdaan)$black ako ng bagong damit na $red isusuot (panghinaharap)$black ko roon. 
</td>
</tr></table>

";

?>

