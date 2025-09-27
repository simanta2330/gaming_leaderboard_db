<?php
session_start();
include('config.php'); // Database connection

// Identify user if logged in
$user_name = '';
if(isset($_SESSION['player_name'])){
    $user_name = $_SESSION['player_name'];
} elseif(isset($_SESSION['admin_name'])){
    $user_name = $_SESSION['admin_name'];
}

// Fetch competitions from DB
$competitions = $conn->query("
    SELECT c.id, c.name, c.start_date, c.end_date, g.name as game_name
    FROM competition c
    LEFT JOIN games g ON c.game_id = g.id
    ORDER BY c.start_date ASC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Competitions & Games</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: #4A90E2;
            color: #fff;
        }
        .header h2 {
            margin: 0;
        }
        .logout-btn {
            background-color: #ff4d4d;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .logout-btn:hover {
            background-color: #e60000;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 28%;
            padding: 25px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        .card h3 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
        .card p {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
        }
        a.card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Competitions & Games</h2>
        <?php if($user_name): ?>
            <div>
                <span style="margin-right:15px; color:#fff;">Welcome, <?php echo htmlspecialchars($user_name); ?>!</span>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="container">
        <?php if($competitions->num_rows > 0): ?>
            <?php while($row = $competitions->fetch_assoc()): ?>
                <a class="card-link" href="competition_details.php?id=<?php echo $row['id']; ?>">
                    <div class="card">
                        <h3><?php echo $row['name']; ?></h3>
                        <p><strong>Game:</strong> <?php echo $row['game_name'] ?? "TBA"; ?></p>
                        <p><strong>Start:</strong> <?php echo $row['start_date'] ?? "TBA"; ?></p>
                        <p><strong>End:</strong> <?php echo $row['end_date'] ?? "TBA"; ?></p>
                    </div>
                </a>
            <?php endwhile; ?>
        <?php else: ?>
            <p style="text-align:center; color:#333;">No competitions available yet.</p>
        <?php endif; ?>
    </div>
    <br>
    <a href="index.php" class="btn">⬅ Back</a>
</body>
</html>









