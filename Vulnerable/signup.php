<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="loginsignup.scss">
</head>
<body>
    <main>
        <div class="left">
        <form action="signup_process.php" method="post">
        <div class="logo">
            <img src="./bank-icon-logo-design-vector-removebg-preview.png" alt="">
            <h3>PINEDA'S TRUST FUND</h3>
            </div>
            <h4>SIGNUP</h4>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Signup</button>
            <h5>Already have an Account?<a href="login.php">Login</a></h5> 
        </form>
        </div>

        <div class="right">

        </div>

    </main>
</body>
</html>
