<?php ob_start();
include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Thêm thẻ thư viện</h1>
        <br>
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        if (isset($_SESSION['update-the'])) {
            echo $_SESSION['update-the']; //hien thi thong bao
            unset($_SESSION['update-the']); //xoa bo thong bao
        }
        if (isset($_SESSION['delete-the'])) {
            echo $_SESSION['delete-the']; //hien thi thong bao
            unset($_SESSION['delete-the']); //xoa bo thong bao
        }
        ?><br>
        <table class="tbl-full">
            <tr>
                <th>Mã thẻ</th>
                <th>Họ tên</th>
                <th>Thời gian cấp</th>
                <th>Hạn sử dụng</th>
                <th>Kích hoạt thẻ</th>
            </tr>
            <?php
            $sql = "SELECT * FROM the_thu_vien";
            $res = mysqli_query($conn, $sql);
            if ($res == true) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $ma_the = $row['ma_the'];
                    $thoigiancap = $row['thoigiancap'];
                    $hsd = $row['hsd'];
                    $ma_sv = $row['ma_sv'];
                    $sql2 = "SELECT hoten_sv FROM sinh_vien WHERE ma_sv='$ma_sv' ";
                    $res2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($res2);
                    $hoten_sv = $row2['hoten_sv'];

                    //
                    $active = $row['active'];
                    echo "<tr>";
                    echo "<td>".$ma_the."</td>";
                    echo "<td>".$hoten_sv."</td>";
                    echo "<td>".$thoigiancap."</td>";
                    echo "<td>".$hsd."</td>";
                    if($active=="No") echo "<td><div class='error'>Chưa duyệt</div></td>"; else echo "<td><div class='success'>Đã duyệt</div></td>";
                    ?>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/update-thetv.php?id=<?php echo $ma_the; ?>"><img src="<?php echo SITEURL; ?>images/edit.png" width="50px" title="Sửa thông tin thẻ"></a>
                        <a href="<?php echo SITEURL; ?>admin/delete-thetv.php?id=<?php echo $ma_the; ?>"><img src="<?php echo SITEURL; ?>images/delete.png" width="50px" title="Xóa thẻ"></a>
                    </td>
                    <?php
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <a href="<?php echo SITEURL; ?>admin/manage-card.php"><img src="<?php echo SITEURL; ?>images/back.png" width="50px" title="Trở lại trang quản lí thẻ"></a>
    </div>

</div>
<?php include('partials/footer.php');
ob_end_flush(); ?>