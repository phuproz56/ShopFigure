<p>Thông tin cá nhân </p>
<div style="border: 3px solid #ed7cd1" class=" rounded-pill text-center">
    <p><?php
        if (isset($_SESSION['dangky'])) {
            echo 'xin chào: ' . '<span style="color:red">' . $_SESSION['dangky'] . '</span>';
            $id = $_SESSION['dangky'];
            $sql_thongtin = "SELECT * FROM tbl_dangky WHERE taikhoan='$id' LIMIT 1";
            $query_thongtin = $db->prepare($sql_thongtin);
            $query_thongtin->execute();
            while ($row = $query_thongtin->fetch()) {
        ?></p><br>
    <p>Họ và tên : <?php echo $row['hovaten']  ?></p>
    <p>Email : <?php echo $row['email']  ?></p>
    <p>Địa chỉ : <?php echo $row['diachi']  ?></p>
    <p>Số điện thoại : <?php echo $row['sodienthoai']  ?></p>
<?php
            }
        }
?>
</div>