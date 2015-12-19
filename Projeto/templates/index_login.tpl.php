<?php
	//Index Login template archive
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
    <link href="./assets/docs.css" rel="stylesheet">
    <link href="./css/flag-icon.css" rel="stylesheet">

    <meta charset="utf-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
    	.menu{
    		height: 100% !important;
    	}
    </style>
</head>
<body>

	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <div class="navbar-fixed">
	    <nav>
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo center">Web Based Game</a>

			    <ul id="nav-mobile" class="right hide-on-med-and-down">
					<!-- Dropdown Trigger -->
				    <li><a class="dropdown-language" href="#!" data-activates="language">Languages<i class="material-icons right">arrow_drop_down</i></a></li>
			    </ul>

			    <ul id="language" class="dropdown-content">
			        <li class="username"><a href="/Projeto/?lang=br"><span class="flag-icon flag-icon-br"></span>Brazil</a></li>
			        <li class="username"><a href="/Projeto/?lang=en"><span class="flag-icon flag-icon-um"></span>United States</a></li>
				 </ul>
		    </div>
	  	</nav>
  	</div>

     <div class="row">
	    <form class="col s12" method="post">

	      <div class="row">
	      	<div class="input-field col s3">
	        </div>
	        <div class="input-field col s6">
	          <i class="material-icons prefix">perm_identity</i>
	          <input id="user" type="text" class="validate">
	          <label for="email"><?php echo $trans["username"]; ?></label>
	        </div>
	      </div>
	      <div class="row">
	      	<div class="input-field col s3">
	        </div>
	        <div class="input-field col s6">
	          <i class="material-icons prefix">lock</i>
	          <input id="password" type="password" class="validate">
	          <label for="password"><?php echo $trans["password"]; ?></label>
	        </div>
	      </div>
	      <div class="row">
	      	<div class="input-field col s3">
	        </div>
	      	<div class="input-field col s6">
		      <button class="btn waves-effect waves-light" type="submit" name="action"><?php echo $trans["submit_login"]; ?>
			    <i class="material-icons right">send</i>
			  </button>
			</div>
		  </div>
	    </form>
	  </div>

	<script type="text/javascript">
    	$( document ).ready(function(){
    		$(".button-collapse").sideNav();
    		$(".dropdown-language").dropdown();
    	});
    </script>
</body>
</html>