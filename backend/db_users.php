<?php
include_once 'database/config.php';

session_start();

if(isset($_POST['register-user'])){
    $u_username = $_POST["u-username"];
    $u_email = $_POST["u-email"];
    $u_password = $_POST["u-password"];

    $error_msg = array();
    if(empty($u_username) OR empty($u_email) OR empty($u_password)){
        array_push($error_msg,"All Fields are required");
    }
    if(!filter_var($u_email,FILTER_VALIDATE_EMAIL)){
        array_push($error_msg,"Email Invalid");
    }
    if(strlen($u_password) < 8){
        array_push($error_msg,"Password Must Be 8 characters Long");
    }
    if(count($error_msg)>0){
        foreach ($error_msg as $error_msg) {
            $_SESSION['error_message'] = $error_msg;
        }
    }else{
        echo "working fine ";
    }
}
?>