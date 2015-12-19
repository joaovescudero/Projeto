<?php
	//Char class archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto

	//Initializing session
	if (!isset($_SESSION)) {
		session_start();
	}
	
	//Require configuration, database and logger file
	require_once("effects.class.php");

	//starting char class
	class char extends effects {
		public $char = null;
		public $mysql = null;
		public $date = null;
		public $str = null;
		public $vit = null;
		public $dex = null;
		public $agi = null;
		public $int = null;
		public $luk = null;
		public $atk = null;
		public $magic_atk = null;
		public $block = null;
		public $HP = null;
		public $dam_red = null;
		public $cd_red = null;
		public $hit = null;
		public $mag_crit = null;
		public $mag_crit_dam = null;
		public $crit = null;
		public $crit_dam = null;
		public $dodge = null;

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
			//setting the variables
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

		public function getStatus(){
			if(empty($_SESSION["stats"])){
				//setting the variables
				$this->str = null;
				$this->vit = null;
				$this->dex = null;
				$this->agi = null;
				$this->int = null;
				$this->luk = null;
			}/*else{
				$this->str = $_SESSION["stats"][1];
				$this->vit = $_SESSION["stats"][2];
				$this->dex = $_SESSION["stats"][3];
				$this->agi = $_SESSION["stats"][4];
				$this->int = $_SESSION["stats"][5];
				$this->luk = $_SESSION["stats"][6];
				$this->atk = $_SESSION["stats"][24];
				$this->magic_atk = $_SESSION["stats"][25];
				$this->block = $_SESSION["stats"][11];
				$this->HP = $_SESSION["stats"][23];
				$this->dam_red = $_SESSION["stats"][14];
				$this->cd_red = $_SESSION["stats"][20];
				$this->hit = $_SESSION["stats"][15];
				$this->mag_crit = $_SESSION["stats"][16];
				$this->mag_crit_dam = $_SESSION["stats"][17];
				$this->crit = $_SESSION["stats"][9];
				$this->crit_dam = $_SESSION["stats"][10];
				$this->dodge = $_SESSION["stats"][21];
			}*/
		}

		public function status(){
			$id = $this->char[0];
			//$this->getStatus();
			$str = null;
			$vit = null;
			$dex = null;
			$agi = null;
			$int = null;
			$luk = null;
			$atk = null;

			//getting equipment
			$sql = "SELECT * FROM equipment_proj WHERE equip_char_id = '$id'";
			$run = $this->mysql->query($sql);
			$f_array = $run->fetch_array(MYSQLI_NUM);
			$_SESSION["itens"] = $f_array;

			for($i=0;$i<=7;$i++){
				$item_id = $f_array[$i];
				if($item_id != ""){
					$item_sql = "SELECT * FROM item_proj WHERE item_id = '$item_id'";
					$item_run = $this->mysql->query($item_sql);
					$f_item_array = $item_run->fetch_array(MYSQLI_NUM);
					if((count($f_item_array)) != 0){
						$str = $str + $f_item_array[6];
						$vit = $vit + $f_item_array[7];
						$dex = $dex + $f_item_array[8];
						$agi = $agi + $f_item_array[9];
						$int = $int + $f_item_array[10];
						$luk = $luk + $f_item_array[11];
					}
				}
			}

			$status = array('1' => $str, '2' => $vit, '3' => $dex, '4' => $agi, '5' => $int, '6' => $luk);

			$sts = $this->runes($status);

			$str = $sts[1];
			$vit = $sts[2];
			$dex = $sts[3];
			$agi = $sts[4];
			$int = $sts[5];
			$luk = $sts[6];

			$atk = $str * 20;
			$magic_atk = $int * 20;
			$block = ((int)$str/5) * 0.5;
			$HP = $vit * 40;
			$all_dam_red = 0;
			$dam_red = ((int)$vit/5) * 0.1;
			$cd_red = $dex * 0.1;
			$hit = ((int)$dex/5) * 0.5;
			$mag_crit = ((int)$int/5) * 0.5;
			$mag_crit_dam = ((int)$int/10);
			$crit = ((int)$luk/5) * 0.5;
			$crit_dam = ((int)$agi/10);
			$dodge = $agi * 0.2;
			$posion = 0;
			$double_hit = 0;
			$reflect = 0;
			$dem_dam_red = 0;
			$mag_dam_red = 0;
			$heal_inc = 0;

			$stats = array('1' => $str, '2' => $vit, '3' => $dex, '4' => $agi, '5' => $int, '6' => $luk, '24' => $atk
						   , '25' => $magic_atk, '11' => $block, '23' => $HP, '14' => $dam_red, '20' => $cd_red, '15' => $hit
						   , '16' => $mag_crit, '17' => $mag_crit_dam, '9' => $crit, '10' => $crit_dam, '21' => $dodge
						   , '22' => $all_dam_red, '7' => $posion, '8' => $double_hit, '12' => $reflect, '13' => $dem_dam_red
						   , '18' => $mag_dam_red, '19' => $heal_inc);
			ksort($stats);
			$_SESSION["stats"] = $stats;
			//$this->runes();
			//return $str."<br>".$vit."<br>".$dex."<br>".$agi."<br>".$int."<br>".$luk."<br>".$HP;
		}

		public function runes($status){
			$runes = array('1' => 9, '2' => 9, '3' => 9, '4' => 9, '5' => 0, '6' => 0);
			$sts = $this->runesEffect($runes, $status);
			return $sts;
		}
	}

	/*$c = new char($_SESSION["char"], $mysql);
	print_r($_SESSION["user"]);echo "<br>";
	print_r($c->char);echo "<br>";
	$c->status();
	print_r($_SESSION["itens"]);echo "<br>";
	print_r($_SESSION["stats"]);echo "<br>";
	$c->itemEffect($_SESSION["itens"] ,$_SESSION["stats"]);
	ksort($_SESSION["stats"]);
	print_r($_SESSION["stats"]);echo "<br>";*/
?>