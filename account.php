<?php
date_default_timezone_set("Europe/Paris");
session_start();
if ($_SESSION['loggued_on_user'] === "")
{
	header("Location: ./");
	exit();
}
$usr = $_SESSION['loggued_on_user'];
$tab = unserialize(file_get_contents("./private/orders"));
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="./CSS/account.css" />
	</head>
	<body>
		<center><a href="./user/modif.html">Nouveau mot de passe</a><a href="./">Acceuil</a><a href="./user/account_del.php">Supprimer le compte</a></center>
		<center><?php
			if ($tab)
			{
				foreach ($tab as $id)
					if ($id[0] === $usr)
						$ord[] = $id;
				if ($ord)
				{
					foreach ($ord as $elem)
					{
						foreach ($elem[2] as $art)
						{
							if (!$disp[$art[0]])
							{
								$disp[$art[0]][0] = $art[0];
								$disp[$art[0]][1] = 1;
							}
							else
								$disp[$art[0]][1]++;
						}
						echo
						'<center><div class="cmd">
							<div class="info">
								<p class="name">'.$elem[0].'</p>
								<p class="time">'.date("[D, d M Y H:i:s]", $elem[1]).'</p>
							</div><div class=art>';
						foreach ($disp as $field)
							echo '<p>'.$field[0].': x'.$field[1].'</p>';
						echo '</div></div></center>';
					}
				}
			}
		?></center>
	</body>
</html>
