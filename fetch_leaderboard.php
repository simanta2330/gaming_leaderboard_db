<?php
include 'db.php';

$sql = "SELECT username, score FROM players ORDER BY score DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Rank</th><th>Player</th><th>Score</th></tr>";
    $rank = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$rank."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['score']."</td>";
        echo "</tr>";
        $rank++;
    }
    echo "</table>";
} else {
    echo "<p>No leaderboard data available.</p>";
}
?>



