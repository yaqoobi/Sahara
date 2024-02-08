<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('registration_logic.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/stylesheets/registration.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../assets/stylesheets/header.css">
    <link rel="stylesheet" href="../assets/stylesheets/footer.css">
    <script src="https://kit.fontawesome.com/8afb80d82d.js" crossorigin="anonymous"></script>
    <title>Registration</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <form class="reg-form" action="registration_logic.php" method="post">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <p>Sign Up with:</p>
                        <div class="social-media">
                            <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa-brands fa-x-twitter"></a>
                            <a href="#" class="fa-brands fa-google"></a>
                        </div>
                        <p>or use your email for registration</p>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="First Name" name="customer_forename" required value="<?php echo $customer_forename ?>">
                        <span class="error-message"> <?php echo isset($_SESSION['customer_forename_err']) ? $_SESSION['customer_forename_err'] : ''; ?> </span>

                        <input type="text" placeholder="Last Name" name="customer_surname" required value="<?php echo $customer_surname ?>">
                        <span class="error-message"> <?php echo isset($_SESSION['customer_surname_err']) ? $_SESSION['customer_surname_err'] : ''; ?> </span>

                        <input type="text" placeholder="Email" name="customer_email" required value="<?php echo $customer_email ?>">
                        <span class="error-message"> <?php echo isset($_SESSION['customer_email_err']) ? $_SESSION['customer_email_err'] : ''; ?> </span>

                        <input type="date" placeholder="Date of Birth" name="date_of_birth" required value="<?php echo $date_of_birth ?>">
                        <span class="error-message"> <?php echo isset($_SESSION['date_of_birth_err']) ? $_SESSION['date_of_birth_err'] : ''; ?> </span>

                        <input type="password" placeholder="Password" name="password" required value="<?php echo $password ?>">
                        <span class="error-message"> <?php echo isset($_SESSION['password_err']) ? $_SESSION['password_err'] : ''; ?> </span>

                        <input type="password" placeholder="Confirm Password" name="confirm_password" required value="<?php echo $confirm_password ?>">
                        <span class="error-message"> <?php echo isset($_SESSION['confirm_password_err']) ? $_SESSION['confirm_password_err'] : ''; ?> </span>

                        <button type="submit" value="submit">Sign Up</button>
                        <?php
                        // Clear session variables after displaying errors
                        unset($_SESSION['customer_forename_err']);
                        unset($_SESSION['customer_surname_err']);
                        unset($_SESSION['date_of_birth_err']);
                        unset($_SESSION['customer_email_err']);
                        unset($_SESSION['password_err']);
                        unset($_SESSION['confirm_password_err']);
                        ?>
                    </div>
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </div>
        </form>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>