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
    <title>Delete a Movie</title>
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
        .success-message {
            color: green;
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
    <script>
	// Reference: Chapter 17, Example 17, which reviews confirmation dialogue using Javascript
	
        function confirmDeletion() {
            return confirm("Are you sure you want to delete this movie?");
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Delete a Movie From the Catalogue</h1>
        <?php
        try {
			// References Chapter 11, Example 11 which reviews database queries and prepared statements
			// Reference: Chapter 12, Example 12, which reviews form input validations
			
            $conn = new PDO($attr, $user, $pass, $opts);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $movie_id = filter_var($_POST['movie_id'], FILTER_VALIDATE_INT);

                if ($movie_id) {
                    $stmt = $conn->prepare("DELETE FROM movies WHERE movie_id = :movie_id");
                    $stmt->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);

                    if ($stmt->execute()) {
                        echo $stmt->rowCount() > 0 
                            ? "<p class='success-message'>Movie deleted successfully.</p>" 
                            : "<p class='error-message'>There is no movie found with the given ID. Please try again with an existing movie ID.</p>";
                    } else {
                        echo "<p class='error-message'>Failed to execute command. Please try agaian.</p>";
                    }
                } else {
                    echo "<p class='error-message'>There is no movie found with the given ID. Please try again with an existing movie ID.</p>";
                }
                echo '<a href="main_menu.php" class="button">Return to Main Menu</a>';
            } else {
                ?>
                <form method="post" action="delete_movies.php" onsubmit="return confirmDeletion();">
                    <label for="movie_id">Movie ID:</label>
                    <input type="number" name="movie_id" required>
                    <button type="submit">Delete</button>
                </form>
                <a href="main_menu.php" class="button">Back to Main Menu</a>
                <?php
            }
        } catch (PDOException $e) {
            echo "<p class='error-message'>Database connection failed: " . $e->getMessage() . "</p>";
        }
        ?>
    </div>
</body>
</html>