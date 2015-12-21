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
				    <li><a class="dropdown-language" href="#!" data-activates="language"><i class="material-icons left">translate</i><?php echo $trans["language"]; ?><i class="material-icons right">arrow_drop_down</i></a></li>
			    </ul>

			    <ul id="language" class="dropdown-content">
			        <li class="username"><a href="#" onclick="selLang('br')"><span class="flag-icon flag-icon-br"></span> Brazil</a></li>
			        <li class="username"><a href="#" onclick="selLang('en')"><span class="flag-icon flag-icon-um"></span> United States</a></li>
				 </ul>
		    </div>
	  	</nav>
  	</div>

     <div class="row">
     	<ul id="login">
     		<li>
			    <form class="col s12" method="post" id="formlogin">
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
			          <input id="user" type="text" class="validate" name="username">
			          <label for="email"><?php echo $trans["username"]; ?></label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">lock</i>
			          <input id="password" type="password" class="validate" name="password">
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
					  <a href="#register" class="btn" onclick="$('#register').show();$('#login').hide();"><?php echo $trans["register"]; ?></a>
					</div>
				  </div>
			    </form>
		    </li>
	    </ul>

	    <ul id="register">
	     	<li style="opacity: 100">
		     	<form class="col s12" method="post" id="formregister">
		     		<div class="row" id="progressreg">
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
				      
			          <i class="material-icons prefix">email</i>
			          <input id="email" type="email" class="validate" name="email">
			          <label for="email"><?php echo $trans["email"]; ?></label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">perm_identity</i>
			          <input id="username" type="text" class="validate" name="username">
			          <label for="username" data-error="wrong"><?php echo $trans["username"]; ?></label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">lock</i>
			          <input id="passwordreg" type="password" class="validate" name="password">
			          <label for="passwordreg"><?php echo $trans["password"]; ?></label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">lock</i>
			          <input id="passwordrepeat" type="password" class="validate" name="passwordrepeat">
			          <label for="passwordrepeat"><?php echo $trans["password_repeat"]; ?></label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">query_builder</i>
			          <input id="birthday" type="date" class="datepicker" name="birthday">
			          <label for="birthday"><?php echo $trans["birthday"]; ?></label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <select name="secQuest" id="secQuest">
					      <option value="" disabled selected><?php echo $trans["secQuest"]; ?></option>
					      <option value="1"><?php echo $trans["secQuest1"]; ?></option>
					      <option value="2"><?php echo $trans["secQuest2"]; ?></option>
					      <option value="3"><?php echo $trans["secQuest3"]; ?></option>
					      <option value="4"><?php echo $trans["secQuest4"]; ?></option>
					    </select>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">question_answer</i>
			          <input id="secAns" type="text" class="validate" name="secAns">
			          <label for="secAns"><?php echo $trans["secAns"]; ?></label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			      	<div class="input-field col s6">
				      <button class="btn waves-effect waves-light" type="submit" name="action"><?php echo $trans["submit_register"]; ?>
					    <i class="material-icons right">send</i>
					  </button>
					  <a href="#login" class="btn" onclick="$('#login').show();$('#register').hide();cleanDates();"><?php echo $trans["back"]; ?></a>
					</div>
				  </div>
			    </form>
	    	</li>
	    </ul>
	  </div>

	<script type="text/javascript">
		function selLang(language) {
    	  var url = location.hash;
		  var page = url.split('#')[1];	
		  location.href="index.php?lang="+language+"#"+page;
		}
		function cleanDates(){
			$("#email").val("");
			$("#username").val("");
			$("#passwordreg").val("");
			$("#passwordrepeat").val("");
			$("#birthday").val("");
			$("#secQuest").val("");
			$("#secAns").val("");
		}
    	$( document ).ready(function(){
    		$('#register').hide();
    		$('select').material_select();
    		$("#progress").hide();
    		$("#progressreg").hide();
    		$(".button-collapse").sideNav();
    		$(".dropdown-language").dropdown();

    		var url = location.hash;
			var page = url.split('#')[1];

			if(page == "register"){
				$('#register').show();
				$('#login').hide();
			}

    		$("#formlogin").submit(function(){
    			$("#progress").show();
    			var login = $("#user").val();
    			var password = $("#password").val();
    			$.post("libs/login.lib.php", { login: login, pass: password }, function(result) {
    				if(result==2){
    						location.href="/Projeto/";
    						$("#progress").hide();
    					}else{
    						Materialize.toast('<?php echo $trans["login_error"]; ?>', 4000);
    						$("#progress").hide();
    					}
    			});
    			return false;
    		});

    		$("#formregister").submit(function(){
    			$("#progressreg").show();
    			var email = $("#email").val();
    			var login = $("#username").val();
    			var password = $("#passwordreg").val();
    			//var passwordrepeat = $("#passwordrepeat").val();
    			var birthday = $("#birthday").val();
    			var secQuest = $("#secQuest").val();
    			var secAns = $("#secAns").val();
    			if(email === "" && login === "" && password === "" && birthday === "" && secQuest === "" && secAns === ""){
	    			$("#progressreg").hide();
					Materialize.toast('<?php echo $trans["register_error_blank"]; ?>', 4000);
	    		}else{
					if($("#passwordreg").val() == $("#passwordrepeat").val()){
		    			$.post("libs/register.lib.php", { email: email, login: login, password: password, birthday: birthday, secQuest: secQuest, secAns: secAns }, function(result) {
		    				console.log(result);
		    				if(result==1){
		    						$('#login').show();
									$('#register').hide();
									Materialize.toast('<?php echo $trans["register_success"]; ?>', 4000);
									$("#email").val("");
									$("#username").val("");
									$("#passwordreg").val("");
									$("#passwordrepeat").val("");
									$("#birthday").val("");
									$("#secQuest").val("");
									$("#secAns").val("");
		    						$("#progressreg").hide();
		    					}else{
		    						Materialize.toast('<?php echo $trans["register_error"]; ?>', 4000);
		    						$("#progressreg").hide();
		    					}
		    			});
	    			}else{
	    				$("#progressreg").hide();
						Materialize.toast('<?php echo $trans["register_error_password"]; ?>', 4000);
	    			}
	    		}
    			return false;
    		});
    	});
    	$('.datepicker').pickadate({
		  selectMonths: true, // Creates a dropdown to control month
		  selectYears: 100 // Creates a dropdown of 15 years to control year
		});
    </script>
</body>
</html>