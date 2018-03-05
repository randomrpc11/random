<?php

session_start();

include('connection.php');

$gebruikersnaam = mysqli_real_escape_string($connection, $_POST["gebruikersnaam"]);
$wachtwoord = mysqli_real_escape_string($connection, $_POST["wachtwoord"]);

$query = mysqli_query($connection, "SELECT * FROM `gebruiker` WHERE gebruikersnaam='$gebruikersnaam' AND wachtwoord='$wachtwoord'");
$controle = mysqli_num_rows($query);

if($controle == 1){

    $fetch = mysqli_fetch_row($query);

    $_SESSION["gebruiker"] = $fetch[0];
    $_SESSION["voornaam"] = $fetch[1];
    $_SESSION["medewerker"] = $fetch[9];

    echo "Welkom " . $_SESSION["voornaam"] . "! Je bent nu ingelogd.";

    // print_r($fetch);

    header( "refresh:2;url=../index.php");
} else{
    echo "Er heeft zich een fout voorgedaan tijdens het inloggen.";

    header( "refresh:2;url=../index.php");
}
