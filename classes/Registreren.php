<html>
    <head>
        <link />
    </head>
    
    <body>
        <h1>Registreren</h1>
        <form>
            Voornaam: <input type="text" name="firstname"><br>
            Tussenvoegsel: <input type="text" name="Tussenvoegsel"><br>
            Achternaam: <input type="text" name="Achternaam"><br>
            Adres: <input type="text" name="Adres"><br>
            Postcode: <input type="text" name="Postcode"><br>
            Plaats: <input type="text" name="Plaats"><br>
            E-mail: <input type="text" name="E-mail"><br>
            Gebruikersnaam: <input type="text" name="Gebruikersnaam"><br>
            Wachtwoord: <input type="password" name="pwd">
        </form>
        
        <?php
            $con=mysqli_connect("localhost","root","","pw7");
                // Check connection
            if (mysqli_connect_errno()) {
                echo "Kan geen verbinding met MySQL maken: " . mysqli_connect_error();
            }

                // escape variables for security
                $Voornaam = mysqli_real_escape_string($con, $_POST['Voornaam']);
                $Tussenvoegsel = mysqli_real_escape_string($con, $_POST['Tussenvoegsel']);
                $Achternaam = mysqli_real_escape_string($con, $_POST['Achternaam']);
                $Adres = mysqli_real_escape_string($con, $_POST['Adres']);
                $Huisnummer = mysqli_real_escape_string($con, $_POST['Huisnummer']);
                $Postcode = mysqli_real_escape_string($con, $_POST['Postcode']);
                $Plaats = mysqli_real_escape_string($con, $_POST['Plaats']);
                $Email = mysqli_real_escape_string($con, $_POST['E-mail']);
                $Gebruikersnaam = mysqli_real_escape_string($con, $_POST['Gebruikersnaam']);
                $Wachtwoord = mysqli_real_escape_string($con, $_POST['Wachtwoord']);
               

                $sql="INSERT INTO Persons (FirstName, LastName, Age)
                VALUES ('$firstname', '$lastname', '$age')";

                if (!mysqli_query($con,$sql)) {
                 die('Error: ' . mysqli_error($con));
                }
                echo "1 record added";

                mysqli_close($con);
        ?>
        
    </body>

</html>