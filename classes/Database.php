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

		}

		public function getMessage($id){
			$query = "SELECT * FROM message WHERE id = :id ";
			$query = 
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


	}


?>