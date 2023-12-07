<?php
include_once 'backend/database/config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location: home.php");
}

// if(!isset($_SESSION['user_otp_sent'])){

// }else{
//     $otp_sent = $_SESSION['user_otp_sent'];
//     $otp_set = $_SESSION['user_otp_set'];
//     if($otp_sent == "true" && $otp_set == "false"){
//         echo "
//             <script>
//                 window.location.href = 'otp-verify.php';
//             </script>
//         ";
//     }
// }

if (isset($_POST['save-2fa'])) {

    $toggleValue = isset($_POST['toggle-2fa']) && $_POST['toggle-2fa'] === 'on' ? 'enabled' : 'disabled';
    $user_id = $_SESSION['user_id'];

    $select = "SELECT `2fa_status` FROM `w-users` WHERE `user_id`='$user_id'";
    $select_query = mysqli_query($conn, $select);
    $row2 = mysqli_fetch_assoc($select_query);

    if ($row2['2fa_status'] == $toggleValue) {
        $success_msg[] = ['text' => 'Nothing Changed', 'icon' => 'info'];
    } else {

        // $sql = "UPDATE `w-users` SET `2fa_status`='$toggleValue' WHERE `user_id`='$user_id'";
        // $result = mysqli_query($conn, $sql);

        if ($toggleValue == 'enabled') {
            $otp_code = random_int(100000, 999999);
            $_SESSION['user_otp'] = $otp_code;
            $_SESSION['user_otp_set'] = 'false';
            $_SESSION['user_otp_sent'] = 'false';
            $user_id = $_SESSION['user_id'];
            $sql2 = "SELECT `u_email` FROM `w-users` WHERE `user_id` = '$user_id'";
            $result = mysqli_query($conn, $sql2);
            if ($result) {
                $res = mysqli_fetch_assoc($result);
            }

            $otp_ses = $_SESSION['user_otp'];
            $to = $res['u_email'];
            $subject = "Verification Code";

            $msg = "
                <h2>Your OTP Code is $otp_ses</h2>
                <br><br>
                <h4>It'll Expire in 2 minutes</h4>
            ";

            // Debugging statements
            // echo "Before smtp_mailer<br>";
            // var_dump($_SESSION['user_otp_sent']);

            if (smtp_mailer($to, $subject, $msg)) {
                $_SESSION['user_otp_sent'] = 'true';
                $succes_msg[] = ['text' => 'OTP Sent, Please Check Email', 'icon' => 'success'];
                // Add a delay or use JavaScript to delay the redirect
                sleep(2); // This will delay the redirect by 2 seconds
                header("location: otp-verify.php");
            } else {
                // $message[] = 'OTP Sent Error';
            }

            // echo "After smtp_mailer<br>";
            // var_dump($_SESSION['user_otp_sent']);
        } else {
            $sql = "UPDATE `w-users` SET `2fa_status`='$toggleValue' WHERE `user_id`='$user_id'";
            $result = mysqli_query($conn, $sql);
            // header("location: profile.php");
        }
    }
}


// if (isset($_POST['save-2fa'])) {

//     $toggleValue = isset($_POST['toggle-2fa']) && $_POST['toggle-2fa'] === 'on' ? 'enabled' : 'disabled';
//     $user_id = $_SESSION['user_id'];

//     $select = "SELECT `2fa_status` FROM `w-users` WHERE `user_id`='$user_id'";
//     $select_query = mysqli_query($conn, $select);
//     $row2 = mysqli_fetch_assoc($select_query);

//     if ($row2['2fa_status'] == $toggleValue) {
//         $succes_msg[] = ['text' => 'Nothing Changed', 'icon' => 'info'];
//     } else {

//         $sql = "UPDATE `w-users` SET `2fa_status`='$toggleValue' WHERE `user_id`='$user_id'";
//         $result = mysqli_query($conn, $sql);

//         if ($toggleValue == 'enabled') {
//             $otp_code = random_int(100000, 999999);
//             $_SESSION['user_otp'] = $otp_code;
//             $_SESSION['user_otp_set'] = 'false';
//             $_SESSION['user_otp_sent'] = 'false';
//             $user_id = $_SESSION['user_id'];
//             $sql2 = "SELECT `u_email` FROM `w-users` WHERE `user_id` = '$user_id'";
//             $result = mysqli_query($conn, $sql2);
//             if ($result) {
//                 $res = mysqli_fetch_assoc($result);
//             }

//             $otp_ses = $_SESSION['user_otp'];
//             $to = $res['u_email'];
//             $subject = "Verification Code";

//             $msg = "
//                     <h2>Your OTP Code is $otp_ses</h2>
//                     <br><br>
//                     <h4>It'll Expire in 2 minutes</h4>
//             ";

//             if (smtp_mailer($to, $subject, $msg)) {
//                 $_SESSION['user_otp_sent'] = 'true';
//                 $succes_msg[] = "OTP Sent, Please Check Your Mail";
//             }
//         } else {
//             header("location: profile.php");
//         }
//     }
// }




$sql = "SELECT `u_email`,`u_password` FROM `w-users` WHERE `user_id` = '$_SESSION[user_id]'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    if (isset($_POST['submit-pass'])) {
        $u_password = mysqli_real_escape_string($conn, $_POST["pswd"]);
        if (empty($u_password)) {
            $message[] = 'All Fields are required';
        } else {
            if (mysqli_num_rows($result) > 0) {
                if (password_verify($u_password, $row['u_password'])) {
                    $succes_msg[] = ['text' => 'Password Correct', 'icon' => 'success'];
                } else {
                    $message[] = "password incorrect";
                }
            } else {
                $message[] = "No Result Found ";
            }
        }
    }
}

$user_id = $_SESSION['user_id'];

$select = "SELECT `2fa_status` FROM `w-users` WHERE `user_id`='$user_id'";
$select_query = mysqli_query($conn, $select);
if ($select_query) {
    $row_status = mysqli_fetch_assoc($select_query);
}

?>
<?php
include_once("include/navbar.php")
?>
<div class="container container-240 shop-collection">
    <ul class="breadcrumb">
        <li><a href="#">Account</a></li>
        <li class="active">Proflie</li>
    </ul>
    <div class="filter-collection-left hidden-lg hidden-md" style="margin-bottom: 55px; border-radius: 8px;">
        <a class="btn" style="border-radius: 5px;">Profile</a>
    </div>
    <div class="row shop-colect" style="margin-bottom: 90px;">
        <div class="col-md-3 col-sm-3 col-xs-12 col-left collection-sidebar" id="filter-sidebar">
            <div class="close-sidebar-collection hidden-lg hidden-md">
                <span>proflie</span><i class="icon_close ion-close"></i>
            </div>
            <div class="filter filter-cate">
                <ul class="wiget-content v2">
                    <li class="active"><a href="#">My Account</a></li>
                    <li class="active"><a href="#">My Orders</a></li>
                    <li class="active"><a href="#">Address Book</a></li>
                    <li class="active"><a href="#">My Wishlist</a></li>
                    <li class="active"><a href="#">Messages</a></li>
                    <li class="active"><a href="#">Accout Details</a></li>
                    <li class="active"><a href="2-step-verify.php">2-Step Verification</a></li>
                    <li class="active"><a href="./backend/db_user_logout.php">Logout</a></li>

                </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12 collection-list">
            <div class="blog-comment-bottom" style="margin: auto; max-width:480px">
                <div class="cmt-title text-center abs">
                    <h1 class="oval-bd">2-Step Verification</h1>
                </div>
                <div class="cmt-form">
                    <?php
                    if (isset($succes_msg)) {
                    ?>
                        <form method="post" action="2-step-verify.php">
                            <div class="login-form">
                                <div class="form-group">
                                    <div class="row" style="display: flex; justify-content:center;">
                                        <div class="col-md-6 col-xs-12" style="display: flex; align-items:center; justify-content:center;">
                                            <h4 class="oval-text-bd text-center">Status</h4>
                                        </div>
                                        <div class="col-md-4 col-xs-12" style="display: flex; align-items:center; justify-content:center;">
                                            <label class="switch">
                                                <?php
                                                if ($row_status['2fa_status'] == 'enabled') {
                                                ?>
                                                    <input type="checkbox" name="toggle-2fa" checked class="checkbox hidden">
                                                <?php
                                                } else {
                                                ?>
                                                    <input type="checkbox" name="toggle-2fa" class="checkbox hidden">
                                                <?php
                                                }
                                                ?>
                                                <div class="slider"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="save-2fa" class="btn btn-submit btn-gradient">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php
                    } else {
                    ?>
                        <form method="post">
                            <div class="login-form">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                            <h3 class="oval-text-bd text-center"><?php echo $row['u_email'] ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                            <input type="text" name="pswd" class="form-control bdr" placeholder="Enter Your Password *">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="submit-pass" class="btn btn-submit btn-gradient">
                                        SUBMIT
                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?php
include_once("include/footer.php");
?>