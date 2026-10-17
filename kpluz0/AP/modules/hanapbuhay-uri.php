<?php
// Mga Uri ng Hanapbuhay
// Grade-conditional: grades 1-2 use simpler descriptions; grades 3+ use detailed descriptions.
$_SESSION['title'] = "Mga Uri ng Hanapbuhay";

if ($grd <= 2) {

    // ============================================================
    // GRADES 1-2 — simpler wording (25 questions)
    // ============================================================
    $questions = array(
        "Sino ang pumapatay ng apoy pag may sunog?=bumbero>dentista+doktor<guro",
        "Sino ang nangangalaga sa ating ngipin?=dentista>bumbero+doktor<guro",
        "Sino ang gumagamot sa mga may sakit?=doktor>bumbero+dentista<guro",
        "Sino ang nagtuturo sa ating bumasa at sumulat?=guro>bumbero+dentista<doktor",
        "Sino ang gumagawa ng ating tirahan?=karpintero>bumbero+mananahi<magsasaka",
        "Sino ang nagtatanim ng palay at gulay?=magsasaka>karpintero+mananahi<mangingisda",
        "Sino ang gumagawa ng ating damit?=mananahi>karpintero+magsasaka<mangingisda",
        "Sino ang nanghuhuli ng isda?=mangingisda>magsasaka+mananahi<karpintero",
        "Sino ang humuhuli sa masasamang tao?=pulis>bumbero+tubero<guro",
        "Sino ang nag-aayos ng mga sirang tubo?=tubero>bumbero+pulis<guro",
        "Sino ang gumugupit ng ating buhok?=barbero>dentista+doktor<guro",
        "Sino ang tumutulong sa doktor sa pag-aalaga ng maysakit?=nars>barbero+dentista<pulis",
        "Sino ang nagtitinda ng bigas, gulay, karne at iba pa?=tindera>mananahi+karpintero<magsasaka",
        "Sino ang nangungulekta ng mga basura sa komunidad?=basurero>kaminero+bumbero<pulis",
        "Sino ang naglilinis ng mga kalsada?=kaminero>basurero+barbero<pulis",
        "Sino ang gumagawa ng iba't ibang tinapay?=panadero>kusinero+tindera<sastre",
        "Sino ang tumatahi ng kasuotang pambabae?=modista>sastre+mananahi<tindera",
        "Sino ang tumatahi ng kasuotang panlalaki?=sastre>modista+mananahi<tindera",
        "Sino ang gumagamot ng mga maysakit sa komunidad?=manggagamot>barbero+kaminero<tindera",
        "Sino ang nagmimisa sa simbahan?=pari>pulis+guro<doktor",
        "Sino ang nagluluto ng masasarap na pagkain?=kusinero>panadero+tindera<sastre",
        "Sino ang sumasali sa mga palakasan?=atleta>pulis+abogado<guro",
        "Sino ang nagtatanggol ng mga tao sa korte?=abogado>pulis+guro<doktor",
        "Sino ang humahatol sa mga kaso?=huwes>abogado+pulis<guro",
        "Sino ang umaarte sa mga palabas?=artista>pulis+guro<doktor",
    );

} else {

    // ============================================================
    // GRADES 3+ — more detailed wording (25 questions)
    // ============================================================
    $questions = array(
        "Sino ang pumapatay ng apoy kapag may sunog sa komunidad?=bumbero>basurero+barbero<karpintero",
        "Sino ang nangangalaga sa ating mga ngipin?=dentista>barangay tanod+mananahi<panadero",
        "Sino ang gumagamot sa mga may sakit sa komunidad?=doktor>bumbero+panadero<pari",
        "Sino ang nagtuturo sa mga batang bumasa at sumulat?=guro>karpintero+mananahi<nars",
        "Sino ang gumagawa o kumukumpuni ng ating mga tirahan?=karpintero>bumbero+mangingisda<sastre",
        "Sino ang nagtatanim ng palay at gulay na kinakain natin?=magsasaka>barangay tanod+kaminero<panadero",
        "Sino ang tumatahi ng ating mga kasuotan?=mananahi>panadero+kusinero<guro",
        "Sino ang nanghuhuli ng mga isdang kinakain natin?=mangingisda>magsasaka+modista<pulis",
        "Sino ang humuhuli sa masasamang tao sa ating komunidad?=pulis>panadero+pari<bumbero",
        "Sino ang nag-aayos ng mga sirang tubo ng tubig sa bahay natin?=tubero>kusinero+bumbero<pulis",
        "Sino ang gumugupit ng ating buhok kapag mahaba na ito?=barbero>mananahi+bumbero<kaminero",
        "Sino ang tumutulong sa doktor sa pag-aalaga ng maysakit sa ating komunidad?=nars>mananahi+barangay tanod<atleta",
        "Sino ang nagtitinda ng bigas, gulay, karne at iba pa sa ating komunidad?=tindera>bumbero+atleta<pari",
        "Sino ang nangungulekta ng mga basura sa ating komunidad?=basurero>barbero+bumbero<karpintero",
        "Sino ang naglilinis ng mga kalsada sa ating komunidad?=kaminero>karpintero+kusinero<sastre",
        "Sino ang gumagawa ng iba't ibang tinapay sa ating komunidad?=panadero>mananahi+mangingisda<nars",
        "Sino ang tumatahi ng mga kasuotang pambabae sa ating komunidad?=modista>bumbero+nars<guro",
        "Sino ang tumatahi ng mga kasuotang panlalaki sa ating komunidad?=sastre>karpintero+panadero<magsasaka",
        "Sino ang nagluluto ng iba't ibang pagkain para sa atin?=kusinero>karpintero+mangingisda<magsasaka",
        "Sino ang nagmimisa sa simbahan sa ating komunidad?=pari>sastre+guro<pulis",
        "Sino ang sumasali sa mga palakasan sa ating komunidad?=atleta>abogado+guro<pulis",
        "Sino ang nagtatanggol ng mga tao sa korte para sa hustisya?=abogado>kusinero+barbero<dentista",
        "Sino ang humahatol sa mga kasong nililitis sa korte?=huwes>panadero+magsasaka<kaminero",
        "Sino ang umaarte sa mga pelikula at palabas na pinanonood natin?=artista>pulis+pari<doktor",
        "Sino ang tumutulong sa pagpapanatili ng katahimikan sa komunidad?=barangay tanod>sastre+dentista<barbero",
    );
}