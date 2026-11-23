<html>
<head>
<body>

<?php
$_SESSION['title']="Mga Hudyat o Pananda sa Teksto";

if ($grd<3){

$questions=array(

"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=una>ngunit+gayundin<kaya",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=pangalawa>kaya+subalit<lalo na",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=kasunod>pero+ngunit<gayundin",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=ikalima>pero+sapagkat<dahil",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=sunod>dahil+subalit<kasi",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=huli>kasi+dahil sa<kaya",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=at huli>sapagkat+kaaya-aya<ngunit",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=kasunod>sapagkat+mabagal<ngunit",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=mas maganda>sapagkat+dahil sa<ngunit",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=makinis>pero+ikapito<sunod",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=pinakamatamis>dahil+sunod<subalit",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=napakatahimik>sapagkat+ang sanhi<huli",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=hindi makintab>subalit+kasunod<ang bunga",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=mas maasim>sapagkat+bukod dito<kasunod",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=nakabibingi>una sa lahat+bukod dito<ang resulta",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=mahapdi>panghuli+kaya<kasunod",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=mabango>una+kaya<pero",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=pangatlo>kaya+napakainit<lalo na",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=sa simula>dahil sa+nakakaakit<ayon sa",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=pagkatapos nito>dahil sa+naging bunga<para linawin",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=unang hakbang>upang maunawaan+na naging sanhi<samakatuwid",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=unang-una>ayon sa+na naging<mas masipag",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=pinakahuli>pinakamabilis+batay sa<alam natin",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=huling hakbang>masunurin+mas mahusay<subalit",
);

}

if ($grd>=3){

$questions=array(

"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=una>ngunit+gayundin<kaya",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=pangalawa>kaya+subalit<lalo na",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=kasunod>pero+ngunit<gayundin",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=ikalima>pero+sapagkat<dahil",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=sunod>dahil+subalit<kasi",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=huli>kasi+dahil sa<kaya",
"Alin sa mga sumusunod ang hudyat o pananda ng pag-iisa-isa?=at huli>sapagkat+kaaya-aya<ngunit",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=mas maganda>sapagkat+dahil sa<ngunit",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=makinis>pero+ikapito<sunod",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=pinakamatamis>dahil+sunod<subalit",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=napakatahimik>sapagkat+ang sanhi<huli",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=hindi makintab>subalit+kasunod<ang bunga",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=mas maasim>sapagkat+bukod dito<kasunod",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=nakabibingi>una sa lahat+bukod dito<ang resulta",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=mahapdi>panghuli+kaya<kasunod",
"Alin sa mga sumusunod ang hudyat o pananda ng paglalarawan?=bilang deskripsyon>ikasampung hakbang+na naging sanhi<samakatuwid",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=pangatlo>kaya+napakainit<lalo na",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=sa simula>dahil sa+nakakaakit<ayon sa",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=pagkatapos nito>dahil sa+naging bunga<para linawin",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=unang hakbang>upang maunawaan+na naging sanhi<samakatuwid",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=unahin>bilang deskripsyon+na nagresulta sa<upang maging malinaw",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=bilang katapusan>kung gaano kaganda+maraming datos<napatunayan",
"Alin sa mga sumusunod ang hudyat o pananda ng pagsunod-sunod?=panghuling hakbang>kinumpirma+napag-alaman<subalit",
"Alin sa mga sumusunod ang hudyat o pananda ng pagpapaliwanag?=ayon sa pag-aaral>ikalawang hakbang+pagkatapos nito<napakabait",
"Alin sa mga sumusunod ang hudyat o pananda ng pagpapaliwanag?=batay sa resulta>pinakahuli+masyadong maingay<kasunod nito",
"Alin sa mga sumusunod ang hudyat o pananda ng pagpapaliwanag?=ayon sa mga eksperto>huling hakbang+mas makulay<sa simula",
"Alin sa mga sumusunod ang hudyat o pananda ng pagpapaliwanag?=bilang patunay>sa ikaapat na hakbang+kasunod nito<napakasakit",
"Alin sa mga sumusunod ang hudyat o pananda ng pagpapaliwanag?=napag-alaman>ang huling hakbang+masangsang na amoy<unang-una",
"Alin sa mga sumusunod ang hudyat o pananda ng pagpapaliwanag?=ayon sa pagsusuri>pagkatapos nito+kumikinang<masyadong maasim",

);
}

?>

</head>

</body>

</html>