<?php
	class Database {
		private $db_object;

		public function connect(){
			try{
				$db = new PDO('mysql:host=localhost;dbname=pw7', 'root', '');
				$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
			}
				catch (PDOException $e){
				echo $e->getMessage();
				exit;
			}

			$this->db_object = $db;
		}

		public function saveUser($user, $new){
			if(!$new) {
				$query = "UPDATE user SET voornaam = :voornaam, 
										tussenvoegsel = :tussenvoegsel,
										achternaam = :achternaam,
										adres = :adres,
										huisnummer = :huisnummer,
										postcode = :postcode,
										plaats = :plaats,
										email = :email,
										gebruikersnaam = :gebruikersnaam,
										wachtwoord = :wachtwoord,
										activated = :activated
						WHERE id = :id ";
			}else {

				$query = "INSERT INTO user (voornaam, 
											tussenvoegsel,
											achternaam,
											adres,
											huisnummer,
											postcode,
											plaats,
											email,
											gebruikersnaam,
											wachtwoord,
											activated)
				  VALUES (:voornaam,
				  	      :tussenvoegsel,
				  	      :achternaam,
				  	      :adres,
				  	      :huisnummer,
				  	      :postcode,
				  	      :plaats,
				  	      :email,
				  	      :gebruikersnaam,
				  	      :wachtwoord,
				  	      :activated )";

			}

			$array = array(':voornaam'=>$user->voornaam,
	                          ':tussenvoegsel'=>$user->tussenvoegsel,
	                          ':achternaam'=>$user->achternaam,
	                          ':adres'=>$user->adres,
	                          ':huisnummer'=>$user->huisnummer,
	                          ':postcode'=>$user->postcode,
	                          ':plaats'=>$user->plaats,
	                          ':email'=>$user->email,
	                          ':gebruikersnaam'=>$user->gebruikersnaam,
	                          ':wachtwoord'=>$user->wachtwoord,
	                          ':activated'=>$user->activated);

			if (!$new) {
	            $array[':id'] = $this->userlogin($user->gebruikersnaam);
	        }

			$r = $this->db_object->prepare($query);
			$r->execute($array);
		}

		public function getMessage($id){
			$query = "SELECT * FROM message WHERE id = :id ";
			$r = $this->db_object->prepare($query);
			$r->execute(array(':id'=>$id));

			$message = array();

			while($row = $r->fetch(PDO::FETCH_ASSOC)){
				$message['berichtTekst'] = $row['berichttekst'];
				$message['onderwerp'] = $row['onderwerp'];
				$message['afzender_id'] = $row['afzender_id'];
				$message['ontvanger_id'] = $row['ontvanger_id'];
				$message['datum'] = $row['datum'];
			}

			return $return_message = new Message($message,true);

		}

		public function getUserById($id){
  			$query = "SELECT * FROM user WHERE id = :id";
			$r = $this->db_object->prepare($query);
			$r->execute(array(':id'=>$id));

			$user = array();

			while($row = $r->fetch(PDO::FETCH_ASSOC)){
				$user['voornaam'] = $row['voornaam'];
				$user['tussenvoegsel'] = $row['tussenvoegsel'];
				$user['achternaam'] = $row['achternaam'];
				$user['adres'] = $row['adres'];
				$user['huisnummer'] = $row['huisnummer'];
				$user['postcode'] = $row['postcode'];
				$user['plaats'] = $row['plaats'];
				$user['email'] = $row['email'];
				$user['gebruikersnaam'] = $row['gebruikersnaam'];
				$user['wachtwoord'] = $row['wachtwoord'];
				$user['activated'] = $row['activated'];
			}

			return $return_user = new User($user);

  		}

		public function saveMessage($message){
			$query = "INSERT INTO message (berichtTekst, 
										   onderwerp,
										   afzender_id,
										   ontvanger_id)
					  VALUES (:berichtTekst,
					  	      :onderwerp,
					  	      :afzender_id,
					  	      :ontvanger_id )";

			$r = $this->db_object->prepare($query);
			$r->execute(array(':berichtTekst'=>$message->berichtTekst,
	                          ':onderwerp'=>$message->onderwerp,
	                          ':afzender_id'=>$message->afzender_id,
	                          ':ontvanger_id'=>$message->ontvanger_id));
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
		
		public function userlogin($u) {
			$query = "SELECT id FROM user WHERE gebruikersnaam = :u ";
			$r = $this->db_object->prepare($query);
			$r->execute(array(':u'=>$u));
			$id = '';
			
			while($row = $r->fetch(PDO::FETCH_ASSOC)){
				$id = $row['id'];
			}		
			
			return $id;
		}

	}


?>