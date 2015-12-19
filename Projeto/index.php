<?php
	//Index archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto
	
	//require includer
	require_once("libs/includer.php");
	include("translations/conf.php");

	$user_session = $_SESSION["user"];
	$char_session = $_SESSION["char"];

	$user = array("username" => $user_session["u_user"], "useremail" => $user_session["u_email"]);

	$char = array("charname" => $char_session[1], "charclass" => $char_session[2], "charlevel" => $char_session[3], "charexperience" => $char_session[4], "charmoney" => $char_session[7]);

	include("/templates/index.tpl.php");
?>