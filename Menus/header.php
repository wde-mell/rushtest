<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../CSS/header.css" />
	</head>
	<body>
		<center><div id="menu">
			<a id="title" href="/"><h1>Titre site</h1></a>
			<div id=links>
				<?php
					if (!$_SESSION['loggued_on_user'])
						echo "<a style=\"width: 185;\" href=\"/user/login.html\">Connexion</a>";
					else
						echo "
						<div id=\"account\">
							<a href=\"./Menus/account.php\">Mon compte</a>
							<a href=\"../user/logout.php\">D&eacute;connection</a>
						</div>"
				?>
				<a style="width: 185px;" href="/Menus/cart.php"><?php if ($_SESSION['number']) echo $_SESSION['number']; else echo "0" ?> Panier <?php if ($_SESSION['price']) echo $_SESSION['price']." €"; else echo "0 €" ?></a>
			</div>
		</div></center>
	</body>
</html>
