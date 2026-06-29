<html> 

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Pagiging Mapagpasensiya - GMRC in KPluz.com    </title>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pagiging Mapagpasensiya";
$_SESSION['tnum']="*8f";

$questions=array(

"Ano ang ibig sabihin ng pagiging mapagpasensiya?=Pagiging matiisin at mahinahon sa gitna ng mahirap na sitwasyon>Pagbabalewala sa mga suliranin+Pag-iwas sa kapwa kapag may hinaharap na pagsubok<Pagmamalaki sa kapwa kahit may problema",
"Alin sa mga sumusunod ang bahagi ng pagiging mapagpasensiya?=Pagkontrol sa sariling emosyon>Pagpayag maapi ng iba+Pag-iwas sa kapwa<Pagsasantabi ng sariling kapakanan",
"Ang pagiging mapagpasensiya sa isang samahan ay karaniwang nagbubunga ng alin sa mga sumusunod?=Kapayapaan>Pagpapagalingan+Paghihilahan pababa<Pag-iiwasan",
"Ano ang ginagawa ng isang taong mapagpasensiya kapag siya ay may kaalitan?=Nanatiling mahinahon at magalang>Sumasagot nang hindi nag-iisp+Nagdadabog at umaalis<Nagsasalita nang pasigaw",
"Ano ang epekto sa iyong sarili kung mahusay ka sa pamamahala ng sarili mong damdamin?=Mas mabuting emosyonal at mental na kalusugan>Matinding pagkabalisa+Kawalan ng pag-asa sa buhay<Pag-aalinlangang makihalubilo sa iba",
"Alin sa mga sumusunod ang nagpapakita ng pag-unawa sa damdamin ng kausap?=Pakikinig nang maigi sa sinasabi niya>Pagsalungat sa lahat ng kanyang sinasabi+Pagtataas ng boses sa kanya<Pagpapalakbay ng isip habang nagsasalita siya",
"Alin sa mga sumusunod ang wastong paraan ng pag-aayos ng isang di-pagkakaunawaan?=Mahinahong pakikipag-usap>Paggamit ng maanghang na pananalita+Pagpapasaring sa social media<Panunumbat tungkol sa nakaraan",
"Alin sa mga sumusunod ang dapat mong gawin kung mayroon kang di-pagkakaunawaan sa isang tao?=Makipag-usap nang maayos sa kanya>Iwasang makita siya+Siraan siya sa iba<Maghanap ng kakampi laban sa kanya",
"Alin sa mga sumusunod ang hindi mo dapat gawin bago ka magsalita kung ikaw ay nasa isang sitwasyong nakakainit ng ulo?=Ibulalas ang nararamdaman>Pag-isipang mabuti ang sasabihin+Pakalmahin ang sarili<Unawain ang sitwasyon",
"Alin sa mga sumusunod ang isang elemento ng maayos na pakikipag-usap?=Paggamit ng magalang na pananalita>Hindi pakikinig sa sinasabi ng kausap+Pagpaparamdam ng inis habang nagsasalita<Pagsisinungaling",
"Ano ang dapat mong gawin kung ikaw ay nakasakit ng damdamin ng iyong kapwa?=Humingi ng taos-pusong paumanhin>Ipagtanggol ang nagawang pananakit+Manisi ng ibang tao sa nagawa<Kumilos na parang walang nangyari",
"Bakit mahalaga ang pagtanggap mo ng paumanhin mula sa isang taong nagkasala sa iyo?=Upang mapanatili mo ang pagkakaunawaan>Para mapuri ka ng ibang tao+Para hindi siya maghinalang maghihiganti ka<Upang hindi siya matutuo sa kanyang pagkakamali",
"Ano ang karaniwang epekto ng pagpapahupa ng iyong emosyon bago ka humarap sa iyong kaalitan?=Mas produktibong pag-uusap>Mas masalimuot na pag-uusap+Pagtatanim ng galit ng bawat isa<Pagkadamay sa alitan ng iba pang mga tao",
"Ano ang karaniwang epekto ng panunumbat ng mga mabuti mong nagawa dati sa iyong kaalitan?=Lalong paglala ng alitan>Paghanga sa iyo ng mga tao sa paligid+Mabilis na pagkalutas ng problemang pinagmulan ng alitan<Pagsisisi at paghingi ng paumanhin ng kaalitan",
"Alin sa mga sumusunod ang nagpapakita ng respeto sa kausap?=Paksisikap unawain ang kanyang saloobin>Pagsabat habang siya ay nagsasalita+Pagtingin kung saan-saan habang kinakausap siya<Pagsagot sa kanya nang pabalang",
"Alin sa mga sumusunod ang hindi kabilang sa mga paraang makakatulong sa isang kaibigang may matinding negatibong emosyon?=Pagbibiro tungkol sa kanyang pinagdadaanan>Pakikinig nang maigi sa kanya+Pagpapakita sa kanya ng empatiya<Pagbibigay sa kanya ng suporta",
"Alin sa mga sumusunod na paraan ng pamamahala ng di-pagkakaunawaan ang tumutukoy sa pagbibigay ng atensyon sa sinasabi ng kausap bago pa man magsalita?=Pakikinig nang mabuti>Maayos na pakikipag-usap+Pagpapahupa ng emosyon<Paghingi at pagtanggap ng paumanhin",
"Alin sa mga sumusunod na paraan ng pamamahala ng di-pagkakaunawaan ang tumutukoy sa paggamit ng magalang na pananalita at pag-iwas sa panunumbat o paninisi?=Maayos na pakikipag-usap>Pakikinig nang mabuti+Pagpapahupa ng emosyon<Paghingi at pagtanggap ng paumanhin",
"Alin sa mga sumusunod na paraan ng pamamahala ng di-pagkakaunawaan ang tumutukoy sa paglayo muna hanggang maging kalmado o mahinahon?=Pagpapahupa ng emosyon>Pakikinig nang mabuti+Maayos na pakikipag-usap<Paghingi at pagtanggap ng paumanhin",
"Alin sa mga sumusunod na paraan ng pamamahala ng di-pagkakaunawaan ang tumutukoy sa paghiling o pagbibigay ng kapatawaran sa isang kasalanan?=Paghingi at pagtanggap ng paumanhin>Pakikinig nang mabuti+Maayos na pakikipag-usap<Pagpapahupa ng emosyon",
"Alin sa mga sumusunod na paraan ng pamamahala ng di-pagkakaunawaan ang tumutukoy sa hindi pagkukuwento sa iba ng ating di-pagkakaunawaan sa isang tao?=Pag-iwas sa pagkakalat ng alitan sa iba>Paghingi ng tulong sa nakatatanda+Maayos na pakikipag-usap<Pagpapahupa ng emosyon",
"Alin sa mga sumusunod na paraan ng pamamahala ng di-pagkakaunawaan ang tumutukoy sa paglapit sa ating guro, magulang, o tagapayo para mabigyan ng gabay sa pag-aayos ng isang di-pagkakaunawaan?=Paghingi ng tulong sa nakatatanda>Pag-iwas sa pagkakalat ng alitan sa iba+Paghingi at pagtanggap ng paumanhin<Pakikinig nang mabuti",
"Alin sa mga sumusunod ang hindi magandang gawin kapag nagagalit?=Magbato o manira ng gamit>Huminga nang malalim+Maghinga ng sama ng loob sa isang pinagkakatiwalaang tao<Magsulat ng nararamdaman sa papel",
"Ano ang kahulugan ng pamamahala sa sariling emosyon?=Pagkilala sa nararamdaman at pagkontrol sa epekto nito>Pagpipilit maging masaya sa lahat ng oras+Pagbabalewala sa mga problema<Pagkakaila sa mga negatibong damdamin",
"Bakit dapat nating matutunan ang pagkilala at pag-unawa sa ating sariling emosyon?=Para malaman din natin ang tamang pagtugon dito>Para maisisi sa iba ang nararamdaman+Para maitanggi o maipagkaila ang sariling damdamin<Para magamit ito sa pagmamanipula ng kapwa",

);

?>

</head>

</body>

</html>