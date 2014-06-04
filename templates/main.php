<?php 

if(isset($_SESSION['userId'])) {
$user = $database->getUserById($_SESSION['userId']);
?>
<div class="content">
 	<div class="header">
 		<h1 id="header_h1">Welkom <?php echo $user->getName(); ?></h1>
 	</div>

 	<div class="sideBar">
		<div id="header_inbox"><i class="fa fa-inbox"></i> Inbox</div>
		<div style="position:absolute;margin-top:10px;margin-left:10px;">
			<a id="new_message" style="cursor:pointer;"><i class="fa fa-plus-square"></i> Nieuwe bericht</a>
			<hr>
		</div>
		<div id="inbox">
			<!--<div id="message">
			Van: <br />
			Onderwerp: <br />
			Datum: <br />
			</div>
			<div id="message">
			Van: test <br />
			Onderwerp: <br />
			Datum: <?php var_dump($user->id); ?><br />
			</div>-->
		</div>
	</div>

	<div class="innerContent">
		<div id="option_menu">
			<div class="option_item"><i class="fa fa-pencil"></i> Profiel</div>
			<div class="option_item"><a href="/PW7/logout/"><i class="fa fa-power-off"></i> Uitloggen</a></div>

		</div>
		<div id="my_profile">
			<form method="post" action="">
            <br />
            <br />
            <table>
                <tr>
                    <td><strong><i class="fa fa-edit"></i> Persoonlijke gegevens:</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Voornaam</td>
                    <td><input type="text" name="voornaam" value="<?php if(isset($_POST['voornaam'])){ echo $_POST['voornaam']; }else{echo $user->voornaam;} ?>"></td>
                </tr>
                <tr>
                    <td>Tussenvoegsel</td>
                    <td><input type="text" name="tussenvoegsel" value="<?php if(isset($_POST['tussenvoegsel'])){ echo $_POST['tussenvoegsel']; }else{echo $user->tussenvoegsel;} ?>"></td>
                </tr>
                <tr>
                    <td>Achternaam</td>   
                    <td><input type="text" name="achternaam" value="<?php if(isset($_POST['achternaam'])){ echo $_POST['achternaam']; }else{echo $user->achternaam;} ?>"></td>
                </tr>
                <tr>
                    <td><strong><i class="fa fa-home"></i> Adres:</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Straatnaam</td>
                    <td><input type="text" name="adres" value="<?php if(isset($_POST['adres'])){ echo $_POST['adres']; }else{echo $user->adres;} ?>"></td>
                </tr>
                <tr>
                    <td>Postcode</td>
                    <td><input type="text" name="postcode" value="<?php if(isset($_POST['postcode'])){ echo $_POST['postcode']; }else{echo $user->postcode;} ?>"></td>
                </tr>
                <tr>
                    <td>Plaats</td>
                    <td><input type="text" name="plaats" value="<?php if(isset($_POST['plaats'])){ echo $_POST['plaats']; }else{echo $user->plaats;} ?>"></td>
                </tr>
                <tr>
                    <td><strong><i class="fa fa-gears"> Account:</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Gebruikersnaam</td>
                    <td><input type="text" name="gebruikersnaam" value="<?php if(isset($_POST['gebruikersnaam'])){ echo $_POST['gebruikersnaam']; }else{echo $user->gebruikersnaam;} ?>"></td>

                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><input type="text" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; }else{echo $user->email;} ?>"></td>
                </tr>
                <tr>
                    <td>Wachtwoord</td>
                    <td><input type="password" name="pwd" value="wachtwoord123"></td>
                </tr>
                <tr>
                    <td>Herhaal wachtwoord</td>
                    <td><input type="password" name="pwd2" ></td>
                    <input type="hidden" name="activated" value="<?php echo $user->activated; ?>">
                </tr>
            </table>
            <br />
            <input type="submit" value="Opslaan"/>
        </form>

		</div>

		<?php 

			if(isset($_POST['voornaam'])){
				if (($_POST['pwd'] == $_POST['pwd2'] || $_POST['pwd'] == 'wachtwoord123') && !empty($_POST['email']) && !empty($_POST['gebruikersnaam'])) {

					$user->voornaam = $_POST['voornaam'];
					$user->tussenvoegsel = $_POST['tussenvoegsel'];
					$user->achternaam = $_POST['achternaam'];
					$user->adres = $_POST['adres'];
					//$user->huisnummer = $_POST['huisnummer'];
					$user->postcode = $_POST['postcode'];
					$user->plaats = $_POST['plaats'];
					$user->email = $_POST['email'];
					$user->gebruikersnaam = $_POST['gebruikersnaam'];
					if($_POST['pwd'] != 'wachtwoord123'){
						$user->wachtwoord = md5($_POST['pwd']);
					}
					$user->activated = $_POST['activated'];

					//var_dump($user);

					$user->write(false);
				}
			}
		?>

        <div id="createmessage">
                <form action="MAILTO:someone@example.com" method="post" enctype="text/plain">
                Name:<br>
                <input type="text" name="name" value="your name"><br>
                E-mail:<br>
                <input type="text" name="mail" value="your email"><br>
                Comment:<br>
                <input type="text" name="comment" value="your comment" size="50"><br><br>
                <input type="submit" value="Send">
                <input type="reset" value="Reset">
                </form>
        </div>

	</div>

	<div class="footer">
		<div id="footer_text"><i class="fa fa-info-circle"></i> Versie 1.0 </div>
	</div>

	<script type="text/javascript">
		$('#createmessage').hide();

		$('#new_message').bind('click',function(){
			$('#createmessage').toggle();
		});
	</script>

</div>

<?php } else {

	header('location:/PW7/inloggen/');

} ?>
