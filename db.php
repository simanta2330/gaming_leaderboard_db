<?php
// Database connection settings
$servername = "localhost";   // XAMPP default
$dbusername = "root";        // Default MySQL user
$dbpassword = "";            // Default MySQL password is empty in XAMPP
$dbname = "game_leaderboard_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

