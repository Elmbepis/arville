<html>
<head>
<body>

<?php
$_SESSION['title']="Identifying Text Types";

if ($grd<3){
$questions=array(

"Which of these is a procedural text?=First, pour milk into the cup. Then, stir it with a spoon.>We painted pictures in art class.+I ate cereal and went to the park.<I visited my cousin last weekend.",
"Which of these is a procedural text?=Next, turn on the blender. Then, add the fruit and yogurt.>We saw a parade and clapped loudly.+I woke up, got dressed, and walked to school.<I read a story before bed.",
"Which of these is a procedural text?=Wash the apples then cut them into slices.>We went shopping and bought apples.+I saw a cat and followed it to the tree.<I walked home with my sister.",
"Which of these is a procedural text?=Tie the string to the balloon. Then, let it go.>I took my dog for a walk and gave it a treat.+We played soccer after school.<I brushed my teeth and went to sleep.",
"Which of these is a procedural text?=Get a napkin then wipe your hands clean.>I opened my birthday gift and hugged my dad.+I helped clean the table and wash the dishes.<I saw fireworks and shouted with joy.",
"Which of these is a procedural text?=First, crack two eggs. Then, whisk them in a bowl.>We built a snowman and put a hat on it.+My mom and I baked cookies last night.<We sang songs on the way home.",
"Which of these is a procedural text?=Fill a pot with soil then place the seed inside.>My brother and I rode our bikes down the hill.+I planted a seed and watched it grow.<I saw my friend and waved hello.",
"Which of these is a procedural text?=Fold the paper in half. Then, draw a heart on the front.>We watched cartoons and ate popcorn.+I drew a picture and gave it to my teacher.<We took a walk after dinner.",
"Which of these is a procedural text?=Gather your markers then color the rainbow.>I had lunch with my cousins and laughed a lot.+We visited the zoo and saw the monkeys.<My dad helped me fix my toy.",
"Which of these is a procedural text?=First, press the power button. Then, wait for the screen to light up.>I played tag and jumped rope at recess.+My sister and I danced to music in the living room.<I brushed my hair before school.",
"Which of these is a procedural text?=Scoop the rice. Then, add the meat on top.>I opened the door and saw my dog waiting.+We ate dinner and watched a movie.<I gave my friend a birthday card.",
"Which of these is a procedural text?=First, pick your paint colors. Then, use a brush to paint your name.>I helped my dad wash the car and dry it.+We went fishing at the lake.<I told a joke, then everyone laughed.",
"Which of these is a procedural text?=Add soap to the sponge then scrub the plate.>I saw a rainbow and took a picture of it.+My grandma and I made soup and talked.<I went to sleep after reading a book.",
"Which of these is a procedural text?=Open the lunchbox then take out the sandwich and juice.>I heard thunder and ran inside.+I colored a picture with my sister.<I put on my shoes and walked outside.",
"Which of these is a time-order text?=I got a new toy, opened the box, and started playing.>Fold the clothes then put them in the drawer.+Next, cut out the picture and glue it to the paper.<First, stack the books. Then, carry them to the shelf.",
"Which of these is a time-order text?=She ran down the hill and tripped over a rock.>First, pour the cereal. Then, add the milk.+Take out your homework then check your answers.<Next, color the picture. Then, hang it on the wall.",
"Which of these is a time-order text?=My dad drove me to school, and I waved goodbye.>First, wash your hands. Then, dry them with a towel.+Grab the paintbrush then dip it in the paint.<Next, put the lid on the jar and shake it.",
"Which of these is a time-order text?=I got off the bus and saw my mom waiting.>Pick up the trash. Then, put it in the bin.+Draw the face then color it.<Next, stack the blocks and build a wall.",
"Which of these is a time-order text?=My brother fell and scraped his knee, so I helped him.>First, crack the egg. Then, stir it with a fork.+Fill the bucket then water the plants.<Lastly, fold the paper into a triangle and press down.",
"Which of these is a time-order text?=I read my favorite book and then took a nap.>First, open the lid. Then, pour in the juice.+First, gather the crayons. Then, draw your picture.<Lastly, take a photo and print it out.",
"Which of these is a time-order text?=We walked to the park, then played on the swings.>Mix the paint then use it on the paper.+Fold the paper then cut out the shape.<After that, draw a house and add windows.",
"Which of these is a time-order text?=I got a gold star and felt proud.>First, open the workbook. Then, find page ten.+Roll the dough then use a cookie cutter.<Next, color the sun and draw clouds.",
"Which of these is a time-order text?=They sang songs, laughed, and had fun at the party.>First, write your name. Then, draw a big star.+Click the icon then play the game.<Then, glue the pieces together and press hard.",
"Which of these is a time-order text?=I dropped my ice cream and felt sad.>Open the jar then spread the jam.+First, cut the string. Then, tie the balloon.<Next, scoop the sand and build a hill.",
"Which of these is a time-order text?=She opened the window and felt the cool breeze.>First, get a cup. Then, fill it with juice.+Pick up the crayons and color the picture.<Next, place the sticker on your shirt.",
"Which of these is a time-order text?=I gave my friend a hug and smiled.>First, choose your paint color. Then, paint the sun.+Wash the grapes then put them in a bowl.<Next, cut the shapes and paste them in your notebook.",
"Which of these is a time-order text?=He saw a butterfly and followed it through the garden.>Take out the clay then shape it into a ball.+First, plug in the fan. Then, press the button.<Then, tear out the page and fold it twice.",
"Which of these is a time-order text?=I slipped on the floor, but then I laughed.>First, scoop the batter. Then, bake it in the oven.+Peel the banana then eat it.<Lastly, put your things away and line up.",
"Which of these is a time-order text?=He opened the gift and jumped up with excitement.>Cut the picture then paste it in your journal.+First, tap the screen. Then, pick a color.<After that, fold the napkin and place it on the plate.",

);

}
if ($grd>=3){

$questions=array(

"Which of the following is an example of a time-order text?=I woke up, had breakfast, and rode my bike to school.>A giraffe has a long neck, spots, and a short tail+To tie your shoes, first cross the laces, then pull them tight.<Plants make food through a process called photosynthesis.",
"Which of the following is an example of a time-order text?=My family went camping last weekend and we roasted marshmallows.>The sunflower has bright yellow petals and a thick stem.+Gather your materials then cut and glue the paper.<Gravity pulls objects toward Earth.",
"Which of the following is an example of a time-order text?=I got on the bus, found a seat, and looked out the window.>Volcanoes erupt when pressure builds up inside them.+Mix the flour and water. Then, roll the dough.<A rainbow has seven beautiful colors that appear in a curve.",
"Which of the following is an example of a time-order text?=Yesterday, I went to the store, bought apples, and made a pie.>The frog has long legs and smooth, green skin.+Earth rotates on its axis, causing day and night.<Plug in the toaster then insert the bread.",
"Which of the following is an example of a time-order text?=I visited the museum, saw dinosaurs, and took pictures.>A lion has sharp teeth, a golden mane, and a strong body.+To draw a star, start with two crossing lines, then add two more.<Sound travels in waves through air, water, or solid materials.",
"Which of the following is an example of a time-order text?=I opened the gift, smiled, and thanked my grandma.>The cheetah is fast, with spots and a long tail.+Lightning forms when clouds build up electric energy.<First, grab the ruler. Then, draw a straight line.",
"Which of the following is an example of a time-order text?=Last weekend, I played soccer, ate ice cream, and watched a movie.>To make a sandwich, first spread the peanut butter, then add jelly.+The clouds were fluffy, white, and shaped like animals.<Water turns into steam when it is heated.",
"Which of the following is an example of a time-order text?=I got ready for bed, brushed my teeth, and read a story.>Sharks are large, fast swimmers with many teeth.+A plant grows best when it gets water and sunlight.<Measure the paper then fold it in half.",
"Which of the following is an example of a procedural text?=Open the can of paint then dip your brush.>The elephant is big and gray with a long trunk.+The sun gives off light and heat that warm the Earth.<On Monday, I went to the zoo and saw lions.",
"Which of the following is an example of a procedural text?=First, open the book. Then, read the instructions carefully.>I saw a dog chasing a squirrel in the park.+Tigers have orange fur with black stripes.<Thunder happens when lightning heats the air quickly.",
"Which of the following is an example of a procedural text?=To build a tower, stack the blocks one by one.>I got home, took off my shoes, and grabbed a snack.+Water boils when heated to 100 degrees Celsius.<The bird has red feathers and a small beak.",
"Which of the following is an example of a procedural text?=To plant a seed, dig a hole, place the seed, and cover it with soil.>The desert is hot, dry, and full of sand.+I visited my grandma, baked cookies, and played cards.<Rain forms when clouds get too heavy with water.",
"Which of the following is an example of a procedural text?=Next, fill a pot with water then boil it on the stove.>The moon looks gray and has many craters.+I picked up my backpack, ran to class, and found my seat.<The heart pumps blood through the body.",
"Which of the following is an example of a procedural text?=Get some paper. Then, cut it into small shapes.>Leaves are green and grow on branches.+I went to the beach, swam in the sea, and collected shells.<Dinosaurs lived millions of years ago and became extinct.",
"Which of the following is an example of a procedural text?=Gather your pencils then write your name on the test.>Bees make honey by collecting nectar from flowers.+My family played board games on Sunday afternoon.<The penguin is black and white with a smooth coat.",
"Which of the following is an example of a procedural text?=Lastly, connect the sticks then attach the string.>I took a bath, dried off, and put on my pajamas.+The kangaroo has strong legs and a pouch.<Sound is made when something vibrates.",
"Which of the following is an example of a description text?=The butterfly has colorful wings, a tiny body, and long antennae.>First, mix the sugar and flour. Then, add eggs.+I ran home from school, opened the door, and saw my cat.<Photosynthesis helps plants make their food using sunlight.",
"Which of the following is an example of a description text?=The desert has tall cacti, dry sand, and no rain.>Plug in the fan then press the power button.+I went to the circus and saw clowns and animals.<Rain happens when clouds release water drops.",
"Which of the following is an example of a description text?=The tiger is orange with black stripes and big paws.>My dog barked, chased a ball, and jumped on me.+First, stir the soup. Then, let it cool.<Lightning forms from static electricity in clouds.",
"Which of the following is an example of a description text?=The snow was white, fluffy, and cold to the touch.>Grab the ball then pass it to your friend.+I went to the park, ate lunch, and played.<Earth rotates, making day and night.",
"Which of the following is an example of a description text?=The apple is round, red, and juicy with a small stem.>I ate lunch, cleaned up, and played outside.+First, open the lid. Then, pour in the drink.<A rainbow appears after rain when sunlight hits the drops.",
"Which of the following is an example of a description text?=The forest is green, full of tall trees and singing birds.>Next, write your name then answer the questions.+I got dressed, had breakfast, and left for school.<Shadows form when an object blocks the light.",
"Which of the following is an example of a description text?=The ocean is deep, blue, and full of fish.>I got a new bike, rode it, and fell off!+First, take out your scissors. Then, cut the shapes.<The water cycle moves water through the air, land, and sea.",
"Which of the following is an example of a description text?=The cheetah is fast, with a long tail and spotted fur.>Open the book and read the first page.+Yesterday, I went to a party and ate cake.<Clouds form when water vapor cools.",
"Which of the following is an example of an explanation text?=The sun causes seasons by changing how much light reaches parts of Earth.>Open the drawer then find your paper.+I baked cookies, waited for them to cool, and ate them.<A turtle has a hard shell, short legs, and moves slowly.",
"Which of the following is an example of an explanation text?=Earthquakes happen when the plates of the Earth move suddenly.>I cleaned my room and put away my toys.+First, take a bowl. Then, pour in the cereal.<The giraffe has a long neck and brown spots.",
"Which of the following is an example of an explanation text?=We see stars at night because the sky is darker without sunlight.>A spider has eight legs and spins webs.+Cut the fruit then blend it.<I fed the cat, then brushed her fur.",
"Which of the following is an example of an explanation text?=Rain falls when clouds become heavy with water.>My family went to the park and flew kites.+The elephant has big ears and a long trunk.<First, take the dough. Then, bake it.",
"Which of the following is an example of an explanation text?=Leaves change color in autumn because of less sunlight.>I slipped on ice, but I was okay.+A fish has scales, fins, and gills.<Fold the paper then draw a picture.",
"Which of the following is an example of an explanation text?=The moon looks big at night because it is closer to Earth.>I took out my crayons and colored the page.+Next, turn on the light and sit down.<The duck is white with an orange beak.",
"Which of the following is an example of an explanation text?=Clouds form when water vapor cools into droplets.>Next, take the crayons. Then, color the shape.+I visited my cousin and we baked cookies.<A penguin is black and white with small wings.",
"Which of the following is an example of an explanation text?=Shadows form when something blocks the light.>Open your notebook and copy the lesson.+I played with my friends and laughed a lot.<A horse has a mane, tail, and strong legs.",

);

}

?>

</head>

</body>

</html>