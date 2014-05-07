<?php

	//include config
	include'../PW7/config/config.php';
	//include header
	include'../PW7/templates/header.php'; 
	//start of html

	//redirect
	if($globalPath == '/PW7/'){
		include'../PW7/templates/inloggen.php';
	} elseif ($globalPath == '/PW7/inloggen/') {
		include'../PW7/actions/doLogin.php';
	} elseif ($globalPath == '/PW7/wachtwoordvergeten/') {
		include'../PW7/templates/passwordForgot.php';
	} elseif ($globalPath == '/PW7/registreren/') {
		include'../PW7/templates/registratie.php';
	} else {
		include'../PW7/templates/inloggen.php';
	}
	//include footer
	include'../PW7/templates/footer.php'; 
	//end of html
?>