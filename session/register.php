<?php

include('connection.php');

$voornaam = mysqli_real_escape_string($connection, $_POST["voornaam"]);
$tussenvoegsel = mysqli_real_escape_string($connection, $_POST["tussenvoegsel"]);
$achternaam = mysqli_real_escape_string($connection, $_POST["achternaam"]);

$adres = mysqli_real_escape_string($connection, $_POST["adres"]);
$postcode = mysqli_real_escape_string($connection, $_POST["postcode"]);
$woonplaats = mysqli_real_escape_string($connection, $_POST["woonplaats"]);

$gebruikersnaam = mysqli_real_escape_string($connection, $_POST["gebruikersnaam"]);
$wachtwoord = mysqli_real_escape_string($connection, $_POST["wachtwoord"]);

if (isset($_POST["medewerker"]))
{
  $medewerker = 1;
} else {
  $medewerker = 0;
}

$query = "INSERT INTO `gebruiker` (voornaam, tussenvoegsel, achternaam, adres, postcode, woonplaats, gebruikersnaam, wachtwoord, medewerker)
VALUES ('$voornaam', '$tussenvoegsel', '$achternaam', '$adres', '$postcode', '$woonplaats', '$gebruikersnaam', '$wachtwoord', '$medewerker')";

if(mysqli_query($connection, $query)){
    echo "Welkom " .$voornaam . "! Je bent nu geregistreerd.";
    header( "refresh:5;url=../index.php" );
} else{
    echo "Er heeft zich een fout voorgedaan tijdens het registreren.";
}

?>
