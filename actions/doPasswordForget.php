<?php
		function randPassword() {
		$n = "0123456789";
		$a = "abcdefghijklmnopqrstuvwxyz";
		$randpassword= "";
		for($i=0; $i < 3; $i++) {
			$randpassword .= $n[rand(0, strlen($n) - 1)];
			$randpassword .= $a[rand(0, strlen($a) - 1)];
			$randpassword .= strtoupper($a[rand(0, strlen($a) - 1)]);
			}
			return $randpassword;
			}
	$username = $_POST['username'];
	$mail = $email;
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
	$headers .= 'From: Webmaster PW7 <webmaster@pw7.com>' . '\r\n';
	$subject = "Activeringscode voor PW7";
	$message = "Geachte heer/mevrouw, <br /><br />";
	$message .= "Hierbij uw tijdelijke wachtwoord voor projectwijzer 7. <br />";
	

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

		$message .= "het tijdelijke wachtwoord is ". $randPassword . "<br /> <br />";
		$message .= "Met vriendelijke groet, <br /> <br />";
		$message .= "Webmaster van Projectwijzer 7";


	mail($mail, $subject, $message, $headers);
		$user->write(false);
	header('Location: ../../PW7/login/');
	}
	else
	{
		
		$_SESSION['nameerror'] = "onbkekende gebruikersnaam";
		header('Location: ../../PW7/wachtwoordvergeten/');
	}
?>