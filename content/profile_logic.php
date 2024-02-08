<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('db_config.php');


$customer_forename = $customer_surname = $customer_email = $date_of_birth = '';
$customer_forename_err = $customer_surname_err = $customer_email_err = $date_of_birth_err = '';

$stmt = mysqli_prepare(
    $connect,
    "SELECT customer_forename, customer_surname, date_of_birth, customer_email FROM customers WHERE customerID = ?"
);
$_SESSION['id'] =
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['id']);
mysqli_stmt_execute($stmt);
if (mysqli_stmt_errno($stmt)) {
    die('Error: ' . mysqli_stmt_error($stmt));
}
mysqli_stmt_bind_result($stmt, $customer_forename, $customer_surname, $date_of_birth, $customer_email);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
