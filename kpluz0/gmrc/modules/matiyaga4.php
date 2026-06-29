<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Matiyaga - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Matiyaga";
$_SESSION['tnum']="*47";

$questions=array(

"Alin sa mga sumusunod na gawain ang maisasagawa nang may kalidad sa pamamagitan ng pagtitiyak na walang natitirang dumi o mantika sa bawat gamit bago ito patuyuin?=Paghuhugas ng pinggan>Pag-aalaga ng halaman+Pag-aayos ng higaan<Pagpaplantsa ng damit",
"Alin sa mga sumusunod ang HINDI ginagawa upang maalagaang mabuti ang mga halaman?=Pagpapatong ng mabibigat o malalapad na bagay sa ibabaw>Pagdidilig+Pagtatanggal ng mga tuyong dahon<Paglalagay sa lugar na angkop sa mga halamang inaalagaan",
"Alin sa mga sumusunod na gawain ang maisasagawa nang may kalidad sa pamamagitan ng pagtitiyak na pantay-pantay ang pagkakatupi ng mga gilid ng kumot at maayos ang pagkakalapat ng mga bagay?=Pag-aayos ng higaan>Pag-aalaga ng halaman+Paghuhugas ng pinggan<Pagpaplantsa ng damit",
"Alin sa mga sumusunod ang HINDI ginagawa upang maisagawa nang may kalidad ang pagpaplantsa ng damit?=Pag-iiwan ng plantsa sa ibabaw ng damit habang may ibang ginagawa>Maayos na pagsasabit ng bawat damit pagkaplantsa nito+Pagtitiyak na walang kulubot sa bawat damit<Pagtitiyak na maayos ang lahat ng linya ng bawat damit",
"Alin sa mga sumusunod na gawain ang maisasagawa nang may kalidad sa pamamagitan ng pagtatanggal ng alikabok at dumi sa lahat ng sulok, bahagi, at kasangkapan?=Paglilinis ng bahay>Pag-aalaga ng halaman+Pag-aayos ng higaan<Pagpaplantsa ng damit",
"Alin sa mga sumusunod ang HINDI ginagawa upang maisagawa nang may kalidad ang pagluluto ng pagkain?=Pagpapabaya sa kusina>Pag-iwas sa pagkasunog ng mga sangkap+Paglalaan ng sapat na oras<Pagtitiyak na tama ang timpla",
"Alin sa mga sumusunod na gawain ang maisasagawa nang may kalidad sa pamamagitan ng pag-unawa sa binabasa at pagtapos sa lahat ng takdang aralin?=Pag-aaral ng leksiyon>Paglilinis ng bahay+Pag-aayos ng higaan<Pagpaplantsa ng damit",
"Ano ang ibig sabihin ng pagiging matiyaga?=Patuloy na paggawa sa isang gawain kahit mahirap ito>Pagtanggi sa mga trabahong mabibigat+Pagmamadali sa bawat gawain<Paggawa sa isang gawaing hindi alam gawin",
"Paano nakakatulong ang pagiging matiyaga sa pagpapaunlad ng sarili?=Mas natututo sa bawat pagsubok na hindi sinusukuan>Nagkakaroon ng mas maraming panahon para sa sarili+Napipilitang gawin ang mga gustong gawin lamang<Natututong magmadali sa bawat gawain",
"Alin sa mga sumusunod ang malamang na mangyayari kung hindi tayo matututong magtiyaga sa mga gawain?=Hindi tayo magtatagumpay sa ating mga layunin>Matututo tayong lumutas ng mga suliranin+Mas mabilis nating matatapos ang ating mga gawain<Matututo tayong maging responsable at mapanagutan",
"Bakit mahalaga ang pagtitiyak ng mataas na kalidad sa bawat gawain?=Para maging matagumpay ang resulta>Para maging mas magaan ang trabaho+Para mapuri ng iba<Para mabilis matapos ang trabaho",
"Ano ang layunin ng pagtutulungan ng pamilya sa paggawa ng mga gawain?=Para gumaan ang trabaho ng bawat isa>Para hindi mapagalitan ng mga magulang ang mga anak+Para mainggit ang mga ibang pamilya<Para mapagod ang mga anak",
"Bakit mahalaga ang pagkakaroon ng tiyaga sa pag-aaral ng leksiyon?=Para maunawaang mabuti ang aralin>Para maagang makatulog sa gabi+Para makapanood ng TV bago matulog<Para hindi mapagalitan ng magulang",
"Alin sa mga sumusunod ang pangunahing benepisyo sa pamilya ng sama-samang paggawa ng mga gawain?=Pagkakaisa at pagiging malapit sa bawat isa>Mas mataas na kita+Mas maraming kaibigan<Paghanga mula sa komunidad",
"Alin sa mga sumusunod ang dapat gawin ng pamilya upang maging matiyaga ang bawat miyembro nito?=Pagtuturo at paggabay>Pag-aakusa at paninisi+Pagpaparusa<Pagbibigay ng labis-labis na gawain",
"Bakit mahalagang isagawa ang bawat trabaho nang may tiyaga?=Para matapos ito nang matagumpay>Para mabilis itong maisantabi+Para hindi mapagod<Para makaiwas sa iba pang gawain",
"Paano nakakatulong ang pagtutulungan sa loob ng pamilya sa pagpapaunlad ng sarili?=Natututo ng mga tamang paraan ng paggawa>Natututong magmadali sa paggawa+Natututong umiwas sa mabibigat ang gawain<Natututong magpalusot sa mga tungkulin",
"Alin sa mga sumusunod ang HINDI bunga ng pagiging matiyaga ng mga anak at pagbibigay nila ng buong kakayahan sa bawat gawaing-bahay?=Pagtambak ng mga dapat gawin>Kasiyahan sa loob ng pamilya+Matagumpay na resulta sa tuwina<Pagpapaunlad sa kanilang mga sarili",
"Paano makakatulong ang mga magulang sa paghahanda ng kanilang anak para sa isang kumpetisyon?=Sa pamamagitan ng pagtuturo at pagbibigay ng suporta>Sa pamamagitan ng pagpaparusa sa bawat kamalian+Sa pamamagitan ng pagbibigay ng mga gawaing hindi kaya ng anak<Sa pamamagitan ng pananakot",
"Bakit mahalagang makinig sa pagtuturo ng mga nakatatanda sa pamilya tungkol sa paggawa ng mga gawaing-bahay?=Upang maiwasan ang pagkakamali>Upang hindi mapagod+Upang makaiwas sa dagdag na gawain<Upang mahingi ang gusto",
"Alin sa mga sumusunod ang HINDI katangian ng isang bahay na matiyagang nililinis palagi?=Umaalingasaw>Maayos+Maaliwalas<Ligtas",
"Ano ang dapat mong gawin kung nahihirapan ka sa isang gawain?=Humingi ng tulong o payo at patuloy na magsikap>Sumuko agad at iwan ang ginagawa+Magreklamo sa nagpapagawa nito<Mainis sa sarili at umiyak sa isang tabi",
"Ano ang pangunahing epekto ng pagsuko sa kalagitnaan ng isang gawain?=Pagkawala ng oportunidad na matutunan ito>Paggaan ng pakiramdam+Matagumpay na resulta ng paggawa<Pag-iwas sa mga dagdag na gawain sa hinaharap",
"Ano ang dapat mong gawin kapag sinabihan kang nagkamali ka sa isang gawain?=Alamin ang pagkakamali at itama ito>Sumuko at iwanan ang gawain+Magpalusot sa pagkakamali<Isisi sa iba ang pagkakamali",
"Paano nakakatulong sa iyong paghahanda sa hinaharap ang pagiging matiyaga?=Natututo ka ng disiplina at mahahalagang kasanayan>Nasasanay ka sa pagpapaliban ng iyong mga gawain+Natututo kang magpasa ng mga gawain sa iba<Nasasanay ka sa negatibong pag-iisip",

);

?>

</head>

</bod

</html>