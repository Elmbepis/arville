<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Magalang sa Iba't Ibang Seksuwalidad at Paniniwala - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Magalang sa Iba't Ibang<br/>Seksuwalidad at Paniniwala";
$_SESSION['tnum']="*8g";

$questions=array(

"Ano ang ipinapakita ng pagkilala at pagtanggap sa pagkakaiba-iba ng seksuwalidad ng mga tao?=Pagiging magalang>Pagiging matalino+Pagiging mahabagin<Pagiging madasalin",
"Alin sa mga sumusunod ang nagpapakita ng respeto sa damdamin at pananaw ng ibang tao?=Pakikinig nang bukas ang isipan>Pagsisikap sa pag-aaral+Paglinang ng sariling talento<Pagpapaliwanag ng sariling opinyon",
"Ano ang katangian ng isang taong 'heterosexual'?=Naaakit sa kasalungat na kasarian lamang>Naaakit sa kaparehong kasarian+Naaakit sa lalaki man o babae<Hindi nakakaramdam ng seksuwal na atraksyon",
"Ano ang katangian ng isang taong 'asexual'?=Hindi nakakaramdam ng seksuwal na atraksyon>Naaakit sa kaparehong kasarian lamang+Naaakit sa lalaki man o babae<Naaakit sa kasalungat na kasarian lamang",
"Ano ang katangian ng isang taong 'bisexual'?=Naaakit sa lalaki man o babae>Naaakit sa kaparehong kasarian lamang+Hindi nakakaramdam ng seksuwal na atraksyon<Naaakit sa kasalungat na kasarian lamang",
"Ano ang katangian ng isang taong 'homosexual'?=Naaakit sa kaparehong kasarian lamang>Naaakit sa lalaki man o babae+Hindi nakakaramdam ng seksuwal na atraksyon<Naaakit sa kasalungat na kasarian lamang",
"Ano ang dapat mong gawin kapag may kaibigan kang nagsasagawa ng isang kakaibang ritwal?=Igalang at huwag abalahin ang kanyang ginagawa>Patigilin siya sa kanyang ginagawa+Mag-ingay sa paligid habang hinihintay siyang matapos<Pagtawanan ang kanyang ginagawa",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa paniniwala ng iba?=Pag-iwas sa panlalait ng pananampalataya ng kapwa>Pagsalungat sa opinyon ng iba sa lahat ng oras+Pagpapatawa tungkol sa isang kakaibang ritwal<Panunukso sa isang taong may kakaibang kasuotan",
"Ano ang dapat mong gawin kapag may nais kang malaman tungkol sa konsepto ng seksuwalidad?=Magtanong sa nakatatandang mapagkakatiwalaan>Hanapin ang sagot sa social media+Manood ng mga palabas na angkop lamang sa mga matatanda<Kalimutan na lamang ang nais malaman",
"Alin sa mga sumusunod ang hindi mo dapat gawin sa usapin ng seksuwalidad?=Manukso sa kapwa>Tanggapin ang mga pagkakaiba ng mga tao+Makinig nang mabuti sa guro<Magpakita ng malasakit sa iba",
"Ano ang unang hakbang sa pagiging magalang sa mga naiibang paniniwala ng iyong kapwa?=Pagkilalang magkakaiba ang mga paniniwala ng mga tao>Pagpipilit ng sariling paniniwala sa kanya+Pagsalungat sa kanyang paniniwala<Pagtanggap na mali ang kanyang paniniwala",
"Alin sa mga sumusunod ang dapat mong tandaan tuwing magbabahagi ka ng sarili mong paniniwala sa iba?=Paghingi ng pahintulot sa kanila>Pagpilit sa kanilang makinig sa iyo+Pakikipagtalo sa hindi sasang-ayon sa iyo<Pagpapaalis sa mga ayaw makinig",
"Alin sa mga sumusunod ang nagpapakita ng paggalang sa sariling katawan?=Paglalagay ng hangganan sa mga ginagawa>Pagsunod sa lahat ng uso+Pagpayag sa lahat ng gustong gawin ng kapwa<Pagpapadala sa mga temptasyon",
"Alin sa mga sumusunod ang hindi mo dapat gawin sa usapin ng pananampalataya?=Pangmamaliit sa relihiyon ng iba>Pakikinig sa iba nang bukas ang isip+Pakikibahagi sa seremonya kapag inanyayahan<Pag-iwas sa pakikipag-alitan sa kapwa",
"Ano ang dapat mong gawin kapag hindi ka komportable sa pilit na ipinapagawa sa iyo ng iyong kapwa?=Humindi sa kanya at tumangging sumunod>Tumahimik na lamang at pumayag+Lumaban sa kanya sa pisikal na paraan<Humindi sa kanya pero magpaunlak pa rin",
"Alin sa mga sumusunod ang magiging epekto kung pagtatawanan mo ang paniniwala ng iyong kapwa?=Masasaktan mo ang kanyang damdamin>Tataas ang paggalang niya sa iyo+Magpapasalamat siya sa iyo<Magpapalit siya ng kanyang paniniwala",
"Alin sa mga sumusunod ang nagpapakita ng pagiging magalang sa sarili at sa iba?=Responsableng paggamit ng internet>Panonood ng mga palabas na hindi angkop sa iyo+Pagkakalat ng maling kuwento tungkol sa kapwa<Pagkuha ng pribadong datos ng iba nang walang pahintulot",
"Kung ang bawa't isa sa atin ay magpapakita ng paggalang sa mga paniniwala ng iba, alin sa mga sumusunod ang maiiwasan?=Diskriminasyon>Pagtutulungan+Kapayapaan<Pagkakaisa",
"Alin sa mga sumusunod ang dapat mong iwasan sa pakikitungo sa iba?=Panlalait sa kanilang seksuwalidad>Pakikipag-usap nang mahinahon+Pagtanggap sa kanilang pagkatao<Pagpapakita sa kanila ng pang-unawa",
"Alin sa mga sumusunod ang nagpapakita ng paggalang at pagtanggap sa pagkakaiba-iba ng mga tao?=Pakikibahagi sa mga proyektong nagsusulong ng pagkakapantay-pantay>Pakikibahagi sa isang pagtitipong tumutuligsa sa ibang lahi+Panunukso sa kasuotan ng kapwa<Pagtawa sa mga turo ng pananampalataya ng isang kaklase",
"Ano ang dapat mong gawin kung hindi makasali ang iyong kaibigan sa isang gawain dahil sa kanyang paniniwala?=Iangkop ang gawain para makasali siya>Sabihin sa gurong tinatamad siya kaya ayaw niyang sumali+Pilitin siyang sumali kahit ayaw niya<Awayin siya dahil sa kanyang pagtangging sumali",
"Ano ang dapat mong gawin kung may bago kang kakilalang may di-pangkaraniwang kasarian?=Magpakita sa kanya ng respeto>Magkomento sa social media ng hindi maganda tungkol sa kanya+Pagtawanan siya at tuksuhin<Ikahiya siya sa iba",
"Alin sa mga sumusunod ang wastong paggamit ng internet sa usaping seksuwalidad?=Pagpili ng angkop at makabuluhang nilalaman>Panonood ng lahat ng gustong panoorin+Pagpapakalat ng artikulong hindi kumpirmadong totoo<Pagbabahagi ng personal na impormasyon ng iba",
"Ano ang dapat mong gawin kung hindi ka komportableng sumagot sa isang personal na tanong?=Magsabing hindi mo pa kayang sagutin ito>Magalit sa kausap+Umalis at iwanan ang kausap<Magsinungaling sa pagsagot",
"Alin sa mga sumusunod ang halimbawa ng paggalang sa seksuwalidad ng ibang tao?=Pagrespeto sa kanyang hangganan>Pamimilit sa kanyang gumawa ng isang bagay na ayaw niya+Pagbibiro tungkol sa kanyang pangangatawan<Panlalait ng kanyang kasarian",

);

?>

</head>

</bod

</html>