<?php
session_start();

if (!isset($_SESSION['username'])) {

    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Menu</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    <ul>
        <li><a href="list.php">List Reviews</a></li>
        <li><a href="add.html">Add Review</a></li>
        <li><a href="search.html">Search Review</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>