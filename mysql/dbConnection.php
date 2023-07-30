<?php
// Database credentials
$hostname = 'localhost'; // Replace with your database host (usually 'localhost')
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$database = 'shopify_magic_app'; // Replace with your database name

// Create a database connection
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Connected successfully
echo "Connected to MySQL successfully.";

// Perform your database operations here...
// Close the database connection when done
$mysqli->close();
?>
