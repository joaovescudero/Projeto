<?php 
	//Main class archive
	//Create by: Joao Escudero <joaovescudero@gmail.com>

	//Initializing session
	//session_start();

	//Setting local
	date_default_timezone_set('America/Sao_Paulo');
	
	//Require configuration, database and logger file
	require_once("logger.class.php");

	//starting main class
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

			//encrypting password
			$e_pass = $this->encrypt($pass);

			//verifying dates
			$query = "SELECT * FROM user_proj WHERE u_user = '$user' AND u_pass = '$e_pass'";
			$sql_run = $this->mysql->query($query);

			//verifying if have any mysql errors
			if(!$sql_run){

				$this->log("Mysql error, function: Login", $this->date);
				return 0;
				exit;

			}

			//counting rows
			$fu_array = $sql_run->fetch_array();
			$count = count($fu_array);

			//if dates are incorrect
			if($count == 0){

				$this->log("Incorrect User/Password, User: $user", $this->date);
				return 1;
				exit;

			}

			//if dates are correct
			$this->log("Login successful, User: $user", $this->date);

			//setting sessions
			$_SESSION["user"] = $fu_array;

			return 2;
			
		}

		//getting dates
		public function getDates($user, $date){

			$a = $_SESSION["user"];
			return $a[$date];

		}

		//create a new character
		public function newChar($user, $name, $class){

			//getting logged user
			$u_user = $this->getDates($user, "1");

			//Verifying number of characters
			$id_user = $this->getDates($user, "0");
			$sql_run = $this->mysql->query("SELECT c_id_acc FROM char_proj WHERE c_id_acc = '$id_user'");

			//counting rows
			$count = $sql_run->num_rows;

			//Verifying name of character
			$sql_run = $this->mysql->query("SELECT c_name FROM char_proj WHERE c_name = '$name'");

			//counting rows
			$fn_array = $sql_run->fetch_array(MYSQLI_NUM);
			$count_char = count($fn_array);

			//verifying if have more of 3 characters
			if($count <= 2){

				if($count_char == 0){

					//inserting into DB
					$sql = "INSERT INTO char_proj(c_name, c_class, c_id_acc) VALUES ('$name', '$class', '$id_user')";
					$sql_run = $this->mysql->query($sql);

					if(!$sql_run){

						$this->log("Mysql error, function: newChar", $this->date);
						return 0;
						exit;

					}

					$this->log("Character create with successful, User: $u_user", $this->date);
					return 2;

				}else{

					$this->log("Trying to create char with duplicated name, User: $u_user", $this->date);
					return 3;
					exit;

				}	

			}else{

				//if have more of 3 chars
				$this->log("Trying to create under 3, User: $u_user", $this->date);
				return 1;
				exit;

			}
		}

		public function selectChar($user, $char){

			//clearing the session
			$_SESSION["char"] = null;

			//getting user id and username
			$id_user = $this->getDates($user, "0");
			$u_user = $this->getDates($user, "1");

			//getting char information
			$sql = "SELECT * FROM char_proj WHERE c_id_acc = '$id_user' AND c_id = '$char'";
			$run = $this->mysql->query($sql);
			$f_array = $run->fetch_array(MYSQLI_NUM);
			$char_name = $f_array[1];

			//logging about it
			$this->log("Selecting a char Name: $char_name, User: $u_user", $this->date);

			//setting sessions
			$_SESSION["char"] = $f_array;

		}
	}

	 	 $m = new main($mysql);

	     $m->login("JoaoEscudero", "joao040699");
	//print_r($_SESSION);
	//echo "<br>";
		 $m->getDates($_SESSION["user"], "2");
	//echo "<br>";
	     //$m->newChar($_SESSION["user"], "teste", "guerreiro");
		 $m->selectChar($_SESSION["user"], "12");
	//echo "<br>";
	//print_r($_SESSION["char"]);
?>