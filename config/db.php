<?php
$host = 'localhost';  // Update with your database host
$dbname = 'auction_db';  // Your DB name
$username = 'root';  // Your DB username
$password = '';  // Your DB password

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
