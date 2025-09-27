<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <style>
        body { font-family: 'Poppins', sans-serif; text-align:center; background:linear-gradient(135deg,#43cea2,#185a9d); color:white; }
        h1 { text-shadow:0 0 25px #00ffea; }
        table { width:80%; margin:20px auto; border-collapse:collapse; background:white; color:black; border-radius:10px; overflow:hidden; }
        th, td { padding:15px; border-bottom:1px solid #ddd; }
        th { background:#185a9d; color:white; }
        tr:nth-child(even) { background:#f2f2f2; }
        .button { display:inline-block; padding:12px 20px; background:#ff9800; color:white; border-radius:8px; text-decoration:none; margin-top:20px; }
        .button:hover { background:#e65100; }
    </style>
</head>
<body>
<h1>🏆 Game Leaderboard 🏆</h1>
<table>
    <tr>
        <th>Rank</th>
        <th>Player</th>
        <th>Score</th>
    </tr>
    <?php
    $result = $conn->query("SELECT username, score FROM players ORDER BY score DESC LIMIT 20");
    $rank = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>$rank</td>
                <td>{$row['username']}</td>
                <td>{$row['score']}</td>
              </tr>";
        $rank++;
    }
    ?>
</table>
<a href="index.php" class="button">⬅ Back</a>
</body>
</html>




