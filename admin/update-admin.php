<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php
        //lay id de update
        $id = $_GET['id'];

        //chuan bị cau truy van update admin
        //hien thi thong tin admin
        $sql = "SELECT * FROM nhan_vien WHERE ma_nv=$id";

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

                $id = $rows['ma_nv'];
                $ten = $rows['hoten_nv'];
                $diachi = $rows['diachi_nv'];
                $sdt = $rows['sdt_nv'];
                $cmnd = $rows['cmnd_nv'];
                $gioitinh = $rows['gioitinh_nv'];
                $anh = $rows['anh_nv'];
                $email = $rows['email_nv'];
            } else {
                //chuyen ve trang manage
                header("location:".SITEURL."admin/manage-admin.php");
            }
        }


        ?>

        <form method="post" action="" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Họ tên</td>
                    <td>
                        <input type="text" name="hoten_nv" value="<?php if (isset($ten)) echo $ten; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <input type="text" name="diachi_nv" value="<?php if (isset($diachi)) echo $diachi; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="tel" name="sdt_nv" value="<?php if (isset($sdt)) echo $sdt; ?>">
                    </td>
                </tr>
                <tr>
                    <td>CMND</td>
                    <td>
                        <input type="text" name="cmnd_nv" value="<?php if (isset($cmnd)) echo $cmnd; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <input type="radio" name="gioitinh_nv" value="0" checked>Nam
                        <input type="radio" name="gioitinh_nv" value="1" checked>Nữ
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email_nv" value="<?php if(isset($email)) echo $email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Ảnh</td>
                    <td>
                        <input type="file" name="anh_nv"><b><?php if(isset($anh)) echo $anh; ?></b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
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
    $ten = $_POST['hoten_nv'];
    $email = $_POST['email_nv'];
    $sdt = $_POST['sdt_nv'];
    $cmnd = $_POST['cmnd_nv'];
    $gioitinh = $_POST['gioitinh_nv'];
    $diachi = $_POST['diachi_nv'];
    if(isset($_FILES['anh_nv']['name']))
    {
        //tai anh lên
        //ten, nguon, dich
        $tenanh=$_FILES['anh_nv']['name'];
        //auto rename file
        //lay duoi file
        $ext = end(explode('.',$tenanh));

        //doi ten file
        $tenanh="Book_".rand(000,999).'.'.$ext;

        $source_path=$_FILES['anh_nv']['tmp_name'];
        $destination_path="../images/nv/".$tenanh;
        //upload image
        $upload = move_uploaded_file($source_path,$destination_path);

        //kiem tra anh da tai len hay chua
        if($upload==false)
        {
            $_SESSION['upload']="<div class='error'>Uploaded images successfully</div>";
            header('location:'.SITEURL.'admin/add-admin.php');
            die();
        }
    }
    

    //chuan bi cau truy van
    $sql = "UPDATE nhan_vien SET
    hoten_nv='$ten',
    diachi_nv='$diachi',
    sdt_nv='$sdt',
    email_nv='$email',
    cmnd_nv='$cmnd',
    gioitinh_nv='$gioitinh',
    anh_nv='$tenanh' 
    WHERE ma_nv='$id' 
    ";
    //thuc thi cau truy van
    $res = mysqli_query($conn, $sql);

    //kiem tra ket qua update
    if($res == true)
    {
        //update thanh cong
        $_SESSION['update']="<div class='success'>Admin Updated Successfully</div>";
        //chuyen ve trang manage
        header("location:".SITEURL."admin/manage-admin.php");
    }
    else{
        //update that bai.
        $_SESSION['update']="<div class='error'>Admin Updated Failed</div>";
        header("location:".SITEURL."admin/manage-admin.php");
    }
}

?>

<?php
include('partials/footer.php');
?>