<?php
require_once 'dblogin.php';

try {
    $conn = new PDO($attr, $user, $pass, $opts);
    echo "Database has been connected successfully.<br>";

    $conn->exec("CREATE TABLE IF NOT EXISTS movies (
        movie_id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        genre VARCHAR(100),
        release_year INT,
        director VARCHAR(100),
        rating FLOAT
    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS users (
        username VARCHAR(50) PRIMARY KEY,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )");

    echo "Tables have been created successfully.<br>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>