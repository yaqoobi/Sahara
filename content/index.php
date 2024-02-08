<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('db_config.php');
require_once('home_logic.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/stylesheets/home.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../assets/stylesheets/header.css">
    <link rel="stylesheet" href="../assets/stylesheets/footer.css">
    <script src="https://kit.fontawesome.com/8afb80d82d.js" crossorigin="anonymous"></script>
    <title>Home</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="banner">
            <h1>Welcome To Sahara</h1>
        </section>
        <section class="events">
            <h2 class="big-header">Events</h2>
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
        <section class="contact-us">
            <h2 class="big-header">Contact Us</h2>
            <div class="contact-us-details">
                <p>If you have any inquiries, feel free to get in touch with us. </p>
                <form action="submit_contact_form.php" method="post">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Your Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </section>

        <section class="about-us">
            <h2 class="big-header">About Us</h2>
            <div class="about-us-content">
                <p>Welcome to Sahara. We are dedicated to creating a wonderful experience for you and your loved ones.
                    Our passion for event organising and entertainment is what drives us to deliver outstanding
                    experience for our guests.</p>
                <p>With a team of professional event organizers and entertainers, we organize a range of events from
                    family-friendly events music performances and nature events.</p>
                <p>Explore upcoming events and add them to your cart to book your place. We look forward to bringing joy and happiness to you.</p>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>