<?php
	//Register lib archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto

	require_once("classes/main.class.php");

	$email=$_POST['email'];
  	$login=$_POST['login'];
  	$pass=$_POST['password'];
  	$birth=$_POST['birthday'];
  	$secQuest=$_POST['secQuest'];
  	$secAns=$_POST['secAns'];

  	$main = new main($mysql);

  	echo $main->register($email, $login, $pass, $birth, $secQuest, $secAns);
?>
