<html>
<head>
<body>

<?php
$_SESSION['title']="Pagkilala sa mga Rehiyon sa Luzon";

$questions=array(

// === REHIYON I (ILOCOS) ===
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon I?=La Union>Bulacan+Laguna<Pampanga",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon I?=Pangasinan>Batangas+Cavite<Quezon",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon I?=Bulacan>Ilocos Norte+Pangasinan<La Union",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon I?=Laguna>Ilocos Sur+Pangasinan<La Union",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon I?=Cagayan>Pangasinan+Ilocos Norte<Ilocos Sur",

// === REHIYON II (LAMBAK CAGAYAN) ===
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon II?=Batanes>Bulacan+Ilocos Norte<Pampanga",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon II?=Isabela>La Union+Pangasinan<Batangas",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon II?=Nueva Vizcaya>Aurora+Zambales<Bataan",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon II?=Bulacan>Cagayan+Isabela<Quirino",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon II?=Laguna>Nueva Vizcaya+Batanes<Cagayan",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon II?=Pampanga>Isabela+Nueva Vizcaya<Cagayan",

// === REHIYON III (GITNANG LUZON) ===
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon III?=Pampanga>Batangas+Cavite<Laguna",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon III?=Nueva Ecija>Ilocos Norte+La Union<Pangasinan",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon III?=Zambales>Batanes+Cagayan<Isabela",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon III?=Bataan>Aurora+Quezon<Rizal",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon III?=Batangas>Bulacan+Pampanga<Tarlac",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon III?=Laguna>Aurora+Bataan<Zambales",

// === REHIYON IV-A (CALABARZON) ===
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon IV-A?=Batangas>Bulacan+Pampanga<Tarlac",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon IV-A?=Rizal>Nueva Ecija+Aurora<Bataan",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon IV-A?=Laguna>Zambales+Pampanga<Tarlac",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon IV-A?=Quezon>Bataan+Aurora<Zambales",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon IV-A?=Bulacan>Cavite+Batangas<Quezon",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon IV-A?=Pampanga>Laguna+Rizal<Cavite",

// === REHIYON IV-B (MIMAROPA) ===
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon IV-B?=Palawan>Batangas+Cavite<Laguna",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon IV-B?=Romblon>Quezon+Rizal<Batangas",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon IV-B?=Marinduque>Cavite+Laguna<Batangas",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon IV-B?=Occidental Mindoro>Bulacan+Pampanga<Tarlac",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon IV-B?=Batangas>Palawan+Romblon<Marinduque",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon IV-B?=Cavite>Occidental Mindoro+Oriental Mindoro<Palawan",

// === REHIYON V (BICOL) ===
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon V?=Albay>Marinduque+Romblon<Palawan",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon V?=Sorsogon>Batangas+Laguna<Quezon",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon V?=Masbate>Rizal+Cavite<Batangas",
"Alin sa mga ito ang lalawigang bahagi ng Rehiyon V?=Catanduanes>Bulacan+Pampanga<Zambales",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon V?=Marinduque>Albay+Sorsogon<Masbate",
"Alin sa mga ito ang lalawigang hindi bahagi ng Rehiyon V?=Romblon>Camarines Norte+Camarines Sur<Catanduanes",

// === CAR (CORDILLERA ADMINISTRATIVE REGION) ===
"Alin sa mga ito ang lalawigang bahagi ng CAR?=Ifugao>Ilocos Norte+La Union<Cagayan",
"Alin sa mga ito ang lalawigang bahagi ng CAR?=Kalinga>Isabela+Pangasinan<Batanes",
"Alin sa mga ito ang lalawigang bahagi ng CAR?=Apayao>Cagayan+Nueva Vizcaya<Quirino",
"Alin sa mga ito ang lalawigang hindi bahagi ng CAR?=Ilocos Norte>Abra+Benguet<Ifugao",
"Alin sa mga ito ang lalawigang hindi bahagi ng CAR?=Cagayan>Kalinga+Mt. Province<Apayao",

// === NCR (NATIONAL CAPITAL REGION) ===
"Alin sa mga ito ang lugar na bahagi ng NCR?=Quezon City>Bulacan+Pampanga<Laguna",
"Alin sa mga ito ang lugar na bahagi ng NCR?=Caloocan>Batangas+Cavite<Rizal",
"Alin sa mga ito ang lugar na bahagi ng NCR?=Maynila>Pampanga+Tarlac<Bataan",
"Alin sa mga ito ang lugar na bahagi ng NCR?=Marikina>Zambales+Aurora<Batangas",
"Alin sa mga ito ang lugar na hindi bahagi ng NCR?=Bulacan>Quezon City+Caloocan<Maynila",
"Alin sa mga ito ang lugar na hindi bahagi ng NCR?=Laguna>Navotas+Malabon<Marikina",

);
?>

</head>

</body>

</html>