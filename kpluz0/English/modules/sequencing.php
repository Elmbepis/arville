<?php
// english/modules/sequencing.php
// Sequencing Sentences — M/C: given a scrambled list of sentences, pick the
// number sequence that puts them back into the correct reading order.
// 2 levels (Easy, Hard), grade-aware pools. Legacy Easy/Medium/Hard folded to
// Easy/Hard per handover §3.2 (Medium &#8594; Hard).
// Pool mapping:
//   Easy grd 0     &#8594; easySimple        (simple 3-sentence stories)
//   Easy grd 1..10 &#8594; mparagraph[grd-1] (3 &#8594; 7 sentences)
//   Hard grd 0..10 &#8594; mparagraph[min(grd+1, 11)] (3 &#8594; 9 sentences)

session_name('KPLUZ_SESSION');
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /arville/kpluz0/login.php");
    exit();
}
require_once __DIR__ . '/../../container.php';
require_once __DIR__ . '/../../scorer.php';

$conn = new mysqli("localhost", "root", "AcadeV25!", "kpluz0");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$base = rtrim(dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$moduleTitle = 'Sequencing Sentences';
$moduleId = basename(__FILE__);
$sessionKey = 'mod_' . md5($moduleId);

// ---- Grade / level (§3) ----
$grd = (int)($_SESSION['user_grade'] ?? 0);
if ($grd < 0 || $grd > 10) $grd = 0;

$levels = ['Easy', 'Hard'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels, true)) $_SESSION['level'] = $_POST['level'];
if (!isset($_SESSION['level'])) $_SESSION['level'] = 'Easy';
if ($_SESSION['level'] === 'Medium') $_SESSION['level'] = 'Hard';
if (!in_array($_SESSION['level'], $levels, true)) $_SESSION['level'] = 'Easy';
$lvl = $_SESSION['level'];

// ---- Pool selection ----
function resolve_seq_pool(string $lvl, int $grd, array $easySimple, array $mparagraph): array {
    if ($lvl === 'Easy') {
        if ($grd <= 0) return $easySimple;
        $idx = min(9, $grd - 1);
        return $mparagraph[$idx] ?? $easySimple;
    }
    // Hard: legacy Hard = $mparagraph[$grd + 1]
    $idx = min(11, $grd + 1);
    return $mparagraph[$idx] ?? $mparagraph[0];
}

// ---- Data pools (§5) — verbatim from legacy ----
$easySimple = [
    ['My toy truck was muddy.', 'I washed my toy truck.', 'Now it is clean again.'],
    ['Dave was hungry.', 'He ate his lunch.', 'Now he is full.'],
    ['The dog sees a cat.', 'It chases the cat around.', 'The cat goes up a tree.'],
    ['Harry is thirsty.', 'He pours water into a glass.', 'He drinks the glass of water.'],
    ['Robert is sleepy.', 'He goes into his room.', 'He falls asleep in his bed.'],
    ['They went to the mall.', 'They bought some food.', 'They went home with the food.'],
    ['The lights went out.', 'Nina took out a candle.', 'She lit the candle.'],
    ['David baked a cake.', 'He then sliced the cake.', 'David gave Jane a slice.'],
    ['My new toy was missing.', 'I looked for my missing toy.', 'I found it under the bed.'],
    ['I asked my sister for help.', 'My sister helped me.', 'I thanked her for helping me.'],
    ['My father gave me a puppy.', 'I took good care of the puppy.', 'It is now a big dog.'],
    ['Jay opened the cookie jar.', 'He took a cookie from the jar.', 'Jay ate the cookie.'],
];

$mparagraph = [];
$mparagraph[0] = [
    ['I made a hot dog sandwich.', 'I ate it with some catsup.', 'I burped after eating my sandwich.'],
    ['Carlo went to the river to fish.', 'He caught a big, fat fish.', 'He cooked it on fire and ate it.'],
    ['Manuel made a kite in his room.', 'He then took it outside with him.', 'He flew the kite and had fun.'],
    ['My sister bought ten pencils.', 'She gave me two of them.', 'I smiled and thanked her.'],
    ['Dexter spilled his milk on the table.', 'He took a rag from the kitchen.', 'He wiped the table dry.'],
    ['Robin opened the jar of fish food.', 'He put some fish food in the tank.', 'He watched the fishes eat the food.'],
    ['My pet bird flew out of its cage.', 'It flew toward a window.', 'It then flew back to its cage.'],
    ['I went outside to play.', 'My friends were outside too.', 'We had lots of fun playing together.'],
    ['My sister said she was hungry.', 'Joey gave her some cake.', 'My sister thanked Joey.'],
    ['Danny drew a picture of flowers.', 'He then gave it to his mother.', 'His mother smiled and hugged him.'],
    ['Gina took out her drawing book.', 'She drew pictures on one page.', 'She then colored the pictures.'],
    ['Lester borrowed my toy.', 'He played with it for an hour.', 'He then returned the toy to me.'],
    ["The wind blew the man's hat off.", 'He ran after his hat.', 'He caught his hat and put it on again.'],
    ['Take two slices of bread.', 'Spread some butter on each of them.', 'Put the buttered slices together.'],
];
$mparagraph[1] = [
    ['Peter loves eating sweets.', 'He asked his mother to buy him a cup of mango ice cream.', 'The store had none so his mother bought him cake instead.'],
    ['It rained very hard in the morning.', 'The sun shone bright in the afternoon.', 'By evening, the streets were all dry once again.'],
    ['Lily forgot to water the plants for days.', 'The plants started to turn yellow.', 'Lily now waters the plants every day to make them green again.'],
    ['Wally threw a piece of bread into the pond.', 'A big fish came up and swam toward the bread.', 'The fish grabbed the bread with its mouth and ate it.'],
    ['A fast car ran over a puddle of water.', "The puddle's cold water splashed on a dog that was passing by.", 'The dog shook its body to dry itself.'],
    ['Mrs. Garcia put some cat food on a plate.', 'She then placed the plate on the ground.', 'Soon, her cat was in front of the plate eating the food.'],
    ["I woke up at nine o'clock last Saturday.", 'I had some cereal and juice before doing my chores.', 'After doing them, I went outside to play with my friends.'],
    ['Ben sent a greeting card to his sister last week.', 'His sister called today to thank him for the card.', 'Ben was glad to get a call from his sister.'],
    ['Jill got home from school early.', 'She finished all her homework before dinner.', 'Jill then had an enjoyable dinner with her family.'],
    ['Tom loves collecting rare action figures.', 'He has a display cabinet full of them.', 'It is made of glass so he can see his toys inside.'],
    ['Dominic went fishing with his friends.', "They were in the lake for hours but didn't catch any fish.", 'Tired and hungry, they just went to the mall and ate burgers.'],
    ['Lois Lane slipped and fell into the deep river.', 'Superman saw her waving her arms and shouting for help.', 'Superman rescued her and brought her to safety.'],
    ['Victor bought a new motorbike on Tuesday.', 'He crashed his new motorbike into a tree a week later.', 'It took three days to fix the motorcycle.'],
];
$mparagraph[2] = [
    ['Do you like cookies?', 'I like them very much.', 'I also like candies.', 'Like cookies, they are also fun to eat.'],
    ['Go to the faucet and open it.', 'Wash your hands with soap.', 'Close the faucet after washing your hands.', 'Dry your hands with a clean towel.'],
    ['Put some warm water in a glass.', 'Put some chocolate syrup and milk in the water.', 'Stir.', 'Enjoy your drink.'],
    ['Mr. Torres bought some wood.', 'He then built a dog house.', 'He painted the dog house blue.', 'His dog now stays inside it most of the time.'],
    ['The fat hen laid a dozen eggs.', 'She sat on the eggs for many days.', 'All the eggs hatched.', 'The chicks follow the hen everywhere.'],
    ['I wanted to eat a piece of candy.', 'I took one out of my bag.', 'I removed its wrapper.', 'I put it in my mouth and smiled.'],
    ['Raiza borrowed my tablet.', 'She surfed the web and read some news.', 'She also watched some videos.', 'She thanked me as she handed my tablet back to me.'],
    ['Ferdie took out a piece of bread from his bag.', 'He also took out his bread knife.', 'He sliced the bread into two.', 'He then ate one of them.'],
    ['Wild dogs hunt their prey in packs.', 'Like them, lionesses also hunt as a group.', 'Leopards, on the other hand, would rather hunt alone.'],
    ["Bernie calls his pet dog 'Goliath'.", 'Bernie gave him that name because he is a very large dog.', "In fact, Goliath is taller than Bernie if he's standing on his hind legs."],
    ['Get a pot and put some garden soil in it.', 'Dig a hole in the soil.', 'Drop the seeds in the hole then cover them with soil.', 'Water the seeds in the soil.'],
];
$mparagraph[3] = [
    ['Jennifer loves to draw pictures.', 'She draws with pencils and crayons.', 'Each time Jennifer finishes a picture, she puts it inside a special box.', "That's why her special box is now full of her drawings."],
    ['Susan loves visiting different zoos.', 'She has a favorite animal in each of them.', 'She named all of them so she can call them easily.', 'In fact, she even gave them surnames too!'],
    ['I really love watching movies.', 'In fact, it is my favorite pastime.', 'Sometimes, I even watch two movies in one day.', "That's what I did yesterday."],
    ['Norbert spread some strawberry jam on one slice of bread.', 'He then spread peanut butter on another slice.', 'Norbert then put the two slices of bread together.', 'He had fun preparing that sandwich.'],
    ['Karen went to the ticket booth.', 'She bought five concert tickets for their family.', 'They watched the concert and sang with the singer.', 'They talked about how great the concert was on their way home.'],
    ['Oscar studied hard all night long.', 'He took the test the following day.', 'The teacher announced that he got the highest score.', 'He bought a cup of ice cream on his way home to celebrate.'],
    ['Maria went to the flower garden.', 'She wanted to collect some flowers for the vase in her room.', 'Suddenly, she saw a brown spider hanging from a large leaf.', 'Maria screamed and ran back to their house.'],
    ['Carolyn picked a purple balloon to blow up.', 'She blew air into the balloon.', 'She stopped blowing when the balloon was already big enough.', "Carolyn tied a knot around the balloon's open end to keep the air in."],
    ["Paul noticed that his bike's tire is flat.", 'He took the air pump from the cabinet.', "Paul pumped lots of air into his bike's flat tire.", 'He removed the pump from the tire and put it back in the cabinet.'],
    ['Take the parts of the tent out of the box.', "Connect the poles together to make the tent's frame.", "Fit the tent's nylon cover over the frame.", 'Stretch the tent and secure each corner with a stake.'],
];
$mparagraph[4] = [
    ['I woke up early and prepared my basket.', 'I went to the market with my basket.', 'I bought a dozen eggs from my favorite vendor in the market.', 'I carried the eggs home in my basket.', 'I put the eggs in the refrigerator.'],
    ['Prepare the plot for planting.', 'Dig holes in it that are one meter apart from each other.', 'Drop a seed in each hole and cover it with soil.', 'Water the seeds every day.', "Before long, you'll see some plants sprouting."],
    ['The alarm clock sounded.', 'That meant it was time for me to get up.', 'I went to the bathroom to wash my face.', 'I then had breakfast and brushed my teeth.', 'I took a shower and dressed up before leaving for school.'],
    ['Laura took the coloring book out of her bag.', 'She opened the page she was working on.', 'She took a crayon and started coloring.', 'After a while, she closed the coloring book.', 'She then put it back in her bag and left the room.'],
    ['Danny opened the cans of paint.', 'He dipped his brush in the can of white paint.', 'He made broad strokes on the canvas.', 'He then added many details of different colors.', 'Within an hour, he was able to finish a painting.'],
    ['Their dog gave birth to six healthy puppies.', 'All of them are very cute.', "That's why the kids are so fond of them.", 'They play with them all the time.', 'After all, they know that the puppies will not be puppies forever.'],
    ['Warren went for a bike ride that morning.', 'He hit a bump and fell.', 'His knee got scratched by the pavement.', 'He rode home slowly on his bike because his wound hurt.', 'His mother treated his wound when he got home.'],
    ['Pick a pumpkin from your garden or buy one at a store.', 'Using a sharp knife, carefully cut off the top and scoop out the seeds.', 'Carve a face into the pumpkin.', 'Put a candle inside the pumpkin.', 'Set the pumpkin outside and light the candle when the sun has gone down.'],
    ['Take out a piece of paper, a pen, an envelope, and a stamp.', 'Write your letter on the paper.', 'Put the letter inside the envelope.', 'Seal the envelope then write on it the address of the person you are sending it to.', 'Put a stamp on the envelope then drop it in a mailbox.'],
    ['Bernie bought some flower seeds from the store.', 'He brought the seeds home then dug some holes on the ground.', 'Bernie put the seeds in the holes and covered them with dirt.', 'He watered the seeds every day until they grew into plants.', 'Soon, he was able to pick flowers from his plants.'],
    ['Dorothy put some condensed milk in a large bowl.', 'She then added powdered milk to it until the mixture has become dough-like.', 'Dorothy molded scoops of the mixture into cylinders.', 'She then rolled each cylinder on granulated sugar.', 'Dorothy wrapped the cylinders in cellophane.'],
];
$mparagraph[5] = [
    ['Rhodora wanted to scare her brother, Renato.', 'He is afraid of ghosts, so she thought that she should pretend to be a ghost.', 'She took a large white blanket and put it over her. She then waited in a dark corner for Renato to come.', 'When he finally arrived, she suddenly stood up and made a roaring sound.', "Much to her disappointment, Renato wasn't startled and simply laughed at her."],
    ['Let me tell you how Mary roasted a hot dog when she went camping.', 'First, she took a bamboo barbecue stick and pierced the hot dog with it.', 'Next, she held the barbecue stick such that the hot dog was just above the fire.', 'She then turned the hot dog around from time to time to cook it evenly.', 'Finally, she removed the hot dog from the stick and placed it in a bun.'],
    ['Wet your hair thoroughly with warm, clean water.', 'Put a dab or two of shampoo in your hair.', 'Massage the shampoo gently into your hair using straight strokes only. Do not use hard circular or scrubbing motions.', 'Rinse the shampoo from your hair with lukewarm water for at least one minute.', 'Dry your hair with a clean towel.', 'Comb your clean hair.'],
    ['Vincent made a sketch of how the statue of his favorite fictional character should look like.', 'He mixed the two parts of the self-hardening clay evenly.', 'He sculpted the statue using his sketch as a guide. He started with the broad details then added the fine ones.', 'After finishing the sculpture, he painted it meticulously to make it realistic.', 'He displayed his masterpiece in their living room.'],
    ['Get your fishing gear, tent, and picnic basket ready and put them in your car.', 'Drive to a nearby lake, pond, or river. Set up your tent and put your stuff inside it.', 'Open your bait box and put a worm or minnow on your hook.', 'Cast your line into the water and wait for a fish to bite.', 'Once a fish bites, reel it in carefully.', 'Throw the fish back into the water or keep it for supper.'],
    ["Push the 'up' or 'down' button outside the elevator.", 'Wait for the elevator to come and open its doors.', 'Step inside the elevator. Make sure that no part of your body is blocking its doors.', 'Push the button corresponding to the floor you are going to.', 'Wait for the elevator to stop at your floor and open its doors.', 'Leave the elevator quickly but carefully.'],
    ['Carlito took the vacuum cleaner out of the storage cabinet.', 'He then plugged it into the wall and turned it on.', 'He used the vacuum cleaner to remove cobwebs from the ceiling.', 'He also used it to clean the floor and windows.', 'After cleaning the house, Carlito turned the vacuum cleaner off and unplugged it from the wall.', 'He then put the vacuum cleaner back into the storage cabinet.'],
    ['Mix the flour, salt, and pepper then coat the chicken tenders with the mixture.', 'Pour oil into a skillet and preheat it until the oil is ready to fry the coated chicken tenders.', 'Use tongs to put the chicken tenders into the skillet. Allow them to cook until golden brown.', 'Retrieve the chicken strips and put them in a plate with paper towels to drain the excess oil from them.'],
    ['Kevin wanted to give his puppy, Bruno, a bath.', "He looked everywhere for Bruno but couldn't find him. Bruno was hiding from him again.", "Kevin thought of an idea. He tapped Bruno's food dish with a fork and shouted 'Bruno'.", 'Bruno came running out of his hiding place.', 'Kevin caught him and gave him a warm, nice bath.'],
    ['Marlon put on his diving suit.', 'He jumped into the water and dived down to the seafloor.', 'He hid behind a huge group of corals and waited for a shark to appear.', 'After many minutes of waiting, a shark finally appeared. He watched it in awe.', 'When the shark disappeared, he swam up to his boat. He was happy to see a shark that day.'],
    ['Get a white folded card, some red paper hearts, glue, an envelope, and a pen.', 'Glue the red paper hearts onto the white card.', 'When the glue has dried, write a special message inside the card and sign it.', "Put the card inside the envelope and write a person's name on it.", "Hand your Valentine's Day card to that person."],
    ['Fill a large spray bottle with one quart of distilled water.', 'Add twenty drops of eucalyptus oil to the water then gently swirl the mixture.', 'Add twenty drops of orange oil to the mixture then swirl it again.', 'Screw the lid back onto the spray bottle and shake it vigorously.', 'Mist the furniture that you want to keep your cat away from with your home-made cat repellent.'],
];
$mparagraph[6] = [
    ['Wash and peel the cucumbers then cut them into thin slices.', 'Pat the washed slices with paper towels to dry them.', 'Mix flour and seasoning in a bowl and roll the cucumber pieces in it evenly.', 'Add oil to a skillet and preheat it. Do not allow the oil to smoke.', 'Put the cucumber pieces into the preheated oil and allow them to turn golden brown evenly.', 'Remove the excess grease from the cooked cucumber pieces using paper towels. Serve hot.'],
    ['Mico prepared a thick pizza crust and put it on the pan.', 'He then spread some tomato sauce on top of it.', 'He then put a lot of cheese and a variety of toppings over the sauce-covered crust.', 'Mico preheated the oven and put the pizza inside it. He then waited for it to bake properly.', 'Mico took the pizza out of the oven then turned the oven off.', 'He cut the pizza into several slices and served them to his guests.'],
    ['Net the fish out of the aquarium and transfer them into a large basin with an aerator.', 'Turn off the filter then siphon off the water from the aquarium.', 'When the aquarium has emptied, transfer the sand and gravel into a pail.', 'Thoroughly wash the sand and gravel in the pail with clean water.', 'Return the sand and gravel into the aquarium then fill the aquarium with clean water.', 'Turn on the filter then put the fishes back into the aquarium.'],
    ['Farrah mixed some flour, water, and yeast in a large bowl to make some dough.', 'She then put the dough on a clean surface and kneaded it until it became elastic.', 'When the dough had become elastic, Farrah allowed it to rise in a warm place until it had doubled in size.', 'After the dough had risen, Farrah shaped it into a fish.', 'She then put the fish-shaped dough inside a hot oven and waited for it to bake.', 'She took the bread out of the oven then put it on a serving dish.'],
    ['Harold took a piece of paper and cut it into a square.', "Harold took two sticks from his mother's drawer and glued them on the diagonals of the paper in the form of a cross.", 'After gluing the sticks, he got an empty toilet paper core and some string.', 'He attached the string to the toilet paper core and rolled the string around the core.', 'Harold then tied the other end of the string to the sticks on the paper.', 'Harold went outside and flew his new kite.'],
];
$mparagraph[7] = [
    ['Scrub the plywood clean with your sponge and cleaning solution.', 'After cleaning, sand the plywood with your sandpaper to make it smooth.', 'Remove the dust produced by your sanding with a rag or soft cloth.', 'Paint a base coat of primer over the plywood, following the instructions on the paint can.', 'Wait for the primer to dry, then use a roller brush to lay on the first coat of paint over the primer.', 'Wait for the first coat of paint to dry, and then apply more coats as needed until you are satisfied with the overall result.'],
    ['Open the caulk tube by cutting across its tip with a pair of scissors.', 'Insert the caulk tube into a caulk gun. Tighten the gun then press the trigger until caulk appears at the tip.', 'Place the tip of the caulk tube at an angle against the molding you want to caulk.', "Squeeze the trigger to fill the gaps along the molding's entire edge with caulk.", 'Once all the gaps are filled, put on the disposable rubber gloves and dip your finger into a cup of water.', 'Run your wet finger along the entire length of the applied caulk to smoothen it.'],
    ["First, define the concrete stairs' desired dimensions.", 'Based on these dimensions, calculate the dimensions of the required form.', 'Build the form using scrap plywood and lumber.', 'Once the form is ready, mix the concrete for the stairs, preferably using a cement mixer.', 'Pour the concrete inside the form. Start at the bottom step and pour one step at a time. Smoothen after each pouring.', 'Keep the concrete wet or damp while it cures. Remove the form from the stairs after one week.'],
    ['Turn your t-shirt inside-out and lay it on a clean, flat surface.', 'Once it is flat, draw a line for the new armhole with a marker, starting halfway between the neck seam and the shoulder seam.', 'Your line must have a similar curve as the existing sleeve seam. Redraw the line if necessary.', 'Using a pair of scissors, cut along the final line that you drew.', 'After cutting, fold the t-shirt in half, matching up both ends of the neck seam.', 'Cut the other side of the t-shirt, using as guide the first armhole that you cut. You now have a new cut-off shirt!'],
    ['Monching likes thick steaks so he bought one that is about an inch thick.', 'He seasoned it with salt and pepper then soaked it in a marinade.', 'Monching then heated his grill to the right temperature.', 'He placed his inch-thick steak on the grill and browned each side for two minutes.', 'He then turned down the heat and moved the browned steak to a spot with less flame.', "Monching continued cooking his steak for eight more minutes; that's four minutes per side.", 'He took the steak off the grill and feasted on it.'],
];
$mparagraph[8] = [
    ['First, unplug the refrigerator and remove all of its contents. Throw away any old food.', 'Once the refrigerator is empty, pull out the shelves and drawers and wash them with soap and water.', 'After washing them, place the shelves and drawers over dish towels to dry.', 'Next, clean the internal surfaces with a mixture of baking soda and water. Dry them with a towel.', 'After cleaning the inside, clean the external surfaces and door gaskets with soapy water. Dry them with a towel.', "Now that the surfaces are clean, put the refrigerator's shelves and drawers back inside.", 'Return its contents then power up the refrigerator.'],
    ['Clean the soles of the shoes that you want to fix and let them air dry.', 'Pull out all the nails that attach the heels to the shoes.', 'Detach the heels from the shoes with your fingers.', "Using a file, remove any glue residue from the shoes' bottoms where the heels were removed.", "Put some contact cement on the shoes' bottoms where the new heels will be placed.", 'Position the new heels over the glue and press them firmly against the shoes. Allow the glue to dry.', 'Once the glue has dried, secure the heels to the shoes using nails.'],
    ['Prepare the dry ingredients: flour, sugar, salt, baking soda, and cocoa.', 'Place these dry ingredients in a sifter and shake it back and forth over a bowl.', 'After sifting, prepare the liquid ingredients: vinegar, oil, vanilla, water, and egg.', 'Stir these liquid ingredients in a second bowl then mix them with the dry ingredients.', 'Pour the mixture of the dry and liquid ingredients into a greased and floured pan.', 'Heat the oven to the right temperature then leave the pan inside it.', 'After half an hour, take the cake out and frost as desired.'],
    ['Attempt to clean the stuffed animal first with a brush and some laundry detergent.', 'If the stuffed animal is still dirty, put it in a spacious zippered pillowcase and zip the case closed.', 'Place the pillowcase containing the toy into an empty washing machine.', 'Add some laundry detergent to the machine and run it using a gentle wash cycle.', 'When the wash cycle is over, transfer the pillowcase to a dryer and run it at the lowest temperature setting.', "Unzip the bag and check the stuffed animal. If it's still damp, run it through another cycle in the dryer.", 'Once dry, remove the stuffed toy from the bag and return it to your child.'],
    ['Balance the piece of wood that you want to split on a chopping block.', 'Stand in front of the balanced wood with your feet apart.', 'Hold the ax up with both hands. Slide one hand up near the head of the ax.', "Practice letting this hand slide down the ax handle toward the other hand as you swing the ax downward, but don't chop the wood yet.", 'After practicing, put the ax over the spot you want to hit. Avoid any knots or limbs in the wood.', 'You are now ready to chop the wood. Bring the ax up over your head the way you practiced it.', 'With your aim on your target, bring the axe quickly and firmly down on the wood and split it into two.'],
];
$mparagraph[9] = [
    ['Heat some water with the sun-dried tomatoes in it. Once the water begins boiling, reduce the heat and let the tomatoes simmer until tender.', 'Chop the tomatoes into small pieces and put them in a food processor with vinegar, garlic, salt, and oil.', 'Blend at high speed. Stir in the basil after processing. This will be the dressing for the pasta salad.', 'Now that the dressing is ready, cook the pasta by following the directions on the box.', 'Put canned corn, diced red pepper, sliced olives, and chopped onions in a large bowl.', 'Add the pasta and dressing to this bowl of mixed ingredients and toss vigorously until everything has been mixed well.', 'Peel the avocados and cut them into small cubes. Mix the cubes into the tossed pasta salad.'],
    ['Find a big, sturdy tree. Make sure it has strong and large branches that can support your weight.', "Once you've found a tree, do some stretching to warm up so you won't hurt yourself by pulling a muscle on your way up.", 'You may start your ascent after warming up. Always position your foot securely on a stable spot and hold tightly onto a strong branch.', 'While climbing, think about how a chimpanzee or a monkey might climb the tree. This will keep your mind focused on climbing.', "Go as high as you possibly can or up to the point where you're out of branches.", "Once you've reached the highest point, enjoy the view. Watch the clouds above float by and get some rest before descending.", 'Descend slowly and carefully. Take your time going down to avoid injuries.'],
    ['Using a knife, chop some peeled red potatoes, peeled carrots, and white onions into small cubes. Place them all in a slow cooker.', 'Add ham cubes, water, bay leaves, salt, pepper, and savory to the mixture in the slow cooker.', 'Stir both batches of ingredients together well. Cook the mixture in the slow cooker for three hours on high heat.', 'After the stew has cooked for three hours, stir some flour and milk together in a small bowl with a spoon until there are no lumps left.', 'Pour this milk mixture into the slow cooker and stir everything well.', 'Allow the stew to cook on high heat for thirty more minutes. Remove the bay leaves from the cooked stew and discard them.', 'Pour the soup into bowls and allow them to cool down before serving.'],
    ['Ronald needed to create a fire pit, so he dug a big hole on the ground. It was away from anything that could catch fire.', 'He then stacked wood in the style of a log cabin inside the hole, building the stack upwards.', 'Ronald then filled the center of the stacked wood with kindling such as wood chippings, twigs, and newspaper.', "He didn't put dry leaves with them because leaves have a tendency to burn up quickly and be carried away by wind.", 'Ronald then used matches to light the kindling at the center of the stacked wood.', 'Because he used matches, Ronald got a fire started at once. He blew into the center of the stacked wood to make the fire burn hotter and get bigger.', 'Ronald added more kindling until the stacked wood caught fire and embers were created.'],
    ['Dustin gathered all the pages that he was asked to bind together and stacked them neatly on top of each other.', 'Dustin punched holes on the left side of each page using a paper puncher. He made sure that the holes matched up on every page.', 'After punching the holes, Dustin checked if all the pages were in the right order. He then stacked the pages into a neat pile.', 'Dustin threaded a long piece of yarn through the top hole, making sure that he got every page. He then tied a knot to secure the pages in place.', 'He tried to open the book carefully to check if there was a problem with the knot.', 'Dustin readjusted the knot because it was too tight. He then trimmed the yarn.', 'He repeated this tying process on each of the other holes until the binding was finished.'],
];
$mparagraph[10] = [
    ['Using a screw driver, pry out the loose pieces from your driveway\'s asphalt.', 'After removing the loose pieces, cover any cracks in the asphalt with crack filler.', 'Once the filler has set, clean the asphalt with a degreaser and a stiff broom.', 'Wash down the driveway with a garden hose to remove the degreaser then let it dry for an hour.', 'Open the sealer and mix it thoroughly, ensuring that you get all the compound from the bottom of the container.', "Start pouring the sealer at the driveway's farthest end from the road. Pour enough sealer to cover about twenty square feet of asphalt.", 'Using a paint roller with a long handle, spread the sealer that you have poured onto the asphalt. Make sure that it is spread uniformly.', 'Continue pouring and spreading the sealer until the driveway is evenly covered. Let the sealer cure for at least one full day before using the driveway.'],
    ['Purchase some rice seeds from any garden or farm supply store.', 'Choose a location where you can plant the rice seeds you bought. Its soil must be slightly acidic clay.', "Once you've chosen a location, soak at least fifty grams of rice seeds in water for twenty-four hours to prepare them for planting.", 'Remove the soaked seeds from the water and plant them throughout the soil. To prevent crowding, the seeds should be at least four inches apart in rows that are nine inches apart.', 'Fill the planting area with at least two inches of water and maintain it at that level. Expect to see the first shoots after about a week.', 'Allow the shoots to grow up to seven inches tall. This would take about one month.', 'Wait for the rice stalks to mature. This will take three to four months.', 'Let the water dry out or drain any excess water before removing the mature rice stalks for harvesting.'],
    ['Crack some eggs into a bowl and beat them until fluffy. Add in the dry ingredients but do not stir the mixture.', 'Melt some butter completely in a microwave oven using a microwave-safe bowl.', 'Add the melted butter and some milk to the egg mixture. Stir gently, leaving some small clumps of dry ingredients in the batter. Do not make the mixture very smooth and even.', "After stirring, heat the frying pan to a medium low flame. Put a pat of butter on it so the pancakes won't stick.", "Sprinkle a few flecks of water onto your pan. If it 'dances', the pan is ready for the batter.", 'Pour the batter slowly onto the hot pan until you reach the desired size for your pancake.', 'Bubbles will pop at the edge of the batter as it cooks. Cook for about two minutes or until that pancake side is golden.', 'Flip the pancake and cook the other side until it is also golden. Remove the pancake from the pan and serve.'],
    ['Get eight two-foot long two-by-four wooden boards and four four-foot long two-by-two wooden pieces.', 'Connect the ends of the two-by-four boards together to make two identical squares. Use two three-inch wood screws for each corner.', 'Place one of the squares flat on the ground, and make one of the two-by-two pieces stand on the inside of one corner.', "Screw the standing two-by-two piece into both sides of the square's corner using three-inch wood screws.", "Do the same for the three remaining two-by-two pieces and square corners. You should end up with four 'legs' sticking up from the square on the ground.", "Attach the other square to the free ends of the four 'legs' using the same method as the first square. You should end up with a cubic frame.", 'Cover the square sides and square top of the cube with matching square plastic sheets using a stapler.', 'Enclose the tomato plant with your mini greenhouse.'],
    ['Brenda washed the potatoes then peeled them.', 'She then cut the peeled potatoes into quarters. She knew that this will make them cook much faster.', 'Brenda boiled the potatoes until they were already sufficiently cooked. By then, she could make a potato fall apart by poking it with a fork.', 'Brenda turned off the stove and drained the water from the pot. She then returned the pot to the stove.', "She heated up some milk until it's warm and took some butter out of the refrigerator.", 'Brenda turned on the stove again and put it on the lowest heat setting. She then added the butter to the potatoes and started mashing the potatoes with a masher.', 'While continuing to mash the buttered potatoes, she added warm milk little by little until she got the desired creaminess.', 'Brenda added some salt and pepper to her mashed potatoes and had a great time eating it.'],
];
$mparagraph[11] = [
    ['Before casting, you must first make a mold. Fill a wooden crate with enough dry sand to contain the object you want to copy. Leave a few inches of sand under it.', 'Place the crate on a table a few feet away from the metal melting furnace. Make a mold by pressing the object you\'re copying into the sand.', "Once you've made a cavity in the sand that has the same shape as the object, remove the object and put it away.", 'Now that you have a mold, wear your safety apparel, i.e., safety glasses, long pants, a shirt with long sleeves, gloves, etc.', 'Clean the scrap aluminum thoroughly. Dry it then place it in the crucible.', 'Put the crucible in the metal melting furnace. Wait for the aluminum to melt completely.', 'Once the aluminum has melted, turn off the furnace. Remove the crucible holding the melted aluminum. Pour a teaspoonful of borax into the molten aluminum.', "Carry the crucible carefully over to the box filled with sand. Pour the melted aluminum into the cavity you've made in the sand.", 'Allow the aluminum to cool. Remove the cast aluminum from the sand.'],
    ['Dr. Cruz took out the microscope and placed it on his table. He then checked the microscope to see if it is still functional.', 'It seemed to be working, so he revolved the nosepiece until the low-power objective lens clicked into place.', 'After setting the objective lens, he adjusted the diaphragm and the mirror until he saw a bright white circle of light. This meant that the microscope was ready for use.', 'Dr. Cruz took a slide from his pocket and placed it on the stage of the microscope.', 'He then centered the slide over the opening on the stage and used the stage clips to hold it in place.', 'Dr. Cruz peered into the eyepiece and carefully turned the coarse and fine adjustment knobs until the specimen came into focus.', 'He couldn\'t believe what he saw. He switched to the high-power objective lens and focused it again on the specimen.', 'The higher resolution of the image surprised him even more.', 'Dr. Cruz immediately called his boss and reported his findings to him. His boss was very pleased with his discovery.'],
    ['Belinda unboxed her new rice cooker. She used its measuring cup to get the correct amount of rice from the rice dispenser.', "Belinda was about to rinse the rice that she got when she remembered that it was the type of rice that shouldn't be rinsed.", 'Rinsing will remove its vitamins and minerals. So instead of rinsing, Belinda decided to just soak the rice in clean water for thirty minutes.', "Belinda then took the rice cooker's pot and put the soaked rice in it, along with the correct amount of water.", 'After making sure that all the rice grains were under the water, Belinda wiped the outside of the pot with a cloth.', 'She then placed the pot inside the rice cooker. She closed the lid of the rice cooker tightly and plugged the cooker into the power outlet.', "Belinda pressed the rice cooker's switch to turn it on and waited for the rice to cook automatically.", 'After a while, the switch clicked off, telling Belinda that the rice is done.', 'Belinda waited for ten minutes before opening the lid and taking out the cooked rice.'],
    ['The watch repairman, named Jojo, turned the watch over and placed a soft pad under the crystal of the watch.', 'He then removed the metal back cover of the watch by prying it off with a very small flat screwdriver.', 'Jojo put down the back cover then carefully removed the gasket. The gasket, which looks like a rubber band, seals the watch from dirt and moisture.', "Jojo set the gasket aside and looked for the battery. It's easy to find because it's just round and shiny.", 'When Jojo located the battery, he removed it from the watch with a screwdriver.', 'He looked at the name of the battery on its back to identify it correctly.', 'Jojo immediately knew where to get the replacement battery when he read its name. He took out an identical but brand-new battery from a drawer.', 'He removed the brand-new battery from its protective wrapper and carefully installed it into the watch.', 'Jojo then reassembled the gasket and back cover of the watch, checked the watch one more time, and set it to the right time before handing it back to the owner.'],
];

// ---- Helpers (§8.4, §8.6) ----
function seq_compute_width(array $lines, int $maxWidthPx = 560, int $minWidthPx = 240, ?array $annotations = null): int {
    $charPx  = 10;
    $padX    = 50;
    $longest = 0;
    foreach ($lines as $i => $ln) {
        $extra = ($annotations !== null && isset($annotations[$i]))
               ? strlen($annotations[$i]) + 1
               : 0;
        $longest = max($longest, strlen($ln) + $extra);
    }
    return max($minWidthPx, min($maxWidthPx, $longest * $charPx + $padX));
}

// The helper adds the "1. ", "2. ", "3. " prefixes — callers should NOT
// pre-number their lines, otherwise we get "1. 1. She finished..." duplication.
// Annotations (optional, per-line) render as gray italic text after the number.
function seq_sentences_box(array $lines, int $widthPx, ?array $annotations = null): void {
    echo '<div style="width:' . $widthPx . 'px;max-width:100%;margin:20px auto;padding:16px 24px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'text-align:left;font-family:Arial,sans-serif;font-size:16pt;line-height:1.7;'
       . 'box-sizing:border-box;">';
    foreach ($lines as $i => $ln) {
        echo '<div style="margin:4px 0;">'
           . '<span style="color:#800080;font-weight:700;">' . ($i + 1) . '.</span> ';
        if ($annotations !== null && isset($annotations[$i]) && $annotations[$i] !== '') {
            echo '<span style="color:#999999;font-style:italic;font-size:13pt;">'
               . htmlspecialchars($annotations[$i]) . '</span> ';
        }
        echo htmlspecialchars($ln) . '</div>';
    }
    echo '</div>';
}

// Generate 3 distinct permutations of [1..n] that aren't the correct one.
function seq_make_distractors(array $correct, int $n, int $need = 3): array {
    $seen = [implode('-', $correct)];
    $result = [];
    $guard = 0;
    while (count($result) < $need && $guard++ < 300) {
        $perm = $correct;
        shuffle($perm);
        $key = implode('-', $perm);
        if (!in_array($key, $seen, true)) {
            $result[] = $perm;
            $seen[] = $key;
        }
    }
    return $result;
}

// ---- Answer processing (§7) ----
$result = null; $scorer = null;
if (isset($_GET['ansclick'], $_SESSION[$sessionKey]['current']) && !isset($_POST['Submit2'])) {
    $cur     = $_SESSION[$sessionKey]['current'];
    $clicked = (string)$_GET['ansclick'];
    $scorer  = new Scorer($conn, $moduleId);
    $isCorrect = $scorer->processAnswer($clicked, $cur['correct'], $cur['lvl']);
    $result  = ['correct' => $isCorrect, 'clicked' => $clicked, 'cur' => $cur];
    unset($_SESSION[$sessionKey]['current']);
}

// ---- Question generation (§6) ----
if ($result === null || isset($_POST['Submit2'])) {
    $pool = resolve_seq_pool($lvl, $grd, $easySimple, $mparagraph);

    // No-repeat tracking (key by pool content fingerprint)
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        $key = md5(implode('|', $item));
        if (!in_array($key, $used, true)) {
            $available[$i] = ['item' => $item, 'key' => $key];
        }
    }
    if (empty($available)) {
        $used = [];
        foreach ($pool as $i => $item) {
            $available[$i] = ['item' => $item, 'key' => md5(implode('|', $item))];
        }
    }
    $idx = array_rand($available);
    $pick = $available[$idx];
    $used[] = $pick['key'];
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;

    $correctOrder = $pick['item'];
    $n = count($correctOrder);

    // Shuffle display order
    $displayIdx = range(0, $n - 1);
    shuffle($displayIdx);    $displaySentences = [];
    $storyToDisplay   = [];  // story index (0-based) => display position (1-based)
    foreach ($displayIdx as $pos => $storyIdx) {
        $displaySentences[]        = $correctOrder[$storyIdx];
        $storyToDisplay[$storyIdx] = $pos + 1;
    }

    // Correct answer = display positions listed in story order
    $correctPerm = [];
    for ($s = 0; $s < $n; $s++) {
        $correctPerm[] = $storyToDisplay[$s];
    }

    $answerStr = implode('-', $correctPerm);
    $distractors = seq_make_distractors($correctPerm, $n, 3);

    $choices = [['perm' => $correctPerm, 'str' => $answerStr, 'correct' => true]];
    foreach ($distractors as $d) {
        $choices[] = ['perm' => $d, 'str' => implode('-', $d), 'correct' => false];
    }
    shuffle($choices);

    $_SESSION[$sessionKey]['current'] = [
        'display'         => $displaySentences,
        'correctOrder'    => $correctOrder,
        'correct'         => $answerStr,
        'choices'         => $choices,
        'storyToDisplay'  => $storyToDisplay,
        'lvl'             => $lvl,
    ];
}

// ---- Render (§8, §9, §10) ----
$theme = [
    'top_banner'=>$base.'/math/images/images/paper-69-top.jpg',
    'title_bg'=>$base.'/math/images/images/paper-69-top2.jpg',
    'left_side'=>$base.'/math/images/images/paper-69-left.jpg',
    'right_side'=>$base.'/math/images/images/paper-69-right.jpg',
    'content_bg'=>$base.'/math/images/images/paper-69-content.jpg',
    'bottom_banner'=>$base.'/math/images/images/paper-69-bottom.jpg',
    'score_top'=>$base.'/math/images/score-top-1.jpg',
    'score_bottom'=>$base.'/math/images/score-bottom-1.jpg',
];
render_header($moduleTitle.' - Grade '.$grd.' - '.$lvl, $moduleTitle.' - Grade '.$grd.' - '.$lvl, $theme);
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $correctEsc = htmlspecialchars($cur['correct']);

    // Raw sentences + per-story-slot display annotations
    $correctLines = $cur['correctOrder'];
    $annotations  = [];
    foreach ($cur['correctOrder'] as $storyIdx => $sentence) {
        $displayNum    = $cur['storyToDisplay'][$storyIdx] ?? '?';
        $annotations[] = '[was #' . $displayNum . ']';
    }
    $correctBoxW = seq_compute_width($correctLines, 560, 240, $annotations);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:520px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:16pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:520px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:15pt;font-weight:600;color:#800080;margin:10px auto 0;max-width:520px;">
    The sentences in the correct order are:
  </p>
  <?php seq_sentences_box($correctLines, $correctBoxW, $annotations); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:520px;margin:10px auto;">
    Correct answer: <strong style="color:#CC0066;font-size:15pt;"><?php echo $correctEsc; ?></strong>
  </p>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:35px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];

    // Raw sentences — helper adds the 1. 2. 3. prefixes (no caller numbering)
    $displayLines = $q['display'];
    $displayBoxW = seq_compute_width($displayLines);

    // Longest choice determines shared button width
    $maxChoiceLen = 0;
    foreach ($q['choices'] as $ch) $maxChoiceLen = max($maxChoiceLen, strlen($ch['str']));
    $choiceWidthPx = max(160, min(400, $maxChoiceLen * 14 + 60));
?>
  <div style="margin:30px auto 15px;font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:#800080;max-width:520px;text-wrap:balance;">
    Read the sentences below and determine their correct sequence.
  </div>
  <?php seq_sentences_box($displayLines, $displayBoxW); ?>
  <div style="display:flex;flex-direction:column;align-items:center;gap:10px;width:fit-content;margin:8px auto 20px;padding:0 8px;box-sizing:border-box;">
    <div style="margin:0 auto 6px;font-family:Arial,sans-serif;font-size:14pt;font-weight:500;color:#888888;max-width:520px;text-wrap:balance;">
      Click on the correct order of the sentences:
    </div>
  <?php foreach ($q['choices'] as $ch): ?>
    <a href="?ansclick=<?php echo urlencode($ch['str']); ?>"
       style="display:flex;align-items:center;justify-content:center;
              width:<?php echo $choiceWidthPx; ?>px;min-height:60px;padding:14px 20px;
              border:2px solid #888888;border-radius:8px;background:#fff;
              text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
              font-size:20pt;font-weight:700;text-align:center;letter-spacing:1px;
              word-break:break-word;box-sizing:border-box;line-height:1.3;">
      <?php echo htmlspecialchars($ch['str']); ?>
    </a>
  <?php endforeach; ?>
  </div>
  <input type="submit" name="Submit2" value="New Question" style="display:block;margin:40px auto;font-family:Arial,sans-serif;font-size:11pt;">
<?php endif; ?>
  <div align="center" style="margin-top:20px;">
    <p style="margin-bottom:0;color:#000080;font:10pt Arial,sans-serif;">Select difficulty level for next question:</p>
    <table border="0" width="80%" cellspacing="0" cellpadding="0" style="margin:0 auto;"><tr>
    <?php foreach ($levels as $l): ?>
      <td align="center">
        <label style="font:9pt Arial,sans-serif;color:#800080;">
          <input type="radio" name="level" value="<?php echo $l; ?>" <?php echo $lvl === $l ? 'checked' : ''; ?>> <b><?php echo $l; ?></b>
        </label>
      </td>
    <?php endforeach; ?>
    </tr></table>
  </div>
</form><br>
<?php render_score_box(); ?>
</div>
<?php
if ($scorer !== null) $scorer->outputConsoleDebug();
$conn->close();
render_footer();
?>