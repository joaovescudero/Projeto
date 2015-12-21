<?php
	require_once("classes/main.class.php");
	$id=$_GET["id"];
	$main = new main($mysql);
	$main->selectChar($_SESSION["user"], $id);
	header("Location: ../");