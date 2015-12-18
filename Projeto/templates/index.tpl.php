<?php
	//Index template archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $global_title; ?></title>
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <div class="navbar-fixed">
	    <nav>
		    <div class="nav-wrapper">
		      <ul id="nav-mobile" class="left hide-on-med-and-down">
		        <li class="charname"><a><?php echo $char["charname"]; ?></a></li>
				<li class="charclass"><a><?php echo $char["charclass"]; ?></a></li>
				<li class="charlevel"><a><?php echo $char["charlevel"]; ?></a></li>
				<li class="charexperience"><a><?php echo $char["charexperience"]; ?> XP</a></li>
				<li class="charmoney"><a><?php echo $char["charmoney"]; ?> coins</a></li>
		      </ul>

		      <a href="#" class="brand-logo center">Web Based Game</a>

		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

			  <ul id="user" class="dropdown-content">
		        <li class="username"><a><?php echo $user["username"]; ?></a></li>
				<li class="useremail"><a><?php echo $user["useremail"]; ?></a></li>
			  </ul>

		      <ul id="nav-mobile" class="right hide-on-med-and-down">
				<!-- Dropdown Trigger -->
			    <li><a class="dropdown-user" href="#!" data-activates="user"><?php echo $user["useremail"]; ?><i class="material-icons right">arrow_drop_down</i></a></li>
		      </ul>

		      <ul class="side-nav" id="mobile-demo">
		        <li class="username"><a><?php echo $user["username"]; ?></a></li>
				<li class="useremail"><a><?php echo $user["useremail"]; ?></a></li>
				<li class="charname"><a><?php echo $char["charname"]; ?></a></li>
				<li class="charclass"><a><?php echo $char["charclass"]; ?></a></li>
				<li class="charlevel"><a><?php echo $char["charlevel"]; ?></a></li>
				<li class="charexperience"><a><?php echo $char["charexperience"]; ?> XP</a></li>
				<li class="charmoney"><a><?php echo $char["charmoney"]; ?> coins</a></li>
				<li><a class="dropdown-user" href="#!" data-activates="user"><?php echo $user["useremail"]; ?><i class="material-icons right">arrow_drop_down</i></a></li>
		      </ul>

		    </div>
	  	</nav>
  	</div>

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
		<p class="charmoney"><?php echo $char["charmoney"]; ?> coin</p>
	</div>
	<script type="text/javascript">
    	$( document ).ready(function(){
    		$(".button-collapse").sideNav();
    		$(".dropdown-user").dropdown();
    	});
    </script>
</body>
</html>