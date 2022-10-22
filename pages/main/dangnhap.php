<?php
if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['taikhoan'];
    $kt_taikhoan = $db->prepare("SELECT taikhoan FROM tbl_dangky WHERE taikhoan='$taikhoan'");
    $kt_taikhoan->execute();

    $matkhau = md5($_POST['password']);
    $kt_matkhau = $db->prepare("SELECT matkhau FROM tbl_dangky WHERE matkhau='$matkhau'");
    $kt_matkhau->execute();
    $row_1 = $kt_matkhau->fetch();

    $sql = "SELECT * FROM tbl_dangky ,tbl_admin WHERE tbl_dangky.taikhoan='" . $taikhoan . "' AND tbl_dangky.matkhau='" . $matkhau . "'  LIMIT 1";
    $row = $db->prepare($sql);
    $row->execute();
    $count = $row->fetch(PDO::FETCH_BOTH);

    if ($count > 0) {
        $row_data = $count;
        $_SESSION['dangky'] = $row_data['taikhoan'];
        $_SESSION['email'] = $row_data['email'];
        $_SESSION['id_khachhang'] = $row_data['id_khachhang'];
        header("Location:index.php");
    }
    // đăng nhập vào tài khoản admin
    elseif ($taikhoan == 'admin') {
        header("Location:admincp/login.php");
        
    } 
    // kiểm tra tài khoản
     elseif ($kt_taikhoan->fetchColumn() == 0) {
        echo '<script language="javascript">';
        echo 'alert("Tên đăng nhập không tồn tại. Vui lòng nhập lại !!!") ';
        echo '</script>';
    } 
    // kiểm tra mật khẩu
    elseif(!password_verify($matkhau, $row_1)){
        echo '<script language="javascript">';
        echo 'alert("Mật khẩu chưa đúng. vui lòng nhập lại !!!") ';
        echo '</script>';
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("Chào mừng bạn đến với Shop Figure !") ';
        echo '</script>';
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
    <title>Login</title>
</head>
<body>
    <div class="warpper">
        <div class="container ">
            <div class="row justify-content-around p-5 ">
                <form action="" method="POST" class="col-md-6  bg-light rounded-3  border">
                    <h1 class="text-center text-uppercase m-4 p-2">đăng nhập</h1>
                    <div class="row m-2 ">
                        <div class="taikhoan ">
                            <label for="" class="h4 "> Tài Khoản</label><br>
                            <input type="text" name="taikhoan" required class="mt-2 display-6 border-success rounded col-md-12">
                        </div>
                        <div class="matkhau mt-3">
                            <label for="" class="h4"> Mật khẩu</label><br>
                            <input type="password" name="password" required class="mt-2 display-6 border-success rounded col-md-12">
                        </div>
                        <div>
                            <br>
                            <input class="btn btn-success mx-2 " type="submit" name="dangnhap" value="Đăng Nhập">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
