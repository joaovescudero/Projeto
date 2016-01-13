<?php
	//Create Char lib archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto

	require_once("classes/main.class.php");

	$name=$_POST['name'];
  	$class=$_POST['charclass'];

  	$main = new main($mysql);

  	print_r ($main->newChar($_SESSION["user"], $name, $class));
?>
