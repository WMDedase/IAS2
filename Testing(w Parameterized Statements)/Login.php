<?php
session_start();

// Handle login attempt 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'db_config.php'; // Include your database configuration file
    
    // Get username and password from POST data (sanitized)
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Prepare SQL statement
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    
    // Initialize a prepared statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters to the prepared statement as strings
    $stmt->bind_param("ss", $username, $password);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Get the result set
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        // Fetch the user data
        $user = $result->fetch_assoc();
        
        // Store user ID in session
        $_SESSION['user_id'] = $user['id'];
        
        // Redirect to Dashboard.php
        header('Location: Dashboard.php');
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
    
    // Close prepared statement
    $stmt->close();
    
    // Close database connection
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
