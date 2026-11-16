<html>

<head>
<body>

<?php
$_SESSION['title']="Body Coverings of Animals";

if ($grd <= 0) {

    // Grade 0 — merged mc[0]+mc[1], tf[0]+tf[1]
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ — picture identification &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "What is this body covering?=fur>scales+feathers<shell**acbc01.jpg",
    "What is this body covering?=fur>scales+feathers<shell**acbc02.jpg",
    "What is this body covering?=fur>scales+feathers<shell**acbc03.jpg",
    "What is this body covering?=feathers>fur+scales<shell**acbc06.jpg",
    "What is this body covering?=feathers>fur+scales<shell**acbc16.jpg",
    "What is this body covering?=feathers>fur+scales<shell**acbc17.jpg",
    "What is this body covering?=feathers>fur+scales<shell**acbc08.jpg",
    "What is this body covering?=scales>fur+feathers<shell**acbc11.jpg",
    "What is this body covering?=scales>fur+feathers<shell**acbc12.jpg",
    "What is this body covering?=scales>fur+feathers<shell**acbc13.jpg",
    "What is this body covering?=skin>fur+feathers<scales**acbc23.jpg",
    "What is this body covering?=skin>fur+feathers<scales**acbc24.jpg",
    "What is this body covering?=skin>fur+feathers<scales**acbc25.jpg",
    "What is this body covering?=skin>fur+feathers<scales**acbc26.jpg",
    "Which body covering is in this picture?=hair or fur>scales+feathers<shell**acbc21.jpg",
    "Which body covering is in this picture?=hair or fur>scales+feathers<shell**acbc22.jpg",
    "Which body covering is in this picture?=feathers>hair or fur+scales<shell**acbc07.jpg",
    "Which body covering is in this picture?=feathers>hair or fur+scales<shell**acbc18.jpg",
    "Which body covering is in this picture?=scales>hair or fur+feathers<shell**acbc14.jpg",
    "Which body covering is in this picture?=scales>hair or fur+feathers<shell**acbc15.jpg",

    // &#9472;&#9472;&#9472; MCQ — animal identification (text-based) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which animal has feathers?=bird>dog+cat<cow",
    "Which animal has scales?=fish>dog+cat<cow",
    "Which animal has scales?=snake>dog+cat<cow",
    "Which animal has a shell?=turtle>dog+cat<cow",
    "Which animal has a shell?=snail>dog+cat<cow",
    "Which animal has a shell?=crab>dog+cat<cow",
    "Which animal has hair or fur?=lion>bird+fish<snake",
    "Which animal has hair or fur?=bear>bird+fish<snake",
    "Which animal has hair or fur?=fox>bird+fish<snake",
    "Which animal has hair or fur?=monkey>bird+fish<snake",

    // &#9472;&#9472;&#9472; MCQ — animal picture &#8594; body covering &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The body of this animal is covered with what?=feathers>hair or fur+scales<shell**ac-bird1.jpg",
    "The body of this animal is covered with what?=feathers>hair or fur+scales<shell**ac-bird7.jpg",
    "What is the body covering of this animal?=feathers>hair or fur+scales<shell**ac-bird9.jpg",
    "What is the body covering of this animal?=feathers>hair or fur+scales<shell**ac-birda.jpg",
    "What is the body covering of this animal?=feathers>hair or fur+scales<shell**ac-birdb.jpg",
    "The body of this animal is covered with what?=scales>hair or fur+feathers<shell**ac-fish1.jpg",
    "The body of this animal is covered with what?=scales>hair or fur+feathers<shell**ac-fish5.jpg",
    "The body of this animal is covered with ____.=scales>hair or fur+feathers<shell**ac-fish8.jpg",
    "What is the body covering of this animal?=scales>hair or fur+feathers<shell**ac-fish9.jpg",
    "What is the body covering of this animal?=scales>hair or fur+feathers<shell**ac-fisha.jpg",
    "The body of this animal is covered with what?=hair or fur>scales+feathers<shell**ac-mammal1.jpg",
    "The body of this animal is covered with ____.=hair or fur>scales+feathers<shell**ac-mammal2.jpg",
    "What is the body covering of this animal?=hair or fur>scales+feathers<shell**ac-mammal3.jpg",
    "What is the body covering of this animal?=hair or fur>scales+feathers<shell**ac-mammala.jpg",
    "What is the body covering of this animal?=skin>hair or fur+scales<feathers**ac-amphibian3.jpg",
    "What is the body covering of this animal?=skin>hair or fur+scales<feathers**ac-amphibian6.jpg",
    "The body of this animal is covered with what?=skin>hair or fur+scales<feathers**ac-amphibian5.jpg",
    "The body of this animal is covered with what?=skin>hair or fur+scales<feathers**ac-amphibian7.jpg",

    // &#9472;&#9472;&#9472; MCQ — animal class &#8594; body covering (fill-in) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which of these have a body covering of fur?=bears>ducks+geese<parrots",
    "Which of these have sparse hair on their thick skin?=elephants>crabs+clams<bees",
    "Which of these have a body covering of fur?=wolves>carps+worms<ducks",
    "Which of these have a body covering of feathers?=parrots>donkeys+lions<tigers",
    "Which of these have a body covering of feathers?=swans>elephants+snakes<spiders",
    "Which of these have a body covering of feathers?=geese>wolves+ants<crabs",
    "Which of these have a body covering of scales?=carps>donkeys+lions<tigers",
    "Which of these have a body covering of scales?=snakes>geese+monkeys<wolves",
    "Which of these have smooth, moist skin without scales or fur?=frogs>donkeys+lions<alligators",
    "Which of these have soft skin without fur, feathers, or scales?=earthworms>geese+monkeys<parrots",

    // &#9472;&#9472;&#9472; T/F — balanced 12T/12F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "This is fur.=true>false**acbc04.jpg",
    "These are scales.=false>true**acbc05.jpg",
    "These are feathers.=true>false**acbc09.jpg",
    "These are scales.=false>true**acbc10.jpg",
    "These are scales.=true>false**acbc14.jpg",
    "These are feathers.=false>true**acbc15.jpg",
    "This is a shell.=true>false**acbc20.jpg",
    "Owls have fur.=false>true",
    "Doves have feathers.=true>false",
    "Lions have feathers.=false>true",
    "Zebras have fur.=true>false",
    "Sharks have feathers.=false>true",
    "The body of a fish is covered with scales.=true>false",
    "The body of a bird is covered with fur.=false>true",
    "The body of this animal is covered with feathers.=true>false**ac-birda.jpg",
    "The body of this animal is covered with scales.=false>true**ac-bird9.jpg",
    "An animal that has feathers is a bird.=true>false",
    "An animal that has hair or fur is an insect.=false>true",
    "A mammal's body is covered with hair or fur.=true>false",
    "Not all birds have feathers.=false>true",
    "Eagles and hawks have feathers.=true>false",
    "Goldfish and guppies have feathers.=false>true",
    "Apes and monkeys have fur.=true>false",
    "A canary is an animal with fur.=false>true",

    );

} elseif ($grd == 1) {

    // Grade 1 — merged mc[1]+mc[2], tf[1]+tf[2]
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ — picture identification &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which body covering is in this picture?=hair or fur>scales+feathers<shell**acbc21.jpg",
    "Which body covering is in this picture?=hair or fur>scales+feathers<shell**acbc22.jpg",
    "Which body covering is in this picture?=feathers>hair or fur+scales<shell**acbc07.jpg",
    "Which body covering is in this picture?=feathers>hair or fur+scales<shell**acbc18.jpg",
    "Which body covering is in this picture?=scales>hair or fur+feathers<shell**acbc14.jpg",
    "Which body covering is in this picture?=scales>hair or fur+feathers<shell**acbc15.jpg",
    "The body covering shown in this picture is called what?=hair or fur>scales+feathers<shell**acbc01.jpg",

    // &#9472;&#9472;&#9472; MCQ — animal picture &#8594; body covering &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The body of this animal is covered with what?=feathers>hair or fur+scales<shell**ac-bird1.jpg",
    "The body of this animal is covered with what?=feathers>hair or fur+scales<shell**ac-bird7.jpg",
    "What is the body covering of this animal?=feathers>hair or fur+scales<shell**ac-bird9.jpg",
    "What is the body covering of this animal?=feathers>hair or fur+scales<shell**ac-birda.jpg",
    "What is the body covering of this animal?=feathers>hair or fur+scales<shell**ac-birdb.jpg",
    "The body of this animal is covered with what?=scales>hair or fur+feathers<shell**ac-fish1.jpg",
    "The body of this animal is covered with what?=scales>hair or fur+feathers<shell**ac-fish5.jpg",
    "The body of this animal is covered with ____.=scales>hair or fur+feathers<shell**ac-fish8.jpg",
    "What is the body covering of this animal?=scales>hair or fur+feathers<shell**ac-fish9.jpg",
    "What is the body covering of this animal?=scales>hair or fur+feathers<shell**ac-fisha.jpg",
    "The body of this animal is covered with what?=hair or fur>scales+feathers<shell**ac-mammal1.jpg",
    "The body of this animal is covered with ____.=hair or fur>scales+feathers<shell**ac-mammal2.jpg",
    "What is the body covering of this animal?=hair or fur>scales+feathers<shell**ac-mammal3.jpg",
    "What is the body covering of this animal?=hair or fur>scales+feathers<shell**ac-mammala.jpg",
    "What is the body covering of this animal?=skin>hair or fur+scales<feathers**ac-amphibian3.jpg",
    "What is the body covering of this animal?=skin>hair or fur+scales<feathers**ac-amphibian6.jpg",
    "The body of this animal is covered with what?=skin>hair or fur+scales<feathers**ac-amphibian5.jpg",
    "The body of this animal is covered with what?=skin>hair or fur+scales<feathers**ac-amphibian7.jpg",

    // &#9472;&#9472;&#9472; MCQ — class &#8594; body covering (fill-in) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "Which of these have a body covering of fur?=bears>ducks+geese<parrots",
    "Which of these have sparse hair on their thick skin?=elephants>crabs+clams<bees",
    "Which of these have a body covering of fur?=wolves>carps+worms<ducks",
    "Which of these have a body covering of feathers?=parrots>donkeys+lions<tigers",
    "Which of these have a body covering of feathers?=swans>elephants+snakes<spiders",
    "Which of these have a body covering of feathers?=geese>wolves+ants<crabs",
    "Which of these have a body covering of scales?=carps>donkeys+lions<tigers",
    "Which of these have a body covering of scales?=snakes>geese+monkeys<wolves",
    "Which of these have smooth, moist skin without scales or fur?=frogs>donkeys+lions<turtles",
    "Which of these have soft skin without fur, feathers, or scales?=earthworms>geese+monkeys<parrots",

    // &#9472;&#9472;&#9472; MCQ — class identification from picture (mc[2]) &#9472;&#9472;&#9472;&#9472;
    "What do you call the body covering of the animal in this picture?=feathers>hair or fur+scales<shell**ac-bird2.jpg",
    "The body covering of this animal is called what?=feathers>hair or fur+scales<shell**ac-bird4.jpg",
    "The body covering of this animal is called what?=feathers>hair or fur+scales<shell**ac-bird8.jpg",
    "The body covering of the animal in this picture is called what?=scales>hair or fur+feathers<shell**ac-fish2.jpg",
    "The body covering of the animal in this picture is called what?=scales>hair or fur+feathers<shell**ac-fish4.jpg",
    "What is the body covering of the animal in this picture?=scales>hair or fur+feathers<shell**ac-fish6.jpg",
    "What is the body covering of the animal in this picture?=scales>hair or fur+feathers<shell**ac-fish7.jpg",
    "What do you call the body covering of the animal in this picture?=hair or fur>scales+feathers<shell**ac-mammal7.jpg",
    "The body covering of the animal in this picture is called what?=hair or fur>scales+feathers<shell**ac-mammal8.jpg",
    "The body covering of the animal in this picture is called ____.=hair or fur>scales+feathers<shell**ac-mammal9.jpg",

    // &#9472;&#9472;&#9472; MCQ — concept identification &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The body of a mammal is covered with what?=hair or fur>scales+feathers<shell",
    "The small, flat, and shiny pieces that cover the body of a fish are called ____.=scales>hair or fur+feathers<shell",
    "A human is a ____ because its body is covered with hair.=mammal>bird+reptile<amphibian",
    "Your pet cat is a ____ because its body is covered with fur.=mammal>bird+reptile<amphibian",
    "Which animal has smooth, moist skin without scales, fur, or feathers?=frog>crocodile+cheetah<eagle",
    "Which animal has mostly smooth skin without a thick coat of fur?=whale>crocodile+cheetah<eagle",

    // &#9472;&#9472;&#9472; T/F — balanced 11T/10F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The body of a fish is covered with scales.=true>false",
    "The body of a bird is covered with fur.=false>true",
    "The body of this animal is covered with feathers.=true>false**ac-birda.jpg",
    "The body of this animal is covered with scales.=false>true**ac-bird9.jpg",
    "An animal that has feathers is a bird.=true>false",
    "An animal that has hair or fur is an insect.=false>true",
    "A mammal's body is covered with hair or fur.=true>false",
    "Not all birds have feathers.=false>true",
    "Eagles and hawks have feathers.=true>false",
    "Goldfish and guppies have feathers.=false>true",
    "Apes and monkeys have fur.=true>false",
    "A canary is an animal with fur.=false>true",
    "If someone's pet has feathers, then it must be a bird.=true>false",
    "An animal with a body covering of hair or fur is a reptile.=false>true",
    "An animal is a mammal if its body is covered with hair or fur.=true>false",
    "Some birds have a body covering of fur instead of feathers.=false>true",
    "Snakes are reptiles so their bodies are covered with scales.=true>false",
    "Turtles already have a shell so they don't have scales.=false>true",
    "Aside from turtles and tortoises, many other animals have a shell.=true>false",
    "The body covering of the animal in this picture is a shell.=true>false**ac-mollusk6.jpg",
    "Bats can fly so they have a body covering of feathers.=false>true",

    );

} else { // grd >= 2

    // Grade 2+ — merged mc[2]+mc[3], tf[2]+tf[3]
    $questions=array(

    // &#9472;&#9472;&#9472; MCQ — picture identification &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The body covering shown in this picture is called what?=hair or fur>scales+feathers<shell**acbc01.jpg",
    "What do you call the body covering of the animal in this picture?=feathers>hair or fur+scales<shell**ac-bird2.jpg",
    "The body covering of this animal is called what?=feathers>hair or fur+scales<shell**ac-bird4.jpg",
    "The body covering of this animal is called what?=feathers>hair or fur+scales<shell**ac-bird8.jpg",
    "The body covering of the animal in this picture is called what?=scales>hair or fur+feathers<shell**ac-fish2.jpg",
    "The body covering of the animal in this picture is called what?=scales>hair or fur+feathers<shell**ac-fish4.jpg",
    "What is the body covering of the animal in this picture?=scales>hair or fur+feathers<shell**ac-fish6.jpg",
    "What is the body covering of the animal in this picture?=scales>hair or fur+feathers<shell**ac-fish7.jpg",
    "What do you call the body covering of the animal in this picture?=hair or fur>scales+feathers<shell**ac-mammal7.jpg",
    "The body covering of the animal in this picture is called what?=hair or fur>scales+feathers<shell**ac-mammal8.jpg",
    "The body covering of the animal in this picture is called ____.=hair or fur>scales+feathers<shell**ac-mammal9.jpg",

    // &#9472;&#9472;&#9472; MCQ — advanced picture identification (mc[3]) &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "The bodies of owls and penguins are covered with what?=feathers>hair or fur+scales<shell",
    "What do you call the body covering of the animal in the picture?=feathers>hair or fur+scales<shell**ac-bird3.jpg",
    "The body of this animal is covered with what?=feathers>hair or fur+scales<shell**ac-bird5.jpg",
    "The body covering of the animal in the picture is called what?=feathers>hair or fur+scales<shell**ac-bird6.jpg",
    "The body covering of the animal in the picture is called what?=scales>hair or fur+feathers<shell**ac-fish3.jpg",
    "What do you call the body covering of the animal in the picture?=scales>hair or fur+feathers<shell**ac-fishb.jpg",
    "What do you call the body covering of the animal in the picture?=hair or fur>scales+feathers<shell**ac-mammal4.jpg",
    "The body covering of the animal in the picture is called what?=hair or fur>scales+feathers<shell**ac-mammal6.jpg",
    "The body covering of the animal in the picture is called ____.=hair or fur>scales+feathers<shell**ac-mammalb.jpg",

    // &#9472;&#9472;&#9472; MCQ — concept identification &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "They protect the body of a fish from its surroundings. What are they?=scales>hair or fur+feathers<shell",
    "What you see in this picture is the body covering of a ____.=snake>fish+crocodile<iguana**acbc13.jpg",
    "What you see in this picture are feathers of a ____.=flamingo>crow+kiwi<peacock**acbc16.jpg",
    "What you see in this picture are feathers of a ____.=crow>kiwi+flamingo<peacock**acbc17.jpg",
    "What you see in this picture are feathers of which bird?=peacock>crow+kiwi<flamingo**acbc08.jpg",
    "Which mammal is protected by special hairs that look like spines?=porcupine>beaver+koala<walrus",
    "Which mammal has most of its body covered with overlapping scales?=pangolin>beaver+koala<walrus",
    "Which animal has smooth, moist skin without scales, fur, or feathers?=newt>leopard+otter<vulture",
    "Which animal has mostly smooth skin without a thick coat of fur?=dolphin>leopard+otter<vulture",
    "The body of a mammal is covered with what?=hair or fur>scales+feathers<shell",
    "The small, flat, and shiny pieces that cover the body of a fish are called ____.=scales>hair or fur+feathers<shell",
    "A human is a ____ because its body is covered with hair.=mammal>bird+reptile<amphibian",
    "Your pet cat is a ____ because its body is covered with fur.=mammal>bird+reptile<amphibian",

    // &#9472;&#9472;&#9472; T/F — balanced 10T/9F &#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;
    "If someone's pet has feathers, then it must be a bird.=true>false",
    "An animal with a body covering of hair or fur is a reptile.=false>true",
    "An animal is a mammal if its body is covered with hair or fur.=true>false",
    "Some birds have a body covering of fur instead of feathers.=false>true",
    "Snakes are reptiles so their bodies are covered with scales.=true>false",
    "Turtles already have a shell so they don't have scales.=false>true",
    "Aside from turtles and tortoises, many other animals have a shell.=true>false",
    "The body covering of the animal in this picture is fur.=false>true**ac-mollusk6.jpg",
    "Like other mammals, bats have a body covering of fur.=true>false",
    "If an animal's body is covered with scales, then it can only be a fish.=false>true",
    "If an animal has feathers, then it is a bird so it also lays eggs.=true>false",
    "The body covering of all birds consists of fur.=false>true",
    "Among living animals, birds are the only ones with feathers.=true>false",
    "Scales are organs behind the head of a fish that allow the fish to breathe.=false>true",
    "A human being is a mammal because its body is covered with hair.=true>false",
    "The small, flat, and shiny pieces that cover the body of a fish are called 'fins'.=false>true",
    "What you see in this picture are scales of a fish.=true>false**acbc12.jpg",
    "The body covering in this picture belongs to an amphibian.=false>true**acbc19.jpg",
    "The animal in this picture has mostly smooth skin rather than a thick coat of fur.=true>false**ac-mammal5.jpg",

    );
}
?>

</head>

</body>

</html>