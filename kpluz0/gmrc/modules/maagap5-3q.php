<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Maagap sa Oras - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Maagap sa Oras";
$_SESSION['tnum']="*5h";

$questions=array(

"Ano ang pangunahing layunin ng pagiging maagap sa oras?=Makaiwas sa pagkaantala sa gawain>Makapagmalaki sa iba+Makatipid sa pera<Makapagdagdag ng kaalaman",
"Alin sa mga sumusunod ang hindi mo ipinapakita kapag maaga kang dumarating sa klase?=Kawalan ng pagkukusa>Paggalang sa guro+Kahandaang matuto<Pagiging disiplinado",
"Alin sa mga sumusunod ang isang paraan upang maisabuhay ang pagiging maagap sa oras?=Paghahanda ng mga gamit sa gabi para sa pagpasok kinabukasan>Pagsisimula ng proyekto kapag malapit na ang deadline+Pagpupuyat tuwing gabi sa paglalaro sa kompyuter<Pagpapaliban ng pag-aaral",
"Alin sa mga sumusunod ang nagpapakita ng pagiging responsable sa takdang-aralin?=Pagpasa nito bago ang deadline>Pangongopya lamang nito sa kaibigan+Paggawa nito sa huling minuto<Pagkalimot na gawin ito",
"Ano ang ipinapakita mo sa iyong mga kaibigan kapag dumarating ka nang maaga sa inyong mga lakad?=Pagiging maaasahan>Labis na kasabikan+Pagiging makasarili<Kayabangan",
"Alin sa mga sumusunod ang dapat mong gawin kung mahuhuli ka sa isang pagkikita?=Mag-text agad sa kausap na mahuhuli ka>Huwag na lang pumunta+Magbigay ng palusot sa pagkahuli<Manisi ng ibang tao sa pagkahuli",
"Bakit mainam na maghanda ka ng mga gamit mo sa gabi para sa pagpasok mo kinabukasan?=Para hindi ka magmadali sa umaga>Para maaari kang matulog nang mas mahaba+Para maaari mong madaliin ang iba sa umaga<Para hindi ka mapagalitan ng magulang",
"Ano ang karaniwang resulta ng pag-iwas sa pagpapaliban ng isang gawain?=Mas mahusay na pagkakagawa nito>Pagkakamali sa paggawa nito+Paghihirap sa paggawa nito<Mas pangit na pagkakagawa nito",
"Alin sa mga sumusunod ang karaniwang bunga ng pag-aaral kahit walang pagsusulit?=Pagiging handa sa pagsusulit sa lahat ng oras>Pagkakaroon ng karapatang lumiban sa klase+Pagkabawas ng mga takdang-aralin<Pag-iwas sa mga pagsusulit",
"Alin sa mga sumusunod ang nagpapakita ng pagiging maagap sa oras sa klase?=Pagdating nang maaga sa silid-aralan>Pagdating sa silid-aralan kapag nagsimula na ang klase+Pagdadala ng maraming gamit<Pagkakaroon ng maraming baong pagkain",
"Bakit mahalagang sundin ang iskedyul ng mga klase sa paaralan?=Upang maging organisado at produktibo ang pag-aaral ng mga bata>Upang makatipid ang mga magulang sa mga bayarin sa paaralan+Upang hindi kailangang magtiyaga ng mga estudyante sa pag-aaral<Upang hindi magkaroon ng alitan ang mga estudyante",
"Alin sa mga ito ang hindi ipinapakita ng isang mag-aaral na palaging tumutupad sa kanyang mga tungkulin sa tamang oras?=Pagiging iresponsable>Pagiging masipag+Pagiging mapagkusa<Pagiging maaasahan",
"Alin sa mga sumusunod ang isang palatandaan ng paggalang sa oras ng iyong mga kasapi sa paggawa ng isang proyekto?=Pagsunod sa takdang oras ng pagkikita>Pag-uuna ng nais mong gawin kaysa sa naitakdang iskedyul+Pagkalimot sa planong napagkasunduan<Pag-alis kahit mayroon pang kailangang gawin",
"Alin sa mga sumusunod ang iniiwasan ng mga taong maagap sa oras?=Pagpapaliban ng mga gawain>Pagkakaroon ng listahan ng mga gagawin+Pagpaplano ng iskedyul<Pagbabalanse ng pagtatrabaho at pagpapahinga",
"Alin sa mga sumusunod ang hindi nagpapakita ng paggalang sa oras ng guro?=Pagkalimot sa bagay na kailangan mong dalhin sa klase>Pagdating nang maaga sa klase+Pakikinig nang mabuti sa kanyang pagtuturo<Pagpasa ng takdang aralin sa tamang oras",
"Alin sa mga sumusunod ang hindi isa sa mga paraan ng pagtulong ng teknolohiya sa pagiging maagap sa oras?=Pagbibigay ng mga pabuya sa online games>Pagpapabilis ng komunikasyon+Paulit-ulit na pagpapaalala<Pagpapadali ng pagpaplano",
"Alin sa mga sumusunod ang dapat mong gawin upang maiwasan ang pang-aabala sa iba?=Pagtupad sa mga tungkulin sa tamang oras>Pagkalimot sa mga nakatokang gawain+Biglang pagbabago ng plano nang walang paalam<Pag-uuna ng mga nais gawin kaysa sa mga dapat gawin",
"Alin sa mga sumusunod ang ipinapakita ng pagpapasa ng proyekto sa tamang oras?=Pagrespeto sa oras ng guro>Pag-uuna ng sariling kasiyahan+Pagnanais makakuha ng papuri sa iba<Pagmamalaki sa mga kaklase",
"Alin sa mga sumusunod ang karaniwang bunga ng maagap na paghahanda para sa isang gawain?=Mas maayos na daloy ng paggawa nito>Pagkalito sa paggawa nito+Paggugol ng mas mahabang oras para sa paggawa nito<Pagkakaroon ng maraming mali sa paggawa nito",
"Alin sa mga sumusunod ang hindi makakatulong sa epektibong paggawa ng isang grupo sa kanilang proyekto?=Pagpasa ng buong proyekto sa iisang miyembro>Pagiging maagap ng lahat sa oras+Paggalang ng lahat sa bawat isa<Pagtutulungan ng lahat",
"Ano ang karaniwang epekto ng pagtutulungan ng lahat sa paggawa ng isang bagay?=Nagiging magaan at mabilis ang gawain>Nagiging kumplikado at mahirap ang gawain+Naiinip at nababagot ang lahat sa paggawa<Nagkakaroon ng pagtatalo sa paggawa",
"Alin sa mga sumusunod ang karaniwang epekto ng pagiging huli ng isa o higit pang mag-aaral sa klase?=Pagkaabala sa daloy ng pagtuturo ng guro>Pagiging mas ganadong magturo ng guro+Paglalim ng pag-unawa ng mga estudyante sa aralin<Pagpapanatili ng pokus ng mga estudyante sa pagtuturo ng guro",
"Bakit mahalaga ang pagkakaroon ng listahan ng mga kailangang gawin?=Para walang makalimutang gawin sa mga ito>Para maaliw sa paggawa ng mga ito+Para maplano ang pagpapaliban ng mga ito<Para maipasa ang mga ito sa ibang tao",
"Alin sa mga sumusunod ang hindi ipinapakita ng maagap na pag-aaral kahit walang deadline?=Pagbabalewala sa sariling kinabukasan>Pagiging mapaghanda+Pagiging disiplinado<Pagsisikap sa pag-aaral",
"Alin sa mga ito ang hindi isa sa mga dahilan kung bakit dapat kang magpasabi sa iyong mga kasama kung ikaw ay mahuhuli o hindi makakarating sa inyong pagkikita?=Para maipakitang mas mahalaga ang iyong oras kaysa sa oras nila>Upang hindi sila maghintay sa wala+Upang magpakita sa kanila ng respeto<Para mapanatili ang tiwala nila sa iyo",

);

?>

</head>

</body>

</html>