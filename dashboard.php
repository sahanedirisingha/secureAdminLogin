<?php
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

// Logout logic
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include your CSS and JavaScript files here -->
</head>
<body>
    <!-- Your dashboard content goes here -->
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <p>This is your dashboard content.</p>

    <?php  

    echo $_SESSION['username'];


    ?>

    <!-- Logout button -->
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>

