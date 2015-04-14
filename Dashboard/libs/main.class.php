<?php 
	//Main class archive
	//Create by: Joao Escudero <joaovescudero@gmail.com>

	//Setting local
	date_default_timezone_set('America/Sao_Paulo');
	
	//Require configuration, database and logger file
	require_once("logger.class.php");

	class main extends Logger {
		public $date = null;
		public $mysql = null;

		//Get the DATETIME
		public function __construct($mysql){
			$date = date("Y-m-d H:i:s");
			$this->date = $date;

			$this->mysql = $mysql;
		}

		//Text Encrypt
		public function encrypt($text){
			$enc = sha1(md5(md5($text)));

			return $enc;
		}

		//Public function login
		public function login($user, $pass){

			//Checking if user and password are empty
			if(empty($user) || empty($pass)){
				return 3;
				exit;
			}

			$e_pass = $this->encrypt($pass);

			$query = "SELECT * FROM user_dash WHERE u_user = '$user' AND u_pass = '$e_pass'";
			$sql_run = $this->mysql->query($query);

			if(!$sql_run){
				$this->log("Mysql error", $this->date);
				return 0;
				exit;
			}

			$f_array = $sql_run->fetch_array(MYSQLI_NUM);
			$count = count($f_array);

			if($count == 0){
				$this->log("Incorrect User/Password", $this->date);
				return 1;
				exit;
			}

			$this->log("Login successful, User: $user", $this->date);
			return 2;
		}
	}

	$m = new main($mysql);

	echo $m->login("JoaoEscudero", "joao040699");