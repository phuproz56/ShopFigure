    <?php
        $sql_lietke_nguoidung="SELECT * FROM tbl_dangky ORDER BY id_khachhang DESC";
        $result_lietke_nguoidung = $db->prepare($sql_lietke_nguoidung);
        $result_lietke_nguoidung->execute();
    ?>
    <p>Danh sách người dùng</p>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name </th>
            <th>Account</th>
            <th>Email</th>
            <th>Number phone</th>
            <th>Address</th>
            <th colspan="2"></th>
            <th>Chức vụ</th>
        </tr>
            <?php
                $i=0;
                while($row=$result_lietke_nguoidung->fetch()){
                $i++;               
            ?>
        <tr>
            <td style="height:100px;"> <?php echo $i ?></td>
            <td> <?php echo $row ['hovaten']?></td>
            <td> <?php echo $row ['taikhoan']?></td>
            <td> <?php echo $row ['email']?></td>
            <td> <?php echo $row ['sodienthoai']?></td>
            <td style="width:100px;"> <?php echo $row ['diachi']?></td>
            <td>
                    <a class="btn btn-primary" href="?action=quanlynguoidung&query=sua&idnguoidung=<?php echo $row['id_khachhang'] ?>">Sửa </a>
            </td>
            <td>
                    <a class="btn btn-primary" href="modules/quanlynguoidung/xuly.php?idnguoidung=<?php echo $row['id_khachhang']?>">Xóa</a>
            </td>
            <td><?php if($row['chucvu']==1){
                echo "Bán hàng";
         }else{
                echo "Không";
         }?>
         </td>
        </tr>
            <?php
                }
            ?>
    </table>
    