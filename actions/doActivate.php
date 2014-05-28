<?php 
  ini_set( 'display_errors', 1 );
  error_reporting( E_ALL ); 
//Start van sessies
session_start();
$_SESSION['gebruikersnaam']= $_GET['gebruikersnaam'];
$_SESSION['email']= $_GET['email'];
?><?
$gebruikersnaam = $_SESSION['gebruikersnaam'];
$email = $_SESSION['email'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head><title>Activatie van uw account</title></head><body>
<?
echo "Hallo, uw account $gebruikersnaam wordt geactiveerd na het drukken op de activatie knop.";
?><br>
<form action="" method="post">
<input type="submit" name="activeer" value="activeer"/><?php
if(isset($_POST['activeer']))
{
$con = mysql_connect( "localhost","oddes_nl_Project","bCCUkoXa" );
    if( !$con )
    {
    die( 'Could not connect: ' . mysql_error( ) );
    }

mysql_select_db('oddesigners_nl_Project', $con);
$sql = mysql_query("SELECT gebruikersnaam, activated FROM user");

mysql_query("UPDATE user SET activated = '2' WHERE gebruikersnaam = '$gebruikersnaam'");
?><h3>Uw account is nu geactiveerd!</h3><?
mysql_close($con);
}
else
{
}
?>
</body>
</html>
