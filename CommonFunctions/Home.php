<?php
//starten van de sessie op het moment dat iemand is ingelogd
session_start();
//importeren van meerdere pagina's
include 'Init.php';
//kijkt of de inlog naam hetzelfde is als de ingevoerde naam
if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}
//kijken of er gezocht word
if (isset($_POST['search'])) {
    header("location: search.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>ToolsForYou</title>
    </head>
    <body>
        <div class="row well">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="Home.php">ToolsForEver</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="Locations.php">Locaties</a></li>
                            <li><a href="Signout.php">Uitloggen</a></li>
                        </ul>
                        <form class="navbar-form navbar-right" action="search.php"  method="post">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                        </form>
                    </div>
                </div>
            </nav>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="jumbotron">
                <h1>ToolsForEver</h1>
                <p class="lead">Welkom bij ToolsForEver. Hier kunt u alles over de vestigingen inzien. Denk hierbij aan de voorraad, locaties en fabrieken</p>
            </div>

            <div class="row marketing">
                <div class="col-lg-6">
                    <h4>Voorraad</h4>
                    <p>Direct zien of een product op voorraad is</p>

                    <h4>Locaties</h4>
                    <p>Direct zien waar een product op voorraad is</p>
                </div>

                <div class="col-lg-6">
                    <h4>Fabrieken</h4>
                    <p>Alle informatie over de fabrieken inzien</p>
                    <h4>Medewerkers</h4>
                    <p>Bekijken van alle medewerkers</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</html>
