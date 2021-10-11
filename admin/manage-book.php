<?php include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Manage Books</h1>
        <br />
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        ?>
        <!-- Button for adding admin -->
        <a href="add-book.php" class="btn-primary">Add Book</a>
        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Tên sách</th>
                <th>Năm XB</th>
                <th>Giá sách</th>
                <th>Số lượng</th>
                <th>Actions</th>
            </tr>
            <?php
            //tao bien dem
            $sn = 1;
            //lay du lieu tu bang nhan_vien
            $sql = "SELECT * from sach";
            //thuc thi cau truy van
            $res = mysqli_query($conn, $sql);
            //kiem tra ket qua cau truy van
            if ($res == true) {
                //dem so ban ghi
                $count = mysqli_num_rows($res); //lay het cac dong
                if ($count > 0) { //co du lieu

                    //lay tung hang
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $idsach = $rows['ma_sach'];
                        $ten_sach = $rows['ten_sach'];
                        $soluong = $rows['soluong'];
                        $sotrang = $rows['sotrang'];
                        $gia_sach = $rows['gia_sach'];
                        $namxb = $rows['namxb'];
                        $ma_nxb = $rows['ma_nxb'];
                        $ma_tl = $rows['ma_tl'];
                        $ma_tg = $rows['ma_tg'];
                        $tinhtrang = $rows['tinhtrang'];
                        $tomtat = $rows['tomtat'];

                        //hien thi du lieu
            ?>

                        <tr>
                            <td><?php echo $sn++; ?> </td>
                            <td><?php echo $ten_sach; ?></td>
                            <td><?php echo $namxb; ?></td>
                            <td><?php echo $gia_sach; ?></td>
                            <td><?php echo $soluong; ?></td>
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