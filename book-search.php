<?php include('partials-front/menu.php'); ?>
<!-- Book search Section Starts Here -->
<section class="book-search text-center">
    <div class="container">
        <?php
        $search = mysqli_real_escape_string($conn,$_POST['search']);
        ?>
        <h2>Books on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

    </div>
</section>
<!-- Book search Section Ends Here -->

<!-- Book menu section starts here -->
<section class="book-menu">
    <div class="container">
        <h2 class="text-center">Book menu</h2>
        <?php
        $search = $_POST["search"];
        $sql = "SELECT * FROM sach WHERE ten_sach LIKE '%$search%' OR tomtat LIKE '%$search%' OR tinhtrang LIKE '%$search%' ";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $idsach = $row['ma_sach'];
                $tensach = $row['ten_sach'];
                $soluong = $row['soluong'];
                $sotrang = $row['sotrang'];
                $giasach = $row['gia_sach'];
                $namxb = $row['namxb'];
                $ma_nxb = $row['ma_nxb'];
                $ma_tl = $row['ma_tl'];
                $ma_tg = $row['ma_tg'];
                $tinhtrang = $row['tinhtrang'];
                $tomtat = $row['tomtat'];
                $tenanh = $row['anh_sach'];
        ?>
                <div class="book-menu-box">
                    <div class="book-menu-img">
                        <?php
                        if ($tenanh == "") {
                            echo "<div class='error'>Khong co anh</div>";
                        } else {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/book/<?php echo $tenanh; ?>" alt="Book menu" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                    </div>

                    <div class="book-menu-desc">
                        <h4><?php echo $tensach; ?></h4>
                        <p class="book-price"><?php echo $giasach; ?> VND</p>
                        <p class="book-detail"><?php echo $tomtat; ?></p><br>
                        <a href="muonsach.php" class="btn btn-primary">Mượn sách</a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<div class='error'>Khong co sach nao!</div>";
        }
        ?>

        <div class="clearfix"></div>
    </div>

    <p class="text-center">
        <a href="#">See all book</a>
    </p>
</section>
<!-- Book menu section ends here -->
<?php include('partials-front/footer.php'); ?>