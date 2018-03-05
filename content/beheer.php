<?php

session_start();

include('../session/connection.php');

if (isset($_POST['wijzig'])) {
    $atk = $connection->prepare("UPDATE gebruiker SET voornaam=?, tussenvoegsel=?, achternaam=?, adres=?, postcode=?, woonplaats=?, gebruikersnaam=?, wachtwoord=?, medewerker=?
    WHERE id=?");

    $atk->bind_param("sssssssssi", $_POST["voornaam"], $_POST["tussenvoegsel"], $_POST["achternaam"], $_POST["adres"], $_POST["postcode"], $_POST["woonplaats"], $_POST["gebruikersnaam"], $_POST["wachtwoord"], $_POST["medewerker"], $_POST["id"]);

    $atk->execute();
    header('beheer.php');



    // https://stackoverflow.com/questions/19990385/echo-mysqli-query-with-post-variable

}

if (isset($_POST['wis'])) {
    $query = "DELETE FROM `gebruiker` WHERE id = " . $_POST['id'] . "";
    $oStmt = $connection->prepare($query);
    $oStmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $oStmt->execute();
    header('beheer.php');
}

echo '<table class="table">';
echo '<thead>';
echo '<th>ID</th>';
echo '<th>Voornaam</th>';
echo '<th>Tussenvoegsel</th>';
echo '<th>Achternaam</th>';
echo '<th>Adres</th>';
echo '<th>Postcode</th>';
echo '<th>Woonplaats</th>';
echo '<th>Gebruikersnaam</th>';
echo '<th>Wachtwoord</th>';
echo '<th>Medewerker?</th>';
echo '</thead>';
echo '<tbody>';

$query = "SELECT * FROM `gebruiker`";

if($result = mysqli_query($connection, $query))
{
  while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <form method="post" action="beheer.php">
          <tr>
          <td><?php echo ($row['id']); ?><input type="hidden" name ="id" value="<?php echo ($row['id']); ?>"></td>
          <td><input type="text" name ="voornaam" value="<?php echo ($row['voornaam']); ?>"></td>
          <td><input type="text" name ="tussenvoegsel" value="<?php echo ($row['tussenvoegsel']); ?>"></td>
          <td><input type="text" name ="achternaam" value="<?php echo ($row['achternaam']); ?>"></td>
          <td><input type="text" name ="adres" value="<?php echo ($row['adres']); ?>"></td>
          <td><input type="text" name ="postcode" value="<?php echo ($row['postcode']); ?>"></td>
          <td><input type="text" name ="woonplaats" value="<?php echo ($row['woonplaats']); ?>"></td>
          <td><input type="text" name ="gebruikersnaam" value="<?php echo ($row['gebruikersnaam']); ?>"></td>
          <td><input type="text" name ="wachtwoord" value="<?php echo ($row['wachtwoord']); ?>"></td>
          <td><input type="number" name ="medewerker" value="<?php echo ($row['medewerker']); ?>"></td>
          <td><input type="submit" name="wijzig" value="wijzig"></td>
          <td><input type="submit" name="wis" value="wis" onClick="return confirm('<?php echo ($row['voornaam']); ?> zal verwijderd worden. Weet je het zeker?')"></td>
          </tr>
      </form>
  <?php
  };
}

echo '</tbody>';
echo '</table>';
