<?php
// References Chapter 13 Example 13, which reviews starting, destroying, and redirecting sessions
session_start();
session_unset();
session_destroy();
header('Location: login.php');
?>