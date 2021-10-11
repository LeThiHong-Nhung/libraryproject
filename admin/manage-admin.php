<?php include('partials/menu.php') ?>

<!-- Main content section starts -->
<div class="menu main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br />

        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        ?>
        <br><br><br>
        <!-- Button for adding admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>CMND</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php
            //tao bien dem
            $sn = 1;
            //lay du lieu tu bang nhan_vien
            $sql = "SELECT * from nhan_vien";
            //thuc thi cau truy van
            $res = mysqli_query($conn, $sql);
            //kiem tra ket qua cau truy van
            if ($res == true) {
                //dem so ban ghi
                $count = mysqli_num_rows($res); //lay het cac dong
                if ($count > 0) { //co du lieu

                    //lay tung hang
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['ma_nv'];
                        $ten = $rows['hoten_nv'];
                        $diachi = $rows['diachi_nv'];
                        $sdt = $rows['sdt_nv'];
                        $cmnd = $rows['cmnd_nv'];
                        $gioitinh = $rows['gioitinh_nv'];
                        $anh = $rows['anh_nv'];
                        $email = $rows['email_nv'];

                        //hien thi du lieu
            ?>

                        <tr>
                            <td><?php echo $sn++; ?> </td>
                            <td><?php echo $ten; ?></td>
                            <td><?php echo $diachi; ?></td>
                            <td><?php echo $sdt; ?></td>
                            <td><?php echo $cmnd; ?></td>
                            <td><?php if($gioitinh==0) echo "Nam";
                            else echo "Nu"; ?></td>
                            <td><?php echo $email; ?></td>
                            <td>
                                <a href="#" class="btn-secondary">Update</a>
                                <a href="#" class="btn-danger">Delete</a>
                            </td>
                        </tr>

            <?php


                    }
                }
            }
            ?>


        </table>

    </div>
</div>
<!-- Main content section ends -->

<?php include('partials/footer.php'); ?>