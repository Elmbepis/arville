<?php
// Pagpapahalaga sa Aking Sarili
// Grade 1 AP — self-value, personal care, good habits
// Format: statement.=answer>wrong1[+wrong2[<wrong3]]
// T/F uses 2 choices; fill-in uses 4 choices.

$_SESSION['title'] = "Pagpapahalaga sa Aking Sarili";

$questions = array(

    "Hindi ka dapat magkaroon ng sarili mong pangarap.=mali>tama",
    "Puwedeng magpuyat gabi-gabi ang isang bata.=mali>tama",
    "Hindi mahalaga ang pagiging malinis sa pananamit.=mali>tama",
    "Hindi mahalagang matuto ng iba't ibang kakayahan ang isang bata.=mali>tama",
    "Hindi ko dapat matutong magdrowing kung gusto ko itong gawin.=mali>tama",
    "Hindi mahalaga ang pagtulog nang maaga.=mali>tama",   
    "Ang pagkakaroon ng pangarap ay mahalaga sa isang bata.=tama>mali",
    "Mahalaga ang kinabukasan ng bawat bata.=tama>mali",
    "Hindi dapat tayo mahiya anuman ang ating hitsura.=tama>mali",
    "Kailangan kong kumain ng sapat at masustansyang pagkain.=tama>mali",
    "Mag-aaral akong mabuti hanggang sa ako'y makatapos ng pag-aaral.=tama>mali",
    "Susunod ako sa mga payo ng aking mga magulang.=tama>mali",
    "Gusto kong gumaling sa basketbol kaya magsasanay ako rito.=tama>mali",
    "Dapat tayong maligo araw-araw para manatili tayong malinis.=tama>mali",   
    "Mabuti para sa atin ang gulay at prutas.=tama>mali",                           
    "Dapat tayong mag-ehersisyo para lumusog ang ating katawan.=tama>mali",          
    "Ang pagsasabi ng totoo ay tanda ng pagpapahalaga sa sarili.=tama>mali",            
    "Dapat tayong ____ sa ating kamalian.=matuto>magalit+maiyak<manisi",
    "May ____ ka dapat sa iyong sarili.=tiwala>inis+duda<lungkot",
    "Dapat kong ____ ang aking katawan.=alagaan>pabayaan+pagurin<balewalain",
    "Dapat matulog ang isang bata ng ____ oras araw-araw.=10>7+5<6",
    "Mahalagang ____ ko ang aking mga kakayahan.=paunlarin>pabayaan+kalimutan<balewalain",
    "Gusto kong matutong sumayaw kaya ____ ko ito.=pag-aaralan>isasantabi+iiwasan<aayawan",
    "Dapat tayong ____ araw-araw.=magsipilyo>magkalat+mamasyal+magpagod",  
    "Ang ____ ay mahalaga upang lumakas ang ating katawan.=ehersisyo>pagod+katamaran+lungkot",                         
    "Dapat nating ____ ang ating mga magulang at guro.=igalang>awayin+pagtawanan+suwayin",                        
    
);