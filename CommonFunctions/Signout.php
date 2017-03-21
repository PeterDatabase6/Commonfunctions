<?php
//maakt een sessie aan
session_start();
//verwijderd alle sessie gegevens
session_unset();
//sessie word gestopt
session_destroy();
//verwijzing naar een andere pagina
header("location:index.php");
?>

