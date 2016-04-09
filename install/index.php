<?php
	//Install archive
	//Created by: Joao Escudero <joaovescudero@gmail.com>
	//Git: http://github.com/joaovescudero/Projeto
?>
<!DOCTYPE html>
<html>
<head>
	<title>Installation</title>
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link href="../assets/docs.css" rel="stylesheet">
    <link href="../css/flag-icon.css" rel="stylesheet">

    <meta charset="utf-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>

    <div class="navbar-fixed">
	    <nav>
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo center">Web Based Game</a>
		    </div>
	  	</nav>
  	</div>

     <div class="row">
	    <ul id="install">
	     	<li style="opacity: 100">
		     	<form class="col s12" method="post" id="forminstall">
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
				      
			          <i class="material-icons prefix">info_outline</i>
			          <input id="gname" type="text" class="validate" name="gname">
			          <label for="gname">Game name</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">info_outline</i>
			          <input id="gdesc" type="text" class="validate" name="gdesc">
			          <label for="gdesc">Game description</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">info_outline</i>
			          <input id="gtitle" type="text" class="validate" name="gtitle">
			          <label for="gtitle">Pages title</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">settings_ethernet</i>
			          <input id="mhost" type="text" class="validate" name="mhost">
			          <label for="mhost">MySql Host</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">perm_identity</i>
			          <input id="muser" type="text" class="validate" name="muser">
			          <label for="muser">MySql User</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">lock</i>
			          <input id="mpass" type="password" class="validate" name="mpass">
			          <label for="mpass">MySql Password</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">description</i>
			          <input id="mdb" type="text" class="validate" name="mdb">
			          <label for="mdb">MySql Database name</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			        <div class="input-field col s6">
			          <i class="material-icons prefix">info_outline</i>
			          <input id="msuffix" type="text" class="validate" name="msuffix">
			          <label for="msuffix">MySql Suffix</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col s3">
			        </div>
			      	<div class="input-field col s6 align-center">
				      <button class="btn waves-effect waves-light" type="submit" name="action">Install
					    <i class="material-icons right">send</i>
					  </button>
					</div>
				  </div>
			    </form>
	    	</li>
	    </ul>
	  </div>

	<script type="text/javascript">
    	$( document ).ready(function(){
    		$('select').material_select();
    		$("#progress").hide();
    		$(".button-collapse").sideNav();
    		$(".dropdown-language").dropdown();

    		$("#forminstall").submit(function(){
    			$("#progressreg").show();
    			var gname = $("#gname").val();
    			var gdesc = $("#gdesc").val();
    			var gtitle = $("#gtitle").val();
    			var mhost = $("#mhost").val();
    			var muser = $("#muser").val();
    			var mpass = $("#mpass").val();
    			var mdb = $("#mdb").val();
    			var msuffix = $("#msuffix").val();
    			if(gname === "" || gdesc === "" || gtitle === "" || mhost === "" || muser === ""|| mpass === "" || mdb === "" || msuffix === ""){
	    			$("#progressreg").hide();
					Materialize.toast('Please fill all fields!', 4000);
					return false;
	    		}else{
	    			$.post("install.php", { gname: gname, gdesc: gdesc, gtitle: gtitle, mhost: mhost, muser: muser, mpass: mpass, mdb: mdb, msuffix: msuffix }, function(result) {
	    				console.log(result);
	    				if(result==1){
								Materialize.toast('Successfully installed, please follow the others instructions!', 4000);
	    						$("#progress").hide();
	    					}else{
	    						Materialize.toast('Something went wrong!', 4000);
	    						$("#progress").hide();
	    					}
	    			});
	    		}
    			return false;
    		});
    	});
    </script>
</body>
</html>