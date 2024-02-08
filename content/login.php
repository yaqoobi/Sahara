<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('login_logic.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylesheets/login.css">
    <link rel="stylesheet" href="../assets/stylesheets/header.css">
    <link rel="stylesheet" href="../assets/stylesheets/footer.css">
    <script src="https://kit.fontawesome.com/8afb80d82d.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main class="login-wrapper">
        <form class="login-form" action="login_logic.php" method="post">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <p>Login with:</p>
                        <div class="social-media">
                            <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa-brands fa-x-twitter"></a>
                            <a href="#" class="fa-brands fa-google"></a>
                        </div>
                        <p>or use your email to log in</p>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Email" name="customer_email" required>
                        <span class="error"> <?php echo $customer_email_err; ?> </span>
                        <input type="password" placeholder="Password" name="password" required>
                        <span class="error"> <?php echo $password_err; ?> </span>
                        <button type="submit" value="submit">Login</button>
                    </div>
                    <p>Don't have an account? <a href="registration.php">Sign Up</a></p>
                </div>
            </div>
        </form>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>