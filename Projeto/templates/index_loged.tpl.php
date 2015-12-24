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
		      <ul id="nav-mobile" class="left hide-on-med-and-down">
		        <li class="charname"><a><?php echo $char["charname"]; ?></a></li>
				<li class="charclass"><a><?php echo $trans["class"][$char["charclass"]]; ?></a></li>
				<li class="charlevel"><a><?php echo $char["charlevel"];
				if((($char["charclass"] == "warrior" || $char["charclass"] == "mage" || $char["charclass"] == "acolyte" || $char["charclass"] == "thief") && $char["charlevel"] == "20") || (($char["charclass"] == "knight" || $char["charclass"] == "wizard" || $char["charclass"] == "priest" || $char["charclass"] == "rogue") && $char["charlevel"] == "40")){
					echo '<span class="badge white-text teal lighten-2">'.$trans["classup"].'</span>';
				}
				if($char["charlevel"] >= 41 && $char["charreborns"] <= 5){echo '<span class="badge white-text teal lighten-2">'.$trans["reborn"].'</span>';} ?></a></li>
				<li class="charexperience"><a><?php echo $char["charexperience"]." ".$trans["xp"]; ?></a></li>
				<li class="charmoney"><a><?php echo $char["charmoney"]." ".$trans["coins"]; ?></a></li>
		      </ul>

		      <a href="#" class="brand-logo center">Web Based Game</a>

		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

			  <ul id="user" class="dropdown-content">
		        <li class="username"><a><?php echo $user["username"]; ?></a></li>
				<li class="useremail"><a><?php echo $user["useremail"]; ?></a></li>
				<li class="usersettings"><a><i class="material-icons left">settings</i><?php echo $trans["settings"]; ?></a></li>
				<li class="userchangechar"><a href="changeChar"><i class="material-icons left">supervisor_account</i><?php echo $trans["changeChar"]; ?></a></li>
				<li class="userlogout"><a href="logout"><i class="material-icons left">power_settings_new</i><?php echo $trans["logout"]; ?></a></li>
			  </ul>

		      <ul id="nav-mobile" class="right hide-on-med-and-down">
				<!-- Dropdown Trigger -->
			    <li><a class="dropdown-user" href="#!" data-activates="user"><?php echo $user["useremail"]; ?><i class="material-icons right">arrow_drop_down</i></a></li>
		      </ul>

		      <ul class="side-nav" id="mobile-demo">
		        <li class="username"><a><?php echo $user["username"]; ?></a></li>
				<li class="useremail"><a><?php echo $user["useremail"]; ?></a></li>
				<li class="charname"><a><?php echo $char["charname"]; ?></a></li>
				<li class="charclass"><a><?php echo $trans["class"][$char["charclass"]]; ?></a></li>
				<li class="charlevel"><a><?php echo $char["charlevel"]; ?></a></li>
				<li class="charexperience"><a><?php echo $char["charexperience"]." ".$trans["xp"]; ?></a></li>
				<li class="charmoney"><a><?php echo $char["charmoney"]." ".$trans["coins"]; ?></a></li>
		      </ul>

		    </div>
	  	</nav>
  	</div>

    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3"><a class="active" href="#stats"><?php echo $trans["stats"]; ?></a></li>
          <li class="tab col s3"><a href="#inventory"><?php echo $trans["inventory"]; ?></a></li>
          <li class="tab col s3"><a href="#skills"><?php echo $trans["skills"]; ?></a></li>
          <li class="tab col s3 disabled"><a href="#guild"><?php echo $trans["guild"]; ?></a></li>
          <li class="tab col s3"><a href="#shop"><?php echo $trans["shop"]; ?></a></li>
        </ul>
      </div>

	  <div id="stats" class="col s12">
	 	<div class="col s6 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
	             <p><?php echo $trans["level"].": <b>".$char["charlevel"]."</b><br>"; ?>
			  		<?php echo $trans["xp"].": <b>".$char["charexperience"]."</b>"; ?>
			  		<div class="progress" style="width: 50%">
				      <div class="determinate" style="width: <?php echo $charClass->getExp($_SESSION["char"]); ?>%"></div>
				  	</div>
			  	</p>
            </div>
          </div>
        </div>
        <div class="col s6 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
	             <p><?php echo $trans["points"]; ?> <b id="points"><?php echo $char["charpoints"] ?></b><br>
			  		<?php echo $trans["statsName"]["strength"]; ?>: <b id="strength"><?php echo $stats[1]; ?></b><a href="#" class="material-icons" onclick="addStr()">add</a><br>
			  		<?php echo $trans["statsName"]["vitality"]; ?>: <b id="vitality"><?php echo $stats[2]; ?></b><a href="#" class="material-icons" onclick="addVit()">add</a><br>
			  		<?php echo $trans["statsName"]["dexterity"]; ?>: <b id="dexterity"><?php echo $stats[3]; ?></b><a href="#" class="material-icons" onclick="addDex()">add</a><br>
			  		<?php echo $trans["statsName"]["agility"]; ?>: <b id="agility"><?php echo $stats[4]; ?></b><a href="#" class="material-icons" onclick="addAgi()">add</a><br>
			  		<?php echo $trans["statsName"]["intelligence"]; ?>: <b id="intelligence"><?php echo $stats[5]; ?></b><a href="#" class="material-icons" onclick="addInt()">add</a><br>
			  		<?php echo $trans["statsName"]["lucky"]; ?>: <b id="lucky"><?php echo $stats[6]; ?></b><a href="#" class="material-icons" onclick="addLuk()">add</a><br>
			  	</p>
            </div>
            <div class="white-text card-action" id="savestats">
			  	<a class="waves-effect waves-light btn" onclick="saveStats('<?php echo $char["charid"]; ?>')"><i class="material-icons left">send</i><?php echo $trans["save"]; ?></a>
			</div>
          </div>
        </div>
        <div class="col s6 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
	             <p><?php echo $trans["lefthand"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][1])]."</b><br>"; ?>
	             	<?php echo $trans["righthand"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][2])]."</b><br>"; ?>
	             	<?php echo $trans["helmet"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][3])]."</b><br>"; ?>
	             	<?php echo $trans["chestplate"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][4])]."</b><br>"; ?>
	             	<?php echo $trans["legs"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][5])]."</b><br>"; ?>
	             	<?php echo $trans["boots"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][6])]."</b><br>"; ?>
			  	</p>
            </div>
          </div>
        </div>
        <div class="col s6 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
	             <p><?php echo $trans["HP"].": <b>".$_SESSION["stats"][23]."</b><br>"; ?>
	             	<?php echo $trans["atk"].": <b>".$_SESSION["stats"][24]."</b><br>"; ?>
	             	<?php echo $trans["matk"].": <b>".$_SESSION["stats"][25]."</b><br>"; ?>
	             	<?php echo $trans["catk"].": <b>".$_SESSION["stats"][9]."</b><br>"; ?>
	             	<?php echo $trans["cdmgatk"].": <b>".$_SESSION["stats"][10]."</b><br>"; ?>
	             	<?php echo $trans["cmatk"].": <b>".$_SESSION["stats"][16]."</b><br>"; ?>
	             	<?php echo $trans["cmdmgatk"].": <b>".$_SESSION["stats"][17]."</b><br>"; ?>
	             	<?php echo $trans["block"].": <b>".$_SESSION["stats"][11]."%</b><br>"; ?>
	             	<?php echo $trans["alldmgred"].": <b>".$_SESSION["stats"][22]."%</b><br>"; ?>
	             	<?php echo $trans["dmgred"].": <b>".$_SESSION["stats"][14]."%</b><br>"; ?>
	             	<?php echo $trans["mdmgred"].": <b>".$_SESSION["stats"][18]."%</b><br>"; ?>
	             	<?php echo $trans["demdmgred"].": <b>".$_SESSION["stats"][13]."%</b><br>"; ?>
	             	<?php echo $trans["cdr"].": <b>".$_SESSION["stats"][20]."%</b><br>"; ?>
	             	<?php echo $trans["hit"].": <b>".$_SESSION["stats"][15]."%</b><br>"; ?>
	             	<?php echo $trans["dodge"].": <b>".$_SESSION["stats"][21]."%</b><br>"; ?>
	             	<?php echo $trans["poison"].": <b>".$_SESSION["stats"][7]."%</b><br>"; ?>
	             	<?php echo $trans["dhit"].": <b>".$_SESSION["stats"][8]."%</b><br>"; ?>
	             	<?php echo $trans["reflect"].": <b>".$_SESSION["stats"][12]."%</b><br>"; ?>
	             	<?php echo $trans["hinc"].": <b>".$_SESSION["stats"][19]."%</b><br>"; ?>
			  	</p>
            </div>
          </div>
        </div>
	  </div>
	  <div id="inventory" class="col s12">
	  	<div class="col s12">
	        <ul class="tabs">
	          <li class="tab col s3"><a class="active" href="#character"><?php echo $trans["character"]; ?></a></li>
	          <li class="tab col s3"><a href="#chest"><?php echo $trans["chest"]; ?></a></li>
	        </ul>
      	</div>
      	<div id="character" class="col s12">Test 2</div>
	  	<div id="chest" class="col s12">Test 3</div>
	  </div>
	  <div id="skills" class="col s12">Test 3</div>
	  <div id="guild" class="col s12">Test 4</div>
	  <div id="shop" class="col s12">Test 5</div>
	</div>
	<script type="text/javascript">
		var points = '<?php echo $char["charpoints"] ?>';
		var strength = '<?php echo $stats[1] ?>';
		var vitality = '<?php echo $stats[2] ?>';
		var dexterity = '<?php echo $stats[3] ?>';
		var agility = '<?php echo $stats[4] ?>';
		var intelligence = '<?php echo $stats[5] ?>';
		var lucky = '<?php echo $stats[6] ?>';

    	$( document ).ready(function(){
    		$(".button-collapse").sideNav();
    		$(".dropdown-user").dropdown();
    		$("#savestats").hide();
    	});

    	function addStr(){
    		if(points !== 0 && points > 0){
    			strength = parseInt(strength) + 1;
    			points = points - 1;
    			$('#points').html(points);
    			$('#strength').html(strength);
    			$("#savestats").show();
    		}
    	}
    	function addVit(){
    		if(points !== 0 && points > 0){
    			vitality = parseInt(vitality) + 1;
    			points = points - 1;
    			$('#points').html(points);
    			$('#vitality').html(vitality);
    			$("#savestats").show();
    		}
    	}
    	function addDex(){
    		if(points !== 0 && points > 0){
    			dexterity = parseInt(dexterity) + 1;
    			points = points - 1;
    			$('#points').html(points);
    			$('#dexterity').html(dexterity);
    			$("#savestats").show();
    		}
    	}
    	function addAgi(){
    		if(points !== 0 && points > 0){
    			agility = parseInt(agility) + 1;
    			points = points - 1;
    			$('#points').html(points);
    			$('#agility').html(agility);
    			$("#savestats").show();
    		}
    	}
    	function addInt(){
    		if(points !== 0 && points > 0){
    			intelligence = parseInt(intelligence) + 1;
    			points = points - 1;
    			$('#points').html(points);
    			$('#intelligence').html(intelligence);
    			$("#savestats").show();
    		}
    	}
    	function addLuk(){
    		if(points !== 0 && points > 0){
    			lucky = parseInt(lucky) + 1;
    			points = points - 1;
    			$('#points').html(points);
    			$('#lucky').html(lucky);
    			$("#savestats").show();
    		}
    	}
    	function saveStats(charid){
    		$.post("libs/savestats.lib.php", { id: charid, points: points, str: strength, vit: vitality, dex: dexterity, agi: agility, inte: intelligence, luk: lucky }, function(result) {
				console.log(result);
				if(result==2){
					location.href="/Projeto/";
				}else{
					//location.href="/Projeto/";
				}
			});
    	}
    </script>
</body>
</html>