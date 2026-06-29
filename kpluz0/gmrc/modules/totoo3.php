<html> 
<head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Totoo sa Pamilya - GMRC in KPluz.com    </title>   
</title><body>
<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Totoo sa Pamilya";
$_SESSION['tnum']="*37";

$questions=array(

"Alin sa mga sumusunod ang nagpapakita ng pagiging tapat sa pamilya?=Pagsasabi ng totoo sa lahat ng oras>Paglilihim ng nararamdaman+Pagsisinungaling kung kinakailangan<Pagtangging magsalita",
"Ano ang dapat mong gawin kapag may nakita kang gamit na hindi sa iyo?=Ibalik ito sa may-ari>Itapon ito sa basurahan+Ibigay ito sa kapamilya<Iuwi ito sa bahay",
"Alin sa mga sumusunod ang nagpapakita ng pagkamatapat?=Paggawa ng tama kahit walang nakakakita>Paggawa ng tama kung may nakakakita lamang+Pagsasabi ng totoo kung kailan lang naisin<Paglilihim sa magulang",
"Alin sa mga sumusunod ang naglalarawan sa isang batang matapat?=Pinagkakatiwalaan ng iba>Natatakot sa magulang+Iniiwasan ng mga kaibigan<Laging nagdadahilan",
"Alin sa mga sumusunod ang dulot ng pagiging tapat sa loob ng tahanan?=Masayang samahan ng pamilya>Pag-aaway ng mga miyembro ng pamilya araw-araw+Pag-iwas ng lahat makipag-usap<Kawalan ng tiwala ng bawat isa",
"Alin sa mga sumusunod ang hindi makakatulong sa pag-unawa ng tunay na damdamin ng iba?=Pagiging mapanghusga>Pakikinig nang maigi+Maayos na pagtatanong<Pagsasakilos ng empatiya",
"Alin sa mga sumusunod ang ginagawa ng isang tapat na anak?=Nagsasabi ng totoo sa magulang kahit mapapagalitan>Naglilihim ng kanyang mga problema+Nagpapanggap na masaya<Umiiwas sa mga tungkulin sa bahay",
"Alin sa mga sumusunod ang bunga ng pagiging tapat?=Maayos na pakikitungo sa lahat>Pagkakaroon ng maraming kagalit+Paglayo ng mga kaibigan<Pag-aalinlangang makisalamuha sa ibang tao",
"Alin sa mga sumusunod ang naglalarawan sa isang taong tapat?=Walang pangamba sa ibang tao>Madalas umiwas sa ibang tao+Nagtatago ng maraming lihim<Palaging nagpapalusot",
"Ano ang dapat mong gawin kung makabasag ka ng isang baso pero wala namang nakakita?=Umaming ikaw ang nakabasag>Sabihing ang kapatid mo ang nakabasag+Magkunwaring wala kang alam tungkol dito<Magtago muna sa sariling silid",
"Alin sa mga sumusunod ang hindi ginagawa ng isang taong tapat?=Pagyayabang kahit hindi totoo>Pagtitiwala sa sarili+Pagtupad sa mga tungkulin<Pagsunod sa mga batas sa lahat ng oras",
"Ano ang dapat mong gawin kapag mayroon kang di-pagkakaintindihan sa isang kapamilya?=Makipag-usap sa kanya nang mahinahon at taos-puso>Magkulong sa kuwarto at umiyak+Umalis muna ng bahay at lumayo<Makipagtalo sa kanya nang pasigaw",
"Ano ang ibig sabihin ng pagiging totoo sa pamilya?=Pagiging bukas at tapat sa damdamin at salita>Pag-iwas sa pakikipag-usap sa ibang mga kapamilya+Pagkukunwaring masaya palagi<Pagsisinungaling para walang magalit",
"Alin sa mga sumusunod ang dapat iwasan sa pakikipag-usap sa pamilya?=Pagsagot nang walang respeto>Magalang na pagsasalita+Pagiging mapagkumbaba<Paghingi ng paumanhin",
"Ano ang dapat mong gawin kung may problema ka sa iyong paaralan?=Sabihin ito sa magulang o kapatid>Ilihim ito sa mga kapamilya+Maghamon ng away sa isang kaklase<Gamitin itong dahilan para makapanggulo",
"Alin sa mga sumusunod ang dapat mong gawin kapag kinakausap ka ng iyong mga magulang?=Tumahimik muna at makinig nang mabuti>Sabayan sila sa pagsasalita+Umalis sa gitna ng pag-uusap<Magtaas ng boses habang nagdadahilan",
"Alin sa mga sumusunod ang nagpapalalim sa ugnayan mo sa pamilya?=Pagbabahagi ng tunay na damdamin araw-araw>Pagkukulong sa sariling kwarto+Paglilihim ng malalaking problema<Pag-iwas sa pakikipag-usap",
"Alin sa mga sumusunod ang dapat mong gawin kapag pinagsasabihan ka ng iyong magulang?=Makinig at magpasalamat sa paalala>Sumagot nang pabalang+Magtaas ng boses<Magdabog at umalis",
"Alin sa mga sumusunod ang nagpapalakas ng samahan sa pamilya?=Bukas na pakikipag-usap at pakikinig>Hindi pagkibo kapag kinakausap+Pagtatalo araw-araw<Paglilihim ng totoong damdamin",
"Ano ang unang hakbang sa pagiging totoo sa pamilya?=Pagtanggap sa sarili at tunay na damdamin>Pagpapanggap na palaging masaya+Pag-iwas sa pakikipag-usap<Pagsisinungaling para walang magalit",
"Alin sa mga sumusunod ang halimbawa ng hindi maayos na pakikipag-ugnayan sa pamilya?=Pagsigaw sa kapatid>Pakikinig sa magulang+Pagtulong sa mga gawaing-bahay<Pag-amin sa nagawang pagkakamali",
"Alin sa mga sumusunod ang resulta ng maayos na pakikipag-ugnayan?=Mapayapang samahan sa pamilya>Madalas na tampuhan+Hindi pagkakaintindihan<Paglayo ng loob ng bawat isa",
"Ano ang dapat mong gawin kapag nasaktan mo ang damdamin ng isang kapamilya?=Humingi ng paumanhin sa kanya>Magkunwaring walang nangyari+Umalis sa bahay at lumayo<Sisihin siya sa nangyari",
"Ano ang dapat mong gawin kung hindi mo naiintindihan ang sinabi ng isang kapamilya?=Magtanong nang maayos at magalang>Putulin ang pag-uusap+Magkunwaring naintindihan ito<Magalit nang walang dahilan",
"Ano ang dapat gawin ng isang pamilya sa oras ng di-pagkakaunawaan?=Pag-usapan nang maayos at mahinahon ang problema>Magsisihan sa nangyari+Magkulong ang bawat isa sa kanya-kanyang kuwarto<Pag-usapan nang pasigaw at pagalit ang problema",

);

?>
</head>
</bod
</html>