<?php
// Ano ang Komunidad?
$_SESSION['title'] = "Ano ang Komunidad?";

$questions = array(

    "Ang komunidad ay binubuo ng mga taong nakatira sa magkakaiba at magkakalayong pook.=mali>tama",
    "Ang pamilya ay hindi maituturing na bahagi ng isang komunidad.=mali>tama",
    "Walang matatagpuang komunidad sa tabing-dagat.=mali>tama",
    "Hindi maaaring makabuo ng komunidad sa kabundukan.=mali>tama",
    "Sa lungsod lamang makakakita ng isang komunidad.=mali>tama",
    "Ang pamilihan ay hindi bahagi ng isang komunidad.=mali>tama",
    "Ang sentrong pangkalusugan ay hindi bahagi ng isang komunidad.=mali>tama",
    "Iisa lamang ang uri ng pamilya at ito ang nukleyar na pamilya.=mali>tama",
    "Ang komunidad ay binubuo ng pangkat ng mga taong naninirahan sa isang pook.=tama>mali",
    "Ang paaralan ay bahagi ng isang komunidad.=tama>mali",
    "Ang simbahan ay bahagi ng isang komunidad.=tama>mali",
    "Ang mga pook-libangan ay bahagi ng isang komunidad.=tama>mali",
    "Ang mga panahanan ay bahagi ng isang komunidad.=tama>mali",
    "Maaaring magkaroon ng isang komunidad sa tabing-dagat o sa bundok.=tama>mali",
    "May mga komunidad na matatagpuan sa tabi ng ilog.=tama>mali",
    "Ang maliit na pamilya ay binubuo lamang ng isa hanggang dalawang anak.=tama>mali",
    "Ang ____ ay tumutukoy sa pangkat ng mga taong naninirahan sa iisang lugar.=komunidad>bayan+bansa<lalawigan",
    "Ang komunidad ay maaari ring tawaging ____.=pamayanan>bansa+lalawigan<lungsod",
    "Sa ____ sama-samang nanalangin ang mga tao.=simbahan>paaralan+pamilihan<pook-libangan",
    "Ang ____ ang namumuno sa mga pagdiriwang na panrelihiyon.=simbahan>paaralan+pamilihan<pook-libangan",
    "Sa ____ ginaganap ang mga palabas at programa ng isang komunidad.=pook-libangan>paaralan+pamilihan<simbahan",
    "Sa ____ naglalaro ang mga bata kung walang pasok.=palaruan>health center+pamilihan<simbahan",
    "Sa ____ pumupunta ang mga tao upang magpatingin ng kanilang mga karamdaman.=health center>pook-libangan+pamilihan<simbahan",
    "Ang ____ ang nangangalaga sa kalusugan ng mga mamamayan.=health center>paaralan+pamilihan<pook-libangan",
    "Ang ____ ang nangangasiwa sa kaayusan at kapayapaan ng komunidad.=bahay-pamahalaan>paaralan+pamilihan<health center",
    "Sa ____ tayo makabibili ng mga pagkain, damit, at iba pang pangangailangan.=pamilihan>health center+palaruan<simbahan",
    "Sa ____ nasasanay magbasa at magsulat ang mga bata.=paaralan>pamilihan+palaruan<pook-libangan",
    "Ang namumuno sa ____ ay ang punong guro nito.=paaralan>pamilihan+palaruan<health center",
    "Ang ____ ay binubuo ng mga magulang at kanilang mga anak.=pamilya>pamilihan+palaruan<health center",
    "Ang ____ ang pinakamaliit at pangunahing yunit ng komunidad.=pamilya>pamilihan+palaruan<paaralan",
    "Ang pamilyang binubuo ng tatay, nanay, at anak ay tinatawag na '____ family'=.nuclear>extended+single-parent<step",
    "Ang pamilyang may kasamang kamag-anak gaya ng lola, lolo, tiya, o tiyo ay tinatawag na '____ family'.=extended>nuclear+single-parent<childless",
    
);