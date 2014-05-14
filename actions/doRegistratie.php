<?php
  ini_set( 'display_errors', 1 );
  error_reporting( E_ALL ); 
  if (isset($_POST["registreer"]))
  { 
    $con = mysql_connect( "localhost","oddes_nl_Project","bCCUkoXa" );
    if( !$con )
    {
    die( 'Could not connect: ' . mysql_error( ) );
    }
    
    mysql_select_db( "oddesigners_nl_Project", $con );
    
    $voornaam = $_POST["voornaam"];
    $tussenvoegsel = $_POST["tussenvoegsel"];
	$achternaam   = $_POST["achternaam"];
	$adres   = $_POST["adres"];
    $huisnummer   = $_POST["huisnummer"];
	$postcode   = $_POST["postcode"];
	$plaats   = $_POST["plaats"];
	$email   = $_POST["email"];
	$gebruikersnaam   = $_POST["gebruikersnaam"];
	$wachtwoord   = $_POST["wachtwoord"];
	$activated   = $_POST["activated"];
	$repeat = $_POST["repeat"];
    
    if( $wachtwoord != '' && $wachtwoord == $repeat )
    {
      $sql = "INSERT INTO user ( voornaam, tussenvoegsel, achternaam, adres, huisnummer, postcode, plaats, email, gebruikersnaam, wachtwoord, activated )
      VALUES ( '$voornaam','$tussenvoegsel','$achternaam','$adres','$huisnummer','$postcode','$plaats','$email','$gebruikersnaam', '$wachtwoord', '$activated' )";
      if( !mysql_query( $sql,$con ) )
      {
      die( 'Error: ' . mysql_error( ) );
      }
      echo '<p style="color: green;">U bent succesvol geregistreerd, er wordt een bevestiging naar uw email adres verstuurd om uw account te activeren</p>';
 //Email sturen voor bevestiging
 $to = "".$email."";
 $subject = "Bevestig uw account";
 $message = "Hallo ".$voornaam."\n U ontvangt deze email als vervolg op uw registratie.\n Ga naar deze link om uw account te activeren.\n www.oddesigners.nl/PW7/actions/doActivate.php?gebruikersnaam=".$gebruikersnaam."&email=".$email." \n Met vriendelijke groet,\n\n Project groep.";
 $from = "Project@7.nl";
 $headers = "From:" . $from;
 mail($to,$subject,$message,$headers);   
   } 
    else 
    {
      if ($wachtwoord == "")
        echo '<p style="color: red;">Voer een wachtwoord in.</p>';
      else
        echo '<p style="color: red;">De wachtwoorden die u heeft ingevoerd matchen niet.</p>';
    }    
    
    mysql_close( $con );
  } 
?>
<form action="" method="post">
Gebruikersnaam: <input type="text" name="gebruikersnaam" /><br>
Wachtwoord: <input type="password" name="wachtwoord" /><br>
Herhaal wachtwoord: <input type="password" name="repeat" /><br>
<hr>
Voornaam: <input type="text" name="voornaam" /><br>
tussenvoegsel: <input type="text" name="tussenvoegsel" /><br>
Achternaam: <input type="text" name="achternaam" /><br>
Adres <input type="text" name="adres" /><br>
Huisnummer: <input type="text" name="huisnummer" /><br>
Postcode: <input type="text" name="postcode" /><br>
Plaats: <input type="text" name="plaats" /><br>
Email: <input type="text" name="email" /><br>
Activated is Nee {1}<input type="text" name="activated" value="1" /><br>
<input type="submit" name="registreer" value="Register"/>
</form> 
