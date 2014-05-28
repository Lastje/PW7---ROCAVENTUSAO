<?php 

?>
<title>Inloggen</title>
<div class="content">
 	<div class="header">
 		<h1 id="header_h1">Inloggen op de applicatie</h1>
 	</div>

 	<div class="sideBar">
		<div id="header_inbox"><i class="fa fa-inbox"></i> Informatie</div>
	</div>

	<div class="innerContent">
	<div id="option_menu" >
			<div class="option_item" style="width:initial;" ><a href="../../PW7/wachtwoordvergeten/"><i class="fa fa-power-off" ></i>Wachtwoord vergeten</a></div>
			<div class="option_item"><a href="../../PW7/registreren/"><i class="fa fa-power-off"></i>registreren</a></div>
	</div>
		<form style="margin-top:40px;" id="inlogForm" method="post" action="../../PW7/inloggen/" >
		<table>
		<tr>
			<th colspan="2">Inloggen</th>
		</tr>
		<tr>
			<td>Gebruikersnaam</td>
			<td><input type="text" name="username" /></td>			
		</tr>
		<tr>
			<td>Wachtwoord</td>
			<td><input type="password" name="password"/></td>
			<input type="hidden" name="controle" value="test" />
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Inloggen" name="login"> <?php //echo $_SESSION['error']; ?></td>
		</tr>
		<tr>
			<td><a href="">Wachtwoord vergeten</a></td>
			<td><a href="">Registreren</a></td>
		</tr>
		</table>
		</form>
	</div>

	<div class="footer">
		<div id="footer_text"><i class="fa fa-info-circle"></i> Versie 1.0 </div>
	</div>

</div>

