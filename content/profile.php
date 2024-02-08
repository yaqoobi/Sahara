<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('profile_logic.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylesheets/profile.css">
    <link rel="stylesheet" href="../assets/stylesheets/header.css">
    <link rel="stylesheet" href="../assets/stylesheets/footer.css">
    <title>Profile</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="profile-card">
            <div class="profile-details">
                <h2>User Profile</h2>
                <form action="update_profile.php" method="post">
                    <input type="text" placeholder="First Name" name="customer_forename" required value="<?php echo $customer_forename ?>">
                    <input type="text" placeholder="Last Name" name="customer_surname" required value="<?php echo $customer_surname ?>">
                    <input type="text" placeholder="Email" name="customer_email" required value="<?php echo $customer_email ?>">
                    <input type="date" placeholder="Date of Birth" name="date_of_birth" required value="<?php echo date('Y-m-d', strtotime($date_of_birth)); ?>">

                    <input type="password" placeholder="New Password" name="new_password">
                    <input type="password" placeholder="Confirm New Password" name="confirm_new_password">

                    <button type="submit">Update Profile</button>
                </form>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>