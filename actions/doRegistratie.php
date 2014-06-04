<?php
//rand number
function randCode() {
		$n = "0123456789";
		$randCode= NULL;
		for($i=0; $i < 9; $i++) {
			$randCode .= $n[rand(0, strlen($n) - 1)];
			}
			return $randCode;
		}
	
// get data van registratie input
	 $firstname = $_POST['firstname'];
	 $insertion = $_POST['Tussenvoegsel'];
	 $lastname = $_POST['Achternaam'];
	 $street = $_POST['Adres'];
	 $number = $_POST['huisnummer'];
	 $pc = $_POST['Postcode'];
	 $city = $_POST['Plaats'];
	 $username = $_POST['Gebruikersnaam'];
	 $email = $_POST['E-mail'];
	 $password = $_POST['pwd'];
	 $passwordrepeat = $_POST['pwd2'];
	 
	 //reguliere expressie in stukken
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);

	//check of gebruikersnaam al bestaat
$userid = null;
$userid = $database->userlogin($username);
// check wachtwoord
 if($password != $passwordrepeat) {
	$_SESSION['pwd2error'] = "de wachtwoorden komen niet overeen";
	echo "wachtwoord komt niet overeen";
	exit;
	//header('Location: ../../PW7/registreren/');

 }
elseif(!$uppercase || !$lowercase || !$number || strlen($password) < 8 || strlen($password) > 12) {
	$_SESSION['pwderror'] = "wacthwoord voldoet niet aan getstelde eisen.";
	echo "wacht woord is niet goed genoeg";
	exit;
	//header('Location: ../../PW7/registreren/');
 }
elseif($userid != null) {
	echo "gebuiernaa bestaatal";
	exit;
	//header('Location: ../../PW7/registreren/');
}
else {
$code =  randCode();
// maak activatie mail met code
$mail = $email;
$subject = "activeer u account";
$from = "pw7@pw7.nl";
$message = "uw activeringscode is: <b>". $code. "</b> voer deze na het inloggen in om toegang te krijgen tot alle mogelijkheden";

// user object
$user = new User();
	$user->voornaam = $firstname;
	$user->tussenvoegsel = $insertion;
	$user->achternaam = $lastname;
	$user->adres = $street;
	$user->huisnummer = $number;
	$user->postcode = $pc;
	$user->plaats = $city;
	$user->email = $email;
	$user->gebruikersnaam = $username;
	$user->wachtwoord = $password;
	$user->activated = $code;
	//write to Database
	$user->write($user);
	// stuur de code per mail
	mail($mail, $subject,$message,"From: $from\n");
	header('Location: ../../PW7/login/');
}
 ?>