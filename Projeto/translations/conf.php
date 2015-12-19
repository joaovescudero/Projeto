<?php
	if(empty($_GET["lang"]) || !isset($_GET["lang"])){
		$lang = "en";
	}else{
		$lang = $_GET["lang"];
	}

	//if(!file_exists("/translations/".$lang.".php")){
	//	$lang = "en";
	//}

	include("/translations/".$lang.".php");