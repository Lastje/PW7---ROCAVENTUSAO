<?php

	//include config
	include'../PW7/config/config.php';

	//start of html

	//redirect
	if($globalPath == '/PW7/'){
		include'../PW7/templates/inloggen.php';
	} elseif ($globalPath == '/PW7/inloggen/') {
		include'../PW7/actions/doLogin.php';
	} elseif ($globalPath == '/PW7/wachtwoordvergeten/') {
		include'../PW7/actions/passwordForgot.php';
	} elseif ($globalPath == '/PW7/registreren/') {
		include'../PW7/actions/registratie.php';
	} else {
		include'../PW7/templates/inloggen.php';
	}

	//end of html
?>