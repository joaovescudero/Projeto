<?php
	//Login lib archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto

	require_once("classes/char.class.php");

	$login=$_POST['login'];
  	$pass=$_POST['pass'];

  	$main = new main($mysql);
  	echo $main->login($login, $pass);
?>
