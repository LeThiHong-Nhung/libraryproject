<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Thư viện - Trang chủ</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../btsql/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
            width: 90%;
        }
        th{
            color: brown;
            background-color: bisque;
            font-size: 25px;
        }
        b{
            font-style: italic;
        }
        .bb{
            color: red;
        }
        img{
            width: 70%;
            height: 70%;
        }
        font{
            color: red;
        }
        h3{
            color: brown;
            font-weight: bolder;
            text-align: center;
            font-size: 26px;
        }
    </style>
</head>
<body>
    <!-- Menu section starts -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="<?php echo SITEURL; ?>admin/index.php">TRANG CHỦ</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-admin.php">THỦ THƯ</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-sv.php">SINH VIÊN</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-book.php">SÁCH</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-card.php">MƯỢN SÁCH</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/baitap.php">BÀI TẬP</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/thongtincanhan.php">THÔNG TIN CÁ NHÂN</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/logout.php">ĐĂNG XUẤT</a></li>
            </ul>
        </div>
    </div>
    <!-- Menu section ends -->
    <div class="main-content">
    <div class="wrapper">
        <h1>BÀI TẬP PHP KẾT HỢP MYSQL</h1>
        <br /><br />
        <br>
        <!-- BÀI TẬP FORM, ARRAY, MYSQL -->
        <a href="<?php echo SITEURL; ?>btsql/btsql1.php" class="btn-primary">Bài 1</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql2.php" class="btn-primary">Bài 2</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql3.php" class="btn-primary">Bài 3</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql4.php" class="btn-primary">Bài 4</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql5.php" class="btn-primary">Bài 5</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql6.php" class="btn-primary">Bài 6</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql7.php" class="btn-primary">Bài 7</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql8.php" class="btn-primary">Bài 8</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql9.php" class="btn-primary">Bài 9</a>

        <br /><br /><br />
        <h3>THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</h3>
    <?php
    //tien te
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'VNĐ')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    //phan trang
    $rowsPerPage = 2;
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
    $offset = ($_GET['page'] - 1) * $rowsPerPage;

    $sql="SELECT * FROM sua LIMIT $offset, $rowsPerPage";
    $res=mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    $maxPage = ceil($count / $rowsPerPage);

    echo "<table align='center' border='1'>";
    while($row=mysqli_fetch_assoc($res)){
    $ten_sua=$row['Ten_sua'];
    $ma_hang_sua = $row['Ma_hang_sua'];
    $trong_luong = $row['Trong_luong'];
    $don_gia = $row['Don_gia'];
    $hinh = $row['Hinh'];
    $tp_dd=$row['TP_Dinh_Duong'];
    $loi_ich=$row['Loi_ich'];
    $sql2 = "SELECT Ten_hang_sua FROM hang_sua WHERE Ma_hang_sua='$ma_hang_sua' ";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $ten_hang_sua = $row2['Ten_hang_sua'];
        echo "<tr>";
            echo "<th colspan='2'>".$ten_sua." - ".$ten_hang_sua."</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        ?>
        <img width="50%" src="Hinh_sua/<?php echo $hinh; ?>">
        <?php
        echo "</td>";
        echo "<td><b>Thành phần dinh dưỡng: </b><br>".$tp_dd;
        echo "<br><b>Lợi ích: </b><br>".$loi_ich;
        echo "<br><b>Trọng lượng: </b>"."<font>".$trong_luong."</font>"." gr - "."<b>Đơn giá: </b>"."<font>".currency_format($don_gia)."</font></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <div style="text-align: center;">
    <?php
    $re = mysqli_query($conn, 'select * from sua');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows/$rowsPerPage) + 1;
    if ($_GET['page'] > 1){
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".(1)."> << </a> ";
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."> < </a> "; //gắn thêm nút Back
    }
    for ($i=1 ; $i<=$maxPage ; $i++)
    {
        if ($i == $_GET['page'])
        {
            echo '<b>'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
        }
        else echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".$i."> ".$i."</a> ";
    }
    if ($_GET['page'] < $maxPage) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=".($_GET['page'] + 1) . "> > </a>";  //gắn thêm nút Next
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=".($maxPage) . "> >> </a>";
    }
    ?>
    </div>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>