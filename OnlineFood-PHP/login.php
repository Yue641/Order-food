<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Đăng Nhập</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/login.css">

  <style type="text/css">
    #buttn {
      color: #fff;
      background-color: #5c4ac7;
    }
  </style>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animsition.min.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
</head>

<body>
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
            echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Đơn Hàng Của Tôi</a> </li>';
            echo '<li class="nav-item"><a href="logout.php" class="nav-link active">Đăng Xuất</a> </li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
<div style="background-image: url('images/img/pimg.jpg');">

<?php
include("connection/connect.php"); 
error_reporting(0); 
session_start(); 
if (isset($_POST['submit']))  {
  $username = $_POST['username'];  
  $password = $_POST['password'];
  
  if (!empty($_POST["submit"])) {
    $loginquery = "SELECT * FROM users WHERE username='$username' && password='$password'"; // chọn các bản ghi phù hợp
    $result = mysqli_query($db, $loginquery); // thực thi
    $row = mysqli_fetch_array($result);
    
    if (is_array($row)) {
      $_SESSION["user_id"] = $row['u_id']; 
      header("refresh:1;url=index.php"); 
    } else {
      $message = "Tên người dùng hoặc mật khẩu không hợp lệ!"; 
    }
  }
}
?>


<div class="pen-title">
  <
</div>

<div class="module form-module">
  <div class="toggle">
  </div>
  <div class="form">
    <h2>Đăng Nhập Tài Khoản Của Bạn</h2>
    <span style="color:red;"><?php echo $message; ?></span> 
    <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input type="text" placeholder="Tên Người Dùng" name="username"/>
      <input type="password" placeholder="Mật Khẩu" name="password"/>
      <input type="submit" id="buttn" name="submit" value="Đăng Nhập" />
      <a href="admin/index.php" style="color:#5c4ac7;"> Bạn là admin?</a>
    </form>
  </div>
  
  <div class="cta">Chưa đăng ký?<a href="registration.php" style="color:#5c4ac7;"> Tạo tài khoản</a></div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<div class="container-fluid pt-3">
  <p></p>
</div>

<footer class="footer">
  <div class="container">
    <div class="bottom-footer">
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
          <h5>Thông Tin Bổ Sung</h5>
          <p>Tham gia cùng hàng ngàn nhà hàng khác hưởng lợi từ việc hợp tác với chúng tôi.</p>
        </div>
      </div>
    </div>
  </div>
</footer>

</body>

</html>