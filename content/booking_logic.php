<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('db_config.php');

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Handle booking form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_event'])) {
    header("Location: booking_confirmation.php");
    exit();
}
