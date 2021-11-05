<?php ob_start(); include('partials-front/menu.php'); ?>
<?php
if (isset($_GET['book_id'])) {

    //kiem tra the tv
    $idsv=$_SESSION['usersv'];
    $sqltv="SELECT ma_sv FROM the_thu_vien WHERE ma_sv='$idsv' and active='Yes' ";
    $restv=mysqli_query($conn, $sqltv);
    $counttv=mysqli_num_rows($restv);
    if($counttv>0){
        $book_id = $_GET['book_id'];
        $sql = "SELECT * FROM sach WHERE ma_sach='$book_id' ";
        $res = mysqli_query($conn, $sql);
        $count=mysqli_num_rows($res);
        if($count == 1)
        {
            $row = mysqli_fetch_assoc($res);
            $id = $row['ma_sach'];
            $ten = $row['ten_sach'];
            $tenanh = $row['anh_sach'];
            $ma_tg= $row['ma_tg'];
            $sql2="SELECT * FROM tac_gia WHERE ma_tg='$ma_tg' ";
            $res2 = mysqli_query($conn, $sql2);
            $row2=mysqli_fetch_assoc($res2);
            $ten_tg = $row2['ten_tg'];
        }
        else{
            header('location:'.SITEURL);
        }
    }
    else{
        $_SESSION['chua-co-the']= "<div class='error text-center'>Chưa có thẻ thư viện, đăng kí thẻ tại đây!</div>";
        header('location:'.SITEURL.'add-card.php?sv_id='.$idsv);
    }
    
    
}
else{
    header('location:'.SITEURL);
}
?>
<!-- Book search section starts here -->
<section class="book-search">
        <div class="container">
            
            <h2 class="text-center text-white">Điền vào phiếu mượn</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <!-- <legend>Thông tin sách</legend> -->

                    <div class="book-menu-img">
                        <?php
                        if($tenanh == "")
                        {
                            echo "<div class='error text-center'>Không có ảnh!</div>";
                        }
                        else{
                            ?>
                            <img src="<?php echo SITEURL; ?>images/book/<?php echo $tenanh; ?>" alt="Book" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                    </div>
    
                    <div class="book-menu-desc">
                        <h3><?php echo $ten; ?></h3>
                        <p class="book-price"><?php echo $ten_tg; ?></p>
                        <input type="hidden" name="ma_sach" value="<?php echo $id; ?>">
                        <input type="hidden" name="ma_tg" value="<?php echo $ma_tg; ?>">
                        <div class="order-label">Số lượng</div>
                        <input type="number" name="soluong_muon" class="input-responsive" value="1" min="1" max="5" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <!-- <legend>Thông tin chi tiết</legend> -->
                    <div class="order-label">MSSV</div>
                    <input type="number" name="ma_sv" value="<?php echo $idsv; ?>" class="input-responsive" readonly>
                    <br><br>
                    <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
            if(isset($_POST['submit']))
            {
                $ngay = getdate();
                $ngay_muon=$ngay['mon']."/".$ngay['mday']."/".$ngay['year'];
                $soluong_muon= mysqli_real_escape_string($conn,$_POST['soluong_muon']);
                $ma_sach= mysqli_real_escape_string($conn ,$_POST['ma_sach']);
                $ma_sv= mysqli_real_escape_string($conn, $_POST['ma_sv']);
                $active="No";

                $sql3="INSERT INTO phieu_muon SET
                ngay_muon='$ngay_muon',
                soluong_muon='$soluong_muon',
                ma_sach='$ma_sach',
                ma_sv='$ma_sv',
                active='$active' 
                ";

                $res3=mysqli_query($conn,$sql3);
                if ($res3 == true) {
                    $_SESSION['muonsach']="<div class='success text-center'>Tạo phiếu mượn thành công</div>";
                    header('location:'.SITEURL);
                }
                else{
                    $_SESSION['muonsach']="<div class='error text-center'>Tạo phiếu mượn không thành công</div>";
                    header('location:'.SITEURL);
                }
            }
            ?>
        </div>
    </section>
<!-- Book search section ends here -->


<?php include('partials-front/footer.php'); ob_end_flush(); ?>