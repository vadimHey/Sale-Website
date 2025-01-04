<?php

$servername = "localhost";
$username = "mrvadeuj_users";
$password = "";
$dbname = "mrvadeuj_users";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection lost". mysqli_connection_error());
}
?>