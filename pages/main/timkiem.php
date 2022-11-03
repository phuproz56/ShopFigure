<?php
if (isset($_POST['timkiem'])) { 
	$tukhoa = $_POST['tukhoa'];
}
$sql_tk = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%" . $tukhoa . "%'";
$query_tk = $db->prepare($sql_tk);
$query_tk->execute();
?>
<h3>Từ khoá tìm kiếm : <?php echo $_POST['tukhoa']; ?></h3>
<ul class="product_list row">
	<?php
	while ($row = $query_tk->fetch()) {
	?>
		<li class="col-4 col-sm-3 col-md-2 col-lg-1">
			<a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
				<img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
				<p class="title_product">Tên sản phẩm : <?php echo $row['tensanpham'] ?></p>
				<p class="price_product">Giá : <?php echo number_format($row['giasanpham'], 0, ',', '.') . 'vnđ' ?></p>
				<p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
			</a>
		</li>
	<?php
	}
	?>
</ul>