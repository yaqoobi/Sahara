<?php
include('booking_logic.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylesheets/booking.css">
    <link rel="stylesheet" href="../assets/stylesheets/header.css">
    <link rel="stylesheet" href="../assets/stylesheets/footer.css">
    <title>Booking</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="booking-form">
            <h2>Booking Form</h2>
            <form method="post" action="">
                <label for="number_people">Number of People:</label>
                <input type="number" name="number_people" id="number_people" required>

                <label for="booking_notes">Booking Notes:</label>
                <textarea name="booking_notes" id="booking_notes"></textarea>

                <button type="submit" name="book_event">Book Now</button>
            </form>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>