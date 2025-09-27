<?php
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Game Leaderboard</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #073c2aff, #121212);
            color: #f0f0f0;
        }

        header {
            text-align: center;
            padding: 100px 20px 50px 20px;
        }
        header h1 {
            font-size: 3em;
            color: #ffd700; 
            margin: 0;
            text-shadow: 2px 2px #000;
        }
        header p {
            font-size: 1.5em;
            margin-top: 15px;
            color: #f0f0f0;
        }

        /* Admin login button in top-right corner */
        .admin-login {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .admin-login a {
            background-color: #ff4500;
            color: #fff;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .admin-login a:hover {
            background-color: #ff6347;
        }

        /* Main buttons */
        .buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 25px;
            margin-top: 50px;
        }
        .btn {
            background-color: #005fa3;
            color: #f0f0f0;
            border: none;
            padding: 20px 35px;
            font-size: 1.2em;
            cursor: pointer;
            border-radius: 15px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .btn:hover {
            background-color: #0077cc;
            transform: translateY(-5px);
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: #0077cc;
            margin-top: 80px;
        }
    </style>
</head>
<body>

    <!-- Admin login button in top-right corner -->
    <div class="admin-login">
        <a href="admin_login.php">👨‍💻 Admin Login</a>
    </div>

    <header>
        <h1>🎮 Welcome to the Game Leaderboard 🎮</h1>
        <p>Track scores, join competitions, and see who's on top!</p>
    </header>

    <div class="buttons">
        <a href="signup.php" class="btn">📝 Sign Up</a>
        <a href="login.php" class="btn">🔑 Login</a>
        <a href="leaderboard.php" class="btn">🏆 View Leaderboard</a>
        <a href="competitions.php" class="btn">🎯 Competitions & Games</a>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Game Leaderboard
    </footer>

</body>
</html>






