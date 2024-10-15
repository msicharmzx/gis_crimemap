<?php
$host = 'localhost'; // Database host
$db = 'gis_login'; // Database name
$user = 'root'; // Database user (default for XAMPP)
$pass = ''; // Database password (default for XAMPP is empty)

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hash the password
$username = 'testuser';
$password = password_hash('password', PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "User created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
