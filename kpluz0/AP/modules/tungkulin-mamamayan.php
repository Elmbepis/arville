<?php
// Mga Tungkulin ng Mamamayang Pilipino
$_SESSION['title'] = "Mga Tungkulin ng Mamamayang Pilipino";

if ($grd > 2) {

    // ============================================================
    // GRADES 3+ (18 T/F + 9 fill-in = 27 questions)
    // ============================================================
    $questions = array(

        "Hindi mahalagang tangkilikin ang mga produktong yari rito sa ating bansa.=mali>tama",
        "Hindi na kailangang malaman pa ng mga mamamayang Pilipino ang kasaysayan ng Pilipinas dahil nakalipas na ito.=mali>tama",
        "Ang pagpapatala sa hukbong sandatahan sa panahon ng digmaan ay dapat nating iwasan.=mali>tama",
        "Ang watawat ay maaari mong tiklupin sa anumang paraan.=mali>tama",
        "Hindi tungkulin ng isang mamamayan ang ipaalam sa mga maykapangyarihan kung may lumalabag sa batas.=mali>tama",
        "Hindi natin tungkulin ang paggalang sa karapatan ng ibang mamamayan.=mali>tama",
        "Ang pagsasawalang-bahala sa mga batas na ipinatutupad ng pamahalaan ay hindi masama.=mali>tama",
        "Ang pagpapalit ng mga titik at pagbabago sa paraan ng pag-awit ng 'Lupang Hinirang' ay nakakatuwa.=mali>tama",
        "May mga tungkuling dapat gampanan ang bawat mamamayan kapalit ng mga karapatang itinadhana ng batas para sa kanya.=tama>mali",
        "Tungkulin ng bawat isa na maging tapat sa bayan at pangalagaan ang kapakanan nito.=tama>mali",
        "Tungkulin ng bawat mamamayang Pilipino na ipagtanggol ang ating bansa.=tama>mali",
        "Dapat nating ipagmalaki at tangkilikin ang kultura ng ating bansa.=tama>mali",
        "Ang paglaban sa mga taong nanggugulo sa maayos nating pamumuhay ay maituturing na pagtatanggol sa ating bansa.=tama>mali",
        "Dapat tumayo nang tuwid at tumingin sa watawat habang inaawit ang 'Lupang Hinirang'.=tama>mali",
        "Mahalagang malaman ng bawat Pilipino ang kasaysayan ng watawat at kahulugan ng disenyo nito.=tama>mali",
        "Bilang mamamayan, tungkulin nating sundin ang batas sa lahat ng oras.=tama>mali",
        "Tungkulin natin ang pag-aralang mabuti kung sino ang dapat nating iboto sa halalan.=tama>mali",
        "Tungkulin mong hindi makasira ng pagkatao ng ibang mamamayan.=tama>mali",
        "Dapat ____ ang mga taong nagpapatupad ng batas gaya ng mga namumuno sa pamahalaan at kapulisan.=igalang>pagsuspetsahan+husgahan<iwasan",
        "Dapat tayong ____ sa iba't ibang proyekto ng pamahalaan gaya ng pangangalaga sa mga likas na yaman.=makilahok>umiwas+umangal<lumaban",
        "Tungkulin ng bawat mamamayang Pilipino ang magbayad ng ____ sa pamahalaan.=tamang buwis>suhol+kotong<kulang na buwis",
        "Ang ____ sa bayan ay isang mahalagang tungkulin ng mga mamamayan.=pagmamahal>pag-alis+pagpapabaya<pagbalewala",
        "Kung may digmaan, tungkulin nating ____ ang ating bayan.=ipagtanggol>isuko+ibigay<iwanan",
        "Tungkulin mong ____ para sa iyong sarili at sa iyong pamilya.=magtrabaho>manghingi+manlimos<mang-angkin",
        "Tungkulin mong iboto ang taong ____ sa posisyong kanyang tinatakbuhan.=karapat-dapat>hindi angkop+tinatamad<walang alam",
        "Dapat mong ____ ang pananampalataya ng ibang tao.=igalang>husgahan+labanan<gayahin",
        "Tungkulin mong ____ ang mga likas na yaman ng ating bansa.=gamitin nang tama>ubusin+sayangin<ipamigay",
    );

} else {

    // ============================================================
    // GRADES 1-2 (19 T/F + 10 fill-in = 29 questions)
    // ============================================================
    $questions = array(

        "Hindi dapat tayo bumili ng mga produktong gawa rito sa ating bansa.=mali>tama",
        "Hindi natin kailangang malaman ang kasaysayan ng ating bansa.=mali>tama",
        "Hindi tayo dapat sumali sa ating hukbong sandatahan kung panahon ng digmaan.=mali>tama",
        "Ang watawat ay maaari mong tiklupin sa anumang paraan.=mali>tama",
        "Hindi natin tungkulin ang tumawag ng pulis kung may lumalabag sa batas.=mali>tama",
        "Hindi natin tungkulin ang gumalang sa karapatan ng ibang mamamayan.=mali>tama",
        "Maaari nating balewalain ang mga batas ng ating pamahalaan.=mali>tama",
        "Maaari nating baguhin ang mga salita sa 'Lupang Hinirang' para gawin itong nakakatawa.=mali>tama",
        "Maaari nating awitin ang 'Lupang Hinirang' sa anumang paraan.=mali>tama",
        "May mga tungkuling dapat gampanan ang bawat mamamayan kapalit ng mga karapatang ibinigay sa kanya.=tama>mali",
        "Tungkulin natin ang maging tapat sa bayan at alagaan ang kapakanan nito.=tama>mali",
        "Tungkulin ng bawat mamamayang Pilipino na ipagtanggol ang ating bansa.=tama>mali",
        "Dapat nating ipagmalaki at tangkilikin ang kultura ng ating bansa.=tama>mali",
        "Dapat tumayo nang tuwid at tumingin sa watawat habang inaawit ang 'Lupang Hinirang'.=tama>mali",
        "Mahalagang malaman natin ang kasaysayan ng ating watawat.=tama>mali",
        "Mahalagang malaman natin ang kahulugan ng disenyo ng ating watawat.=tama>mali",
        "Bilang mamamayan, tungkulin nating sundin ang batas sa lahat ng oras.=tama>mali",
        "Tungkulin natin ang pag-aralang mabuti kung sino ang dapat nating iboto sa halalan.=tama>mali",
        "Tungkulin mong hindi makasira ng pagkatao ng ibang mamamayan.=tama>mali",
        "Dapat ____ ang mga taong nagpapatupad ng batas gaya ng mga pulis.=igalang>pagsuspetsahan+husgahan<iwasan",
        "Dapat ____ ang mga namumuno sa ating barangay.=sundin>tutulan+labanan<layuan",
        "Dapat tayong ____ sa iba't ibang proyekto ng pamahalaan gaya ng pangangalaga sa mga likas na yaman.=makilahok>umiwas+umangal<lumaban",
        "Tungkulin ng bawat mamamayang Pilipino ang magbayad ng ____ sa pamahalaan.=tamang buwis>suhol+kotong<kulang na buwis",
        "Ang ____ sa bayan ay isang mahalagang tungkulin ng mga mamamayan.=pagmamahal>pag-alis+pagpapabaya<pagbalewala",
        "Kung may digmaan, tungkulin nating ____ ang ating bayan.=ipagtanggol>isuko+ibigay<iwanan",
        "Tungkulin mong ____ para sa iyong sarili at sa iyong pamilya.=magtrabaho>manghingi+manlimos<mang-angkin",
        "Tungkulin mong iboto ang taong ____ maglingkod sa bayan.=karapat-dapat>hindi angkop+tinatamad<walang alam",
        "Dapat mong ____ ang pananampalataya ng ibang tao.=igalang>husgahan+labanan<gayahin",
        "Tungkulin mong ____ ang mga likas na yaman ng ating bansa.=gamitin nang tama>ubusin+sayangin<ipamigay",
    );
}