<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($username) && !empty($password))
	{
		echo $database->userlogin($username);
		
	}
	else
	{
		header('Location: ../PW7/');
		exit;
	}
?>