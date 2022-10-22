<?php
// GET id là lấy id từ bên MENU.php 
$sql_show = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
$query_show = $db->prepare($sql_show);
$query_show->execute();

//get ten danh muc
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[id]' LIMIT 1";
$query_cate = $db->prepare($sql_cate);
$query_cate->execute();
$row_title = $query_cate->fetch(PDO::FETCH_ASSOC);
?>
<h3> Danh mục :
    <?php
    if (isset($row_title['tendanhmuc'])) {
        echo $row_title['tendanhmuc'];
    } else {
        echo "lỗi không lấy được data";
    }
    ?>

</h3>
<ul class="product_list col-sm-12">
    <?php
    while ($row_pro = $query_show->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                <p class="title_product"> <?php echo $row_pro['tensanpham'] ?></p>
                <p class="price_product">Giá: <?php echo number_format($row_pro['giasanpham'], 0, ',', '.') . 'vnd' ?></p>
            </a>
        </li>
    <?php
    }
    ?>

</ul>