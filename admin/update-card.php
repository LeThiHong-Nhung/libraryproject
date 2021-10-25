<?php ob_start();
include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Cập nhật trạng thái thẻ</h1>

        <br><br>
        <?php
        if (isset($_GET['id'])) {
            //lay id va dl
            $id = $_GET['id'];
            //lay dl
            $sql = "SELECT * FROM phieu_muon WHERE ma_pm='$id' ";
            //thuc thi cau truy van
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                //lay dl
                $row = mysqli_fetch_assoc($res);
                $active = $row['active'];
                $ma_pm = $row['ma_pm'];
            }
        } else {
            //chuyen ve trang manage
            header('location:' . SITEURL . 'admin/manage-card.php');
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <input type="radio" name="active" <?php if ($active == 0) echo "checked"; ?> value="0">Chưa duyệt
                    </td>
                    <td>
                        <input type="radio" name="active" <?php if ($active == 1) echo "checked"; ?> value="1">Đã duyệt
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="ma_pm" value="<?php echo $ma_pm; ?>">
                        <input type="submit" name="submit" value="Cập nhật" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            //lay dl tu form
            $ma_pm = $_POST['ma_pm'];
            $active = $_POST['active'];



            //cap nhat vao db
            $sql2 = "UPDATE phieu_muon SET
            active='$active' 
            WHERE ma_pm='$ma_pm' 
            ";

            //thuc thi
            $res2 = mysqli_query($conn, $sql2);

            //chuyen ve trang manage
            if ($res2 == true) {
                //cap nhat thanh cong
                $_SESSION['update'] = "<div class='success'>Cập nhật trạng thái phiếu mượn thành công!</div>";
                header('location:' . SITEURL . 'admin/manage-card.php');
            } else {
                //cap nhat that bai
                $_SESSION['update'] = "<div class='error'>Cập nhật trạng thái phiếu mượn thất bại!</div>";
                header('location:' . SITEURL . 'admin/manage-card.php');
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php');
ob_end_flush(); ?>