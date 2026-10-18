<?php
$_SESSION['title'] = "Mga Makasaysayang Pook sa Pilipinas";

if ($grd <= 2) {

    // ============================================================
    // GRADES 1-2 — simpler true/false questions only (2 choices, 25 questions)
    // ============================================================
    $questions = array(
        "Ang Luneta o Rizal Park ay dating tinatawag na Bagumbayan.=tama>mali",
        "Ang Krus ni Magellan ay matatagpuan sa Cebu.=tama>mali",
        "Ang Rizal Shrine ay matatagpuan sa Calamba, Laguna.=tama>mali",
        "Ang Aguinaldo Shrine ay matatagpuan sa Cavite.=tama>mali",
        "Ang Fort Santiago ay matatagpuan sa Intramuros, Maynila.=tama>mali",
        "Ang Simbahan ng Barasoain ay matatagpuan sa Bulacan.=tama>mali",
        "Ang EDSA Shrine ay matatagpuan sa Quezon City.=tama>mali",
        "Ang Palasyo ng Malakanyang ay matatagpuan sa Maynila.=tama>mali",
        "Ang Dambana ng Kagitingan ay matatagpuan sa Bataan.=tama>mali",
        "Ang unang misa sa Pilipinas ay ginanap sa Limasawa.=tama>mali",
        "Ang MacArthur Landing Memorial ay matatagpuan sa Leyte.=tama>mali",
        "Ang Corregidor ay isang pulo sa look ng Maynila.=tama>mali",
        "Si Jose Rizal ay ipinanganak sa Calamba, Laguna.=tama>mali",
        "Ang Bagumbayan ay ang dating pangalan ng Luneta.=tama>mali",
        "Ang Aguinaldo Shrine ay matatagpuan sa Kawit, Cavite.=tama>mali",
        "Ang Fort Santiago ay matatagpuan sa Intramuros.=tama>mali",
        "Ang Krus ni Magellan ay matatagpuan sa Cebu City.=tama>mali",
        "Ang EDSA Shrine ay matatagpuan sa Ortigas Avenue.=tama>mali",
        "Ang Dambana ng Kagitingan ay matatagpuan sa Bundok Samat.=tama>mali",
        "Ang unang misa sa Pilipinas ay naganap noong Marso 31, 1521.=tama>mali",
        "Ang MacArthur Landing Memorial ay matatagpuan sa Palo, Leyte.=tama>mali",
        "Si Andres Bonifacio ay nagtatag ng Katipunan.=tama>mali",
        "Ang Rizal Shrine sa Dapitan ay matatagpuan sa Zamboanga del Norte.=tama>mali",
        "Ang Pugad Lawin ay matatagpuan sa Quezon City.=tama>mali",
        "Ang Biak-na-Bato ay matatagpuan sa Bulacan.=tama>mali",
    );

} else {

    // ============================================================
    // GRADES 3+ — full set: true/false + multiple choice (4 choices, 25 questions)
    // ============================================================
    $questions = array(

        // --- True/False ---
        "Ang Dambana ng Kagitingan na kinaroroonan ng isang malaking krus ay matatagpuan sa Pampanga.=mali>tama",
        "Sa buong kasaysayan, tanging mga pangulo lamang ng Pilipinas ang nanirahan sa Palasyo ng Malakanyang.=mali>tama",
        "Ang ipinakikita sa larawan ay matatagpuan sa lalawigan ng Cavite.=mali>tama**AP/modules/images/kalikasan/malakanyang.jpg",
        "Ang ipinakikita sa larawan ay ang Rizal Shrine sa Dapitan.=mali>tama**AP/modules/images/kalikasan/rizal-shrine.jpg",
        "Ang Krus ni Magellan, na ipinakikita sa larawan, ay matatagpuan sa Leyte.=mali>tama**AP/modules/images/kalikasan/krus-magellan.jpg",
        "Ang ipinakikita sa larawan ay matatagpuan sa lalawigan ng Cavite.=mali>tama**AP/modules/images/kalikasan/intramuros.jpg",
        "Ang ipinakikita sa larawan ay ang lugar kung saan napatay si Senador Benigno Aquino.=mali>tama**AP/modules/images/kalikasan/edsa-shrine.jpg",
        "Ang ipinakikita sa larawan ay matatagpuan sa Calamba, Laguna.=tama>mali**AP/modules/images/kalikasan/rizal-shrine2.jpg",
        "Ang ipinakikita sa larawan ay ang Simbahan ng Barasoain.=tama>mali**AP/modules/images/kalikasan/barasoain.jpg",
        "Ang ipinakikita sa larawan ay ang Aguinaldo Shrine sa Cavite.=tama>mali**AP/modules/images/kalikasan/agui-shrine.jpg",
        "Ang tawag noon sa Luneta o Rizal Park ay Bagumbayan.=tama>mali",
        "Sa Biak-na-Bato sa Bulacan nilagdaan noong 1897 ang kasunduang tapusin na ang labanan sa pagitan ng mga Pilipino at Espanyol.=tama>mali",
        "Ang ipinakikita sa larawan ay ang Fort Santiago sa Intramuros, Maynila.=tama>mali**AP/modules/images/kalikasan/fort-santiago.jpg",

        // --- Multiple Choice ---
        "Ang Krus ni Magellan ay matatagpuan sa lungsod ng ____.=Cebu>Maynila+Vigan<Davao",
        "Sa kinatatayuan ng Rizal Shrine sa ____ ipinatapon ng mga Kastila si Rizal noong 1892.=Dapitan>Fort Santiago+Calamba<Corregidor",
        "Ipinanganak at lumaki si Jose Rizal sa ____, kung saan matatagpuan ang isang Rizal Shrine.=Calamba>Fort Santiago+Dapitan<Corregidor",
        "Sa ____ ikinulong ng mga Espanyol si Rizal bago siya barilin sa Bagumbayan.=Fort Santiago>Trece Martires+Dapitan<Corregidor",
        "Ang Aguinaldo Shrine, kung saan inihayag ni Hen. Aguinaldo ang kalayaan ng Pilipinas noong Hunyo 12, 1898, ay nasa ____, Cavite.=Kawit>Silang+Trece Martires<Tanza",
        "Sa Pugad Lawin sa Lungsod ng ____ naganap ang makasaysayang sigaw ng mga Katipunero noong Agosto 23, 1896.=Quezon>Maynila+Caloocan<Pasig",
        "Ang ____ ay isang pulo sa look ng Maynila kung saan magkasamang lumaban ang mga Pilipino at Amerikano laban sa mga Hapon noong WWII.=Corregidor>Fort Santiago+Bataan<Dapitan",
        "Ang Dambana ng Kagitingan kung saan may isang malaking krus ay matatagpuan sa Bundok Samat sa ____.=Bataan>Zambales+Pampanga<Bulacan",
        "Sa Simbahang ____ sa Bulacan unang nagpulong ang mga kinatawan ng Kongreso ng Pilipinas noong ika-15 ng Setyembre, 1898.=Barasoain>San Agustin+San Sebastian<Santo Domingo",
        "Ang EDSA Shrine ay matatagpuan sa panulukan ng EDSA at ____ Avenue.=Ortigas>Araneta+Rizal<Quezon",
        "Ang unang misa sa Pilipinas ay ginanap sa Limasawa sa ____ noong March 31, 1521.=Southern Leyte>Cebu+Bohol<Leyte",
        "Ang MacArthur Landing Memorial National Park ay matatagpuan sa ____.=Leyte>Cebu+Bohol<Samar",

    );
}
?>