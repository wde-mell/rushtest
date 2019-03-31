<?php
if ($_POST['submit'] == "OK")
{
	if (file_exists("../private/passwd"))
	{
		$tab = unserialize(file_get_contents("../private/passwd"));
		foreach ($tab as $elem)
			if ($elem['login'] == $_POST['login'])
				exit ("ERROR\n");
	}
	$user['login'] = $_POST['login'];
	$user['passwd'] = hash(whirlpool, $_POST['passwd']);
	$tab[] = $user;
	file_put_contents("../private/passwd", serialize($tab));
	header("Location: ./login.html");
	exit ("OK\n");
}
else
	exit ("ERROR\n");
?>
