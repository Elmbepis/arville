<html>

<head>
<body>

<?php
$_SESSION['title']="Animal Feeding and Behavior";

if ($grd <= 1) {

    // Grade 0–1 — merged mc[0]+mc[1], tf[0]+tf[1]
    $questions=array(

    //  Movement & feeding basics 
    "Birds and insects use their wings to ____.=fly>walk+swim<breathe",
    "Fishes use their gills to ____.=breathe>walk+swim<eat",
    "Fishes use their fins to ____.=swim>walk+fly<breathe",
    "Fishes move by ____.=swimming>walking+flying<hopping",
    "This animal moves by ____.=swimming>walking+flying<hopping**ac-fish8.jpg",
    "This animal moves by ____.=swimming>walking+flying<hopping**ac-fisha.jpg",
    "This animal moves mostly by ____.=flying>walking+swimming<hopping**ac-birdb.jpg",
    "This animal moves mostly by ____.=flying>walking+swimming<hopping**ac-birdc.jpg",
    "This animal moves mostly by ____.=hopping>walking+swimming<flying**ac-mammalc.jpg",
    "The animal in this picture moves by ____.=swimming>walking+flying<hopping**ac-mammal5.jpg",
    "The animal in this picture moves by ____.=swimming>walking+flying<hopping**ac-fish7.jpg",
    "The animal in this picture moves mostly by ____.=flying>walking+swimming<hopping**ac-bird2.jpg",
    "The animal in this picture moves mostly by ____.=flying>walking+swimming<hopping**ac-bird3.jpg",
    "The animal in this picture moves mostly by ____.=flying>walking+swimming<hopping**ac-mammal6.jpg",
    "The animal in this picture moves mostly by ____.=hopping>walking+swimming<flying**ac-marsupial1.jpg",

    //  Carnivores & herbivores 
    "Which of these only eats other animals?=lion>cow+horse<sheep",
    "Which of these only eats other animals?=tiger>cow+sheep<deer",
    "Which animal only eats other animals?=snake>horse+zebra<deer",
    "Which animal only eats other animals?=crocodile>sheep+cow<horse",
    "Which animal only eats other animals?=owl>deer+zebra<cow",
    "Which of these only eats plants?=horse>lion+tiger<snake",
    "Which of these only eats plants?=cow>lion+snake<crocodile",
    "Which animal only eats plants?=deer>tiger+owl<snake",
    "Which animal only eats plants?=sheep>lion+crocodile<tiger",
    "Which of these only eats plants?=zebra>owl+tiger<snake",
    "Which of these animals only eats other animals?=alligator>panda+giraffe<elephant",
    "Which animal only eats other animals?=jaguar>koala+elephant<zebra",
    "Which animal only eats other animals?=cheetah>zebra+panda<giraffe",
    "Which animal only eats other animals?=puma>koala+elephant<zebra",
    "Which of these animals only eats plants?=panda>lion+tiger<snake",
    "Which of these animals only eats plants?=elephant>crocodile+alligator<jaguar",
    "Which animal only eats plants?=giraffe>cheetah+puma<snake",
    "Which animal only eats plants?=koala>lion+jaguar<cheetah",

    //  Class identification 
    "What kind of animal feeds its young with milk?=mammal>bird+reptile<insect",
    "What kind of animal are dogs and cats?=mammal>bird+reptile<insect",

    //  T/F — balanced 8T/8F 
    "This animal is a frog, so it can not fly.=true>false**ac-amphibian4.jpg",
    "This animal can fly.=false>true**ac-fish2.jpg",
    "This animal is a fish. It moves by swimming.=true>false**ac-fish7.jpg",
    "A fish breathes through its fins.=false>true",
    "Birds use their wings to fly.=true>false",
    "Some birds do not lay eggs.=false>true",
    "Lions don't eat plants.=true>false",
    "Cows and horses also eat animals.=false>true",
    "A fish breathes through its gills.=true>false",
    "Birds and insects fly by flapping their feet.=false>true",
    "An animal that feeds its young with milk is a mammal.=true>false",
    "Mammals use their hearts to breathe.=false>true",
    "Some animals sleep during the day and are awake at night.=true>false",
    "All animals take care of their babies.=false>true",
    "All birds need to lay eggs in order to have babies.=true>false",
    "All animals need to feed on plants.=false>true",

    );

} elseif ($grd == 2) {

    // Grade 2 — merged mc[2]+mc[3], tf[2]+tf[3]
    $questions=array(

    //  Movement, breathing & camouflage 
    "The arrow in the picture above is pointing to a body part that is used for what?=swimming>eating+drinking<breathing**ac-fin2.jpg",
    "Gills are organs behind the head of a fish that are used for ____.=breathing>walking+swimming<flying",
    "Lungs are what mammals use for ____.=breathing>walking+swimming<flying",
    "The animal in the picture above moves by ____.=swimming>walking+flying<hopping**ac-fishb.jpg",
    "The animal in the picture above moves mostly by ____.=hopping>walking+swimming<flying**ac-marsupial2.jpg",
    "When the skin color of an animal is similar to the color its surroundings, the animal is trying to ___.=hide itself>comfort itself+feed itself<build a home",
    "An insect that looks like a leaf or a twig looks that way because it is trying to ___ from its enemies.=hide itself>comfort itself+feed itself<protect its young",
    "The stripes of a tiger help it ___ in tall grass so it can hunt its prey more easily.=hide itself>comfort itself+feed itself<build a home",

    //  Carnivores & herbivores 
    "Which of these animals only eats other animals?=eagle>hippopotamus+elephant<giraffe",
    "Which of these animals only eats other animals?=cobra>koala+rhinoceros<kangaroo",
    "Which of the following animals only eats other animals?=scorpion>elephant+giraffe<koala",
    "Which of the following animals only eats other animals?=cheetah>hippopotamus+koala<rhinoceros",
    "Which of the following animals only eats other animals?=leopard>giraffe+elephant<kangaroo",
    "Which of these animals only eats plants?=hippopotamus>hyena+cobra<crocodile",
    "Which of these animals only eats plants?=koala>alligator+jaguar<cheetah",
    "Which of the following animals only eats plants?=giraffe>leopard+scorpion<eagle",
    "Which of the following animals only eats plants?=rhinoceros>crocodile+jaguar<leopard",
    "Which of these animals only eats plants?=kangaroo>hyena+scorpion<eagle",

    //  Class identification 
    "A typical ____ has scales, breathes air using lungs, and lays eggs.=reptile>bird+mammal<insect",
    "A typical ____ has scales, breathes air using gills, and lives all its life in water.=fish>bird+mammal<insect",
    "A typical ____ is warm-blooded, lays eggs, and has feathers.=bird>mammal+reptile<insect",
    "Which kind of animal lives part of its life in water and part of it on land?=amphibian>bird+mammal<insect",

    //  Feeding classification 
    "What do you call an animal that only eats meat?=carnivore>herbivore+omnivore<vertebrate",
    "An animal that only eats plants is called what?=herbivore>carnivore+omnivore<invertebrate",
    "What do you call an animal that eats both plants and animals?=omnivore>carnivore+herbivore<prey",
    "A lion is a ____ because it only eats meat.=carnivore>herbivore+omnivore<predator",
    "An elephant is a ____ because it only eats plants.=herbivore>carnivore+omnivore<predator",
    "An animal being hunted for food is called what?=prey>predator+carnivore<herbivore",
    "What do you call an animal that hunts for food?=predator>prey+carnivore<decomposer",
    "When an animal hides by blending with its surroundings, it is using ____ to protect itself.=camouflage>migration+predation<metamorphosis",

    //  T/F — balanced 12T/12F 
    "All animals must eat other organisms (plants or animals) in order to live.=true>false",
    "Fish breathe underwater using lungs.=false>true",
    "Gills are organs behind the head of a fish that allows it to breathe.=true>false",
    "Fins are organs behind the head of a fish that allows it to breathe.=false>true",
    "Tarsiers and koalas live in trees.=true>false",
    "Race horses are the fastest land animals on earth.=false>true",
    "Some kinds of animals sleep during the day and are awake and active at night.=true>false",
    "All animals care for their young.=false>true",
    "Unlike plants, animals can not make their own food in their bodies so they need to eat.=true>false",
    "Among all animals, the male lion produces the loudest sound.=false>true",
    "The fleshy organs that fishes use for breathing are called 'gills'.=true>false",
    "A vent is a small hole in the neck of a fish or a bird that is used for breathing.=false>true",
    "A typical reptile would have scales and breathe air using lungs.=true>false",
    "Amphibians are warm-blooded animals.=false>true",
    "Reptiles breathe through lungs.=true>false",
    "The animal in this picture is a carnivore.=false>true**ac-carnivore1.jpg",
    "The animal in this picture is a herbivore.=true>false**ac-carnivore2.jpg",
    "The animal in this picture is a carnivore.=false>true**ac-herbivore1.jpg",
    "The animal in this picture is a herbivore.=true>false**ac-herbivore2.jpg",
    "The arrow in this picture is pointing to the predator.=false>true**ac-predator1.jpg",
    "The arrow in this picture is pointing to the predator.=true>false**ac-predator2.jpg",
    "The arrow in this picture is pointing to the prey.=false>true**ac-prey1.jpg",
    "The arrow in this picture is pointing to the prey.=true>false**ac-prey2.jpg",
    "An omnivore is an animal that only eats plants.=false>true",

    );

} elseif ($grd == 3) {

    // Grade 3 — merged mc[3]+mc[4], tf[3]+tf[4]
    $questions=array(

    //  Class identification 
    "A typical ____ is cold-blooded, has scales, breathes with lungs, and creeps or crawls on the ground.=reptile>bird+mammal<insect",
    "A typical ____ is covered with hair and feeds milk to its offspring.=mammal>bird+reptile<insect",
    "Which of these is an aquatic animal that has gills for breathing and fins for swimming?=fish>bird+mammal<amphibian",
    "A typical ____ has gills and lives in water when young and then develops lungs to live on land as it gets older.=amphibian>reptile+fish<bird",

    //  Carnivores & herbivores (advanced) 
    "Which of these animals is a carnivore?=hyena>hippopotamus+giraffe<koala",
    "Which of these animals is a carnivore?=python>elephant+rhinoceros<kangaroo",
    "Which of the following animals is a carnivore?=scorpion>giraffe+koala<elk",
    "Which of the following animals is a carnivore?=polar bear>hippopotamus+elephant<moose",
    "Which of the following animals is a carnivore?=vulture>koala+rhinoceros<capybara",
    "Which of these animals is a herbivore?=iguana>hyena+cheetah<leopard",
    "Which of these animals is a herbivore?=elk>crocodile+scorpion<polar bear",
    "Which of the following animals is a herbivore?=gazelle>jaguar+alligator<vulture",
    "Which of the following animals is a herbivore?=moose>cobra+python<eagle",
    "Which of these animals is a herbivore?=beaver>leopard+crocodile<polar bear",
    "Which of these animals is a carnivore?=anaconda>hippopotamus+elk<giraffe",
    "Which of the following animals is a carnivore?=komodo dragon>moose+capybara<wildebeest",
    "Which of the following animals is a carnivore?=wolverine>giraffe+elephant<koala",
    "Which of these animals is a herbivore?=capybara>hyena+jaguar<polar bear",
    "Which of the following animals is a herbivore?=wildebeest>crocodile+anaconda<cheetah",
    "Which of these animals feeds on both plants and animals?=raccoon>hippopotamus+giraffe<koala",
    "Which of these animals is an omnivore?=ostrich>elephant+rhinoceros<kangaroo",
    "Which of these animals is an omnivore?=orangutan>hippopotamus+giraffe<elk",

    //  Feeding & behavior concepts 
    "An animal that eats the bodies of animals that are already dead is a ____.=scavenger>carnivore+herbivore<omnivore",
    "An animal that only eats other animals is a ____.=carnivore>herbivore+omnivore<prey",
    "An animal that hunts and kills other animals for food is a ____.=predator>prey+carnivore<decomposer",
    "An animal that is hunted and killed for food is a ____.=prey>predator+carnivore<herbivore",
    "When an animal's appearance blends in with its environment so it will not be noticed, what is it called?=camouflage>migration+predation<metamorphosis",
    "Leopards and cheetahs have spots on their bodies for the purpose of ____.=camouflage>migration+predation<metamorphosis",
    "When animals such as birds move to far but warmer places to find food, what is it called?=migration>hibernation+camouflage<predation",

    //  T/F — balanced 11T/10F 
    "Among all animals, the blue whale produces the loudest sound.=true>false",
    "The fleshy organs that fishes use for breathing are called 'fins'.=false>true",
    "A vent is a small hole in the body of a fish or a bird through which wastes or eggs come out.=true>false",
    "A typical reptile would have no scales and breathe air using gills.=false>true",
    "An animal is warm-blooded if it can keep its body warm even if it's in a cold place.=true>false",
    "Amphibians are warm-blooded animals.=false>true",
    "Reptiles breathe through lungs.=true>false",
    "The animal in this picture is a herbivore.=false>true**ac-carnivore1.jpg",
    "The animal in this picture is a carnivore.=true>false**ac-carnivore2.jpg",
    "The animal in this picture is a herbivore.=true>false**ac-herbivore1.jpg",
    "The animal in this picture is a carnivore.=false>true**ac-herbivore2.jpg",
    "The arrow in this picture is pointing to the predator.=true>false**ac-predator1.jpg",
    "The arrow in this picture is pointing to the prey.=false>true**ac-predator2.jpg",
    "The arrow in this picture is pointing to the prey.=true>false**ac-prey1.jpg",
    "The arrow in this picture is pointing to the predator.=false>true**ac-prey2.jpg",
    "A carnivore is an animal that only eats plants.=false>true",
    "A herbivore is an animal that only eats meat.=false>true",
    "An omnivore is an animal that only eats plants.=false>true",
    "An animal that hunts other animals for food is called 'prey'.=false>true",
    "An animal that is hunted for food is called 'prey'.=true>false",
    "An animal that lays eggs, is warm-blooded, and whose body is not covered with fur is a bird.=true>false",

    );

} elseif ($grd == 4) {

    // Grade 4 — merged mc[4]+mc[5], tf[4]+tf[5]
    $questions=array(

    //  Class identification 
    "Which of these could be a cold-blooded vertebrate that can live on land or in water and is able to breathe through its skin?=amphibian>bird+mammal<insect",
    "An animal that is warm-blooded, lays eggs, and has feathers is a ____.=bird>mammal+reptile<fish",

    //  Omnivores 
    "Which of the following animals is an omnivore?=hummingbird>elephant+giraffe<koala",
    "Which of the following animals feeds on both plants and animals?=tilapia>hippopotamus+rhinoceros<kangaroo",
    "Click on the animal that feeds on both plants and animals.=chimpanzee>elk+iguana<moose",
    "Which of the following animals is an omnivore?=grizzly bear>capybara+wildebeest<giraffe",
    "Which of the following animals feeds on both plants and animals?=badger>elephant+rhinoceros<koala",
    "Click on the animal that feeds on both plants and animals.=wild boar>giraffe+hippopotamus<elk",

    //  Adaptation & behavior 
    "____ is the behavioral adaptation of travelling long distances to avoid a season that is too harsh for the animal.=migration>hibernation+camouflage<predation",
    "A small brown lizard living in the brown sand or soil of the desert is an example of ____.=camouflage>migration+hibernation<mimicry",
    "Walking sticks, which are insects that look like twigs, use ____ to avoid predators.=camouflage>migration+hibernation<mimicry",
    "An animal looking like another animal that is dangerous or harmful is an example of ____.=mimicry>camouflage+migration<hibernation",
    "A bear passing the winter in a sleeping or inactive condition is said to be in ____.=hibernation>migration+camouflage<estivation",
    "Because of ____, a dog will shake its body when its fur becomes wet.=instinct>migration+hibernation<metamorphosis",

    //  Animal classification 
    "What do you call an animal that roams from place to place and never stays in one area for very long?=nomadic>nocturnal+diurnal<scavenger",
    "A type of mammal that continues developing after birth in a pouch in its mother's belly is called what?=marsupial>nomadic+nocturnal<arboreal",
    "An animal that helps break down dead organisms that fall to the ground is a ____.=decomposer>scavenger+arboreal<territorial",

    //  Reptiles & invertebrates 
    "Which of these is a reptile, a herbivore, has a carapace, and dwells on land?=tortoise>snake+turtle<iguana",
    "Which of these is a reptile, has a carapace, and dwells well in water?=turtle>tortoise+snake<iguana",
    "Which of these is a reptile, a herbivore, and has a form similar to that of a house lizard?=iguana>snake+turtle<salamander",
    "A ____ is a creeping or burrowing invertebrate with a long, slender, smooth, and soft body but has no limbs.=worm>snail+slug<caterpillar",
    "Which of these is a small mollusk that moves slowly on land or in water, and has a spirally coiled shell?=snail>slug+worm<millipede",

    //  T/F — balanced 11T/11F 
    "A poisonous snake uses its tongue to inject venom into its prey.=false>true",
    "A fish is an aquatic animal that has gills for breathing and fins for swimming.=true>false**ac-fish1.jpg",
    "An electric eel is dangerous because it can discharge up to 650 volts of electricity.=true>false",
    "The gills are the organs of locomotion and balance in fishes.=false>true",
    "The animal in this picture is a carnivore.=true>false**ac-carnivore3.jpg",
    "The animal in this picture is a herbivore.=false>true**ac-carnivore4.jpg",
    "The animal in this picture is a herbivore.=true>false**ac-herbivore3.jpg",
    "The animal in this picture is a carnivore.=false>true**ac-herbivore4.jpg",
    "The arrow in this picture is pointing to the predator.=true>false**ac-predator3.jpg",
    "The arrow in this picture is pointing to the prey.=false>true**ac-predator4.jpg",
    "The arrow in this picture is pointing to the prey.=true>false**ac-prey3.jpg",
    "The arrow in this picture is pointing to the predator.=false>true**ac-prey4.jpg",
    "The term 'camouflage' refers to the blending of an animal's appearance with its surroundings so it will not be noticed.=true>false",
    "The term 'migration' refers to the fierce behavior of an animal when defending its territory.=false>true",
    "An animal that eats the bodies of animals that are already dead is a 'scavenger'.=true>false",
    "A carnivore is an animal that only eats plants.=false>true",
    "A predator is an animal that hunts and kills other animals for food.=true>false",
    "A prey is an animal that hunts and kills other animals for food.=false>true",
    "A typical reptile is cold-blooded, has scales, and breathes with lungs.=true>false",
    "A typical mammal is cold-blooded and has scales.=false>true",
    "An animal that is cold-blooded, has scaly skin, and creeps or crawls on the ground is most likely a reptile.=true>false",
    "The fastest animal on two legs is the ostrich.=true>false",

    );

} elseif ($grd == 5) {

    // Grade 5 — merged mc[5]+mc[6], tf[5]+tf[6]
    $questions=array(

    //  Adaptation & behavior 
    "____ is the behavioral adaptation of travelling long distances to avoid a season that is too harsh for the animal.=migration>hibernation+camouflage<predation",
    "A small brown lizard living in the brown sand or soil of the desert is an example of ____.=camouflage>migration+hibernation<mimicry",
    "Walking sticks, which are insects that look like twigs, use ____ to avoid predators.=camouflage>migration+hibernation<mimicry",
    "An animal looking like another animal that is dangerous or harmful is an example of ____.=mimicry>camouflage+migration<hibernation",
    "A bear passing the winter in a sleeping or inactive condition is said to be in ____.=hibernation>migration+camouflage<estivation",
    "Because of ____, a dog will shake its body when its fur becomes wet.=instinct>migration+hibernation<metamorphosis",

    //  Animal classification 
    "What do you call an animal that roams from place to place and never stays in one area for very long?=nomadic>nocturnal+diurnal<scavenger",
    "A type of mammal that continues developing after birth in a pouch in its mother's belly is called what?=marsupial>nomadic+nocturnal<arboreal",
    "An animal that helps break down dead organisms that fall to the ground is a ____.=decomposer>scavenger+arboreal<territorial",
    "The seasonal movement of animals from one place to another is called ____.=migration>hibernation+camouflage<predation",
    "An animal's state of inactivity characterized by low body temperature, slow breathing, low heart rate, and reduced metabolism is called ____.=hibernation>migration+camouflage<estivation",
    "Animals that maintain ownership of a certain area and are willing to fight off intruders to defend it are called ____ animals.=territorial>nomadic+nocturnal<arboreal",
    "A tarsier is classified as ____ because it is more active at night than during the day.=nocturnal>diurnal+arboreal<marsupial",
    "Tarsiers are referred to as ____ because they live in trees.=arboreal>nomadic+nocturnal<territorial",

    //  Processes 
    "____ is the process in which birds use their beaks to clean, arrange, and oil their feathers.=preening>molting+foaling<mutating",
    "____ is the process by which birds shed their old feathers and grow new ones.=molting>preening+foaling<evolving",

    //  Reptiles & invertebrates 
    "Which of these is a reptile, a herbivore, has a carapace, and dwells on land?=tortoise>snake+turtle<iguana",
    "Which of these is a reptile, has a carapace, and dwells well in water?=turtle>tortoise+snake<iguana",
    "Which of these is a reptile, a herbivore, and has a form similar to that of a house lizard?=iguana>snake+turtle<salamander",
    "A ____ is a creeping or burrowing invertebrate with a long, slender, smooth, and soft body but has no limbs.=worm>snail+slug<caterpillar",
    "Which of these is a small mollusk that moves slowly on land or in water, and has a spirally coiled shell?=snail>slug+worm<millipede",

    //  T/F — balanced 13T/13F 
    "The body temperature of mammals is highly regulated.=true>false",
    "The organs of locomotion and balance in fishes are the gills.=false>true",
    "The milk of mammals is produced by mammary glands.=true>false",
    "Crocodiles have sweat glands that keep them cool in warm weather.=false>true",
    "The animal in this picture is a carnivore.=true>false**ac-carnivore5.jpg",
    "The animal in this picture is a carnivore.=false>true**ac-herbivore5.jpg",
    "The arrow in this picture is pointing to the predator.=true>false**ac-predator5.jpg",
    "The arrow in this picture is pointing to the predator.=false>true**ac-prey5.jpg",
    "A nomadic animal is one that roams from place to place and never stays in one area for very long.=true>false",
    "A nocturnal animal is one that is mainly active during the day.=false>true",
    "The picture above shows how a beetle uses 'mimicry' to look monstrous and scare off predators.=true>false**ac-mimicry1.jpg",
    "The picture above shows how a butterfly uses 'camouflage' to avoid being detected by predators.=false>true**ac-mimicry2.jpg",
    "The picture above shows how an octopus uses 'camouflage' to avoid detection.=true>false**ac-camouflage1.jpg",
    "The picture above shows how a grasshopper uses 'mimicry' to look menacing and scare off predators.=false>true**ac-camouflage2.jpg",
    "Plankton are microscopic organisms that float or drift in large numbers in oceans and other bodies of water and serve as food for many animals.=true>false",
    "Ectothermic animals can internally control their body temperature.=false>true",
    "Preening is the process in which birds use their beaks to clean, arrange, and oil their feathers.=true>false",
    "Animals that are active at night are called diurnal animals.=false>true",
    "Animals that are active during daytime are called diurnal animals.=true>false",
    "The substance that's rich in antibodies and produced by the mammary glands of a mammal that has just given birth is called 'colostrum'.=true>false",
    "A behavior is said to be instinctive if the animal learned it from its own experience.=false>true",
    "The picture above shows how a butterfly employs 'mimicry' to scare off predators.=true>false**ac-behavior1.jpg",
    "The picture above shows how a toad employs 'camouflage' to hide from its predators.=true>false**ac-behavior2.jpg",
    "The arrow in the picture is pointing to an autotrophic organism.=false>true**ac-mane1.jpg",
    "Animals that maintain ownership of a certain area and are willing to fight off intruders to defend it are called 'territorial animals'.=true>false",
    "Arboreal animals are those that spend the majority of their lives in water.=false>true",
    "Class Mammalia includes all animals that have fur and give milk to their young.=true>false",
    "Class Aves consists of warm-blooded, egg-laying, feathered vertebrates.=true>false",

    );

} elseif ($grd == 6) {

    // Grade 6 — merged mc[6]+mc[7], tf[6]+tf[7]
    $questions=array(

    //  Instinct & behavior 
    "Sea turtles, newly hatched on a beach, will automatically move toward the ocean because of ____.=instinct>territoriality+camouflage<metamorphosis",
    "A joey climbing into the pouch on the abdomen of its mother upon being born is an example of ____.=instinct>territoriality+camouflage<conditioning",

    //  Behavior states 
    "Which of these means being in a dormant state of low body temperature and low metabolic rate during the winter?=hibernation>estivation+migration<metamorphosis",
    "Which of these means being in a prolonged state of inactivity during a hot or dry season?=estivation>hibernation+migration<metamorphosis",
    "An otherwise harmless animal imitating the appearance of a harmful animal in order to scare off predators is an example of ____.=mimicry>camouflage+migration<estivation",

    //  Animal classification 
    "Animals that maintain ownership of a certain area and are willing to fight off intruders to defend it are called ____ animals.=territorial>nomadic+nocturnal<arboreal",
    "Which of these refers to the process of giving birth to an animal?=parturition>mutation+imprinting<conditioning",
    "Which of these refers to the bonding of a newborn animal to a creature it meets at birth, causing the former to become attached to the latter?=imprinting>mutation+parturition<conditioning",
    "What do you call an animal that roams from place to place and never stays in one area for very long?=nomadic>nocturnal+diurnal<scavenger",
    "A type of mammal that continues developing after birth in a pouch in its mother's belly is called what?=marsupial>nomadic+nocturnal<arboreal",
    "An animal that helps break down dead organisms that fall to the ground is a ____.=decomposer>scavenger+arboreal<territorial",
    "What do you call a scavenger?=an animal that eats the remains of dead animals>an animal that hunts live prey+an animal that eats only plants<an animal that feeds its young with milk",

    //  T/F — balanced 12T/12F 
    "Arboreal animals are those that spend the majority of their lives in trees.=true>false",
    "Ectothermic animals can control their body temperature.=false>true",
    "Preening is the process in which birds use their beaks to clean, arrange, and oil their feathers.=true>false",
    "Animals that are active at night are called nocturnal animals.=true>false",
    "Animals that are active during daytime are called nocturnal animals.=false>true",
    "The substance that's rich in antibodies and produced by the mammary glands of a mammal that has just given birth is called 'colostrum'.=true>false",
    "A behavior is said to be instinctive if the animal learned it from its own experience.=false>true",
    "The picture above shows how a butterfly employs 'mimicry' to scare off predators.=true>false**ac-behavior1.jpg",
    "The picture above shows how a toad employs 'mimicry' to hide from its predators.=false>true**ac-behavior2.jpg",
    "The arrow in the picture is pointing to an autotrophic organism.=false>true**ac-mane1.jpg",
    "Animals that maintain ownership of a certain area and are willing to fight off intruders to defend it are called 'territorial animals'.=true>false",
    "Arboreal animals are those that spend the majority of their lives in water.=false>true",
    "Class Mammalia includes all animals that have fur and give milk to their young.=true>false",
    "Class Aves consists of invertebrates with three pairs of legs and bodies with three segments.=false>true",
    "Marsupials are mammals that are born underdeveloped and continue developing in a pouch on the mother's belly.=true>false",
    "Marsupials are primitive mammals that lay large yolky eggs, such as the platypus and the echidna.=false>true",
    "Monotremes are primitive mammals that lay large yolky eggs, such as the platypus and the echidna.=true>false",
    "Organisms in Kingdom Animalia are multicellular and autotrophic.=false>true",
    "A scavenger is an animal that hunts and kills other animals for food.=false>true",
    "A sanguinivore is an animal that eats the remains of animals that are already dead.=false>true",
    "Most known examples of organisms referred to as 'extremophiles' are members of Kingdom Archaebacteria.=true>false",
    "The hair-covered protuberance that appears in pairs on the heads of giraffes is called an 'antler'.=false>true",
    "Commensalism refers to the relationship between two organisms in which both organisms are benefitting.=false>true",
    "Parasitism refers to a non-mutual relationship between two organisms wherein one organism, the parasite, benefits at the expense of the other, the host.=true>false",

    );

} elseif ($grd == 7) {

    // Grade 7 — merged mc[7]+mc[8], tf[7]+tf[8]
    $questions=array(

    //  Behavior states 
    "Which of these means being in a dormant state of low body temperature and low metabolic rate during the winter?=hibernation>estivation+migration<metamorphosis",
    "Which of these means being in a prolonged state of inactivity during a hot or dry season?=estivation>hibernation+migration<metamorphosis",
    "An otherwise harmless animal imitating the appearance of a harmful animal in order to scare off predators is an example of ____.=mimicry>camouflage+migration<estivation",

    //  Symbiotic relationships 
    "____ refers to the relationship between two organisms wherein one organism benefits without affecting the other.=commensalism>mutualism+parasitism<predation",
    "____ refers to the relationship between two organisms in which both organisms are benefitting.=mutualism>commensalism+parasitism<predation",
    "____ refers to a non-mutual relationship between two organisms wherein one organism, the parasite, benefits at the expense of the other, the host.=parasitism>commensalism+mutualism<predation",

    //  Animal classification 
    "Animals that maintain ownership of a certain area and are willing to fight off intruders to defend it are called ____ animals.=territorial>nomadic+nocturnal<arboreal",
    "Which of these refers to the process of giving birth to an animal?=parturition>mutation+imprinting<conditioning",
    "Which of these refers to the bonding of a newborn animal to a creature it meets at birth, causing the former to become attached to the latter?=imprinting>mutation+parturition<conditioning",
    "What do you call an animal that eats the remains of animals that are already dead?=scavenger>predator+carnivore<decomposer",
    "Animals that spend the majority of their lives in trees are called what?=arboreal>nomadic+nocturnal<territorial",
    "Animals that are mainly active during the night are called ____ animals.=nocturnal>diurnal+arboreal<territorial",
    "Animals that are mainly active during daytime are called ____ animals.=diurnal>nocturnal+arboreal<territorial",
    "A group of animals that is controlled by a dominant female is said to have a ____ society.=matriarchal>nomadic+territorial<nocturnal",

    //  T/F — balanced 9T/9F 
    "Ectothermic animals rely mainly on external heat sources to regulate their body temperature.=true>false",
    "The cloaca is an organ that helps amphibians breathe underwater.=false>true",
    "The symbiotic relationship depicted in the picture above is mutualism.=true>false**ac-symbiosis1.jpg",
    "The symbiotic relationship depicted in the picture above is parasitism.=false>true**ac-symbiosis3.jpg",
    "The symbiotic relationship depicted in the picture above is mutualism.=true>false**ac-symbiosis5.jpg",
    "The symbiotic relationship depicted in the picture above is parasitism.=false>true**ac-symbiosis7.jpg",
    "The symbiotic relationship depicted in the picture above is parasitism.=true>false**ac-symbiosis9.jpg",
    "Animals that are active at night and sleep during the day are called 'diurnal' animals.=false>true",
    "Animals that are active during daytime and sleep at night are called 'diurnal' animals.=true>false",
    "Commensalism refers to the relationship between two organisms in which both organisms are benefitting.=false>true",
    "Mutualism refers to the relationship between two organisms wherein one organism benefits without affecting the other.=false>true",
    "Parasitism refers to the relationship between two organisms wherein one organism benefits without affecting the other.=false>true",
    "A scavenger is an animal that hunts and kills other animals for food.=false>true",
    "Marsupials are mammals that are born underdeveloped and continue developing in a pouch on the mother's belly.=true>false",
    "Monotremes are mammals that are born underdeveloped and continue developing in a pouch on the mother's belly.=false>true",
    "Organisms in Kingdom Animalia are multicellular and heterotrophic.=true>false",
    "Most known examples of organisms referred to as 'extremophiles' are members of Kingdom Protista.=false>true",
    "Zooplankton are the heterotrophic components of the plankton community.=true>false",

    );

} else { // grd >= 8

    // Grade 8+ — merged mc[8]+mc[10], tf[8]+tf[10] (mc[9] is duplicate of mc[8])
    $questions=array(

    //  Behavior states 
    "Which of these means being in a prolonged state of inactivity during a hot or dry season?=estivation>hibernation+migration<metamorphosis",

    //  Symbiotic relationships 
    "____ refers to the relationship between two organisms wherein one organism benefits without affecting the other.=commensalism>mutualism+parasitism<predation",
    "____ refers to the relationship between two organisms in which both organisms are benefitting.=mutualism>commensalism+parasitism<predation",
    "____ refers to a non-mutual relationship between two organisms wherein one organism, the parasite, benefits at the expense of the other, the host.=parasitism>commensalism+mutualism<predation",

    //  Animal classification 
    "What do you call an animal that eats the remains of animals that are already dead?=scavenger>predator+carnivore<decomposer",
    "What do you call an animal that eats or drinks blood?=sanguinivore>scavenger+predator<decomposer",
    "Animals that spend the majority of their lives in trees are called what?=arboreal>nomadic+nocturnal<territorial",
    "Animals that are mainly active during the night are called ____ animals.=nocturnal>diurnal+arboreal<territorial",
    "Animals that are mainly active during daytime are called ____ animals.=diurnal>nocturnal+arboreal<territorial",
    "A group of animals that is controlled by a dominant female is said to have a ____ society.=matriarchal>nomadic+territorial<nocturnal",
    "Animals that maintain ownership of a certain area and are willing to fight off intruders to defend it are called ____ animals.=territorial>nomadic+nocturnal<arboreal",

    //  Evolution & adaptation 
    "Birds undertake ____ to take advantage of burgeoning insect populations, budding plants, and an abundance of nesting locations in another place.=migration>hibernation+estivation<evolution",
    "Which of these terms involves changes in heritable traits of biological populations over successive generations?=evolution>migration+hibernation<parturition",
    "Due to the height of many branches of a tree and the potentially disastrous consequences of a fall, balance is of primary importance to ____ animals.=arboreal>territorial+nomadic<nocturnal",
    "Elongated limbs, prehensile tails, claws, frictional gripping, and adhesion are all anatomical specializations of ____ animals.=arboreal>territorial+nomadic<nocturnal",
    "Enhanced auditory sensitivity, an acute sense of smell, low-light vision, and echolocation are examples of anatomical specializations of ____ animals.=nocturnal>diurnal+arboreal<territorial",
    "An organism whose internal physiological sources of heat are of relatively small importance in controlling body temperature is ____.=ectothermic>endothermic+arboreal<nocturnal",

    //  T/F — balanced 9T/9F 
    "Ectothermic animals rely mainly on external heat sources to regulate their body temperature.=true>false",
    "The cloaca is an organ that helps amphibians breathe underwater.=false>true",
    "The symbiotic relationship depicted in the picture above is mutualism.=true>false**ac-symbiosis1.jpg",
    "The symbiotic relationship depicted in the picture above is parasitism.=false>true**ac-symbiosis3.jpg",
    "The symbiotic relationship depicted in the picture above is mutualism.=true>false**ac-symbiosis5.jpg",
    "The symbiotic relationship depicted in the picture above is parasitism.=false>true**ac-symbiosis7.jpg",
    "The symbiotic relationship depicted in the picture above is parasitism.=true>false**ac-symbiosis9.jpg",
    "Animals that are active at night and sleep during the day are called 'diurnal' animals.=false>true",
    "Animals that are active during daytime and sleep at night are called 'diurnal' animals.=true>false",
    "Commensalism refers to the relationship between two organisms in which both organisms are benefitting.=false>true",
    "Mutualism refers to the relationship between two organisms wherein one organism benefits without affecting the other.=false>true",
    "Parasitism refers to the relationship between two organisms wherein one organism benefits without affecting the other.=false>true",
    "A scavenger is an animal that hunts and kills other animals for food.=false>true",
    "Marsupials are mammals that are born underdeveloped and continue developing in a pouch on the mother's belly.=true>false",
    "Monotremes are mammals that are born underdeveloped and continue developing in a pouch on the mother's belly.=false>true",
    "Most known examples of organisms referred to as 'extremophiles' are members of Kingdom Protista.=false>true",
    "Zooplankton are the heterotrophic components of the plankton community.=true>false",
    "A sanguinivore is an animal that eats the remains of animals that are already dead.=false>true",

    );
}
?>

</head>

</body>

</html>