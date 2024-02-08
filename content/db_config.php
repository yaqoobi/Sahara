<?php
// change to 'development' to enable error reporting
define('ENVIRONMENT', 'production');

if (ENVIRONMENT === 'production') {
    // Disable error reporting for production
    error_reporting(0);
    ini_set('display_errors', '0');
} else {
    // Enable error reporting for development
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

// Database configuration
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kf7013';
$connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
    if (ENVIRONMENT === 'production') {
        die("Connection failed. Please try again later.");
    } else {
        die("Connection failed: " . mysqli_connect_error());
    }
}
