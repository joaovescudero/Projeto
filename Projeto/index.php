<?php
	//Index archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto
	
	//session start
	if (!isset($_SESSION)) {
		session_start();
	}

	//require includer
	require_once("libs/includer.php");
	include("translations/conf.php");


	if((isset($_SESSION["user"]) && !empty($_SESSION["user"])) && (isset($_SESSION["char"]) && !empty($_SESSION["char"]))):
		$user_session = $_SESSION["user"];
		
		$main = new main($mysql);
  		$main->getChars($user_session);

		$char_session = $_SESSION["char"];

		$charClass = new char($char_session, $mysql);

		$stats = $_SESSION["stats"];

		$user = array("username" => $user_session["u_user"], "useremail" => $user_session["u_email"]);

		$char = array("charid" => $char_session[0], "charname" => $char_session[1], "charclass" => $char_session[2], "charlevel" => $char_session[3], "charexperience" => $char_session[4], "charpoints" => $char_session[5], "charreborns" => $char_session[6], "charmoney" => $char_session[7]);

		include("/templates/index_loged.tpl.php");
	elseif(isset($_SESSION["user"]) && !empty($_SESSION["user"])):
		$user_session = $_SESSION["user"];
		
		$main = new main($mysql);
  		$main->getChars($user_session);

		$user = array("username" => $user_session["u_user"], "useremail" => $user_session["u_email"]);

		include("/templates/index_char.tpl.php");
	else:

		if(isset($_POST["user"])){
			print_r($_POST);
		}

		include("/templates/index_login.tpl.php");
	endif;
?>