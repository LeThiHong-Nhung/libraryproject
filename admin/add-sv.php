<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Student</h1>
        <br /><br />
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Mã sinh viên</td>
                    <td>
                        <input type="text" name="ma_sv" placeholder="Nhập mã sinh viên">
                    </td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td>
                        <input type="text" name="hoten_sv" placeholder="Nhập họ tên sinh viên">
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <input type="text" name="diachi_sv" placeholder="Nhập địa chỉ sinh viên">
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td>
                        <input type="date" name="ngaysinh_sv" placeholder="Nhập ngày sinh">
                    </td>
                </tr>
                <tr>
                    <td>Khoa</td>
                    <td>
                        <input type="text" name="khoa" placeholder="Nhập khoa viện đào tạo">
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <input type="radio" name="gioitinh_sv" value="Nam" checked>Nam
                        <input type="radio" name="gioitinh_sv" value="Nu">Nữ
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email_sv" placeholder="Nhập email sinh viên">
                    </td>
                </tr>
                <tr>
                    <td>Mã thủ thư</td>
                    <td>
                        <input type="text" name="ma_nv">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Student" class="btn-secondary">
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
    $id = $_POST['ma_sv'];
    $ten = $_POST['hoten_sv'];
    $diachi = $_POST['diachi_sv'];
    $ngaysinh = $_POST['ngaysinh_sv'];
    $khoa = $_POST['khoa'];
    $gioitinh = $_POST['gioitinh_sv'];
    $ma_nv = $_POST['ma_nv'];
    $email = $_POST['email'];

    //cau truy van
    $sql = "INSERT INTO sinh_vien SET
    ma_sv='$id',
    hoten_sv='$ten',
    diachi_sv='$diachi',
    ngaysinh_sv='$ngaysinh',
    email='$email',
    khoa='$khoa',
    gioitinh_sv='$gioitinh',
    ma_nv='$ma_nv' 
    ";
    


    //thuc thi cau truy van
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    //kiem tra ket qua cau truy van
    if ($res == true) {
        //insert thanh cong
        //echo "insert thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "Student is added successfully!";
        //chuyen trang toi manage admin
        header("location:".SITEURL.'admin/manage-sv.php');
    } else {
        //insert khong thanh cong
        //echo "insert khong thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "Student is added failed!";
        //chuyen trang toi manage admin
        header("location:".SITEURL.'admin/add-sv.php');
    }
}



?>