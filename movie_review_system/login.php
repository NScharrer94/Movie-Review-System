<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// References Chapter 12, Example 12, which reviews form submission handling
	
    require 'dblogin.php';

    try {
		// Reference: Chapter 11, Example 11, which reviews database queries and prepared statements
		// Reference: Chapter 12, Example 12, which reviews form input validations
		
        $conn = new PDO($attr, $user, $pass, $opts);

        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT password FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $row = $stmt->fetch();

        if ($row) {
			// Reference: Chapter 11. Example 11, which reviews hashing passwords and handling database errors
			// Reference: Chapter 13, Example 13, which reviews creating sessions
			
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['username'] = $username;
                header("Location: main_menu.php");
                exit();
            } else {
                $error = "Error: This is an invalid username or password.";
            }
        } else {
            $error = "Error: This is an invalid username or password.";
        }
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}

if (!empty($error)) {
    echo "<p style='color: red; font-weight: bold;'>$error</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        <h1>Login</h1>
		<!-- References Chapter 12, Example 12, which reviews handling form submissions -->
		
        <form action="login.php" method="POST">
            <label for="username">Please Enter the Registered Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Please Enter Your Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <a href="register.php" class="button">Register</a>
    </div>
</body>
</html>