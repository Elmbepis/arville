<html>
<head>
<body>

<?php
// $_SESSION['title'] is needed to show module name in q-display
$_SESSION['title']="Pag-unawa sa Mensahe ng Pananda o Paalala";

$questions=array(

"Ano ang paalala o mensahe ng larawan?=Bawal mag-ingay.>Bawal kumain dito.+Bawal magkalat.<Bawal pumasok dito.**Filipino/modules/images/Filipino/modules/images/paalala/pic1.jpg",
"Ano ang paalala o mensahe ng larawan?=Magsuot ng face mask tuwina.>Iwasang lumabas ng bahay.+Bawal tumawid.<Bawal maglaro sa labas.**Filipino/modules/images/paalala/pic2.jpg",
"Ano ang paalala o mensahe ng larawan?=Bawal humawak dito.>Itapon ang kalat sa basurahan.+Bawal tumapak sa damo.<Bawal tumawid dito.**Filipino/modules/images/paalala/pic3.jpg",
"Ano ang paalala o mensahe ng larawan?=Bawal tumapak sa damo.>Bawal mag-ingay.+Bawal tumawid dito.<Dito ang labasan.**Filipino/modules/images/paalala/pic4.jpg",
"Ano ang paalala o mensahe ng larawan?=Dito ang tamang tawiran.>Madulas ang daan dito.+Bawal magkalat.<Bawal tumakbo.**Filipino/modules/images/paalala/pic5.jpg",
"Ano ang paalala o mensahe ng larawan?=May palikuran dito.>May simbahan dito.+Ito ay pamilihan.<Ito ay silid-aklatan.**Filipino/modules/images/paalala/pic6.jpg",
"Ano ang paalala o mensahe ng larawan?=Ito ay simbahan.>Ito ay silid-aralan.+Ito ay pagamutan.<Ito ay silid-tulugan.**Filipino/modules/images/paalala/pic7.jpg",
"Ano ang paalala o mensahe ng larawan?=Bawal kumuha ng mga larawan.>Madulas ang daan.+Bawal mag-ingay.<Bawal dumaan dito.**Filipino/modules/images/paalala/pic8.jpg",
"Ano ang paalala o mensahe ng larawan?=Bawal magkalat.>Bawal mag-ingay.+Bawal hawakan.<Bawal tumakbo.**Filipino/modules/images/paalala/pic9.jpg",
"Ano ang paalala o mensahe ng larawan?=Ito ay pagamutan.>Ito ay simbahan.+Ito ay kantina.<Ito ay paaralan.**Filipino/modules/images/paalala/pic10.jpg",
"Ano ang paalala o mensahe ng larawan?=Ito ay himpilan ng bus.>Ito ay silid-aklatan.+Ito ay pagamutan.<Ito ay simbahan.**Filipino/modules/images/paalala/pic11.jpg",
"Ano ang paalala o mensahe ng larawan?=Maraming nagniningas dito.>Maaaring maglaro rito.+Mag-ingat sa lason.<Mag-ingat sa aso.**Filipino/modules/images/paalala/pic12.jpg",
"Ano ang paalala o mensahe ng larawan?=Sundin ang ilaw-trapiko.>Mag-ingat sa aso.+Madulas ang daan.<Bawal pumasok.**Filipino/modules/images/paalala/pic13.jpg",
"Ano ang paalala o mensahe ng larawan?=Bawal maglakad dito.>Maaaring dumaan dito.+Maaaring pumasok dito.<Bawal kumain dito.**Filipino/modules/images/paalala/pic14.jpg",
"Ano ang paalala o mensahe ng larawan?=Madulas ang daan.>Bawal humawak dito.+Mag-ingat sa aso.<Bawal tapakan ang damo.**Filipino/modules/images/paalala/pic15.jpg",
"Saan magaganap ang pulong ng mga magulang?=sa paaralan>sa tahanan+sa pagamutan<sa simbahan**Filipino/modules/images/paalala/pic100.jpg",
"Sinu-sino ang inaanyayahan sa pulong na gaganapin?=mga magulang>mga mag-aaral+mga tindera<mga pulis**Filipino/modules/images/paalala/pic100.jpg",
"Anong oras gaganapin ang pulong ng mga magulang?=ika-8 ng umaga>ika-11 ng umaga+ika-2 ng hapon<ika-4 ng hapon**Filipino/modules/images/paalala/pic100.jpg",
"Anong petsa gaganapin ang pulong ng mga magulang?=Hunyo 7>Hulyo 17+Agosto 8<Mayo 29**Filipino/modules/images/paalala/pic100.jpg",
"Ano ang kaganapang nais iparating ng anunsyo o patalastas?=pagpupulong ng mga magulang>pagdiriwang ng kaarawan+pagdarasal nang sama-sama<palaro para sa mga mag-aaral**Filipino/modules/images/paalala/pic100.jpg",
"Ano ang kaganapang nais iparating ng patalastas?=paligsahan sa pag-awit>paligsahan sa pagsayaw+paligsahan sa basketbol<tagisan ng talino sa matematika**Filipino/modules/images/paalala/pic101.jpg",
"Anong petsa gaganapin ang paligsahan sa pag-awit?=Agosto 9>Hulyo 5+Nobyembre 8<Mayo 6**Filipino/modules/images/paalala/pic101.jpg",
"Anong oras gaganapin ang paligsahan sa pag-awit?=ika-4 ng hapon>ika-1 ng hapon+ika-7 ng umaga<ika-10 ng umaga**Filipino/modules/images/paalala/pic101.jpg",
"Alin ang tinutukoy ng impormasyong kulay itim?=oras ng paligsahan>petsa ng paligsahan+mga kalahok sa paligsahan<lugar ng paligsahan**Filipino/modules/images/paalala/pic101.jpg",
"Alin ang tinutukoy ng impormasyong kulay asul?=mga kalahok sa paligsahan>petsa ng paligsahan+oras ng paligsahan<lugar ng paligsahan**Filipino/modules/images/paalala/pic101.jpg",
"Alin ang tinutukoy ng impormasyong kulay rosas?=petsa ng paligsahan>mga kalahok sa paligsahan+oras ng paligsahan<lugar ng paligsahan**Filipino/modules/images/paalala/pic101.jpg",
"Alin ang tinutukoy ng impormasyong kulay lila?=lugar ng paligsahan>mga kalahok sa paligsahan+oras ng paligsahan<petsa ng paligsahan**Filipino/modules/images/paalala/pic101.jpg",
"Paano makasusunod sa paalalang ito?=sa banyo dapat umihi>sa ibang kalye dapat umihi+hintaying walang nakatingin bago umihi<sa nakaparadang dyip na lang umihi**Filipino/modules/images/paalala/pic16.jpg",
"Ano ang ipinagbabawal ng babalang ito?=ang paninigarilyo>ang pagsisindi ng apoy+ang pagluluto<ang pagsusunog ng basura**Filipino/modules/images/paalala/pic17.jpg",
"Ano ang layunin ng babalang ito?=panatilihin ang kalinisan>iwasan ang sakuna+pangalagaan ang kalusugan<panatilihin ang kapayapaan**Filipino/modules/images/paalala/pic18.jpg",
"Ano ang layunin ng babalang ito?=iwasan ang sakuna>panatilihin ang kalinisan+pangalagaan ang kalusugan<panatilihin ang kapayapaan**Filipino/modules/images/paalala/pic19.jpg",

);

?>

</head>

</body>

</html>
