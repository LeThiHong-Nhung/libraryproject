<?php 

//include file config
include("../config/constants.php");

//1. lay id de xoa
$id = $_GET['id'];

//2. chuan bi cau truy van xoa
$sql = "DELETE FROM nhan_vien WHERE ma_nv='$id' ";

//thuc thi cau truy van
$res = mysqli_query($conn, $sql);

//kiem tra cau truy van xoa
//3. chuyen ve trang manage voi thong bao thanh cong/loi
if($res == true) {
    //echo "Xoa thanh cong";
    //tao session de hien thi thong bao
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully!</div>";
    //chuyen ve trang manage
    header("location:".SITEURL."admin/manage-admin.php");
}
else {
    //echo "Xoa khong thanh cong";
    $_SESSION['delete'] = "<div class='error'>Admin Deleted Failed!</div>";
    header("location:".SITEURL."admin/manage-admin.php");
}


?>