<?php
// Reference: Chapter 13, Example 13, which reviews creating sessions

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Main Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #333;
            text-decoration: underline;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-size: 18px;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
        .container {
            margin-top: 50px;
        }
        .logout {
            margin-top: 20px;
            display: inline-block;
            background-color: #ff4d4d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .logout:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <h1>Main Menu</h1>
    <ul>
        <li><a href="list_movies.php">List of Catalogued Movies</a></li>
        <li><a href="add_movie.php">Add A Movie to the Catalogue</a></li>
        <li><a href="search_movies.php">Search Movies in the Catalogue</a></li>
        <li><a href="delete_movies.php">Delete a Movie from the Catalogue</a></li>
        <li><a href="logout.php">Click Here to Logout of this Session</a></li> <!-- Added Logout Option -->
    </ul>
</body>
</html>