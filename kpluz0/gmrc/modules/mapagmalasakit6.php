<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagmalasakit sa Pamilya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagmalasakit sa Pamilya";
$_SESSION['tnum']="*64";

$questions=array(

"Alin sa mga sumusunod ang tunay na sukatan ng pagiging mapagmalasakit sa pamilya?=Araw-araw na paggawa ng maliliit na kabutihan sa pamilya>Pagbibigay ng mga mamahaling regalo+Pagsama sa pamilya tuwing may okasyon lamang<Pagbibigay ng mga malalaking halaga ng pera",
"Ano ang kahulugan ng pagiging mapagmalasakit sa pamilya?=Pagmamahal at pagpapakita ng pagkalinga sa mga kapamilya>Pagbibigay ng maraming pera sa mga kapamilya+Pagsisimba tuwing Linggo kasama ang pamilya<Pag-uuna ng sarili kaysa sa pamilya",
"Alin sa mga sumusunod ang hindi kabilang sa mga unang natututuhan ng isang bata sa kanyang pamilya na dahilan kung bakit tinatawag ding 'unang paaralan ng pagmamahal' ang pamilya?=Pagsusulat>Pagbibigay+Pagpapatawad<Pagmamalasakit",
"Alin sa mga sumusunod ang pinakatunay na pagsasakilos ng pagmamalasakit sa pamilya?=Pag-aasikaso sa mga magulang araw-araw>Pagbibigay ng mamahaling regalo tuwing Pasko+Pag-aabot ng pera kung may okasyon<Pag-iimpok para sa sariling kinabukasan",
"Ano ang ipinapakita ng iyong kusang pagtulong sa mga gawaing bahay?=Na ang kapakanan ng pamilya ay mahalaga sa iyo>Na gusto mong mapuri ka ng iyong mga magulang+Na may hihingin kang bagay sa iyong mga magulang<Na ayaw mong isipin ng ibang tao na tamad ka",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan upang makatulong ka sa kapatid na may sakit kung abala ang inyong mga magulang?=Pagalitan siya sa kanyang pagkakasakit>Umupo sa tabi niya para aliwin siya+Mag-abot ng mga kailangan niya<Magpainom sa kanya ng gamot",
"Alin sa mga sumusunod ang pinakamagandang ialay sa mga matatanda sa inyong pamilya?=Ang iyong oras at atensyon sa pakikinig sa kanila>Mamahaling alahas at damit+Bagong cellphone<Perang pambili ng gusto nila",
"Ano ang ipinapakita ng taos-pusong paghingi ng tawad sa isang kapatid?=Pagpapahalaga sa kanyang damdamin>Kahinaan ng iyong pagkatao dahil nagkamali ka+Pagmamalaki sa kanya<Takot maparusahan",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraan ng pagmamalasakit sa iyong lolo o lola?=Pag-iwas sa kanyang mga utos>Pag-alalay sa kanyang paglalakad+Pagbubuhat ng kanyang mga dala-dala<Pakikinig sa kanyang mga kuwento",
"Alin sa mga sumusunod ang bunga ng pagiging mapagmalasakit sa pamilya?=Mas malalim na samahan>Mas madalas na pagtatalo+Mas malaking gastusin sa bahay<Kawalan ng tiwala sa bawat isa",
"Alin sa mga sumusunod ang naglalarawan ng tahanang puno ng malasakit?=Masaya kahit may problema>Maingay dahil sa araw-araw na sigawan+Tahimik dahil hindi nag-iimikan<Malungkot",
"Ano ang ginagawa ng isang pamilyang may malasakit sa isa't isa upang harapin ang kanilang mga problema?=Nagtutulungan sila upang malutas ang mga ito>Nagtatalo sila kung sino ang dapat lumutas ng mga ito+Nagsisisihan sila hanggang may kumilos<Kanya-kanya silang tumatakas sa problema",
"Ano ang kaugnayan ng pagmamalasakit sa pamilya at pananampalataya sa Diyos?=Ang pagmamahal mo sa pamilya ay pagmamahal ng Diyos na dumadaloy sa iyo>Walang kaugnayan ang pagmamalasakit sa pamilya at pananampalataya+Mas mahalaga ang pagdarasal kaysa sa pagmamalasakit sa pamilya<Hindi kailangang magmalasakit sa pamilya kung may pananampalataya ka",
"Alin sa mga sumusunod ang hindi halimbawa ng pagmamalasakit sa magulang?=Pagrereklamo kapag inuutusan ka nila>Pag-aabot ng kanilang tsinelas+Paghahanda ng kanilang almusal<Pagtulong sa mga gawaing bahay",
"Alin sa mga sumusunod ang nagpapakita ng pagkukusa sa pagtulong?=Paghuhugas ng pinggan kahit hindi inuutusan>Paghihintay ng utos bago kumilos+Pag-alis kapag may mga gagawin sa bahay<Pagrereklamo kapag inuutusan",
"Ano ang dapat mong gawin kung makita mong puno ang inyong lababo ng mga hugasin?=Kusang hugasan ang mga ito kahit hindi inuutusan>Maghintay ng ibang maghuhugas ng mga ito+Utusan ang nakababatang kapatid na hugasan ang mga ito<Hintaying utusan ka ng magulang bago hugasan ang mga ito",
"Ano ang ipinapakita ng simpleng pagpapasalamat sa pagkain na niluto ng iyong ina?=Pagpapahalaga sa kanyang pinaghirapan>Pagpapakabait para makapagpabili ng isang bagay+Pagbabalewala sa pagsasakripisyo ng pamilya<Pagiging makasarili",
"Bakit mahalaga ang pakikinig sa mga payo ng iyong mga magulang kahit paulit-ulit ang mga ito?=Upang maipakita mo ang iyong pagmamahal at paggalang sa kanila>Upang hindi ka mapagalitan+Upang mapuri ka nila at mabigyan ng pabuya<Upang hangaan ka ng ibang tao",
"Ano ang dapat mong gawin kapag ang iyong lola ay nagkukuwento?=Umupo sa tabi niya at pakinggan siya nang mabuti>Magkunwaring nakikinig habang nakikipag-chat sa iba+Sabihing narinig mo na ang kanyang kuwento at umalis<Takpan ang iyong mga tenga dahil sawa ka nang makinig sa kanya",
"Alin sa mga sumusunod ang hindi bunga ng pagiging mapagmalasakit mo sa iyong pamilya?=Mas madalas na pagtatalo>Mas malalim na samahan at pagtitiwala+Kapayapaan sa tahanan<Pagiging magandang halimbawa mo sa nakababatang kapatid",
"Ano ang dapat mong gawin kung nagkamali ka sa isa mong kapamilya?=Humingi ng tawad nang taos-puso>Magkunwaring walang nangyari+Isisi ang pagkakamali sa iba<Umiwas muna sa kanya",
"Ang paghahanda ng meryenda para sa iyong nanay ay halimbawa ng alin sa mga sumusunod na paraan ng pagmamalasakit sa kapamilya?=Pag-aasikaso sa mga magulang>Pag-aalaga sa kapatid+Kusang pagtulong sa mga gawaing bahay<Pag-alalay sa matatandang miyembro ng pamilya",
"Ang pag-upo sa tabi ng kapatid mong may sakit upang hindi siya malungkot ay halimbawa ng alin sa mga sumusunod na paraan ng pagmamalasakit sa kapamilya?=Pag-aalaga sa kapatid>Pag-aasikaso sa mga magulang+Pagpapahalaga sa sakripisyo ng mga magulang<Pag-alalay sa nakatatandang miyembro ng pamilya",
"Ang pagsasabi ng 'salamat' sa iyong tatay dahil sa sipag niya sa paghahanapbuhay ay halimbawa ng alin sa mga sumusunod na paraan ng pagmamalasakit sa kapamilya?=Pagpapahalaga sa sakripisyo ng mga magulang>Pag-aasikaso sa mga magulang+Pag-aalaga sa kapatid<Pag-alalay sa nakatatandang miyembro ng pamilya",
"Ang pagbibigay mo ng tungkod sa lola mong nahihirapang tumayo ay halimbawa ng alin sa mga sumusunod na paraan ng pagmamalasakit sa kapamilya?=Pag-alalay sa nakatatandang miyembro ng pamilya>Pag-aasikaso sa mga magulang+Pag-aalaga sa kapatid<Pagpapahalaga sa sakripisyo ng mga magulang",
 
);

?>

</head>

</body

</html>