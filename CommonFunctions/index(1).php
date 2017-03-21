<?php
//starten van de sessie op het moment dat iemand met succes is ingelogd
session_start();
// importeren van de paginas
include "Init.php";
//checkt of de login knop geset is
if (isset($_POST['submit'])) {
    //kijkt of de gebruikersnaam en wachtwoord zijn goedgekeurd door de functie
    if (login($_POST['username'], $_POST['password']) == 1) {
        $_SESSION['userName'] = $_POST['username'];
        //verwijzing naar andere pagina
        header('Location: Home.php');
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form class="form-signin" action="index.php" method="post">
                    <h2 class="form-signin-heading">Inloggen</h2>
                    <label for="inputEmail" class="sr-only">Gebruikersnaam</label>
                    <input type="username" name="username" id="inputEmail" class="form-control" placeholder="Gebruikersnaam" required autofocus>
                    <label for="inputPassword" class="sr-only">Wachtwoord</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Wachtwoord" required>
                    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Login</button>
                    <div class="col-md-4">
                </form>
                <form action="contact.php">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <br>
                        <button type="submit" class="btn btn-default">Contact</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>

    </body>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</html>
