<title>wachtwoord vergeten</title>
<div class="content">

	<div class="header">
 		<h1 id="header_h1">Wachtwoord vergeten</h1>
 	</div>
	
	<div class="sideBar">
		<div id="header_inbox"><i class="fa fa-info"></i> Informatie</div>
	</div>
	
	<div class="innerContent">
		<div id="option_menu">
	        <div class="option_item"><i class="fa fa-pencil"></i> <a href="../../PW7/inloggen/">Terug</a> </div>
	    </div>
		<br/>
		<br/>
		<div style="position:absolute; margin-top:40px; margin-left:10px;">
		<h3>Wachtwoord opvragen</h3>
		<form method="post" action="../../PW7/DopasswordForgot/">
			<div>Voer uw gebruikersnaam in:</div>
			<div><input style="width:300px;"type="text" name="username" /> </div>
			<div><input  type="submit" value="wachtwoord opvragen" /></div>
		</form>
		<?php if(isset($_SESSION['nameerror'])){echo $_SESSION['nameerror'];}$_SESSION['nameerror']=NULL; ?>
		</div>
	</div>
	<div class="footer">
		<div id="footer_text"><i class="fa fa-info-circle"></i> Versie 1.0 </div>
	</div>	
</div>
