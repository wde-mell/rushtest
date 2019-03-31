<?php

function add_to_cart($name, $cat)
{
	foreach ($_SESSION['db']['items'] as $item)
		if ($item[0] == $name)
		{
			$_SESSION['cart'][] = $item;
			$_SESSION['price'] += $item[1];
			$_SESSION['number'] += "1";
			break ;
		}
	header("Location: ../?cat=$cat");
}

function clear_cart(){
	unset($_SESSION['cart']);
	unset($_SESSION['price']);
	unset($_SESSION['number']);
}

function display_cart(){
	foreach ($_SESSION['cart'] as $item)
	{
		if (!$disp[$item[0]])
		{
			$disp[$item[0]][0] = $item[0];
			$disp[$item[0]][1] = $item[1];
			$disp[$item[0]][2] = $item[2];
			$disp[$item[0]][4] = 1;
		}
		else
			$disp[$item['0']][4]++;
	}
	foreach($disp as $item)
			echo '<center><figure>
				<img src="' . $item[2] . '" alt="Cover "' . $item[0] . '" />
				<figcaption><p class="name">' . $item[0] . '</p><p class="price">' . $item[1] .' x' . $item[4] . '</p></figcaption>
			</figure></center>';
}

function order(){
	$order = unserialize(file_get_contents("../private/orders"));
	$neworder[0] = $_SESSION['loggued_on_user'];
	$neworder[1] = time();
	$neworder[2] = $_SESSION['cart'];
	if ($order)
		array_push($order, $neworder);
	else
		$order[0] = $neworder;
	clear_cart();
	file_put_contents("../private/orders", serialize($order));
}

session_start();
if ($_POST['add'])
	add_to_cart($_POST['add'], $_POST['cat']);
if ($_POST['clear'])
	clear_cart();
if (($_SESSION['cart'] && $_POST['order']) || $_SESSION['order'] === 1)
{
	$_SESSION['order'] = 0;
	if ($_SESSION['loggued_on_user'])
		order();
	else
	{
		$_SESSION['order'] = 1;
		header("Location: ../user/login.html");
	}
}

?>

<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../CSS/cart.css" />
		<?php include("./header.php"); ?>
	</head>
	<body>
		<?php
			if ($_SESSION['cart'])
				display_cart();
		?>
	<div class="links">
		<form method="POST" action="cart.php"><input type="submit" name="clear" value="Clear"></form>
		<p>Total =
		<?php
			if ($_SESSION['price'])
				echo $_SESSION['price'];
			else
				echo "0";
		?> €</p>
		<p><?php
			if ($_SESSION['number'])
				echo $_SESSION['number'];
			else
				echo "0";
		?> items</p>
		<form method="POST" action="cart.php"><input type="submit" name="order" value="Valider"></form>
	</div>
	</body>
</html>
