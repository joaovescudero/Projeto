<?php
	//Logger class archive
	//Create by: Joao Escudero <joaovescudero@gmail.com>
	
	//Require configuration and database file
	require_once("database.conf.php");

	//Create class Logger
	class Logger {

		//Set the function log
		public function log($type, $date){

			//Logs query
			$query = "INSERT INTO log_dash(type, date) VALUES ('$type', '$date')";
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