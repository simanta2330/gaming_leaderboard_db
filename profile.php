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
    <title>Profile</title>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #1e1e1e; color: #f0f0f0; text-align:center; padding:50px; }
        h1 { color: #ffd700; }
        a { color: #00ccff; text-decoration: none; font-size: 1.2em; }
        .profile-box { background-color: #2a2a2a; padding: 20px; border-radius: 12px; display:inline-block; }
    </style>
</head>
<body>
    <h1>👤 Profile Page</h1>
    <div class="profile-box">
        <p><strong>Player Name:</strong> <?php echo htmlspecialchars($player_name); ?></p>
        <p><strong>Email:</strong> player@example.com</p>
        <p><strong>Score:</strong> 0</p>
    </div>
    <p><a href="player_dashboard.php">⬅ Back to Dashboard</a></p>
</body>
</html>
