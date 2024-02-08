<?php
include('booking_confirmation_logic.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylesheets/booking_confirmation.css">
    <link rel="stylesheet" href="../assets/stylesheets/header.css">
    <link rel="stylesheet" href="../assets/stylesheets/footer.css">
    <title>Booking Confirmation</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="booking-confirmation">
            <h2>Booking Confirmation</h2>
            <div class="confirmation-details">
                <p>Thank you for booking with us!</p>
                <p>Your booking details:</p>
                <ul>
                    <li>Event: <?= $eventDetails['event_title']; ?></li>
                    <li>Date: <?= $eventDetails['event_date']; ?></li>
                    <li>Number of People: <?= $bookingDetails['number_people']; ?></li>
                    <li>Total Booking Cost: $<?= $bookingDetails['total_booking_cost']; ?></li>
                </ul>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>