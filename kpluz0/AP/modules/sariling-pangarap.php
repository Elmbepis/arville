<?php
// Pagkakaroon ng Sariling Pangarap
$_SESSION['title'] = "Pagkakaroon ng Sariling Pangarap";

$questions = array(

    "Walang halaga ang pagkakaroon ng pangarap.=mali>tama",
    "Pare-pareho ang pangarap ng lahat ng tao.=mali>tama",
    "Matutupad ang ating pangarap kahit tayo ay tamad.=mali>tama",
    "Nasa larawan ang gagamitin mo kung ikaw ay magiging isang mang-aawit.=mali>tama**gamit-karpintero.jpg",
    "Nasa larawan ang gagamitin mo kung ikaw ay magiging isang piloto.=mali>tama**gamit-mangingisda.jpg",
    "Ang mga pulis ay hindi maaaring maging artista.=mali>tama",
    "Kailangan nating magsikap upang matupad ang ating pangarap.=tama>mali",
    "Nasa larawan ang nais mong gawain kung pangarap mong maging bumbero.=tama>mali**bumbero.jpg",
    "Nasa larawan ang nais mong gawain kung pangarap mong maging isang sikat na 'chef'.=tama>mali**kusinero.jpg",
    "Nais kong magdisenyo ng magagandang bahay. Pangarap kong maging arkitekto.=tama>mali",
    "Ang isang dyanitor ay maaaring maging abogado kung siya ay magsisikap.=tama>mali",
    "Dapat ay marangal at hindi masama ang ating pangarap.=tama>mali",
    "Hindi mo dapat maging pangarap ang isang gawaing labag sa batas.=tama>mali",
    "Makikita sa larawan ang aking pangarap. Nais kong maging isang ____.=doktor>nars+sundalo<pulis**doktor.jpg",
    "Makikita sa larawan ang aking pangarap. Nais kong maging isang ____.=nars>doktor+sundalo<pulis**nars.jpg",
    "Ang gawain ng aking nanay ay makikita sa larawan. Tulad niya, nais kong maging ____.=guro>nars+dentista<pulis**guro.jpg",
    "Humahanga ako sa taong nasa larawan. Tulad niya, nais kong maging ____.=sundalo>bumbero+dentista<panadero**sundalo.jpg",
    "Nais kong makatulad ang nasa larawan. Pangarap kong maging ____.=pulis>bumbero+dentista<barbero**pulis.jpg",
    "Tulad ng nasa larawan, mahilig ako sa mga hayop. Nais kong maging ____.=beterinaryo>bumbero+tubero<nars**beterinaryo.jpg",
    "Tulad ng nasa larawan, nais kong magsilbi sa Diyos. Pangarap kong maging ____.=pari>bumbero+karpintero<piloto**pari.jpg",
    "Nais kong maging ____. Ipagtatanggol ko kayo sa korte.=abogado>bumbero+dentista<kusinero",
    "Nais kong maging ____. Pahihiramin ko kayo ng mga aklat sa silid-aklatan.=laybraryan>titser+nars<pulis",
    "Makikita sa larawan ang aking pangarap. Nais kong maging isang ____.=dentista>nars+sundalo<bumbero**dentista.jpg",
    "Nasa larawan ang aking idolo. Paglaki ko, magiging ____ rin ako.=boksingero>guro+sundalo<bumbero**boksingero.jpg",
    "Makikita sa larawan ang aking pangarap. Nais kong maging isang ____.=nars>doktor+sundalo<pulis**nars.jpg",
    "Makikita sa larawan ang aking pangarap. Nais kong maging isang ____.=mananayaw>mang-aawit+guro<nars**mananayaw.jpg",
    
);