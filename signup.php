<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
        }
        .form-container {
            margin: 60px auto;
            padding: 30px;
            width: 400px;
            background: rgba(0,0,0,0.7);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }
        h2 {
            margin-bottom: 20px;
            text-shadow: 0 0 20px #00ffea;
        }
        input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
        }
        input[type="submit"] {
            background: #4caf50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>📝 Create Account</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="submit" name="signup" value="Sign Up">
    </form>
    <p>Already have an account? <a href="login.php" style="color:#ffeb3b;">Login</a></p>
</div>
</body>
</html>

<?php
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT * FROM players WHERE username='$username'");
    if ($check->num_rows > 0) {
        echo "<script>alert('⚠ Username already taken!');</script>";
    } else {
        $conn->query("INSERT INTO players (username, password, score) VALUES ('$username', '$password', 0)");
        echo "<script>alert('✅ Account created! Login now.'); window.location='login.php';</script>";
    }
}
?>

