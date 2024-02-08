<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/stylesheets/shopping_card.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../assets/stylesheets/header.css">
    <link rel="stylesheet" href="../assets/stylesheets/footer.css">
    <title>Shopping Cart</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="shopping-cart">
            <h2>Shopping Cart</h2>
            <div class="cart-items">
                <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                // Check if the shopping cart session variable is set
                if (isset($_SESSION['shopping_cart'])) {
                    foreach ($_SESSION['shopping_cart'] as $eventID) {
                        echo "Event ID: $eventID<br>";
                    }
                } else {
                    echo "Your shopping cart is empty.";
                }
                ?>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>