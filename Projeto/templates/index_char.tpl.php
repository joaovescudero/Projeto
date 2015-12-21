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
		      <a href="#" class="brand-logo center">Web Based Game</a>

		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

			  <ul id="user" class="dropdown-content">
		        <li class="username"><a><?php echo $user["username"]; ?></a></li>
				<li class="useremail"><a><?php echo $user["useremail"]; ?></a></li>
				<li class="userlogout"><a><i class="material-icons left">settings</i><?php echo $trans["settings"]; ?></a></li>
				<li class="userlogout"><a href="logout"><i class="material-icons left">power_settings_new</i><?php echo $trans["logout"]; ?></a></li>
			  </ul>

		      <ul id="nav-mobile" class="right hide-on-med-and-down">
				<!-- Dropdown Trigger -->
			    <li><a class="dropdown-user" href="#!" data-activates="user"><?php echo $user["useremail"]; ?><i class="material-icons right">arrow_drop_down</i></a></li>
		      </ul>

		      <ul class="side-nav" id="mobile-demo">
		        <li class="username"><a><?php echo $user["username"]; ?></a></li>
				<li class="useremail"><a><?php echo $user["useremail"]; ?></a></li>
				<li class="userlogout"><a><i class="material-icons left">settings</i><?php echo $trans["settings"]; ?></a></li>
				<li class="userlogout"><a href="logout"><i class="material-icons left">power_settings_new</i><?php echo $trans["logout"]; ?></a></li>
		      </ul>

		    </div>
	  	</nav>
  	</div>
  		<div class="row">
	  		<ul id="chars">
			  <div class="col s12 m6 l3 center-align"><p><?php if(!$main->getChar("0")):?><a href="#" onclick="Create()"><i class="large material-icons">add</i><br><h5><?php echo $trans["add_char"]; ?></h5></a><?php else:
			  	echo '<h4>'.$main->getChar("0")[1].'</h4><h5>'.$trans["class"][$main->getChar("0")[2]].'<br>'.$trans["level"].': '.$main->getChar("0")[3].'<br>'.$main->getChar("0")[7].' '.$trans["coins"].'</h5><a class="waves-effect waves-light btn" href="sel-char/'.$main->getChar("0")[0].'"><i class="material-icons left">play_arrow</i>select</a>'; endif; ?></p></div>
			  <div class="col s12 m6 l3 center-align"><p><?php if(!$main->getChar("1")):?><a href="#" onclick="Create()"><i class="large material-icons">add</i><br><h5><?php echo $trans["add_char"]; ?></h5></a><?php else:
			  	echo '<h4>'.$main->getChar("1")[1].'</h4><h5>'.$trans["class"][$main->getChar("1")[2]].'<br>'.$trans["level"].': '.$main->getChar("1")[3].'<br>'.$main->getChar("1")[7].' '.$trans["coins"].'</h5><a class="waves-effect waves-light btn" href="sel-char/'.$main->getChar("1")[0].'"><i class="material-icons left">play_arrow</i>select</a>'
			   ?><?php endif; ?></p></div>
			  <div class="col s12 m6 l3 center-align"><p><?php if(!$main->getChar("2")):?><a href="#" onclick="Create()"><i class="large material-icons">add</i><br><h5><?php echo $trans["add_char"]; ?></h5></a><?php else:
			  	echo '<h4>'.$main->getChar("2")[1].'</h4><h5>'.$trans["class"][$main->getChar("2")[2]].'<br>'.$trans["level"].': '.$main->getChar("2")[3].'<br>'.$main->getChar("2")[7].' '.$trans["coins"].'</h5><a class="waves-effect waves-light btn" href="sel-char/'.$main->getChar("2")[0].'"><i class="material-icons left">play_arrow</i>select</a>'
			   ?><?php endif; ?></p></div>
			  <div class="col s12 m6 l3 center-align"><p><?php if(!$main->getChar("3")):?><a href="#" onclick="Create()"><i class="large material-icons">add</i><br><h5><?php echo $trans["add_char"]; ?></h5></a><?php else:
			  	echo '<h4>'.$main->getChar("3")[1].'</h4><h5>'.$trans["class"][$main->getChar("3")[2]].'<br>'.$trans["level"].': '.$main->getChar("3")[3].'<br>'.$main->getChar("3")[7].' '.$trans["coins"].'</h5><a class="waves-effect waves-light btn" href="sel-char/'.$main->getChar("3")[0].'"><i class="material-icons left">play_arrow</i>select</a>'
			   ?><?php endif; ?></p></div>
			</ul>

			<ul id="createchar">
	     		<li>
				    <form class="col s12" method="post" id="formcreate">
				      <div class="row" id="progress">
				      	<div class="input-field col s3">
				        </div>
				        <div class="input-field col s6">
					      <div class="progress">
						    <div class="indeterminate"></div>
						  </div>
				        </div>
				      </div>

				      <div class="row">
				      	<div class="input-field col s3">
				        </div>
				        <div class="input-field col s6">
					      
				          <i class="material-icons prefix">perm_identity</i>
				          <input id="name" type="text" class="validate" name="name">
				          <label for="name"><?php echo $trans["name"]; ?></label>
				        </div>
				      </div>
				      <div class="row">
				      	<div class="input-field col s3">
				        </div>
				        <div class="input-field col s6">
				          <select name="charclass" id="charclass">
						      <option value="" disabled selected><?php echo $trans["chooseClass"]; ?></option>
						      <option value="warrior"><?php echo $trans["class"]["warrior"]; ?></option>
						      <option value="mage"><?php echo $trans["class"]["mage"]; ?></option>
						      <option value="acolyte"><?php echo $trans["class"]["acolyte"]; ?></option>
						      <option value="thief"><?php echo $trans["class"]["thief"]; ?></option>
					      </select>
				        </div>
				      </div>
				      <div class="row">
				      	<div class="input-field col s3">
				        </div>
				      	<div class="input-field col s6">
					      <button class="btn waves-effect waves-light" type="submit" name="action"><?php echo $trans["create_char"]; ?>
						    <i class="material-icons right">send</i>
						  </button>
						  <a href="#" class="btn" onclick="$('#chars').show();$('#createchar').hide();"><?php echo $trans["back"]; ?></a>
						</div>
					  </div>
				    </form>
			    </li>
		    </ul>
		</div>
    </div>
	<script type="text/javascript">
    	$( document ).ready(function(){
    		$('#createchar').hide();
    		$(".button-collapse").sideNav();
    		$(".dropdown-user").dropdown();
    		$('select').material_select();
    		$("#progress").hide();

    		$("#formcreate").submit(function(){
    			$("#progress").show();
    			var name = $("#name").val();
    			var charclass = $("#charclass").val();
    			if(name === ""){
    				Materialize.toast('<?php echo $trans["create_error_name"]; ?>', 4000);
    				$("#progress").hide();
    			}else if(charclass == null){
					Materialize.toast('<?php echo $trans["create_error_class"]; ?>', 4000);
    				$("#progress").hide();
    			}else{
	    			$.post("libs/createchar.lib.php", { name: name, charclass: charclass }, function(result) {
	    				console.log(result);
    					if(result==2){
    						location.href="/Projeto/";
    						$("#progress").hide();
    					}else if(result == 3){
    						location.href="/Projeto/";
    					}else{
    						Materialize.toast('<?php echo $trans["create_error"]; ?>', 4000);
    						$("#progress").hide();
    					}
	    			});
    			}
    			return false;
    		});
    	});

    	function Create(){
    		$('#chars').hide();
    		$('#createchar').show();
    	}
    </script>
</body>
</html>