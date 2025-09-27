<?php
include 'db.php'; // your database connection

// Fetch players sorted by score descending
$sql = "SELECT username, score FROM players ORDER BY score DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🏆 Competition Leaderboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #ff9900;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 50%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #ffcc66;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #fff8e1;
        }
        a.back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #ff9900;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>🏆 Competition Leaderboard</h1>

    <?php if(mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>Rank</th>
                <th>Player</th>
                <th>Score</th>
            </tr>
            <?php 
            $rank = 1;
            while($row = mysqli_fetch_assoc($result)): 
            ?>
                <tr>
                    <td><?php echo $rank++; ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo $row['score']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No leaderboard data available.</p>
    <?php endif; ?>

    <a href="index.php" class="back">⬅ Back to Home</a>
</body>
</html>

