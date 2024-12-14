<?php
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
    <title>Search Movies</title>
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
        form {
            margin: 20px auto;
            max-width: 400px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search for Movies</h1>
        <form method="post" action="search_movies.php">
            <label for="search_field">Search By:</label>
            <select name="search_field" required>
                <option value="title">Title</option>
                <option value="genre">Genre</option>
                <option value="release_year">Release Year</option>
                <option value="director">Director</option>
                <option value="rating">Rating</option>
            </select>
            <label for="search_value">Search Value:</label>
            <input type="text" name="search_value" required>
            <button type="submit">Search</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
				// Reference: chapter 11, Example 11, which reviews database queries as well as constructing dynamic queries
				// Reference: Chapter 12, Example 12, which reviews form input validations
				
                $pdo = new PDO($attr, $user, $pass, $opts);
                $field = filter_var($_POST['search_field'], FILTER_SANITIZE_STRING);
                $value = htmlspecialchars($_POST['search_value']);

                if ($field === 'rating') {
                    $query = "SELECT * FROM movies WHERE $field = :value";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':value', $value, PDO::PARAM_STR);
                } else {
                    $query = "SELECT * FROM movies WHERE $field LIKE :value";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':value', $likeValue, PDO::PARAM_STR);
                    $likeValue = "%$value%";
                }

                $stmt->execute();

                echo "<table>";
                echo "<tr><th>ID</th><th>Title</th><th>Genre</th><th>Release Year</th><th>Director</th><th>Rating</th></tr>";
                while ($row = $stmt->fetch()) {
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
				//References Chapter 11, Example 11, which reviews handling database errors
				
                echo "<p>Error: " . $e->getMessage() . "</p>";
            }
        }
        ?>
        <a href="main_menu.php" class="button">Back to Main Menu</a>
    </div>
</body>
</html>