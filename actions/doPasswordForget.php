<?php
	$username = $_POST['username'];
	$mail; 
	$subject = "wachtwoord vergeten.";
	$message = "";
	$from = "PW7@PW7.nl";
	$user;
	
	// verkrijg gebruikers gegevens
	$userid = $database->userlogin($username);
		$user = $database->getUserById($userid);
		$mail = $user->email;
		$randPassword = $database->randPassword();
		$user->wachtwoord = md5($randPassword);
		$database->saveUser($user, $new=false)
		$message = "wachtwoord is". $randPassword;
	mail($mail, $subject,$message,"From: $from\n");
	
	header('Location: ../../PW7/login/');
?>