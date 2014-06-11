<title> Registeren</title>
<div class="content">
    <div class="header">
        <h1 id="header_h1">Registeren</h1>
    </div>

    <div class="sideBar">
        <div id="header_inbox"><i class="fa fa-info-circle"></i> Informatie</div>
    </div>

    <div class="innerContent">
        <div id="option_menu">
            <div class="option_item"><i class="fa fa-pencil"></i> <a href="../../PW7/inloggen/">Terug</a> </div>
        </div>
        <div id="form_registrate">
        <form method="post" action="../../PW7/registreren_action/">
            <table>
                <tr>
                    <td><strong><i class="fa fa-edit"></i> Persoonlijke gegevens:</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Voornaam</td>
                    <td><input type="text" name="firstname"></td>
                </tr>
                <tr>
                    <td>Tussenvoegsel</td>
                    <td><input type="text" name="Tussenvoegsel"></td>
                </tr>
                <tr>
                    <td>Achternaam</td>   
                    <td><input type="text" name="Achternaam"></td>
                </tr>
                <tr>
                    <td><strong><i class="fa fa-home"></i> Adres:</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Straat en huisnummer</td>
                    <td><input type="text" name="Adres"></td>
					<td><input type="text" name="huisnummer" style="width:35px;" maxlength="5"></td>
				</tr>
                <tr>
                    <td>Postcode</td>
                    <td><input type="text" name="Postcode" maxlength="6"></td>
                </tr>
                <tr>
                    <td>Plaats</td>
                    <td><input type="text" name="Plaats"></td>
                </tr>
                <tr>
                    <td><strong><i class="fa fa-gears"> Account:</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Gebruikersnaam</td>
                    <td><input type="text" name="Gebruikersnaam"></td>
                    <td><i id="question_gb" class="fa fa-question-circle"></td>
                </tr>
				<tr>
					<td><?php if(isset($_SESSION['usernameex'])){echo $_SESSION['usernameex'];} $_SESSION['usernameex']=NULL;  ?> </td>
				</tr>
				<tr>
					<td> <?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} $_SESSION['email']=NULL;  ?></td>
				</tr>
                <tr>
                    <td>E-mail</td>
                    <td><input type="text" name="E-mail"></td>
                </tr>
				<tr>
					<td><?php if(isset($_SESSION['pwderror'])){echo $_SESSION['pwderror'];} $_SESSION['pwderror']=NULL;  ?></td>
				</tr>
                <tr>
                    <td>Wachtwoord</td>
                    <td><input type="password" name="pwd"></td>
                    <td><i id="question_ww" class="fa fa-question-circle"></td>
                </tr>
				<tr>
					<td><?php if(isset($_SESSION['pwd2error'])){echo $_SESSION['pwd2error'];} $_SESSION['pwd2error']=NULL;  ?> </td>
				</tr>
                <tr>
                    <td>Herhaal wachtwoord</td>
                    <td><input type="password" name="pwd2"></td>
                </tr>
            </table>
            <br />
            <input type="submit" value="Registreren"/>
        </form>
        <br />
        <div id="explain_ww"><small id="small_exp"></small></div>
        </div>
    </div>

    <div class="footer">
        <div id="footer_text"><i class="fa fa-info-circle"></i> Versie 1.0 </div>
    </div>

</div>

<script type="text/javascript">
    var question_ww = $('#question_ww');
    var question_gb = $('#question_gb');
    var explain_ww = $('#explain_ww');
    var div_text = $('#small_exp');

    var text_ww = '&nbsp 1 speciaal karackter, 1 hoofdletter, 1 kleine letter en minimaal 8 tekens lang';
    var text_gb = '&nbsp De gebruikersnaam mag alleen letters bevatten';

    explain_ww.hide();

    question_ww.bind('mouseover',function(event){
        div_text.html(text_ww)
        explain_ww.fadeIn('slow');
    });
    question_ww.bind('mouseout',function(event){
        explain_ww.fadeOut();
    });

    question_gb.bind('mouseover',function(event){
        div_text.html(text_gb)
        explain_ww.fadeIn('slow');
    });
    question_gb.bind('mouseout',function(event){
        explain_ww.fadeOut();
    });
    
    $()
</script>
        
