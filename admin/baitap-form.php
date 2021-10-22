<?php

include('../config/constants.php');
include('partials/login-check.php');
?>

<!DOCTYPE html>

<head>
    <title>Thư viện - Trang chủ</title>
    <link rel="stylesheet" href="../css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- Menu section starts -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">TRANG CHỦ</a></li>
                <li><a href="manage-admin.php">THỦ THƯ</a></li>
                <li><a href="manage-sv.php">SINH VIÊN</a></li>
                <li><a href="manage-book.php">SÁCH</a></li>
                <li><a href="manage-card.php">THẺ</a></li>
                <li><a href="baitap-form.php">FORM</a></li>
                <li><a href="baitap-array.php">ARRAY</a></li>
                <li><a href="baitap-sql.php">SQL</a></li>
                <li><a href="logout.php">ĐĂNG XUẤT</a></li>
            </ul>
        </div>
    </div>
    <!-- Menu section ends -->


    <div class="main-content">
        <div class="wrapper">
            <h1>Bài tập form</h1>
            <div style="width: 20%;float: left;height: 50%;">
                <ul>
                    <button onclick="function_name()">BÀI 1</button>
                    <li><a name="btform2" href="../btform/btform2.php?btform2">BÀI 2</a></li>
                    <li><a name="btform" href="../btform/btform3.php?btform3">BÀI 3</a></li>
                    <li><a name="btform" href="../btform/btform4.php?btform4">BÀI 4</a></li>
                    <li><a name="btform" href="../btform/btform5.php?btform5">BÀI 5</a></li>
                    <li><a name="btform" href="../btform/pheptinh.php?btform6">BÀI 6+7</a></li>
                    <li><a name="btform" href="../btform/btform8.html?btform8">BÀI 8</a></li>
                </ul>
            </div>
            <div>
                <?php
                if (isset($_GET['btform1'])) {
                    include('../btform/btform1.php');         
                }
                if (isset($_GET['btform2'])) {
                    include('../btform/btform2.php');
                }
                if (isset($_GET['btform3'])) {
                    include('../btform/btform3.php');
                }
                if (isset($_GET['btform4'])) {
                    include('../btform/btform4.php');
                }
                if (isset($_GET['btform5'])) {
                    include('../btform/btform5.php');
                }
                if (isset($_GET['btform6'])) {
                    include('../btform/pheptinh.php');
                }
                if (isset($_GET['btform8'])) {
                    include('../btform/btform8.html');
                }
                ?>
                <p>Khoi</p>
            </div>
        </div>
    </div>
    <script>
        function function_name(){
            <?php include('../btform/btform1.php'); ?>
        }
    </script>

    <!-- Footer section starts -->
    <div class="menu footer" style="bottom: 0; position:absolute;width: 100%;">
        <div class="wrapper">
            <p class="text-center"><a href="#">Lê Thị Hồng Nhung</a> - 2021</p>
        </div>
    </div>
    <!-- Footer section ends -->
</body>

</html>