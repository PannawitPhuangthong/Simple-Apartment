<?php
$servername = "localhost";
$dbname = "apartment";

$conn = new mysqli('localhost','root','','apartment');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
