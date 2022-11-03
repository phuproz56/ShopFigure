<?php
if (isset($_GET['trang'])) {
	$page = $_GET['trang'];
} else {
	$page = 1;
}
if ($page == '' || $page == 1) {
	$begin = 0;
} else {
	$begin = ($page - 1) * 14; // công thức phân trang
}
// GET id là lấy id từ bên MENU.php 
$sql_show = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham LIMIT $begin,14";
$query_show = $db->prepare($sql_show);
$query_show->execute();
?>
<ul class="product_list col-12 col-sm-12 col-md-12 col-lg-12">
	<?php
	while ($row = $query_show->fetch()) {
	?>
		<li class="row col-4 col-sm-4 col-md-9 col-lg-12">
			<a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
				<img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
				<p class="title_product"> <?php echo $row['tensanpham'] ?></p>
				<p class="price_product">Giá: <?php echo number_format($row['giasanpham'], 0, ',', '.') . 'vnd' ?></p>
				<p><?php echo $row['tendanhmuc'] ?></p>
			</a>
		</li>
	<?php
	}
	?>
</ul>
<div style="clear:both;"></div>
<style type="text/css">
	ul.list_trang {
		padding: 0;
		margin: 0;
		list-style: none;
	}

	ul.list_trang li {
		float: left;
		padding: 5px 13px;
		margin: 5px;
		background: burlywood;
		display: block;
	}

	ul.list_trang li a {
		color: #000;
		text-align: center;
		text-decoration: none;

	}
</style>
<?php
$sql_trang = $db->prepare("SELECT COUNT(*) FROM tbl_sanpham");
$sql_trang->execute();
$row_count = $sql_trang->fetchColumn(); //  mysql_num_rows  
$trang = ceil($row_count / 14); // xác định tổng số trang có sẵn
?>
<p>Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?> </p>
<ul class="list_trang">
	<?php
	for ($i = 1; $i <= $trang; $i++) {
	?>
		<li <?php if ($i == $page) {
				echo 'style="background: brown;"';
			} else {
				echo '';
			}  ?>>
			<a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>
		</li>
	<?php
	}
	?>
</ul>