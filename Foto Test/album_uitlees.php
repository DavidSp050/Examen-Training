<?php
session_start();
require 'config.php';

$opdracht = "SELECT * FROM back13_albums";

if ($resultaat = mysqli_query($mysqli, $opdracht))
{
    echo "<table border='1' cellspacing='0' cellpadding='3'>";
    echo "<tr><th>Title:</th><th>Band:</th><th>Jaar:</th>";
    echo "<th>Info:</th><th>Detail</th>";
    if ($_SESSION['Level'] == 1) {
        echo "<td><b>Wijzig</b></td>";
        echo "<td><b>Verwijderen</b></td>";
    }

    while ($albums = mysqli_fetch_array($resultaat))
    {
        echo "<tr>";
        echo "<td>" . $albums['Title'] . "</td>";
        $idBand = $albums['Band'];
        $zoekband = "SELECT Naam FROM back12_bands WHERE ID_band = " . $idBand;
        $resultaatBand = mysqli_query($mysqli, $zoekband);
        $band = mysqli_fetch_array($resultaatBand);
        echo "<td>" . $band['Naam'] . "</td>";
        echo "<td>" . $albums['Jaar'] . "</td>";
        echo "<td>" . $albums['Info'] . "</td>";
        echo "<td><a href='album_detail.php.php?id=" . $albums['ID_album'] . "'>Details</a></td>";
        if ($_SESSION['Level'] == 1)
        {
            echo "<td><a href='album_wijzig.php.php?id=" . $albums['ID_album'] . "'>Wijzigen</a></td>";
            echo "<td><a href='album_verwijder.php.php?id=" . $albums['ID_album'] . "'>Verwijder</a></td>";
        }
        echo "</tr>";
        echo "</tr>";
    }
    echo "</table>";
}
echo "<p><a href='album_toevoeg_verwerk.php'>TOEVOEG album</a></p>";
echo "<p><a href='band_uitlees.php'>TERUG</a></p>";
?>