<?php 
	//Main class archive
	//Create by: Joao Escudero <joaovescudero@gmail.com>
	
	//Require configuration, database and logger file
	require_once("logger.class.php");

	class main extends Logger {
		public $date = null;

		//Get the DATETIME
		public function __construct(){
			$date = date("Y-m-d H:i:s");
			$this->date = $date;
		}

		//Text Encrypt
		public function encrypt($text){
			$enc = sha1(md5(md5($text)*microtime()));

			return $enc;
		}

		//Public function login
		public function login($user, $pass){

			//Checking if user and password are empty
			if(empty($user) || empty($pass)){
				return 0;
				exit;
			}

			$e_pass = $this->encrypt($pass);

			$query = "SELECT id FROM user_dash WHERE user = '$user' AND password = '$e_pass'";
			$sql_run = $mysql->query($query);

			if(!$sql_run){
				$this->log("Mysql error", $this->date);
				return 0;
				exit;
			}

			$f_array = $sql_run->fetch_array(MYSQLI_NUM);
			$count = count($f_array);

			if($f_array != 1){
				$this->log("Incorrect User/Password", $this->date);
				return 1;
				exit;
			}

			$this->log("Login successful, User: $user", $this->date);
			return 2;
		}
	}