<?php
// Maakt connectie met de database
function connect()
{
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=toolsforever', "root");
        return $dbh;
        } 
    catch (PDOException $e) 
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
}
//checkt of de gebruikersnaam en hashed wachtwoord overeen komen
function login($username, $password)
{
    $password = sha1($password);
    $query = connect()->prepare("SELECT Gebruikersnaam FROM Medewerker WHERE Gebruikersnaam = '$username' and Wachtwoord = '$password'");
    $query->execute();
    $rowCount = $query->rowCount();
    
    return $rowCount; 
}
//Haalt alle locatie velden op uit de databse
function getLocationRows()
{
    $locationValues = Array();
    foreach(connect()->query('SELECT * from locatie') as $row) {
        $locationValues[] = $row;
    }
    
    return $locationValues;
}
//Maakt een locatie aan
function addLocationRows($locationCode, $location)
{
    $query = connect()->prepare("INSERT INTO `locatie`(`Locatiecode`, `Locatie`) VALUES ('$locationCode','$location')");
    $query->execute();
}
//verwijderd een locatie
function deleteLocation($locationCode){
    $query = connect()->prepare("DELETE FROM `locatie` WHERE `Locatiecode` = '$locationCode'");

    $query->execute();
}
//veranderd een locatie
function changeLocation($locationCode, $locatie, $currentID)
{
     $query = connect()->prepare("UPDATE `locatie` SET `Locatiecode` = '$locationCode', `Locatie` = '$locatie' WHERE `Locatiecode` = '$currentID'");
     $query->execute();
}
//zoeken naar gegevens in de database
function search($locatie)
{
    $searchLocation = Array();
    foreach(connect()->query("SELECT * FROM `locatie` WHERE `Locatie` LIKE '%" . $locatie .  "%'") as $row) {
        
        $searchLocation[] = $row;
    }
    return $searchLocation;
}
?>
