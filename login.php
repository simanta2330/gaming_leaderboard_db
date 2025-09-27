<?php
session_start();
include("config.php"); // Database connection

// If player already logged in, redirect
if (isset($_SESSION['player_name'])) {
    header("Location: player_dashboard.php");
    exit();
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare statement to prevent SQL injection
    $sql = "SELECT * FROM players WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['player_name'] = $username; // store session
            header("Location: player_dashboard.php"); // redirect
            exit();
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "Invalid username or password!";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Player Login</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1e1e1e, #121212);
            color: #f0f0f0;
            text-align: center;
            padding-top: 100px;
        }
        h2 { color: #ffd700; }
        form {
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 15px;
            display: inline-block;
        }
        input[type=text], input[type=password] {
            padding: 10px;
            width: 250px;
            margin: 10px 0;
            border-radius: 8px;
            border: none;
        }
        input[type=submit] {
            padding: 12px 25px;
            background-color: #005fa3;
            color: #f0f0f0;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 10px;
        }
        input[type=submit]:hover { background-color: #0077cc; }
        .error { color: #ff4500; margin-top: 15px; }
        a { color: #00ccff; text-decoration: none; display: block; margin-top: 10px; }
    </style>
</head>
<body>

    <h2>Player Login</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Login">
        <?php if ($error != "") { echo "<div class='error'>$error</div>"; } ?>
        <a href="signup.php">📝 Sign Up</a>
    </form>
     <br>
    <a href="index.php" class="btn">⬅ Back</a>
</body>
</html>



