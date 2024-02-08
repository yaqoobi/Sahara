<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('db_config.php');;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if the user is updating the password
    if (!empty($_POST['new_password'])) {
        // Validate and hash the new password
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        // Update the password in the database
        $updatePasswordStmt = mysqli_prepare($connect, "UPDATE customers SET password_hash = ? WHERE customerID = ?");
        // Check if the prepare statement was successful
        if (!$updatePasswordStmt) {
            die('Error in preparing password update statement: ' . mysqli_error($connect));
        }
        mysqli_stmt_bind_param($updatePasswordStmt, 'si', $new_password, $_SESSION['id']);
        mysqli_stmt_execute($updatePasswordStmt);
        // Check if the bind was successful
        if (!mysqli_stmt_execute($updatePasswordStmt)) {
            die('Error in updating password: ' . mysqli_error($connect));
        }
        mysqli_stmt_close($updatePasswordStmt);
    }

    // Update other profile information in the database
    $updateProfileStmt = mysqli_prepare($connect, "UPDATE customers SET customer_forename = ?, customer_surname = ?, date_of_birth = ?, customer_email = ? WHERE customerID = ?");
    if (!$updateProfileStmt) {
        die('Error in preparing profile update statement: ' . mysqli_error($connect));
    }
    mysqli_stmt_bind_param($updateProfileStmt, 'ssssi', $_POST['customer_forename'], $_POST['customer_surname'], $_POST['date_of_birth'], $_POST['customer_email'], $_SESSION['id']);
    mysqli_stmt_execute($updateProfileStmt);
    if (!mysqli_stmt_execute($updateProfileStmt)) {
        die('Error in updating profile: ' . mysqli_error($connect));
    }
    mysqli_stmt_close($updateProfileStmt);

    // Redirect to the profile page 
    header("Location: profile.php");
    exit();
}
