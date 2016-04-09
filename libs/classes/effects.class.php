<?php
	//Effects class archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto

	//Initializing session
	//session_start();
	
	//Require configuration, database and logger file
	include("main.class.php");

	//creating effetcs class
	class effects extends main {
		public function Effect($stats ,$effectID, $q){
			if($effectID >= "1" AND $effectID <= "6"){
				$perc = $q / 100;
				$p = $perc * $stats[$effectID];
				$new_effect = $stats[$effectID] + $p;
				return $new_effect;
			}
			if($effectID == "7"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "8"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "9"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "10"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "11"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "12"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "13"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "14"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "15"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "16"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "17"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "19"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "20"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "21"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "22"){
				$new_effect = $stats[$effectID] + $q;
				return $new_effect;
			}
			if($effectID == "23"){
				$perc = $q / 100;
				$p = $perc * $stats[$effectID];
				$new_effect = $stats[$effectID] + $p;
				return $new_effect;
			}
			if($effectID == "24"){
				$perc = $q / 100;
				$p = $perc * $stats[$effectID];
				$new_effect = $stats[$effectID] + $p;
				return $new_effect;
			}
			if($effectID == "25"){
				$perc = $q / 100;
				$p = $perc * $stats[$effectID];
				$new_effect = $stats[$effectID] + $p;
				return $new_effect;
			}
		}

		public function itemEffect($itens){
			for($i=1;$i<=6;$i++){
				$item_id = $itens[$i];
				if($item_id != ""){
					$item_sql = "SELECT * FROM item_$this->suffix WHERE item_id = '$item_id'";
					$item_run = $this->mysql->query($item_sql);
					$f_item_array = $item_run->fetch_array(MYSQLI_NUM);
					if((count($f_item_array)) != 0){
						$item_effect = $f_item_array[12];
						$explode = explode(";", $item_effect);
						$count = count($explode) - 2;
						for($s=0;$s<=$count;$s++){
							$effectID = explode(",", $explode[$s]);
							$n_stats = (int) $this->Effect($_SESSION["stats"], $effectID[0], $effectID[1]);
							$_SESSION["stats"][$effectID[0]] = $n_stats;
						}
					}
				}
			}
			return $_SESSION["stats"];
		}

		public function runesEffect($runes, $status){
			//$cou = count($runes) - 2;
			for($i=1;$i<=6;$i++){
				$rune_id = $i;
				if($rune_id != 0){
				  /*$runes_sql = "SELECT * FROM runes_$this->suffix WHERE runes_id = '$rune_id'";
					$runes_run = $this->mysql->query($runes_sql);
					$f_runes_array = $runes_run->fetch_array(MYSQLI_NUM);
					if((count($f_runes_array)) != 0){*/
						$quant = $runes[$rune_id];
						$n_stats = (int) $this->Effect($status, $i, $quant);
						$status[$i] = $n_stats;
					//}
				}
			}
			return $status;
		}

        public function fortEffect($fort, $status){
            for($i=0;$i<=5;$i++){
				$fort_id = $fort[$i];
				if($fort_id != "" AND $fort_id != "0"){
                    $fort_lvl = $fort[$i];
                    $fort_q = $fort_lvl * 0.008;
					for($c=1;$c<=6;$c++){
                        $status[$c] = $status[$c] + ($status[$c] * $fort_q);
                    }
				}
			}
			return $status;
        }
	}
