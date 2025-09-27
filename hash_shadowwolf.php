<?php
include 'db.php';

$password = "wolfwolf"; // plain password
$hashed = password_hash($password, PASSWORD_DEFAULT);

$conn->query("UPDATE players SET password='$hashed' WHERE username='ShadowWolf'");
echo "Password updated!";
?>
