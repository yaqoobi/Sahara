<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_email = $_POST['customer_email'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($connect, "SELECT customerID, password_hash FROM customers WHERE customer_email = ?");
    mysqli_stmt_bind_param($stmt, 's', $customer_email);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $customerID, $password_hash);
        mysqli_stmt_fetch($stmt);
        if (password_verify($password, $password_hash)) {
            session_regenerate_id(true);

            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $customerID;
            $_SESSION['username'] = $customer_forename . " " . $customer_surname;

            header("location: index.php");
            exit();
        } else {
            echo "Your password is incorrect.";
        }
    } else {
        echo "User not found.";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
