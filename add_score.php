<?php
include 'db.php';

if (isset($_POST['player_id']) && isset($_POST['added_score'])) {
    $player_id = $_POST['player_id'];
    $added_score = $_POST['added_score'];

    $update = "UPDATE players SET score = score + ? WHERE id = ?";
    $stmt = $conn->prepare($update);
    $stmt->bind_param("ii", $added_score, $player_id);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?success=1");
        exit();
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>







