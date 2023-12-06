<?php
include_once 'database/config.php';

session_start();

if(isset($_POST['save-2fa'])){
    $toggleValue = isset($_POST['toggle-2fa']) && $_POST['toggle-2fa'] === 'on' ? 'enabled' : 'disabled';

    $user_id = $_SESSION['user_id'];

    $insert_2fa = "UPDATE `w-users` SET `2fa_status`='$toggleValue' WHERE `user_id`='$user_id'";
    
    $insert_2fa_query = mysqli_query($conn,$insert_2fa);

    if($insert_2fa_query){
        echo 'got';
    }
}   



// if (isset($_POST['user-login'])) {
//     $u_useremail = mysqli_real_escape_string($conn,$_POST["u-useremail"]);
//     $u_password = mysqli_real_escape_string($conn,$_POST["u-pswd"];

//     $check_login = "SELECT * FROM `w-users` WHERE (`u_username` = '$u_useremail' OR `u_email` = '$u_useremail')";
//     $check_login_query = mysqli_query($conn, $check_login);

//     if (mysqli_num_rows($check_login_query) > 0) {
//         $login_row = mysqli_fetch_assoc($check_login_query);
//         if (password_verify($u_password, $login_row['u_password'])) {
//             session_start();
//             $_SESSION['user_id'] = $login_row['user_id'];
//             $_SESSION['user_name'] = $login_row['u_username'];
//             header("location: ../home.php");
//             $message[] = 'Login Successfully';
//         } else {
//             echo "password incorrect";
//             // $message[] = 'Password Incorrect';
//             // header("location: ../myaccount.php");
//         }
//     } else {
//         echo 'no record found';
//     }
// }


?>