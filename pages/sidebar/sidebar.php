
<div class="sidebar col-12 col-sm-12 col-md-2 col-lg-2">
    <ul class="sidebar_list">
        <?php
        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc = $db->prepare($sql_danhmuc);
        $query_danhmuc->execute();
        while ($row = $query_danhmuc->fetch(PDO::FETCH_BOTH)) {
        ?>
        <li class=""><a href="index.php?quanly=danhmuclist&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
        <?php
        }
        ?>
    </ul>
</div>