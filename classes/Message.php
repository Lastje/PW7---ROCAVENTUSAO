<?php
	class Message {
		private $berichtTekst;
		private $onderwerp;
		private $afzender_id;
		private $ontvanger_id;
		private $datum; //timestamp

		function __construct($dataArray) {
			$this->berichtTekst = $dataArray['berichtTekst'];
			$this->onderwerp = $dataArray['onderwerp'];
			$this->afzender_id = $dataArray['afzender_id'];
			$this->ontvanger_id = $dataArray['ontvanger_id'];
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

  		}
	}

?>