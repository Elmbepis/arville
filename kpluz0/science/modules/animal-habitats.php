<html>

<head>
<body>

<?php
$_SESSION['title']="Habitats of Animals";

if ($grd <= 1) {

    // Grade 0–1 — picture-based habitat identification (27 questions)
    $questions=array(

    "Where does this animal live?=in water>on land+in the air<underground**ac-fish5.jpg",
    "Where does this animal live?=in water>on land+in the air<underground**ac-fish3.jpg",
    "Where does this animal live?=in water>on land+in the air<underground**ac-mammal5.jpg",
    "Where does this animal live?=on land>in water+in the air<underground**ac-mammal1.jpg",
    "Where does this animal live?=on land>in water+in the air<underground**ac-mammal3.jpg",
    "The animal marked as 'A' lives where?=water>land+air<underground**ac-habitats1.jpg",
    "The animal marked as 'B' lives where?=land>water+air<underground**ac-habitats1.jpg",
    "The animal marked as 'C' lives where?=land>water+air<underground**ac-habitats1.jpg",
    "The animal marked as 'D' lives where?=water>land+air<underground**ac-habitats1.jpg",
    "The animal marked as 'E' lives where?=water>land+air<underground**ac-habitats1.jpg",
    "The animal marked as 'F' lives where?=land>water+air<underground**ac-habitats1.jpg",
    "Which animal could live in the habitat marked as 'A'?=octopus>elephant+butterfly<ostrich**ac-habitats2.jpg",
    "Which animal could live in the habitat marked as 'A'?=shark>giraffe+beetle<hawk**ac-habitats2.jpg",
    "Which animal could live in the habitat marked as 'B'?=monkey>clam+tuna<dolphin**ac-habitats2.jpg",
    "Which animal could live in the habitat marked as 'B'?=snake>whale+eel<squid**ac-habitats2.jpg",
    "Which animal could live in the habitat marked as 'C'?=catfish>tiger+deer<chicken**ac-habitats2.jpg",
    "Which animal could live in the habitat marked as 'C'?=mudfish>mouse+bee<eagle**ac-habitats2.jpg",
    "Which animal could live in the habitat marked as 'D'?=scorpion>octopus+shrimp<starfish**ac-habitats2.jpg",
    "Which animal could live in the habitat marked as 'D'?=fox>squid+crab<ray**ac-habitats2.jpg",
    "Which animal could live in the habitat marked as 'A'?=sea turtle>wolf+goose<dragonfly**ac-habitats3.jpg",
    "Which animal could live in the habitat marked as 'A'?=squid>rabbit+bat<monkey**ac-habitats3.jpg",
    "Which animal could live in the habitat marked as 'B'?=lion>goldfish+whale<clam**ac-habitats3.jpg",
    "Which animal could live in the habitat marked as 'B'?=zebra>catfish+eel<clam**ac-habitats3.jpg",
    "Which animal could live in the habitat marked as 'C'?=eel>tiger+bat<ant**ac-habitats3.jpg",
    "Which animal could live in the habitat marked as 'C'?=carp>giraffe+fox<dove**ac-habitats3.jpg",
    "Which animal could live in the habitat marked as 'D'?=wolf>starfish+shark<salmon**ac-habitats3.jpg",
    "Which animal could live in the habitat marked as 'D'?=hare>ray+clam<oyster**ac-habitats3.jpg",

    );

} elseif ($grd == 2) {

    // Grade 2 — letter identification and pairs (26 questions)
    $questions=array(

    "The animals that live on land are marked by which letters?=B and C>B and D+B and E<B and E**ac-habitats1.jpg",
    "The animals that live on land are marked by which letters?=B and F>B and A+C and D<B and D**ac-habitats1.jpg",
    "The animals that live on land are marked by which letters?=C and F>B and D+C and D<B and E**ac-habitats1.jpg",
    "The animals that live in water are marked by which letters?=A and D>A and B+A and C<D and F**ac-habitats1.jpg",
    "The animals that live in water are marked by which letters?=A and E>A and C+A and F<D and F**ac-habitats1.jpg",
    "The animals that live in water are marked by which letters?=D and E>A and B+A and C<E and F**ac-habitats1.jpg",
    "Which pair of animals could live in the habitat marked as 'A'?=octopus and shark>squid and hawk+hare and whale<shark and ostrich**ac-habitats2.jpg",
    "Which pair of animals could live in the habitat marked as 'A'?=whale and squid>squid and tiger+lizard and shark<dolphin and wasp**ac-habitats2.jpg",
    "Which pair of animals could live in the habitat marked as 'B'?=ant and hawk>monkey and shark+ray and snake<eagle and tuna**ac-habitats2.jpg",
    "Which pair of animals could live in the habitat marked as 'B'?=snake and monkey>monkey and squid+clam and snail<ant and salmon**ac-habitats2.jpg",
    "Which pair of animals could live in the habitat marked as 'C'?=catfish and piranha>mudfish and skunk+eel and hare<crow and shrimp**ac-habitats2.jpg",
    "Which pair of animals could live in the habitat marked as 'C'?=carp and mudfish>tilapia and goose+monkey and eel<octopus and ape**ac-habitats2.jpg",
    "Which pair of animals could live in the habitat marked as 'D'?=scorpion and snake>ant and dolphin+whale and fox<termite and eel**ac-habitats2.jpg",
    "Which pair of animals could live in the habitat marked as 'D'?=fox and camel>scorpion and eel+ant and octopus<squid and snake**ac-habitats2.jpg",
    "Which pair of animals could live in the habitat marked as 'A'?=sea turtle and squid>hawk and dolphin+whale and rabbit<shark and eagle**ac-habitats3.jpg",
    "Which pair of animals could live in the habitat marked as 'A'?=shark and ray>squid and hare+ant and octopus<tuna and pigeon**ac-habitats3.jpg",
    "Which pair of animals could live in the habitat marked as 'B'?=lion and zebra>giraffe and eel+tuna and cheetah<ostrich and lobster**ac-habitats3.jpg",
    "Which pair of animals could live in the habitat marked as 'B'?=giraffe and ostrich>zebra and salmon+squid and buffalo<lion and dolphin**ac-habitats3.jpg",
    "Which pair of animals could live in the habitat marked as 'C'?=eel and carp>piranha and elk+crocodile and hyena<giraffe and turtle**ac-habitats3.jpg",
    "Which pair of animals could live in the habitat marked as 'C'?=catfish and tilapia>mudfish and buffalo+scorpion and piranha<giraffe and turtle**ac-habitats3.jpg",
    "Which pair of animals could live in the habitat marked as 'D'?=wolf and hare>bear and starfish+fox and mussel<ray and deer**ac-habitats3.jpg",
    "Which pair of animals could live in the habitat marked as 'D'?=bear and fox>wolf and whale+hare and mussel<dolphin and elk**ac-habitats3.jpg",
    "Which animal could not live with the others in the choices below?=giraffe>dolphin+octopus<lobster",
    "Which animal could not live with the others in the choices below?=ray>giraffe+cheetah<rhinoceros",
    "Which animal could not live with the others in the choices below?=oyster>jaguar+monkey<snake",
    "Which animal could not live with the others in the choices below?=spider>oyster+mussel<lobster",

    );

} elseif ($grd == 3) {

    // Grade 3 — habitat labels + "not found in habitat" (24 + 2 new = 26)
    $questions=array(

    "Which of the following refers to the habitat labelled as 'A' in the picture?=ocean>river+lake<stream**ac-habitats4.jpg",
    "Which of the following refers to the habitat labelled as 'B' in the picture?=forest>desert+grassland<polar**ac-habitats4.jpg",
    "Which of the following refers to the habitat labelled as 'C' in the picture?=desert>forest+grassland<polar**ac-habitats4.jpg",
    "Which of the following refers to the habitat labelled as 'D' in the picture?=river>ocean+polar<sea**ac-habitats4.jpg",
    "Which of the following refers to the habitat labelled as 'E' in the picture?=grassland>forest+desert<polar**ac-habitats4.jpg",
    "Which of the following refers to the habitat labelled as 'F' in the picture?=polar>desert+grassland<forest**ac-habitats4.jpg",
    "Which of the following refers to the habitat labelled as 'A' in the picture?=desert>forest+grassland<polar**ac-habitats5.jpg",
    "Which of the following refers to the habitat labelled as 'B' in the picture?=ocean>river+lake<stream**ac-habitats5.jpg",
    "Which of the following refers to the habitat labelled as 'C' in the picture?=river>ocean+desert<sea**ac-habitats5.jpg",
    "Which of the following refers to the habitat labelled as 'D' in the picture?=forest>desert+grassland<polar**ac-habitats5.jpg",
    "Which of the following refers to the habitat labelled as 'E' in the picture?=polar>desert+grassland<forest**ac-habitats5.jpg",
    "Which of the following refers to the habitat labelled as 'F' in the picture?=grassland>forest+desert<polar**ac-habitats5.jpg",
    "Which animal would not be found in the habitat labelled as 'A' in the picture?=lion>octopus+whale<shark**ac-habitats4.jpg",
    "Which animal would not be found in the habitat labelled as 'B' in the picture?=squid>monkey+snake<eagle**ac-habitats4.jpg",
    "Which animal would not be found in the habitat labelled as 'C' in the picture?=mussel>scorpion+fox<snake**ac-habitats4.jpg",
    "Which animal would not be found in the habitat labelled as 'D' in the picture?=grasshopper>carp+crocodile<turtle**ac-habitats4.jpg",
    "Which animal would not be found in the habitat labelled as 'E' in the picture?=lobster>lion+zebra<giraffe**ac-habitats4.jpg",
    "Which animal would not be found in the habitat labelled as 'F' in the picture?=jaguar>polar bear+Arctic fox<penguin**ac-habitats4.jpg",
    "Which animal would not be found in the habitat labelled as 'A' in the picture?=dugong>spider+camel<coyote**ac-habitats5.jpg",
    "Which animal would not be found in the habitat labelled as 'B' in the picture?=goldfish>clownfish+sea turtle<starfish**ac-habitats5.jpg",
    "Which animal would not be found in the habitat labelled as 'C' in the picture?=octopus>tilapia+eel<catfish**ac-habitats5.jpg",
    "Which animal would not be found in the habitat labelled as 'D' in the picture?=clam>gorilla+tiger<snake**ac-habitats5.jpg",
    "Which animal would not be found in the habitat labelled as 'E' in the picture?=giraffe>snowy owl+reindeer<walrus**ac-habitats5.jpg",
    "Which animal would not be found in the habitat labelled as 'F' in the picture?=oyster>cheetah+hippopotamus<hyena**ac-habitats5.jpg",

    // New text-only habitat questions
    "Which of these animals lives in a polar habitat?=polar bear>lion+giraffe<zebra",
    "Which of these animals lives in a desert habitat?=camel>dolphin+tiger<penguin",

    );

} elseif ($grd == 4) {

    // Grade 4 — habitat labels + animal pairs (24 + 2 new = 26)
    $questions=array(

    "Which of the following refers to the habitat labelled as 'A' in the picture?=polar>desert+grassland<forest**ac-habitats6.jpg",
    "Which of the following refers to the habitat labelled as 'B' in the picture?=desert>forest+grassland<polar**ac-habitats6.jpg",
    "Which of the following refers to the habitat labelled as 'C' in the picture?=ocean>river+lake<stream**ac-habitats6.jpg",
    "Which of the following refers to the habitat labelled as 'D' in the picture?=grassland>forest+desert<polar**ac-habitats6.jpg",
    "Which of the following refers to the habitat labelled as 'E' in the picture?=forest>desert+grassland<polar**ac-habitats6.jpg",
    "Which of the following refers to the habitat labelled as 'F' in the picture?=lake>ocean+polar<sea**ac-habitats6.jpg",
    "Which of the following refers to the habitat labelled as 'A' in the picture?=mountain>desert+grassland<polar**ac-habitats7.jpg",
    "Which of the following refers to the habitat labelled as 'B' in the picture?=ocean>river+lake<stream**ac-habitats7.jpg",
    "Which of the following refers to the habitat labelled as 'C' in the picture?=grassland>forest+desert<polar**ac-habitats7.jpg",
    "Which of the following refers to the habitat labelled as 'D' in the picture?=river>ocean+desert<sea**ac-habitats7.jpg",
    "Which of the following refers to the habitat labelled as 'E' in the picture?=polar>desert+grassland<forest**ac-habitats7.jpg",
    "Which of the following refers to the habitat labelled as 'F' in the picture?=forest>desert+grassland<polar**ac-habitats7.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'A' in the picture?=polar bear and snowy owl>whale and octopus+polar bear and giraffe<snowy owl and hyena**ac-habitats6.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'B' in the picture?=snake and scorpion>snake and polar bear+scorpion and lobster<spider and eel**ac-habitats6.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'C' in the picture?=starfish and clownfish>starfish and goldfish+clownfish and termite<sea turtle and scorpion**ac-habitats6.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'D' in the picture?=giraffe and zebra>giraffe and seal+zebra and penguin<lion and walrus**ac-habitats6.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'E' in the picture?=monkey and snake>monkey and walrus+snake and dolphin<ape and penguin**ac-habitats6.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'F' in the picture?=carp and tilapia>carp and whale+tilapia and shark<catfish and starfish**ac-habitats6.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'A' in the picture?=mountain goat and Alpine ibex>mountain goat and walrus+Alpine ibex and giraffe<mountain lion and polar bear**ac-habitats7.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'B' in the picture?=squid and octopus>squid and goldfish+octopus and scorpion<whale and aphid**ac-habitats7.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'C' in the picture?=cheetah and hyena>cheetah and porpoise+hyena and manatee<lion and walrus**ac-habitats7.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'D' in the picture?=catfish and turtle>catfish and starfish+turtle and squid<carp and octopus**ac-habitats7.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'E' in the picture?=penguin and reindeer>penguin and zebra+reindeer and giraffe<polar bear and hippopotamus**ac-habitats7.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'F' in the picture?=gorilla and snake>gorilla and dugong+snake and manatee<jaguar and walrus**ac-habitats7.jpg",

    // New text-only habitat questions
    "Which of these animals lives in an ocean habitat?=shark>lion+giraffe<camel",
    "Which of these animals lives in a grassland habitat?=zebra>shark+polar bear<crocodile",

    );

} elseif ($grd == 5) {

    // Grade 5 — habitat labels + animal pairs (24 + 2 new = 26)
    $questions=array(

    "Which of the following refers to the habitat labelled as 'A' in the picture?=polar>desert+grassland<forest**ac-habitats8.jpg",
    "Which of the following refers to the habitat labelled as 'B' in the picture?=desert>forest+grassland<polar**ac-habitats8.jpg",
    "Which of the following refers to the habitat labelled as 'C' in the picture?=ocean>river+lake<stream**ac-habitats8.jpg",
    "Which of the following refers to the habitat labelled as 'D' in the picture?=grassland>forest+desert<polar**ac-habitats8.jpg",
    "Which of the following refers to the habitat labelled as 'E' in the picture?=forest>desert+grassland<polar**ac-habitats8.jpg",
    "Which of the following refers to the habitat labelled as 'F' in the picture?=lake>ocean+polar<sea**ac-habitats8.jpg",
    "Which of the following refers to the habitat labelled as 'A' in the picture?=mountain>desert+grassland<polar**ac-habitats9.jpg",
    "Which of the following refers to the habitat labelled as 'B' in the picture?=ocean>river+lake<stream**ac-habitats9.jpg",
    "Which of the following refers to the habitat labelled as 'C' in the picture?=grassland>forest+desert<polar**ac-habitats9.jpg",
    "Which of the following refers to the habitat labelled as 'D' in the picture?=river>ocean+desert<sea**ac-habitats9.jpg",
    "Which of the following refers to the habitat labelled as 'E' in the picture?=polar>desert+grassland<forest**ac-habitats9.jpg",
    "Which of the following refers to the habitat labelled as 'F' in the picture?=forest>desert+grassland<polar**ac-habitats9.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'A' in the picture?=polar bear and snowy owl>whale and octopus+polar bear and giraffe<snowy owl and hyena**ac-habitats8.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'B' in the picture?=snake and scorpion>snake and polar bear+scorpion and lobster<spider and eel**ac-habitats8.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'C' in the picture?=starfish and clownfish>starfish and goldfish+clownfish and termite<sea turtle and scorpion**ac-habitats8.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'D' in the picture?=giraffe and zebra>giraffe and seal+zebra and penguin<lion and walrus**ac-habitats8.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'E' in the picture?=monkey and snake>monkey and walrus+snake and dolphin<ape and penguin**ac-habitats8.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'F' in the picture?=carp and tilapia>carp and whale+tilapia and shark<catfish and starfish**ac-habitats8.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'A' in the picture?=mountain goat and Alpine ibex>mountain goat and walrus+Alpine ibex and giraffe<mountain lion and polar bear**ac-habitats9.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'B' in the picture?=squid and octopus>squid and goldfish+octopus and scorpion<whale and aphid**ac-habitats9.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'C' in the picture?=cheetah and hyena>cheetah and porpoise+hyena and manatee<lion and walrus**ac-habitats9.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'D' in the picture?=catfish and turtle>catfish and starfish+turtle and squid<carp and octopus**ac-habitats9.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'E' in the picture?=penguin and reindeer>penguin and zebra+reindeer and giraffe<polar bear and hippopotamus**ac-habitats9.jpg",
    "Which pair of animals is most likely to be found in the habitat labelled as 'F' in the picture?=gorilla and snake>gorilla and dugong+snake and manatee<jaguar and walrus**ac-habitats9.jpg",

    // New text-only habitat questions
    "Which of these animals lives in a forest habitat?=monkey>polar bear+camel<dolphin",
    "Which of these animals lives in a river habitat?=catfish>polar bear+lion<camel",

    );

} else { // grd >= 6

    // Grade 6+ — habitat-type and classification questions (24 + 2 new = 26)
    $questions=array(

    "An animal that lives part of its life on land and part of it in water is called what?=amphibian>reptile+aquatic<terrestrial",
    "Whales, sharks, rays, octopi, and squids are ____ animals.=marine>freshwater+terrestrial<amphibious",
    "Oysters, mussels, clams, lobsters, and corals are ____ animals.=marine>freshwater+terrestrial<amphibious",
    "Manatees, dolphins, and porpoises are ____ animals.=marine>freshwater+terrestrial<amphibious",
    "Carps, tilapia, mudfish, and common catfish are ____ animals.=freshwater>marine+terrestrial<amphibious",
    "Goldfish, guppies, mollies, and arowanas are ____ animals.=freshwater>marine+terrestrial<amphibious",
    "Sea turtles, sea anemones, and sea horses are ____ animals.=marine>freshwater+terrestrial<amphibious",
    "Sea stars, sea urchins, and sea cucumbers are ____ animals.=marine>freshwater+terrestrial<amphibious",
    "African lions, cheetahs, and elephants are ____ animals.=grassland>mountain+polar<desert",
    "African wild dogs, giraffes, zebras, and cheetahs are ____ animals.=grassland>mountain+polar<desert",
    "Scorpions, sidewinders, Fennec foxes, kangaroo rats, and sand cats are ____ animals.=desert>rainforest+polar<mountain",
    "The animals labelled as 'A' in the picture shown live in which type of habitat?=terrestrial and polar>aquatic and polar+terrestrial and forest<terrestrial and desert**ac-habitats10.jpg",
    "The animals labelled as 'B' in the picture shown live in which type of habitat?=mountain>forest+desert<grassland**ac-habitats10.jpg",
    "The animals labelled as 'C' in the picture shown live in which type of habitat?=mountain>forest+desert<grassland**ac-habitats10.jpg",
    "The animals labelled as 'D' in the picture shown live in which type of habitat?=aquatic and polar>terrestrial and polar+aquatic and tropical<terrestrial and tropical**ac-habitats10.jpg",
    "The animals labelled as 'A' in the picture shown are called ____ animals.=polar>alpine+arboreal<amphibious**ac-habitats11.jpg",
    "The animals labelled as 'B' in the picture shown are called ____ animals.=amphibious>alpine+arboreal<polar**ac-habitats11.jpg",
    "The animals labelled as 'C' in the picture shown are called ____ animals.=arboreal>alpine+fossorial<subterranean**ac-habitats11.jpg",
    "The animals labelled as 'D' in the picture shown are called ____ animals.=fossorial>alpine+arboreal<polar**ac-habitats11.jpg",
    "Jaguars, sloths, and orangutans are ____ animals.=forest>grassland+polar<desert",
    "Poison dart frogs, squirrel monkeys, toucans, and anacondas are ____ animals.=forest>grassland+polar<desert",
    "Philippine animals such as the tamaraw, Philippine eagle, tarsier, and Palawan bearcat are ____ animals.=forest>grassland+polar<desert",
    "All of the following are grassland animals except which one?=caiman>ostrich+prairie dog<bison",
    "All of the following are desert animals except which one?=platypus>gila monster+camel<roadrunner",

    // New text-only habitat questions
    "Which of these habitats is characterized by very low temperatures and ice?=polar>desert+grassland<forest",
    "Which of these habitats is characterized by tall trees and dense vegetation?=forest>desert+grassland<polar",

    );
}
?>

</head>

</body>

</html>