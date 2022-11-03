<?php
    include "../../config/connect.php";
    // XEM ĐƠN HÀNG
    if(isset($_GET['code'])){
		$code_cart = $_GET['code'];
		$sql_update ="UPDATE tbl_giohang SET cart_status=0 WHERE code_cart='".$code_cart."'";
		$query = $db->prepare($sql_update);
        header('Location:../../index.php?action=quanlydonhang&query=them');
	}
    // XÓA ĐƠN HÀNG
    if(isset($_GET['iddonhang'])){
        $id=$_GET['iddonhang'];
        $sql_delete="DELETE FROM tbl_giohang WHERE  code_cart='$id'";
        $xoa_dh = $db->prepare($sql_delete);
        $xoa_dh->execute();
        $sql_delete_cart_detail="DELETE FROM tbl_cart_detail WHERE  code_cart='$id'";
        $xoa_dh1 = $db->prepare($sql_delete_cart_detail);
        $xoa_dh1->execute();
        header('Location:../../index.php?action=quanlydonhang&query=them');
    }
?>