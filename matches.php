<?php
session_start();
if (!isset($_SESSION['player_name'])) {
    header("Location: login.php");
    exit();
}
$player_name = $_SESSION['player_name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Matches</title>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #1e1e1e; color: #f0f0f0; text-align:center; padding:50px; }
        h1 { color: #ffd700; }
        a { color: #00ccff; text-decoration: none; font-size: 1.2em; }
    </style>
</head>
<body>
    <h1>⚔️ Matches Page</h1>
    <p>Welcome, <?php echo htmlspecialchars($player_name); ?>!</p>
    <p>This is a placeholder page for your matches.</p>
    <p><a href="player_dashboard.php">⬅ Back to Dashboard</a></p>
</body>
</html>

