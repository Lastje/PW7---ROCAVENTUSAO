<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//reguliere expressie in stukken
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	
	if(isset($_POST['username']) && isset($_POST['password'])) {

		if(!$uppercase || !$lowercase || !$number || strlen($password) < 8 || strlen($password) > 12) {
		// geef error voor verkeerde invoer
		$_SESSION['error'] = "Uw ingevoerde wachtwoord voldoet niet aan de gestelde eisen";
		header('Location: ../../PW7/login/');
		
		}
		else
		{
			$userid = $database->userlogin($username);
			$user;
			$user = $database->getUserById($userid);
			$userdbpass = $user->wachtwoord;
			
			if($userdbpass == md5($password)){

			$_SESSION['user'] = $user;
			
			//doorsturen naar main page
			header('Location: ../../PW7/main/');
			}
			else {
			// terugsturen naar inloggen voor verkeerd wachtwoord
			header('Location: ../../PW7/login/');
			$_SESSION['error'] = "verkeerd wachtwoord";
			}
			
		}
		
		
	}
	else
	{
	header('Location: ../../PW7/login/');
	exit;
	
	}
	
?>