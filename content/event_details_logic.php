<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('db_config.php');

// Function to get details of a specific event from the database
function getEventDetails($conn, $eventID)
{
    $eventDetails = [];
    // SQL query to retrieve details of a specific event
    $sql = "SELECT * FROM events WHERE eventID = $eventID";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Fetch event details
        $eventDetails = mysqli_fetch_assoc($result);
        // Free the result set
        mysqli_free_result($result);
    }

    return $eventDetails;
}

// Function to calculate the total amount based on the number of tickets
function calculateTotalAmount($pricePerPerson, $numberOfPeople)
{
    return $pricePerPerson * $numberOfPeople;
}

// Check if eventID is set in the URL
if (isset($_GET['eventID'])) {
    $eventID = $_GET['eventID'];
    $eventDetails = getEventDetails($connect, $eventID);
} else {
    // Redirect to events.php if eventID is not set
    header("Location: events.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_event'])) {
    if (isset($_SESSION['loggedin'])) {
        // Process the booking
        $numberOfPeople = $_POST['number_people'];
        $totalAmount = calculateTotalAmount($eventDetails['price_per_person'], $numberOfPeople);
        // Insert booking into the database
        $customerID = $_SESSION['id'];
        $bookingNotes = $_POST['booking_notes'] ?? '';

        $insertBookingSQL = "INSERT INTO booking (eventID, customerID, number_people, total_booking_cost, booking_notes)
                             VALUES ('$eventID', '$customerID', '$numberOfPeople', '$totalAmount', '$bookingNotes')";
        $result = mysqli_query($connect, $insertBookingSQL);

        if ($result) {
            // Booking successful, redirect to a confirmation page
            header("Location: booking_confirmation.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    } else {
        // Redirect to login.php if not logged in
        header("Location: login.php");
        exit();
    }
}
