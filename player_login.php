<?php include "config.php"; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
    <h2>🔑 Player Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="submit" name="login" value="Login">
    </form>
    <p>No account? <a href="signup.php">Sign Up</a></p>
</div>
</body>
</html>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = $conn->query("SELECT * FROM players WHERE username='$username'");
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['player'] = $row['id'];
            echo "<script>alert('Login Successful!'); window.location='leaderboard.php';</script>";
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }
}
?>

