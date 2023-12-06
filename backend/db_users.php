<?php
include_once 'database/config.php';

session_start();

if(isset($_POST['save-2fa'])){
    $toggleValue = isset($_POST['toggle-2fa']) && $_POST['toggle-2fa'] === 'on' ? 'enabled' : 'disabled';

    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE `w-users` SET `2fa_status`='$toggleValue' WHERE `user_id`='$user_id'";
    
    $result = mysqli_query($conn,$sql);

    if($result){
        header('location:../opt-verify.php');
    }
}   



?>