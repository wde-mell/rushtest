#!/usr/bin/php
<?php
mkdir("./database");
$dbcat = "./database/categories.csv";
$dbitems = "./database/items.csv";

$init = array("Category", "Description");
$rock = array("Rock", "Description");
$celtic = array("Celtic", "Description");
$electro = array("Electro", "Description");
$cat = array($init, $rock, $celtic, $electro);
$fd = fopen($dbcat, 'a');
foreach ($cat as $elem)
	fputcsv($fd, $elem);
fclose($fd);

$init = array("Title", "price", "img", "Category", "Band", "year");
$item1 = array("Does This Look Infected?", "6.99", "https://upload.wikimedia.org/wikipedia/en/thumb/1/19/Sum41_doesthislookinfected.png/220px-Sum41_doesthislookinfected.png", "Rock", "Sum 41", "2002");
$item2 = array("Riot City Outlaws", "6.99", "https://static.fnac-static.com/multimedia/Images/FR/NR/e7/49/90/9456103/1540-1/tsp20180323102255/Riot-City-Outlaws.jpg", "Rock/Celtic", "Paddy and the Rats", "2017");
$item3 = array("Nevermind", "9.99", "https://upload.wikimedia.org/wikipedia/en/thumb/b/b7/NirvanaNevermindalbumcover.jpg/220px-NirvanaNevermindalbumcover.jpg", "Rock", "Nirvana", "1991");
$items = array($init, $item1, $item2, $item3);
$fd = fopen($dbitems, 'a');
foreach ($items as $elem)
	fputcsv($fd, $elem);
fclose($fd);

mkdir("./private");
file_put_contents("./private/orders", "");
$tab = array(array("login" => "root", "passwd" => hash(whirlpool, "admin123")));
file_put_contents("./private/passwd", serialize($tab));
?>
