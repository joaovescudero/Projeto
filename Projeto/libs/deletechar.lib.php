<?php
	require_once("classes/main.class.php");
	$id=$_POST["charid"];
	$main = new main($mysql);
	echo $main->delChar($id);