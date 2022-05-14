<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>
<?php
require 'config.php';

$ID_album = $_GET['id'];

$query = "SELECT * FROM `back13_albums` WHERE ID_album = " . $ID_album;

$resultaat = mysqli_query($mysqli, $query);

if($resultaat = mysqli_query($mysqli, $query))
{
    echo "<table border=1 cellspacing='0' cellpadding='3'>";
    echo "<tr><th>Titel:</th><th>Jaar:</th>";
    echo "<th>Info:</th><th>Afbeelding:</th><th>Band:</th></tr>";

    while($album = mysqli_fetch_array($resultaat))
    {
        echo "<tr><td>" . $album['Title'] . "</td>";
        echo "<td>" . $album['Jaar'] . "</td>";
        echo "<td>" . $album['Info'] . "</td>";
        if (file_exists("albums/" . $album['Afbeelding']))
        {
            echo "<td><img src='albums/" . $album['Afbeelding'] . "' width='200px' /></td>";
        }
        else
        {
            echo "<td>Geen Afbeelding</td>";
        }

        $ID_band = $album['Band'];
        $zoekBand = "SELECT Naam FROM back12_bands WHERE ID_band = " . $ID_band;
        $resultaatBand = mysqli_query($mysqli, $zoekBand);
        $band = mysqli_fetch_array($resultaatBand);

        echo "<td>" . $band['Naam'] . "</td>";

    }
    echo "</table>";
}

echo "<p>Terug naar het <a href='album_uitlees.php'>overzicht</a></p>"

?>
</body>
</html>
