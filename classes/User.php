<?php
	class User {
		private $id;
		private $voornaam;
		private $tussenvoegsel;
		private $achternaam;
		private $adres;
		private $huisnummer;
		private $postcode;
		private $plaats;
		private $email;
		private $gebruikersnaam;
		private $wachtwoord;	
		private $activated;		

		function __construct($dataArray) {
			$this->id = $dataArray['id'];
			$this->voornaam = $dataArray['voornaam'];
			$this->tussenvoegsel = $dataArray['tussenvoegsel'];
			$this->achternaam = $dataArray['achternaam'];
			$this->adres = $dataArray['adres'];
			$this->huisnummer = $dataArray['huisnummer'];
			$this->postcode = $dataArray['postcode'];
			$this->plaats = $dataArray['plaats'];
			$this->email = $dataArray['email'];
			$this->gebruikersnaam = $dataArray['gebruikersnaam'];
			$this->wachtwoord = $dataArray['wachtwoord'];
			$this->activated = $dataArray['activated'];
		}
	}
?>
