<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'ias2');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//gawa ng table sa mysql named ias2 