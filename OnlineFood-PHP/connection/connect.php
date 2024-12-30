<?php

// Tập tin kết nối chính cho cả quản trị viên & giao diện người dùng
$servername = "localhost"; // máy chủ
$username = "root"; // tên đăng nhập
$password = ""; // mật khẩu
$dbname = "doan";  // tên cơ sở dữ liệu

// Tạo kết nối
$db = mysqli_connect($servername, $username, $password, $dbname); // kết nối 
// Kiểm tra kết nối
if (!$db) {       // kiểm tra kết nối đến cơ sở dữ liệu	
    die("Kết nối thất bại: " . mysqli_connect_error());
}

?>