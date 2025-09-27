<?php
// player_dashboard.php
// Start session and check if player is logged in
session_start();
if (!isset($_SESSION['player_name'])) {
    header("Location: player_dashboard.php");
    exit();
}

$player_name = $_SESSION['player_name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Player Dashboard</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1e1e1e, #121212);
            color: #f0f0f0;
            text-align: center;
        }

        header {
            background-color: #0077cc;
            padding: 40px 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        header p {
            margin-top: 10px;
            font-size: 1.2em;
        }

        .buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 25px;
            margin: 50px 0;
        }

        .btn {
            background-color: #005fa3;
            color: #f0f0f0;
            border: none;
            padding: 20px 40px;
            font-size: 1.2em;
            border-radius: 15px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .btn:hover {
            background-color: #0077cc;
            transform: translateY(-5px);
        }

        .logout {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ff4500;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .logout:hover {
            background-color: #ff6347;
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: #0077cc;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <!-- Logout button -->
    <a href="logout.php" class="logout">Logout</a>

    <header>
        <h1>Welcome, <?php echo htmlspecialchars($player_name); ?>!</h1>
        <p>Choose what you want to do next:</p>
    </header>

    <div class="buttons">
        <a href="leaderboard.php" class="btn">🏆 View Leaderboard</a>
        <a href="competitions.php" class="btn">🎯 Competitions</a>
        <a href="matches.php" class="btn">⚔️ Matches</a>
        <a href="profile.php" class="btn">👤 Profile</a>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Game Leaderboard
    </footer>

</body>
</html>

