<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Matipid - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Matipid";
$_SESSION['tnum']="*4b";

$questions=array(

"Ano ang ibig sabihin ng pagtitipid?=Pag-iimpok ng pera at pag-iwas sa hindi mahalagang paggastos>Pag-iwas sa lahat ng gastusin+Pagbili ng kahit anong gusto<Pag-iwas sa pagdadala ng pera",
"Alin sa mga sumusunod na paraan ng pagtitipid ang may kaugnayan sa paglalagay ng barya sa alkansiya araw-araw?=Pagtatabi ng bahagi ng baon>Pag-iwas sa hindi kinakailangang gastusin+Pag-iingat sa mga gamit<Paggawa ng listahan bago mamili",
"Alin sa mga sumusunod na paraan ng pagtitipid ang may kaugnayan sa hindi pagbili ng mga luhong tulad ng laruan at kendi?=Pag-iwas sa hindi kinakailangang gastusin>Pagtatabi ng bahagi ng baon+Pag-iingat sa mga gamit<Pagreresaykel",
"Alin sa mga sumusunod na paraan ng pagtitipid ang may kaugnayan sa pag-aalagang mabuti ng mga kasangkapan upang tumagal ang buhay o kapakinabangan ng mga ito?=Pag-iingat sa mga gamit>Pag-iwas sa hindi kinakailangang gastusin+Pagtatabi ng bahagi ng baon<Paggawa ng listahan bago mamili",
"Alin sa mga sumusunod na paraan ng pagtitipid ang may kaugnayan sa pag-iwas sa pagbili ng mga bagay na wala sa planong bilhin?=Paggawa ng listahan bago mamili>Pagreresaykel+Pagtatabi ng bahagi ng baon<Pag-iingat sa mga gamit",
"Alin sa mga sumusunod na paraan ng pagtitipid ang may kaugnayan sa paggamit ng mga lumang bagay upang makabuo ng bagong bagay na kapakipakinabang?=Pagreresaykel>Pagtitipid ng kuryente at tubig+Paghahanap ng mga alternatibong paraan ng libangan<Pagpapahalaga sa mga natatanggap",
"Alin sa mga sumusunod na paraan ng pagtitipid ang may kaugnayan sa pagpatay ng ilaw kapag hindi ginagamit o pagsasara ng gripo habang nagsisipilyo?=Pagtitipid ng kuryente at tubig>Pagreresaykel+Paghahanap ng mga alternatibong paraan ng libangan<Pagpapahalaga sa mga natatanggap",
"Ang pagbabasa ng aklat imbes na panonood ng sine sa labas ay halimbawa ng alin sa mga sumusunod na paraan ng pagtitipid?=Paghahanap ng mga alternatibong paraan ng libangan>Pagreresaykel+Pagtitipid ng kuryente at tubig<Pagpapahalaga sa mga natatanggap",
"Alin sa mga sumusunod na paraan ng pagtitipid ang may kaugnayan sa pag-iimpok ng mga perang napamaskuhan sa mga ninong at ninang?=Pagpapahalaga sa mga natatanggap>Pagreresaykel+Paghahanap ng mga alternatibong paraan ng libangan<Pagtitipid ng kuryente at tubig",
"Alin sa mga sumusunod ang isang paraan ng pagtitipid?=Pag-iipon ng bahagi ng baon sa alkansiya>Paggastos ng buong baon araw-araw+Pagbili ng lahat ng gusto<Pagpapautang ng pera sa kaklase",
"Bakit mahalaga ang pagtitipid?=Para may mailaang pera para sa hinaharap>Para magkaroon ng maluhong pamumuhay+Para matutong hindi na gumamit ng pera kailanman<Para hangaan at igalang ng ibang tao",
"Alin sa mga ito ang halimbawa ng hindi wastong paggastos?=Pagbili ng laruan kahit maubos ang ipon>Pagbili ng pagkain kapag nagugutom+Pagbili ng aklat kung may nais matutunan<Pagbili ng gamit na kailangan sa paaralan",
"Alin sa mga sumusunod ang isa sa mga positibong epekto ng pagtitipid sa komunidad?=Mas maraming mamamayan ang makakatulong sa iba>Mas maraming mamamayan ang manghihingi ng tulong+Wala nang mamamayan ang gagastos<Mas maraming mamamayan ang maghihirap",
"Ano ang dapat gawin kung may nais sanang bilhing isang bagay?=Tanungin muna ang sarili kung talagang kailangan ito at kung may budget para rito>Bilhin agad ito nang hindi nag-iisip+Humingi o umutang ng pera sa kaibigan para mabili agad ito<Basagin agad ang alkansiya para mabili ito",
"Alin sa mga sumusunod ang maaaring gawin sa mga natitirang barya mula sa baon?=Isilid sa alkansiya>Itapon+Ibigay sa kaklase<Ibili ng kendi",
"Bakit kailangang pag-ingatan ang mga gamit?=Para mas tumagal ang mga ito at hindi muna bumili ng bago>Para dumalas ang pagbili ng bago+Para may maipagmalaki sa mga kaibigan<Para hiramin ng iba ang mga ito",
"Alin sa mga sumusunod ang dapat mong iwasan para makatipid?=Pagbili ng mga bagay na hindi kailangan>Pag-iingat sa mga lumang gamit+Paunti-unting pag-iipon sa alkansiya<Pagreresaykel ng mga bagay",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan ng pagtitipid ng tubig?=Pag-iiwang nakabukas ang gripo nang tuluy-tuloy tuwing nagsisipilyo>Pag-aayos ng mga tulo+Wastong paliligo at paglalaba<Pag-iipon ng gamit na tubig para sa pagdidilig",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan ng pagtitipid ng kuryente?=Pagbubukas ng refrigerator kahit hindi kailangan>Pagpapatay ng mga ilaw at kagamitang hindi ginagamit+Pagpili ng mga gamit na hindi matakaw sa kuryente<Paggamit ng natural na liwanag ng araw",
"Ano ang dapat mong gawin kung gusto mong magkapera upang bumili ng bagong laruan?=Mag-ipon muna>Manghiram ng pera sa kaibigan+Magbenta ng mga gamit<Humingi ng pera sa magulang",
"Alin sa mga sumusunod ang hindi tamang paraan ng pagtitipid?=Hindi pagbili ng gamot kahit kailangan na ito>Pag-iwas sa pagbili ng luho+Pag-iipon ng pera sa alkansiya<Pag-iingat sa gamit",
"Alin sa mga sumusunod ang uri ng gastusing dapat unahin?=Malusog na pagkain at mga gamit sa paaralan>Mga laruan+Bagong cellphone<Kendi at tsokolate",
"Ano ang benepisyo ng paggamit ng listahan ng mga bibilhin habang namimili?=Pag-iwas sa pagbili ng mga hindi kailangan>Pagbili ng mga luhong mahirap hanapin+Pagpapababa ng presyo ng mga bibilhin<Pag-iwas sa pagbili ng mga tunay na pangangailangan",
"Alin sa mga sumusunod ang pangunahing dahilan kung bakit dapat tayong magtipid ng tubig at kuryente?=Para mapangalagaan ang kalikasan at mga likas na yaman>Para makaiwas sa mataas na bayarin+Para umasenso sa paghahanapbuhay<Para makaiwas sa sunog at mga kalamidad",
"Ano ang dapat gawin sa mga gamit na nasisira?=Subukang ayusin o ipaayos>Itapon agad+Ibenta sa mangangalakal<Palitan agad ng bago",

);

?>

</head>

</bod

</html>