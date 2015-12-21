<?php
	require_once("classes/main.class.php");

	$name=$_POST['name'];
  	$class=$_POST['charclass'];

  	$main = new main($mysql);

  	echo $main->newChar($_SESSION["user"], $name, $class);
?>