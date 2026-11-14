<html>

<head>
<body>

<?php
$_SESSION['title']="Identifying Animals";

if ($grd <= 1) {

    // Grade 0–1: common animals — 22 picture questions + 3 text-only = 25
    $questions=array(

    // &#9472;&#9472;&#9472; Picture questions &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What's the name of the animal in this picture?=bear>camel+fox<lion**zoo-006.jpg",
    "The animal in this picture is called what?=fox>bear+camel<lion**zoo-017.jpg",
    "Name the animal in this picture.=lion>bear+camel<fox**zoo-027.jpg",
    "Name the animal in this picture.=tiger>bear+camel+fox<lion**ac-mammala.jpg",
    "What's the name of the animal in this picture?=camel>deer+elephant<giraffe**zoo-008.jpg",
    "Name the animal in this picture.=deer>camel+elephant<giraffe**zoo-013.jpg",
    "What's the name of the animal in this picture?=elephant>camel+deer<giraffe**zoo-015.jpg",
    "What do you call the animal in this picture?=giraffe>camel+deer<elephant**zoo-019.jpg",
    "The animal in this picture is called what?=zebra>camel+deer<elephant**zoo-044.jpg",
    "The animal in this picture is called what?=monkey>bear+camel<giraffe**zoo-030.jpg",
    "Name the animal in this picture.=eagle>camel+elephant<ostrich**zoo-014.jpg",
    "Name the animal in this picture.=ostrich>camel+eagle<elephant**zoo-032.jpg",
    "What's the name of the animal in this picture?=shark>crocodile+snake<turtle**zoo-039.jpg",
    "What do you call the animal in this picture?=snake>crocodile+shark<turtle**zoo-040.jpg",
    "What do you call the animal in this picture?=turtle>crocodile+shark<snake**zoo-041.jpg",
    "Name the animal in this picture.=whale>crocodile+shark<snake**zoo-042.jpg",
    "What do you call the animal in this picture?=crocodile>shark+snake<turtle**zoo-012.jpg",
    "The picture shows the young of which animal?=chicken>duck+eagle<ostrich**young1.jpg",
    "The picture shows the young of which animal?=duck>chicken+eagle<ostrich**young2.jpg",
    "The picture shows the young of which animal?=frog>fish+snail<worm**young3.jpg",
    "The picture shows the young of which animal?=cat>dog+horse<cow**young4.jpg",
    "The picture shows the young of which animal?=cow>dog+cat<horse**young5.jpg",

    // &#9472;&#9472;&#9472; Text-only questions &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which animal has fur and sharp claws?=cat>elephant+chicken<toad",
    "Which animal has a very long neck and eats leaves from tall trees?=giraffe>camel+zebra<elephant",
    "Which animal has a big trunk and big ears?=elephant>giraffe+zebra<lion",

    );

} elseif ($grd <= 3) {

    // Grade 2–3: less common animals — 17 picture questions + 8 text-only = 25
    $questions=array(

    // &#9472;&#9472;&#9472; Picture questions &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What's the name of the animal in this picture?=alligator>iguana+chameleon<salamander**zoo-002.jpg",
    "The animal in this picture is called what?=iguana>alligator+chameleon<salamander**zoo-022.jpg",
    "The animal in this picture is called what?=bison>elk+hippopotamus<kangaroo**zoo-007.jpg",
    "What's the name of the animal in this picture?=elk>bison+hippopotamus<kangaroo**zoo-016.jpg",
    "Name the animal in this picture.=gazelle>bison+elk<hippopotamus**zoo-018.jpg",
    "Name the animal in this picture.=hippopotamus>bison+elk<kangaroo**zoo-020.jpg",
    "Name the animal in this picture.=kangaroo>bison+elk<hippopotamus**zoo-025.jpg",
    "What do you call the animal in this picture?=moose>bison+elk<hippopotamus**zoo-031.jpg",
    "Name the animal in this picture.=rhinoceros>bison+elk<hippopotamus**zoo-038.jpg",
    "What's the name of the animal in this picture?=cheetah>jackal+jaguar<leopard**zoo-011.jpg",
    "Name the animal in this picture.=hyena>cheetah+jackal<jaguar**zoo-021.jpg",
    "What do you call the animal in this picture?=jackal>cheetah+jaguar<leopard**zoo-023.jpg",
    "The animal in this picture is called what?=jaguar>cheetah+jackal<leopard**zoo-024.jpg",
    "What do you call the animal in this picture?=leopard>cheetah+jackal<jaguar**zoo-026.jpg",
    "The animal in this picture is called what?=penguin>badger+otter<porcupine**zoo-034.jpg",
    "The animal in this picture is called what?=porcupine>badger+otter<penguin**zoo-036.jpg",
    "What do you call the animal in this picture?=raccoon>badger+otter<penguin**zoo-037.jpg",

    // &#9472;&#9472;&#9472; Text-only questions &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which animal carries its young in a pouch on its belly?=kangaroo>bison+elk<hippopotamus",
    "Which animal is the fastest land animal?=cheetah>leopard+jaguar<hyena",
    "Which animal has one or two horns on its snout?=rhinoceros>bison+elk<hippopotamus",
    "Which bird has black and white feathers and swims in cold water?=penguin>raccoon+skunk<porcupine",
    "Which animal has sharp quills on its back for defense?=porcupine>badger+otter<skunk",
    "Which animal has a black mask on its face and is active at night?=raccoon>badger+otter<porcupine",
    "Which animal has thick fur and webbed feet and swims in rivers?=otter>badger+raccoon<porcupine",
    "Which animal can change its skin color to hide?=chameleon>iguana+salamander<alligator",

    );

} else {

    // Grade 4+: rare animals — 11 picture questions + 14 text-only = 25
    $questions=array(

    // &#9472;&#9472;&#9472; Picture questions &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Name the animal in this picture.=aardvark>anteater+armadillo<badger**zoo-001.jpg",
    "Name the animal in this picture.=anteater>aardvark+armadillo<badger**zoo-003.jpg",
    "What's the name of the animal in this picture?=armadillo>aardvark+anteater<badger**zoo-004.jpg",
    "Name the animal in this picture.=badger>aardvark+anteater<armadillo**zoo-005.jpg",
    "What's the name of the animal in this picture?=capybara>aardvark+anteater<armadillo**zoo-009.jpg",
    "The animal in this picture is called what?=meerkat>aardvark+anteater<armadillo**zoo-028.jpg",
    "The animal in this picture is called what?=mongoose>aardvark+anteater<armadillo**zoo-029.jpg",
    "Name the animal in this picture.=otter>aardvark+anteater<armadillo**zoo-033.jpg",
    "What do you call the animal in this picture?=platypus>aardvark+anteater<armadillo**zoo-035.jpg",
    "What's the name of the animal in this picture?=chameleon>alligator+iguana<salamander**zoo-010.jpg",
    "What do you call the animal in this picture?=wildebeest>bison+gazelle<elk**zoo-043.jpg",

    // &#9472;&#9472;&#9472; Text-only questions &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which animal has a long snout, big ears, and eats ants at night?=aardvark>anteater+armadillo<badger",
    "Which animal has a long sticky tongue and no teeth?=anteater>aardvark+armadillo<badger",
    "Which animal is the largest rodent in the world?=capybara>aardvark+armadillo<badger",
    "Which animal stands upright on its hind legs and watches for danger?=meerkat>mongoose+otter<badger",
    "Which animal is famous for killing cobras and other snakes?=mongoose>meerkat+otter<badger",
    "Which animal has a duck-like bill and lays eggs?=platypus>otter+armadillo<badger",
    "Which animal rolls into a ball when it feels threatened?=armadillo>anteater+aardvark<badger",
    "Which animal can change its color to blend in with its surroundings?=chameleon>armadillo+badger<platypus",
    "Which animal migrates in huge herds across Africa's plains?=wildebeest>capybara+meerkat<mongoose",
    "Which animal has a long, streamlined body and swims in rivers to catch fish?=otter>badger+meerkat<mongoose",
    "Which animal digs long tunnels underground and hunts at night?=badger>meerkat+mongoose<otter",
    "Which animal's name means 'little armored one' in Spanish?=armadillo>aardvark+anteater<platypus",
    "Which animal is also known as the 'gnu'?=wildebeest>capybara+mongoose<meerkat",
    "Which animal is a mammal that lays eggs and lives in Australia?=platypus>otter+armadillo<badger",

    );
}
?>

</head>

</body>

</html>