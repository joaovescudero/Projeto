<?php
include "main.class.php";

$lvl = 42;
$exp = 1908831;
$lvl_max = 50;

for($i=$lvl;$i<=$lvl_max;$i++){
	$exp = $exp * 2;
	$i_exp =  (int) $exp;
	echo $i_exp."<br>";
	$sql = "INSERT INTO level_proj(level, exp) VALUES ('$i', '$i_exp')";
	$run = $mysql->query($sql);
}
?>