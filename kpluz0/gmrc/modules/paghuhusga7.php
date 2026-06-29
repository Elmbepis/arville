<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Maingat na Paghuhusga - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Maingat na Paghuhusga";
$_SESSION['tnum']="*70";

$questions=array(

"Alin sa mga sumusunod ang pangunahing layunin ng maingat na paghuhusga?=Makagawa ng tama at mabuting desisyon>Matugunan ang pansariling interes+Magparaya sa kagustuhan ng iba<Umiwas sa pagpapasya",
"Alin sa mga sumusunod ang ginagamit sa pag-aanalisa ng mga impormasyon upang maisagawa ang maingat na paghuhusga?=Mapanuring pag-iisip>Kilos-loob+Pananampalataya<Mga pagpapahalaga",
"Alin sa mga sumusunod ang ginagamit na instrumento upang lubos na maunawaan ang mga sitwasyon sa paligid?=Isip>Kilos-loob+Empatiya<Konsensiya",
"Alin sa mga sumusunod ang ginagamit upang makagawa ng desisyong tama at makatarungan?=Pag-iisip>Kilos-loob+Empatiya<Pagmamahal",
"Alin sa mga sumusunod ang nagsisilbing tagapagsulong ng pagsasakatuparan ng mga desisyon?=Kilos-loob>Pag-iisip+Empatiya<Konsensiya",
"Alin sa mga sumusunod ang gabay na karaniwang sinusunod para sa maingat na paghuhusga?=Pagsusuri bago aksyon>Aksyon bago pag-iisip+Empatiya bago katotohanan<Aksyon bago empatiya",
"Alin sa mga sumusunod ang mahalagang aspeto ng pagkilala ng mga maaaring epekto o kahihinatnan ng ating mga desisyon?=Responsibilidad>Pag-aalala+Empatiya<Kilos-loob",
"Alin sa mga sumusunod ang dapat maging pangunahing layunin ng kilos-loob sa paggawa ng desisyon?=Gumawa ng mabuti para sa lahat>Gumawa ng mabuti para sa sarili lamang+Mapasunod ang ibang tao sa ating gusto<Mapahanga sa atin ang ibang tao",
"Alin sa mga sumusunod ang dapat maging batayan ng pagkilos ayon sa maingat na paghuhusga?=Katotohanan at kabutihan>Pansariling interes+Pagmamahal sa sarili<Opinyon ng ibang tao",
"Alin sa mga sumusunod ang inaasahang resulta o epekto ng maingat na paghuhusga sa komunidad?=Kapayapaan at katarungan>Pagkakawatak-watak ng mga mamamayan+Pagkaantala ng mga programa<Masidhing pag-aalala",
"Alin sa mga sumusunod ang inaalam o tinitiyak sa paggamit ng isip sa pagsasagawa ng maingat na paghuhusga?=Mga impormasyon at katotohanan>Mga personal na opinyon+Mga kumakalat na balita<Mga damdamin at sentimyento",
"Alin sa mga sumusunod ang ginagamit sa pagsasakatuparan ng mga desisyon ayon sa tamang pag-unawa ng sitwasyon?=Kilos-loob>Mapanuring pag-iisip+Pananampalataya<Empatiya",
"Bakit mahalaga ang pagkilala sa ating mga limitasyon sa paggawa ng mga desisyon?=Upang makagawa ng mga paraan para malampasan ang mga ito>Upang makagawa ng mga paraan para maipagkaila ang mga ito+Upang maisisi sa iba ang kahihinatnan ng mga desisyon<Upang magkaroon ng dahilan para makaiwas sa pagdedesisyon",
"Alin sa mga sumusunod ang nagbibigay sa atin ng tapang upang harapin ang ating mga limitasyon?=Kilos-loob>Mapanuring pag-iisip+Konsensiya<Empatiya",
"Saan unang natututo ang mga Pilipino ng mga pangunahing prinsipyo sa buhay?=Sa pamilya>Sa simbahan+Sa paaralan<Sa pamahalaan",
"Ano ang papel ng pamilya sa paghubog ng mga pagpapahalaga?=Magturo ng tamang pag-uugali>Gumawa ng mga paraan upang umangat sa ibang pamilya+Magkaisa sa pagpapaunlad ng mga pinagkakakitaan<Umangat sa katayuan sa lipunan",
"Alin sa mga sumusunod ang hindi maituturing na isang pagpapahalaga?=Materyalismo>Integridad+Paggalang<Pagmamalasakit sa kapwa",
"Alin sa mga sumusunod ang nagtuturo sa atin ng mga tradisyonal na kaalaman at mga aral mula sa mga karanasan ng ating mga ninuno?=Kasaysayan>Pagninilay+Mga ugnayang pangkasalukuyan<Pagsangguni sa pamilya",
"Alin sa mga sumusunod ang tumutukoy sa isang panahon ng introspeksyon kung saan binibigyan natin ng oras ang ating sarili upang suriin ang kahulugan ng ating mga gawain at mga desisyon?=Pagninilay>Pag-aaral ng kasaysayan+Paghubog ng konsensiya<Pagsangguni sa pamilya",
"Ano ang papel ng pananampalataya sa paghubog ng konsensiya?=Pagtuturo ng mga moral na prinsipyo at etikal na panuntunan>Pagbibigay ng inspirasyong paunlarin ang sarili+Pagpapalakas ng takot makagawa ng maling desisyon<Pagpapalakas ng mapanuring pag-iisip",
"Alin sa mga sumusunod ang tumutukoy sa isang proseso kung saan ang mga magulang ay nagtuturo ng mga prinsipyo, gabay, at halimbawa upang magkaroon ang kanilang mga anak ng matibay na panuntunan sa moral na pamumuhay?=Paghubog ng konsensiya>Pagninilay+Pagkilala sa sariling limitasyon<Maingat na paghuhusga",
"Alin sa mga sumusunod ang tumutukoy sa isang proseso ng pagsusuri at pagpapasya kung saan isinasaalang-alang ang lahat ng bagay upang makagawa ng tamang desisyong naaayon sa katotohanan at kabutihan?=Maingat na paghuhusga>Pagninilay+Pagkilala sa sariling limitasyon<Paghubog ng konsensiya",
"Alin sa mga sumusunod na elemento ng maingat na paghuhusga ang tumutukoy sa pag-aanalisa ng mga impormasyon upang makita ang tunay na sitwasyon?=Pagkilatis sa katotohanan>Pagtimbang ng kabutihan+Pagkilala sa mga kahihinatnan<Pagkakaroon ng empatiya",
"Alin sa mga sumusunod na elemento ng maingat na paghuhusga ang tumutukoy sa pagsasaalang-alang kung ang desisyong gagawin ay magdudulot ng benepisyo sa ating sarili at sa ibang tao?=Pagtimbang ng kabutihan>Pagkilatis sa katotohanan+Pagkilala sa mga kahihinatnan<Pagkakaroon ng empatiya",
"Alin sa mga sumusunod na elemento ng maingat na paghuhusga ang tumutukoy sa pagiging handa sa mga posibleng epekto ng desisyong gagawin?=Pagkilala sa mga kahihinatnan>Pagkilatis sa katotohanan+Pagtimbang ng kabutihan<Pagkakaroon ng empatiya",
"Alin sa mga sumusunod na elemento ng maingat na paghuhusga ang tumutukoy sa pag-unawa at pagiging sensitibo sa damdamin at pananaw ng iba bago gumawa ng anumang desisyon?=Pagkakaroon ng empatiya>Pagkilatis sa katotohanan+Pagtimbang ng kabutihan<Pagkilala sa mga kahihinatnan",

);

?>

</head>

</bod

</html>