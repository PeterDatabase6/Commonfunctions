<?php
// starten van de sessie als iemand zich heeft aangemeld
session_start();
// importeren van andere pagina's
include 'Init.php';
//kijkt of de inlog naam hetzelfde is als de ingevoerde naam
if (!isset($_SESSION['userName'])) {
    header('location: index.php');
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
                    </div>
                </div>
            </nav>
            <br>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2 class="sub-header">Gevonden Locaties</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Locatie code</th>
                                <th>Locatie</th>
                            </tr>
                        </thead>
                        <?php
                        //gegevens vanuit de functie pagina omzetten naar een tabel met de geegevens uit de database
                        $values = search($_POST['search']);
                        for ($i = 0; $i < sizeof($values); $i++) {
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<td>" . $values[$i][0] . "</td>";
                            echo "<td> " . $values[$i][1] . "</td>";
                            echo "<td>";
                            echo "</td>";
                            echo "</tr>";
                            echo "</tbody>";
                        }
                        ?> 
                    </table>

                    <div class="col-md-4">
                        <br><br>
                    </div>
                </div>
                </body>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
                </html>


