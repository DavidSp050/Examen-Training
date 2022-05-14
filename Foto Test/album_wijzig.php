<?php
if (isset($_POST['submit']))
{
   require 'config.php';

   $opdracht = "SELECT Afbeelding FROM back13_albums WHERE ID_album = " . $_POST['ID'];
   $result = mysqli_query($mysqli, $opdracht);
   $outdatedPic = mysqli_fetch_array($result);

   $Afbeelding = $_FILES['Afbeelding'];
   $tijdelijk = $Afbeelding['tmp_name'];
   $naam = $Afbeelding['name'];
   $type = $Afbeelding['type'];
   $map = "albums/";
   $toegestaan = array("image/jpeg", "image/gif", "image/png", "image/jpg");
   if (in_array($type, $toegestaan)) {

       echo "Verplaats " . $tijdelijk . " naar " . $map . $naam . "...<br/>";

       if (move_uploaded_file($tijdelijk, $map . $naam)) {
          unlink($map . $outdatedPic['Afbeelding']);
       } else {
           echo "Er is iets fout gegaan.<br/>";
       }
   } else {
       echo "Dit bestandtype ($type) is niet toegestaan!<br/>";
   }

   $ID = $_POST['ID'];
   $Title = $_POST['Title'];
   $Jaar = $_POST['Jaar'];
   $Info = $_POST['Info'];

   $query = "UPDATE `back13_albums`
             SET Title = '$Title', Jaar = '$Jaar', Info = '$Info', Afbeelding = '$naam' WHERE ID_album = " . $_GET['id'] . "";

   

   if(mysqli_query($mysqli, $query))
   {
       echo "<p>Album is aangepast!.</p>";
   }
   else
   {
       echo "<p>FOUT bij het aanpassen van Album met id $ID.</p>";
       echo mysqli_error($mysqli);
   }
}

?>


<?php

require 'config.php';
$ID_album = $_GET['id'];
$query = "SELECT ID_album, Title, Jaar, Info, Afbeelding FROM `back13_albums` WHERE ID_album = " . $ID_album;
$resultaat = mysqli_query($mysqli, $query);
if (mysqli_num_rows($resultaat) == 0)
{
    echo "<p>Er is geen Album gevonden met id $ID_album.</p>";
    echo mysqli_error($mysqli);
}

else {
    $rij = mysqli_fetch_array($resultaat);

    echo "<form name='form1' method='post' enctype='multipart/form-data'>";
    echo "<table width='200' border='0'>";
    echo "<tr>";
    echo "<td>ID:</td>";
    echo "<td><input type='number' name='ID' value='" . $rij['ID_album'] . "' readonly></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Title:</td>";
    echo "<td><input type='text' name='Title' value='" . $rij['Title'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Jaar:</td>";
    echo "<td><input type='number' name='Jaar' value='" . $rij['Jaar'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Info:</td>";
    echo "<td><input type='text' name='Info' value='" . $rij['Info'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Afbeelding:</td>";
    echo "<td><input type='file' name='Afbeelding' value='" . $rij['Afbeelding'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>&nbsp</td>";
    echo "<td><input type='submit' name='submit' value='Opslaan'></td>";
    echo "</tr>";
    echo "</table>";
    echo "</form>";
}

echo "<p>Ga terug naar het Album <a href='album_uitlees.php'>Overzicht</a></p>";
?>
