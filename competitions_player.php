<?php
session_start();
include 'db.php';

// Check if player is logged in
if(!isset($_SESSION['player'])){
    header("Location: login.php");
    exit;
}

$player = $_SESSION['player'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🎯 Competitions</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #fdf6e3; text-align: center; padding: 50px; }
        h1 { color: #ff9900; margin-bottom: 20px; }
        table { margin: 20px auto; border-collapse: collapse; width: 80%; box-shadow: 0 0 8px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; }
        th { background-color: #ffcc66; color: #333; }
        tr:nth-child(even) { background-color: #fff8e1; }
        a.back { display: inline-block; margin-top: 20px; text-decoration: none; color: #fff; background-color: #ff9900; padding: 10px 20px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>🎯 Competitions</h1>

    <?php
    $sql = "SELECT c.id AS comp_id, c.name AS comp_name, g.name AS game_name, c.start_date, c.end_date
            FROM competition c
            LEFT JOIN games g ON g.id = c.game_id
            ORDER BY c.start_date ASC";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        echo "<table>
                <tr>
                    <th>Competition ID</th>
                    <th>Competition Name</th>
                    <th>Game Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>";
        while($row = mysqli_fetch_assoc($result)){
            $game = $row['game_name'] ?? 'No game found';
            echo "<tr>
                    <td>{$row['comp_id']}</td>
                    <td>".htmlspecialchars($row['comp_name'])."</td>
                    <td>".htmlspecialchars($game)."</td>
                    <td>{$row['start_date']}</td>
                    <td>{$row['end_date']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No competitions available.</p>";
    }
    ?>

    <a href="player_dashboard.php" class="back">⬅ Back to Dashboard</a>
</body>
</html>
