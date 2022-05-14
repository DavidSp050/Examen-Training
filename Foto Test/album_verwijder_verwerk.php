<?php
if (isset($_POST['submit']))
{
   require 'config.php';

   $ID = $_POST['id'];
   $Titel = $_POST['Titel'];

   $query = "DELETE FROM `back13_albums` WHERE ID_album = " . $_GET['id'] . "";

   echo $query . "<br/>";

   if (mysqli_query($mysqli, $query))
   {
       echo "<p>Album is verwijderd</p>";
   }

   else
   {
       echo "<p> Hij doet het niet.</p>";
       echo mysqli_error($mysqli);
   }
}
else
{
   echo "<p>U heeft niets aan geklikt</p>";
}

echo "<p>Terug naar het <a href='album_uitlees.php'>overzicht</a></p>";
?>
