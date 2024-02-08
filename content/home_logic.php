<!-- this is to add the shopping cartd functionality in future -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('db_config.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    // Get event ID from the form
    $eventID = $_POST['event_id'];

    // add the shopping card functionality in future
}

// Function to get events from the database
function getEventsFromDatabase($conn)
{
    $events = [];

    // SQL query to retrieve events
    $sql = "SELECT * FROM events";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Fetch events and store them in an array
        while ($row = mysqli_fetch_assoc($result)) {
            $events[] = $row;
        }

        mysqli_free_result($result);
    }

    return $events;
}

$events = getEventsFromDatabase($connect);
?>