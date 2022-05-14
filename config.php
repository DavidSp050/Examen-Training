<?php
// foutmelding zichtbaar maken
error_reporting(E_ALL) ;
ini_set('display_error', '1') ;

$db_hostname = 'localhost:3306' ; //of '127.0.0.1'
$db_username = 'ftp84228' ;
$db_password = 'excecuteorder66' ;
$db_database = 'david' ;

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$mysqli)
{
    echo "Fout: geen connectie naar database. <br/>";
    echo "Errno: " . mysqli_connect_errno() . "<br/>";
    echo "Error: " . mysqli_connect_error() . "<br/>";
    exit;
}

?>
