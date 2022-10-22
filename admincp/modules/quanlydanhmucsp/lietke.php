<?php
    $sql_lietke="SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $result_lietke = $db->prepare($sql_lietke);
    $result_lietke->execute();
?>
<p>Liệt kê danh mục sản phẩm</p>
 <table style="width: 100%;" border="1" style="border-collapse:collapse;"> 
     <tr>
         <td>ID</td>
         <td>Tên danh mục</td>
         <td>Thứ tự</td>
     </tr>
     <?php
    $i=0;
    while($row=$result_lietke->fetch(PDO::FETCH_BOTH)){
        $i++;
    
     ?>
     <tr>
         <td><?php echo $i ?></td>
         <td><?php echo $row['tendanhmuc'] ?></td>
         <td><?php echo $row['thutu']?></td>
         <td>
            <a class="btn btn-primary mx-2" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc']?>">Xóa</a>|
             <a class="btn btn-primary mx-2" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>">Sửa</a>
         </td>
     </tr>

     <?php
    }
    ?>
 </table>