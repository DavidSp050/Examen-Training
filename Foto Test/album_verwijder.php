<?php
require 'config.php';

$ID_album = $_GET['id'];

$query = "SELECT * FROM back13_albums WHERE ID_album = " . $ID_album;

$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0)
{
   echo "<p>geen info gevonden van Album met het id: $ID_album </p>";
}
else {
   $rij = mysqli_fetch_array($resultaat);


   echo "<p>Wilt u het Album verwijderen?</p>";
   echo "<form name='form1' method='post' action='album_verwijder_verwerk.php?id=" . $ID_album . "'>";
   echo "<input type='hidden' name='ID' value=" . $rij['ID'] . "/>";
   echo "<p>Titel:";
   echo "<input type='text' name='Titel' value='" . $rij['Titel'] . "' disabled></p>";
   echo "<p>Band:";
   echo "<input type='text' name='Band' value='" . $rij['Band'] . "' disabled></p>";
   echo "<p><input type='submit' name='submit' value='Verwijder'/></p>";
   echo "</form>";
   echo "<p> Terug naar het <a href='album_uitlees.php'>Album Overzicht</a></p>";
}
?>
