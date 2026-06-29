<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Masinop - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Masinop";
$_SESSION['tnum']="*3g";

$questions=array(

"Ano ang kahulugan ng pagiging masinop?=Pagiging hindi maaksaya>Palaging pagbili ng bago+Hindi pag-iingat sa mga gamit<Pagtatapon agad ng lumang gamit",
"Alin sa mga sumusunod ang nagpapakita ng pagiging masinop?=Paggamit ng mga lumang lata bilang paso>Pagtatapon agad ng mga lumang bagay+Pagpapalit ng gamit kahit maayos pa<Pagbili ng maraming gamit na hindi kailangan",
"Bakit mahalaga ang pagiging masinop sa paggamit ng likas na yaman?=Upang makinabang pa sa mga ito ang susunod na henerasyon>Upang makakuha ng papuri sa iba+Para lumaki ang kita ng pamilya<Para maging marangya ang buhay",
"Ano ang maaaring gawin sa isang lumang gulong para ipakita ang pagiging masinop?=Gawin itong taniman ng mga halaman>Itapon ito sa basurahan+Sunugin ito sa kalye<Ihulog ito sa ilog",
"Alin sa mga sumusunod ang hindi masinop na gawain?=Pagtatapon agad ng nasirang laruan>Paggawa ng laruang kotse mula sa lumang lata+Pagkukumpuni ng silya para muli itong maupuan<Pagtitipid sa kuryente",
"Ano ang ibig sabihin ng 'Refuse'?=Pagtangging gumamit ng mga bagay na maaksaya>Paggamit muli ng mga bagay sa ibang paraan+Pagbabawas ng pagkonsumo ng mga bagay-bagay<Paggawa ng bagong gamit mula sa mga patapong bagay",
"Ano ang ibig sabihin ng 'Reuse'?=Paggamit muli ng mga bagay sa ibang paraan>Pagtangging gumamit ng mga bagay na maaksaya+Pagbabawas ng pagkonsumo ng mga bagay-bagay<Paggawa ng bagong gamit mula sa mga patapong bagay",
"Ano ang ibig sabihin ng 'Reduce'?=Pagbabawas ng pagkonsumo ng mga bagay-bagay>Pagtangging gumamit ng mga bagay na maaksaya+Paggamit muli ng mga bagay sa ibang paraan<Paggawa ng bagong gamit mula sa mga patapong bagay",
"Ano ang ibig sabihin ng 'Recycle'?=Paggawa ng bagong gamit mula sa mga patapong bagay>Pagtangging gumamit ng mga bagay na maaksaya+Pagbabawas ng pagkonsumo ng mga bagay-bagay<Paggamit muli ng mga bagay sa ibang paraan",
"Ano ang pangunahing layunin ng sistemang \"4 R's\"?=Pangalagaan ang kalikasan>Palalain ang polusyon+Pabutihin ang ugnayan ng mga tao<Palakihin ang kita ng mga manggagawa",
"Ano ang dapat mong gawin kung may gamit kang kasisira pa lamang?=Patingnan muna ito kung maaayos pa>Itapon agad ito sa basura+Sunugin agad ito sa bakuran<Ilabas agad ito sa gilid ng kalye",
"Alin sa mga sumusunod ang halimbawa ng 'Reduce'?=Pagbabaon ng sariling inumin>Pagbili ng mga gamit na isang beses lamang kung gamitin+Pagbili ng bagong damit kada suweldo<Pagbili ng mga pagkaing nakasilid sa plastik na supot",
"Alin sa mga sumusunod ang halimbawa ng 'Reduce'?=Pagsasara ng gripo matapos itong gamitin>Paggamit ng maraming plastik na supot sa pamimili+Pagbubukas ng ilaw kahit maliwanag pa<Pagbili ng mga gamit na hindi naman kailangan",
"Alin sa mga sumusunod ang halimbawa ng 'Refuse'?=Pagtangging gumamit ng plastic straws>Pagtangging magtipid ng kuryente+Pagtangging gumamit ng mga kubyertos na nahuhugasan<Pagtangging maglinis ng paligid",
"Alin sa mga sumusunod ang halimbawa ng 'Refuse'?=Pagtangging bumili ng mga inuming nasa plastik na bote>Pagtangging magpakumpuni ng mga sirang gamit+Pagtangging gumamit ng mga lumang lata bilang paso<Pagtangging maghiwalay ng nabubulok sa di-nabubulok na basura",
"Alin sa mga sumusunod ang halimbawa ng 'Recycle'?=Paggawa ng laruang bangka mula sa sirang tsinelas>Paglilinis ng bahay+Pagtitipid ng perang kinita<Pag-iwas sa pagbili ng mga bagay na plastik",
"Alin sa mga sumusunod ang halimbawa ng 'Recycle'?=Paggawa ng bag mula sa mga lumang pakete ng juice>Pagtitipid sa tubig o kuryente+Pagtatanim ng mga halaman<Paggamit sa sirang balde bilang basurahan",
"Alin sa mga sumusunod ang halimbawa ng 'Reuse'?=Paggamit sa lumang garapon bilang taguan ng barya>Pagsusunog ng mga tuyong dahon sa bakuran+Sama-samang paglilins ng ilog<Paggawa ng manika mula sa mga retaso ng tela",
"Alin sa mga sumusunod ang halimbawa ng 'Reuse'?=Paggamit sa lumang lata ng biskwit bilang lalagyan ng krayola>Paggawa ng parol mula sa mga lumang boteng plastik+Pagpapakumpuni ng sirang gripo<Pagpatay sa mga ilaw na hindi kailangan",
"Alin sa mga ito ang halimbawa ng masinop na gawain sa paaralan?=Pagsusulat sa harap at likod ng papel>Pagpapalipad ng mga papel na hindi pa nasusulatan+Pagtatapon ng papel matapos sulatan ang harap nito<Pagtatapon ng lapis na bali imbes na tasahan ito",
"Alin sa mga kasanayang ito ng sistemang \"4 R's\" ang naisasabuhay sa pagtatanim ng halaman sa mga lumang lalagyan ng pintura?=Reuse>Refuse+Reduce<Recycle",
"Alin sa mga kasanayang ito ng sistemang \"4 R's\" ang naisasabuhay sa pagtangging bumili ng mga plastik na kubyertos?=Refuse>Reuse+Reduce<Recycle",
"Alin sa mga kasanayang ito ng sistemang \"4 R's\" ang naisasabuhay sa pag-iwas magluto ng sobra-sobrang pagkain?=Reduce>Reuse+Refuse<Recycle",
"Alin sa mga kasanayang ito ng sistemang \"4 R's\" ang naisasabuhay sa paggawa ng lalagyan ng gitara mula sa mga lumang tubo ng tubig?=Recycle>Reuse+Refuse<Reduce",
"Alin sa mga sumusunod ang dapat isaalang-alang kapag bumibili ng bagong gamit?=Kung kailangan ba talaga ito>Kung uso ito sa mga kabataan+Kung gawa ito sa ibang bansa<Kung sikat ang tatak nito",
 
);

?>

</head>

</bod

</html>