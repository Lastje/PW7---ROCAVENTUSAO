<?php 

if(isset($_SESSION['userId'])) {
$userId = $_SESSION['userId'];
$user = $database->getUserById($_SESSION['userId']);
?>
<div class="content">
    <div class="header">
        <h1 id="header_h1">Welkom <?php echo $user->getName(); ?></h1>
    </div>

<?php if($user->activated == 1) { ?>
    <div class="sideBar">
        <div id="header_inbox"><i class="fa fa-inbox"></i> Inbox</div>
        <div style="position:absolute;margin-top:10px;margin-left:10px;">
            <a id="new_message" style="cursor:pointer;"><i class="fa fa-plus-square"></i> Nieuwe bericht</a>
            <hr>
        </div>
        <div id="inbox">
            <?php $user->getMessages(); ?>
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
                <form action="" method="post">
                <input style="width:800px;" type="text" name="name" placeholder="aan" value=""><br>
                <input style="width:800px;" type="text" name="mail" placeholder="onderwerp" value=""><br>
                <p>Bericht:</p>
                <textarea style="width:800px;height:100px;resize:none"></textarea>
                <input type="submit" value="Verzenden">
                <input id="closeMenu" type="button" value="Annuleren">
                </form>
        </div>

    </div>
    <?php }else{ ?>

    <div class="sideBar"> </div>

    <div class="innerContent">
        <div style="position:absolute;padding-left:10px;">
            <h2>Uw account is nog niet geactiveerd!</h2>
            <p>Vul de code in die verstuurd is naar uw email:</p>
            <form action="../../PW7/activeren/" method="post">
                <input type="text" name="code" /> 
                <input type="submit" name="activeren" value="activeren">
                <input type="hidden" name="id" value="<?php echo $userId; ?>">
            </form>
            <br />
            <i class="fa fa-power-off"></i><a href="/PW7/logout/"> Uitloggen</a>
        </div>
    </div>




    <?php } ?>
    <div class="footer">
        <div id="footer_text"><i class="fa fa-info-circle"></i> Versie 1.0 </div>
    </div>

    <script type="text/javascript">
        $('#createmessage').hide();

        $('#new_message').bind('click',function(){
            $('#createmessage').toggle();
        });

        //messagehandling
        $('.message_text').hide();
        $(document).ready(function(){
            $(".message_object").click(function(){
                var id = $(this).attr('id');
                id = id.replace('message_', '');
            $("#bericht_" + id).toggle();
            });
        });
        
        $('#closeMenu').click(function(){
            $('#createmessage').toggle();
        });


    </script>


</div>

<?php } else {

    header('location:/PW7/inloggen/');




} ?>