<?php
	//database connectie
	try{
		$db = new PDO('mysql:host=localhost;dbname=pw7', 'root', '');
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}
	catch (PDOException $e){
		echo $e->getMessage();
	exit;
	}

	//globalrequestpath
	$globalPath = $_SERVER['REQUEST_URI'];

	//include classes
	include'../PW7/classes/Message.php';
	include'../PW7/classes/User.php';

?>