<?php
if(!empty($_GET["action"])) 
{
    $productId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; // Lấy ID sản phẩm từ URL
    $quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : ''; // Lấy số lượng từ biểu mẫu

    switch($_GET["action"]) // Kiểm tra hành động
    {
        case "add": // Nếu hành động là "thêm"
            if(!empty($quantity)) {
                $stmt = $db->prepare("SELECT * FROM dishes where d_id= ?"); // Chuẩn bị câu lệnh để lấy thông tin món ăn
                $stmt->bind_param('i', $productId); // Gán ID sản phẩm vào câu lệnh
                $stmt->execute(); // Thực thi câu lệnh
                $productDetails = $stmt->get_result()->fetch_object(); // Lấy thông tin sản phẩm
                $itemArray = array($productDetails->d_id => array('title' => $productDetails->title, 'd_id' => $productDetails->d_id, 'quantity' => $quantity, 'price' => $productDetails->price)); // Tạo mảng sản phẩm

                if(!empty($_SESSION["cart_item"])) 
                {
                    if(in_array($productDetails->d_id, array_keys($_SESSION["cart_item"]))) // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                    {
                        foreach($_SESSION["cart_item"] as $k => $v) 
                        {
                            if($productDetails->d_id == $k) 
                            {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) 
                                {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0; // Khởi tạo số lượng nếu chưa có
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $quantity; // Cộng thêm số lượng vào giỏ hàng
                            }
                        }
                    }
                    else 
                    {
                        $_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray; // Thêm sản phẩm mới vào giỏ hàng
                    }
                } 
                else 
                {
                    $_SESSION["cart_item"] = $itemArray; // Nếu giỏ hàng rỗng, khởi tạo giỏ hàng với sản phẩm đầu tiên
                }
            }
            break;
            
        case "remove": // Nếu hành động là "xóa"
            if(!empty($_SESSION["cart_item"]))
            {
                foreach($_SESSION["cart_item"] as $k => $v) 
                {
                    if($productId == $v['d_id']) // Kiểm tra ID sản phẩm
                        unset($_SESSION["cart_item"][$k]); // Xóa sản phẩm khỏi giỏ hàng
                }
            }
            break;
            
        case "empty": // Nếu hành động là "xóa tất cả"
            unset($_SESSION["cart_item"]); // Xóa giỏ hàng
            break;
            
        case "check": // Nếu hành động là "kiểm tra"
            header("location:checkout.php"); // Chuyển hướng đến trang thanh toán
            break;
    }
}