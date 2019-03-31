<?php
if($_POST['submit'] == "OK" && file_exists("../private/passwd"))
{
	$tab = unserialize(file_get_contents("../private/passwd"));
	foreach($tab as &$elem)
	{
		if ($elem['login'] == $_POST['login'])
		{
			if (hash(whirlpool, $_POST['oldpw']) == $elem['passwd'])
			{
				if ($_POST['newpw'] != "")
				{
					$elem['passwd'] = hash(whirlpool, $_POST['newpw']);
					file_put_contents("../private/passwd", serialize($tab));
					header("Location: ../account.php");
					exit ("OK\n");
				}
				else
					break ;
			}
			else
				break ;
		}
	}
}
exit("ERROR\n");
?>
