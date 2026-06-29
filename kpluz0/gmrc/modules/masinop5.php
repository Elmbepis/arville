<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Masinop - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Masinop";
$_SESSION['tnum']="*54";

$questions=array(

"Ano ang ibig sabihin ng 'e-waste?'=Gamit-teknolohikal o bahagi nito na patapon na>Enerhiya mula sa basura+Basura ng taong gumagamit ng isang gadyet<Enerhiyang naaksaya sa paggamit ng isang gamit-teknolohikal",
"Alin sa mga sumusunod ang halimbawa ng 'e-waste?'=Sirang cellphone>Kartong kahon ng biniling gadyet+Plastik na nalalagyan ng cellphone<Instruction manual sa paggamit ng isang gadyet",
"Bakit hindi dapat basta itapon ang 'e-waste' sa karaniwang basurahan?=Dahil may mga sangkap itong nakalalason sa kalikasan>Dahil mahal ito+Dahil masyado itong mabaho<Dahil masyado itong mabigat",
"Paano makatutulong sa atin ang pagreresiklo sa 'e-waste?'=Mababawasan nito ang basurang nakakasira sa kalikasan>Mapipigilan nito ang paggawa ng bagong teknolohiya+Mapapababa nito ang presyo ng mga gadyet<Makapagdadagdag ito ng enerhiya sa mundo",
"Ano ang dapat mong gawin kung mayroon kang sirang gadyet?=Subukang ipaayos ito>Sunugin ito+Itapon ito sa basurahan<Iwan ito sa gilid ng kalye",
"Alin sa mga sumusunod ang hindi wastong paraan ng pagtatapon ng 'e-waste?'=Pagsunog nito sa bakuran>Pagdadala nito sa isang recycling center+Paghihiwalay nito sa ibang basura<Pagbibigay nito sa maaari pang makinabang dito",
"Ano ang dapat mong gawin sa isang luma pero gumagana pang gadyet?=Ibigay sa nangangailangan nito>Sunugin sa bakuran+Itapon sa basurahan<Isama sa mga iba pang bagay na hindi na ginagamit",
"Ano ang epekto ng pagsusunog ng 'e-waste' sa ating kapaligiran?=Naglalabas ito ng nakalalasong usok>Lumilkha ito ng enerhiyang magagamit+Ginagawa nitong sariwa ang hangin<Pinayayabong nito ang mga puno",
"Ano ang pangunahing layunin ng 'e-waste collection programs?'=Mangalap ng mga basurang teknolohikal para maitapon nang wasto>Mangalap ng mga basurang teknolohikal para maitapon sa ilog+Lumikha ng makabagong teknolohiya mula sa luma<Gumawa ng compost mula sa mga nabubulok na basura",
"Alin sa mga sumusunod ang maaaring gawin ng mga paaralan para makatulong sa wastong pamamahala ng 'e-waste?'=Pangungulekta ng mga basurang teknolohikal para maiparesiklo o maitapon nang wasto>Pagsusunog ng basurang teknolohikal sa bakuran nito+Pangungulekta ng mga basurang teknolohikal para maitapon sa dagat<Pagpapabili ng mga gadyet na hindi kailangan ng mga estudyante",
"Alin sa mga sumusunod ang hindi kabilang sa tinatawag na 'e-waste?'=Punit-punit na kuwadernong papel>Sirang mouse+Sirang keyboard<Basag na monitor",
"Alin sa mga sumusunod ang hindi kabilang sa mga dahilan kung bakit dapat maging masinop sa paggamit ng isang gadyet?=Para mapalitan agad ito ng bago>Para mas matagal itong magamit+Para maiwasan ang agad na paggastos<Para makaiwas sa agad na paglikha ng e-waste",
"Ano ang dapat mong gawin sa 'e-waste' kung wala pang 'e-waste center' sa inyong lugar?=Ipunin muna ito hanggang magkaroon ng mapagdadalhan>Itapon ito nang palihim sa gilid ng kalsada+Sunugin ito sa bakuran<Ilaglag ito sa ilog",
"Alin sa mga sumusunod ang nagpapakita ng malasakit sa kalikasan?=Pagdadala ng e-waste sa isang recycling center>Pagsasama ng e-waste sa ordinaryong basura+Pagpapalit ng gadyet kahit maayos pa ang kasalukuyang ginagamit<Pagbili ng maraming gadyet na hindi naman kailangan",
"Alin sa mga sumusunod ang pinakamainam gawin upang makatulong sa pagbabawas ng 'e-waste?'=Pag-ingatan at alagaan ang mga sariling gadyet>Laging bumili ng bagong gadyet+Huwag nang gumamit ng anumang uri ng gadyet habambuhay<Huwag nang ipaayos pa ang mga sirang gadyet",
"Ano ang epekto ng pagtatapon ng 'e-waste' sa ilog?=Nakakasama ito sa kalusugan ng mga nilalang sa tubig>Nakapagpapaganda ito ng ekosistema sa ilog+Ginagawa nitong mas malinis at sariwa ang tubig<Napaparami nito ang mga isda sa ilog",
"Sino ang dapat maging responsable sa wastong pamamahala ng 'e-waste?'=Lahat ng tao>Pamahalaan lamang+Mga pabrikang pinagmumulan nito lamang<Mga matatanda lamang",
"Ano ang dapat mong gawin sa isang sirang gadyet na hindi na maaaring ayusin pa?=Ibigay ito sa isang recycling center>Itapon ito sa basurahan+Sunugin ito sa bakuran<Iwan ito sa gilid ng kalye",
"Ano ang dapat mong gawin kung mayroon kang lumang kompyuter na gumagana pa ngunit hindi mo na ginagamit?=Ibigay ito sa isang mag-aaral o paaralan para mapakinabangan>Itapon ito sa basurahan+Baklasin ito at ibenta sa junk shop<Gawin itong patungan ng mga gamit",
"Bakit mahalaga ang pagiging masinop sa paggamit ng kagamitang teknolohikal?=Para maiwasang maging e-waste agad ito>Para mapuri ng guro+Para hindi mapagalitan ng magulang<Para payagang bumili agad ng bago",
"Alin sa mga sumusunod ang halimbawa ng hindi masinop na paggamit ng isang 'laptop computer?'=Pag-iiwan nito sa labas>Pagtatabi nito sa tamang lalagyan+Maayos na pagpatay nito matapos itong gamitin<Pag-iwas sa aksidenteng pagkabagsak nito",
"Ano ang pangunahing dahilan kung bakit mahalaga ang pagkakaroon ng kaalaman tungkol sa wastong pamamahala ng 'e-waste?'=Para makatulong sa kalikasan>Para makatipid ng pera+Para maipasa ang pagsusulit tungkol dito<Para hangaan ng ibang tao",
"Ano ang dapat mong gawin kung may 'e-waste collection day' sa inyong paaralan?=Sumali at magdala ng sirang gadyet>Sumali at magdala ng lumang pahayagan+Pigilin ang ibang sumali rito<Balewalain ito at huwag sumali",
"Alin sa mga sumusunod ang pinakadapat isaalang-alang bago bumili ng isang bagong gadyet?=Kung kailangan talaga ito>Kung mayroon nito ang malalapit na kaibigan+Kung uso ito<Kung galing ito sa ibang bansa",
"Bakit mapanganib sa kalusugan ang 'e-waste?'=Dahil may taglay itong mga nakalalasong kemikal>Dahil makati ito sa balat+Dahil masyado itong mainit<Dahil may taglay itong mga mikrobyo",

);

?>

</head>

</bod

</html>