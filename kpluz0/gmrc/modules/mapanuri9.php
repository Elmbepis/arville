<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Mapanuring Pag-iisip: Kamalayan sa Sarili - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Mapanuring Pag-iisip: Kamalayan sa Sarili";
$_SESSION['tnum']="*90";

$questions=array(

"Alin sa mga sumusunod ang nagpapahayag ng katotohanan tungkol sa mapanuring pag-iisip?=Ito ay kasanayang dapat linangin araw-araw>Ito ay katangiang likas sa lahat ng tao+Ito ay makikita lamang sa mga taong may mahaba nang karanasan sa buhay<Hindi ito natututunan at nakakasanayan ng isang indibidwal",
"Alin sa mga sumusunod ang proseso ng pagpapalalim ng kamalayan sa sarili?=Pagkilala sa iyong tunay na pagkatao sa pamamagitan ng pag-unawa sa mga pagpapahalagang gumagabay sa iyo>Pagsasaulo ng mga katangian ng lahing Pilipino+Paggaya sa mga gawi at paniniwala ng isang hinahangaang tao<Pagsunod sa uso at popular na opinyon",
"Alin sa mga sumusunod na tanong ang pinakamagpapalalim ng iyong kamalayan tungkol sa iyong sarili?=Ano ang tunay na mahalaga sa akin?>Ano ang gusto kong kainin ngayon?+Sinong artista ang susubaybayan ko sa social media?<Anong bagong gadget ang dapat kong bilhin?",
"Bakit mahalagang malaman mo ang iyong mga pagpapahalaga (values)?=Upang maunawaan mo ang iyong damdamin at pagkilos>Upang magkaroon ka ng maraming kaibigan+Upang magtagumpay ka sa iyong napiling karera<Upang mawala ang lahat ng mga problema mo",
"Paano dumarating ang malalim na kamalayan sa sarili?=Ito ay bunga ng regular mong pagninilay, pagsusuri ng kilos, at pagkilala sa sarili mong mga kahinaan>Ito ay biglaang dumarating nang hindi mo inaasahan+Ito ay nakukuha sa pamamagitan ng pag-aaral mo ng isang kurso<Ito ay nakakamtan mo sa pamamagitan ng madalas na pagdarasal",
"Kailan masasabing namumuhay ka nang may integridad?=Kapag ang iyong mga kilos ay naaayon sa iyong mga pinahahalagahan>Kapag hindi ka nakikitang nagkakamali o nagkakasala+Kapag ikaw ay may mataas na posisyon sa lipunan<Kapag walang nagagalit o kumakalaban sa iyo",
"Alin sa mga sumusunod ang isang paraan ng pagpapalalim ng kamalayan sa sarili?=Pagsasagawa ng regular na pagninilay>Pag-aangat ng iyong sarili sa iba+Pag-iisip na isa kang perpektong tao<Pag-iwas sa mga problema o hamon",
"Gaano kahabang panahon ang dapat mong ilaan sa pagninilay-nilay para magawa mo ito araw-araw sa epektibong paraan?=10 minuto>1 minuto+1 oras<2 oras",
"Alin sa mga sumusunod na paraan ng pagpapalalim ng kamalayan sa sarili ang tumutukoy sa paglalaan ng 10 minuto araw-araw upang unawain ang iyong mga naging kilos at damdamin?=Pagsasagawa ng regular na pagninilay>Malalim na pagtatanong tungkol sa iyong sarili+Pagtatala ng talaarawan ng mga pagpapahalaga<Paghingi ng tapat na feedback",
"Ang pagsagot sa mga 'bakit' ng iyong mga kagustuhan ay saklaw ng alin sa mga sumusunod na paraan ng pagpapalalim ng kamalayan sa sarili?=Malalim na pagtatanong tungkol sa iyong sarili>Pagsasagawa ng regular na pagninilay+Pagtatala ng talaarawan ng mga pagpapahalaga<Paghingi ng tapat na feedback",
"Alin sa mga sumusunod na paraan ng pagpapalalim ng kamalayan sa sarili ang tumutukoy sa pagsusulat ng mga sitwasyon kung saan nagtagumpay ka o nabigong isabuhay ang iyong mga prinsipyo?=Pagtatala ng talaarawan ng mga pagpapahalaga>Malalim na pagtatanong tungkol sa iyong sarili+Pagsasagawa ng regular na pagninilay<Paghingi ng tapat na feedback",
"Alin sa mga sumusunod na paraan ng pagpapalalim ng kamalayan sa sarili ang tumutukoy sa pagtanggap mula sa iba ng kanilang oberbasyon tungkol sa atin?=Paghingi ng tapat na feedback>Malalim na pagtatanong tungkol sa iyong sarili+Pagsasagawa ng regular na pagninilay<Pagtatala ng talaarawan ng mga pagpapahalaga",
"Alin sa mga sumusunod na paraan ng pagpapalalim ng kamalayan sa sarili ang tumutukoy sa pagsusuri kung nagtutugma ang iyong pananalita at pagkilos?=Paghahambing ng iyong sinasabi sa iyong ginagawa>Pagkilala sa iyong mga trigger+Pagsusuri sa iyong mga inspirasyon<Pagsasanay ng mindfulness",
"Alin sa mga sumusunod na paraan ng pagpapalalim ng kamalayan sa sarili ang tumutukoy sa pag-alam kung anong mga bagay ang nagpapainis o nagpapagalit sa iyo?=Pagkilala sa iyong mga trigger>Paghahambing ng iyong sinasabi sa iyong ginagawa+Pagsusuri sa iyong mga inspirasyon<Pagsasanay ng mindfulness",
"Alin sa mga sumusunod na paraan ng pagpapalalim ng kamalayan sa sarili ang tumutukoy sa pagkilala nang mas malalim sa mga taong hinahangaan mo?=Pagsusuri sa iyong mga inspirasyon>Paghahambing ng iyong sinasabi sa iyong ginagawa+Pagtanggap sa iyong mga kahinaan<Pagsasanay ng mindfulness",
"Alin sa mga sumusunod na paraan ng pagpapalalim ng kamalayan sa sarili ang tumutukoy sa pagiging mulat sa iyong nararamdaman at iniisip sa bawat sandali nang hindi hinuhusgahan ang mga ito?=Pagsasanay ng mindfulness>Paghahambing ng iyong sinasabi sa iyong ginagawa+Pagtanggap sa iyong mga kahinaan<Pagsusuri sa iyong mga inspirasyon",
"Alin sa mga sumusunod na paraan ng pagpapalalim ng kamalayan sa sarili ang tumutukoy sa pag-amin mo sa iyong sarili na hindi ka perpekto?=Pagtanggap sa iyong mga kahinaan>Paghahambing ng iyong sinasabi sa iyong ginagawa+Pagsasanay ng mindfulness<Pagsusuri sa iyong mga inspirasyon",
"Sa mga taong may kamalayan na sila ay mga panlipunang nilalang, alin sa mga sumusunod ang kanilang nagiging natural na tugon sa pangangailangan ng iba?=Bayanihan>Katarungan+Karunungan<Nasyonalismo",
"Ano ang maidudulot sa iyo ng pagtatala sa talaarawan ng mga pagkilos mo upang isabuhay ang iyong mga pagpapahalaga?=Makikita mo ang pag-unlad ng iyong pagkatao sa paglipas ng panahon>Magiging perpekto ka sa iyong buhay+Mawawala lahat ng mga problema mo<Makatatanggap ka ng mga papuri mula sa iba",
"Ano ang kahulugan ng salitang 'trigger' sa konteksto ng kamalayan sa sarili?=Mga bagay na nagpapainis o nagpapagalit sa iyo>Mga bagay na nagpapasaya sa iyo+Mga tuksong nagtutulak sa iyong magkasala<Mga taong nakakaimpluwensiya sa iyo",
"Bakit kailangan mong humingi ng tapat na feedback mula sa iba?=Dahil may mga bagay tungkol sa iyong sarili na hindi mo nakikita>Dahil mas magaling ang ibang tao kaysa sa iyo+Para maaari rin silang humingi ng feedback sa iyo<Dahil mas madaling magtanong kaysa mag-isip",
"Alin sa mga sumusunod ang matutuklasan mo kung iyong titingnan kung saan mo ginugugol ang iyong oras at pera?=Ang mga tunay mong pinahahalagahan>Ang pinansyal na katayuan mo+Ang pagtrato sa iyo ng ibang tao<Ang ugnayan mo sa iyong mga kapamilya",
"Kung ayaw mo sa mga taong sinungaling, alin sa mga sumusunod ang malamang na pinahahalagahan mo?=Katapatan>Kayamanan+Kagandahan<Kasipagan",
"Ano ang kahulugan ng 'mindfulness' bilang paraan ng pagpapalalim ng kamalayan sa sarili?=Pagiging mulat sa iyong nararamdaman at iniisip sa bawat sandali>Pagdarasal nang taimtim sa gitna ng katahimikan+Tunay na pagsisisi sa mga kasalanan<Pagkilala nang malalim sa mga hinahangaang tao",
"Alin sa mga sumusunod ang isang paraan ng pagpapalalim ng kamalayan sa sarili?=Pagtanggap na hindi ka perpekto>Pagpapanggap na alam mo ang lahat+Paglilihim ng iyong mga kahinaan<Pag-iisip na ikaw ang pinakamagaling",
 
);

?>

</head>

</body

</html>