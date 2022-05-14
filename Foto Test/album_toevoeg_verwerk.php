<?php
session_start();

if (!isset($_SESSION['Gebruikersnaam']))
{
    header("location:inlog.php");
}
else
{
    echo "<p>Welkom, " . $_SESSION['Gebruikersnaam'] . "</p>";
    if ($_SESSION[Level] == 0)
    {
        echo "<p>U heeft geen rechten om deze pagina te bekijken.</p>";
        echo "<p><a href='band_uitlees.php'>Ga terug</a></p>";
        exit();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>album Toevoegen</title>
</head>
<body>
<?php
if (isset($_POST['voegalbumtoe'])) {
    require 'config.php';

    $Title = $_POST['Title'];
    $Band = $_POST['Band'];
    $Jaar = $_POST['Jaar'];
    $Info = $_POST['Info'];
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

    $query = "INSERT INTO back13_albums
                  VALUES (NULL, '$Title', '$Band', '$Jaar', '$Info', '$Afbeelding')";
    if (mysqli_query($mysqli, $query)) {
        echo "<p>Band $Title is toegevoegd.</p>";
        header('Location: album_uitlees.php');
    } else {
        echo "<p>FOUT bij toevoegen</p>";
        echo mysqli_error($mysqli);
    }

}
?>
<fieldset>
    <form method="post">
        <legend>Album toevoegen</legend>
        Title: <input type="text" name="Title"><br>
        Band:
        <select name="Band">
            <?php
            require ('config.php');
            $opdracht = "SELECT * FROM back12_bands";
            $resultaat = mysqli_query($mysqli, $opdracht);
            while ($band = mysqli_fetch_array($resultaat))
            {
                echo "<option value='" . $band['ID_band'] . "'>";
                echo $band['Naam'];
                echo "</option>";
            }
            ?></select><br>
        Jaar: <input type="number" name="Jaar"><br>
        Info: <input type="text" name="Info"><br>
        <?php
        echo "<td><input type='file' name='Afbeelding' value='" . $rij['Afbeelding'] . "'></td>";
        ?>
        <input type="submit" value="Voeg leden toe" name="voegalbumtoe">
    </form>
</fieldset>


</body>
</html>