<?php
    include "../../config/connect.php";
    $name=$_POST['hovatens'];
    $account = $_POST['taikhoans'];
    $email = $_POST['emails'];
    $numberphone = $_POST['dienthoais'];
    $address = $_POST['diachis'];
    $chucvu=$_POST['chucvus'];

    // SỬA NGƯỜI DÙNG
   if(isset($_POST['suanguoidung'])){
        $sql_sua_nd="UPDATE tbl_dangky SET hovaten='".$name."',taikhoan='".$account."',email='".$email."',sodienthoai='".$numberphone."',diachi='".$address."',chucvu='".$chucvu."' WHERE id_khachhang='$_GET[idnguoidung]'";
        $sua=$db->prepare($sql_sua_nd);
        $sua->execute();
        header('Location:../../index.php?action=quanlynguoidung&query=them');
    }
    
    // XÓA NGƯỜI DÙNG
    else{
        $id=$_GET['idnguoidung'];
        $sql_xoa_nd="DELETE FROM tbl_dangky WHERE id_khachhang ='".$id."';";
        $xoangdung = $db->prepare($sql_xoa_nd);
        $xoangdung->execute();
        header('Location:../../index.php?action=quanlynguoidung&query=them');
    }
?>