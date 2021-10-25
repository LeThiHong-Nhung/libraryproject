<?php 
    //kiem tra user da log in hay chua
    if(!isset($_SESSION['user']))//neu session user chua duoc thiet lap
    {
        //user chua dang nhap
        //chuyen sang trang log in voi thong bao
        $_SESSION['no-login-message']="<div class='error text-center'>Trước tiên, hãy đăng nhập!</div>";
        header("location:".SITEURL."login-sv.php");
    }
?>
