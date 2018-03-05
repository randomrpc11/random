<?php

session_start();
session_destroy();

echo "Je bent uitgelogd!";
header( "refresh:3;url=../index.php");

?>
