<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}
$admin_name = $_SESSION['admin_name'];

include 'db.php';
// Fetch all players
$players = $conn->query("SELECT id, username, score FROM players");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #141E30, #243B55);
            margin: 0;
            padding: 0;
            color: #fff;
        }
        .header {
            background: #1f4068;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
            color: #f9f9f9;
        }
        .logout-btn {
            background: #e43f5a;
            color: #fff;
            padding: 8px 18px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s ease;
        }
        .logout-btn:hover {
            background: #d63447;
        }
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }
        .dashboard-title {
            text-align: center;
            font-size: 26px;
            margin-bottom: 20px;
            color: #f9f871;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #1b1b2f;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.4);
        }
        th, td {
            padding: 14px;
            text-align: center;
        }
        th {
            background: #162447;
            color: #f5f5f5;
            font-size: 16px;
        }
        tr:nth-child(even) {
            background: #1f4068;
        }
        tr:nth-child(odd) {
            background: #1b1b2f;
        }
        td {
            color: #f0f0f0;
        }
        input[type="number"] {
            width: 70px;
            padding: 6px;
            border-radius: 6px;
            border: none;
            text-align: center;
        }
        button {
            background: #21e6c1;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #1dd1a1;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>👑 Welcome, <?php echo htmlspecialchars($admin_name); ?>!</h2>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="container">
        <h2 class="dashboard-title">Admin Dashboard – Manage Player Scores</h2>
        
        <table>
            <tr>
                <th>Player</th>
                <th>Current Score</th>
                <th>Add Score</th>
            </tr>
            <?php while($row = $players->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['score']; ?></td>
                <td>
                    <form method="post" action="add_score.php" style="display:flex; justify-content:center; gap:8px;">
                        <input type="hidden" name="player_id" value="<?php echo $row['id']; ?>">
                        <input type="number" name="added_score" required>
                        <button type="submit">Add</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>
