<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapanagutan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapanagutan";
$_SESSION['tnum']="*44";

$questions=array(

"Ano ang ibig sabihin ng pagiging mapanagutan?=Pagiging responsable sa sariling mga desisyon at aksyon>Pagiging mablis sa pagpapasya+Pagiging mabilis sa pagsagot sa mga tanong<Pagiging mapaglingkod sa Diyos",
"Bakit mahalaga ang pagiging mapanagutan?=Para makakuha ng tiwala at respeto mula sa iba>Para makakuha ng papuri+Para kumita nang malaki<Para maiangat ang sarili sa iba",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa sarili?=Pag-aalaga ng sariling kalusugan>Pagsunod sa mga magulang+Pagsunod sa mga alituntunin ng paaralan<Pakikilahok sa mga programang pangkalikasan",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa sarili?=Paglinang ng mga sariling kakayahan>Pagiging mabuting kapatid+Pagsunod sa mga alituntunin ng paaralan<Pagtulong sa paglilinis ng ilog",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa sarili?=Pag-iwas sa mga bisyo>Pagtulong sa mga gawaing bahay+Pakikipagtulungan sa mga proyekto ng klase<Pagtulong sa mga kapitbahay",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa pamilya?=Pagsunod sa mga magulang>Pag-aalaga ng sariling kalusugan+Pagsunod sa mga alituntunin ng paaralan<Pakikilahok sa mga programang pangkalikasan",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa pamilya?=Pagiging mabuting kapatid>Paglinang ng mga sariling kakayahan+Pagsunod sa mga alituntunin ng paaralan<Pagtulong sa paglilinis ng ilog",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa pamilya?=Pagtulong sa mga gawaing bahay>Pagsunod sa mga alituntunin ng barangay+Pakikilahok sa mga programang pangkalikasan<Pagiging mabuting kapatid",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa paaralan?=Pagsunod sa mga utos ng guro>Paglinang ng mga sariling kakayahan+Pagsunod sa mga magulang<Pagtulong sa mga kapitbahay",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa paaralan?=Pakikipagtulungan sa mga proyekto ng klase>Pag-iwas sa mga bisyo+Pagsunod sa mga magulang<Pagtulong sa mga kapitbahay",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa sarili at paaralan?=Pag-aaral nang mabuti>Pagtulong sa mga gawaing bahay+Pagsunod sa mga alituntunin ng barangay<Pagiging mabuting kapatid",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa komunidad?=Pagtulong sa mga kapitbahay>Paglinang ng mga sariling kakayahan+Pagsunod sa mga magulang<Pagsunod sa mga alituntunin ng guro",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa komunidad?=Pakikilahok sa mga programang pangkalikasan>Pagsunod sa mga magulang+Pagsunod sa mga alituntunin ng paaralan<Pag-aalaga ng sariling kalusugan",
"Alin sa mga sumusunod ang tuwirang nagpapakita ng pagiging mapanagutan sa komunidad?=Pagsunod sa mga alituntunin ng barangay>Pagtulong sa mga gawaing bahay+Pag-aaral nang mabuti<Pagiging mabuting kapatid",
"Bakit mahalaga ang pagiging mapanagutan sa pangangalaga ng kalikasan?=Para mapanatiling ligtas, malinis, at maayos ang ating kapaligiran>Para maubos ang mga likas na yaman+Para lumaki ang kita sa hanapbuhay<Para hangaan ng ibang tao",
"Bakit mahalaga ang pagtatanim at pag-aalaga ng mga puno at halaman?=Para patuloy tayong magkaroon ng sariwang hangin at pagkain>Para makakuha tayo ng init mula sa araw+Para madaling makahingi ng tulong sa iba<Para makakuha ng papuri",
"Alin sa mga sumusunod ang nagpapakita ng pagiging mapanagutan sa pangangalaga ng kalikasan?=Pagtatanim at pag-aalaga ng mga puno at halaman>Pagiging mabuting kapatid+Pagtatapon ng basura sa ilog<Pag-iwas sa mga bisyo",
"Kung nais mong magkaroon ng halaman mula sa isang buto, alin sa mga sumusunod ang dapat mong gawin?=Pagtatanim>Pagdidilig+Pag-aalis ng mga damo<Paggamit ng pataba",
"Kung nais mong panatilihing malusog ang iyong mga halaman at iwasang malanta ang mga ito kung tag-init, alin sa mga sumusunod ang dapat mong gawin?=Pagdidilig>Pagtatanim+Pag-aalis ng mga damo<Paggamit ng pataba",
"Kung nais mong hindi maagawan ng sustansya sa lupa ang iyong mga halaman, alin sa mga sumusunod ang dapat mong gawin?=Pag-aalis ng mga damo>Pagtatanim+Pagdidilig<Pag-iwas sa pagkakalat sa paligid",
"Kung nais mong lumaki nang husto ang iyong mga halaman, alin sa mga sumusunod ang dapat mong gawin?=Paggamit ng pataba>Pagtatanim+Pag-aalis ng mga damo<Pag-iwas sa pagkakalat sa paligid",
"Kung nais mong mapanatiling malinis ang kapaligiran ng iyong mga halaman, alin sa mga sumusunod ang dapat mong gawin?=Pag-iwas sa pagkakalat sa paligid>Pagtatanim+Pagdidilig<Paggamit ng pataba",
"Alin sa mga sumusunod ang HINDI nagpapakita ng pagiging mapanagutan sa pagpaparami ng mga puno at halaman?=Pagtatapon ng basura sa hardin>Pagtatanim+Pagdidilig<Paggamit ng pataba",
"Alin sa mga sumusunod ang HINDI nagpapakita ng pagiging mapanagutan sa pagpaparami ng mga puno at halaman?=Pagpuputol ng mga pumo>Pagtatanim+Pagdidilig<Paggamit ng pataba",
"Alin sa mga sumusunod ang HINDI isa sa mga benepisyong nakukuha natin sa pagpaparami ng mga puno at halaman?=Pagiging madumi ng mga anyong tubig>Pagkakaroon ng sariwang hangin+Pagkakaroon ng mga gulay at prutas<Pagiging maganda ng paligid",

);

?>

</head>

</bod

</html>