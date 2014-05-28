<?php
	session_start();
	
	//include config
	include'../PW7/config/config.php';
	
	//start of html
	include_once'../PW7/templates/header.php';

	//redirect
	if($globalPath == '/PW7/'){
		include'../PW7/templates/main.php';
	} elseif ($globalPath == '/PW7/inloggen/') {
		include'../PW7/actions/doLogin.php';
	} elseif ($globalPath == '/PW7/wachtwoordvergeten/') {
		include'../PW7/templates/passwordForgot.php';
	} elseif ($globalPath == '/PW7/registreren/') {
		include'../PW7/templates/registratie.php';
	} elseif ($globalPath == '/PW7/main/') {
		include'../PW7/templates/main.php';
	} elseif ($globalPath == '/PW7/registreren_action/') {
		include'../PW7/actions/doRegistratie.php';
	} elseif ($globalPath == '/PW7/DopasswordForgot/') {
		include'../PW7/actions/doPasswordForget.php';
	} elseif ($globalPath == '/PW7/login/') {
		include'../PW7/templates/inloggen.php';
	} elseif ($globalPath == '/PW7/logout/'){
		include'../PW7/actions/doLogout.php';
	} else {
		include'../PW7/templates/main.php';
	} 
	//include footer
	include'../PW7/templates/footer.php'; 
	//end of html

?>