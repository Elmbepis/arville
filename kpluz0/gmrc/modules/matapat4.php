<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Matapat - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Matapat";
$_SESSION['tnum']="*41";

$questions=array(

"Alin sa mga sumusunod ang kahulugan ng katapatan?=Pagiging totoo>Pagiging malikhain+Pagiging masaya<Pagiging matulungin",
"Alin sa mga sumusunod ang pangunahing pundasyon ng tiwala at paggalang sa bawat isa?=Katapatan>Kasipagan+Katalinuhan<Kasikatan",
"Bakit mahalaga ang paglalahad ng tunay na saloobin sa pamilya?=Upang makilala at maipakilala ang sarili>Upang mamanipula ang mga kapamilya+Upang mapabilib ang ibang tao<Upang mapaunlad ang kabuhayan ng pamilya",
"Alin sa mga sumusunod ang inaasahang resulta ng pagiging matapat sa pamilya?=Pagkakaroon ng tiwala at pagmamahal sa loob ng pamilya>Pagkakaroon ng matagumpay na kabuhayan+Pagkakaroon ng mataas na grado<Pagkakaroon ng tunggalian sa loob ng pamilya",
"Alin sa mga sumusunod ang dapat gawin kapag nakakita ng bagay na hindi iyo?=Ibalik ito sa may-ari>Angkinin ito at itago+Ibigay ito sa ibang tao<Itapon ito sa basurahan",
"Alin sa mga sumusunod ang ipinapakita ng pagbabalik ng mga bagay na hindi atin?=Katapatan at paggalang>Katapatan at kawalan ng respeto+Paggalang at kasakiman<Paggalang at pagbabalatkayo",
"Bakit mahalaga ang pagiging totoo sa salita?=Upang pagkatiwalaan sa lahat ng pagkakataon>Upang magmukhang matalino+Upang maiwasan ang pagkakaunawaan<Upang umangat sa ibang tao",
"Alin sa mga sumusunod ang hindi saklaw ng pagiging totoo sa salita?=Panlilinlang sa kausap>Hindi pagsisinungaling+Pag-iwas sa pagbabalatkayo<Pagtupad sa mga pangako",
"Alin sa mga sumusunod ang kahulugan ng pagiging totoo sa gawa?=Pagtupad sa mga pangako at responsibilidad>Pag-iwas sa mga pananagutan+Pagtatago mula sa pinagkakautangan<Pagwawalang-bahala sa trabaho",
"Alin sa mga sumusunod ang HINDI isa sa mga maaaring maging bunga ng pagiging totoo sa gawa?=Pagdududa ng mga kausap>Tiwala mula sa ibang tao+Mataas na dignidad<Respeto sa sarili",
"Bakit mahalaga ang katapatan sa lipunan?=Upang mapalakas ang ugnayan at pagmamalasakit ng mga tao>Upang mapalakas ang kita ng mga negosyo+Upang makapamuhay nang marangya ang mga tao<Upang madagdagan ang kaalaman ng mga tao",
"Alin sa mga sumusunod ang pangunahing aspeto ng pagiging matapat sa pamilya?=Paglalahad ng tunay na saloobin>Pagiging tahimik at malihim+Pagbibigay ng pera sa mga kapamilya<Pagbabalatkayo upang maitago ang tumay na layunin",
"Alin sa mga sumusunod ang HINDI isa sa mga maaaring paraan ng pagpapakita ng katapatan sa pamilya?=Paglilihim ng isang suliranin>Pag-amin sa iyong nagawang kasalanan+Pagtupad sa mga pangako<Paglalahad ng tunay na nararamdaman",
"Alin sa mga sumusunod ang HINDI isa sa mga maaaring paraan ng pagpapakita ng katapatan sa pang-araw-araw na buhay?=Pagpapanggap upang mapabilib ang ibang tao>Pagbibigay ng wastong impormasyon+Pagtupad sa mga obligasyon<Pagsasabi ng katotohanan",
"Alin sa mga sumusunod ang HINDI tuwirang maiuugnay sa salitang 'integridad'?=Kasakiman>Respeto+Kredibilidad<Katotohanan",
"Bakit mahalaga ang pagkakaroon ng integridad sa ating mga kilos?=Upang magtamo ng kredibilidad at respeto>Upang magmukhang matagumpay+Upang makapagmanipula ng ibang tao<Upang malamangan ang kapwa",
"Alin sa mga sumusunod ang maaaring epekto ng pagiging matapat sa sarili?=Dignidad at kapayapaan ng isip>Kawalan ng direksyon sa buhay+Pagiging mapag-isa o malungkutin<Pagdududa sa kapwa",
"Alin sa mga sumusunod ang HINDI isa sa mga layunin ng pagiging tapat sa pamilya?=Pagyaman sa mga materyal na bagay>Pagmamahalan at matibay na pagkakabuklod+Pagkakaisa at masayang pagsasamahan<Pagmamalasakit sa bawat isa",
"Alin sa mga sumusunod ang epekto ng hindi mo pagiging tapat sa mga tao sa iyong paligid?=Pagkawala ng tiwala at respeto sa iyo>Pagkakaroon ng mga tapat na kaibigan+Pag-asenso sa buhay<Pagtatamo ng mga tagumpay",
"Alin sa mga sumusunod ang ibig sabihin ng salitang 'integridad'?=Pagkamapagkakatiwalaan>Pagkamapagkumbaba+Pagkamahinahon<Pagkamapanlinlang",
"Alin sa mga sumusunod ang HINDI ginagawa ng isang taong may integridad?=Pagpaparatang nang walang batayan>Pagtupad sa mga pangako+Pagbibigay ng wastong impormasyon<Pagharap sa mga responsibilidad",
"Alin sa mga sumusunod ang HINDI dapat gawin upang maipakita ang katapatan sa paaralan?=Pagsisinungaling sa mga guro>Pagtupad sa mga gawain+Hindi pandaraya sa mga pagsusulit<Pagsasabi ng totoo sa mga kamag-aral",
"Bakit mahalaga ang pagiging tapat sa pang-araw-araw na buhay?=Upang palagi tayong pagkatiwalaan ng ibang tao>Upang makapagmanipula ng kapwa+Upang magkaroon ng maraming kaibigan<Upang mawalan ng mga problema",
"Alin sa mga sumusunod ang HINDI ginagawa ng isang tapat sa kaibigan?=Pagpapanggap upang makuha ang ninanais>Paglalahad ng tunay na damdamin+Pagsasabi ng totoong intensyon<Pagtulong tuwing kailangan",
"Alin sa mga sumusunod ang dapat mong gawin kapag nakagawa ka ng isang malaking kasalanan?=Umamin sa kasalanan at humingi ng tawad>Ilihim ang kasalanan+Isisi ang kasalanan sa ibang tao<Maglibang upang makalimutan ang kasalanan",

);

?>

</head>

</bod

</html>