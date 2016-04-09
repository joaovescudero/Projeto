<?php
	//Delete Char lib archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto

	require_once("classes/main.class.php");
	$id=$_POST["charid"];
	$main = new main($mysql);
	echo $main->delChar($id);
