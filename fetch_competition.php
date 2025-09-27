<?php
include 'db.php';

$sql = "SELECT * FROM competitions ORDER BY start_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Competition</th><th>Start Date</th><th>End Date</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['start_date']."</td>";
        echo "<td>".$row['end_date']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No competitions available.</p>";
}
?>
