<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('event_details_logic.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylesheets/event_details.css">
    <link rel="stylesheet" href="../assets/stylesheets/header.css">
    <link rel="stylesheet" href="../assets/stylesheets/footer.css">
    <title>Event Details</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="event-details">
            <h2><?= $eventDetails['event_title']; ?> Details</h2>
            <div class="event-details-content">
                <img src="<?= $eventDetails['event_imagepath']; ?>" alt="Event Image">
                <p>Date: <?= $eventDetails['event_date']; ?></p>
                <p>Description: <?= $eventDetails['description']; ?></p>
                <p>Price per Person: $<?= $eventDetails['price_per_person']; ?></p>

                <form method="post" action="">
                    <label for="number_people">Number of People:</label>
                    <input type="number" name="number_people" id="number_people" required>

                    <p>Total Amount: $<span id="totalAmount">0.00</span></p>
                    <button type="submit" name="book_event">Book Now</button>
                </form>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>

    <script>
        document.getElementById('number_people').addEventListener('input', function() {
            var pricePerPerson = <?= $eventDetails['price_per_person']; ?>;
            var numberOfPeople = parseInt(this.value);
            var totalAmount = pricePerPerson * numberOfPeople;
            document.getElementById('totalAmount').innerText = totalAmount.toFixed(2);
        });
    </script>
</body>

</html>