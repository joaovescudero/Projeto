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

        $badge = null;
        $classup = null;
        $classchange = null;
        $levelup = null;

		$user_session = $_SESSION["user"];
		
		$main = new main($mysql);
  		$main->getChars($user_session);

  		$bank = $main->getBank($user_session, "0");
  		$bank_equiped = $main->getBank($user_session, "1");

  		$equips = $_SESSION["itens"];

		$charClass = new char($_SESSION["char"], $mysql);

        if($charClass->levelUP() == 1){
            $main->selectChar($_SESSION["user"], $_SESSION["char"][0]);
            $char = new char($_SESSION["char"],$mysql);
            $char->status();
            $levelup = '<span class="badge white-text teal lighten-2">'.$trans["levelup"].'</span>';
        }

        $char_session = $_SESSION["char"];

		$stats = $_SESSION["stats"];

		$user = array("username" => $user_session["u_user"], "useremail" => $user_session["u_email"]);

		$char = array("charid" => $char_session[0], "charname" => $char_session[1], "charclass" => $char_session[2], "charlevel" => $char_session[3], "charexperience" => $char_session[4], "charpoints" => $char_session[5], "charreborns" => $char_session[6], "charmoney" => $char_session[7]);

        if((($char["charclass"] == "warrior" || $char["charclass"] == "mage" || $char["charclass"] == "acolyte" || $char["charclass"] == "thief") && $char["charlevel"] == "20") || (($char["charclass"] == "knight" || $char["charclass"] == "wizard" || $char["charclass"] == "priest" || $char["charclass"] == "rogue") && $char["charlevel"] == "40")){
            $badge = '<span class="badge white-text teal lighten-2">'.$trans["classup"].'</span>';
            $classchange = '<h6><a class="waves-effect waves-light btn-large" href="changeClass">'.$trans["classchange"].'</a></h6>';
        }
		if($char["charlevel"] >= 41 && $char["charreborns"] <= 5){
            $badge = '<span class="badge white-text teal lighten-2">'.$trans["reborn"].'</span>';
            $classchange = '<h6><a class="waves-effect waves-light btn-large" onClick="reborn('.$char["charid"].');">'.$trans["reborn"].'</a></h6>';
        }

		include("templates/index_loged.tpl.php");
	elseif(isset($_SESSION["user"]) && !empty($_SESSION["user"])):
		$user_session = $_SESSION["user"];
		
		$main = new main($mysql);
  		$main->getChars($user_session);

		$user = array("username" => $user_session["u_user"], "useremail" => $user_session["u_email"]);

		include("templates/index_char.tpl.php");
	else:

		if(isset($_POST["user"])){
			print_r($_POST);
		}

		include("templates/index_login.tpl.php");
	endif;