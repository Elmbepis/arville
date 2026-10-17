<?php
// Distansya, Direksyon, at Lokasyon
$_SESSION['title'] = "Distansya, Direksyon, at Lokasyon";

$questions = array(

    "Hindi nakatutulong ang distansya sa pagtukoy ng lokasyon ng isang bagay.=mali>tama",
    "Hindi nakatutulong ang direksyon sa pagtukoy ng lokasyon ng isang bagay.=mali>tama",
    "Ayon sa mapa, mas malapit ang Duhat St. sa Saging St. kaysa sa Bayabas St.=mali>tama**AP/modules/qimages/dist-direk2.jpg",
    "Ayon sa mapa, ang Atis St. at Santol St. ay nasa KALIWA ng Chico St.=mali>tama**AP/modules/qimages/dist-direk2.jpg",
    "Batay sa larawan, nasa HARAPAN ni Gina ang tuta.=mali>tama**AP/modules/qimages/dist-direk3.jpg",
    "Ang mapa ay isang larawang nagpapakita ng mga daanan at mga bagay sa isang lugar.=tama>mali",
    "Ang mga ipinakikita sa larawan ay mga panandang ginagamit sa mapa.=tama>mali**AP/modules/qimages/dist-direk1.jpg",
    "Ayon sa mapa, mas malapit ang Santol St. sa Atis St. kaysa sa Duhat St.=tama>mali**AP/modules/qimages/dist-direk2.jpg",
    "Ayon sa mapa, mas malapit ang bahay nina Roy sa paaralan kaysa sa bahay nina Lita.=tama>mali**AP/modules/qimages/dist-direk2.jpg",
    "Batay sa larawan, si Gina ay nasa ILALIM ng ibon.=tama>mali**AP/modules/qimages/dist-direk3.jpg",
    "Batay sa larawan, mas MALAPIT si Gina sa tuta kaysa sa puno.=tama>mali**AP/modules/qimages/dist-direk3.jpg",
    "Ang ____ ng isang bagay ay ang lugar kung saan ito matatagpuan.=lokasyon>distansya+direksyon<pananda",
    "Ang layo o lapit ng isang bagay sa isa pang bagay ay tinatawag na ____.=distansya>lokasyon+direksyon<pananda",
    "Ang lahat ng mga ito ay makatutulong sa pagtukoy ng lokasyon ng isang bagay maliban sa ____.=oras>distansya+direksyon<mapa",
    "Ang 'kaliwa', 'kanan', 'harapan', at 'likuran' ay mga halimbawa ng ____.=direksyon>distansya+lokasyon<pananda sa mapa",
    "Ang 'sampung metro' at 'limang kilometro' ay mga halimbawa ng ____.=distansya>direksyon+lokasyon<pananda sa mapa",
    "Ang ipinakikita sa larawan ay isang ____.=mapa>patalastas+babala<pahayagan**AP/modules/qimages/dist-direk2.jpg",
    "Ayon sa mapa, ang kalyeng sumasalubong sa LAHAT ng mga iba pang kalye ay ang ____.=Chico St.>Duhat St.+Bayabas St.<Santol St.**AP/modules/qimages/dist-direk2.jpg",
    "Ayon sa mapa, ang kalyeng pinakamalayo sa Duhat St. ay ang ____.=Santol St.>Chico St.+Bayabas St.<Atis St.**AP/modules/qimages/dist-direk2.jpg",
    "Ayon sa mapa, ang paaralan ay nasa kanto ng ____.=Chico St. at Duhat St.>Chico St. at Santol St.+Saging St. at Santol St.<Duhat St. at Atis St.**AP/modules/qimages/dist-direk2.jpg",
    "Ayon sa mapa, ang bahay nina Lita ay nasa ____.=Santol St.>Bayabas St.+Saging St.<Atis St.**AP/modules/qimages/dist-direk2.jpg",
    "Ayon sa mapa, ang bahay nina Roy ay nasa ____.=Atis St.>Bayabas St.+Saging St.<Duhat St.**AP/modules/qimages/dist-direk2.jpg",
    "Ayon sa mapa, ang ____ ay nasa KALIWA ng Chico St.=Saging St. at Bayabas St.>Bayabas St. at Santol St.+Saging St. at Atis St.<Duhat St. at Santol St.**AP/modules/qimages/dist-direk2.jpg",
    "Batay sa larawan, ang puno ay nasa ____ ni Gina.=likuran>harapan+ibabaw<ilalim**AP/modules/qimages/dist-direk3.jpg",
    "Batay sa larawan, ang ____ ay nasa HARAPAN ni Gina.=elepante>puno+ibon<tuta**AP/modules/qimages/dist-direk3.jpg",
    "Batay sa larawan, ang ibon ay nasa ____ ni Gina.=ibabaw>harapan+likuran<ilalim**AP/modules/qimages/dist-direk3.jpg",
    "Batay sa larawan, ang kuting ay ____ hakbang mula sa halaman.=4>6+2<7**AP/modules/qimages/dist-direk4.jpg",
    "Batay sa larawan, ang bola ay ____ hakbang mula sa halaman.=5>3+7<8**AP/modules/qimages/dist-direk4.jpg",
    "Batay sa larawan, ang manok ay ____ hakbang mula sa halaman.=9>5+7<11**AP/modules/qimages/dist-direk4.jpg",
    "Batay sa larawan, ang tuta ay ____ hakbang mula sa bola.=7>3+5<9**AP/modules/qimages/dist-direk4.jpg",
    "Batay sa larawan, ang bota ay ____ hakbang mula sa manok.=6>2+4<8**AP/modules/qimages/dist-direk4.jpg",
    "Batay sa larawan, ang bota ay ____ hakbang mula sa kuting.=11>6+8<9**AP/modules/qimages/dist-direk4.jpg",
    "Batay sa larawan, ang manok ay ____ hakbang mula sa kuting.=5>3+4<7**AP/modules/qimages/dist-direk4.jpg",
    
);