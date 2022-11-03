<?php
    include "../../config/connect.php";
    $tendanhmuc=$_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];
    // THÊM DANH MỤC
    if(isset($_POST['themdanhmuc'])){
        $sql_them="INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('".$tendanhmuc."','".$thutu."'); ";
        $themdm = $db->prepare($sql_them);
        $themdm->execute();
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
    // SỬA DANH MỤC
    elseif(isset($_POST['suadanhmuc'])){
        $sql_sua="UPDATE tbl_danhmuc SET tendanhmuc='".$tendanhmuc."',thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
        $sua = $db->prepare($sql_sua);
        $sua->execute();
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
    // XÓA DANH MỤC
    else{
        $id=$_GET['iddanhmuc'];
        $sql_xoa="DELETE FROM tbl_danhmuc WHERE id_danhmuc ='".$id."';";
        $xoadm = $db->prepare($sql_xoa);
        $xoadm->execute();
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
?>