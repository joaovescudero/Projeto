<?php
	require_once("classes/char.class.php");

	if(!empty($_GET["lang"]) || isset($_GET["lang"]) ){
		$_SESSION["lang"] = $_GET["lang"];
		$uri = $_SERVER['REQUEST_URI'];
		$uri = explode("?", $uri);
		header("Location: ".$uri[0]);
	}elseif(isset($_SESSION["lang"]) || !empty($_SESSION["lang"])){
		$lang = $_SESSION["lang"];
	}else{
		$_SESSION["lang"] = "en";
		header("Location: #");
	}

	include("../translations/".$lang.".php");

	$id=$_POST['id'];

	$char = new char($_SESSION["char"], $mysql);

	$itemBank = $char->getItemBank($_SESSION["user"], $id);
	$itemStats = $char->getItemStats($itemBank[1]);

	$name = $trans["itens"][$itemStats[1]]." +".$itemBank[5];
	$type = $trans["type"][$itemStats[5]];
	$classType = $trans["classType"][$itemStats[4]];
	$class = $trans["class"][$itemStats[2]];
	$minlevel = $trans["level"].": ".$itemStats[3];
	$str = $itemStats[6];
	$vit = $itemStats[7];
	$dex = $itemStats[8];
	$agi = $itemStats[9];
	$int = $itemStats[10];
	$luk = $itemStats[11];

	echo <<<END
		<div class="modal-content">
	      <h4>$name</h4>
	      <p>$type</p>
	      <p>$class</p>
	      <p>$minlevel</p>
	      <p>$classType</p>
	      <p>STR: $str &nbsp;&nbsp; VIT: $vit &nbsp;&nbsp; DEX: $dex &nbsp;&nbsp; AGI: $agi &nbsp;&nbsp; INT: $int &nbsp;&nbsp; LUK: $luk</p>
	    </div>
END;
?>