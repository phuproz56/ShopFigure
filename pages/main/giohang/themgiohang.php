<?php
    session_start();
    include "../../../admincp/config/connect.php";
    //them so luong

    //tru so luong

	//xóa sản phẩm 
	// if(isset($_SESSION['cart'])&& $_GET['xoa']){		
	// }
    //them 
    if(isset($_POST['themgiohang'])){
		//session_destroy();
		$id=$_GET['idsanpham'];
		$sql ="SELECT * FROM tbl_sanpham WHERE id_sanpham='".$id."' LIMIT 1";
		$query = $db->prepare($sql);
		$query->execute();
		$soluong = 1;
		if($row = $query->fetch()){
			$new_product=array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasanpham'=>$row['giasanpham'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['masanpham']));
			// kiểm tra session giỏ hàng tồn tại
			if(isset($_SESSION['cart'])){
				$found = false;
				foreach($_SESSION['cart'] as $cart_item){
					// Nếu dữ liệu trùng 
					if($cart_item['id'] == $id){
						$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'] + 1,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
						$found = true;
					}else{
						// Nếu dữ liệu không trùng
						$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
					}
				}
				if($found == false){
					// liên kết dữ liệu new_product với product
					$_SESSION['cart']=array_merge($product,$new_product);
				}else{
					$_SESSION['cart']=$product;
				}
			}else{
				$_SESSION['cart'] = $new_product;
			}
		}
		header('Location:../../../index.php?quanly=giohang');
		
	}
?>