<?php
	//Index template archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$global_title; ?></title>
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
		        <li class="charname"><a><?=$char["charname"]; ?></a></li>
				<li class="charclass"><a><?=$trans["class"][$char["charclass"]]; ?></a></li>
				<li class="charlevel"><a><?=$char["charlevel"].$badge?></a></li>
				<li class="charexperience"><a><?=$char["charexperience"]." ".$trans["xp"]; ?></a></li>
				<li class="charmoney"><a><?=$char["charmoney"]." ".$trans["coins"]; ?></a></li>
		      </ul>

		      <a href="#" class="brand-logo center">Web Based Game</a>

		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

			  <ul id="user" class="dropdown-content">
		        <li class="username"><a><?=$user["username"]; ?></a></li>
				<li class="useremail"><a><?=$user["useremail"]; ?></a></li>
				<li class="usersettings"><a><i class="material-icons left">settings</i><?=$trans["settings"]; ?></a></li>
				<li class="userchangechar"><a href="changeChar"><i class="material-icons left">supervisor_account</i><?=$trans["changeChar"]; ?></a></li>
				<li class="userlogout"><a href="logout"><i class="material-icons left">power_settings_new</i><?=$trans["logout"]; ?></a></li>
			  </ul>

		      <ul id="nav-mobile" class="right hide-on-med-and-down">
				<!-- Dropdown Trigger -->
			    <li><a class="dropdown-user" href="#!" data-activates="user"><?=$user["useremail"]; ?><i class="material-icons right">arrow_drop_down</i></a></li>
		      </ul>

		      <ul class="side-nav" id="mobile-demo">
		        <li class="username"><a><?=$user["username"]; ?></a></li>
				<li class="useremail"><a><?=$user["useremail"]; ?></a></li>
				<li class="charname"><a><?=$char["charname"]; ?></a></li>
				<li class="charclass"><a><?=$trans["class"][$char["charclass"]]; ?></a></li>
				<li class="charlevel"><a><?=$char["charlevel"]; ?></a></li>
				<li class="charexperience"><a><?=$char["charexperience"]." ".$trans["xp"]; ?></a></li>
				<li class="charmoney"><a><?=$char["charmoney"]." ".$trans["coins"]; ?></a></li>
		      </ul>

		    </div>
	  	</nav>
  	</div>

    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3"><a class="active" href="#stats"><?=$trans["stats"]; ?></a></li>
          <li class="tab col s3"><a href="#inventory"><?=$trans["inventory"]; ?></a></li>
          <li class="tab col s3"><a href="#skills"><?=$trans["skills"]; ?></a></li>
          <li class="tab col s3 disabled"><a href="#guild"><?=$trans["guild"]; ?></a></li>
          <li class="tab col s3"><a href="#shop"><?=$trans["shop"]; ?></a></li>
        </ul>
      </div>

	  <div id="stats" class="col s12">
	 	<div class="col s6 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
	             <p><?=$trans["level"].": <b>".$char["charlevel"]."</b><br>"; ?><?=$levelup?>
			  		<?=$trans["xp"].": <b>".$char["charexperience"]."</b>"; ?>
			  		<div class="progress" style="width: 50%">
				      <div class="determinate" style="width: <?=$charClass->getExp($_SESSION["char"]); ?>%"></div>
				  	</div>
                    <?=$classchange?>
			  	</p>
            </div>
          </div>
        </div>
        <div class="col s6 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
	             <p><?=$trans["points"]; ?> <b id="points"><?=$char["charpoints"] ?></b><br>
			  		<?=$trans["statsName"]["strength"]; ?>: <b id="strength"><?=$stats[1]; ?></b><a href="#" class="material-icons" onclick="addStr()" id="addStats1">add</a><a href="#" class="material-icons red-text" onclick="addStrTen()" id="addStats2">add</a><br>
			  		<?=$trans["statsName"]["vitality"]; ?>: <b id="vitality"><?=$stats[2]; ?></b><a href="#" class="material-icons" onclick="addVit()" id="addStats3">add</a><a href="#" class="material-icons red-text" onclick="addVitTen()" id="addStats4">add</a><br>
			  		<?=$trans["statsName"]["dexterity"]; ?>: <b id="dexterity"><?=$stats[3]; ?></b><a href="#" class="material-icons" onclick="addDex()" id="addStats5">add</a><a href="#" class="material-icons red-text" onclick="addDexTen()" id="addStats6">add</a><br>
			  		<?=$trans["statsName"]["agility"]; ?>: <b id="agility"><?=$stats[4]; ?></b><a href="#" class="material-icons" onclick="addAgi()" id="addStats7">add</a><a href="#" class="material-icons red-text" onclick="addAgiTen()" id="addStats8">add</a><br>
			  		<?=$trans["statsName"]["intelligence"]; ?>: <b id="intelligence"><?=$stats[5]; ?></b><a href="#" class="material-icons" onclick="addInt()" id="addStats9">add</a><a href="#" class="material-icons red-text" onclick="addIntTen()" id="addStats10">add</a><br>
			  		<?=$trans["statsName"]["lucky"]; ?>: <b id="lucky"><?=$stats[6]; ?></b><a href="#" class="material-icons" onclick="addLuk()" id="addStats11">add</a><a href="#" class="material-icons red-text" onclick="addLukTen()" id="addStats12">add</a><br>
			  	</p>
            </div>
            <div class="white-text card-action" id="savestats">
			  	<a class="waves-effect waves-light btn" onclick="saveStats('<?=$char["charid"]; ?>')"><i class="material-icons left">send</i><?=$trans["save"]; ?></a>
			</div>
          </div>
        </div>
        <div class="col s6 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
	             <p><?=$trans["lefthand"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][1])]." +".$_SESSION["itensFort"][0]."</b><br>"; ?>
	             	<?=$trans["righthand"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][2])]." +".$_SESSION["itensFort"][1]."</b><br>"; ?>
	             	<?=$trans["helmet"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][3])]." +".$_SESSION["itensFort"][2]."</b><br>"; ?>
	             	<?=$trans["chestplate"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][4])]." +".$_SESSION["itensFort"][3]."</b><br>"; ?>
	             	<?=$trans["legs"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][5])]." +".$_SESSION["itensFort"][4]."</b><br>"; ?>
	             	<?=$trans["boots"].": <b>".$trans["itens"][$charClass->getItemName($_SESSION["itens"][6])]." +".$_SESSION["itensFort"][5]."</b><br>"; ?>
			  	</p>
            </div>
          </div>
        </div>
        <div class="col s6 m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
	             <p><?=$trans["HP"].": <b>".$_SESSION["stats"][23]."</b><br>"; ?>
	             	<?=$trans["atk"].": <b>".$_SESSION["stats"][24]."</b><br>"; ?>
	             	<?=$trans["matk"].": <b>".$_SESSION["stats"][25]."</b><br>"; ?>
	             	<?=$trans["catk"].": <b>".$_SESSION["stats"][9]."%</b><br>"; ?>
	             	<?=$trans["cdmgatk"].": <b>".$_SESSION["stats"][10]."%</b><br>"; ?>
	             	<?=$trans["cmatk"].": <b>".$_SESSION["stats"][16]."%</b><br>"; ?>
	             	<?=$trans["cmdmgatk"].": <b>".$_SESSION["stats"][17]."%</b><br>"; ?>
	             	<?=$trans["block"].": <b>".$_SESSION["stats"][11]."%</b><br>"; ?>
	             	<?=$trans["alldmgred"].": <b>".$_SESSION["stats"][22]."%</b><br>"; ?>
	             	<?=$trans["dmgred"].": <b>".$_SESSION["stats"][14]."%</b><br>"; ?>
	             	<?=$trans["mdmgred"].": <b>".$_SESSION["stats"][18]."%</b><br>"; ?>
	             	<?=$trans["demdmgred"].": <b>".$_SESSION["stats"][13]."%</b><br>"; ?>
	             	<?=$trans["cdr"].": <b>".$_SESSION["stats"][20]."%</b><br>"; ?>
	             	<?=$trans["hit"].": <b>".$_SESSION["stats"][15]."%</b><br>"; ?>
	             	<?=$trans["dodge"].": <b>".$_SESSION["stats"][21]."%</b><br>"; ?>
	             	<?=$trans["poison"].": <b>".$_SESSION["stats"][7]."%</b><br>"; ?>
	             	<?=$trans["dhit"].": <b>".$_SESSION["stats"][8]."%</b><br>"; ?>
	             	<?=$trans["reflect"].": <b>".$_SESSION["stats"][12]."%</b><br>"; ?>
	             	<?=$trans["hinc"].": <b>".$_SESSION["stats"][19]."%</b><br>"; ?>
			  	</p>
            </div>
          </div>
        </div>
	  </div>
	  <div id="inventory" class="col s12">
	  	<div class="col s12">
	        <ul class="tabs">
	          <li class="tab col s3"><a class="active" href="#character"><?=$trans["character"]; ?></a></li>
	          <li class="tab col s3"><a href="#chest"><?=$trans["chest"]; ?></a></li>
	        </ul>
      	</div>
      	<div id="character" class="col s12 center-align">
      		<br>
			<?php
				$count = count($bank) - 1;
				for($i=0;$i<=$count;$i++){
			?>
				<div class="col s3">
					<a class='dropdown-button btn' href='#' data-activates='dropdown<?=$i?>'><?=$trans["itens"][$charClass->getItemName($bank[$i][1])]?> +<?=$bank[$i][5]?></a>
					<ul id='dropdown<?=$i; ?>' class='dropdown-content'>
						<li><a><?=$trans["itens"][$charClass->getItemStats($bank[$i][1])[1]]?> +<?=$bank[$i][5]?></a></li>
						<li><a><?=$trans["type"][$charClass->getItemStats($bank[$i][1])[5]]; ?></a></li>
						<li><a><?=$trans["class"][$charClass->getItemStats($bank[$i][1])[2]]; ?></a></li>
						<li><a><?=$charClass->getItemStats($bank[$i][1])[3]; ?></a></li>
						<li class="divider"></li>
						<li><a href="#!" onclick="moreInfo(<?=$bank[$i][2]?>);"><?=$trans["moreinfo"]; ?></a></li>
					</ul>
				</div>
			<?php
					if(is_int($i/3) && $i != 0){
						echo "<br><br><br>";
					}
				}
			?>
    	</div>
	  	<div id="chest" class="col s12">Test 3</div>
	  </div>
	  <div id="skills" class="col s12">Test 3</div>
	  <div id="guild" class="col s12">Test 4</div>
	  <div id="shop" class="col s12">Test 5</div>
	</div>
	<div id="modal1" class="modal">
  	</div>
	<script type="text/javascript">
		var points = '<?=$char["charpoints"] ?>';
		var strength = '<?=$stats[1] ?>';
		var vitality = '<?=$stats[2] ?>';
		var dexterity = '<?=$stats[3] ?>';
		var agility = '<?=$stats[4] ?>';
		var intelligence = '<?=$stats[5] ?>';
		var lucky = '<?=$stats[6] ?>';

    	$( document ).ready(function(){
    		$('.modal-trigger').leanModal();
    		$(".button-collapse").sideNav();
    		$(".dropdown-user").dropdown();
    		$("#savestats").hide();
            if(points == 0){
                $("#addStats1").hide();
                $("#addStats2").hide();
                $("#addStats3").hide();
                $("#addStats4").hide();
                $("#addStats5").hide();
                $("#addStats6").hide();
                $("#addStats7").hide();
                $("#addStats8").hide();
                $("#addStats9").hide();
                $("#addStats10").hide();
                $("#addStats11").hide();
                $("#addStats12").hide();
            }
    	});

    	function moreInfo(id){
    		$.post("libs/getitemstats.lib.php", { id: id}, function(result) {
				console.log(result);
				$("#modal1").html(result);
				$('#modal1').openModal();
			});
    	}

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
        function addStrTen(){
    		if(points !== 0 && points >= 10){
    			strength = parseInt(strength) + 10;
    			points = points - 10;
    			$('#points').html(points);
    			$('#strength').html(strength);
    			$("#savestats").show();
    		}
    	}
    	function addVitTen(){
    		if(points !== 0 && points >= 10){
    			vitality = parseInt(vitality) + 10;
    			points = points - 10;
    			$('#points').html(points);
    			$('#vitality').html(vitality);
    			$("#savestats").show();
    		}
    	}
    	function addDexTen(){
    		if(points !== 0 && points >= 10){
    			dexterity = parseInt(dexterity) + 10;
    			points = points - 10;
    			$('#points').html(points);
    			$('#dexterity').html(dexterity);
    			$("#savestats").show();
    		}
    	}
    	function addAgiTen(){
    		if(points !== 0 && points >= 10){
    			agility = parseInt(agility) + 10;
    			points = points - 10;
    			$('#points').html(points);
    			$('#agility').html(agility);
    			$("#savestats").show();
    		}
    	}
    	function addIntTen(){
    		if(points !== 0 && points >= 10){
    			intelligence = parseInt(intelligence) + 10;
    			points = points - 10;
    			$('#points').html(points);
    			$('#intelligence').html(intelligence);
    			$("#savestats").show();
    		}
    	}
    	function addLukTen(){
    		if(points !== 0 && points >= 10){
    			lucky = parseInt(lucky) + 10;
    			points = points - 10;
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
