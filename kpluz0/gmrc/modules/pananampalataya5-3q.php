<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Paggalang sa mga Simbolo ng Pananampalataya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Paggalang sa mga Simbolo ng Pananampalataya";
$_SESSION['tnum']="*5f";

$questions=array(

"Ano ang pangunahing layunin ng pananampalataya sa buhay ng tao?=Magbigay ng pag-asa at gabay mula sa Diyos sa araw-araw>Magdulot ng takot sa lahat+Magturo ng panghuhusga sa kapwa<Magpataw ng parusa sa mga tao",
"Alin sa mga sumusunod ang simbolo ng Kristiyanismong nagpapakita ng pag-ibig at sakripisyo?=Krus>Insenso+Om<Estatwa ni Buddha",
"Alin sa mga sumusunod ang sumisimbolo sa mga misteryo ng buhay ni Hesus at Birheng Maria?=Rosaryo>Sajjadah+Gasuklay at bituin<Bulaklak ng lotus",
"Alin sa mga sumusunod ang itinuturing ng mga Muslim na malinis at sagradong lugar kung saan sila humaharap sa Mecca habang nananalangin?=Sajjadah>Simbolong Om+Gasuklay at bituin<Bulaklak ng lotus",
"Alin sa mga sumusunod ang representasyon ng paggabay at liwanag sa landas ng pananampalataya sa relihiyong Islam?=Gasuklay at bituin>Sajjadah+Simbolong Om<Bulaklak ng lotus",
"Alin sa mga sumusunod ang kumakatawan sa pinagmulan ng buhay, sansinukob, at espirituwal na enerhiya para sa mga Hindu?=Simbolong Om>Sajjadah+Gasuklay at bituin<Bulaklak ng lotus",
"Alin sa mga sumusunod ang ginagamit sa mga seremonyang panrelihiyon bilang simbolo ng pag-akyat ng panalangin sa langit?=Insenso>Rosaryo+Krus<Iskrol ng Torah",
"Alin sa mga sumusunod ang simbolo ng kadalisayan, muling pagsilang, at espiritwal na paggising sa Budismo?=Bulaklak ng lotus>Yin-Yang+Gasuklay at bituin<Simbolong Om",
"Alin sa mga sumusunod ang simbolo ng balanse ng kabutihan at kasamaan, liwanag at dilim, at iba pa sa Taoismo?=Yin-Yang>Bulaklak ng lotus+Estatwa ng Buddha<Simbolong Om",
"Alin sa mga sumusunod ang banal na aklat na itinuturing na gabay sa tamang pamumuhay ng mga Hudyo?=Iskrol ng Torah>Simbolong Om+Gasuklay at bituin<Bulaklak ng lotus",
"Alin sa mga sumusunod ang ginagamit sa Budismo bilang paalala ng kapayapaan, pagkakamit ng kaliwanagan, at paglayo sa kasakiman at pagdurusa?=Estatwa ng Buddha>Simbolong Om+Yin-Yang<Bulaklak ng lotus",
"Saan ginagamit ng mga mananampalatayang Katoliko ang rosaryo?=Sa paulit-ulit na pananalangin>Sa pagtataboy ng mga maligno+Sa panghihikayat ng suwerte<Sa pagbibilang ng araw",
"Ano ang sajjadah sa pananampalatayang Islam?=Isang banig para sa pagdarasal>Isang banal na aklat+Isang aksesorya sa seremonyang panrelihiyon<Isang kasuotang panrelihiyon",
"Alin sa mga sumusunod ang hindi kabilang sa mga inaasahang epekto ng paggalang ng lahat sa mga simbolo ng pananampalataya?=Diskriminasyon>Kapayapaan+Pagkakaunawaan<Pagtutulungan",
"Alin sa mga sumusunod ang hindi dapat gawin sa mga simbolo ng pananampalataya?=Paghawak sa mga ito nang walang pahintulot>Pagpapahalaga sa mga ito+Pagkukuwento tungkol sa mga ito<Paglilinis ng mga ito sa wastong paraan",
"Alin sa mga sumusunod ang dapat mong gawin kung bibisita ka sa isang lugar ng pagsamba?=Sumunod sa mga alituntunin>Gumawa ng ingay+Kumain para hindi magutom<Makipagdaldalan sa katabi",
"Ano ang dapat mong gawin kung may taong nananalangin sa iyong paligid?=Tumahimik para hindi siya magambala>Makipag-usap sa kanya+Biruin o patawanin siya<Palakpakan siya",
"Alin sa mga sumusunod ang hindi mo dapat gawin sa isang simbolong panrelihiyon ng iba?=Gawin itong biro o katatawanan>Pagmasdan ito nang may respeto+Alamin ang kahulugan nito<Magtanong nang magalang tungkol dito",
"Alin sa mga sumusunod ang nagpapakita ng respeto sa paniniwala ng iba?=Pakikinig dito nang bukas ang isipan>Pakikipagtalo tungkol dito+Pagpipilit ng sariling pananaw<Pagtawa rito",
"Alin sa mga sumusunod ang karaniwang bunga ng pagiging magalang mo sa paniniwala ng iba?=Maayos na ugnayan sa mga tao>Pagkainggit sa kapwa+Madalas na pakikipagtalo<Paglayo ng mga kaibigan",
"Alin sa mga sumusunod ang wastong paraan ng pakikipag-usap sa isang taong iba ang paniniwala sa iyo?=Pakikinig nang mahinahon at may paggalang>Pagtutuwid kaagad ng kanyang sinasabi+Pagpipilit sa kanya ng sarili mong paniniwala<Pagtawa sa kanyang paliwanag",
"Alin sa mga ito ang dapat mong gawin kapag ikaw ay nasa isang banal na lugar?=Magsuot ng angkop na pananamit>Kumain ng meryenda sa loob+Magpatawa sa mga tao sa paligid<Mag-ingay habang may seremonya",
"Alin sa mga sumusunod ang nagbubuklod sa mga taong may iba't ibang pananampalataya?=Paggalang sa paniniwala ng bawat isa>Pakikipagpalitan ng relihiyon+Paghahambing ng mga pananampalataya<Sapilitang pagtuturo ng paniniwala sa iba",
"Paano nakakatulong sa lipunan ang paggalang ng lahat sa mga simbolo ng pananampalataya?=Nagpapalaganap ito ng kapayapaan at pagkakaisa>Nababawasan nito ang katapatan sa sariling relihiyon+Nagiging sanhi ito ng pagalingan ng mga tao<Pinipigilan nito ang kalayaan sa pananampalataya",
"Alin sa mga sumusunod ang nagpapakita ng bukas na pag-iisip?=Pakikinig sa iba tungkol sa kanilang pananampalataya>Pagtawa sa paniniwala ng iba+Panlalait sa ibang relihiyon<Pag-iwas sa mga usaping panrelihiyon",

);

?>

</head>

</bod

</html>