<?php
include ("auth.php");

session_start();
if (auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	if ($_SESSION['id_user'] === $id_user[0]["root"]);
	{
		header("Location: ./modif.html");
	}
	header("Location: ../");
	if ($_SESSION['order'] === 1)
		header("Location: ../Menus/cart.php");
}
else
{
	$_SESSION['loggued_on_user'] = "";
	exit ("ERROR\n");
}
?>

