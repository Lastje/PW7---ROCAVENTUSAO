<?php

	//include config
	include'../PW7/config/config.php';

	//start of html

	//redirect
	if($globalPath == '/PW7/'){
		include'../PW7/templates/inloggen.php';
	} elseif ($globalPath == '/PW7/inloggen/') {
		include'../PW7/actions/doLogin.php';
	} else {
		include'../PW7/templates/inloggen.php';
	}

	//end of html
?>