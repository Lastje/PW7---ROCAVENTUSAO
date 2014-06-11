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

		public function getName(){
			if ($this->tussenvoegsel != '' ) {
				return $this->voornaam . ' ' . $this->tussenvoegsel . ' ' . $this->achternaam;
			}else{
				return $this->voornaam . ' ' . $this->achternaam;
			}
			
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

  		public function getMessages(){
  			$id = $this->database->userlogin($this->gebruikersnaam);

  			$query = "SELECT * FROM message WHERE ontvanger_id = :id ORDER BY datum DESC";
			$r = $this->database->db_object->prepare($query);
			$r->execute(array(':id'=>$id));
			
			while($row = $r->fetch(PDO::FETCH_ASSOC)){
				$id = $row['id'];
				$message_a = array();
				$message_a['berichttekst'] = $row['berichttekst'];
				$message_a['onderwerp'] = $row['onderwerp'];
				$message_a['afzender_id'] = $row['afzender_id'];
				$message_a['ontvanger_id'] = $row['ontvanger_id'];
				$message_a['datum'] = $row['datum'];

				$message = new Message($message_a,true);
				$afzender = $this->database->getUserById($message_a['afzender_id']);

				$html = "<div id='message_".$id."' class='message_object'>
						<strong>Van: </strong>" . $afzender->getName() . "<br />
						<strong>Onderwerp: </strong>" . $message->onderwerp . "<br />
						<strong>Datum: </strong>" . $message->datum . "<br />
						<span class='message_text' id='bericht_" .$id. "' ><strong>Bericht: </strong>" . $message->berichtTekst . "</span><br />
						</div>";

				echo $html;
			}		

			/*$this->berichtTekst = $dataArray['berichttekst'];
			$this->onderwerp = $dataArray['onderwerp'];
			$this->afzender_id = $dataArray['afzender_id'];
			$this->ontvanger_id = $dataArray['ontvanger_id'];

			if ($datum) {
				$this->datum = $dataArray['datum'];
			}*/
			
			return $id;
  		}

  		public function write($new=true){
  			$this->database->saveUser($this,$new);
  		}
			
		

	}
?>
