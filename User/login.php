<?php
include ("auth.php");

session_start();
if (auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	header("Location: ../");
	if ($_SESSION['order'] === 1)
		header("Location: ../cart.php");
}
else
{
	$_SESSION['loggued_on_user'] = "";
	exit ("ERROR\n");
}
?>

