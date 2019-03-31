<?php

session_start();
$_SESSION['db']['cat'] = array_map('str_getcsv', file("./database/categories.csv"));
$_SESSION['db']['items'] = array_map('str_getcsv', file("./database/items.csv"));

function display_item($item)
{
	echo '<center><figure>
		<form method="POST" action="./Menus/cart.php">
			<input type="hidden" name="add" value="' . $item[0] . '">
			<input type="hidden" name="cat" value="' . $_GET['cat'] . '">
			<input class="buy" type="image" src="http://www.clker.com/cliparts/5/3/v/F/2/k/small-cart-hi.png" alt="Buy" /></input>
		</form>
		<img src="' . $item[2] . '" alt="Cover "' . $item[0] . '" />
		<figcaption><ul><li class="name">' . $item[0] . '</li><li>' . $item[4] . '</li><li>' . $item[5] . '</li><li>' . $item[1] .' €</li></ul></figcaption>
	</figure></center>';
}

function display_cat()
{
	foreach($_SESSION['db']['items'] as $item)
	{
		if ($j++ != 0)
		{
			$cat = explode('/', $item[3]);
			$i = array_search($_GET['cat'], $cat);
			if (is_int($i))
				display_item($item);
		}
	}
}

?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="./CSS/index.css" />
		<?php include("./Menus/header.php"); ?>
	</head>
		<center><div id="catmenu">
			<ul class="niveau1">
				<li class="sous-menu"><span class=cattitle>Cat&eacute;gories</span>
					<ul class="niveau2">
						<?php
							foreach ($_SESSION['db']['cat'] as $elem)
								if ($i++ != 0)
									echo "<li class=\"cat\"><a href=\"./?cat=$elem[0]\" />$elem[0]</a></li>";
						?>
					</ul>
				</li>
			</ul>
		</div></center>
		<?php if ($_GET['cat'])  : ?>
			<?php display_cat(); ?>
		<?php else : ?>
		<!-- Slideshow Container Div -->
		<div class="container"> 
		
		<!-- Full-width images with caption text -->
		<div class="image-sliderfade fade"> 
			<img src="https://static.fnac-static.com/multimedia/Images/FR/NR/e7/49/90/9456103/1540-1/tsp20180323102255/Riot-City-Outlaws.jpg" style="width:100%"> 
			<div class="text">Paddy and the Rats</div> 
		</div> 
		
		<div class="image-sliderfade fade"> 
			<img src="https://upload.wikimedia.org/wikipedia/en/thumb/1/19/Sum41_doesthislookinfected.png/220px-Sum41_doesthislookinfected.png" style="width:100%"> 
			<div class="text">Sum 41</div> 
		</div> 
		
		<div class="image-sliderfade fade"> 
			<img src="https://upload.wikimedia.org/wikipedia/en/thumb/b/b7/NirvanaNevermindalbumcover.jpg/220px-NirvanaNevermindalbumcover.jpg" style="width:100%"> 
			<div class="text">Nirvana</div> 
		</div> 
		

		</div> 
		<br> 
		
		<!-- The dots/circles -->
		<div style="text-align:center"> 
		<span class="dot"></span>  
		<span class="dot"></span>  
		<span class="dot"></span>  
		<?php endif ;?>
</div> 
	<script type="text/javascript" src="./js/slide.js"></script>
	</body>
</html>
