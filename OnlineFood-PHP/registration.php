<!DOCTYPE html>
<html lang="vi">
<?php

session_start(); 
error_reporting(0); 
include("connection/connect.php"); 
if(isset($_POST['submit'])) 
{
    if(empty($_POST['firstname']) || 
       empty($_POST['lastname']) || 
       empty($_POST['email']) ||  
       empty($_POST['phone']) ||
       empty($_POST['password']) ||
       empty($_POST['cpassword']) ||
       empty($_POST['cpassword']))
    {
        $message = "Tất cả các trường đều phải được yêu cầu!";
    }
    else
    {
        $check_username = mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
        $check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
        
        if($_POST['password'] != $_POST['cpassword']) {  
            echo "<script>alert('Mật khẩu không khớp');</script>"; 
        }
        elseif(strlen($_POST['password']) < 6)  
        {
            echo "<script>alert('Mật khẩu phải >= 6 ký tự');</script>"; 
        }
        elseif(strlen($_POST['phone']) < 10)  
        {
            echo "<script>alert('Số điện thoại không hợp lệ!');</script>"; 
        }
        elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
            echo "<script>alert('Địa chỉ email không hợp lệ, vui lòng nhập email hợp lệ!');</script>"; 
        }
        elseif(mysqli_num_rows($check_username) > 0) 
        {
            echo "<script>alert('Tên người dùng đã tồn tại!');</script>"; 
        }
        elseif(mysqli_num_rows($check_email) > 0) 
        {
            echo "<script>alert('Email đã tồn tại!');</script>"; 
        }
        else {
            $mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."','".$_POST['address']."')";
            mysqli_query($db, $mql);
            header("refresh:0.1;url=login.php");
        }
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
    <title>Đăng Ký</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
</head>
<body>
<div style="background-image: url('images/img/pimg.jpg');">
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
                        if(empty($_SESSION["user_id"]))
                        {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">Đăng Nhập</a> </li>
                                  <li class="nav-item"><a href="registration.php" class="nav-link active">Đăng Ký</a> </li>';
                        }
                        else
                        {
                            echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Đơn Hàng Của Tôi</a> </li>';
                            echo                             '<li class="nav-item"><a href="logout.php" class="nav-link active">Đăng Xuất</a> </li>';
                           }
                           ?>
                       </ul>
                   </div>
               </div>
           </nav>
       </header>
       <div class="page-wrapper">
           <div class="container">
               <ul>
                   <!-- Có thể thêm nội dung ở đây -->
               </ul>
           </div>
           
           <section class="contact-page inner-page">
               <div class="container">
                   <div class="row">
                       <div class="col-md-12">
                           <div class="widget">
                               <div class="widget-body">
                                   <form action="" method="post">
                                       <div class="row">
                                           <div class="form-group col-sm-12">
                                               <label for="exampleInputEmail1">Tên Người Dùng</label>
                                               <input class="form-control" type="text" name="username" id="example-text-input"> 
                                           </div>
                                           <div class="form-group col-sm-6">
                                               <label for="exampleInputEmail1">Tên</label>
                                               <input class="form-control" type="text" name="firstname" id="example-text-input"> 
                                           </div>
                                           <div class="form-group col-sm-6">
                                               <label for="exampleInputEmail1">Họ</label>
                                               <input class="form-control" type="text" name="lastname" id="example-text-input-2"> 
                                           </div>
                                           <div class="form-group col-sm-6">
                                               <label for="exampleInputEmail1">Địa Chỉ Email</label>
                                               <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                           </div>
                                           <div class="form-group col-sm-6">
                                               <label for="exampleInputEmail1">Số Điện Thoại</label>
                                               <input class="form-control" type="text" name="phone" id="example-tel-input-3"> 
                                           </div>
                                           <div class="form-group col-sm-6">
                                               <label for="exampleInputPassword1">Mật Khẩu</label>
                                               <input type="password" class="form-control" name="password" id="exampleInputPassword1"> 
                                           </div>
                                           <div class="form-group col-sm-6">
                                               <label for="exampleInputPassword1">Xác Nhận Mật Khẩu</label>
                                               <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2"> 
                                           </div>
                                           <div class="form-group col-sm-12">
                                               <label for="exampleTextarea">Địa Chỉ Giao Hàng</label>
                                               <textarea class="form-control" id="exampleTextarea" name="address" rows="3"></textarea>
                                           </div>
                                       </div>
                                       
                                       <div class="row">
                                           <div class="col-sm-4">
                                               <p> <input type="submit" value="Đăng Ký" name="submit" class="btn theme-btn"> </p>
                                           </div>
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
           
           <footer class="footer">
               <div class="container">
                   <div class="row bottom-footer">
                       <div class="container">
                           <div class="row">
                               <div class="col-xs-12 col-sm-3 payment-options color-gray">
                                   <h5>Tùy Chọn Thanh Toán</h5>
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
                                <p>Tham gia cùng hàng ngàn nhà hàng khác và hưởng lợi từ việc hợp tác với chúng tôi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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