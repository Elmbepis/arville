<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Matipid - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Matipid";
$_SESSION['tnum']="*7f";

$questions=array(

"Ano ang pangunahing dahilan kung bakit dapat tayong magtipid ng tubig at enerhiya?=Para mapanatili ang mga likas na yaman>Para lumiit ang babayaran+Para hindi masira agad ang mga gamit<Para makakuha ng papuri",
"Alin sa mga sumusunod ang hindi kabilang sa mga benepisyong direktang makukuha sa pagiging matipid sa enerhiya?=Pagbaba ng krimen>Pagbaba ng bayarin sa kuryente+Pag-iingat sa kalikasan<Pagkabawas ng polusyon",
"Alin sa mga sumusunod ang magandang epekto sa kalikasan ng wastong paggamit ng tubig?=Pagpapanatili ng mga ekosistema>Pagkakaroon ng mas maraming ulan+Pagpapalawak ng mga lawa<Pagtataas ng temperatura",
"Alin sa mga sumusunod ang isang paraan ng pagtitipid sa paggamit ng tubig?=Pag-aayos ng mga tumutulong gripo at tubo>Pagpapakulo sa tubig na iinumin+Pagtatanim ng mga halaman<Paggamit ng hose sa paghuhugas",
"Ano ang dapat gawin kung may tumutulong gripo o tubo sa tahanan?=Agad na ayusin o ipaayos ito>Huwag na lang pansinin+Maghugas gamit ang tumutulong tubig<Ipunin ang tumutulong tubig sa isang lalagyan",
"Ano ang pinakamainam na paraan ng pagdidilig ng halaman upang makatipid sa tubig?=Paggamit ng balde at tabo>Paggamit ng hose+Pag-iiwang nakabukas sa isang gripon<Tuluy-tuloy na paggamit ng mga sprinkler",
"Alin sa mga sumusunod ang isang paraan ng pagtitipid ng enerhiya?=Pagpatay sa mga ilaw na hindi ginagamit>Paggamit ng aircon kahit malamig ang panahon+Madalas na pagbubukas ng refrigerator<Mabagal at matagal na pagpaplantsa",
"Alin sa mga sumusunod ang isang paraan ng pagtitipid ng enerhiya?=Paggamit ng mga bumbilyang LED>Paggamit ng mga appliance na hindi episyente+Pag-iiwang nakabukas ng mga appliance na hindi ginagamit<Pagbubukas ng pinto ng silid habang umaandar ang aircon nito",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan ng pagtitipid ng enerhiya?=Pagbababa ng temperature setting ng aircon kapag malamig ang panahon>Paggamit ng natural na liwanag ng araw+Episyenteng paggamit ng plantsa<Paggamit ng timer ng aircon",
"Alin sa mga sumusunod ang hindi kabilang sa mga epekto ng hindi pagpapatay ng 'appliances' na hindi ginagamit?=Pagpigil sa polusyon ng hangin>Pagtaas ng bayarin sa kuryente+Labis na pagkonsumo ng kuryente<Pag-igsi ng buhay ng mga ito",
"Alin sa mga sumusunod ang makakatulong upang maiwasan ang labis na paggamit ng aircon?=Pagse-set nito sa tamang temperatura>Oagbubukas ng lahat ng mga bintana ng silid+Pagbubukas ng pinto ng silid<Hindi paggamit ng timer nito",
"Alin sa mga sumusunod ang isang paraan upang makatipid sa kuryente?=Paggamit ng timer at tamang settings ng mga appliance>Paggamit ng plantsa nang mas matagal+Pag-iiwang nakabukas ang ilaw sa silid kahit walang tao<Paggamit ng washing machine kahit isang piraso lamang ang lalabhan",
"Alin sa mga sumusunod ang pinakamaliit ang kinokonsumong kuryente?=Bumbilyang LED>Refrigerator+Air conditioner<Electric oven",
"Aling uri ng bumbilya ang pinakamatipid sa kuryente?=LED bulb>Fluorescent bulb+Incandescent bulb<Halogen bulb",
"Ano ang pangunahing layunin ng pagtuturo ng wastong paggamit ng tubig at enerhiya?=Pagpapanatili ng mga likas na yaman at ekosistema>Pagmamagaling o pag-aangat ng sarili+Pagtatamo ng paghanga o papuri mula sa iba<Pagpapababa ng mga bayarin",
"Paano naipapakita ng pagtitipid ng tubig at enerhiya ang pagmamalasakit sa kapwa?=Napapanatili nito ang kalikasan para sa kasalukuyan at mga susunod na henerasyon>Napapababa nito ang buwanang gastos+Napapahaba nito ang buhay ng mga gamit<Napapaalwan nito ang pang-araw-araw na pamumuhay",
"Paano makatitipid sa tubig sa paglalaba gamit ang washing machine?=Maghintay mapuno ang washing machine bago maglaba>Gamitin ang washing machine nang hindi hihigit sa kalahati ng kapasidad nito+Gamitin agad ang washing machine habang iilang piraso pa lang ang lalabhan<Huwag maglagay ng tubig sa washing machine",
"Bakit kailangang magtulungan sa pagtitipid ng tubig at enerhiya?=Para mapangalagaan ang kapaligiran at mga likas na yaman>Para mabulabog ang mga ekosistema+Para hindi maparusahan ng pamahalaan<Para hindi mahusgahan ng mga aktibista",
"Ano ang dapat gawin kapag nagsisipilyo?=Buksan lamang ang gripo kapag gagamitin na ang tubig>Iwanang nakabukas ang gripo nang tuluy-tuloy+Gumamit ng malaking balde ng tubig<Huwag nang gumamit ng tubig",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan ng pagtitipid ng tubig?=Pagtatapon ng tubig na ipinanghugas lamang ng pagkain>Pag-aayos ng mga tulo+Wastong paliligo at pagsisipilyo<Wastong paglalaba",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan ng pagtitipid ng tubig?=Pag-iiwang nakabukas ang gripo nang tuluy-tuloy tuwing nagsisipilyo>Pag-iipon ng gamit na tubig para sa pagdidilig+Wastong paghuhugas<Paggamit ng balde sa halip ng hose",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan ng pagtitipid ng tubig?=Paggamit ng hose sa paglilinis ng sasakyan>Pagkukumpuni ng mga tumutulong gripo+Pagdidilig gamit ang naipanglinis nang tubig<Mabilis na paggamit ng shower",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan ng pagtitipid ng kuryente?=Paggamit ng incandescent bulbs>Paggamit ng natural na liwanag+Paglalagay ng mga appliance sa tamang settings<Pagsasaalang-alang ng energy effciency ratings",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan ng pagtitipid ng kuryente?=Pagbubukas ng refrigerator kahit hindi kailangan>Pagpapatay ng mga ilaw at kagamitang hindi ginagamit+Pagpili ng mga gamit na hindi matakaw sa kuryente<Paggamit ng mga bumbilyang LED",
 
);

?>

</head>

</bod

</html>