<?php
// Reference: Chapter 13, Example 13, which reviews creating sessions

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require_once 'dblogin.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>List Movies</title>
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
        .container {
            margin-top: 50px;
            padding: 20px;
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
        .button {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .button:hover {
            background-color: #0056b3;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Movie List</h1>
        <?php
        try {
		// reference: Chapter 11, Example 11, which reviews database queries and loops
		
            $pdo = new PDO($attr, $user, $pass, $opts);
            $query = "SELECT * FROM movies";
            $stmt = $pdo->query($query);

            echo "<table>";
            echo "<tr><th>ID</th><th>Title</th><th>Genre</th><th>Release Year</th><th>Director</th><th>Rating</th></tr>";

            while ($row = $stmt->fetch()) {
				// Reference: Chapter 12, Example 12, which reviews form input validations
				
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['movie_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['genre']) . "</td>";
                echo "<td>" . htmlspecialchars($row['release_year']) . "</td>";
                echo "<td>" . htmlspecialchars($row['director']) . "</td>";
                echo "<td>" . htmlspecialchars($row['rating']) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } catch (PDOException $e) {
			//Reference: chapter 11, Example 11, which reviews error handling
			
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
        ?>
        <a href="main_menu.php" class="button">Back to Main Menu</a>
    </div>
</body>
</html>