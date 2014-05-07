<?php
	class Message {
		private $berichtTekst;
		private $onderwerp;
		private $afzender_id;
		private $ontvanger_id;
		private $datum; //timestamp

		private $database;

		function __construct($dataArray,$datum=false) {
			$this->berichtTekst = $dataArray['berichttekst'];
			$this->onderwerp = $dataArray['onderwerp'];
			$this->afzender_id = $dataArray['afzender_id'];
			$this->ontvanger_id = $dataArray['ontvanger_id'];

			if ($datum) {
				$this->datum = $dataArray['datum'];
			}
		
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
  			$this->database->saveMessage($this);
  		}
	}

?>