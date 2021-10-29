<?php include('config/constants.php');
include('login-check-sv.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar starts here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" height="auto" class="img-responsive" alt="Library Logo">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Trang chủ</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>book.php">Sách</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Thể loại</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>logout-sv.php">Đăng xuất</a>
                    </li>
                    <?php
                    $id=$_SESSION['user'];
                    ?>
                    <li>
                        <a href="<?php echo SITEURL; ?>detail.php?sv_id=<?php echo $id; ?>"><img src="images/user.png" title="Xem chi tiết thông tin sinh viên" width="4%" height="auto"></a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar ends here -->