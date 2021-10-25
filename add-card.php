<?php ob_start(); include('partials-front/menu.php'); ?>
<?php
if (isset($_GET['sv_id'])) {
    $sv_id = $_GET['sv_id'];
}
else{
    header('location:'.SITEURL);
}
?>
<!-- Card section starts here -->
<section class="book-search">
        <div class="container">
            
            <h2 class="text-center text-white">Đăng kí thẻ thư viện</h2>

            <form action="" method="POST" class="order">   
                <fieldset>
                    <legend>Thông tin làm thẻ</legend>
                    <div class="order-label">MSSV</div>
                    <input type="text" name="ma_sv" placeholder="Nhập vào mã sinh viên" class="input-responsive" required>

                    <div class="order-label">Hạn thẻ</div>
                    <select name="hsd" class="input-responsive">
                        <option value="3">3 tháng</option>
                        <option value="6">6 tháng</option>
                        <option value="9">9 tháng</option>
                        <option value="12">12 tháng</option>
                    </select>
                    
                    <div class="order-label">Thời gian cấp</div>
                    <input type="date" name="thoigiancap" value="<?php $today=date('D-m-Y'); echo $today; ?>" required>
                    <br><br>
                    <input type="submit" name="xn" value="Xác nhận" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
            if(isset($_POST['xn']))
            {
                $_SESSION['the']="<div class='success text-center'>Đã đăng kí thẻ thư viện</div>";
                header('location:'.SITEURL);
            }
            ?>
        </div>
    </section>
<!-- Book search section ends here -->


<?php include('partials-front/footer.php'); ob_end_flush(); ?>