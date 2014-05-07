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
		

		private $database;		

		function __construct($dataArray) {
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
	

			$this->database = new Database();
			$this->database->connect();
		}

		public function __get($property) {
    		if (property_exists($this, $property)) {
      			return $this->$property;
    		}
  		}

  		public function __set($property, $value) {
    		if (property_exists($this, $property)) {
      			$this->$property = $value;
    		}
  		}

  		public function write(){
  			$this->database->saveUser($this);
  		}

	}
?>
