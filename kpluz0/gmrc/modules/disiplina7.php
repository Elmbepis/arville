<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagpapakita ng Disiplina sa Social Media - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagpapakita ng Disiplina sa Social Media";
$_SESSION['tnum']="*7h";

$questions=array(

"Ano ang dapat gawin bago mag-post sa social media?=Mag-isip muna kung ang post ay makabubuti o makasasakit sa iba>Tiyaking nakakatawa ang ipo-post+Tingnan kung ang ipo-post ay sumusunod sa uso<Tiyaking magiging viral ang ipo-post",
"Ano ang ibig sabihin ng pagiging mapanagot sa social media?=Paggamit ng social media nang may paggalang at pag-iingat>Pagpo-post ng anumang gusto mo+Pagbabalewala sa epekto ng iyong mga post<Pagsali sa mga usaping kontrobersyal",
"Ano ang dapat gawin upang maiwasan ang pagpapakalat ng maling impormasyon?=Tiyaking mapagkakatiwalaan ang pinagmulan ng impormasyon bago ito ibahagi sa iba>Ibahagi agad ang balita saanman ito nanggaling+Ibahagi lamang ang mga impormasyong viral na<Pumili ng mga balitang magpapasikat sa iyo",
"Alin sa mga sumusunod ang isa sa mga dapat mong gawin upang mapanatiling ligtas ang iyong social media account?=Gumamit ng wastong privacy settings>Ibahagi ang password sa mga kaibigan+Mag-post ng mga personal na impormasyon<Gamitin ang parehong password sa lahat ng accounts",
"Alin sa mga sumusunod ang isa sa mga dapat mong gawin upang mapanatiling ligtas ang iyong social media account?=Iwasan ang pagbabahagi ng personal na impormasyon>Gumamit ng simpleng passwords+Mag-accept ng friend requests mula sa kahit sino<I-click ang lahat ng links na ipinapadala sa iyo",
"Ano ang dapat mong gawin kung makakita ka ng cyberbullying?=I-report ang account na gumagawa nito>Sumali sa diskusyon at palakihin ang gulo+Balewalain ang sitwasyon<Pagtawanan ang binu-bully",
"Ano ang dapat tandaan sa pagbibigay ng opinyon sa isang trending na isyu?=Suriin muna ang buong konteksto bago magbigay ng opinyon>Mag-react agad kahit hindi alam ang buong konteksto+Sundin lang ang sinasabi ng karamihan<Magbahagi ng maling impormasyon para suportahan ang sariling opinyon",
"Bakit mahalaga ang limitasyon sa oras ng paggamit ng social media?=Para mas mabigyan ng pansin ang mga makabuluhang gawain tulad ng pag-aaral>Para matutong maging mabilis sa pagpo-post ng content+Para may oras makipag-meetup sa mga nakikilala sa social media<Para may oras maglaro ng video games",
"Alin sa mga sumusunod ang maayos na paggamit ng social media?=Pagbahagi ng mga post na nagbibigay ng inspirasyon at kaalaman>Pagpo-post ng anumang pumasok sa iyong isipan+Paninira sa iyong nakaalitan<Pagpapakalat ng maling impormasyon tungkol sa iba",
"Alin sa mga sumusunod ang dapat iwasan upang mapanatili ang disiplina sa social media?=Pagbabahagi ng personal na impormasyon sa publiko>Paggamit ng wastong privacy settings+Pagkilala sa mga mapagkakatiwalaang balita<Pagpapakita ng respeto sa kapwa",
"Alin sa mga sumusunod ang nagpapakita ng disiplina sa paggamit ng social media?=Pagpo-post nang may paggalang sa kapwa>Pangongopya ng post ng iba nang walang pahintulot+Pagsali sa bawat kontrobersya para sumikat<Paggawa ng mga mapanirang komento",
"Alin sa mga sumusunod ang hindi dapat gawin sa social media?=Pagkakalat ng mga pekeng balita>Paggalang sa opinyon ng iba+Pag-iwas sa cyberbullying<Paggamit ng malakas na password",
"Ano ang dapat mong tandaan tungkol sa pagpo-post ng iyong komento?=Gumamit ng magalang na pananalita sa lahat ng oras>Magpakalat ng mga post na hindi totoo pero nakakatawa+Gumawa ng kontrobersyang maaaring m2sx aging viral<Mang-insulto ng mga hindi kakilala",
"Ano ang dapat mong gawin kung makakita ka ng pekeng balita?=I-report ang maling impormasyon>Balewalain ito+Ibahagi agad ito<Magkomentong totoo ang pekeng balita",
"Bakit mahalaga ang paggamit ng wastong privacy settings sa social media?=Para maprotektahan ang mga personal na impormasyon>Para magmukhang popular+Para magkaroon ng mas maraming friend requests<Para maparami ang sariling followers",
"Ano ang dapat mong gawin kung hindi mo gusto ang opinyong ibinahagi ng isang tao?=Ilahad ang hindi pagsang-ayon sa magalang na paraan>Gumawa ng mapanirang komento tungkol sa nag-post+Magalit nang husto sa nag-post<Makipagtalo sa nag-post gamit ang maanghang na pananalita",
"Alin sa mga sumusunod ang hindi isa sa mga dahilan kung bakit mahalaga ang pagkakaroon ng disiplina sa paggamit ng social media?=Upang mapalaganap ang cyberbullying at online scams>Upang mabawasan ang mga maling impormasyon sa internet+Upang mapigilan ang mga gulong maaaring likhain ng mga pekeng balita<Upang maging maganda ang mga karanasan sa paggamit ng social media",
"Alin sa mga sumusunod ang dapat iwasan sa paggamit ng social media?=Pagkakalat ng maling impormasyon>Paggamit ng magalang na pananalita+Pagpo-post ng mga positibong komento<Pagprotekta sa sariling impormasyon",
"Ano ang isa sa mga inaasahang epekto ng pagpapalaganap ng disiplina sa paggamit ng social media?=Pagiging ligtas ng online na komunidad>Pagkakaroon ng pangamba sa ibang tao+Pagkakaroon ng mga negatibong ugnayan sa kapwa<Pagbaba ng tiwala sa sarili",
"Ano ang dapat mong reaksyon kapag inaatake ka sa social media?=I-report sa kinauukulan ang account na umaatake>Sumagot gamit ang masasakit na salita+Siraan ang pagkatao ng umaatake<Takutin ng pisikal na karahasan ang umaatake",
"Ano ang tamang paraan ng pagre-react sa isang kontrobersyal na balita?=Alamin muna kung totoo o peke ang balita bago mag-react>Palakihin ang balita sa pamamagitan ng pagdadagdag na maling impormasyon+Ibahagi agad ito sa iba nang hindi nag-iisip<Gumawa ng post laban dito nang walang batayan",
"Alin sa mga sumusunod ang dapat tandaan tungkol sa pagpo-post sa social media?=Maging patas at makatotohanan sa pagpo-post>Haluan ng maling impormasyon ang bawat post+Gawing kontrobersyal ang bawat post<Gumamit ng negatibong tono sa pagpo-post",
"Alin sa mga sumusunod ang nagpapakita ng disiplina sa pagpapahayag ng opinyon sa social media?=Paggamit ng magalang na pananalita>Pangmamaliit ng ibang tao+Pagpo-post ng personal na impormasyon ng ibang tao<Pagpapalaganap ng maling impormasyon",
"Alin sa mga sumusunod ang dapat ibahagi para maging positibo ang online na komunidad?=Mga post na nagbibigay ng inspirasyon sa iba>Mga kontrobersyang nakalilikha ng mga di-pagkakaunawaan+Mga pekeng balita<Mga paninira sa pagkatao ng kapwa",
"Alin sa mga sumusunod ang karaniwang epekto ng pagbabahagi ng maling impormasyon sa social media?=Pagdududa at takot sa kapwa>Dagdag na kaalaman sa mga tao+Pagkakaisa sa online na komunidad<Wastong pagpapasya sa pang-araw-araw na buhay",

);

?>

</head>

</bod

</html>