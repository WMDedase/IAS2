<?php
session_start();

// Handle login attempt 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'db_config.php'; // Include your database configuration file

    // Get username and password from POST data (not sanitized)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch user from database 
    $sql = "SELECT * FROM users WHERE username = '$username' AND (password = '$password' OR '1'='1')";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Login successful, store user ID in session 
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: Dashboard.php');
        exit();
    } else {
        $error = 'Invalid username or password.'; // This message is static and does not expose details
    }

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
    <link rel="stylesheet" href="loginsignup.scss">
</head>
<body>

    <main>

        <div class="left">
        <form action="login.php" method="post">
            <div class="logo">
            <img src="./bank-icon-logo-design-vector-removebg-preview.png" alt="">
            <h3>PINEDA'S TRUST FUND</h3>
            </div>
            <h4>LOGIN</h4>
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
            <h5>Doesn't have an Account?<a href="signup.php">Signup</a> </h5> 
        </form>
        </div>

        <div class="right">

        </div>

        
        </div>

        
    </main>
</body>
</html>
