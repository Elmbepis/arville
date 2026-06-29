<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapanagutan sa Pamilya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapanagutan sa Pamilya";
$_SESSION['tnum']="*58";

$questions=array(

"Ano ang ibig sabihin ng pagiging mapanagutan?=Paggawa ng isang gawain kahit walang nag-uutos>Pagpapatapos ng sariling tungkulin sa ibang tao+Paggawa ng isang gawain kapag may nag-utos lamang<Pag-iwas sa mga gawain",
"Ano ang ibig sabihin ng pagiging mapanagutan sa pamilya?=Pagtupad sa mga tungkulin kahit walang nag-uutos>Pag-uutos sa mga kapatid+Pag-iwas sa utos ng magulang<Pagtupad sa mga tungkulin kapag pinagalitan lamang",
"Alin sa mga sumusunod ang hindi kabilang sa mga pangunahing tungkulin ng mga magulang sa pamilya?=Ibili ng mga mamahaling laruan ang mga anak>Maghanapbuhay para sa mga pangangailangan ng pamilya+Gabayan ang mga anak<Bigyan ng edukasyon ang mga anak",
"Ano ang karaniwang ginagawa ng mga nakatatandang kapatid upang maipakita ang pagiging mapanagutan sa pamilya?=Pagtulong sa mga gawaing-bahay>Pag-iimbento ng mga produkto+Pagtatrabaho sa pabrika<Pagpapanatili ng kapayapaan sa komunidad",
"Alin sa mga sumusunod na gawain ang maaari nang gawin ni Bunso?=Pag-aayos ng sariling higaan>Paghuhugas ng pinggan+Pagluluto ng pagkain<Paglalaba ng mga damit",
"Bakit mahalaga ang pagtutulungan sa pamilya?=Upang mapatatag ang pagkakaisa ng pamilya>Upang tumalino ang mga anak+Upang hindi na kailangang magtrabaho ng mga magulang<Upang humanga ang mga kapitbahay",
"Alin sa mga sumusunod ang halimbawa ng pagiging mapanagutan sa bahay?=Pag-aayos ng mga gamit kahit walang nag-uutos>Paghihintay na magalit si Nanay bago magligpit+Pagwawalis ng sahig dahil sinabihan ng guro<Pagpupunas ng mga kasangkapan dahil ipinagawa ni Tatay",
"Alin sa mga sumusunod ang kabaligtaran ng pagiging mapanagutan?=Paghihintay ng utos bago kumilos>Pagtulong sa mga gawaing-bahay tuwing hapon+Pag-aaral kahit walang nagpapaalala<Paglilinis ng bahay kahit hindi inuutusan",
"Alin sa mga sumusunod ang nagpapakita ng pagiging mapanagutan sa kapwa?=Pag-aalok ng tulong kahit hindi ito hinihingi>Pagmamalaki sa kapwa+Pagtangging magmalasakit sa iba<Pag-iwas sa mga taong may problema",
"Kapag nakita mong magulo ang inyong kusina, ano ang dapat mong gawin?=Ayusin ito kahit walang nagsasabi>Maghintay kay Ate na ayusin ito+Ayusin lang ito kapag inutusan ng magulang<Huwag na lang itong pansinin",
"Alin sa mga sumusunod ang sitwasyong nagpapakita ng pagiging mapanagutan?=Paglilinis ng paligid kahit hindi inuutusan>Pagkilos lamang matapos utusan nang tatlong beses+Pag-iwas sa mga utos ng magulang<Pagsunod sa alituntunin pagkatapos mapagalitan",
"Paano mo maipapakita ang pagiging mapanagutan sa inyong paghahapunan?=Sa pamamagitan ng pag-aayos ng hapag kahit walang nag-uutos>Sa pamamagitan ng agad na pag-alis pagkatapos kumain+Sa pamamagitan ng paghihintay ng utos bago tumulong sa pagliligpit<Sa pamamagitan ng pag-ubos sa pinakamasarap na ulam",
"Alin sa mga sumusunod ang naglalarawan sa isang batang mapanagutan sa pamilya?=Hindi na kailangang paalalahanan sa kanyang mga tungkulin>Laging nagbibigay ng utos sa nakababatang kapatid+Laging kailangang sabihan bago gumalaw<Ayaw gumawa ng takdang-aralin",
"Ano ang dapat mong gawin kung may pagsusulit kinabukasan?=Mag-aral kahit walang nagsasabi>Hintayin ang paalala ng magulang bago mag-aral+Maglibang-libang muna bago mag-aral<Matulog nang hindi nag-aaral",
"Alin sa mga sumusunod ang hindi halimbawa ng pagiging mapanagutan?=Paghihintay ng utos bago magdilig>Pagliligpit sa kusina kahit walang nag-uutos+Paggawa ng takdang aralin nang walang nagpapaalala<Pagtulong sa nakababatang kapatid kahit walang nakakakita",
"Alin sa mga sumusunod ang kabilang sa mga benepisyo ng pagtulong sa mga gawaing-bahay?=Pagiging hindi masyadong pagod ng mga magulang>Pagiging mas balisa ng mga magulang+Madalas na pagkakasakit ng mga kapatid<Madalas na pagtatalo sa pamilya",
"Alin sa mga sumusunod ang bunga ng pagiging mapanagutan sa bahay?=Mas masayang samahan sa pamilya>Madalas na tampuhan+Pag-init ng ulo ng magulang<Di-pagkakaunawaan sa pagitan ng magkapatid",
"Ang pagpapaligo sa alagang aso kahit hindi inuutusan ay hindi halimbawa ng alin sa mga sumusunod?=Kawalan ng inisyatiba>Pagkukusa+Pagiging mapanagutan<Pagiging responsable",
"Alin sa mga sumusunod ang kasingkahulugan ng pagiging mapanagutan?=Pagiging responsable>Kawalan ng disiplina+Kawalan ng inisyatiba<Kawalan ng pagkukusa",
"Alin sa mga sumusunod ang hindi ipinapakita ng isang mapanagutang bata?=Katamaran>Pagiging responsable+Pagiging mapagkakatiwalaan<Pagkakaroon ng disiplina",
"Alin sa mga sumusunod ang hindi bunga ng pagiging mapanagutan?=Kawalan ng tiyaga sa mga gawain>Pagkakaroon ng tiwala sa sarili+Pagpapakita ng respeto ng iba<Pagiging responsable",
"Ano ang dapat mong gawin pagkatapos ninyong kumain?=Tumulong magligpit kahit walang nagsasabi>Iwanan lang basta ang pinagkainan+Maghintay ng utos bago tumulong magligpit<Pumunta sa sala para magpahinga",
"Bakit mahalaga ang pagiging masipag at mapanagutan sa tahanan?=Upang mapagaan ang mga gawain ng pamilya>Para mapuri ng mga kapitbahay ang pamilya+Para hindi mapagalitan ng magulang<Para makahingi ng pabuya sa magulang",
"Ano ang nararamdaman ng magulang kapag nagpapakita ng pagiging mapanagutan ang anak?=Tuwa at ginhawa>Pagod at inis+Galit at tampo<Pagkabigo at lungkot",
"Paano nakakatulong sa personal na buhay ng isang tao ang pagtupad niya sa kanyang mga tungkulin?=Nahuhubog nito ang kanyang disiplina>Natututo siyang umiwas sa mga responsibilidad+Nababawasan nito ang kanyang tiwala sa sarili<Nagiging mapagmalaki siya sa kapwa",

);

?>

</head>

</bod

</html>