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

// Retrieve the customer details from the session
$customerID = $_SESSION['id'];

// Retrieve the latest booking details for the logged-in customer
$latestBookingSQL = "SELECT * FROM booking WHERE customerID = '$customerID' ORDER BY bookingID DESC LIMIT 1";
$result = mysqli_query($connect, $latestBookingSQL);

if ($result && mysqli_num_rows($result) > 0) {
    $bookingDetails = mysqli_fetch_assoc($result);
} else {
    // No booking found
    echo "Error: Unable to retrieve booking details.";
    exit();
}

// Get event details for the booked event
$eventID = $bookingDetails['eventID'];
$eventDetailsSQL = "SELECT * FROM events WHERE eventID = '$eventID'";
$resultEvent = mysqli_query($connect, $eventDetailsSQL);

if ($resultEvent && mysqli_num_rows($resultEvent) > 0) {
    $eventDetails = mysqli_fetch_assoc($resultEvent);
} else {
    // No event found
    echo "Error: Unable to retrieve event details.";
    exit();
}
