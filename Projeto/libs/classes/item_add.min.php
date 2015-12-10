<?php
	//Item insert archive
	//Create by: Joao Escudero <joaovescudero@gmail.com>

	//Initializing session
	//session_start();
	
	//Require configuration, database and logger file
	require_once("main.class.php");
	$m = new main($mysql);

	if(isset($_POST["itemid"])){
		$item_id = $_POST["itemid"];
		$item_name = $_POST["itemname"];
		$item_class = $_POST["itemclass"];
		$item_lvlmin = $_POST["itemlvlmin"];
		$item_type = $_POST["itemtype"];
		$item_slot = $_POST["itemslot"];
		$item_str = $_POST["itemstr"];
		$item_vit = $_POST["itemvit"];
		$item_dex = $_POST["itemdex"];
		$item_agi = $_POST["itemagi"];
		$item_int = $_POST["itemint"];
		$item_luk = $_POST["itemluk"];
		$eff1 = $_POST["eff1"];
		$eff1porc = $_POST["eff1porc"];
		$eff2 = $_POST["eff2"];
		$eff2porc = $_POST["eff2porc"];
		$eff3 = $_POST["eff3"];
		$eff3porc = $_POST["eff3porc"];
		$eff4 = $_POST["eff4"];
		$eff4porc = $_POST["eff4porc"];

		$item_name = str_replace("'", "\'", $item_name);

		$effect = "";
		if($eff1 != "0"){
			$effect = $effect.$eff1.",".$eff1porc.";";
		}
		if($eff2 != "0"){
			$effect = $effect.$eff2.",".$eff2porc.";";
		}
		if($eff3 != "0"){
			$effect = $effect.$eff3.",".$eff3porc.";";
		}
		if($eff4 != "0"){
			$effect = $effect.$eff4.",".$eff4porc.";";
		}

		$sql = "INSERT INTO item_proj(item_id, item_name, item_class, item_nvlmin, item_type, item_slot, item_str, item_vit, item_dex, item_agi, item_int, item_luk, item_effect)
				VALUES ('$item_id', '$item_name', '$item_class', '$item_lvlmin', '$item_type', '$item_slot', '$item_str', '$item_vit', '$item_dex', '$item_agi', '$item_int', '$item_luk', '$effect')";
		$run = $m->mysql->query($sql);

	}

?>
<form method="post">
item id:<input type="text" name="itemid" autofocus><br>
item name:<input type="text" name="itemname"><br>
item class:
<select name="itemclass">
	<option value="warrior">warrior</option>
	<option value="knight">knight</option>
	<option value="royal guard">royal guard</option>
	<option value="mage">mage</option>
	<option value="wizard">wizard</option>
	<option value="warlock">warlock</option>
	<option value="acolyte">acolyte</option>
	<option value="priest">priest</option>
	<option value="arch bishop">arch bishop</option>
	<option value="thief">thief</option>
	<option value="rogue">rogue</option>
	<option value="shadow chaser">shadow chaser</option>
</select>
<br>
item minimum level:<input type="text" name="itemlvlmin" value="0">
<br>
item type:
<select name="itemtype">
	<option value="regular">regular</option>
	<option value="legendary">legendary</option>
	<option value="supreme">supreme</option>
	<option value="worldwide">worldwide</option>
</select>
<br>
item slot:
<select name="itemslot">
	<option value="weapon">weapon</option>
	<option value="helmet">helmet</option>
	<option value="chestplate">chestplate</option>
	<option value="legs">legs</option>
	<option value="boots">boots</option>
</select>
<br>
item str:<input type="text" name="itemstr"><br>
item vit:<input type="text" name="itemvit"><br>
item dex:<input type="text" name="itemdex"><br>
item agi:<input type="text" name="itemagi"><br>
item int:<input type="text" name="itemint"><br>
item luk:<input type="text" name="itemluk"><br>
item effect 1:
<select name="eff1">
	<option value="0">none</option>
	<?php
	$sql = "SELECT * FROM status_proj";
	$run = $m->mysql->query($sql);
	while ($f = $run->fetch_assoc()) {
		echo '<option value="'.$f["status_id"].'">'.$f["status_name"].'</option>';
	}
	?>
</select>
<input type="text" name="eff1porc">
<br>
item effect 2:
<select name="eff2">
	<option value="0">none</option>
	<?php
	$sql = "SELECT * FROM status_proj";
	$run = $m->mysql->query($sql);
	while ($f = $run->fetch_assoc()) {
		echo '<option value="'.$f["status_id"].'">'.$f["status_name"].'</option>';
	}
	?>
</select>
<input type="text" name="eff2porc">
<br>
item effect 3:
<select name="eff3">
	<option value="0">none</option>
	<?php
	$sql = "SELECT * FROM status_proj";
	$run = $m->mysql->query($sql);
	while ($f = $run->fetch_assoc()) {
		echo '<option value="'.$f["status_id"].'">'.$f["status_name"].'</option>';
	}
	?>
</select>
<input type="text" name="eff3porc">
<br>
item effect 4:
<select name="eff4">
	<option value="0">none</option>
	<?php
	$sql = "SELECT * FROM status_proj";
	$run = $m->mysql->query($sql);
	while ($f = $run->fetch_assoc()) {
		echo '<option value="'.$f["status_id"].'">'.$f["status_name"].'</option>';
	}
	?>
</select>
<input type="text" name="eff4porc">
<br>
<input type="submit" value="criar">
</form>