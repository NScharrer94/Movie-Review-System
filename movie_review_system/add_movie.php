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
    <title>Add Movie</title>
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
        form {
            margin: 20px auto;
            max-width: 300px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
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
	<!-- Reference: Chapter 12, Example 12, which reviews handling form submissions -->
	
        <h1>Add a New Movie</h1>
        <form method="post" action="add_movie.php">
            <label for="title">Title:</label>
            <input type="text" name="title" required>
            <label for="genre">Genre:</label>
            <input type="text" name="genre">
            <label for="release_year">Release Year:</label>
            <input type="number" name="release_year" min="1900" max="2100">
            <label for="director">Director:</label>
            <input type="text" name="director">
            <label for="rating">Rating (1 - 5):</label>
            <input type="number" name="rating" step="1" min="1" max="5">
            <button type="submit">Add Movie</button>
        </form>
        <a href="main_menu.php" class="button">Back to Main Menu</a>
    </div>

    <?php
	    // Reference: Chapter 11, Example 11, which reviews prepared statements

    require_once 'dblogin.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = new PDO($attr, $user, $pass, $opts);
        $stmt = $pdo->prepare("INSERT INTO movies (title, genre, release_year, director, rating) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            htmlspecialchars($_POST['title']),
            htmlspecialchars($_POST['genre']),
            intval($_POST['release_year']),
            htmlspecialchars($_POST['director']),
            floatval($_POST['rating'])
        ]);
        echo "<p>The movie has been added successfully.</p>";
    }
    ?>
</body>
</html>