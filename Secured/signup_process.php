<?php
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement with placeholders
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    // Initialize a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement as strings
    $stmt->bind_param("sss", $username, $email, $password);

    // Execute the prepared statement
    if ($stmt->execute()) {
        header('Location: login.php'); // Redirect to login page after successful signup
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    // Close prepared statement
    $stmt->close();

    // Close database connection
    $conn->close();
}

