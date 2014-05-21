<?php
	$username = $_POST['username'];
	$mail; 
	$subject = "wachtwoord vergeten.";
	$message = "password =". $database->randPassword();
	$from = "PW7@PW7.nl";
	
	// verkrijg gebruikers gegevens
	$userid = $database->userlogin($username);
		$user;
		$user = $database->getUserById($userid);
		$mail = $user->email;
	
	mail($mail, $subject,$message,"From: $from\n");
?>