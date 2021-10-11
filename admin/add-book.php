<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Book</h1>
        <br /><br />
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Mã sách</td>
                    <td>
                        <input type="text" name="ma_sach" placeholder="Nhập mã sách">
                    </td>
                </tr>
                <tr>
                    <td>Tên sách</td>
                    <td>
                        <input type="text" name="ten_sach" placeholder="Nhập tên sách">
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="number" name="soluong" placeholder="Nhập số lượng sách">
                    </td>
                </tr>
                <tr>
                    <td>Số trang</td>
                    <td>
                        <input type="number" name="sotrang" placeholder="Nhập số trang sách">
                    </td>
                </tr>
                <tr>
                    <td>Giá sách</td>
                    <td>
                        <input type="number" name="gia_sach" placeholder="Nhập giá sách">
                    </td>
                </tr>
                <tr>
                    <td>Năm xuất bản</td>
                    <td>
                        <input type="number" name="namxb" placeholder="Nhập năm xuất bản sách">
                    </td>
                </tr>
                <tr>
                    <td>Mã nhà xuất bản</td>
                    <td>
                        <input type="text" name="ma_nxb" placeholder="Nhập mã nxb">
                    </td>
                </tr>
                <tr>
                    <td>Mã thể loại</td>
                    <td>
                        <input type="text" name="ma_tl" placeholder="Nhập mã nxb">
                    </td>
                </tr>
                <tr>
                    <td>Mã tác giả</td>
                    <td>
                        <input type="text" name="ma_tg" placeholder="Nhập mã nxb">
                    </td>
                </tr>
                <tr>
                    <td>Tình trạng</td>
                    <td>
                        <input type="text" name="tinhtrang" placeholder="Nhập tình trạng sách">
                    </td>
                </tr>
                <tr>
                    <td>Tóm tắt</td>
                    <td>
                        <input type="text" name="tomtat" placeholder="Nhập tóm tắt nội dung sách">
                    </td>
                </tr>
                <tr>
                    <td>Ảnh sách</td>
                    <td>
                        <input type="file" name="anh_sach">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Book" class="btn-secondary">
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
    $idsach = $_POST['ma_sach'];
    $ten_sach = $_POST['ten_sach'];
    $soluong = $_POST['soluong'];
    $sotrang = $_POST['sotrang'];
    $gia_sach = $_POST['gia_sach'];
    $namxb = $_POST['namxb'];
    $ma_nxb = $_POST['ma_nxb'];
    $ma_tl = $_POST['ma_tl'];
    $ma_tg = $_POST['ma_tg'];
    $tinhtrang = $_POST['tinhtrang'];
    $tomtat = $_POST['tomtat'];
    $anh_sach = $_FILES['anh_sach']['name'];
    $upload = "uploads/" . $anh_sach;


    //cau truy van
    $sql = "INSERT INTO sach SET
    ma_sach='$idsach',
    ten_sach='$ten_sach',
    soluong='$soluong',
    sotrang='$sotrang',
    gia_sach='$gia_sach',
    namxb='$namxb',
    ma_nxb='$ma_nxb',
    ma_tl='$ma_tl',
    ma_tg='$ma_tg',
    tinhtrang='$tinhtrang',
    tomtat='$tomtat',
    anh_sach='$anh_sach' 
    ";
    //Thư mục bạn sẽ lưu file upload
    $target_dir    = "uploads/";
    //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
    $target_file   = $target_dir . basename($_FILES["anh_sach"]["name"]);

    $allowUpload   = true;

    //Lấy phần mở rộng của file (jpg, png, ...)
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // Cỡ lớn nhất được upload (bytes)
    $maxfilesize   = 800000;

    ////Những loại file được phép upload
    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
    // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
    move_uploaded_file($_FILES["anh_sach"]["name"], $target_file);


    //thuc thi cau truy van
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    //kiem tra ket qua cau truy van
    if ($res == true) {
        //insert thanh cong
        //echo "insert thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "Book is added successfully!";
        //chuyen trang toi manage admin
        header("location:".SITEURL.'admin/manage-book.php');
    } else {
        //insert khong thanh cong
        //echo "insert khong thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "Book is added failed!";
        //chuyen trang toi manage admin
        header("location:".SITEURL.'admin/add-book.php');
    }
}



?>