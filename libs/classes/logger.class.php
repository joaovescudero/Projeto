<?php
	//Logger class archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto
	
	//Require configuration and database file
	require_once("database.conf.php");

	//Create class Logger
	class Logger {

		//Set the function log
		public function log($type, $date){

			//getting ip of user
			$ip = $_SERVER["REMOTE_ADDR"];

			//Logs query
			$query = "INSERT INTO log_proj(type, date, ip) VALUES ('$type', '$date', '$ip')";
			//Running the query
			$sql_run = $this->mysql->query($query);

			//Checking the run
			if(!$sql_run){

				//If have an error, return false
				return false;
				exit;
			}

			//If everything is okay, return true
			return true;
		}
	}