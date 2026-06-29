<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Maagap sa Pag-iimpok - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Maagap sa Pag-iimpok";
$_SESSION['tnum']="*52";

$questions=array(

"Ano ang ibig sabihin ng pag-iimpok?=Pagtatabi ng pera para sa hinaharap>Pagbili ng maraming gamit+Pagkita ng maraming pera<Pagbibigay ng pera sa iba",
"Alin sa mga sumusunod ang maaari mong gawin para ikaw ay makapag-impok?=Pagtatabi ng kahit kaunting halaga araw-araw>Paggastos ng lahat ng baon araw-araw+Pagbili ng mga luho<Pangungutang ng malaking halaga sa bangko",
"Bakit mahalaga ang paggawa ng badyet?=Para masubaybayan ang paggastos>Para makautang nang malaki+Upang makabili ng mga luho<Para makakuha ng mga diskuwento",
"Alin sa mga sumusunod ang maaaring gawin upang maiwasan ang labis na paggastos?=Paggasta lamang sa mahahalagang bayarin>Pagpapaliban ng pagbabayad ng tubig at kuryente+Pagkain sa labas araw-araw imbes magluto<Pagbili ng mga luhong nakadiskuwento",
"Alin sa mga sumusunod ang hindi magandang gawi sa pera?=Pagbili ng mga hindi kailangan>Pag-iipon ng barya sa alkansiya+Pag-iimpok ng pera sa bangko<Paggawa ng badyet para sa mga gastusin",
"Alin sa mga sumusunod ang isa sa mga benepisyo ng pag-iimpok?=Pagkakaroon ng pondo para sa emerhensiya>Pagkahilig sa pagbili ng mga luho+Pagiging lapitin ng mga nais umutang<Pagiging bihasa sa pangungutang",
"Alin sa mga sumusunod ang hindi mainam gamitin sa pag-iimpok ng pera?=Kartong kahon>Bangko+Kaha de yero<Alkansiya",
"Ano ang dapat mong gawin bago ka bumili ng isang mamahaling bagay?=Pag-isipan kung kailangan talaga ito>Ipaalam ang planong pagbili sa lahat ng mga kaibigan+Umutang agad ng pambili nito<Bumili agad ng pagtataguan nito",
"Alin sa mga sumusunod ang dapat mong bigyan ng prayoridad sa iyong paggastos?=Pang-araw-araw na pagkain>Bagong cellphone+Magarang sapatos<Mamahaling kuwintas",
"Kailan magandang magsimula ng pag-iimpok ang isang tao?=Sa murang edad>Kapag may anak na+Sa pagtanda<Kapag may utang na",
"Alin sa mga sumusunod ang halimbawa ng matalinong paggastos?=Pagbabayad ng kuryente at tubig sa oras>Pagkain sa mamahaling restawran+Pagbili ng maluhong alahas<Paglilibre sa mga kaibigan kahit walang okasyon",
"Bakit mahalagang sumangguni sa magulang tungkol sa pera?=Para matuto ng wastong pamamahala ng naipon>Para makahingi sa kanila ng pera+Para makautang sa kanila ng pambili ng luho<Para hindi nila pansinin ang iyong paggastos",
"Ano ang kahulugan ng 'maagap sa pag-iimpok?'=Maagang pagtatabi ng pera>Pag-iipon lang ng pera kapag may pangangailangan na+Madalas na paggastos<Maagang pagbili ng mga luho",
"Alin sa mga sumusunod ang karaniwang epekto ng pag-iwas sa utang?=Kawalan ng sakit sa ulo>Mas malaking bayarin+Masamang karanasang pinansiyal<Mas mabigat na problema",
"Alin sa mga sumusunod ang unang hakbang sa tamang paraan ng pag-iimpok?=Magtakda ng layunin>Bumili ng alkansya+Itala ang mga gastos at ipon<Gawing mas matipid ang pamumuhay",
"Paano nakakatulong ang iyong naimpok sa pagkakaroon mo ng magandang kinabukasan?=Napagkukunan ito ng pondo para matupad ang iyong mga pangarap>Naitutulak ka nitong maging maluho+Nakakatulong ito para makapagsimula ka ng bisyo<Nagiging dahilan ito para kainggitan ka ng ibang tao",
"Alin sa mga sumusunod ang paraan ng pag-iimpok na kumikita ng interes?=Pagdedeposito sa bangko>Pagsisilid ng barya sa alkansya+Pagtatabi ng pera sa garapon o lata<Pag-iipon ng pera sa ilalim ng kama",
"Alin sa mga sumusunod ang dapat mong bigyan ng pansin bago ka bumili ng isang produkto?=Kung kailangan mo talaga ito>Kung galing ito sa ibang bansa+Kung uso ito sa mga kabataan<Kung sikat ang tatak nito",
"Alin sa mga sumusunod ang hindi mo dapat isaalang-alang bago ka bumili ng isang bagay?=Kung may ganito na ang iyong kapitbahay>Kung kailangan mo talaga ito+Kung may pambili ka na nito<Kung wala itong epekto sa iyong badyet sa mga darating na panahon",
"Ano ang layunin ng pagtatala ng iyong mga gastusin?=Upang masubaybayan kung saan napupunta ang iyong pera>Upang mapataas ang iyong kita+Upang maipagmalaki ang talaan sa mga kaibigan<Upang magkaroon ng patunay sa iyong pagiging gastador",
"Alin sa mga sumusunod ang hindi isa sa mga benepisyo ng pag-iimpok sa bangko?=Nakakaltasan ang pera rito>Nakakatulong ito sa ekonomiya+Kumikita ito ng interes<Mas ligtas ang pera rito",
"Alin sa mga sumusunod ang gawing dapat iwasan sa pag-iimpok?=Pagbili ng mga bagay na hindi kailangan>Pagkakaroon ng layunin+Patuloy na pagtatabi ng pera<Paggawa ng badyet para sa mga gastusin",
"Alin sa mga sumusunod ang dapat mong isama sa iyong plano ng pag-iimpok?=Mga gamit sa pag-aaral>Mga bagong laruan+Mga laro sa kompyuter<Maluhong pananamit",
"Alin sa mga sumusunod ang gawing magbubunga ng matagumpay na pag-iimpok?=Disiplinadong pagtatabi ng pera>Pag-ubos ng kita o baon+Pag-utang sa mga kakilala<Pagbili ng mga luho",
"Paano ka matutulungan ng pag-iimpok sa oras ng kagipitan?=Makakaiwas ka sa pangungutang>Makakalibre ka sa mga bayarin+Maipagpapaliban mo ang pagbabayad<Mabibigyan ka ng mga diskuwento",

);

?>

</head>

</bod

</html>