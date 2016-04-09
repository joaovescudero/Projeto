<?php
	//Translation conf archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto
	
	if(!empty($_GET["lang"]) || isset($_GET["lang"]) ){
		$_SESSION["lang"] = $_GET["lang"];
		$uri = $_SERVER['REQUEST_URI'];
		$uri = explode("?", $uri);
		header("Location: ".$uri[0]);
	}elseif(isset($_SESSION["lang"]) || !empty($_SESSION["lang"])){
		$lang = $_SESSION["lang"];
	}else{
		$_SESSION["lang"] = "en";
		header("Location: #");
	}

	include("translations/".$lang.".php");
	