<?php
	require_once("classes/char.class.php");

	$login=$_POST['login'];
  	$pass=$_POST['pass'];

  	$main = new main($mysql);

  	$main->selectChar($_SESSION["user"], "13");
  	echo $main->login($login, $pass);
?>