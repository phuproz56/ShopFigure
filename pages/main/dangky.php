<p>Trang đăng ký</p>

<p>Đăng ký thành viên</p>
<style type="text/css">
	table.dangky tr td {
		padding: 5px;
	}
</style>

<div class="warpper">
	<div class="container">
		<div class="row justify-content-around p-5 ">

			<form action="" method="POST" class="col-md-6  bg-light rounded-3  border">
				<h1 class="text-center text-uppercase m-4 p-2">đăng ký</h1>
				<table class="dangky" style="border-collapse: collapse;">
					<tr class="row">
						<td class="h4">Họ và tên</td>
						<td><input type="text" name="hovaten" required class="mt-2 display-6 border-success rounded col-md-12"></td>
					</tr>
					<tr class="row">
						<td class="h4">Tài khoản</td>
						<td><input type="text" name="taikhoan" required class="mt-2 display-6 border-success rounded col-md-12"></td>
					</tr>
					<tr class="row">
						<td class="h4">Mật khẩu</td>
						<td><input type="password" name="matkhau" required class="mt-2 display-6 border-success rounded col-md-12"></td>
					</tr>
					<tr class="row">
						<td class="h4">Nhập lại mật khẩu</td>
						<td><input type="password" name="rematkhau" required class="mt-2 display-6 border-success rounded col-md-12"></td>
					</tr>
					<tr class="row">
						<td class="h4">Email</td>
						<td><input type="text" name="email" required class="mt-2 display-6 border-success rounded col-md-12"></td>
					</tr>
					<tr class="row">
						<td class="h4">Điện thoại</td>
						<td><input type="text" name="dienthoai" required class="mt-2 display-6 border-success rounded col-md-12"></td>
					</tr>
					<tr class="row">
						<td class="h4">Địa chỉ</td>
						<td><textarea name="diachi" class="border-success rounded col-md-12"></textarea></td>
					</tr>

					<tr class="row  mt-4">

						<td><input type="submit" name="dangky" value="Đăng ký" class="btn btn-success m-1 col-md-3"></td>
						<td><a href="index.php?quanly=dangnhap" class="btn btn-success col-md-5">Đăng nhập nếu có tài khoản</a></td>
					</tr>
				</table>

			</form>
		</div>
	</div>
</div>
<div>
	<?php
	if (isset($_POST['dangky'])) {
		$tenkhachhang = $_POST['hovaten'];
		$taikhoan = $_POST['taikhoan'];
		$kt_taikhoan = $db->prepare("SELECT taikhoan FROM tbl_dangky WHERE taikhoan='$taikhoan'");
		$kt_taikhoan->execute();
		$matkhau = md5($_POST['matkhau']);
		$rematkhau =  md5($_POST['rematkhau']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$email = $_POST['email'];
		$dienthoai = $_POST['dienthoai'];
		$diachi = $_POST['diachi'];
		if (!$tenkhachhang || !$taikhoan || !$matkhau || !$rematkhau || !$email || !$dienthoai || !$diachi) {
			echo "Vui lòng nhập đầy đủ thông tin.";
		}
		// kiểm tra tên đăng nhập bị trùng
		elseif ($kt_taikhoan->fetchColumn() > 0){
			echo '<script language="javascript">';
			echo 'alert("Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.") ';
			echo '</script>';
			exit();
		}
		elseif($taikhoan == 'admin'){
			echo '<script language="javascript">';
			echo 'alert("Không thể tạo người dùng tên: admin ") ';
			echo '</script>';
			exit();
		}
		// kiểm tra mật khẩu bị trùng
		 elseif ($matkhau != $rematkhau) {
			echo '<script language="javascript">';
			echo 'alert("Mật khẩu không trùng khớp")';
			echo '</script>';
			exit();
		} 
		else {
			$sql_dangky = "INSERT INTO tbl_dangky(hovaten,taikhoan,matkhau,sodienthoai,email,diachi) VALUE('" . $tenkhachhang . "','" . $taikhoan . "','" . $matkhau . "','" . $dienthoai . "','" . $email . "','" . $diachi . "')";
			$query_dangky = $db->prepare($sql_dangky);
			$db->exec($sql_dangky);
			if ($query_dangky) {
				echo '<script language="javascript">';
				echo 'alert("Chúc mừng bạn đã đăng ký thành công!")';
				echo '</script>';
				$_SESSION['dangky'] = $taikhoan;
				$_SESSION['email'] = $email;
				$_SESSION['id_khachhang'] = $db->lastInsertId();
			}
		}
	}
	?>
</div>