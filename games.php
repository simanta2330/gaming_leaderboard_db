<?php
include 'db.php'; // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🎮 Games</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #fdf6e3; text-align: center; padding: 20px; }
        h1 { color: #ff9900; }
        table { margin: 20px auto; border-collapse: collapse; width: 80%; box-shadow: 0 0 8px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; }
        th { background-color: #ffcc66; color: #333; }
        tr:nth-child(even) { background-color: #fff8e1; }
        a.back { display: inline-block; margin-top: 20px; text-decoration: none; color: #fff; background-color: #ff9900; padding: 10px 20px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>🎮 Games</h1>

    <?php
    $sql = "SELECT g.id, g.name AS game_name, c.name AS competition_name 
            FROM games g 
            JOIN competitions c ON g.competition_id=c.id
            ORDER BY g.id ASC";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        echo "<table>
                <tr><th>ID</th><th>Game Name</th><th>Competition</th></tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>".htmlspecialchars($row['game_name'])."</td>
                    <td>".htmlspecialchars($row['competition_name'])."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No games available.</p>";
    }
    ?>

    <a href="index.php" class="back">⬅ Back to Home</a>
</body>
</html>
