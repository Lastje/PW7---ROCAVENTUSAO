<?php
if(isset($_SESSION['error']))
  unset($_SESSION['error']);
	
session_destroy();

header('Location: ../../PW7/login/');
?>