<?php
session_start();
include 'db.php';

// Only logged-in players can submit scores
if(!isset($_SESSION['player_id'])){
    header("Location: player_login.php");
    exit();
}

$message = '';

if(isset($_POST['submit'])){
    $score = intval($_POST['score']); // Ensure score is numeric
    $player_id = $_SESSION['player_id'];

    // Insert score into database
    if($conn->query("INSERT INTO scores (player_id, score) VALUES ($player_id, $score)")){
        $message = "Score submitted successfully!";
    } else {
        $message = "Error submitting score!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Submit Score</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Submit Your Score</h2>

    <form method="POST" action="">
        <input type="number" name="score" placeholder="Enter your score" required>
        <button type="submit" name="submit">Submit Score</button>
    </form>

    <?php if($message != ''): ?>
        <p style="text-align:center; color:#ffcc00;"><?= $message ?></p>
    <?php endif; ?>

    <p style="text-align:center;">
        <a href="leaderboard.php">Back to Leaderboard</a> | 
        <a href="logout.php">Logout</a>
    </p>
</div>

</body>
</html>

