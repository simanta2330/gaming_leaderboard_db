<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}
include('config.php'); // DB connection

$message = '';

// Fetch all scores with player usernames
$scores = $conn->query("
    SELECT s.id, s.score, p.username 
    FROM scores s
    JOIN players p ON s.player_id = p.id
    ORDER BY s.id DESC
");

if(isset($_POST['update'])){
    $score_id = $_POST['score_id'];
    $new_score = $_POST['new_score'];

    $stmt = $conn->prepare("UPDATE scores SET score=? WHERE id=?");
    $stmt->bind_param("ii", $new_score, $score_id);

    if($stmt->execute()){
        $message = "Score updated successfully!";
        header("Location: update_score.php"); // refresh to show updated scores
        exit();
    } else {
        $message = "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Score</title>
    <style>
        body { font-family: Arial; background: #f0f2f5; }
        .container { max-width: 700px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);}
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: center; border-bottom: 1px solid #ddd; }
        input[type="number"] { width: 80px; padding:5px; border-radius:5px; border:1px solid #ccc; }
        input[type="submit"] { padding:5px 10px; border:none; border-radius:5px; background:#4A90E2; color:#fff; cursor:pointer; }
        input[type="submit"]:hover { background:#357ABD; }
        .message { text-align:center; color:green; }
        a { text-decoration: none; color: #4A90E2; display:block; text-align:center; margin-top:10px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Update Scores</h2>
    <?php if($message != '') echo "<div class='message'>$message</div>"; ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Player</th>
            <th>Score</th>
            <th>Update</th>
        </tr>
        <?php while($row = $scores->fetch_assoc()): ?>
        <tr>
            <form method="POST">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td>
                    <input type="number" name="new_score" value="<?php echo $row['score']; ?>" required>
                    <input type="hidden" name="score_id" value="<?php echo $row['id']; ?>">
                </td>
                <td><input type="submit" name="update" value="Update"></td>
            </form>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="admin_dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>

