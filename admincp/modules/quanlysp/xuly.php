<?php
include "../../config/connect.php";
$tensanpham = $_POST['tensanpham'];
$masanpham = $_POST['masp'];
$giasanpham = $_POST['giasp'];
$soluong = $_POST['soluong'];
//xử lý hình ảnh 
$file = $_FILES['hinhanh'];
$hinhanh = $file['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanhgio = time() . '_' . $hinhanh;
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$hienthi = $_POST['hienthi'];
$danhmuc = $_POST['danhmuc'];
// THÊM SẢN PHẨM
if (isset($_POST['themsanpham'])) {
    if (isset($_FILES['hinhanh'])) {
        if ($file['type'] == 'image/jpeg' || $file['type'] == 'imgae/jpg' || $file['type'] == 'image/png') { // kiểm tra loại tệp hình ảnh tải lên
            move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh); // đi chuyển hình ảnh vào file uploads 
            $sql_themsp = "INSERT INTO tbl_sanpham(tensanpham,masanpham,giasanpham,soluong,hinhanh,tomtat,noidung,trangthai,id_danhmuc) 
                VALUE ('" . $tensanpham . "','" . $masanpham . "','" . $giasanpham . "','" . $soluong . "','" . $hinhanh . "','" . $tomtat . "','" . $noidung . "'," . $hienthi . ",'" . $danhmuc . "')";
            $themhinhanh = $db->prepare($sql_themsp);
            $themhinhanh->execute();
            header('Location:../../index.php?action=quanlysanpham&query=them');
        } else {
            $hinhanh = '';
            header('Location:../../index.php?action=quanlysanpham&query=them');
        }
    }
} 
// SỬA SẢN PHẨM 
elseif (isset($_POST['suasanpham'])) {
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
        $sql_sua = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',
            giasanpham='" . $giasanpham . "',soluong='" . $soluong . "',hinhanh='" . $hinhanh . "',
            tomtat='" . $tomtat . "',noidung='" . $noidung . "',trangthai='" . $hienthi . "',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]'";
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
        $query = $db->prepare($sql);
        $query->execute();
    } else {
        $sql_sua = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',
            giasanpham='" . $giasanpham . "',soluong='" . $soluong . "',tomtat='" . $tomtat . "',
            noidung='" . $noidung . "',trangthai='" . $hienthi . "',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]'";
    }
    $suasp = $db->prepare($sql_sua);
    $suasp->execute();
    header('Location:../../index.php?action=quanlysanpham&query=them');
} 
// XÓA SẢN PHẨM
else {
    $id = $_GET['idsanpham'];
    $sql = "SELECT *FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = $db->prepare($sql);
    $query->execute();
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham ='" . $id . "';";
    $xoasp = $db->prepare($sql_xoa);
    $xoasp->execute();
    header('Location:../../index.php?action=quanlysanpham&query=them');
}
