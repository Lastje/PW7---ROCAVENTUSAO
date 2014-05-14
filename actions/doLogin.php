<?php
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//reguliere expressie in stukken
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	
	if(isset($_POST['username']) && isset($_POST['password'])) {
		
		echo $username;
		echo $password."<br>";
		echo md5($password)."<br>";
		echo $database->userlogin($username);
		if(!$uppercase || !$lowercase || !$number || strlen($password) < 8 || strlen($password) > 12) {
		// geef error voor verkeerde invoer
		}
		else
		{
			
		}
		
		


		
		//header('Location: ../PW7/');
		exit;
	}
	
?>