<?php
//reguliere expressie in stukken
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	
// get data van registratie input
	 $firstname = $_POST['firstname'];
	 $insertion = $_POST['Tussenvoegsel'];
	 $lastname = $_POST['Achternaam'];
	 $street = $_POST['Adres'];
	 $number = 0;
	 $pc = $_POST['Postcode'];
	 $city = $_POST['Plaats'];
	 $username = $_POST['Gebruikersnaam'];
	 $email = $_POST['E-mail'];
	 $password = $_POST['pwd'];
	 $passwordrepeat = $_POST['pwd2'];
//check of gebruikersnaam al bestaat
$userid = null;
$userid = $database->userlogin($username);
// check wachtwoord
 if($password != $passwordrepeat) {
	header('Location: ../../PW7/registreren/');
	$_SESSION['pwderror'] = "de wachtwoorden komen niet overeen";
 }
elseif(!$uppercase || !$lowercase || !$number || strlen($password) < 8 || strlen($password) > 12) {
	header('Location: ../../PW7/registreren/');
	$
 }
elseif($userid != null) {
	header('Location: ../../PW7/registreren/');
}
else {
$user;
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
	
	//write to Database
	$user->write($user);
	header('Location: ../../PW7/login/');
}
 ?>