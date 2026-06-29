<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mabuting Katiwala - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mabuting Katiwala";
$_SESSION['tnum']="*4a";

$questions=array(

"Ang pagsasara ng gripo habang nagsisipilyo o naghuhugas ng pinggan ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan ng tubig?=Pagtitipid sa tubig>Tamang pagtatapon ng basura+Pag-aalaga ng halaman<Pagbabawas ng paggamit ng kemikal",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan ng tubig ang nakakatulong sa pagreresaykel na nakakabawas naman ng polusyon?=Tamang pagtatapon ng basura>Pagtitipid sa tubig+Pag-aalaga ng halaman<Pagbabawas ng paggamit ng kemikal",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan ng tubig ang nakakatulong sa pagpapasariwa ng hangin at pagsasala ng tubig-ulan bago ito makarating sa mga anyong-tubig?=Pag-aalaga ng halaman>Pagtitipid sa tubig+Tamang pagtatapon ng basura<Pagbabawas ng paggamit ng kemikal",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan ng tubig ang nakakatulong sa pag-iwas sa pagbabara ng mga tubo at 'paglalangis' ng mga anyong tubig?=Pag-iwas sa pagtatapon ng mantika sa lababo>Pagtitipid sa tubig+Tamang pagtatapon ng basura<Pag-aalaga ng halaman",
"Ang paglahok sa paglilinis ng isang sapa o ilog sa komunidad ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan ng tubig?=Pag-aalaga ng mga anyong tubig>Pagtitipid sa tubig+Pag-aalaga ng halaman<Pagbabawas ng paggamit ng kemikal",
"Ang paggamit ng mga natural na panlinis tulad ng suka at 'baking soda' imbes na mga komersyal na panlinis tulad ng 'Clorox' ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan ng tubig?=Pagbabawas ng paggamit ng kemikal>Pagtitipid sa tubig+Pag-aalaga ng halaman<Pag-iwas sa pagtatapon ng mantika sa lababo",
"Ang paggamit ng mga 'biodegradable' na sabon, 'shampoo', at 'detergent' ay halimbawa ng alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan ng tubig?=Paggamit ng mga produktong napapanatili>Pagtitipid sa tubig+Pag-aalaga ng halaman<Pag-iwas sa pagtatapon ng mantika sa lababo",
"Alin sa mga sumusunod na paraan ng pagpapanatili ng kalinisan ng tubig ang may kaugnayan sa paghahalaman sa paraang hindi nagdudulot ng kontaminsayon ng mga anyong tubig?=Paggamit ng tamang dami ng pataba at pestisidyo>Pagtitipid sa tubig+Tamang pagtatapon ng basura<Paggamit ng mga produktong napapanatili",
"Alin sa mga sumusunod ang pangunahing layunin ng pagtitipid sa tubig?=Para hindi maubusan ng tubig ang sambayanan>Para bumaba ang babayaran sa tubig+Para maging mas mabilis ang paghuhugas<Para bumaba ang lebel ng mga anyong tubig",
"Alin sa mga sumusunod ang HINDI isa sa mga maaaring mangyari kung hindi natin mapapanatili ang kalinisan ng mga anyong tubig?=Bibilis ang daloy ng mga anyong tubig>Mawawalan tayo ng pagkukunan ng malinis na tubig+Kakalat ang sari-saring sakit<Mas madaling babaha sa ilang mga lugar",
"Alin sa mga sumusunod ang HINDI nakakatulong makatipid ng tubig?=Matagal na paliligo sa shower>Pagkukumpuni ng mga tumutulong tubo+Pagsasara ng gripo habang nagsisipilyo<Pagsasara ng gripo habang nagsasabon ng plato",
"Ano ang dapat gawin sa mga gripo o tubong tumatagas?=Kumpunihin agad>Takpan ng tela para hindi makita+Hayaan lang<Lagyan ng pansalo ng tubig sa ilalim",
"Ano ang epekto ng pagtatapon ng mantika sa lababo?=Pagbabara ng mga tubo at pagdumi ng mga napupuntahang anyong tubig>Pagbilis ng daloy ng tubig sa mga tubo+Paglinaw ng mga napupuntahang anyong tubig<Pagkamatay ng mga mikrobyo sa mga tubo",
"Ano ang pangunahing dahilan kung bakit mas mainam gumamit ng mga natural na panlinis tulad ng suka at 'baking soda'?=Hindi nakakalason ng tubig ang mga ito>Mas madaling gamitin ang mga ito+Mas nakakapatay ng mikrobyo ang mga ito<Mas mabango ang mga ito",
"Ano ang dapat gamitin sa paghuhugas ng mga pinggan upang makaiwas sa polusyon ng tubig?=Sabong biodegradable>Sabong hindi biodegradable+Malakas na asido<Asin",
"Ano ang maaaring gawin ng pamilya upang makatulong sa pag-aalaga ng mga anyong-tubig?=Lumahok sa paglilinis ng mga ito>Manood ng mga paglilinis ng mga ito+Gawing tapunan ng basura ang mga ito<Maligo at maglaro sa mga ito",
"Ano ang pinakamainam gawin sa mantikang hindi na maaaring gamitin sa pagluluto?=Gamitin sa composting>Ilagay sa basurahan+Itapon sa lababo<Itapon sa kanal",
"Alin sa mga sumusunod ang HINDI isa sa mga dahilan kung bakit hindi dapat itapon ang mga basura sa kubeta?=Napapadali ang paglilinis ng bahay>Nakababara ang mga itinapong basura sa mga sewage pipes+Nakakarating ang mga itinapong basura sa mga anyong tubig<Nakababara ang mga itinapong basura sa toilet bowl",
"Ano ang epekto ng paggamit ng mas maraming kemikal sa tahanan?=Mas malalang polusyon sa mga anyong tubig>Mas sariwang hangin sa kapaligiran+Mas malinis na tubig mula sa gripo<Paglinaw ng mga anyong tubig",
"Paano nakakatulong ang paggamit ng mga 'biodegradable' na produkto sa kalinisan ng tubig?=Hindi nagdudulot ng pangmatagalang polusyon sa mga anyong tubig ang mga ito>Mas madaling gamitin ang mga ito+Hindi nabubulok o nawawala ang mga ito sa mga anyong tubig<Mas mura ang mga ito ito",
"Ano ang dapat mong gawin kapag may nakita kang taong magtatapon ng basura sa ilog?=Pigilan siya at payuhang ipadala na lang sa basurero ang itatapon>Hayaan lang siyang magtapon sa ilog+Tulungan siyang magtapon sa ilog<Sabihan siyang sa kalye na lang siya magtapon",
"Paano nakakatulong ang tamang paghihiwalay ng basura sa kalinisan ng tubig?=Nababawasan ang mga di-nabubulok na basurang maaaring makarating sa mga anyong tubig>Napapadali ang pagtatanggal ng basura mula sa tahanan+Napapatay ng mga nahiwalay na kemikal ang mga mikrobyo sa mga anyong tubig<Napapalinaw ng mga nahiwalay na kemikal ang mga anyong tubig",
"Bakit mahalaga ang pagtataguyod ng mga sistemang nagpapanatili ng kalinisan ng tubig sa kasalukuyan?=Para matiyak na may malinis na tubig ang susunod na henerasyon>Para hindi na kailangang turuang magtipid sa tubig ang mga susunod na henerasyon+Para mapababa ang temperatura ng planeta<Para mapigilan ang pagbabago ng klima",
"Alin sa mga sumusunod ang pinakamagandang paraan upang makaiwas sa kontaminasyon ng tubig?=Paggamit ng mga produktong biodegradable>Pagtatapon ng basura sa mga anyong tubig+Paggamit ng maraming kemikal sa tahanan<Pagtatanggal ng mga halaman sa kapaligiran",
"Bakit mahalaga sa pagpapanatili ng kalinisan ng tubig ang hindi paggamit ng labis na pataba at pestisidyo sa paghahalaman?=Para mabawasan ang kontaminasyon ng mga anyong tubig>Para mas lumusog ang mga halaman+Para mas mabilis makarating ang mga ito sa mga anyong tubig<Para makatipid ng pera",

);

?>

</head>

</bod

</html>