<?php ob_start(); include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>CẬP NHẬT THÔNG TIN SINH VIÊN</h1>
        <br><br>
        <?php
        //lay id de update
        $id = $_GET['id'];

        //chuan bị cau truy van update admin
        //hien thi thong tin admin
        $sql = "SELECT * FROM sinh_vien WHERE ma_sv='$id' ";

        //thuc thi cau truy van
        $res = mysqli_query($conn, $sql);
        //kiem tra ket qua cau truy van
        if ($res == true) {
            $count = mysqli_num_rows($res);
            //kiem tra co du lieu trong bang nhan_vien khong
            if ($count >= 0) {
                //hien thi du lieu
                //echo "Da tim thay Admin";
                $rows = mysqli_fetch_assoc($res);

                $id = $rows['ma_sv'];
                $ten = $rows['hoten_sv'];
                $diachi = $rows['diachi_sv'];
                $khoa = $rows['khoa'];
                $gioitinh = $rows['gioitinh_sv'];
                $ngaysinh = $rows['ngaysinh_sv'];
                $email = $rows['email'];
                $ma_nv = $rows['ma_nv'];
            } else {
                //chuyen ve trang manage
                header("location:".SITEURL."admin/manage-admin.php");
            }
            //echo $gioitinh;
        }
        ?>

        <form method="post" action="" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Họ tên</td>
                    <td>
                        <input type="text" name="hoten_sv" value="<?php if (isset($ten)) echo $ten; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <input type="text" name="diachi_sv" value="<?php if (isset($diachi)) echo $diachi; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Khoa</td>
                    <td>
                        <input type="text" name="khoa" value="<?php if (isset($khoa)) echo $khoa; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <input type="radio" name="gioitinh_sv" value="0" <?php if($gioitinh==0) echo 'checked'; ?> >Nam
                        <input type="radio" name="gioitinh_sv" value="1" <?php if($gioitinh==1) echo 'checked'; ?> >Nữ
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td>
                        <input type="date" name="ngaysinh_sv" value="<?php if (isset($ngaysinh)) echo $ngaysinh; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email_sv" value="<?php if(isset($email)) echo $email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Người quản lí</td>
                    <td>
                        <select name="ma_nv">
                            <?php 
                    $sql2 ="SELECT * FROM nhan_vien";
                    $res = mysqli_query($conn, $sql2);
                    //$se = "selected";
                    if($res == true)
                    {
                    $count = mysqli_num_rows($res);
                    if($count >=1)
                    {
                        while($row = mysqli_fetch_array($res))
                        {
                            $ma = $row['ma_nv'];
                            $ten = $row['hoten_nv'];
                            echo "<option value='$ma' <?php if($ma_nv==$ma) echo selected; ?>  >";
                            echo $ten;
                            echo "</option>";
                        }
                    }
                    }
                    ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Cập nhật thông tin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if(isset($_POST['submit']))
{
    //echo "Button clicked";
    //lay thong tin de update
    $id = $_POST['id'];
    $ten = $_POST['hoten_sv'];
    $diachi = $_POST['diachi_sv'];
    $khoa = $_POST['khoa'];
    $gioitinh = $_POST['gioitinh_sv'];
    $ngaysinh = $_POST['ngaysinh_sv'];
    $email = $_POST['email_sv'];
    $ma_nv = $_POST['ma_nv'];
    //echo $gioitinh;

    //chuan bi cau truy van
    $sql = "UPDATE sinh_vien SET
    hoten_sv='$ten',
    diachi_sv='$diachi',
    ngaysinh_sv='$ngaysinh',
    email='$email',
    khoa='$khoa',
    gioitinh_sv='$gioitinh',
    ma_nv='$ma_nv' 
    WHERE ma_sv='$id' 
    ";
    //thuc thi cau truy van
    $res = mysqli_query($conn, $sql);
    var_dump($sql);

    //kiem tra ket qua update
    if($res == true)
    {
        //update thanh cong
        $_SESSION['update']="<div class='success'>Cập nhật thông tin sinh viên thành công!</div>";
        //chuyen ve trang manage
        header("location:".SITEURL."admin/manage-sv.php");
    }
    else{
        //update that bai.
        $_SESSION['update']="<div class='error'>Cập nhật thông tin sinh viên thất bại!</div>";
        header("location:".SITEURL."admin/manage-sv.php");
    }
}

?>
<?php
include('partials/footer.php');
ob_end_flush();
?>