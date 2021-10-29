<?php include('config/constants.php'); ?>

<!DOCTYPE html>

<head>
    <title>Đăng nhập - Thư viện</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<section class="book-search">
    <div class="container">
    <div class="login">
    <h1 class="text-center">Đăng nhập</h1><br><br>

    <?php if (isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
    ?>
    <br><br>
    <!-- Login Form Starts Here -->
    <form action="" method="POST" class="text-center">
    Mã số sinh viên:<br>
    <input type="text" name="ma_sv" placeholder="VD: 61234567"><br><br>
    Mật khẩu:<br>
    <input type="password" name="pwd_sv" placeholder="Nhập mật khẩu"><br><br>

    <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary"><br><br>
    </form>
    <!-- Login Form Ends Here -->

    <p class="text-center">Created by <a href="#">Lê Thị Hồng Nhung</a></p>
    </div>
    </div>
</section>
</body>

</html>

<?php
if(isset($_POST['submit']))
{
    //lay du lieu tu form dang nhap
    $ma_sv = mysqli_real_escape_string($conn,$_POST['ma_sv']);
    $raw_pwd_sv = md5($_POST['pwd_sv']);
    $pwd_sv=mysqli_real_escape_string($conn, $raw_pwd_sv);    

    //kiem tra co ton tai sinh vien k
    $sql = "SELECT * FROM sinh_vien WHERE ma_sv='$ma_sv' AND pwd_sv='$pwd_sv' ";

    //thuc thi cau truy van
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count == 1) {
        //dang nhap thanh cong
        $_SESSION['login']="<div class='success text-center'>Đăng nhập thành công!</div>";
        $_SESSION['user']=$ma_sv;//kiem tra neu user da dang nhap hoac neu khong logout se unset no

        header("location:".SITEURL);
    }
    else{
        //dang nhap that bai
        $_SESSION['login']="<div class='error text-center'>Đăng nhập thất bại, MSSV hoặc mật khẩu sai!</div>";
        header("location:".SITEURL."login-sv.php");
    }
}
?>