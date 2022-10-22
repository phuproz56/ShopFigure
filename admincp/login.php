<?php
session_start();
include('config/connect.php');
echo '<script language="javascript">';
// echo 'alert("Chào mừng ADMIN quay trở lại !!!") ';
echo '</script>';
if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['usernamez'];
    $matkhau = md5($_POST['password']);
    $sql_nguoidung = "SELECT * FROM tbl_dangky ,tbl_admin WHERE (tbl_dangky.taikhoan='" . $taikhoan . "' AND tbl_dangky.matkhau='" . $matkhau . "' AND tbl_dangky.chucvu=1) OR (tbl_admin.username='" . $taikhoan . "' AND tbl_admin.password='" . $matkhau . "' ) LIMIT 1";
    $row_nguoidung = $db->prepare($sql_nguoidung);
    $row_nguoidung->execute();
    $count = $row_nguoidung->fetch(PDO::FETCH_ASSOC);
    if ($count > 0) {
        $_SESSION['dangnhap'] = $taikhoan;
        header("Location:index.php");
    } else {
        header("Location:login.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_login.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
    <div class="warpper">
        <form action="" method="POST">
            <h1>LOGIN</h1>
            <div class="taikhoan">
                <label for=""> Tài Khoản</label><br>
                <input type="text" name="usernamez">
            </div>
            <div class="matkhau">
                <label for=""> Mật khẩu</label><br>
                <input type="password" name="password">
            </div>
            <div class="mt-2 ">
                <input class="btn btn-danger" type="submit" name="dangnhap" value="Đăng Nhập">
            </div>
        </form>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>