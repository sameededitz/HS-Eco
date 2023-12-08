<?php
session_start();
include_once('backend/database/config.php');
if (!isset($_SESSION['user_id'])) {
    header("location: home.php");
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
                    <li class="active"><a href="profile.php">My Account</a></li>
                    <li class="active"><a href="#">My Orders</a></li>
                    <li class="active"><a href="#">Address Book</a></li>
                    <li class="active"><a href="#">My Wishlist</a></li>
                    <li class="active"><a href="#">Messages</a></li>
                    <li class="active"><a href="#">Accout Details</a></li>
                    <li class="active"><a href="2-step-verify.php">2-Step Verification</a></li>
                    <li class="active"><a href="seller.php">Become A Seller</a></li>
                    <li class="active"><a href="./backend/db_user_logout.php">Logout</a></li>

                </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12 collection-list">
            <div class="blog-comment-bottom" style="margin: 0%;">
                <div class="cmt-title text-center abs">
                    <h1 class="oval-bd">My Account</h1>
                </div>
                <div class="cmt-form">
                    <center>
                        <div class="form-group" style="margin-bottom: 15px;">
                            <div class="img-fluid" style=" width: 100px; height: 100px; border-radius: 50%; background-position: center; background-size: cover; background-image: url('https://images.unsplash.com/photo-1679678690998-88c8711cbe5f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D'); ">
                            </div>
                        </div>
                    </center>
                    <div class="login-form">
                        <?php
                        $user_id = $_SESSION['user_id'];
                        $sql = "SELECT * FROM `w-users` WHERE `user_id` = '$user_id'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $show = mysqli_fetch_assoc($result);
                        }
                        ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <label>Username <span class="f-red">*</span></label>
                                    <input type="email" readonly id="email" class="form-control bdr" placeholder="Name *" value="<?php echo $show['u_username'] ?>">
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label>Email <span class="f-red">*</span></label>

                                    <input type="email" readonly id="email" class="form-control bdr" placeholder="Email *" value="<?php echo $show['u_email'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <input type="text" class="form-control bdr" placeholder="Username *">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-submit btn-gradient">
                                Change Profile Info.
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-comment-bottom" style="margin-top: 60px; max-width:480px">
                <div class="cmt-title text-center abs">
                    <h1 class="oval-bd">Change Password</h1>
                </div>
                <div class="cmt-form">
                    <form action="">
                        <div class="login-form">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <input type="text" id="author" class="form-control bdr" name="comment[author]" value="" placeholder="Old Password *">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <input type="text" class="form-control bdr" placeholder="New Password *">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <input type="text" class="form-control bdr" placeholder="Confirm New Password *">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-submit btn-gradient">
                                    Change
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("include/footer.php");
?>