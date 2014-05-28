<?php


if(isset($_SESSION['error'])){
  unset($_SESSION['error']);
}

if(isset($_SESSION['userId'])){
  unset($_SESSION['userId']);
}

	
session_destroy();

header('Location: ../../PW7/login/');
?>