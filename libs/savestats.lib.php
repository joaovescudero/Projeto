<?php
	//Save stats lib archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto

	require_once("classes/char.class.php");

	$id=$_POST['id'];
	$points=$_POST['points'];
	$str=$_POST['str'];
	$vit=$_POST['vit'];
	$dex=$_POST['dex'];
	$agi=$_POST['agi'];
	$int=$_POST['inte'];
	$luk=$_POST['luk'];

	$char = new char($_SESSION["char"], $mysql);

	echo $char->saveStats($id, $points, $str, $vit, $dex, $agi, $int, $luk);
