<?php
include_once 'database/config.php';

if (isset($_POST['user-login'])) {
    $u_useremail = $_POST["u-useremail"];
    $u_password = $_POST["u-pswd"];

    $check_login = "SELECT * FROM `w-users` WHERE (`u_username` = '$u_useremail' OR `u_email` = '$u_useremail')";
    $check_login_query = mysqli_query($conn, $check_login);

    if (mysqli_num_rows($check_login_query) > 0) {
        $login_row = mysqli_fetch_assoc($check_login_query);
        if (password_verify($u_password, $login_row['u_password'])) {
            session_start();
            $_SESSION['user_id'] = $login_row['user_id'];
            $_SESSION['user_name'] = $login_row['u_username'];
            header("location: ../home.php");
            $message[] = 'Login Successfully';
        } else {
            echo "password incorrect";
            // $message[] = 'Password Incorrect';
            // header("location: ../myaccount.php");
        }
    } else {
        echo 'no record found';
    }
}
?>