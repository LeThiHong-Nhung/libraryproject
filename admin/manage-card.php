<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>QUẢN LÍ MƯỢN TRẢ SÁCH</h1>
        <br /><br />
        <?php
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['delete-pm']))
        {
            echo $_SESSION['delete-pm'];
            unset($_SESSION['delete-pm']);
        }
        ?>
        <br>
        <!-- Button for adding admin -->
        <a href="<?php echo SITEURL; ?>admin/manage-card.php" class="btn-primary">Phiếu mượn</a>
        <a href="<?php echo SITEURL; ?>admin/the-thu-vien.php" class="btn-primary">Thẻ thư viện</a>
        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Họ tên sinh viên</th>
                <th>MSSV</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Ngày mượn</th>
                <th>Trạng thái</th>
            </tr>
            <?php
            $sql="SELECT * FROM phieu_muon";
            $res= mysqli_query($conn, $sql);
            $count=mysqli_num_rows($res);
            $sn=1;
            if($count>0){
                while($row=mysqli_fetch_assoc($res))
                {
                    $ma_pm=$row['ma_pm'];
                    $ngay_muon=$row['ngay_muon'];
                    $soluong_muon=$row['soluong_muon'];
                    $ma_sach=$row['ma_sach'];
                    $ma_sv=$row['ma_sv'];

                    $sql2="SELECT hoten_sv FROM sinh_vien WHERE ma_sv='$ma_sv' ";
                    $res2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_assoc($res2);
                    $hoten_sv = $row2['hoten_sv'];

                    $sql3="SELECT ten_sach FROM sach WHERE ma_sach='$ma_sach' ";
                    $res3=mysqli_query($conn,$sql3);
                    $row3=mysqli_fetch_assoc($res3);
                    $ten_sach = $row3['ten_sach'];
                    $active=$row['active'];
                    ?>
                    <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $hoten_sv; ?></td>
                    <td><?php echo $ma_sv; ?></td>
                    <td><?php echo $ten_sach; ?></td>
                    <td><?php echo $soluong_muon; ?></td>
                    <td><?php echo $ngay_muon; ?></td>
                    <td><?php if($active=="No") echo "<div class='error'>Chưa duyệt</div>"; else echo "<div class='success'>Đã duyệt</div>"; ?></td>
                    <td>
                    <a href="<?php echo SITEURL; ?>admin/update-card.php?id=<?php echo $ma_pm;?>"><img src="<?php echo SITEURL; ?>images/edit.png" width="50px" title="Đổi trạng thái phiếu mượn"></a>
                    <a href="<?php echo SITEURL; ?>admin/delete-pm.php?id=<?php echo $ma_pm;?>"><img src="<?php echo SITEURL; ?>images/delete.png" width="50px" title="Xóa phiếu mượn"></a>
                    </td>
                    </tr>
                    <?php
                }
            }
            else{
                echo "<tr><td colspan='7' class='error' >Hiện không có phiếu mượn nào</td></tr>";
            }
            ?>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>