<?php
// english/modules/spelling.php
// Spelling — click the correctly spelled word for the given hint.
// 10 tiers via (level × grade); grade from $_SESSION['user_grade'] (0–10).
// Easy &#8594; max(1, min(8, grd))      (legacy Easy: $arrnum=$grd; clamp at 8)
// Hard &#8594; max(1, min(10, grd+2))   (legacy Hard: $arrnum=$grd+2; clamp at 10;
//                                  legacy Medium folded into Hard)
// 4 choices always in a 2×2 grid: 1 correctly spelled word + 3 misspellings.

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
$moduleTitle = 'Spelling';
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

// ---- Tier mapping (§4) ----
function resolve_spelling_tier(string $lvl, int $grd): int {
    if ($lvl === 'Easy') return max(1, min(8, $grd));
    return max(1, min(10, $grd + 2));
}

// ---- Raw data (§5) — verbatim from legacy, one typo fixed ----
// Format: "hint+correct?wrong1=wrong2=wrong3"
// NOTE: 'to argue angrily+quarrel?quarel=quarrell=quarelle' — legacy was missing
// the '?' between correct and wrong1; restored so the parser doesn't break.
$rawData = [
    1 => [
        "an animal with horns+deer?dear=daer=dare",
        "a living thing with roots and leaves+tree?three=thre=treee",
        "part of the body you use for hearing+ears?ares=aers=eras",
        "a small insect+ant?aunt=ante=unt",
        "place where we live+house?hose=huose=hous",
    ],
    2 => [
        "part of the body you use for tasting food+tongue?tang=toung=tounge",
        "what we use to buy things+money?monny=monney=mony",
        "a place where we go to study+school?sckool=schol=scool",
        "a fruit+pear?peer=fear=pare",
        "sense by touching+feel?peel=fill=feal",
        "an additional thing of the same kind+another?anothere=anotther=annother",
        "male sibling+brother?bother=bothere=brothere",
        "female sibling+sister?sistre=sistere=sisterr",
        "male parent+father?fathere=fatther=fatherr",
        "female parent+mother?moter=mather=motther",
        "two or more persons+people?pepole=peopel=peopol",
        "very nearly+almost?allmost=almmost=allmose",
        "a problem or difficulty+trouble?truoble=troble=throwble",
        "took quickly by hand+grabbed?grubbed=grabed=grobbed",
        "a mammal that lives in the sea+whale?whail=whael=wheal",
        "go after+follow?fallow=fellow=follaw",
        "run after+chase?chose=chess=chaise",
        "what we need to see things+light?lihgt=lithg=ligth",
        "hard to fit+tight?tihgt=tithg=tigth",
        "clever or smart+bright?brihgt=brithg=brigth",
        "great fear+fright?frihgt=frithg=frigth",
        "true or correct+right?rihgt=rithg=rigth",
        "watch over or protect+guard?gard=gaurd=garde",
        "one of our senses+touch?tuoch=touhc=touche",
        "used for covering the body+clothes?clotes=cloths=clohtes",
        "living things that move and eat+animals?animasl=annimals=animmals",
        "first part of the day+morning?mornning=mourning=morening",
        "a large place with many trees and plants+forest?forrest=foresst=fourest",
        "to give knowledge to another person+teach?teache=taech=teacche",
        "to have the same sound as another word+rhyme?rhime=ryhme=rihme",
        "a small house+cottage?cottege=cattage=cuttage",
        "an animal that climbs trees+monkey?monkee=munkey=monky",
        "a person close to you+friend?frend=freind=freand",
    ],
    3 => [
        "very eager to see or do something+excited?ecxited=exited=excitted",
        "for the reason that+because?becuase=becouse=becost",
        "a big animal with a trunk+elephant?elepant=elaphant=eliphant",
        "a mammal that lives in the sea+dolphin?dolphine=dolpine=dolphinne",
        "most liked among others+favorite?favoritte=favorrite=favorit",
        "a person who lives near one's home+neighbor?nieghbor=neigbor=neighboar",
        "reply to a question+answer?answere=ansswer=awnser",
        "the point at which something starts+beginning?begining=beggining=begginning",
        "accept as true+believe?beleive=belive=beilive",
        "to get something from someone+receive?recieve=receve=recive",
        "required to be done+necessary?neccessary=necesary=neccesary",
        "an idea or something that comes from thinking+thought?thuoght=thouhgt=thougth",
        "afraid or terrified+frightened?frightenned=frighttened=frihgtened",
        "taking place or going on+happening?happenning=hapening=hapenning",
        "not always+sometimes?somtimes=sumtimes=sometimed",
        "present in one place at the same time+together?toggether=togetter=togather",
        "a water sport+swimming?swwimming=swiming=swimminng",
        "past tense of catch+caught?cauhgt=cought=caugth",
        "to begin to grow+sprout?sproot=spout=sproud",
        "the act of flying+flight?flihgt=flithg=fligth",
        "something that your eyes give you+sight?sihgt=sithg=sigth",
        "not crooked+straight?straihgt=straithg=straigth",
        "from one side to the other+across?accross=accros=accrros",
        "something that rises in the air+balloon?baloon=ballon=balloone",
        "to feel great sorrow+grieve?greive=greave=griev",
        "showing great pleasure+delighted?delihgted=delithged=deligthed",
        "to discover where something is+locate?lokate=locait=lokait",
        "to argue angrily+quarrel?quarel=quarrell=quarelle",
        "a rough or noisy fight+brawl?braul=broul=browl",
        "wild or forceful+fierce?feirse=feirce=fierse",
        "past tense of teach+taught?thaught=taugth=thought",
        "being away from a place+absence?abcense=abssence=absense",
        "simple past tense of buy+bought?bougth=buoght=bouhgt",
        "the second month of the year+February?Febrary=Febuary=Februarry",
        "the fourth day of the week+Wednesday?Wenesday=Wennesday=Wendesday",
        "a theatre where films are shown for public entertainment+cinema?cinnema=cinemma=sinema",
    ],
    4 => [
        "stop being visible+disappear?dissapear=dissappear=disapear",
        "fail to meet expectations+disappoint?dissapoint=dissappoint=disapoint",
        "a large reptile+alligator?aligattor=alligattor=aligatore",
        "cause someone to feel awkward+embarrass?embarass=embarras=embaras",
        "the surroundings in which a person, animal, or plant lives+environment?enviroment=envirnoment=enviromnent",
        "in at one side and out at the other+through?though=true=throuhg",
        "the study of the universe through observations and experiments+science?sceince=sceiance=scieince",
        "state of the atmosphere at a given place and time+weather?wether=whether=weathere",
        "a word that expresses two choices+whether?wether=weather=wheather",
        "an unfortunate event+accident?acident=acciddent=aciddent",
        "confidence in someone or something+belief?beleif=beleaf=beleief",
        "the way that someone or something looks+appearance?appearence=appearrence=appearrance",
        "in the most essential respects+basically?basicly=basicaly=basiclly",
        "very strange or unusual+bizarre?bizzare=bizare=bizzarre",
        "the practice of making one's living by engaging in commerce+business?buisness=biusness=buisiness",
        "able to be predicted+foreseeable?forseeable=fourseeable=foreseable",
        "to disturb again and again+harass?harrass=harras=haras",
        "a portable musical instrument+accordion?accorrdion=acordion=acorrdion",
        "a person trained to give guidance+counselor?councilor=counsilor=councelor",
        "impossible or not easy to believe+incredible?inccredible=incredibble=incrediblle",
        "electrical discharge from the sky+lightning?lighting=lightining=lihgtning",
        "something that makes one curious+interesting?interresting=intresting=interessting",
        "to propel or cast in any way+throw?true=thru=through",
        "used in traveling+baggage?bagage=baggagge=bagagge",
        "the act of forming a fabric by looping yarn+knitting?kneating=kneeting=kniting",
        "a given task+assignment?assigment=assingment=asignment",
        "to feel or show sorrow for the death of someone+mourn?muorn=mourne=morne",
        "a gas that keeps us alive+oxygen?oxigen=oxygin=oxygene",
        "to protect from harm or danger+defend?depend=deffend=defende",
        "speed of movement or action+haste?haise=hasse=haist",
        "a place where people pay to sit and eat meals+restaurant?restorant=restuarant=restaurrant",
        "shining brightly with flashes of light+sparkling?sparkleing=sparkiling=sparklling",
        "a cabinet that's used for storing things+cupboard?capbourd=cupbourd=capboard",
        "the back of a person's neck+nape?naep=naipe=knape",
        "to make something very wet+drench?dranch=drenche=drunch",
        "an ideal place or state+paradise?paradice=paradyse=paradeis",
        "the state of great comfort and extravagant living+luxury?luxsry=luxsury=laxury",
        "a person who trains people or animals+trainer?trainner=trianer=trainear",
    ],
    5 => [
        "requiring careful handling+delicate?delliccate=dellicate=deliccate",
        "the presence of harmful substances in an environment+pollution?polution=pollusion=polusion",
        "a thing done successfully by effort+achievement?acheivement=achievment=acheivment",
        "having an attractive or fascinating quality+glamorous?glamoruos=glamouruos=glamouros",
        "reach or attain+achieve?acheive=achiev=achieive",
        "an exchange of diverging or opposite views+argument?arguement=argeument=agreement",
        "something that leads to amusement or laughter+humorous?humurous=humoruos=humuorous",
        "break the continuity+interrupt?interupt=intterupt=interruptt",
        "lung inflammation+pneumonia?pneumonea=pnewmonia=pnuemonia",
        "to be liked better than another+preferred?prefered=prefferred=preffered",
        "put forward someone or something with approval+recommend?reccommend=recomend=reccomend",
        "a formal promise or assurance+guarantee?guarrantee=guaranttee=garantee",
        "brave+courageous?corageous=cuorageous=courageuos",
        "at an earlier time+previously?previuosly=priviously=prevoiusly",
        "experiencing worry or unease+anxious?anxiuos=anxoius=anxuous",
        "a plant disease+blight?blihgt=blithg=bligth",
        "a form of public entertainment+pageant?pagaent=paegent=pagent",
        "a faulty stroke+miscue?misscue=misque=missque",
        "done completely+thorough?thorouhg=torough=thourogh",
        "a young bird+fledgling?fledging=feldgling=feldging",
        "brave+courageous?courageuos=couragous=couragoues",
        "a very rich person+millionaire?millionnaire=millionairre=millionair",
        "idle talking+gossiping?gosiping=gossipping=gosipping",
        "a short introduction to a book+foreword?forworde=forword=foreward",
        "happening+occurring?occuring=ocourring=ocurring",
        "express in a shorter form+summarize?sumarize=summarrize=sumarrize",
        "the presence of persons+attendance?atendance=attenddance=attendannce",
        "a ghost or spirit+phantom?phanttom=pahntom=panthom",
        "a trial of skill in some game+tournament?tuornament=tournamment=tornament",
        "rough in texture+coarse?couarse=course=coarsse",
        "an agreement between enemies or opponents to stop fighting or arguing for a certain time+truce?truse=trues=thruce",
        "a thing that is kept as a reminder of a person, place, or event+souvenir?souveneir=souvenier=soughvenir",
    ],
    6 => [
        "related to land+terrestrial?terrestial=terestrial=terestial",
        "provide lodging or sufficient space for+accommodate?accomodate=acomodate=acommodate",
        "pursuing one's aims and interests forcefully+aggressive?agressive=agresive=aggresive",
        "as far as one knows or can see+apparently?apparantly=aparently=aparrently",
        "particularly+especially?ispecially=especialy=espicially",
        "related to grammar+grammatical?gramatical=grammattical=gramattical",
        "prevent from happening+preclude?precleud=preclued=perclude",
        "happening by chance+incidentally?incidently=incidentaly=incidenttaly",
        "a region in North America+Caribbean?Carribean=Caribean=Carribbean",
        "exceptional+phenomenal?phenommenal=phennomenal=phenomennal",
        "the action of assassinating someone+assassination?assasination=asasination=asassination",
        "a person employed to drive a private or rented automobile+chauffeur?chauffer=chaufer=chuaffer",
        "a person with whom one works+colleague?collaegue=coleague=colleage",
        "a group of people who are chosen to do a particular job+committee?commitee=comittee=comitee",
        "having knowledge of something+conscious?concious=conciuos=conciuous",
        "a strong desire to know or learn something+curiosity?curiousity=curiuosity=curoiusity",
        "a difficult situation or problem+dilemma?dilemna=dillema=dillemma",
        "too attractive and tempting to be resisted+irresistible?irresistable=iresistable=iresistible",
        "establish a working relationship+liaise?liase=laise=liaese",
        "a period of a thousand years+millennium?millenium=milenium=milennium",
        "thousands of years+millennia?millenia=milenia=milennia",
        "a perforated bowl+colander?collander=colandder=colanther",
        "acceptable or valid+admissible?admisible=admmissible=admmisible",
        "a heavily protected and impenetrable building+fortress?fourtress=portress=forthress",
        "lacking in variety and interest+monotonous?monotonuos=monnotonous=monutonous",
        "the inner sense of what is right or wrong+conscience?consceince=consience=consciense",
        "a garden vegetable+broccoli?brocolli=brocoli=broccolli",
        "acceptable in quality or quantity+adequate?adeqaute=adequatte=addequate",
        "a booklet without a hard cover+pamphlet?pampleth=phamplet=pamplhet",
        "happy and carefree+blithe?blihte=blith=blite",
        "treatment for healing a disorder+therapy?theraphy=teraphy=thearapy",
        "to leave completely and finally+abandon?abbandon=abanddon=abandone",
        "not named or identified+anonymous?anonymuos=annonymous=anonymmous",
        "something that makes movement difficult or impossible+blockage?blocage=blokage=blokcage",
        "a university teacher+professor?proffesor=proffessor=profesor",
        "someone who buys something+customer?costumer=custumer=costomer",
        "a person who freely offers to undertake a task+volunteer?vollunteer=voluntere=volounteer",
        "not strong; easily broken or damaged+fragile?fragille=frajile=frageil",
        "a time of intense difficulty or danger+crisis?crissis=crisys=crysis",
        "a large cage or enclosure for keeping birds in+aviary?avairy=abiary=aviarey",
    ],
    7 => [
        "readiness to attack or confront+aggression?agression=agresion=aggresion",
        "a convenient arrangement+accommodation?accomodation=acomodation=acommodation",
        "when one moving object strikes against another+collision?collition=colission=collission",
        "adequate+sufficient?suficient=sufficcient=sufficent",
        "something that has been achieved successfully+accomplishment?acomplishment=accommplishment=acommplishment",
        "went somewhere with someone+accompanied?acompanied=accompannied=acommpanied",
        "the date on which an event took place in a previous year+anniversary?aniversary=anniverssary=aniverssary",
        "the state or fact of being impossible+impossibility?imposibility=impossibilitty=impossibillity",
        "a complaint or resentment+grievance?greivance=grivance=grevance",
        "a choice limited to one of two or more possibilities+alternative?altternative=alternnative=alternattive",
        "support+assistance?assisstance=asistance=asisstance",
        "an independent administrative unit+bureau?burreau=beaureau=beureau",
        "dedicated and loyal to a cause+committed?comitted=commited=comited",
        "properly qualified+competent?compettent=commpetent=compitent",
        "not easily accessible+inconvenient?inconveneint=imconvenient=inconvennient",
        "guiltlessness+innocence?innoccence=inocence=inoccence",
        "incapable of being withstood+irresistible?iresistible=irresisttible=irrisistible",
        "annoying+nuisance?nuissance=niusance=niussance",
        "moved from one place to another+transferred?transfferred=transfered=tranferred",
        "not essential+unnecessary?unecessary=unnecesary=unneccessary",
        "a shortened or contracted form of a word or phrase+abbreviation?abreviation=abbrevaition=abbreviasion",
        "an organization of people+association?asociation=associattion=assocciation",
        "at once or instantly+immediately?immedieatly=imediately=immidiately",
        "a debt secured by a borrower using property as collateral+mortgage?morgage=morthgage=mortggage",
        "implying or suggesting a mystery+mysterious?mysteriuous=mysteriuos=mysterrious",
        "the right to receive a number of issues of a periodical for a sum paid+subscription?subscripsion=subcripsion=subcription",
        "hypothetical+supposedly?suppossedly=supposely=supossedly",
        "a list of questions+questionnaire?questionnair=questionaire=questionair",
        "a musical composition for an orchestra+symphony?sympony=syhmpony=simphony",
        "a mode of behavior or way of thought peculiar to an individual+idiosyncrasy?idiosyncracy=idiosyncrazy=idiocyncrasy",
        "to cause pain or trouble+afflict?aflict=afflect=aflect",
        "similarity or correspondence between different things+symmetry?symetry=symmettry=symettry",
        "a high-level branch of mathematics+calculus?calcculus=callculus=calcullus",
        "hard work+drudgery?drudggery=drudgerry=dradgery",
        "a perennial vegetable+rhubarb?rhubharb=rhubbarb=ruhbarb",
    ],
    8 => [
        "wishing to do what is right+conscientious?consceintious=conscientiuous=conscientiuos",
        "a special right, immunity, or exemption+privilege?privilage=previlege=privelege",
        "habituated+accustomed?acustomed=accustumed=accostumed",
        "the act of gaining possession+acquisition?acqiusition=acquissition=acquisittion",
        "nuisance+annoyance?annoyannce=anoyance=anoyannce",
        "emitting light after absorbing some rays+fluorescent?florescent=flourescent=florrescent",
        "lively and animated+vivacious?vivaciuos=vivacuous=vavicious",
        "aggressively hostile+belligerent?belligerrent=beligerent=billigerent",
        "a sudden and widespread disaster+catastrophe?cathastrophe=catastrope=catastrophy",
        "something that discourages or prevents+deterrent?detterrent=deterent=detterent",
        "inconsistency+discrepancy?discrepanzy=discripancy=discrepansy",
        "injured by frost or extreme cold+frostbitten?frozebitten=frostbiten=frozebiten",
        "a person known to one, but usually not a close friend+acquaintance?acqauintance=acquainttance=aquaintance",
        "preceding+antecedent?anticedent=antecident=anticident",
        "to crowd around+besiege?beseige=bisiege=biseige",
        "a white flower with a yellow center+chrysanthemum?crysanthemum=chrysantemum=chrysanthenum",
        "stopping or ceasing for a time+intermittent?intermmittent=intermitent=intermmitent",
        "what someone that meddled with something did+interfered?interferred=interffered=intrefered",
        "coming before something in time or position+preceding?preceeding=proceeding=preciding",
        "a Jewish house of worship+synagogue?synagouge=synagoug=synagoge",
        "incorrect+erroneous?erronneous=erronous=erronuous",
        "an award or privilege+accolade?accollade=acolade=acollade",
        "juicy or fleshy+succulent?succullent=sucullent=succelent",
        "every now and then+occasionally?occassionally=ocassionally=occasionaly",
        "fat or round+bulbous?boulbous=bulbuos=bulbuous",
        "evoking strong emotions such as sadness or regret+poignant?piognant=poingnant=poingant",
        "the act of yielding something+concession?concesion=consession=concission",
        "invent or do something without preparation+improvise?improvice=improbise=improbice",
        "as good as or better than others+competitive?competetive=competive=compititive",
        "advantageous or favorable+beneficial?benificial=benefitial=benifecial",
        "the action of clearing a wide area of trees+deforestation?diforestation=deforesttation=deforeststation",
        "an imagined place or state of things in which everything is perfect+utopia?eutopia=utopea=utoepia",
        "prevent a person or place from having or using something+deprive?depreive=deprieve=diprive",
    ],
    9 => [
        "something incidental or added for ornament or symmetry+accompaniment?accompanyment=acompaniment=accompanimment",
        "nearly exact+approximately?approximmately=aproximately=aproximmately",
        "irreverent+blasphemous?blasphemuos=blassphemous=blaspemous",
        "result of obscuring things to deceive an enemy+camouflage?camuoflage=camouflagge=comouflage",
        "communication by exchange of letters+correspondence?corespondence=corresspondence=coresspondence",
        "imaginable+conceivable?concievable=concieveable=conceiveable",
        "the act of overstating+exaggeration?exageration=exagerration=exaggerration",
        "conventional requirements as to social behavior+etiquette?etiquete=etiqeutte=ettiquette",
        "the act or practice of spying+espionage?espionnage=espionagge=esppionage",
        "majority of opinion+consensus?concensus=consencus=conscensus",
        "defensible+justifiable?justefiable=justifyable=justifiabel",
        "omnipresent+ubiquitous?ubiqiutous=ubiquituos=ubiquituous",
        "communication by exchange of letters+correspondence?corespondence=correspondense=corresppondence",
        "strikingly bold or brilliant+flamboyant?flambouyant=flambuoyant=flamboyantt",
        "lacking in sincerity+disingenuous?disingenius=disingenous=disingenuos",
        "originating from outside Earth+extraterrestrial?extraterrestial=extraterestial=extraterestrial",
        "incapable of being in agreement+irreconcilable?irreconcillable=ireconcilable=irreconciliable",
        "pacify or appease+conciliate?concilliate=concilate=concillate",
        "continued effort to do something despite difficulties+perseverance?perseverence=perserverance=preserverence",
        "wasting away of a part of the body+atrophy?athropy=athrophy=ahtropy",
        "unstoppable or not possible to appease+implacable?implaccable=implacabble=implaceable",
        "related to a sea surrounded by Europe, Asia, and Africa+mediterranean?mediterrainean=mediterranian=mediteranean",
        "pertaining to a written law+statutory?statuetory=statutuory=statutary",
        "an area where a river flows into the sea+estuary?estraury=estuarry=estruary",
        "the fear of being in a small space+claustrophobia?clausetrophobia=closetrophobia=clausthrophobia",
        "improve or restore a structure+renovate?rennovate=renobate=rennobate",
        "to drive away or dissipate+dispel?dispell=disspell=disspel",
        "to defeat thoroughly+vanquish?banquish=banquest=vanquist",
        "to distribute resources for a particular purpose+allocate?alocate=aloccate=alloccate",
        "an incident or event+occurrence?occurence=ocourrence=ocurrence",
        "concerned with beauty or the appreciation of beauty+aesthetic?asthetic=esthetic=easthetic",
        "demanding or requiring vigorous exertion+strenuous?strenous=strennuous=strenuos",
        "confirm or support+corroborate?coraborate=coroborate=corraborate",
        "work jointly on an activity+collaborate?colloborate=colaborate=coloborate",
    ],
    10 => [
        "marked with patches+variegated?varieggated=variegatted=varriegated",
        "existing or being everywhere, especially at the same time+ubiquitous?ubiqiuitous=ubiquituos=ubiquituous",
        "an act or opportunity of inflicting such trouble+vengeance?vengence=vengance=vengeannce",
        "the state or fact of existing+subsistence?subsisttence=subsistennce=subssistence",
        "a person who seeks to promote the welfare of others+philanthropist?philantropist=philanthrophist=philantrophist",
        "the quality of evoking a keen sense of sadness or regret+poignancy?poignansy=poingnancy=poingancy",
        "wild uproar or unrestrained disorder+pandemonium?pandemmonium=pandemonnium=pandemonuium",
        "high-minded+magnanimous?magnanimuos=magnannimous=magnanimmous",
        "incapable of being brought into harmony+irreconcilable?ireconcilable=irreconncilable=irreconcilabble",
        "capable of being deducted+deductible?deductable=deductabel=deductuble",
        "unintentional or unintended+inadvertent?inadvartent=inadvartant=inadvertant",
        "absolutely necessary+indispensable?indespensable=indispensible=indespensible",
        "a word that imitates the sound it represents+onomatopoeia?onomatopeoia=onomatopeia=onomotopoeia",
        "varied in appearance or color+variegated?vareigated=variegatted=varieggated",
        "speak or write at length or in detail+expatiate?expatriate=expotiate=expetiate",
        "not having any serious purpose+frivolous?frivoluos=frivoluous=frivoulous",
        "steadfastness in doing something+perseverance?perseverence=perserverance=preserverence",
        "the act of spinning on one foot+pirouette?piruoette=pirouete=piroeutte",
        "the displacement of regular accents+syncopation?synchopation=syncophation=syncoupation",
        "concession to the belligerent demands of a group+appeasement?appeacement=appeasment=appiecement",
        "a branch of medicine+orthopedics?orthophedics=ortophedics=othropedics",
        "besieged or harassed by many difficulties+beleaguered?beleagered=beleaugered=beleugerred",
        "move by swinging from branch to branch+brachiate?branchiate=branchate=brachaite",
        "a polite expression used in place of words that are otherwise harsh+euphemism?eupemmism=euphemmism=euphimism",
        "not harmful or offensive+innocuous?innocous=innocuose=innoucous",
        "having a full, curving shape+voluptuous?voluoptous=voluptuos=voluptous",
        "causing public disgrace+ignominious?ignominuous=ignominous=ignominiuos",
        "stealthily+surreptitiously?surreptiously=surreptuously=surreptituously",
        "conducive to success+auspicious?auspicuous=auspacious=auspiciuos",
        "accept something reluctantly but without protest+acquiesce?acqueisce=acquiecse=aquiesce",
        "make better+ameliorate?ameliourate=ameilorate=aimeliorate",
        "providing necessary support+ancillary?anciliary=ancilliary=ancillery",
        "a young, innocent female character in literature or film+ingenue?ingeneu=ingenieu=ingeniu",
        "a person who organizes and manages an enterprise+entrepreneur?enterpreneur=entrepeneur=enterpeneur",
        "a bulge in a blood vessel+aneurysm?anuerysm=anuerism=aniurysm",
        "the place where the final battle will be fought between good and evil+armageddon?armaggeddon=armaggedon=armagedon",
        "a college bachelor's degree+baccalaureate?bacalaureate=bacallaureate=baccalaureat",
        "the social order that is dominated by the middle class+bourgeoisie?bourgeoise=bourgoeisie=bourgoeise",
    ],
];

// ---- Pre-parse data (§5.1) ----
function parse_spelling_entry(string $raw): ?array {
    $plus = strpos($raw, '+');
    $q    = strpos($raw, '?');
    if ($plus === false || $q === false || $q <= $plus + 1) return null;
    $hint    = substr($raw, 0, $plus);
    $correct = substr($raw, $plus + 1, $q - $plus - 1);
    $wrongs  = explode('=', substr($raw, $q + 1));
    if (count($wrongs) < 3 || $correct === '') return null;
    return ['hint' => $hint, 'correct' => $correct, 'wrong' => array_slice($wrongs, 0, 3)];
}

$items = [];
foreach ($rawData as $tier => $rawList) {
    $items[$tier] = [];
    foreach ($rawList as $raw) {
        $parsed = parse_spelling_entry($raw);
        if ($parsed !== null) $items[$tier][] = $parsed;
    }
}

// ---- Helpers (§8.4, §8.6) ----
function spelling_box(string $html, int $minHeight = 130): void {
    echo '<div style="max-width:480px;min-height:' . $minHeight . 'px;'
       . 'margin:20px auto;padding:20px 26px;'
       . 'background:#FCFBE6;border:2px solid #DDD;border-radius:10px;'
       . 'display:flex;flex-direction:column;justify-content:center;align-items:center;'
       . 'text-align:center;font-family:Arial,sans-serif;box-sizing:border-box;">'
       . $html . '</div>';
}
function bind_last_words(string $text, int $words = 2): string {
    $esc = htmlspecialchars($text);
    $pat = '/\s+(\S+(?:\s+\S+){' . ($words - 1) . '})$/u';
    return preg_replace_callback($pat, function ($m) {
        return '&nbsp;' . preg_replace('/\s+/u', '&nbsp;', $m[1]);
    }, $esc, 1);
}

// ---- No-repeat picker (§6) ----
function pick_spelling_item(array $pool, string $sessionKey, int $tier): array {
    $used = $_SESSION[$sessionKey]['used'] ?? [];
    $available = [];
    foreach ($pool as $i => $item) {
        if (!in_array("t$tier:$i", $used, true)) $available[$i] = $item;
    }
    if (empty($available)) {
        $used = array_values(array_filter($used, fn($k) => strpos($k, "t$tier:") !== 0));
        foreach ($pool as $i => $item) $available[$i] = $item;
    }
    $idx    = array_rand($available);
    $item   = $available[$idx];
    $used[] = "t$tier:$idx";
    if (count($used) > 500) $used = array_slice($used, -300);
    $_SESSION[$sessionKey]['used'] = $used;
    return ['item' => $item, 'index' => $idx];
}

// ---- Question builder ----
function build_spelling_question(array $items, int $tier, string $lvl, string $sessionKey): array {
    $pool   = $items[$tier] ?? $items[1];
    if (empty($pool)) $pool = $items[1] ?? [];
    $picked = pick_spelling_item($pool, $sessionKey, $tier);
    $item   = $picked['item'];

    $choices = array_merge([$item['correct']], $item['wrong']);
    shuffle($choices);

    return [
        'hint'    => $item['hint'],
        'choices' => $choices,
        'correct' => $item['correct'],
        'lvl'     => $lvl,
        'tier'    => $tier,
    ];
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
    $tier = resolve_spelling_tier($lvl, $grd);
    $_SESSION[$sessionKey]['current'] = build_spelling_question($items, $tier, $lvl, $sessionKey);
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

$btnStyle = 'font-family:Arial,sans-serif;font-size:11pt;';
?>

<div style="padding:0 10px;text-align:center;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<?php if ($result !== null):
    $cur = $result['cur'];
    $hintEsc = bind_last_words($cur['hint']);
    $answerEsc = htmlspecialchars($cur['correct']);
?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#666;margin-top:20px;max-width:480px;margin-left:auto;margin-right:auto;">
    Your answer: <strong style="color:#0000CC;font-size:14pt;">'<?php echo htmlspecialchars($result['clicked']); ?>'</strong>
  </p>
  <p style="font-family:Arial,sans-serif;font-size:16pt;font-weight:700;color:<?php echo $result['correct'] ? '#006600' : '#CC0000'; ?>;max-width:480px;margin:10px auto;">
    <?php echo $result['correct'] ? '&#9989; You are correct!' : '&#10060; Sorry, that is not correct.'; ?>
  </p>
  <?php spelling_box(
      '<div style="width:100%;font-size:15pt;color:#333;line-height:1.55;">'
    . $hintEsc
    . '</div>'
  , 120); ?>
  <p style="font-family:Arial,sans-serif;font-size:14pt;color:#800080;max-width:480px;margin:10px auto;line-height:1.55;">
    The correctly spelled word for this hint is
    <strong style="color:#CC0066;font-size:15pt;">'<?php echo $answerEsc; ?>'</strong>.
  </p>
  <input type="submit" name="Submit2" value="New Question" style="margin:20px 0;<?php echo $btnStyle; ?>">
<?php else:
    $q = $_SESSION[$sessionKey]['current'];
    $hintEsc = bind_last_words($q['hint']);
?>
  <div style="margin:35px auto 12px;font-family:Arial,sans-serif;font-size:17pt;font-weight:700;color:#800080;max-width:480px;text-wrap:balance;">
    Given the hint below, click on the word with the correct spelling.
  </div>
  <?php spelling_box(
      '<div style="width:100%;font-size:17pt;font-weight:600;color:#333;line-height:1.55;">'
    . $hintEsc
    . '</div>'
  , 120); ?>
  <table border="0" cellspacing="16" cellpadding="0" style="margin:0 auto;">
  <?php foreach (array_chunk($q['choices'], 2) as $row): ?>
    <tr>
    <?php foreach ($row as $c): ?>
      <td align="center" valign="middle">
        <a href="?ansclick=<?php echo urlencode($c); ?>"
           style="display:flex;align-items:center;justify-content:center;
                  min-width:160px;max-width:240px;min-height:64px;padding:12px 18px;
                  border:2px solid #888888;border-radius:8px;background:#fff;
                  text-decoration:none;color:#0000CC;font-family:Arial,sans-serif;
                  font-size:18pt;font-weight:700;text-align:center;
                  word-break:break-word;box-sizing:border-box;line-height:1.3;">
          <?php echo htmlspecialchars($c); ?>
        </a>
      </td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <input type="submit" name="Submit2" value="New Question" style="margin:30px 0;<?php echo $btnStyle; ?>">
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