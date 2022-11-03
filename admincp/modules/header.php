<?php
if (isset($_GET['dangxuat'])) {
	unset($_SESSION['dangnhap']);
	header('Location:login.php');
}
?>
<p><a class="btn btn-primary mx-2 mt-2" href="index.php?dangxuat=1">Đăng xuất : <?php if (isset($_SESSION['dangnhap'])) {
																					echo $_SESSION['dangnhap'];
																				} ?></a></p>
																		