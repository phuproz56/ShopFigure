<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = $db->prepare($sql_danhmuc);
$query_danhmuc->execute();
?>
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}
?>

<nav class="menu">
    <ul class="menu_list row col-lg-12">
        <li class="col-4 col-sm-3 col-md-2 col-lg-1"> <a href="index.php">Home</a></li>
        <li class="col-4 col-sm-3 col-md-2 col-lg-1"> <a href="index.php?quanly=contact">Liên hệ </a></li>
        <li class="col-4 col-sm-3 col-md-2 col-lg-1"> <a href="index.php?quanly=giohang">Giỏ hàng</a></li>
        <li class="col-4 col-sm-3 col-md-2 col-lg-1"><a href="">Danh mục</a>
            <ul class="menu_danhmuc">
                <?php
                while ($row_danhmuc = $query_danhmuc->fetch(PDO::FETCH_BOTH)) {
                ?>
                    <li> <a href="index.php?quanly=danhmuclist&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
                <?php
                }
                ?>
            </ul>
        </li>
        <?php
        if (isset($_SESSION['dangky'])) {
        ?>
            <li class="col-3 col-sm-3 col-md-2 col-lg-1"><a href="index.php?quanly=thongtin"> Thông Tin</a></li>
            <li class="col-3 col-sm-3 col-md-2 col-lg-1"> <a href="index.php?dangxuat=1">Đăng xuất</a></li>
        <?php
        } else {
        ?>
            <li class="col-3 col-sm-3 col-md-2 col-lg-1"> <a href="index.php?quanly=dangnhap">Đăng nhập</a></li>
            <li class="col-3 col-sm-3 col-md-2 col-lg-1"> <a href="index.php?quanly=dangky">Đăng ký</a></li>
        <?php
        }
        ?>
        <li style="width: 400px;border:none;" class=" col-2 col-sm-2 col-md-2 col-lg-3 ">
            <form  method="POST" action="index.php?quanly=timkiem">
                <div class="search">
                    <input style="border-radius:25px ;" type="text" placeholder="search....." name="tukhoa" class="form-control" />
                    <label class="form-label" ></label>
                    <button style="
                    float: right;width: 38px;
                    height: 38px;
                    border: 1px solid white;
                    border-radius: 100%;
                    background-color: #007bff;
                    margin-top: -38px;
                    margin-right: 2px;" 
                        type="submit" name="timkiem" value="Tìm Kiếm" class="btn btn-primary">
                        <i class="fas fa-search"></i></button>

                </div>
            </form>
        </li>
    </ul>
    </nav>