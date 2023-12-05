<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location: home.php");
}
?>
<?php
include_once 'backend/database/config.php';
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
                    $succes_msg[] = "Password Correct";
                } else {
                    $message[] = "password incorrect";
                }
            } else {
                $message[] = "No Result Found ";
            }
        }
    }
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
                        <form method="post">
                            <div class="login-form">
                                <div class="form-group">
                                    <div class="row" style="display: flex; justify-content:center;">
                                        <div class="col-md-6 col-xs-12" style="display: flex; align-items:center; justify-content:center;">
                                            <h4 class="oval-text-bd text-center">2-Step Verification</h4>
                                        </div>
                                        <div class="col-md-4 col-xs-12" style="display: flex; align-items:center; justify-content:center;">
                                            <label class="switch">
                                                <input type="checkbox" class="checkbox hidden">
                                                <div class="slider"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="submit" class="btn btn-submit btn-gradient">
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