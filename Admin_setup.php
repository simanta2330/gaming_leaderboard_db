<?php
// setup_admins.php
include 'db.php';

$admins = [
    ['SimantaMondal', 'simanta2330'],
    ['JannatulAdan', 'adan2440']
];

foreach ($admins as $a) {
    $username = $a[0];
    $plain = $a[1];
    $hash = password_hash($plain, PASSWORD_DEFAULT);

    // Insert or update if exists
    $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)
        ON DUPLICATE KEY UPDATE password = VALUES(password)");
    $stmt->bind_param("ss", $username, $hash);

    if ($stmt->execute()) {
        echo "✅ Admin '{$username}' added/updated successfully.<br>";
    } else {
        echo "❌ Error for '{$username}': " . $conn->error . "<br>";
    }
}

echo "<br>Done. Now try logging in with your admin_login.php file.";
?>

