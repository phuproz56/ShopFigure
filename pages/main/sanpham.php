 <p>Chi tiết sản phẩm </p>
 <?php
   $sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
   $query_chitiet = $db->prepare($sql_chitiet);
   $query_chitiet->execute();
   while ($row_chitiet = $query_chitiet->fetch()) {
   ?>
    <div class="warpper_deital">
       <div style="width: 300px; height: 300px;" class="hinhanh_sanpham">
          <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
       </div>
       <form action="pages/main/giohang/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>" method="POST">
          <div class="chitiet_sanpham">
             <h3 style="margin: 0;"><?php echo $row_chitiet['tensanpham'] ?></h3>
             <p>Mã :<?php echo $row_chitiet['masanpham'] ?></p>
             <p>Giá :<?php echo number_format($row_chitiet['giasanpham'], 0, ',', '.') . 'vnd' ?></p>
             <p>Số lượng:<?php echo $row_chitiet['soluong'] ?></p>
             <p>Danh mục :<?php echo $row_chitiet['tendanhmuc'] ?></p>
             <p><input class="btn btn-primary themgiohang" type="submit" name="themgiohang" value="Thêm Giỏ Hàng"></p>
          </div>
       </form>
    </div>
 <?php
   }
?>