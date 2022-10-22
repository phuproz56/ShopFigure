<?php
// GET id là lấy id từ bên MENU.php 
$sql_show_new = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.trangthai=1 ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 7";
$query_show_new = $db->prepare($sql_show_new);
$query_show_new->execute();
?>
<ul class="product_list row">
    <?php
    while ($row = $query_show_new->fetch(PDO::FETCH_BOTH)) {
        extract($row);
    ?>
        <li class="col-4 col-sm-3 col-md-2 col-lg-1">
            <a  href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img  src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                <p class="title_product"> <?php echo $row['tensanpham'] ?></p>
                <p class="price_product">Giá: <?php echo number_format($row['giasanpham'], 0, ',', '.') . 'vnd' ?></p>
                <p><?php echo $row['tendanhmuc'] ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>
