
 <?php

	session_start();
	include('../../../admincp/config/connect.php');
	if (isset($_POST['redirect'])) {
		$id_khachhang = $_SESSION['id_khachhang'];
		$code_order = rand(0, 9999); // random từ 0 den 9999 
		$cart_pay = $_POST['payment'];
		$insert_cart = "INSERT INTO tbl_giohang(id_khachhang,code_cart,cart_status,cart_payment) VALUE('" . $id_khachhang . "','" . $code_order . "',1,'" . $cart_pay . "')";
		$cart_query = $db->prepare($insert_cart);
		$cart_query->execute();
		if ($cart_query) {
			//thêm giỏ hàng chi tiết
			foreach ($_SESSION['cart'] as $key => $value) {
				$id_sanpham = $value['id'];
				$soluong = $value['soluong'];

				$insert_order_details = "INSERT INTO tbl_cart_detail(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
				$themgiohang = $db->prepare($insert_order_details);
				$themgiohang->execute();
			}
		}
		header('Location:../../../index.php');
	}
	?>