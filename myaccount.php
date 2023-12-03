<?php
include_once("include/navbar.php");
?>
<!-- /header -->
<!--content-->
<div class="container container-240">

    <div class="myaccount">
        <ul class="breadcrumb v3">
            <li><a href="#">Home</a></li>
            <li class="active">My Account</li>
        </ul>
        <div class="row flex pd" style="justify-content: center;">
            <div class="account-element bd-7">
                <div class="cmt-title text-center abs">
                    <h1 class="page-title v1">Login</h1>
                </div>
                <div class="page-content">
                    <p>Sign in to your account</p>
                    <?php
                    include_once 'backend/database/config.php';
                    if (isset($_POST['user-login'])) {
                        $u_name = $_POST['u-user'];
                        $u_pswd = $_POST['u-pswd'];
                        $sql = "SELECT * FROM `w-users` WHERE (`u_username` = '{$u_name}' OR `u_email` = '{$u_name}')";
                        $result = mysqli_query($conn, $sql);
                        $verify = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        if ($verify) {
                            if (password_verify($u_pswd, $verify['u_password'])) {
                                if (mysqli_num_rows($result) > 0) {
                                    session_start();
                                    $_SESSION['user-id'] = $verify['user_id'];
                                    $_SESSION['user-name'] = $verify['u_username'];
                                    echo '<script>window.location.assign("http://localhost/HS-Ecomm/home.php")</script>';
                                } else {
                                    echo "mysqli_error()";
                                }
                            } else {
                                echo "NOT OKAY";
                            }
                        }
                    }

                    ?>
                    <form class="login-form" method="post" action="#">
                        <div class="form-group">
                            <label>Username or email address <span class="f-red">*</span></label>
                            <input type="text" id="author" class="form-control bdr" name="u-user" value="">
                            <label>Password <span class="f-red">*</span></label>
                            <input type="password" id="email" class="form-control bdr" name="u-pswd" value="">
                            <a href="#" class="text-primary " style="text-align: left;">Forget Password?</a>
                        </div>
                        <div class="flex lr">
                            <button type="submit" name="user-login" class="btn btn-submit btn-gradient">
                                Login
                            </button>
                            <div class="checkbox checkbox-default">
                                <input id="remember" type="checkbox" value="yes" class="">
                                <label for="remember"><span class="chk-span" tabindex="2"></span>Remember me</label>
                            </div>
                        </div>
                    </form>
                    <span class="flex" style="margin-top: 30px;">
                        <span style="margin-right: 10px;">
                            Don't Have An Account
                        </span>
                        <span>
                            <a href="register.php" class="text-primary">Sign Up?</a>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="e-category">
    <div class="container container-240">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h1 class="cate-title">Featured Products</h1>
                <div class="cate-item">
                    <div class="product-img">
                        <a href="#"><img src="img/product/usb.jpg" alt="" class="img-reponsive"></a>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="#">Epson Home Cinema 5040UB </a></h3>
                        <div class="product-price v2"><span>$780.00</span></div>
                    </div>
                </div>

                <div class="cate-item">
                    <div class="product-img">
                        <a href="#"><img src="img/product/macbook.jpg" alt="" class="img-reponsive"></a>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="#">Epson Home Cinema 5040UB </a></h3>
                        <div class="product-price v2"><span>$780.00</span></div>
                    </div>
                </div>

                <div class="cate-item">
                    <div class="product-img">
                        <a href="#"><img src="img/product/flycam.jpg" alt="" class="img-reponsive"></a>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="#">Epson Home Cinema 5040UB </a></h3>
                        <div class="product-price v2"><span>$780.00</span></div>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <h1 class="cate-title">Top Rated Products</h1>
                <div class="cate-item">
                    <div class="product-img">
                        <a href="#"><img src="img/product/samsung.jpg" alt="" class="img-reponsive"></a>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="#">Epson Home Cinema 5040UB </a></h3>
                        <div class="product-price v2"><span>$780.00</span></div>
                    </div>
                </div>

                <div class="cate-item">
                    <div class="product-img">
                        <a href="#"><img src="img/product/headphone2.jpg" alt="" class="img-reponsive"></a>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="#">Epson Home Cinema 5040UB </a></h3>
                        <div class="product-price v2"><span>$780.00</span></div>
                    </div>
                </div>

                <div class="cate-item">
                    <div class="product-img">
                        <a href="#"><img src="img/product/anker.jpg" alt="" class="img-reponsive"></a>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="#">Epson Home Cinema 5040UB </a></h3>
                        <div class="product-price v2"><span>$780.00</span></div>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <h1 class="cate-title">Top Selling Products</h1>
                <div class="cate-item">
                    <div class="product-img">
                        <a href="#"><img src="img/product/headphone.jpg" alt="" class="img-reponsive"></a>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="#">Epson Home Cinema 5040UB </a></h3>
                        <div class="product-price v2"><span>$780.00</span></div>
                    </div>
                </div>

                <div class="cate-item">
                    <div class="product-img">
                        <a href="#"><img src="img/product/samsung2.jpg" alt="" class="img-reponsive"></a>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="#">Epson Home Cinema 5040UB </a></h3>
                        <div class="product-price v2"><span>$780.00</span></div>
                    </div>
                </div>

                <div class="cate-item">
                    <div class="product-img">
                        <a href="#"><img src="img/product/sound.jpg" alt="" class="img-reponsive"></a>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><a href="#">Epson Home Cinema 5040UB </a></h3>
                        <div class="product-price v2"><span>$780.00</span></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="feature">
    <div class="container container-240">
        <div class="feature-inside">
            <div class="feature-block text-center">
                <div class="feature-block-img"><img src="img/feature/truck.png" alt="" class="img-reponsive"></div>
                <div class="feature-info">
                    <h3>Worldwide Delivery</h3>
                    <p>With sites in 5 languages, we ship to over 200 countries & regions.</p>
                </div>
            </div>

            <div class="feature-block text-center">
                <div class="feature-block-img"><img src="img/feature/credit-card.png" alt="" class="img-reponsive"></div>
                <div class="feature-info">
                    <h3>Safe Payment</h3>
                    <p>Pay with the world’s most popular and secure payment methods.</p>
                </div>
            </div>

            <div class="feature-block text-center">
                <div class="feature-block-img"><img src="img/feature/safety.png" alt="" class="img-reponsive"></div>
                <div class="feature-info">
                    <h3>Shop with Confidence</h3>
                    <p>Our Buyer Protection covers your purchase from click to delivery.</p>
                </div>
            </div>

            <div class="feature-block text-center">
                <div class="feature-block-img"><img src="img/feature/telephone.png" alt="" class="img-reponsive"></div>
                <div class="feature-info">
                    <h3>24/7 Help Center</h3>
                    <p>Round-the-clock assistance for a smooth shopping experience.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / end content -->
<?php
include_once("include/footer.php");
?>