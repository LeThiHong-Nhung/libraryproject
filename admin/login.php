<?php include('../config/constants.php'); ?>

<!DOCTYPE html>

<head>
    <title>Đăng nhập - Thư viện</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="login">
    <h1 class="text-center">Login</h1><br><br>

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
    Tên đăng nhập:<br>
    <input type="text" name="username" placeholder="Nhập tên của bạn"><br><br>
    Mật khẩu:<br>
    <input type="password" name="password" placeholder="Nhập mật khẩu"><br><br>

    <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary"><br><br>
    </form>
    <!-- Login Form Ends Here -->

    <p class="text-center">Created by <a href="#">Lê Thị Hồng Nhung</a></p>
    </div>

</body>

</html>

<?php
if(isset($_POST['submit']))
{
    //lay du lieu tu form dang nhap
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //kiem tra co ton tai admin k
    $sql = "SELECT * FROM nhan_vien WHERE hoten_nv='$username' AND pwd='$password' ";

    //thuc thi cau truy van
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count == 1) {
        //dang nhap thanh cong
        $_SESSION['login']="<div class='success'>Login successfully</div>";
        $_SESSION['user']=$username;//kiem tra neu user da dang nhap hoac neu khong logout se unset no

        header("location:".SITEURL."admin/");
    }
    else{
        //dang nhap that bai
        $_SESSION['login']="<div class='error text-center'>Login failed, password or username does not match</div>";
        header("location:".SITEURL."admin/login.php");
    }
}


?>