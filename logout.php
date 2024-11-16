<?php
session_start();
session_destroy(); // Destroy the session
header("Location: halaman login.php"); // Redirect to the login page
exit();
?>
