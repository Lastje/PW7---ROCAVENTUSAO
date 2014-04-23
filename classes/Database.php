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

		public function saveMessage($message){
			
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