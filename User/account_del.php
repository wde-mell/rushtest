<?php
session_start();
$tab = unserialize(file_get_contents("../private/passwd"));
foreach ($tab as $elem)
{
	$i = 0;
	if ($elem['login'] == $_SESSION['loggued_on_user'])
		unset($tab[$i]);
	$tab = array_values($tab);
	$i++;
}
file_put_contents("../private/passwd", serialize($tab));
$_SESSION['loggued_on_user'] = "";
header("Location: ../");
exit ("OK\n");
?>
