<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <div class="header-wrapper">
        <div class="logo-wrapper">
            <a href="./home.php"><img class="logo" src="../assets/images/logo2.png" alt="logo"></a>
        </div>
        <nav class="navbar">
            <ul class="menu">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./events.php">Events</a></li>
                <li><a href="#">Book Event</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="./credits.php">Credits</a></li>
            </ul>
        </nav>
        <div class="usr">
            <?php if (isset($_SESSION['loggedin'])) { ?>
                <a class="btn" href='./profile.php'>Profile</a>
                <a class="btn" href='./logout.php'>Sign Out</a>
                <a class="btn" href='./shopping_card.php'>Shopping Cart</a>
            <?php } else { ?>
                <a class="btn" href='./login.php'>Login</a>
                <a class="btn" href='./registration.php'>Sign up</a>
            <?php } ?>
        </div>
    </div>
</header>