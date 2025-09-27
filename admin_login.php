<?php
session_start();

if (isset($_SESSION['admin_name'])) {
    header("Location: admin_dashboard.php");
    exit();
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $admin_user = "SimantaMondal";
    $admin_pass = "simanta2330";

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION['admin_name'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid admin username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(135deg, #2813b7ff, #1a1a1a);
            color: #f0f0f0;
            text-align: center;
            padding-top: 100px;
        }
        h2 { color: #ff4500; }
        form {
            background: #222;
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
            background-color: #ff4500;
            color: #fff;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 1em;
        }
        input[type=submit]:hover {
            background-color: #ff6347;
        }
        .error { color: #ff6347; margin-top: 15px; }
        a { color: #00ccff; text-decoration: none; display:block; margin-top: 10px; }
    </style>
</head>
<body>
    <h2>👨‍💻 Admin Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Login">
        <?php if ($error != "") { echo "<div class='error'>$error</div>"; } ?>
        <a href="index.php">⬅ Back to Home</a>
    </form>
</body>
</html>





