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
                    <h1 class="oval-bd">Become A Seller</h1>
                </div>
                <div class="cmt-form">
                    <center>

                    </center>
                    <div class="login-form">
                        <form method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label for="user">Username <span class="f-red">*</span></label>
                                        <input type="text" id="user" class="form-control bdr" placeholder="Name *">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="email">Email <span class="f-red">*</span></label>
                                        <input type="email" id="email" class="form-control bdr" placeholder="Email *">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label for="password">Password <span class="f-red">*</span></label>
                                        <input type="password" id="password" class="form-control bdr" placeholder="Password *">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="phone">Phone <span class="f-red">*</span></label>
                                        <input type="tel" id="phone" class="form-control bdr" placeholder="Phone Number *">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label for="address">Address <span class="f-red">*</span></label>
                                        <input type="password" id="address" class="form-control bdr" placeholder="Address *">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="state">State <span class="f-red">*</span></label>
                                        <input type="text" id="state" class="form-control bdr" placeholder="State *">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-check">
                                            <input style="height: max-content;" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Agree to Terms and Conditions?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-submit btn-gradient">
                                    Submit
                                </button>
                            </div>
                        </form>
                        <span class="flex">
                            <span style="margin-right: 10px;">
                                Don't Have An Account
                            </span>
                            <span>
                                <a href="seller-login.php" class="text-primary">Sign Up?</a>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include_once("include/footer.php");
?>