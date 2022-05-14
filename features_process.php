<?php 
session_start();

require_once 'config.php'; 

$id = 0;
$update = false;
$name = ''; 
$location = '';

//for an encoded password 
// $encoded = md5($_POST['password']);

//Voeg een gebruiker / record toe 
if (isset($_POST['save'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = md5($_POST['password']);

    $mysqli->query("INSERT INTO Users (email, naam, wachtwoord) VALUES('$email', '$name', '$password')") or 
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: features.php");
}

//Delete een gebruiker / record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM Users WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: features.php");
}

//Laat een gebruiker / record zien wanneer je op edit klikt
// $row name etc. moet nog worden veranderd 
// (bijvoorbeeld) $email = $row['email']; & $password = $row['wachtwoord']
//Edit knop
if (isset($_GET['edit'])) {
    $id = $_GET['edit']; 
    $update = true; 
    $result = $mysqli->query("SELECT * FROM Users WHERE id=$id") or die($mysqli->error());
    
    if (count($result)==1) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
    }
}

//Update een gebruiker / record
// $row name etc. moet nog worden veranderd 
// (bijvoorbeeld) $email = $row['email']; & $password = $row['wachtwoord']
if (isset($_POST['update'])) { 
    $id = $_POST['id'];
    $name = $_POST['name']; 
    $location = $_POST['location'];

    $mysqli->query("UPDATE Users SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error()); 

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}


?>
