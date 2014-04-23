<?php
	
	//globalrequestpath
	$globalPath = $_SERVER['REQUEST_URI'];

	//include classes
	include'../PW7/classes/Database.php';
	include'../PW7/classes/Message.php';
	include'../PW7/classes/User.php';
	
	//globals
	global $database;

	//database connection
	$database = new Database();
	$database->connect();

?>