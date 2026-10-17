<?php
// Mga Kasapi ng Komunidad
// Single file with grade-conditional question sets:
//   Grades 0, 1  &#8594; simpler wording (25 questions)
//   Grades 2+    &#8594; more detailed wording (25 questions)
// $grd is set by q-display-legacy.php from $_SESSION['grade']

$_SESSION['title'] = "Mga Kasapi ng Komunidad";

if ($grd > 1) {

    // ============================================================
    // GRADE 2+ — more detailed wording (25 questions)
    // ============================================================
    $questions = array(

        "Sino ang tumutulong sa pagpapanatili ng kapayapaan sa ating komunidad?=barangay tanod>sastre+dentista<barbero",
        "Sino ang gumugupit ng ating buhok kapag mahaba na ito?=barbero>mananahi+bumbero<kaminero",
        "Sino ang nangungulekta ng mga basura sa ating komunidad?=basurero>barbero+bumbero<karpintero",
        "Sino ang pumapatay ng apoy kapag may sunog sa ating komunidad?=bumbero>basurero+barbero<karpintero",
        "Sino ang nangangalaga sa ating mga ngipin?=dentista>barangay tanod+mananahi<panadero",
        "Sino ang gumagamot sa mga may sakit sa ating komunidad?=doktor>bumbero+panadero<pari",
        "Sino ang nagtuturo sa mga batang bumasa at sumulat?=guro>karpintero+mananahi<nars",
        "Sino ang naglilinis ng mga kalsada sa ating komunidad?=kaminero>karpintero+kusinero<sastre",
        "Sino ang gumagawa o kumukumpuni ng ating mga tirahan?=karpintero>bumbero+mangingisda<sastre",
        "Sino ang nagtatanim ng palay at gulay na kinakain natin?=magsasaka>barangay tanod+kaminero<panadero",
        "Sino ang tumatahi ng ating mga kasuotan?=mananahi>panadero+kusinero<guro",
        "Sino ang nanghuhuli ng mga isdang kinakain natin?=mangingisda>magsasaka+modista<pulis",
        "Sino ang tumutulong sa doktor sa pag-aalaga ng maysakit sa ating komunidad?=nars>mananahi+barangay tanod<atleta",
        "Sino ang humuhuli sa masasamang tao sa ating komunidad?=pulis>panadero+pari<bumbero",
        "Sino ang nag-aayos ng mga sirang tubo ng tubig sa bahay natin?=tubero>kusinero+bumbero<pulis",
        "Sino ang gumagawa ng iba't ibang tinapay sa ating komunidad?=panadero>mananahi+mangingisda<nars",
        "Sino ang nagtitinda ng bigas, gulay, karne at iba pa sa ating komunidad?=tindera>bumbero+atleta<pari",
        "Sino ang nagmimisa sa simbahan sa ating komunidad?=pari>sastre+guro<pulis",
        "Sino ang sumasali sa mga palakasan sa ating komunidad?=atleta>abogado+guro<pulis",
        "Sino ang nagtatanggol ng mga tao sa korte para sa hustisya?=abogado>kusinero+barbero<dentista",
        "Sino ang humahatol sa mga kasong nililitis sa korte?=huwes>panadero+magsasaka<kaminero",
        "Sino ang umaarte sa mga pelikula at palabas na pinanonood natin?=artista>pulis+pari<doktor",
        "Sino ang tumatahi ng mga kasuotang pambabae sa ating komunidad?=modista>bumbero+nars<guro",
        "Sino ang tumatahi ng mga kasuotang panlalaki sa ating komunidad?=sastre>karpintero+panadero<magsasaka",
        "Sino ang nagluluto ng iba't ibang pagkain para sa atin?=kusinero>karpintero+mangingisda<magsasaka",
    );

} else {

    // ============================================================
    // GRADES 0, 1 — simpler wording (25 questions)
    // ============================================================
    $questions = array(

        "Sino ang tumutulong sa pagpapanatili ng katahimikan sa komunidad?=barangay tanod>sastre+dentista<barbero",
        "Sino ang gumugupit ng ating buhok?=barbero>mananahi+bumbero<kaminero",
        "Sino ang nangungulekta ng mga basura sa komunidad?=basurero>barbero+bumbero<karpintero",
        "Sino ang pumapatay ng apoy pag may sunog?=bumbero>basurero+barbero<karpintero",
        "Sino ang nangangalaga sa ating ngipin?=dentista>barangay tanod+mananahi<panadero",
        "Sino ang gumagamot sa mga may sakit?=doktor>bumbero+panadero<pari",
        "Sino ang nagtuturo sa ating bumasa at sumulat?=guro>karpintero+mananahi<nars",
        "Sino ang naglilinis ng mga kalsada sa komunidad?=kaminero>karpintero+kusinero<sastre",
        "Sino ang gumagawa ng ating tirahan?=karpintero>bumbero+mangingisda<sastre",
        "Sino ang nagtatanim ng palay at gulay?=magsasaka>barangay tanod+kaminero<panadero",
        "Sino ang gumagawa ng ating damit?=mananahi>panadero+kusinero<guro",
        "Sino ang nanghuhuli ng isda?=mangingisda>magsasaka+modista<pulis",
        "Sino ang tumutulong sa doktor sa pag-aalaga ng maysakit?=nars>mananahi+barangay tanod<atleta",
        "Sino ang humuhuli sa masasamang tao?=pulis>panadero+pari<bumbero",
        "Sino ang nagtitinda ng bigas, gulay, karne at iba pa?=tindera>bumbero+atleta<pari",
        "Sino ang nag-aayos ng mga sirang tubo ng tubig?=tubero>kusinero+bumbero<pulis",
        "Sino ang tumatahi ng kasuotang pambabae?=modista>bumbero+nars<guro",
        "Sino ang gumagawa ng iba't ibang tinapay?=panadero>mananahi+mangingisda<nars",
        "Sino ang tumatahi ng kasuotang panlalaki?=sastre>karpintero+panadero<magsasaka",
        "Sino ang nagluluto ng mga pagkain?=kusinero>karpintero+mangingisda<magsasaka",
        "Sino ang nagmimisa sa simbahan?=pari>sastre+guro<pulis",
        "Sino ang sumasali sa mga palakasan?=atleta>abogado+guro<pulis",
        "Sino ang nagtatanggol ng mga tao sa korte?=abogado>kusinero+barbero<dentista",
        "Sino ang humahatol sa mga kaso?=huwes>panadero+magsasaka<kaminero",
        "Sino ang umaarte sa mga palabas?=artista>pulis+pari<doktor",
    );
}