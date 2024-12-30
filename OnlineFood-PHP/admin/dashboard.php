<!DOCTYPE html>
<html lang="vi">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(empty($_SESSION["adm_id"]))
{
	header('location:index.php');
}
else
{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bảng điều khiển quản trị</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
    <div id="main-wrapper">
     
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">

            <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        
                        <span><img src="images/icn.png" alt="trang chủ" class="dark-logo" /></span>
                    </a>
                </div>

                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>
                    
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="người dùng" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
      
        <div class="left-sidebar">
   
            <div class="scroll-sidebar">
       
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Trang chủ</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Bảng điều khiển</span></a>
                        </li>
                        <li class="nav-label">Nhật ký</li>
                        <li> <a href="all_users.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Người dùng</span></a></li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Nhà hàng</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_restaurant.php">Tất cả nhà hàng</a></li>
								<li><a href="add_category.php">Thêm danh mục</a></li>
                                <li><a href="add_restaurant.php">Thêm nhà hàng</a></li>
                            </ul>
                        </li>
                       <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Thực đơn</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">Tất cả thực đơn</a></li>
								<li><a href="add_menu.php">Thêm thực đơn</a></li>
                            </ul>
                        </li>
						 <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Đơn hàng</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                        <h4 class="m-b-0 text-white">Bảng điều khiển quản trị</h4>
                        </div>
                        <div class="row">
                   
                            <div class="col-md-3">
                                <div class="card p-30">
                                    <div class="media">
                                        <div class="media-left meida media-middle">
                                            <span><i class="fa fa-home f-s-40 "></i></span>
                                        </div>
                                        <div class="media-body media-text-right">
                                            <h2><?php $sql="select * from restaurant";
                                                    $result=mysqli_query($db,$sql); 
                                                    $rws=mysqli_num_rows($result);
                                                    echo $rws;?></h2>
                                            <p class="m-b-0">Nhà hàng</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
					
                            <div class="col-md-3">
                                <div class="card p-30">
                                    <div class="media">
                                        <div class="media-left meida media-middle">
                                            <span><i class="fa fa-cutlery f-s-40" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="media-body media-text-right">
                                            <h2><?php $sql="select * from dishes";
                                                    $result=mysqli_query($db,$sql); 
                                                    $rws=mysqli_num_rows($result);
                                                    echo $rws;?></h2>
                                            <p class="m-b-0">Món ăn</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
					
                            <div class="col-md-3">
                                <div class="card p-30">
                                    <div class="media">
                                        <div class="media-left meida media-middle">
                                            <span><i class="fa fa-users f-s-40"></i></span>
                                        </div>
                                        <div class="media-body media-text-right">
                                            <h2><?php $sql="select * from users";
                                                    $result=mysqli_query($db,$sql); 
                                                    $rws=mysqli_num_rows($result);
                                                    echo $rws;?></h2>
                                            <p class="m-b-0">Người dùng</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
					
                            <div class="col-md-3">
                                <div class="card p-30">
                                    <div class="media">
                                        <div class="media-left meida media-middle"> 
                                            <span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="media-body media-text-right">
                                            <h2><?php $sql="select * from users_orders";
                                                    $result=mysqli_query($db,$sql); 
                                                    $rws=mysqli_num_rows($result);
                                                    echo $rws;?></h2>
                                            <p class="m-b-0">Tổng số đơn hàng</p>
                                        </div>
                                    </div>
                                </div>
                            </div>	                   
                        </div>     
                
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card p-30">
                                    <div class="media">
                                        <div class="media-left meida media-middle"> 
                                            <span><i class="fa fa-th-large f-s-40" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="media-body media-text-right">
                                            <h2><?php $sql="select * from res_category";
                                                    $result=mysqli_query($db,$sql); 
                                                    $rws=mysqli_num_rows($result);
                                                    echo $rws;?></h2>
                                            <p class="m-b-0">Danh mục nhà hàng</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-4">
                                <div class="card p-30">
                                    <div class="media">
                                        <div class="media-left meida media-middle"> 
                                            <span><i class="fa fa-spinner f-s-40" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="media-body media-text-right">
                                            <h2><?php $sql="select * from users_orders WHERE status = 'in process' ";
                                                    $result=mysqli_query($db,$sql); 
                                                    $rws=mysqli_num_rows($result);
                                                    echo $rws;?></h2>
                                            <p class="m-b-0">Đơn hàng đang xử lý</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                            <div class="card p-30">
                                    <div class="media">
                                        <div class="media-left meida media-middle"> 
                                            <span><i class="fa fa-check f-s-40" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="media-body media-text-right">
                                            <h2><?php $sql="select * from users_orders WHERE status = 'closed' ";
                                                    $result=mysqli_query($db,$sql); 
                                                    $rws=mysqli_num_rows($result);
                                                    echo $rws;?></h2>
                                            <p class="m-b-0">Đơn hàng đã giao</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card p-30">
                                    <div class="media">
                                        <div class="media-left meida media-middle"> 
                                            <span><i class="fa fa-times f-s-40" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="media-body media-text-right">
                                            <h2><?php $sql="select * from users_orders WHERE status = 'rejected' ";
                                                    $result=mysqli_query($db,$sql); 
                                                    $rws=mysqli_num_rows($result);
                                                    echo $rws;?></h2>
                                            <p class="m-b-0">Đơn hàng bị hủy</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card p-30">
                                    <div class="media">
                                        <div class="media-left meida media-middle"> 
                                            <span><i class="fa fa-usd f-s-40" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="media-body media-text-right">
                                            <h2><?php 
                                                $result = mysqli_query($db, 'SELECT SUM(price) AS value_sum FROM users_orders WHERE status = "closed"'); 
                                                $row = mysqli_fetch_assoc($result); 
                                                $sum = $row['value_sum'];
                                                echo $sum;
                                                ?></h2>
                                            <p class="m-b-0">Tổng doanh thu</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
   
            <script src="js/lib/jquery/jquery.min.js"></script>
            <script src="js/lib/bootstrap/js/popper.min.js"></script>
            <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
            <script src="js/jquery.slimscroll.js"></script>
            <script src="js/sidebarmenu.js"></script>
            <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
            <script src="js/custom.min.js"></script>

        </body>

    </html>
<?php
}
?>  