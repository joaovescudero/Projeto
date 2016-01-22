<?php
	//Change class lib archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto

	require_once("classes/char.class.php");

	$char = new char($_SESSION["char"], $mysql);

	if($char->classUP() == 1){
        $char->selectChar($_SESSION["user"], $_SESSION["char"][0]);
        $char = new char($_SESSION["char"],$mysql);
        $char->status();
    }

    header("Location: index.php");
