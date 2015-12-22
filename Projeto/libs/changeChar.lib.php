<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	unset($_SESSION["char"]);
	header("Location: ../Projeto/");