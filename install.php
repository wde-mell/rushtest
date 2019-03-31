#!/usr/bin/php
<?php
mkdir("./database");
$dbcat = "./database/categories.csv";
$dbitems = "./database/items.csv";

$init = array("Category", "Description");
$rock = array("Rock", "Description");
$celtic = array("Celtic", "Description");
$electro = array("Electro", "Description");
$rap = array("Rap", "Description");
$cat = array($init, $rock, $celtic, $electro, $rap);
$fd = fopen($dbcat, 'a');
foreach ($cat as $elem)
	fputcsv($fd, $elem);
fclose($fd);

$init = array("Title", "price", "img", "Category", "Band", "year");
$item1 = array("Does This Look Infected?", "6.99", "https://upload.wikimedia.org/wikipedia/en/thumb/1/19/Sum41_doesthislookinfected.png/220px-Sum41_doesthislookinfected.png", "Rock", "Sum 41", "2002");
$item2 = array("Riot City Outlaws", "6.99", "https://static.fnac-static.com/multimedia/Images/FR/NR/e7/49/90/9456103/1540-1/tsp20180323102255/Riot-City-Outlaws.jpg", "Rock/Celtic", "Paddy and the Rats", "2017");
$item3 = array("Nevermind", "9.99", "https://upload.wikimedia.org/wikipedia/en/thumb/b/b7/NirvanaNevermindalbumcover.jpg/220px-NirvanaNevermindalbumcover.jpg", "Rock", "Nirvana", "1991");
$item4 = array("Elements Of Life: World Tour","10","https://img.discogs.com/9XL5YGmjoTeqZ9q-qsMCAyMvS3Q=/fit-in/600x772/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-4041229-1353269779-4747.jpeg.jpg","Electro","Dj Tiësto","2011");
$item5 = array("Dj Snake","11.99","http://globalspin365.com/wp-content/uploads/2016/08/snake.png","Electro","Dj Snake","2015");
$item6 = array("David Guetta Listen","19.99","https://static.fnac-static.com/multimedia/Images/FR/NR/48/80/60/6324296/1540-1/tsp20141006114517/Listen.jpg","Electro","David Guetta","2017");
$item7 = array("David Guetta","19.99","https://static.fnac-static.com/multimedia/Images/FR/NR/4c/c8/9e/10405964/1540-1/tsp20180823144545/7-Digisleeve-Edition-Limitee-Inclus-4-titres-bonus.jpg","Electro/Celtic","David Guetta","2017");
$item8 = array("Ouest side","14.99","https://static.fnac-static.com/multimedia/FR/Images_Produits/FR/fnac.com/Visual_Principal_340/2/7/1/0602498366172/tsp20120926104021/Ouest-side.jpg","Rap","Booba","2017");
$item9 = array("Phoenix","16","https://static.fnac-static.com/multimedia/Images/FR/NR/5e/84/a8/11043934/1540-1/tsp20190322122034/Phoenix.jpg","Rap","Soprano","2019");
$item10 = array("Ceinture noire (Transcendance)","15.99","https://static.fnac-static.com/multimedia/Images/FR/NR/f9/16/9b/10163961/1540-1/tsp20190322145222/Ceinture-noire-Transcendance-Reedition-digipack-40-titres-et-13-inedits.jpg","Rap","Maitre Gims","2019");
$item11 = array("J’Rap Encore","11.99","https://static.fnac-static.com/multimedia/Images/FR/NR/43/eb/a1/10611523/1540-1/tsp20181019112437/J-Rap-Encore.jpg","Rap","Kery James","2019");
$item12 = array("Celtic","9","https://static.fnac-static.com/multimedia/FR/Images_Produits/FR/fnac.com/Visual_Principal_340/9/2/4/5099926595429/tsp20120929072142/Celtic-zen.jpg","Celtic","Zen","2019");
$item14 = array("The Celtic collection","20","https://static.fnac-static.com/multimedia/Images/FR/NR/1c/1c/6f/7281692/1540-1/tsp20160316161006/The-Celtic-collection.jpg","Celtic","Zen","2019");
$item15 = array("Meteora","10.99", "https://static.fnac-static.com/multimedia/Images/FR/NR/c7/64/17/1533127/1540-1/tsp20131210140039/Meteora.jpg","Rock","Linkin Park","2019");
$items = array($init, $item1, $item2, $item3, $item4, $item5, $item6, $item7, $item8, $item9, $item10, $item11, $item12, $item14, $item15);


$fd = fopen($dbitems, 'a');
foreach ($items as $elem)
	fputcsv($fd, $elem);
fclose($fd);

mkdir("./private");
file_put_contents("./private/orders", "");
$tab = array(array("login" => "root", "passwd" => hash(whirlpool, "admin123")));
file_put_contents("./private/passwd", serialize($tab));
?>
