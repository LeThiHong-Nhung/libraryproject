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

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete']; //hien thi thong bao
            unset($_SESSION['delete']); //xoa bo thong bao
        }
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['user-not-found'])){
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        if(isset($_SESSION['pwd-not-match'])){
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        if(isset($_SESSION['change-pwd'])){
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }
        ?>
        <br><br><br>
        <!-- Button for adding admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br /><br /><br />
        <form enctype="multipart/form-data">

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Họ tên</th>
                <th>Số điện thoại</th>
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
                            <td><img src="<?php if(isset($anh)) echo $anh; ?>"><?php if(isset($anh)) echo $anh; ?></td>
                            <td><?php echo $ten; ?></td>
                            <td><?php echo $sdt; ?></td>
                            <td><?php if($gioitinh==0) echo "Nam";
                            else echo "Nu"; ?></td>
                            <td><?php echo $email; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Đổi mật khẩu</a>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Sửa thông tin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Xóa thủ thư</a>
                            </td>
                        </tr>

            <?php
                    }
                }
                else {
                    //khong co du lieu
                }
            }
            ?>


        </table>
        </form>
    </div>
</div>
<!-- Main content section ends -->

<?php include('partials/footer.php'); ?>