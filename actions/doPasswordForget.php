<?php
		function randPassword() {
		$n = "0123456789";
		$a = "abcdefghijklmnopqrstuvwxyz";
		$randpassword= "";
		for($i=0; $i < 3; $i++) {
			$randpassword .= $n[rand(0, strlen($n) - 1)];
			$randpassword .= $a[rand(0, strlen($a) - 1)];
			$randpassword .= strtoupper($a);
			}
			return $randpassword;
			}
	$username = $_POST['username'];
	$mail; 
	$subject = "wachtwoord vergeten.";
	$message = "";
	$from = "PW7@PW7.nl";
	$user;
	$userid = null;
	$userid = $database->userlogin($username);
	$_SESSION['nameerror'] = null;
	if($userid != null) {
	// verkrijg gebruikers gegevens
	$userid = $database->userlogin($username);
		$user = $database->getUserById($userid);
		$mail = $user->email;
		$randPassword = randPassword();
		$user->wachtwoord = md5($randPassword);
		$message = "wachtwoord is ". $randPassword;
	mail($mail, $subject,$message,"From: $from\n");
		$user->write(false);
	header('Location: ../../PW7/login/');
	}
	else
	{
		
		$_SESSION['nameerror'] = "onbkekende gebruikersnaam";
		header('Location: ../../PW7/wachtwoordvergeten/');
	}
?>