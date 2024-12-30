<!DOCTYPE html>
<html lang="vi">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();

function function_alert() { 
    echo "<script>alert('Cảm ơn bạn. Đơn hàng của bạn đã được đặt!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
} 

if(empty($_SESSION["user_id"]))
{
    header('location:login.php');
}
else {
    foreach ($_SESSION["cart_item"] as $item) {
        $item_total += ($item["price"]*$item["quantity"]);
        
        if($_POST['submit']) {
            $SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
            mysqli_query($db,$SQL);
            
            unset($_SESSION["cart_item"]);
            unset($item["title"]);
            unset($item["quantity"]);
            unset($item["price"]);
            $success = "Cảm ơn bạn. Đơn hàng của bạn đã được đặt!";

            function_alert();
        }
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Thanh Toán</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
</head>
<body>
    <div class="site-wrapper">
        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/icn.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Trang Chủ <span class="sr-only">(hiện tại)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Nhà Hàng <span class="sr-only"></span></a> </li>
                            
                            <?php
                            if(empty($_SESSION["user_id"])) {
                                echo '<li class="nav-item"><a href="login.php" class="nav-link active">Đăng Nhập</a> </li>
                                      <li class="nav-item"><a href="registration.php" class="nav-link active">Đăng Ký</a> </li>';
                            } else {
                                echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Đơn Hàng Của Tôi</a> </li>';
                                echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Đăng Xuất</a> </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Chọn Nhà Hàng</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Chọn Món Ăn Yêu Thích</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Đặt Hàng và Thanh Toán</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="container">
                <span style="color:green;">
                    <?php echo $success; ?>
                </span>
            </div>
            
            <div class="container m-t-30">
                <form action="" method="post">
                    <div class="widget clearfix">
                        <div class="widget-body">
                            <form method="post" action="#">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="cart-totals margin-b-20">
                                            <div class="cart-totals-title">
                                                <h4>Tóm Tắt Giỏ Hàng</h4>
                                            </div>
                                            <div class="cart-totals-fields">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Tổng Giỏ Hàng</td>
                                                            <td> <?php echo "$".$item_total; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phí Giao Hàng</td>
                                                            <td>Miễn Phí</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-color"><strong>Tổng Cộng</strong></td>
                                                            <td class="text-color"><strong> <?php echo "$".$item_total; ?></strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="payment-option">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <label class="custom-control custom-radio m-b-20">
                                                        <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> 
                                                        <span class="custom-control-indicator"></span> 
                                                        <span class="custom-control-description">Thanh Toán Khi Nhận Hàng</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="custom-control custom-radio m-b-10">
                                                        <input name="mod" type="radio" value="paypal" disabled class="custom-control-input"> 
                                                        <span class="custom-control-indicator"></span> 
                                                        <span class="custom-control-description">Paypal <img src="images/paypal.jpg" alt="" width="90"></span> 
                                                    </label>
                                                </li>
                                            </ul>
                                            <p class="text-xs-center"> 
                                                <input type="submit" onclick="return confirm('Bạn có muốn xác nhận đơn hàng không?');" name="submit" class="btn btn-success btn-block" value="Đặt Hàng Ngay"> 
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <footer class="footer">
                <div class="row bottom-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 payment-options color-gray">
                                <h5>Các Tùy Chọn Thanh Toán</h5>
                                <ul>
                                    <li>
                                        <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                    </li>
                                    <li>
                                        <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-4 address color-gray">
                                <h5>Địa Chỉ</h5>
                                <p>108 NGUYỄN CƠ THẠCH, NAM TỪ LIÊM,HÀ NỘI </p>
                                <h5>Điện Thoại: 75696969855</h5> 
                            </div>
                            <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                <h5>Thông Tin Thêm</h5>
                                <p>Tham gia cùng hàng ngàn nhà hàng khác để hưởng lợi từ việc hợp tác với chúng tôi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>

<?php
}
?>