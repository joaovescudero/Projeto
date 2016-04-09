<?php
	//Logout lib archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto

	if (!isset($_SESSION)) {
		session_start();
	}
	session_destroy();
	header("Location: /");
