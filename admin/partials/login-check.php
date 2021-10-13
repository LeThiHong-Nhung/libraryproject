<?php 
    //kiem tra user da log in hay chua
    if(!isset($_SESSION['user']))//neu session user chua duoc thiet lap
    {
        //user chua dang nhap
        //chuyen sang trang log in voi thong bao
        $_SESSION['no-login-message']="<div class='error text-center'>Firstly, log in to access Admin Page</div>";
        header("location:".SITEURL."admin/login.php");
    }
?>
