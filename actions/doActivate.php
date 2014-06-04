<?php
if(isset($_POST['code'])){
	$id = $_POST['id'];
	$code = $_POST['code'];

	$user = $database->getUserById($_SESSION['userId']);
	
	if($user->activated == $code){
		$user->activated = 1;
		$user->write(false);
	}
	
	header('Location: ../../PW7/main/');

}else{
	echo "wrong code";
}


?>
