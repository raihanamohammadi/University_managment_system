<?php
$host = 'localhost';
$user = 'root';  // XAMPP default is 'root'
$password = '';  // XAMPP default has no password
$dbname = 'uni_db';

// Create a new database connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
