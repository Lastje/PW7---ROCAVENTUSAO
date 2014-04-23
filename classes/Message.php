<?php
	class Message {
		private $berichtTekst;
		private $onderwerp;
		private $afzender_id;
		private $ontvanger_id;
		private $datum; //timestamp

		private $database;

		function __construct($dataArray) {
			$this->berichtTekst = $dataArray['berichtTekst'];
			$this->onderwerp = $dataArray['onderwerp'];
			$this->afzender_id = $dataArray['afzender_id'];
			$this->ontvanger_id = $dataArray['ontvanger_id'];
		
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