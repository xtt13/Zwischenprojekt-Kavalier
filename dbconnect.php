<?php


// mysqli_connect Parameter: Host, Benutzer, Passwort, Datenbank

$link = mysqli_connect('localhost', 'hannah', 'sudo', 'sae_Kavalier');

if (!$link) {
  die('Connect Error (' . mysqli_connect_errno() . ') '
  . mysqli_connect_error());
}

mysqli_set_charset($link, 'utf8mb4');

?>
