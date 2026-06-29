<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagmalasakit sa Kalikasan - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagmalasakit sa Kalikasan";
$_SESSION['tnum']="*65";

$questions=array(

"Ano ang ibig sabihin ng pagiging mapagmalasakit sa kalikasan?=Pangangalaga sa kapaligiran at mga likas na yaman>Pag-aaksaya ng mga likas na yaman+Pagpapalala ng polusyon sa kapaligiran<Pagtulong sa mga nangangailangan",
"Bakit tinatawag na 'non-renewable resources' ang fossil fuels tulad ng coal at langis?=Dahil ang mga ito ay hindi agad mapapalitan kapag naubos>Dahil mataas ang presyo ng mga ito+Dahil ang mga ito ay matatagpuan lamang sa ilalim ng lupa<Dahil ang mga ito ay biodegradable",
"Ano ang pangunahing sanhi ng climate change o pagbabago ng klima?=Polusyon mula sa paggamit ng fossil fuels>Pagtatanim ng maraming puno+Pag-aaksaya ng sariwang tubig<Pag-init ng daigdig",
"Ano ang dapat mong gawin kapag lalabas ka ng iyong silid?=Patayin ang ilaw>Iwanang bukas ang ilaw para maliwanag pagbalik+Buksan ang TV para may ingay<Iwanang nakabukas ang electric fan",
"Bakit mas mainam na buksan ang kurtina sa umaga kaysa buksan ang ilaw?=Dahil ang liwanag ng araw ay libre at hindi nakakasama sa kalikasan>Dahil mas maganda ang ilaw ng araw kaysa ilaw ng bumbilya+Dahil mas madaling buksan ang kurtina kaysa bumbilya<Dahil mas mainit ang sinag ng araw",
"Ano ang tinatawag na 'phantom load' o 'vampire energy'?=Kuryenteng kinokonsumo ng nakasaksak na appliance kahit naka-off na ito>Kuryenteng kinokonsumo ng appliance na naka-on+Kuryenteng nawawala kapag brownout<Kuryenteng naaaksaya dahil sa maling paggamit ng appliance",
"Ano ang dapat mong gawin pagkatapos mong mag-'charge' ng iyong cellphone?=Tanggalin ang charger sa saksakan>Tanggalin lang ang cellphone sa charger+Hayaan lang na nakasaksak ang cellphone sa buhay na charger<Patayin ang main circuit breaker ng buong bahay",
"Bakit mas mainam gumamit ng electric fan kaysa aircon kung hindi naman masyadong mainit ang panahon?=Dahil mas matipid sa kuryente ang electric fan kaysa aircon>Dahil mas malamig ang ibinubugang hangin ng electric fan+Dahil mas malakas ang ibinubugang hangin ng electric fan<Dahil mas tahimik ang electric fan kaysa aircon",
"Alin sa mga sumusunod ang hindi nakakatulong sa pagtitipid ng tubig?=Pag-iiwang nakabukas ang gripong hindi na ginagamit>Pagpatay ng gripo habang nagsisipilyo+Pagpapaayos ng mga sirang tubo at gripo<Paggamit sa pagdidilig ng tubig na ipinanghugas ng gulay o prutas",
"Alin sa mga sumusunod ang pinakamainam na paraan ng pagpapatuyo ng mga nilabhang damit?=Pagsasampay ng mga ito sa labas>Paggamit ng electric dryer+Paggamit ng oven<Pagpapahangin ng mga ito sa electric fan",
"Kung ang pupuntahan mo ay malapit lamang, alin sa mga sumusunod ang pinakamainam na gawin?=Maglakad o magbisikleta>Sumakay ng kotse+Sumakay ng dyip<Sumakay ng traysikel",
"Alin sa mga sumusunod ang hindi magiging bunga ng matagal na pagbubukas ng pinto ng refrigerator?=Bababa ang pagkonsumo ng kuryente ng refrigerator upang muling lumamig>Tataas ang pagkonsumo ng kuryente ng refrigerator upang muling lumamig+Lalabas ang malamig na hangin ng refrigerator<Papasok sa refrigerator ang mainit na hangin ng paligid",
"Ano ang ibig sabihin ng salitang 'reduce' sa akronim na 3Rs?=Pagbabawas ng pagkonsumo ng mga produkto>Paggawa ng bagong bagay mula sa patapong bagay+Paggamit ng isang patapong bagay sa bagong paraan<Paghihiwalay ng nabubulok sa di-nabubulok na basura",
"Ano ang ibig sabihin ng salitang 'recycle' sa akronim na 3Rs?=Paggawa ng bagong bagay mula sa patapong bagay>Pagbabawas ng pagkonsumo ng mga produkto+Paggamit ng isang patapong bagay sa bagong paraan<Paghihiwalay ng nabubulok sa di-nabubulok na basura",
"Ano ang ibig sabihin ng salitang 'reuse' sa akronim na 3Rs?=Paggamit ng isang patapong bagay sa bagong paraan>Pagbabawas ng pagkonsumo ng mga produkto+Paggawa ng bagong bagay mula sa patapong bagay<Paghihiwalay ng nabubulok sa di-nabubulok na basura",
"Ano ang ibig sabihin ng salitang 'segregation' sa konteksto ng pagmamalasakit sa kalikasan?=Paghihiwalay ng nabubulok sa di-nabubulok na basura>Pagbabawas ng pagkonsumo ng mga produkto+Paggawa ng bagong bagay mula sa patapong bagay<Paggamit ng isang patapong bagay sa bagong paraan",
"Alin sa mga sumusunod ang hindi magiging bunga ng pagsusulat sa likod ng papel?=Mas dadami ang mga punong kailangang putulin para gumawa ng bagong papel>Mas kakaunti ang mga punong kailangang putulin para gumawa ng bagong papel+Mas kakaunti ang bagong papel na kailangang imanupaktura<Bababa ang enerhiyang kailangang gamitin sa pagmamanupaktura ng bagong papel",
"Ano ang ginagawa tuwing nagaganap ang programang 'Earth Hour' na naglalayong makatipid ng enerhiya?=Pinapatay ang lahat ng mga ilaw nang isang oras>Binubuksan ang lahat ng mga ilaw nang isang oras+Naglalakad ang mga tao nang isang oras<Natutulog ang mga tao nang mas maaga ng isang oras",
"Alin sa mga sumusunod ang direktang bunga ng pagtitipid ng kuryente?=Mas mababang bayarin>Mas maraming bagyo+Mas madalas na pagbaha<Mas maraming sakit",
"Alin sa mga sumusunod ang isa sa mga inaasahang epekto ng pagtitipid ng enerhiya sa kalusugan ng tao?=Nagdudulot ito ng mas malinis na hangin>Nagdudulot ito ng mas mainit na panahon+Napapabilis nito ang pagkalat ng mga sakit<Napapabilis nito ang pagdami ng mga pesteng hayop",
"Alin sa mga sumusunod ang hindi kabilang sa mga epekto ng pagbabago ng klima na bunga ng polusyon ng atmospera?=Mas kaunti at mas mahinang mga bagyo>Mas madalas na pagbaha+Mas mainit na panahon<Mas mabilis na pagkatunaw ng yelo sa daigdig",
"Ano ang pakiramdam na naidudulot ng pagiging responsableng mamamayang nagmamalasakit sa kalikasan?=Walang katulad na kasiyahan>Panghihinayang+Pagsisisi<Kawalan ng pag-asa",
"Alin sa mga sumusunod ang hindi halimbawa ng pagtitipid ng enerhiya?=Pagbubukas ng TV kahit walang nanonood>Pagpatay ng ilaw kung aalis ng silid+Pagtatanggal sa saksakan ng charger matapos itong gamitin<Paggamit ng electric fan sa halip ng aircon",
"Bakit nakakatulong sa kalikasan ang paglalakad o pagbibisikleta sa halip ng pagsakay sa kotse?=Dahil nababawasan nito ang pagsusunog ng mga kotse ng fossil fuels>Dahil napapawala nito ang mga basura sa daan+Dahil napapalinis nito ang mga anyong tubig<Dahil nababawasan nito ang pagkonsumo ng mga produkto",
"Alin sa mga sumusunod ang dapat mong gawin upang makatipid ng enerhiya sa paggamit ng refrigerator?=Buksan ang pinto nang sandali lamang at isara ito agad>Buksan ang pinto nang matagal upang lumamig ang buong kusina+Iwanang nakabukas ang pinto<Tanggalin sa saksakan ang refrigerator",

);

?>

</head>

</body

</html>