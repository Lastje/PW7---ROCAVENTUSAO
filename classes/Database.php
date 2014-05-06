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

		public function saveUser($user){
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

			$r = $this->db_object->prepare($query);
			$r->execute(array(':voornaam'=>$user->voornaam,
	                          ':tussenvoegsel'=>$user->tussenvoegsel,
	                          ':achternaam'=>$user->achternaam,
	                          ':adres'=>$user->adres,
	                          ':huisnummer'=>$user->huisnummer,
	                          ':postcode'=>$user->postcode,
	                          ':plaats'=>$user->plaats,
	                          ':email'=>$user->email,
	                          ':gebruikersnaam'=>$user->gebruikersnaam,
	                          ':wachtwoord'=>$user->wachtwoord,
	                          ':activated'=>$user->activated));
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
			
			$userid = mysql_fetch_row($query);
			return $userid;
		}

	}


?>