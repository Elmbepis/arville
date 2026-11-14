<html>

<head>
<body>

<?php
$_SESSION['title']="Living and Non-living Things";
$module_levels = ['Easy', 'Hard'];   // &#8592; NEW: tells the renderer this module is multi-level

$lvl = $_SESSION['level'] ?? 'Easy';
if (!in_array($lvl, ['Easy', 'Hard'], true)) $lvl = 'Easy';

if ($lvl === 'Easy') {

    $questions=array(

    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/bear.jpg[This is a bear. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/bee.jpg[This is a bee. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/butterfly.jpg[This is a butterfly. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/catfish.jpg[This is a catfish. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/clownfish.jpg[This is a clownfish. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/crab.jpg[This is a crab. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/crocodile.jpg[This is a crocodile. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/dragonfly.jpg[This is a dragonfly. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/duck.jpg[This is a duck. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/falcon.jpg[This is a falcon. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/frog.jpg[This is a frog. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/goldfish.jpg[This is a goldfish. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/grasshopper.jpg[This is a grasshopper. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/housefly.jpg[This is a housefly. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/mite.jpg[This is a mite. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/penguin.jpg[This is a penguin. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/pigeon.jpg[This is a pigeon. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/piranha.jpg[This is a piranha. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/ray.jpg[This is a ray. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/rooster.jpg[This is a rooster. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/salamander.jpg[This is a salamander. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/sea turtle.jpg[This is a sea turtle. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/snake.jpg[This is a snake. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/scorpion.jpg[This is a scorpion. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/shark.jpg[This is a shark. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/shrimp.jpg[This is a shrimp. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/slug.jpg[This is a slug. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/snail.jpg[This is a snail. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/spider.jpg[This is a spider. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/squid.jpg[This is a squid. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/stork.jpg[This is a stork. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/tick.jpg[This is a tick. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/turtle.jpg[This is a turtle. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/zebra.jpg[This is a zebra. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/bamboo tree.jpg[This is a bamboo tree. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/banana tree.jpg[This is a banana tree. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/cactus.jpg[This is a cactus. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/calamansi plant.jpg[This is a calamansi plant. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/gumamela plant.jpg[This is a gumamela plant. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/makahiya plant.jpg[This is a makahiya plant. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/mango tree.jpg[This is a mango tree. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/rose plant.jpg[This is a rose plant. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/sunflower plant.jpg[This is a sunflower plant. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/water lily.jpg[This is a water lily. It is a living thing because it can grow and reproduce.]",

    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/banana peeling.jpg[This is a banana peeling. It came from a living plant but the peeling itself is no longer alive.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/bicycle.jpg[This is a bicycle. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/broom.jpg[This is a broom. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/car.jpg[This is a car. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/feather duster.jpg[This is a feather duster. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/glass of milk.jpg[This is a glass of milk. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/house.jpg[This is a house. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/leg ham.jpg[This is a leg of ham. It came from a living pig but the ham itself is no longer alive.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/mango slice.jpg[This is a mango slice. It came from a living tree but the slice itself is no longer alive.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/nest.jpg[This is a nest. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/planet.jpg[This is a planet. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/rock.jpg[This is a rock. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/salad.jpg[This is a salad. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/shoe.jpg[This is a shoe. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/stuffed toy.jpg[This is a stuffed toy. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/Superman toy.jpg[This is a Superman toy. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/tire.jpg[This is a tire. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/toy dragon.jpg[This is a toy dragon. It is a non-living thing because it cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/toy monster.jpg[This is a toy monster. It is a non-living thing because it cannot grow or reproduce.]",

    );

} else {

    $questions=array(

    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/bean seedling.jpg[This is a bean seedling. It is a living thing because it can grow into a new plant.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/blue starfish.jpg[This is a blue starfish. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/clam.jpg[This is a clam. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/coral.jpg[This is coral. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/jellyfish.jpg[This is a jellyfish. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/ladybug.jpg[This is a ladybug. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/lionfish.jpg[This is a lionfish. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/louse.jpg[This is a louse. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/mango seed.jpg[This is a mango seed. A seed is a living thing because it can grow into a new plant.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/mongo sprout.jpg[This is a mongo sprout. It is a living thing because it can grow into a new plant.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/mushroom.jpg[This is a mushroom. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/mussel.jpg[This is a mussel. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/sea anemone.jpg[This is a sea anemone. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/sea cucumber.jpg[This is a sea cucumber. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/seahorse.jpg[This is a seahorse. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/sea urchin.jpg[This is a sea urchin. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/starfish.jpg[This is a starfish. It is a living thing because it can grow and reproduce.]",
    "Is this a living or a non-living thing?=living>non-living**science/images/living-non-living/sunflower seed.jpg[This is a sunflower seed. A seed is a living thing because it can grow into a new plant.]",

    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/banana.jpg[This is a banana. The fruit itself is non-living, but the tiny seeds inside it are living because they can grow into new plants.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/clamshell.jpg[This is a clamshell. The shell is a non-living thing, but the clam that lived inside it was a living thing.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/cooked crab.jpg[This is a cooked crab. It is no longer alive, but it was once a living thing before it was cooked.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/cooked fish.jpg[This is a cooked fish. It is no longer alive, but it was once a living thing before it was cooked.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/cooked lobster.jpg[This is a cooked lobster. It is no longer alive, but it was once a living thing before it was cooked.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/dinosaur statue.jpg[This is a dinosaur statue. It is a non-living thing because it was made by people and cannot grow or reproduce.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/dinosaur skeleton.jpg[This is a dinosaur skeleton. It is a non-living thing made of bones from a dinosaur that lived long ago.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/feather.jpg[This is a feather. It came from a living bird, but a feather itself is a non-living thing.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/grilled corn cob.jpg[This is a grilled corn cob. It is no longer alive, but it was once a living thing before it was cooked.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/guava fruit.jpg[This is a guava fruit. The fruit itself is non-living, but the seeds inside it are living because they can grow into new plants.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/leaf.jpg[This is a leaf. A leaf that has fallen from a plant is a non-living thing.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/melon.jpg[This is a melon. The fruit itself is non-living, but the seeds inside it are living because they can grow into new plants.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/papaya fruit.jpg[This is a papaya fruit. The fruit itself is non-living, but the seeds inside it are living because they can grow into new plants.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/pear.jpg[This is a pear. The fruit itself is non-living, but the seeds inside it are living because they can grow into new plants.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/pumpkin.jpg[This is a pumpkin. The pumpkin itself is non-living, but the seeds inside it are living because they can grow into new plants.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/raisin.jpg[This is a raisin. It is a dried grape and is no longer alive.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/shark tooth.jpg[This is a shark tooth. A tooth that has fallen out is a non-living thing.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/star apple.jpg[This is a star apple. The fruit itself is non-living, but the seeds inside it are living because they can grow into new plants.]",
    "Is this a living or a non-living thing?=non-living>living**science/images/living-non-living/watermelon.jpg[This is a watermelon. The fruit itself is non-living, but the seeds inside it are living because they can grow into new plants.]",

    );
}
?>

</head>

</body>

</html>