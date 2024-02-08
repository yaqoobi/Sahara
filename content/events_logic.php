<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('db_config.php');

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

        // Free the result set
        mysqli_free_result($result);
    }

    return $events;
}

$events = getEventsFromDatabase($connect);
