<?php
    session_start(); // Ensure the session is started before destroying it
    session_destroy(); // Destroy the session
    header("Location: login.php"); // Redirect to the login page
    exit();
?>
