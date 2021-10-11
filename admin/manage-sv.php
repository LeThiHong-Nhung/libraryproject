<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Students</h1>
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        ?>
        <br /><br />
        <!-- Button for adding admin -->
        <a href="add-sv.php" class="btn-primary">Add Student</a>
        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
                <th>Ngày sinh</th>
                <th>Khoa</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php
            //tao bien dem
            $sn = 1;
            //lay du lieu tu bang nhan_vien
            $sql = "SELECT * from sinh_vien";
            //thuc thi cau truy van
            $res = mysqli_query($conn, $sql);
            //kiem tra ket qua cau truy van
            if ($res == true) {
                //dem so ban ghi
                $count = mysqli_num_rows($res); //lay het cac dong
                if ($count > 0) { //co du lieu

                    //lay tung hang
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['ma_sv'];
                        $ten = $rows['hoten_sv'];
                        $diachi = $rows['diachi_sv'];
                        $ngaysinh = $rows['ngaysinh_sv'];
                        $khoa = $rows['khoa'];
                        $gioitinh = $rows['gioitinh_sv'];
                        $ma_nv = $rows['ma_nv'];
                        $email = $rows['email'];

                        //hien thi du lieu
            ?>

                        <tr>
                            <td><?php echo $sn++; ?> </td>
                            <td><?php echo $ten; ?></td>
                            <td><?php echo $diachi; ?></td>
                            <td><?php echo $ngaysinh; ?></td>
                            <td><?php echo $khoa; ?></td>
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

<?php include('partials/footer.php'); ?>