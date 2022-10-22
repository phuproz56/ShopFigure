<ul class="admincp_list">
    <li><a class="btn btn-primary mx-2" href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm </a></li>
    <?php
    if (isset($_SESSION['dangnhap'])) {
        if ($_SESSION['dangnhap'] == 'admin') {
    ?>
            <li><a class="btn btn-primary mx-2" href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm </a></li>
            <li><a class="btn btn-primary mx-2" href="index.php?action=quanlynguoidung&query=them">Quản lý người dùng</a></li>
    <?php
        }
    }
    ?>
    <li><a class="btn btn-primary mx-2" href="index.php?action=quanlydonhang&query=them">Quản lý đơn hàng </a></li>
</ul>