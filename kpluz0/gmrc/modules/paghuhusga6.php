<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Maingat sa Paghuhusga - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Maingat sa Paghuhusga";
$_SESSION['tnum']="*62";

$questions=array(

"Ano ang kahulugan ng maingat na paghuhusga?=Pag-iisip nang malalim bago magdesisyon>Pagiging mabilis sa pagpapasya+Pagsunod sa gusto ng makararami<Pag-iwas sa paggawa ng anumang desisyon",
"Bakit mahalaga ang maingat na paghuhusga?=Dahil ang bawat desisyon ay may kahihinatnan>Para makagawa agad-agad ng isang aksyon+Dahil palaging tama ang unang pumapasok sa iyong isip<Para hindi na kailangang makinig sa sasabihin ng iba",
"Ano ang unang hakbang sa mapanagutang pagpapasya?=Kilalanin ang problema>Mag-isip ng mga opsiyon+Timbangin ang bawat opsiyon<Isagawa ang desisyon",
"Alin sa mga sumusunod ang dapat mong gawin sa pagpili ng opsiyon?=Timbangin ang mga epekto ng bawat opsiyon>Piliin ang opsiyong pinakamadaling gawin+Piliin ang opsiyong pinakamura<Piliin agad ang opsiyong una mong maiisip",
"Alin sa mga sumusunod ang katangian ng isang mabuting desisyon?=Nakabubuti sa nakararami>Nakabubuti lamang sa sarili+Pinakamadaling gawin<Gusto ng mas nakararami",
"Kapag napili mo na ang iyong desisyon, ano ang dapat mong gawin?=Isagawa ito nang may paninindigan>Baguhin ito kapag may tumutol+Isagawa ito nang may pagdududa at pag-aalala<Isagawa ito nang palihim",
"Bakit mahalagang suriin ang epekto ng isang maling desisyon at magnilay tungkol dito?=Upang matuto sa pagdedesisyon>Upang maparusahan ang sarili+Upang pagsisihan ito habambuhay<Upang maisisi ito sa ibang tao",
"Kapag may makita kang pitaka sa daan, ano ang dapat mong gawin?=Dalhin ito sa guro o punong-guro>Iuwi ito sa bahay+Itapon ito sa basurahan<Ipakita rin ito sa mga kalaro",
"Alin sa mga sumusunod ang isa sa mga gantimpala ng maingat na paghuhusga?=Tiwala sa sarili>Kawalan ng pag-asa+Pagsisisi sa huli<Pagtanggap ng maraming pintas",
"Paano nagdudulot ng kapayapaan ng loob ang maingat na paghuhusga?=Alam mong hindi ka magsisisi dahil ginawa mo ang iyong makakaya sa pagdedesisyon>Palagi mong iniisip na ikaw ang masisisi sa huli+Lagi kang nag-aalala sa kahihinatnan ng iyong pasya<Nawawalan ka ng tiwala sa sariling kakayahan",
"Alin sa mga sumusunod ang hindi hakbang sa mapanagutang pagpapasya?=Pagsunod sa gusto ng mas nakararami>Pagkilala sa problema+Paglilista ng mga opsiyon<Pagtitimbang ng bawat opsiyon",
"Alin sa mga sumusunod ang ipinapakita ng isang taong maingat sa pagdedesisyon?Pagiging mapanagutan>Pagiging padalus-dalos+Pagbabalewala sa kapakanan ng iba<Mababang tiwala sa sarili",
"Ano ang dapat mong gawin kung may kumukumbinsi sa iyong lumaktaw sa klase?=Tumanggi at pumasok sa klase>Sumama dahil mas masaya iyon+Lumaktaw pero humabol bago matapos ang klase<Magsumbong agad sa guro",
"Ano ang ibig sabihin ng 'consensus' sa pangkatang pagpapasya?=Solusyong katanggap-tanggap sa lahat>Solusyong ikaw lamang ang pumili+Solusyong napili sa pamamagitan ng bunutan<Solusyong hindi katanggap-tanggap kaninuman",
"Bakit mahalagang makinig ka muna sa pananaw ng iba bago ka magdesisyon?=Upang maunawaan at maisaalang-alang mo ang kanilang pananaw>Upang maipakita mong mas mataas ka sa kanila+Upang mas madali mong makontra ang kanilang saloobin<Upang makapagkunwari kang patas ka sa lahat",
"Ano ang kaugnayan ng pagiging maingat sa paghuhusga sa disiplina sa sarili?=Kailangan ng disiplina sa sarili upang hindi magmadali sa pagpapasya>Hindi kailangan ng taong maingat sa paghuhusga ang disiplina sa sarili+Hindi kailangang mag-isip ng taong may disiplina sa sarili<Ang disiplina sa sarili ay hadlang sa maingat na paghuhusga",
"Alin sa mga sumusunod ang dapat mong isaalang-alang kapag tinitimbang mo na ang bawa't opsiyon?=Ang mabubuti at masasamang kahihinatnan nito>Kung gaano ito kadaling gawin+Kung ito ba ang gusto ng mas nakararami<Kung mabilis itong tapusin",
"Alin sa mga sumusunod ang hindi mo dapat gawin kapag gumagawa ng isang desisyon ang inyong grupo?=Ipilit sa iba ang gusto mo>Tumulong maghanap ng solusyong katanggap-tanggap sa lahat+Isaalang-alang ang kapakanan ng bawat miyembro<Makinig sa pananaw ng bawat isa",
"Paano nalilikha ang matagumpay na buhay sa pamamagitan ng maingat na paghuhusga?=Sa pamamagitan ng maliliit ngunit mabubuting desisyon araw-araw>Sa pamamagitan ng paggawa ng isang malaking desisyon lamang+Sa pamamagitan ng mga suwerteng desisyon lamang na hindi pinag-isipan<Sa pamamagitan ng mga pandarayang hindi kapansin-pansin",
"Alin sa mga sumusunod ang dapat mong isipin kung nahaharap ka sa isang mahirap na desisyon?=Na maaari nitong mapabuti ang iyong pagkatao>Na ang mahalaga ay makagawa ka ng desisyon kahit hindi ito pinag-isipan+Na dapat kang sumuko na lamang at lumisan muna<Na dapat mong ipasa sa iba ang pagpapasya",
"Alin sa mga sumusunod ang dapat mong gawing batayan sa paggawa ng isang desisyon?=Ang mabubuti at masasamang epekto nito>Ang kagustuhan ng mas nakararami+Ang iyong pakiramdam lamang<Kung nakararanas ka ng suwerte sa mga nagdaang araw",
"Alin sa mga sumusunod ang nagpapakita ng empatiya sa pagpapasya?=Pakikinig sa pananaw ng kapwa bago magdesisyon>Pagsunod agad sa gusto ng nakararami+Pagpapasya nang mag-isa nang hindi nakikinig sa iba<Pagkukunwaring nakiking sa sinasabi ng kapwa",
"Ano ang ipinapakita ng isang taong nagsasaalang-alang ng epekto ng kanyang desisyon sa ibang tao?=Pagiging mapanagutan>Pagiging makasarili+Pagpapanggap na mabait<Pagdududa sa sarili",
"Alin sa mga sumusunod ang huling hakbang sa mapanagutang pagpapasya?=Suriin ang iyong desisyon>Kilalanin ang problema+Maglista ng mga opsiyon<Timbangin ang bawat opsiyon",
"Bakit kailangan mong mag-isip ng iba't ibang opsiyon bago ka magdesisyon?=Upang mahanap ang may pinakamabuting pangkalahatang epekto>Upang maipakita mong magaling kang pinuno+Upang maipagpaliban muna ang paggawa ng desisyon<Upang makasunod lamang sa ganitong patakaran",

);

?>

</head>

</body

</html>