<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('events_logic.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/stylesheets/events.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../assets/stylesheets/header.css">
    <link rel="stylesheet" href="../assets/stylesheets/footer.css">
    <title>Events</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="events">
            <nav class="event-categories">
                <a href="#">Family</a>
                <a href="#">Music Performance</a>
                <a href="#">Nature</a>
                <a href="#">Dance & entertainment</a>
            </nav>
            <div class="events-details">
                <div class="card-group">
                    <?php foreach ($events as $event) : ?>
                        <div class="card">
                            <div class="card-details">
                                <div class="card-header"><?= $event['event_title']; ?></div>
                                <div class="card-date">
                                    <p><?= $event['event_date']; ?></p>
                                </div>
                                <div class="card-content">
                                    <p><?= $event['description']; ?></p>
                                </div>
                                <div class="card-button">
                                    <button type="button">ADD</button>
                                    <button type="button">
                                        <a href="event_details.php?eventID=<?= $event['eventID']; ?>">MORE DETAILS</a>
                                    </button>
                                </div>
                            </div>
                            <img src="<?= $event['event_imagepath']; ?>" class="card-img" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>