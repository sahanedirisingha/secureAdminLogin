<?php
session_start();
// Change these values according to your database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin_panel";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Valid login
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        // Invalid login
        echo "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();
?>

