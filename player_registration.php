<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO players (username, password, score) VALUES ('$username', '$password', 0)";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location='login.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>📝 Sign Up</h1>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="email" name="email" placeholder="Email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <input type="submit" value="Register">
    </form>
    <br>
    <a href="index.php" class="btn">⬅ Back</a>
  </div>
</body>
</html>


