<?php
	//require_once("classes/main.class.php");
	require_once("classes/char.class.php");
	$id=$_GET["id"];
	$main = new main($mysql);
	$main->selectChar($_SESSION["user"], $id);
	$char = new char($_SESSION["char"],$mysql);
	$char->status();
	header("Location: ../");