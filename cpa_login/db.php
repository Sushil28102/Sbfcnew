<?php
// db.php - Database connection file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cpa_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>