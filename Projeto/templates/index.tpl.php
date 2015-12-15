<?php
	//Index template archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $global_title; ?></title>
</head>
<body>
	<div class="user">
		<p class="username"><?php echo $user["username"]; ?></p>
		<p class="useremail"><?php echo $user["useremail"]; ?></p>
	</div>
	<div class="char">
		<p class="charname"><?php echo $char["charname"]; ?></p>
		<p class="charclass"><?php echo $char["charclass"]; ?></p>
		<!--<p class="charguild"></p>-->
		<p class="charlevel"><?php echo $char["charlevel"]; ?></p>
		<p class="charexperience"><?php echo $char["charexperience"]; ?> XP</p>
		<p class="charmoney"><?php echo $char["charmoney"]; ?> coins</p>
	</div>
</body>
</html>