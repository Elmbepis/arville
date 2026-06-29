<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pananalig sa Diyos - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pananalig sa Diyos";
$_SESSION['tnum']="*43";

$questions=array(

"Ano ang ibig sabihin ng pananalig sa Diyos?=Matibay na pananampalataya at pagtitiwala sa Diyos>Madalas na pananalangin sa Diyos+Paghingi ng tawad sa Diyos<Paglilingkod sa Diyos",
"Ayon sa Kristiyanismo, alin sa mga sumusunod ang dapat mong ibigin?=Diyos at kapwa>Diyos lamang+Sarili at kapwa<Sarili lamang",
"Ayon sa Kristiyanismo, alin sa mga sumusunod ang dapat gawin upang mapatawad din tayo ng Diyos?=Magpatawad>Magdasal+Magpakumbaba<Maglingkod",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang nagsasabing hindi dapat tayo maging mayabang sa ating kapwa?=Kababaang-loob>Paglilingkod+Pagtitiis<Pagsisisi",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang nagsasabing dapat maging alipin ng lahat ang sinumang nais mauna sa kanyang kapwa?=Paglilingkod>Kababaang-loob+Pagtitiis<Pagsisisi",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang nagsasabing patatawarin ng Diyos ang sinumang magpapahayag ang kanyang mga kasalanan?=Pagsisisi>Kababaang-loob+Pagtitiis<Paglilingkod",
"Ayon sa Kristiyanismo, alin sa mga sumusunod ang HINDI dapat gawin ng isang tao kung nais niyang makita ang Panginoon?=Mamuhay nang walang pagkilala sa katarungan>Maging banal+Mamuhay nang matuwid<Mamuhay nang may kapayapaan sa lahat",
"Ayon sa Kristiyanismo, ang mga nagtitiwala sa Panginoon ay muling magkakaroon ng ____, at papaitaas na parang mga agila.=lakas>talino+pakpak<sipag",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang nagsasabing hindi dapat tayo mabalisa tungkol sa anumang bagay, at sa halip ay manalangin sa Diyos?=Pananalig>Pagsisisi+Kababaang-loob<Paglilingkod",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang nagsasabing gawin natin sa ating kapwa ang nais nating gawin nila sa atin?=Gintong aral>Sakripisyo ni Jesus+Pagpapatawad<Paglilingkod",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang tumitiyak na magkakaroon ng buhay na walang hanggan ang sinumang may pananampalataya?=Sakripisyo ni Jesus>Gintong aral+Pagtitiis<Pagsisisi",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang isinasakilos ng isang taong nag-aalaga sa mga may sakit, tumutulong sa mga biktima ng kalamidad, at nagkakaloob ng pagkain at damit sa mga mahihirap?=Pag-ibig sa Diyos at Kapwa>Pagpapatawad+Pagtitiis<Pag-asa at pananalig",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang isinasakilos ng isang taong may bukas na puso para sa muling pakikipagbati sa mga kaaway o taong nakaalitan?=Pagpapatawad>Pag-ibig sa Diyos at Kapwa+Pagtitiis<Pag-asa at pananalig",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang isinasakilos ng isang taong kumikilala sa kakayahan at tagumpay ng iba nang walang inggit?=Kababaang-loob>Pagpapatawad+Pagtitiis<Pag-asa at pananalig",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang isinasakilos ng isang manggagamot na nagbibigay ng libreng konsultasyon sa mga may sakit?=Paglilingkod>Kababaang-loob+Pagtitiis<Pagsisisi at pagbabagong-buhay",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang isinasakilos ng isang taong nagbabahagi ng mga personal na karanasan ng pananampalataya upang mapalakas ang loob ng iba?=Pag-asa at pananalig>Kababaang-loob+Pagtitiis<Pagsisisi at pagbabagong-buhay",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang isinasakilos ng isang taong umiiwas sa pandaraya, kasinungalingan, at iba pang mga gawaing ayaw niyang gawin sa kanya ng iba?=Gintong aral>Sakripisyo ni Jesus+Pagtitiis<Pagsisisi at pagbabagong-buhay",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang isinasakilos ng isang taong pagbibigay ng oras at lakas para sa kapakanan ng pamilya kahit na nangangahulugan ito ng pagkawala ng mga sariling kagustuhan?=Pagsasakripisyo>Gintong aral+Pagtitiis<Pagsisisi at pagbabagong-buhay",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang isinasakilos ng isang taong nakapagpapanatili ng kanyang matibay na pananampalataya sa Diyos sa kabila ng mga mabibigat na pagsubok at kahirapan sa buhay?=Pagtitiis at pagtitiwala sa Diyos>Gintong aral+Kababaang-loob<Pagsisisi at pagbabagong-buhay",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang isinasakilos ng isang taong umaamin sa kanyang mga nagawang kasalanan, at nagsusumikap na ituwid ang kanyang mga pagkakamali para sa ikabubuti ng lahat?=Pagsisisi at pagbabagong-buhay>Gintong aral+Kababaang-loob<Pagtitiis at pagtitiwala sa Diyos",
"Alin sa mga sumusunod na aral ng Kristiyanismo ang isinasakilos ng isang taong nagpapakita ng integridad, katapatan, at katarungan sa lahat ng aspeto ng buhay, maging sa trabaho, tahanan, at komunidad?=Pamumuhay nang matuwid>Pag-asa at pananalig+Paglilingkod<Pagtitiis at pagtitiwala sa Diyos",
"Ayon sa Filipos 4:6-7, alin sa mga sumusunod ang nagbibigay ng kapayapaan ng Diyos na hindi kayang unawain ng tao?=Pananalangin>Pananalig+Paglilingkod<Pagtitiis",
"Alin sa mga sumusunod ang pinakamahalagang mensahe ng Juan 3:16?=Pag-ibig at sakripisyo ni Jesus>Pagtitiis at Pagtitiwala sa Diyos+Pagsisisi at Pagbabagong-buhay<Pamumuhay nang natuwid",
"Alin sa mga sumusunod ang nagpapatunay sa ating pananampalataya sa panahon ng kagipitan o kahirapan?=Pag-asa at positibong pananaw>Pag-aalala sa hinaharap+Paglilingkod sa kapwa<Pagsisisi",
"Ayon sa aral ng pag-asa at pananalig, alin sa mga sumusunod ang dapat nating gawin upang magkaroon ng kapayapaan ng Diyos sa ating buhay?=Magdasal nang may pasasalamat>Magpakumbaba+Maglingkod sa kapwa<Pagsisihan ang mga kasalanan",

);

?>

</head>

</bod

</html>