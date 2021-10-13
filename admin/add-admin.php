<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br /><br />
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];//hien thi thong bao
            unset($_SESSION['add']);//xoa bo thong bao
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Mã thủ thư</td>
                    <td>
                        <input type="text" name="ma_nv" placeholder="Nhập mã thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td>
                        <input type="text" name="hoten_nv" placeholder="Nhập họ tên thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <input type="text" name="diachi_nv" placeholder="Nhập địa chỉ thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="tel" name="sdt_nv" placeholder="Nhập số điện thoại thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>CMND</td>
                    <td>
                        <input type="text" name="cmnd_nv" placeholder="Nhập CMND thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <input type="radio" name="gioitinh_nv" value="Nam" checked>Nam
                        <input type="radio" name="gioitinh_nv" value="Nu">Nữ
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email_nv" placeholder="Nhập email thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td>
                        <input type="password" name="pwd" placeholder="Nhập mật khẩu">
                    </td>
                </tr>
                <tr>
                    <td>Ảnh</td>
                    <td>
                        <input type="file" name="anh_nv">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php'); ?>

<?php
//Luu vao csdl

//kiem tra nut submit
if (isset($_POST['submit'])) {
    $id = $_POST['ma_nv'];
    $ten = $_POST['hoten_nv'];
    $email = $_POST['email_nv'];
    $sdt = $_POST['sdt_nv'];
    $cmnd = $_POST['cmnd_nv'];
    $gioitinh = $_POST['gioitinh_nv'];
    $diachi = $_POST['diachi_nv'];
    $pwd= md5($_POST['pwd']);
    $anhh = $_FILES['anh_nv']['name'];
    $anh = "images/".$anhh;
    move_uploaded_file($anhh,$anh);

    //cau truy van
    $sql = "INSERT INTO nhan_vien SET
    ma_nv='$id',
    hoten_nv='$ten',
    diachi_nv='$diachi',
    sdt_nv='$sdt',
    email_nv='$email',
    cmnd_nv='$cmnd',
    pwd='$pwd',
    gioitinh_nv='$gioitinh',
    anh_nv='$anh' 
    ";
    //Thư mục bạn sẽ lưu file upload
    $target_dir    = "images/";
    //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
    $target_file   = $target_dir.basename($_FILES["anh_nv"]["name"]);

    $allowUpload   = true;

    //Lấy phần mở rộng của file (jpg, png, ...)
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // Cỡ lớn nhất được upload (bytes)
    $maxfilesize   = 800000;

    ////Những loại file được phép upload
    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
    // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
    move_uploaded_file($_FILES["anh_nv"]["name"], $target_file);


    //thuc thi cau truy van
    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    //kiem tra ket qua cau truy van
    if($res == true) {
        //insert thanh cong
        //echo "insert thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "<div class='success'>Admin is added successfully!</div>";
        //chuyen trang toi manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else {
        //insert khong thanh cong
        //echo "insert khong thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "<div class='error'>Admin is added failed!</div>";
        //chuyen trang toi manage admin
        header("location:".SITEURL.'admin/add-admin.php');
    }

}



?>