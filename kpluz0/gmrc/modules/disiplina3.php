<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Disiplina sa Pagpapabuti ng Kapaligiran - GMRC in KPluz.com    </title>   
</title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Disiplina sa Pagpapabuti ng Kapaligiran";
$_SESSION['tnum']="*34";

$questions=array(

"Alin sa mga ito ang nagpapakita ng disiplina sa pagpapabuti ng kapaligiran?=Pagtatanim ng mga puno>Pagkakalat ng basura sa paligid+Pagsira sa mga halaman sa daan<Pag-aaksaya ng tubig",
"Bakit natin kailangang maging disiplinado sa pagpapanatili ng kalinisan ng kapaligiran?=Para sa kalusugan at kaginhawaan ng lahat>Para yumaman ang mga tao+Para mapigilan ang mga kalamidad<Para hindi maparusahan",
"Aling bahagi ng kapaligiran ang dapat nating pangalagaan?=Lahat ng ito>Tubig+Lupa<Hangin",
"Saan mo dapat itapon ang iyong mga basura?=Sa tamang basurahan>Kahit saan+Sa ilog<Sa kalsada",
"Alin sa mga ito ang makakatulong sa pagtitipid ng tubig?=Pagkukumpuni ng mga tumutulong tubo>Pag-iiwang nakabukas ang gripo kahit hindi ginagamit+Pagdidilig sa labas kahit malakas ang ulan<Paliligo nang tatlong beses sa isang araw",
"Ano ang dapat nating gawin sa mga patapong gamit na hindi nabubulok?=Iresiklo para makagawa ng mga bagong bagay>Sunugin sa bakuran+Gawing pataba ng lupa<Itapon sa ilog",
"Alin sa mga ito ang dapat iwasang gamitin upang makaiwas sa polusyon?=Plastik na supot>Kartong kahon+Papel na supot<Baso na puwedeng hugasan",
"Ano ang dapat mong gawin kung may makita kang sirang tubo ng tubig?=Ituro ito sa nakatatanda para makumpuni>Takpan ito para hindi na makita+Hayaan lang ito at kalimutan<Lalo pa itong sirain para mapansin ng mga nakatatanda",
"Alin sa mga ito ang nagpapakita ng disiplina sa pagpapabuti ng kapaligiran sa loob ng bakuran?=Pagtatanim ng mga halaman>Pagtatapon ng basura kahit saan+Pagbubukas ng ilaw kahit hindi kailangan<Pagsusunog ng plastik",
"Ano ang dapat mong gawin sa paaralan upang mapanatili ang kalinisan nito?=Pagtatapon ng mga kalat sa basurahan>Pag-iiwan ng tirang pagkain kung saan-saan+Paghuhulog ng balat ng kendi sa sahig<Pagsusulat sa pader",
"Alin sa mga ito ang maaaring idulot sa atin ng maruming kapaligiran?=Mga sakit tulad ng ubo at sipon>Mas malusog na katawan+Maginhawang pamumuhay<Mabangong paligid",
"Alin sa mga ito ang hindi isa sa mga dahilan kung bakit kailangang magtipid sa kuryente?=Para dumilim ang paligid>Para mapababa ang babayaran+Para makabawas sa polusyon<Para mapangalagaan ang kalikasan",
"Ano ang ibig sabihin ng pagreresiklo?=Paggawa ng bagong bagay mula sa basura>Pagbili ng bagong gamit+Pagtatapon ng basura<Pagsusunog ng basura",
"Alin sa mga ito ang maaaring iresiklo?=Plastik na bote>Tirang pagkain+Balat ng saging<Mga tuyong dahon",
"Bakit kailangang sumali sa mga 'clean-up drive?'=Para makatulong sa paglilinis ng komunidad>Para makasama ang mga kaibigan+Para makaiwas sa mga gawaing-bahay<Para makakuha ng libreng pagkain",
"Paano mo mapapakita ang iyong disiplina sa pagpapabuti ng kalikasan araw-araw?=Sa pamamagitan ng pagtitipid ng tubig at kuryente>Sa pamamagitan ng pag-iiwan ng basura kung saan-saan+Sa pamamagitan ng paninira ng mga halaman<Sa pamamagitan ng pagkakalat sa paaralan",
"Alin sa mga ito ang hindi isa sa mga dahilan kung bakit kailangang magtanim tayo ng mga puno?=Para magpalipas ng oras>Para mabigyan ng tirahan ang mga hayop+Para magkaroon ng sariwang hangin<Para may mapagkunan ng pagkain at kahoy",
"Alin sa mga ito ang nagpapakita ng disiplina sa paggamit ng kuryente?=Paggamit ng kagamitang de-kuryente kapag talagang kailangan lamang>Pagbubukas ng ilaw buong araw+Pagbubukas ng TV kahit walang manonood<Matagal na pagpapainit ng plantsa",
"Alin sa mga ito ang nagpapakita ng disiplina sa pagpapabuti ng kalikasan?=Pagkamasinop sa mga gamit>Maling pamamahala ng mga basura+Pag-aaksaya ng mga likas na yaman<Labis na paggamit ng plastik",
"Alin sa mga ito ang hindi makakatulong sa kalikasan?=Pagsusunog ng mga lumang gulong>Pagreresiklo ng mga bote+Pagtatanim ng mga puno<Pagtitipid sa tubig",
"Ano ang dapat mong gawin sa isang maruming bakuran?=Linisin ito at taniman ng mga halaman>Pabayaan lamang ito+Gawin itong tambakan ng mga basura<Mag-alaga rito ng mga daga at insekto",
"Alin sa mga ito ang dapat mong iwasan upang hindi magkaroon ng polusyon sa hangin?=Pagsusunog ng basura>Pagdidilig ng mga halaman+Pagwawalis ng bakuran<Pag-aalaga ng mga hayop",
"Bakit kailangang bawasan natin ang paggamit ng plastik?=Dahil hindi ito nabubulok at nakakasira ito sa kalikasan>Dahil wala itong masyadong pakinabang+Dahil madali itong masira<Dahil mahal ito",
"Ano ang dapat mong gawin sa isang kaklaseng nagkakalat?=Pagsabihan siya nang maayos>Awayin siya+Tulungan siyang magkalat<Pagtawanan siya",
"Bakit mahalaga ang pagtutulungan sa pangangalaga ng kapaligiran?=Para mas madaling mapanatili ang kalinisan>Para mas mabilis lumala ang polusyon+Para dumami ang mga nagkakalat sa paligid<Para mas yumaman pa ang mga tao",
"Ano ang epekto ng pagtitipid ng tubig sa kinabukasan?=Pagkakaroon ng mga susunod na henerasyon ng malinis na tubig>Pagkawala ng mga suplay ng tubig sa mga darating na taon+Paghaba ng panahong tagtuyot<Pagbabaha tuwing umuulan",

);

?>
</head>
</bod
</html>