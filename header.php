<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="./CSS/header.css" />
	</head>
	<body>
		<center><div id="menu">
			<a id="title" href="/"><h1>Titre site</h1></a>
			<div id=links>
				<?php
					if (!$_SESSION['loggued_on_user'])
						echo "<a class=\"acc\" style=\"width: 185;\" href=\"/user/login.html\">Connexion</a>";
					else if ($_SESSION['loggued_on_user'] === "root")
						echo "
						<div id=\"account\">
							<a class=\"acc\" href=\"./admin.php\">Admin</a>
							<a class=\"acc\" href=\"./user/logout.php\">D&eacute;connection</a>
						</div>";
					else
						echo "
						<div id=\"account\">
							<a class=\"acc\" href=\"./account.php\">Mon compte</a>
							<a class=\"acc\" href=\"./user/logout.php\">D&eacute;connection</a>
						</div>";
				?>
				<a class="lb" href="./cart.php"><div><p><?php if ($_SESSION['number']) echo $_SESSION['number']; else echo "0" ?></p><p>Panier</p><p><?php if ($_SESSION['price']) echo $_SESSION['price']." €"; else echo "0 €" ?></div></p></a>
			</div>
		</div></center>
	</body>
</html>
