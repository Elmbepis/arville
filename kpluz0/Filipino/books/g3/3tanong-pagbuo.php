<?php

$grd=$grd;
$title="Pagbuo ng mga Tanong";
$red="<font color='#CC0000'>";
$vio="<font color='#800080'>";
$blue="<font color='#0000CC'>";
$black="<font color='#000000'>";

if (isset($format) and $format==1){
	$tfont1="<span lang='EN-US' style='font-size:18pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:16pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:20pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:18pt;color:#BB0000'>"; 
	}
else{
	$tfont1="<span lang='EN-US' style='font-size:30pt;color:#000000'>"; 
	$tfont2="<span lang='EN-US' style='font-size:26pt;color:#000000'>"; 
	$tfont3="<span lang='EN-US' style='font-size:32pt;color:#800080'>"; 
	$tfont4="<span lang='EN-US' style='font-size:30pt;color:#BB0000'>"; 
	}

$article="
Mahalagang matutunan ng bawa't mag-aaral ang pagbuo ng mga tanong tungkol sa isang nabasa o napakinggang teksto.
Sa araling ito, tatalakayin natin kung paano bumuo ng mga tanong sa wikang Filipino.
<br/><br/>
May dalawang uri ng tanong: mga tanong na nasasagot ng 'oo' o 'hindi' at mga tanong na nasasagot ng kaalaman o impormasyon.
Tingnan natin ang kanilang pagkakaiba.
<br/><br/><br/>
@blue
Mga Tanong na Nasasagot<br/>ng 'Oo' o 'Hindi'
@nblue
<br/><br/>
Maraming tanong ang maaaring sagutin ng 'oo' o 'hindi'.
Tingnan natin ang ilang mga halimbawa ng mga tanong na may ganitong uri.
<br/><br/>
1. $vio<i>Kumain na $red ba$vio kayo?</i>$black<br/>
2. $vio<i>Tiya mo $red ba$vio si Aling Edna?</i>$black<br/>
3. $vio<i>Umuwi na $red ba$vio sina Jonathan?</i>$black<br/>
4. $vio<i>Malayo $red ba$vio ang simbahan?</i>$black<br/>
5. $vio<i>Mababait $red ba$vio ang mga kalaro ninyo?</i>$black
<br/><br/>
Ang lahat ng mga tanong sa itaas ay maaaring sagutin ng 'oo' o 'hindi.'
Pansinin na ang bawat isa sa kanila ay may salitang 'ba' sa pagitan ng simuno at panaguri ng pangungusap.
<br/><br/>
Maaari ring baligtarin ang ayos simuno at panaguri sa isang tanong na nasasagot ng 'oo' o 'hindi'.
Pareho pa rin ang magiging kaisipan nito basta nasa pagitan ng simuno at panaguri ang salitang 'ba'.
Subukan nating gawin ito sa mga tanong sa itaas.
<br/><br/>
1. $vio<i>Kayo $red ba ay$vio kumain na?</i>$black<br/>
2. $vio<i>Si Aling Edna $red ba ay$vio tiya mo?</i>$black<br/>
3. $vio<i>Sina Jonathan $red ba ay$vio umuwi na?</i>$black<br/>
4. $vio<i>Ang simbahan $red ba ay$vio malayo?</i>$black<br/>
5. $vio<i>Ang mga kalaro n'yo $red ba ay$vio mababait?</i>$black
<br/><br/>
Pansinin mula sa mga halimbawa sa itaas na kailangan nang lagyan ng salitang 'ay' ang simula ng panaguri kung ang simuno ay nasa unahan ng tanong.
Samakatuwid, ang salitang 'ay' ay magiging kasunod ng salitang 'ba' kaya ang mahahanap sa pagitan ng simuno at panaguri ay ang katagang 'ba ay'.
<br/><br/>
Ganito pa rin ang anyo ng tanong kung ang simuno ay nasa unahan kahit na may layon ang pandiwa ng panaguri.
<br/><br/>
$vio<i>Si Mang Pedro $red ba ay$vio uminom ng mainit na kape?</i>$black
<br/><br/>
Sa pangungusap sa itaas, ang pandiwang 'uminom' ay may layong 'mainit na kape'.
Dahil nasa unahan ng tanong ang simuno ('Mang Pedro'), ang katagang 'ba ay' ay inilagay pa rin sa pagitan ng simuno at panaguri.
<br/><br/>
Kung ang pandiwa ng panaguri ay may layon at ang panaguri ay nasa unahan ng tanong, karaniwang inilalagay ang salitang 'ba' sa pagitan ng pandiwa at layon nito.
<br/><br/>
$vio<i>Uminom $red ba$vio ng mainit na kape si Mang Pedro?</i>$black
<br/><br/>
Sa pangungusap sa itaas, ang pandiwang 'uminom' ay may layong 'mainit na kape' kaya ang salitang 'ba' ay isiningit sa pagitan ng dalawang ito.
<br/><br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont3 Unang Pagsasanay </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='E7F5FC' bordercolor='#D8ECFF'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1
Bumuo ng tanong na masasagot ng 'oo'  o 'hindi' mula sa bawat pangungusap sa ibaba.<br/><br/>$tfont1
1. Sina Prinsipe Alfonso at Prinsipe Reynaldo ay nag-away.<br/><br/> 
2. Si Mang Gorio ay bumili ng tinapay sa tindahan.<br/><br/> 
3. Nagluto ng adobong baboy si Josephine.<br/><br/> 
4. Gumawa ng laruan ang kanyang kuya.<br/><br/> 
5. Isinauli ni Rene ang mga aklat. 
</td>
</tr></table>
<br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont4 Mga Sagot sa<br/>Unang Pagsasanay </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#EEEEEE' bordercolor='#DDDDDD'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2
1. Nag-away $red ba $black sina Prinsipe Alfonso at Prinsipe Reynaldo? $blue o$black<br/>
1. Sina Prinsipe Alfonso at Prinsipe Reynaldo$red ba ay $black nag-away?
<br/><br/> 
2. Bumili $red ba $black ng tinapay sa tindahan si Mang Gorio? $blue o$black<br/> 
2. Si Mang Gorio $red ba ay $black bumili ng tinapay sa tindahan?
<br/><br/> 
3. Nagluto $red ba $black ng adobong baboy si Josephine? $blue o$black<br/> 
3. Si Josephine $red ba ay $black nagluto ng adobong baboy?
<br/><br/> 
4. Gumawa $red ba $black ng laruan ang kanyang kuya? $blue o$black<br/> 
4. Ang kanyang kuya $red ba ay $black gumawa ng laruan?
<br/><br/> 
5. Isinauli $red ba $black ni Rene ang mga aklat? $blue o$black<br/>
5. Ang mga aklat $red ba ay $black isinauli ni Rene? 
</td>
</tr></table>
<br/><br/>
@blue
Mga Tanong na Nasasagot ng<br/>Kaalaman o Impormasyon
@nblue
<br/><br/>
Ang mga tanong na nasasagot ng kaalaman o impormasyon ay kadalasang nagsisimula sa alinman sa mga sumusunod na salita: 'sino', 'ano', 'saan', 'ilan', 'kailan', 'bakit', at 'paano'.
<br/><br/>
$blue<u>Sino</u>$black
<br/><br/>
Ang 'sino' ay ginagamit kung ang tanong ay may sagot na tumutukoy sa isang tao.
<br/><br/>
$red Sino $vio ang kumuha ng kamiseta ni Allan?$black
<br/><br/>
Sa pangungusap sa itaas, ginamit ang salitang 'sino' sa tanong upang malaman ang taong kumuha ng kamiseta ni Allan.
<br/><br/>
$blue<u>Ano</u>$black
<br/><br/>
Ang 'ano' ay ginagamit kung ang tanong ay may sagot na tumutukoy sa isang bagay.
<br/><br/>
$red Ano $vio ang nakatago sa loob ng kahon?$black
<br/><br/>
Sa pangungusap sa itaas, ginamit ang salitang 'ano' sa tanong upang malaman ang bagay na nakatago sa loob ng kahon.
<br/><br/>
$blue<u>Saan</u>$black
<br/><br/>
Ang 'saan' ay ginagamit kung ang tanong ay may sagot na tumutukoy sa isang lugar.
<br/><br/>
$red Saan $vio pupunta sina Violy mamaya?$black
<br/><br/>
Sa pangungusap sa itaas, ginamit ang salitang 'saan' sa tanong upang malaman ang lugar na pupuntahan nina Violy mamaya.
<br/><br/>
$blue<u>Ilan</u>$black
<br/><br/>
Ang 'ilan' ay ginagamit kung ang tanong ay may sagot na tumutukoy sa isang bilang.
<br/><br/>
$red Ilan $vio ang kapatid ni Diego?$black
<br/><br/>
Sa pangungusap sa itaas, ginamit ang salitang 'ilan' sa tanong upang malaman ang bilang ng mga kapatid ni Diego.
<br/><br/>
$blue<u>Kailan</u>$black
<br/><br/>
Ang 'kailan' ay ginagamit kung ang tanong ay may sagot na tumutukoy sa isang petsa, oras, o panahon.
<br/><br/>
$red Kailan $vio ang kaarawan ni Melody?$black
<br/><br/>
Sa pangungusap sa itaas, ginamit ang salitang 'kailan' sa tanong upang malaman ang petsa ng kaarawan ni Melody.
<br/><br/>
$blue<u>Bakit</u>$black
<br/><br/>
Ang 'bakit' ay ginagamit kung ang tanong ay may sagot na tumutukoy sa isang dahilan.
<br/><br/>
$red Bakit $vio dinala si Mang Gusting sa ospital?$black
<br/><br/>
Sa pangungusap sa itaas, ginamit ang salitang 'bakit' sa tanong upang malaman ang dahilan ng pagdadala kay Mang Gusting sa ospital.
<br/><br/>
$blue<u>Paano</u>$black
<br/><br/>
Ang 'paano' ay ginagamit kung ang tanong ay may sagot na tumutukoy sa isang paraan.
<br/><br/>
$red Paano $vio magluto ng sinigang?$black
<br/><br/>
Sa pangungusap sa itaas, ginamit ang salitang 'paano' sa tanong upang malaman ang paraan ng pagluluto ng sinigang.
<br/><br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont3 Ikalawang Pagsasanay </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#E6FEED' bordercolor='#D2FBD8'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont1
Bumuo ng tanong mula sa bawat pangungusap sa ibaba gamit ang salitang nakapaloob sa panaklong.<br/><br/>$tfont1
1. Ginamit ni Mang Melo ang kanyang lambat sa palaisdaan. (sino)<br/><br/> 
2. Umuwi si Lily sa Bulacan upang magbakasyon. (saan)<br/><br/> 
3. Nakatanggap si Brandon ng liham mula sa kanyang ate. (ano)<br/><br/> 
4. Napunit ang sando ni Harry kaninang umaga. (kailan)<br/><br/> 
5. Sina Joy ay may alagang tatlong kuting. (ilan)<br/><br/> 
6. Nag-iipon si Ferdie ng pera upang makabili ng bisikleta. (bakit)<br/><br/> 
7. Kailangan mong bumili ng tiket doon para makasakay sa bus na ito. (paano)<br/><br/> 
</td>
</tr></table>
<br/><br/>
<table width='90%' align='center'><tr><td align='center'><b>$tfont4 Mga Sagot sa<br/>Ikalawang Pagsasanay </b></td></tr><tr><td>&nbsp;</td></tr></table>
<table width='90%' align='center' border='1' cellspacing='0' cellpadding='0' bgcolor='#EEEEEE' bordercolor='#DDDDDD'>
<tr><td align='left' width = '100%' style='padding-right:25px; padding-left:25px; padding-top:25px; padding-bottom:25px'>$tfont2
1. $red Sino$black ang gumamit ng kanyang lambat sa palaisdaan?<br/> 
2. $red Saan$black umuwi si Lily upang magbakasyon?<br/> 
3. $red Ano$black ang natanggap ni Brandon mula sa kanyang ate?<br/> 
4. $red Kailan$black napunit ang sando ni Harry?<br/> 
5. $red Ilan$black ang alagang kuting nina Joy?<br/> 
6. $red Bakit$black nag-iipon si Ferdie ng pera?<br/> 
6. $red Paano$black bang makasakay sa bus na ito?<br/> 
</td>
</tr></table>
";

?>


















