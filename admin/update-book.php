<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Book</h1>

        <br><br>
<?php
        if(isset($_GET['id']))
        {
            //lay id va dl
            $id=$_GET['id'];
            //lay dl
            $sql = "SELECT * FROM sach WHERE ma_sach=$id";
            //thuc thi cau truy van
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count ==1)
            {
                //lay dl
                $row = mysqli_fetch_assoc($res);
                $idsach = $row['ma_sach'];
                $tensach = $row['ten_sach'];
                $soluong = $row['soluong'];
                $sotrang = $row['sotrang'];
                $giasach = $row['gia_sach'];
                $namxb = $row['namxb'];
                $ma_nxb = $row['ma_nxb'];
                $ma_tl = $row['ma_tl'];
                $ma_tg = $row['ma_tg'];
                $tinhtrang = $row['tinhtrang'];
                $tomtat = $row['tomtat'];
                $tenanh = $row['anh_sach'];
            }
            else
            {
                $_SESSION['no-book-found'] = "<div class='error'>No book found</div>";
                header('location:'.SITEURL.'admin/manage-book.php');
            }
        }
        else
        {
            //chuyen ve trang manage
            header('location:'.SITEURL.'admin/manage-book.php');
        }
?>
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Mã sách</td>
                <td>
                    <input type="text" readonly name="ma_sach" value="<?php echo $idsach; ?>">
                </td>
            </tr>
            <tr>
                <td>Tên sách</td>
                <td>
                    <input type="text" name="ten_sach" value="<?php echo $tensach; ?>">
                </td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td>
                    <input type="number" name="soluong" value="<?php echo $soluong; ?>">
                </td>
            </tr>
            <tr>
                <td>Số trang</td>
                <td>
                    <input type="number" name="sotrang" value="<?php echo $sotrang; ?>">
                </td>
            </tr>
            <tr>
                <td>Giá sách</td>
                <td>
                    <input type="number" name="gia_sach" value="<?php echo $giasach; ?>">
                </td>
            </tr>
            <tr>
                <td>Năm xuất bản</td>
                <td>
                    <input type="number" name="namxb" value="<?php echo $namxb; ?>">
                </td>
            </tr>
            <tr>
                <td>Nhà xuất bản</td>
                <td>
                    <input type="text" name="ma_nxb" value="<?php echo $ma_nxb; ?>">
                </td>
            </tr>
            <tr>
                <td>Thể loại</td>
                <td>
                    <input type="text" name="ma_tl" value="<?php echo $ma_tl; ?>">
                </td>
            </tr>
            <tr>
                <td>Tác giả</td>
                <td>
                    <input type="text" name="ma_tg" value="<?php echo $ma_tg; ?>">
                </td>
            </tr>
            <tr>
                <td>Tình trạng</td>
                <td>
                    <textarea type="text" name="tinhtrang" cols="20" rows="5"><?php echo $tinhtrang; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Tóm tắt</td>
                <td>
                    <textarea type="text" name="tomtat"  cols="20" rows="5"><?php echo $tomtat; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Ảnh hiện tại</td>
                <td>
<?php
                    if($tenanh!="")
                    {
                        //hien thi anh
?>
                            <img src="<?php echo SITEURL; ?>images/book/<?php echo $tenanh; ?>" width="150px">
<?php
                    }
                    else{
                        //hien thong bao
                        echo "<div class='error'>Image not added</div>";
                    }
?>
                </td>
            </tr>
            <tr>
                <td>Chọn ảnh</td>
                <td>
                    <input type="file" name="anh_moi" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="anh_sach" value="<?php echo $tenanh; ?>">
                    <input type="hidden" name="ma_sach" value="<?php echo $idsach; ?>">
                    <input type="submit" name="submit" value="Update" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
<?php
        if(isset($_POST['submit']))
        {
            //lay dl tu form
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
            $tenanh=$_POST['anh_sach'];        
            
            //cap nhat anh neu chon anh moi

            //cap nhat vao db
            $sql2 = "UPDATE sach SET
            ten_sach='$ten_sach',
            soluong='$soluong',
            sotrang='$sotrang',
            gia_sach='$gia_sach',
            namxb='$namxb',
            ma_nxb='$ma_nxb',
            ma_tl='$ma_tl',
            ma_tg='$ma_tg',
            tinhtrang='$tinhtrang',
            tomtat='$tomtat' 
            WHERE ma_sach=$idsach
            ";

            //thuc thi
            $res2 = mysqli_query($conn, $sql2);

            //chuyen ve trang manage
            if($res2==true)
            {
                //cap nhat thanh cong
                $_SESSION['update']="<div class='success'>Update book successfully</div>";
                header('location:'.SITEURL.'admin/manage-book.php');
            }
            else{
                //cap nhat that bai
                $_SESSION['update']="<div class='error'>Update book failed</div>";
                header('location:'.SITEURL.'admin/manage-book.php');                
            }
        }
?>
    </div>
</div>

<?php include('partials/footer.php') ?>