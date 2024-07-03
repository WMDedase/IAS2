<?php
session_start();

// Handle login attempt 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'db_config.php'; // Include your database configuration file

    // Get username and password from POST data (not sanitized)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch user from database (vulnerable to SQL injection)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Login successful, store user ID in session (not vulnerable)
        $_SESSION['user_id'] = $user['id'];
        header('Location: Dashboard.php');
        exit();
    } else {
        $error = 'Invalid username or password.'; // This message is static and does not expose details
    }

    // Close database connection (not vulnerable)
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form action="login.php" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <?php if (isset($error)) : ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <button type="submit">Login</button>
            <a href="signup.php">Signup</a>
        </form>
        
    </main>
</body>
</html>
