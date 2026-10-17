<?php
// Pagkilala sa Aking Paaralan
$_SESSION['title'] = "Pagkilala sa Aking Paaralan";

$questions = array(

    "Maaaring maglaro habang nagtuturo ang guro.=mali>tama",
    "Hindi dapat makinig sa guro kung siya ay nagtuturo.=mali>tama",
    "Hindi mahalagang makilala ang mga taong bumubuo ng ating paaralan.=mali>tama",
    "Wala tayong makikilalang mga bagong kaibigan sa ating paaralan.=mali>tama",
    "Sa dyanitor tayo dapat humingi ng tulong kung masakit ang ngipin natin.=mali>tama",
    "Hindi dapat mag-ingay sa loob ng aklatan.=tama>mali",
    "Dapat ay alam natin ang pangalan ng ating paaralan.=tama>mali",
    "Ang punong guro ang namamahala sa isang paaralan.=tama>mali",
    "Ang 'guidance counselor' ang nagbibigay ng patnubay at mga payo sa mga mag-aaral.=tama>mali",
    "Dapat nating isauli ang lahat ng mga aklat na ating hinihiram sa ating laybraryan.=tama>mali",
    "Sa ____ tayo maaaring humiram at magbasa ng mga aklat.=aklatan>klinika+kantina<palaruan",
    "Sa ____ tayo tinuturuan ng ating guro.=silid-aralan>klinika+kantina<palaruan",
    "Sa ____ tayo kumakain.=kantina>klinika+aklatan<silid-aralan",
    "Sa ____ tayo naglalaro.=palaruan>klinika+aklatan<kantina",
    "Sa ____ ginagamot ang mga mag-aaral na may sakit.=klinika>palaruan+aklatan<kantina",
    "Pinananatili niyang malinis ang ating paaralan. Sino siya?=dyanitor>guro+nars<dentista**AP/modules/images/sari-sari/dyanitor.jpg",
    "Siya ang nagtuturo sa mga mag-aaral ng mga aralin. Sino siya?=guro>dyanitor+nars<duktor",
    "Siya ang gumagamot sa mga mag-aaral na may karamdaman. Sino siya?=doktor>guro+nars<dentista",
    "Siya ang tumutulong sa doktor sa pag-aalaga sa kalusugan ng mga mag-aaral. Sino siya?=nars>guro+laybraryan<dentista",
    "Siya ang nag-aalaga sa mga ngipin ng mga mag-aaral. Sino siya?=dentista>guro+nars<dyanitor",
    "Siya ang katiwala ng aklatan ng paaralan. Sa kanya humihiram ng mga aklat ang mga mag-aaral. Sino siya?=laybraryan>guro+nars<punong guro",
    "Tungkulin ng mga ____ ang pumasok sa paaralan araw-araw at mag-aral nang mabuti.=mag-aaral>guro+nars<punong guro",
    "Ang pamamahala ng paaralan ay ginagampanan ng ____.=punong guro>guro+nars<dyanitor",
    "Ang nasa larawan ay isang ____.=aklatan>kantina+silid-aralan<palaruan**AP/modules/images/sari-sari/aklatan.jpg",
    "Ang nasa larawan ay isang ____.=silid-aralan>kantina+aklatan<palaruan**AP/modules/images/sari-sari/silid-aralan.jpg",
    "Ang nasa larawan ay isang ____.=kantina>aklatan+silid-aralan<palaruan**AP/modules/images/sari-sari/kantina.jpg",
    "Ang nasa larawan ay isang ____.=palaruan>aklatan+silid-aralan<kantina**AP/modules/images/sari-sari/palaruan.jpg",
    "Ang nasa larawan ay isang ____.=klinika>aklatan+palaruan<kantina**AP/modules/images/sari-sari/klinika.jpg",
    
);