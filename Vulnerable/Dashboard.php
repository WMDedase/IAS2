<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.Scss">
</head>
<body>
    <header>
    <div class="logo">
            <img src="./bank-icon-logo-design-vector-removebg-preview.png" alt="">
            <h3>PINEDA'S TRUST FUND</h3>
            </div>
    <div class="prof">
    <img src="./profile.png" alt="">        
    <h3><?php echo htmlspecialchars($username); ?></h3>
    <a href="Logout.php"><button>Logout</button></a>
    </div>

    </header>

    <section class="summary">
            <h2>Account Summary</h2>
            <div     class="summary-details">
                <p><strong>Account Number:</strong> XXXX-XXXX</p>
                <p><strong>Type of Trust Fund:</strong> XYZ Trust</p>
                <p><strong>Current Balance:</strong> $10,999.99</p>
            </div>
        </section>
        <section class="transactions">
            <h2>Transaction History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-07-01</td>
                        <td>Deposit</td>
                        <td>+$500.00</td>
                    </tr>
                    <tr>
                        <td>2024-06-28</td>
                        <td>Withdrawal</td>
                        <td>-$200.00</td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="performance">
            <h2>Performance Overview</h2>
            <div class="performance-details">
                <p><strong>Year-to-Date Return:</strong> +X.XX%</p>
                <p><strong>Asset Allocation:</strong></p>
                <ul>
                    <li>Stocks: XX%</li>
                    <li>Bonds: XX%</li>
                    <li>Cash: XX%</li>
                </ul>
            </div>
        </section>
        <footer>
            <p>&copy; 2024 Your Trust Fund Company. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
