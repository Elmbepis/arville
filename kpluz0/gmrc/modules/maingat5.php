<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Maingat - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Maingat";
$_SESSION['tnum']="*5g";

$questions=array(

"Bakit kailangan nating mag-ingat palagi?=Para maiwasan ang aksidente>Para hindi agad mapagod+Para maging mabilis ang pagkilos<Para makatipid",
"Alin sa mga sumusunod ang karaniwang epekto sa ating kapwa ng pagiging maingat natin?=Pagiging mas ligtas ng lahat>Pagiging mainitin ng ulo ng lahat+Pagkainip ng mga tao<Pagbagal ng pagtatrabaho ng mga tao",
"Alin sa mga sumusunod ang pagpapakita ng malasakit sa kapwa sa pamamagitan ng pag-iingat?=Pagpapanatili ng kalinisan>Pagsasanay ng sariling talento+Pagbabasa ng mga aklat<Pagdadasal para makapasa sa pagsusulit",
"Bakit hindi mo mdapat paglaruan ang mga matutulis o maiinit na bagay?=Dahil baka makasugat o makasunog ang mga ito>Para hindi masira ang mga ito+Para hindi makakuryente ang mga ito<Dahil baka mawala ang mga ito",
"Ano ang dapat mong gawin kung may makita kang basa at madulas na bahagi sa sahig?=Punasan ito agad at tuyuin>Makipaglaro sa ibabaw nito+Ipakita ito sa kaklase para mapagkatuwaan<Takpan ito ng isang bagay",
"Alin sa mga sumusunod ang wastong paraan ng pamamahala sa basura?=Pagtatapon nito sa tamang lalagyan>Pagtatapon nito sa estero+Pagsusunog nito sa bakuran<Pag-iimbak nito sa likod ng bahay",
"Alin sa mga sumusunod ang hindi dahilan kung bakit mahalaga ang paglilinis ng tahanan at paaralan?=Upang makaiwas sa pagtatrabaho>Upang makaiwas sa pagbaho ng paligid+Upang makaiwas sa aksidente<Upang makaiwas sa mga sakit",
"Saan sa mga sumusunod na lugar hindi dapat maglaro ang mga bata?=Sa ibabaw ng bubong>Sa palaruan+Sa loob ng bakuran<Sa loob ng silid",
"Alin sa mga sumusunod ang dapat mong iwasan sa loob ng inyong paaralan?=Mabilis na pagtakbo>Paglalakad nang maingat+Pagtulong sa guro<Pag-upo nang maayos sa silid-aralan",
"Alin sa mga sumusunod ang maaaring mangyari kapag naglaro ng posporo ang isang bata?=Pagkakaroon ng sunog>Pagbaho ng paligid+Malakas na pag-ulan<Pagkakuryente",
"Alin sa mga ito ang hindi mo dapat gawin kapag gumagamit ka ng isang bagay na umaandar sa kuryente?=Gamitin ito nang basa ang mga kamay at sahig>Gamitin ito nang maingat+Tiyaking walang sira ang kable nito<Isaksak ito nang maayos",
"Bakit kailangang iwasan ang mga kemikal na tulad ng 'bleach'?=Dahil ito ay nakalalason>Dahil ito ay nakakahiwa+Dahil ito ay nakakakuryente<Dahil ito ay mabilis magliyab",
"Alin sa mga sumusunod ang katangiang karaniwang taglay ng isang taong maingat?=Pagpapahalaga sa kaligtasan ng lahat>Pagiging mahilig magbasa+Pagpapahalaga sa pananampalataya<Pagiging palakaibigan",
"Alin sa mga sumusunod ang karaniwang epekto sa pamayanan ng sama-samang pag-iingat?=Pagiging ligtas at matatag nito>Hindi pagkakaisa ng mga tao+Pagyaman ng lahat<Kawalan ng malasakit sa bawat isa",
"Ano ang maaaring mangyari kung magtatapon tayo ng basura sa kung saan-saan lamang?=Kakalat ang mga sakit>Gaganda ang ating paligid+Magiging mapayapa ang ating komunidad<Uunlad ang lahat",
"Kailan hindi ligtas gamitin ang isang bagay na tumatakbo sa kuryente?=Kapag basa ang mga kamay>Kapag tuyo ang buong katawan+Kapag tuyo ang sahig<Kapag wala itong sira",
"Ano ang dapat mong gawin kapag may makita kang basag na bote sa sahig?=Walisin at itapon agad ito sa basurahan>Takpan ito ng papel+Sipain ito sa gilid ng dingding<Palibutan ito ng mga pangharang",
"Ano ang dapat mong gawin kung may kailangan kang bagay na nasa mataas na estante?=Makiusap sa isang nakatatanda para abutin ito>Akyatin ito gamit ang isang silya+Sungkitin ito gamit ang isang mahabang bagay<Tumalon nang mataas para abutin ito",
"Saan sa mga sumusunod na lugar maaaring maglaro ang isang bata?=Sa parke>Sa tuktok ng puno+Sa gilid ng kalsada<Sa tabi ng ilog o estero",
"Alin sa mga ito ang hindi mo dapat gawin bago ka magsaksak ng isang bagay sa kuryente?=Basain ang mga kamay>Tuyuin ang mga kamay+Tiyaking walang sira ang kable<Tiyaking maayos ang anyo ng saksakan",
"Bakit kailangan nating magbahagi ng kaalaman sa kapwa tungkol sa pag-iwas sa mga panganib?=Upang mailayo sila sa sakuna>Para mapuri tayo ng guro+Upang tumaas ang kita nila<Para maging masayahin sila",
"Bakit hindi ka dapat tumakbo nang mabilis sa loob ng inyong bahay?=Para hindi madulas o makabangga>Para hindi mahawa ng sakit+Para hindi magutom<Para lalong tumalino",
"Alin sa mga sumusunod ang nagpapakita ng maingat na pagkilos?=Pag-iwas sa matutulis na bagay>Pagtakbo sa hagdan+Paglalaro ng nagbabagang uling<Pag-akyat sa poste ng kuryente",
"Alin sa mga sumusunod ang nagpapakita ng maingat na pagkilos?=Paglalakad nang dahan-dahan kung basa ang sahig>Pagtakbo sa gilid ng malalim na swimming pool+Pagsasaksak sa kuryente habang basa ang mga kamay<Paglalaro sa madilim na lugar",
"Ano ang dapat mong gawin kung may makita kang delikadong bagay sa loob ng silid-aralan?=Ipaalam agad ito sa guro>Takpan ito ng papel+Paglaruan ito kasama ang mga kaklase<Itago ito para hindi makita ng iba",

);

?>

</head>

</bod

</html>