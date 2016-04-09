<?php
	//Change Char lib archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto

	if (!isset($_SESSION)) {
		session_start();
	}
	unset($_SESSION["char"]);
	header("Location: ../Projeto/");
