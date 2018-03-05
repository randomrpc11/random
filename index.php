<?php

session_start();

include('bootstrap.html');

include('navigation.php');
include('modal.html');

print_r(get_defined_vars());
echo "<br><br>";

// Content parser
if (isset($_GET["page"]))
{
  include('content/' . $_GET["page"] . '.html');
} else {
  include('content/default.html');
}

// Temporary content handler. Merge this with navigation menu buttons
echo '<form action="index.php" method="get">
      <input name="page" type="text"></input>
      <input type="submit" value="Go">'
?>
