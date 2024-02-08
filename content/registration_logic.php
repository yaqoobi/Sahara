<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "db_config.php";
$_SESSION['customer_forename'] = "";
$_SESSION['customer_surname'] = "";
$_SESSION['date_of_birth'] = "";
$_SESSION['customer_email'] = "";
$_SESSION['password'] = "";
$_SESSION['confirm_password'] = "";
$_SESSION['customer_forename_err'] = "";
$_SESSION['customer_surname_err'] = "";
$_SESSION['date_of_birth_err'] = "";
$_SESSION['customer_email_err'] = "";
$_SESSION['password_err'] = "";
$_SESSION['confirm_password_err'] = "";

function isPasswordStrong($password)
{
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChar = preg_match('@[^\w]@', $password);

    return $uppercase && $lowercase && $number && $specialChar && strlen($password) >= 8;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_forename = htmlspecialchars($_POST['customer_forename'], ENT_QUOTES, 'UTF-8');
    $customer_surname = htmlspecialchars($_POST['customer_surname'], ENT_QUOTES, 'UTF-8');
    $date_of_birth = $_POST['date_of_birth'];
    $customer_email = htmlspecialchars($_POST['customer_email'], ENT_QUOTES, 'UTF-8');
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($customer_forename)) {
        $_SESSION['customer_forename_err'] = "Please enter your first name.";
    } else {
        $customer_forename = trim($_POST["customer_forename"]);
    }
    if (empty($customer_surname)) {
        $_SESSION['customer_surname_err'] = "Please enter your last name.";
    } else {
        $customer_surname = trim($_POST["customer_surname"]);
    }
    if (empty($date_of_birth)) {
        $_SESSION['date_of_birth_err'] = "Please enter your date of birth.";
    } else {
        $date_of_birth = trim($_POST["date_of_birth"]);
    }
    if (empty($customer_email) || !filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['customer_email_err'] = "Please enter valid email address.";
    } else {
        $customer_email = trim($_POST["customer_email"]);
    }
    if (empty($password)) {
        $_SESSION['password_err'] = "Please enter your password.";
    } elseif (!isPasswordStrong($password)) {
        $_SESSION['password_err'] = "Password should be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.";
    } else {
        $password = trim($_POST["password"]);
    }
    if (empty($confirm_password)) {
        $_SESSION['confirm_password_err'] = "Please confirm your password.";
    } elseif ($password != $confirm_password) {
        $_SESSION['confirm_password_err'] = "Passwords do not match.";
    }


    if (empty($_SESSION['customer_forename_err']) && empty($_SESSION['customer_surname_err']) && empty($_SESSION['date_of_birth_err']) && empty($_SESSION['customer_email_err']) && empty($_SESSION['password_err']) && empty($_SESSION['confirm_password_err'])) {
        if ($_SESSION['password_err'] != $_SESSION['confirm_password_err']) {
            $_SESSION['confirm_password_err'] = "Passwords do not match.";
        } else {
            $sql = "INSERT INTO customers (customer_forename, customer_surname, customer_email, date_of_birth, password_hash) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($connect, $sql);
            if (!$stmt) {
                die("Error in SQL statement: " . mysqli_error($connect));
            } else {
                echo "Statement prepared successfully\n";
            }

            if ($stmt = mysqli_prepare($connect, $sql)) {
                mysqli_stmt_bind_param($stmt, "sssss", $param_customer_forename, $param_customer_surname, $param_email, $param_date_of_birth, $param_password);
                $param_customer_forename = $customer_forename;
                $param_customer_surname = $customer_surname;
                $param_date_of_birth = $date_of_birth;
                $param_email = $customer_email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['loggedin'] = true;
                    // $_SESSION['id'] = $customerID;
                    // $_SESSION['username'] = $customer_forename . " " . $customer_surname;
                    header("location: index.php");
                } else {
                    header("location: registration.php");
                }
                mysqli_stmt_close($stmt);
            }
        }
    } else {
        // Redirect back to the registration page
        header("location: registration.php");
    }
}
// mysqli_close($connect);
