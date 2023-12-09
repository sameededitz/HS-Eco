<?php
// $add = ;
session_start();
include_once 'backend/database/config.php';
if (isset($_POST['sell-register'])) {
    $sell_username = mysqli_real_escape_string($conn, $_POST["sell-username"]);
    $sell_email = mysqli_real_escape_string($conn, $_POST["sell-email"]);
    $sell_password = mysqli_real_escape_string($conn, $_POST["sell-password"]);
    $sell_phone = mysqli_real_escape_string($conn, $_POST["sell-phone"]);
    $sell_term = mysqli_real_escape_string($conn, $_POST["sell-terms"]); // Assuming checkbox value is stored as "on"
    $sell_simple_pswd = $sell_password; // Storing plain password for later use
    $sell_passwordhash = password_hash($sell_password, PASSWORD_DEFAULT);

    $message = [];

    if (empty($sell_username) or empty($sell_email) or empty($sell_password) or empty($sell_phone)) {
        $message[] = 'All Fields are required';
    }

    if (!filter_var($sell_email, FILTER_VALIDATE_EMAIL)) {
        $message[] = 'Email Invalid';
    }

    if (strlen($sell_password) < 8) {
        $message[] = 'Password Must Be 8 characters Long';
    }

    if (empty($message)) {
        $check_query = "SELECT * FROM `seller` WHERE `seller_name`= '$sell_username' OR `seller_email`='$sell_email'";
        $check_query_sql = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_query_sql) > 0) {
            $message[] = 'Username or Email Already Exist';
        } else {
            $insert_query = "INSERT INTO `seller`(`seller_name`, `seller_email`, `sell-simple-pswd`, `seller_paswd`, `seller_phone`,`sell-terms`) VAsLUES ('$sell_username','$sell_email','$sell_simple_pswd','$sell_passwordhash','$sell_phone','$sell_term')";
            $insert_query_sql = mysqli_query($conn, $insert_query);

            if ($insert_query_sql) {
                echo "INSERTED";
                header('Location:home.php');
            } else {
                $message[] = 'QUERY Error: ' . mysqli_error($conn);
            }
        }
    } else {
        $message[] = 'Server Error';
    }
}
