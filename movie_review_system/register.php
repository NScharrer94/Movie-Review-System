<?php
require 'dblogin.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//References Chapter 12, Example 12, which reviews form submission handling
	
    try {
        $conn = new PDO($attr, $user, $pass, $opts);

        $username = htmlspecialchars($_POST['username']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email address format.";
        } elseif (strlen($username) < 5) {
            $error = "Username must be at least 5 characters.";
        } elseif ($password !== $confirm_password) {
            $error = "Passwords do not match.";
        } elseif (strlen($password) < 6) {
            $error = "Password must be at least 6 characters.";
        }

        if (empty($error)) {
			// References Chapter 17, Example 17, which reviews Server-side validation
			// Reference: Chapter 11, Example 11, which reviews executing prepared statements and hashing passwords
			
            $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = :username OR email = :email");
            $stmt->execute(['username' => $username, 'email' => $email]);
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                $error = "Username or email already exists. Please try again with different credentials.";
            } else {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
                $stmt->execute([
                    'username' => $username,
                    'email' => $email,
                    'password' => $hashed_password,
                ]);

                echo "<p class='success-message'>This User has been registered successfully! <a href='main_menu.php'>Go to Main Menu</a></p>";
            }
        }
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}

if (!empty($error)) {
    echo "<p class='error-message'>$error</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
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
        <h1>User Registration</h1>
        <form method="post" action="register.php">
            <label for="username">Please Enter Desired Username:</label>
            <input type="text" name="username" required>
            <label for="email">Please Enter Your Email Address:</label>
            <input type="email" name="email" required>
            <label for="password">Please Enter Your Password:</label>
            <input type="password" name="password" required>
            <label for="confirm_password">Please Confirm Your Password:</label>
            <input type="password" name="confirm_password" required>
            <button type="submit">Finish Registration</button>
        </form>
        <a href="main_menu.php" class="button">Back to Main Menu</a>
    </div>
</body>
</html>