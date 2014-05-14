<?php

	echo "dologin";

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(isset($_POST['username']) && isset($_POST['password'])) {
		//echo $database->userlogin($username);
		
	}
	else
	{
		//header('Location: ../PW7/');
		exit;
	}
?>