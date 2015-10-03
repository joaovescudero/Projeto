<?php
	//Main class archive
	//Create by: Joao Escudero <joaovescudero@gmail.com>

	//Initializing session
	//session_start();
	
	//Require configuration, database and logger file
	require_once("main.class.php");
	require_once("teste.php");

	//starting char class
	class char extends Logger {
		public $char = null;
		public $mysql = null;
		public $date = null;

		//get the char session
		public function __construct($char, $mysql){
			$this->char = $char;
			$this->mysql = $mysql;
			$date = date("Y-m-d H:i:s");
			$this->date = $date;
		}

		public function levelUP(){

			//setting the variables
			$id = $this->char[0];
			$class = $this->char[2];
			$level = $this->char[3];
			$exp = $this->char[4];
			$stats = $this->char[5];

			//verifying if it isn't level 50
			if($level == 50){
				exit;
			}

			//getting next level exp
			$next_level = $level + 1;
			$n_sql = "SELECT * FROM level_proj WHERE level='$next_level'";
			$n_run = $this->mysql->query($n_sql);
			$fnl_array = $n_run->fetch_array(MYSQLI_NUM);

			//verifying level
			if($level == 20 || $level == 40){
				$this->classUP();
				return 2;
				exit;
			}

			//verifying exp
			if($exp >= $fnl_array[1]){

				//setting the new level and exp
				$n_level = $level + 1;
				$n_exp = $exp - $fnl_array[1];

				//adding stats points
				if($n_level <= 20){
					$n_stats = $stats + 3;
				}
				elseif($n_level >= 21 AND $n_level <= 40){
					$n_stats = $stats + 4;
				}
				elseif($n_level >= 41){
					$n_stats = $stats + 6;
				}

				if($n_level == 50){
					$n_exp = 0;
				}

				if($n_level >= 51){
					exit;
				}

				if($class == "royal guard" || $class == "warlock" || $class == "arch bishop" || $class == "shadow chaser"){
				}
				else{
					if($n_level == 20 || $n_level == 40){
						$n_exp = 0;
					}
				}

				//saving the new level and exp
				$sql = "UPDATE char_proj SET c_level = '$n_level', c_exp = '$n_exp', c_stats = '$n_stats' WHERE c_id='$id'";
				$run = $this->mysql->query($sql);

				//saving log
				$this->log("Char level up, level: $n_level, char: $id", $this->date);

				return 1;
				exit;
			}
		}

		public function classUP(){

			//setting the variables
			$id = $this->char[0];
			$class = $this->char[2];
			$level = $this->char[3];
			$exp = $this->char[4];

			//if was reborned
			if($class == "royal guard" || $class == "warlock" || $class == "arch bishop" || $class == "shadow chaser"){
				$n_level = $level + 1;
				//changing level
		        $sql = "UPDATE char_proj SET c_level = '$n_level' WHERE c_id='$id'";
				$run = $this->mysql->query($sql);
			}
			//checking level
			elseif($level == 20){
				//checking class
				if($class == "warrior"){
					$n_level = $level + 1;
			        $n_class = "knight";
			        //changing class
			        $sql = "UPDATE char_proj SET c_class = '$n_class', c_level = '$n_level' WHERE c_id='$id'";
					$run = $this->mysql->query($sql);
				}
				//checking class
				elseif($class == "mage"){
					$n_level = $level + 1;
			        $n_class = "wizard";
			        //changing class
			        $sql = "UPDATE char_proj SET c_class = '$n_class', c_level = '$n_level' WHERE c_id='$id'";
					$run = $this->mysql->query($sql);
				}
				//checking class
				elseif($class == "acolyte"){
					$n_level = $level + 1;
			        $n_class = "priest";
			        //changing class
			        $sql = "UPDATE char_proj SET c_class = '$n_class', c_level = '$n_level' WHERE c_id='$id'";
					$run = $this->mysql->query($sql);
				}
				//checking class
				elseif($class == "thief"){
					$n_level = $level + 1;
			        $n_class = "rogue";
			        //changing class
			        $sql = "UPDATE char_proj SET c_class = '$n_class', c_level = '$n_level' WHERE c_id='$id'";
					$run = $this->mysql->query($sql);
				}
			}
			//checking level
			elseif($level == 40){
				//checking class
				if($class == "knight"){
					$n_level = $level + 1;
			        $n_class = "royal guard";
			        //changing class
			        $sql = "UPDATE char_proj SET c_class = '$n_class', c_level = '$n_level' WHERE c_id='$id'";
					$run = $this->mysql->query($sql);
				}
				//checking class
				elseif($class == "wizard"){
					$n_level = $level + 1;
			        $n_class = "warlock";
			        //changing class
			        $sql = "UPDATE char_proj SET c_class = '$n_class', c_level = '$n_level' WHERE c_id='$id'";
					$run = $this->mysql->query($sql);
				}
				//checking class
				elseif($class == "priest"){
					$n_level = $level + 1;
			        $n_class = "arch bishop";
			        //changing class
			        $sql = "UPDATE char_proj SET c_class = '$n_class', c_level = '$n_level' WHERE c_id='$id'";
					$run = $this->mysql->query($sql);
				}
				//checking class
				elseif($class == "rogue"){
					$n_level = $level + 1;
			        $n_class = "shadow chaser";
					//changing class
			        $sql = "UPDATE char_proj SET c_class = '$n_class', c_level = '$n_level' WHERE c_id='$id'";
					$run = $this->mysql->query($sql);
				}
			}

			//saving log
			$this->log("Char class up, level: $n_level, char: $id", $this->date);
		}

		public function reborn(){
			//setting the variables
			$id = $this->char[0];
			$class = $this->char[2];
			$level = $this->char[3];
			$exp = $this->char[4];
			$stats = $this->char[5];
			$reborns = $this->char[6];

			//checking level
			if($level >= 41){
				$n_stats = $level-40;
				$n_stats = $n_stats + $stats;
				$n_reborns = $reborns + 1;

				//reborn
				$item = $this->item($n_reborns);
				//if($item == 1){}else{}
				//if($this->random() == 0){
				//	exit;
				//}

				$sql = "UPDATE char_proj SET c_level = '1', c_exp = '0', c_stats = '$n_stats', c_reborns = '$n_reborns' WHERE c_id='$id'";
				$run = $this->mysql->query($sql);

				//saving log
				$this->log("Char reborned, reborn: $n_reborns, char: $id", $this->date);
			}
		}

		public function item($reborns){
			//setting the variables
			$id = $this->char[0];
			$class = $this->char[2];

			//giving the item
			if($reborns == 1){
				if($class == "shadow chaser"){
					$this->giveItem("10001");
				}
				elseif($class == "royal guard"){
					$this->giveItem("10003");
				}
				elseif($class == "warlock"){
					$this->giveItem("10004");	
				}
				elseif($class == "arch bishop"){
					$this->giveItem("10005");
				}
			}
			elseif($reborns == 2){
				if($class == "shadow chaser"){
					$this->giveItem("10002");
				}
				elseif($class == "royal guard"){
					$this->giveItem("10004");
				}
				elseif($class == "warlock"){
					$this->giveItem("10006");	
				}
				elseif($class == "arch bishop"){
					$this->giveItem("10008");
				}
			}
			elseif($reborns == 3){
				if($class == "shadow chaser"){
					$this->giveItem("20001");
				}
				elseif($class == "royal guard"){
					$this->giveItem("20002");
				}
				elseif($class == "warlock"){
					$this->giveItem("20003");	
				}
				elseif($class == "arch bishop"){
					$this->giveItem("20004");
				}
			}
			elseif($reborns == 4){
				if($class == "shadow chaser"){
					$this->giveItem("30001");
				}
				elseif($class == "royal guard"){
					$this->giveItem("30002");
				}
				elseif($class == "warlock"){
					$this->giveItem("30003");	
				}
				elseif($class == "arch bishop"){
					$this->giveItem("30004");
				}
			}
			elseif($reborns == 5){
				if($class == "shadow chaser"){
					$this->giveItem("40001");
				}
				elseif($class == "royal guard"){
					$this->giveItem("40002");
				}
				elseif($class == "warlock"){
					$this->giveItem("40003");	
				}
				elseif($class == "arch bishop"){
					$this->giveItem("40004");
				}
			}
			elseif($reborns == 6){
				if($class == "shadow chaser"){
					$this->giveItem("50001");
				}
				elseif($class == "royal guard"){
					$this->giveItem("50002");
				}
				elseif($class == "warlock"){
					$this->giveItem("50003");	
				}
				elseif($class == "arch bishop"){
					$this->giveItem("50004");
				}
			}
		}

		public function giveItem($item_id){
			$id_acc = $this->char[8];

			//getting bank space
			$sql = "SELECT * FROM bank_proj WHERE bank_acc_id = '$id_acc'";
			$run = $this->mysql->query($sql);
			$num = $run->num_rows;

			if($num >= 200){
				return 0;
				exit;
			}

			//adding item
			$slot = $num + 1;
			$sql_add = "INSERT INTO bank_proj(bank_item_id, bank_item_slot, bank_acc_id) VALUES('$item_id', '$slot', '$id_acc')";
			$run_add = $this->mysql->query($sql_add);
			return 1;

			//saving log
			$this->log("Adding an item, item: $item_id, account: $id_acc", $this->date);

		}

		public function status($status_id){
			
		}
	}
	$c = new char($_SESSION["char"], $mysql);
	print_r($c->char);
	$c->reborn();
?>