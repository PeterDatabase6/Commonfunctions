<?php
//starten van de sessie op het moment dat iemand zich heeft aangemeld
session_start();
//importeren van alle pagina's
include 'Init.php';
//kijkt of de inlog naam hetzelfde is als de ingevoerde naam
if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}
//kijkt of de knop voor het aanmaken van een locatie geset is
if (isset($_POST['addLocation'])) {
    addLocationRows($_POST['locationCode'], $_POST['location']);
}
//kijkt of de knop voor het verwijderen van een locatie geset is
if (isset($_POST['removeLocation'])) {
    deleteLocation($_POST['removeLocation']);
}
//kijkt of de knop voor het veranderen van de locatie geset is
if (isset($_POST['changeLocation'])) {
    $change = $_POST['changeLocation'];
}
//kijkt of de verander knop geset is
if (isset($_POST['changeLocationButton'])) {
    changeLocation($_POST['locationCode'], $_POST['location'], $_POST['currentID']);
}
// kijkt of de zoek knop geset is
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
            <br>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2 class="sub-header">Overzicht locaties</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Locatie code</th>
                                <th>Locatie</th>
                            </tr>
                        </thead>
                        <?php
                        //verwerkt de terug gegeven gegevens vanuit de functie pagina in een tabel, dit gaat om velden van de database
                        $test = getLocationRows();
                        for ($i = 0; $i < sizeof($test); $i++) {
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<td>" . $test[$i][0] . "</td>";
                            echo "<td> " . $test[$i][1] . "</td>";
                            echo "<td>";
                            ?>
                            <form class="form-signin" action="Locations.php" method="post">
                                <button type="submit" class="btn btn-default" value="<?php echo $test[$i][0]; ?>" name="changeLocation" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </button>
                                <button type="submit" class="btn btn-default" value="<?php echo $test[$i][0]; ?>" name="removeLocation" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </form>
                            <?php
                            echo "</td>";
                            echo "</tr>";
                            echo "</tbody>";
                        }
                        ?> 
                    </table>
                    <form class="form-signin" action="Locations.php" method="post">
                        <button type="submit" class="btn btn-default" name="addLocationButton" aria-label="Left Align">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                    </form>

                    <?php
                    // als de locatie knop geset is
                    if (isset($_POST['changeLocation'])) {
                        ?>
                        <form class="form-signin" action="Locations.php" method="post">
                            <div class="input-group">
                                <input type="username" class="form-control" value="<?php echo $change;?>" name="currentID" placeholder="<?php echo $change;?>" aria-describedby="basic-addon1" >
                                <input type="username" class="form-control" name="locationCode" placeholder="Locatie code" aria-describedby="basic-addon1" >
                                <input type="username" class="form-control" name="location" placeholder="Locatie" aria-describedby="basic-addon1" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-primary btn-block" name="changeLocationButton" type="submit">Bewerken</button>
                                </span>
                            </div>
                        </form>
                        <?php
                    }
                    // als de toevoegen knop geset is
                    if (isset($_POST['addLocationButton'])) {
                        ?>
                        <form class="form-signin" action="Locations.php" method="post">
                            <div class="input-group">
                                <input type="username" class="form-control" name="locationCode" placeholder="Locatie code" aria-describedby="basic-addon1" >
                                <input type="username" class="form-control" name="location" placeholder="Locatie" aria-describedby="basic-addon1" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-primary btn-block" name="addLocation" type="submit">Toevoegen</button>
                                </span>
                            </div>
                        </form>
                        <?php
                    }
                    ?>

                    <div class="col-md-4">
                        <br><br>
                    </div>
                </div>
                </body>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
                </html>


